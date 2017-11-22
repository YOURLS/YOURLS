<?php
/*
 * Copyright 2014 Google Inc.
 *
 * Licensed under the Apache License, Version 2.0 (the "License");
 * you may not use this file except in compliance with the License.
 * You may obtain a copy of the License at
 *
 *     http://www.apache.org/licenses/LICENSE-2.0
 *
 * Unless required by applicable law or agreed to in writing, software
 * distributed under the License is distributed on an "AS IS" BASIS,
 * WITHOUT WARRANTIES OR CONDITIONS OF ANY KIND, either express or implied.
 * See the License for the specific language governing permissions and
 * limitations under the License.
 */

/**
 * A task runner with exponential backoff support.
 *
 * @see https://developers.google.com/drive/web/handle-errors#implementing_exponential_backoff
 */
class Google_Task_Runner
{
  const TASK_RETRY_NEVER = 0;
  const TASK_RETRY_ONCE = 1;
  const TASK_RETRY_ALWAYS = -1;

  /**
   * @var integer $maxDelay The max time (in seconds) to wait before a retry.
   */
  private $maxDelay = 60;
  /**
   * @var integer $delay The previous delay from which the next is calculated.
   */
  private $delay = 1;

  /**
   * @var integer $factor The base number for the exponential back off.
   */
  private $factor = 2;
  /**
   * @var float $jitter A random number between -$jitter and $jitter will be
   * added to $factor on each iteration to allow for a better distribution of
   * retries.
   */
  private $jitter = 0.5;

  /**
   * @var integer $attempts The number of attempts that have been tried so far.
   */
  private $attempts = 0;
  /**
   * @var integer $maxAttempts The max number of attempts allowed.
   */
  private $maxAttempts = 1;

  /**
   * @var callable $action The task to run and possibly retry.
   */
  private $action;
  /**
   * @var array $arguments The task arguments.
   */
  private $arguments;

  /**
   * @var array $retryMap Map of errors with retry counts.
   */
  protected $retryMap = [
    '500' => self::TASK_RETRY_ALWAYS,
    '503' => self::TASK_RETRY_ALWAYS,
    'rateLimitExceeded' => self::TASK_RETRY_ALWAYS,
    'userRateLimitExceeded' => self::TASK_RETRY_ALWAYS,
    6  => self::TASK_RETRY_ALWAYS,  // CURLE_COULDNT_RESOLVE_HOST
    7  => self::TASK_RETRY_ALWAYS,  // CURLE_COULDNT_CONNECT
    28 => self::TASK_RETRY_ALWAYS,  // CURLE_OPERATION_TIMEOUTED
    35 => self::TASK_RETRY_ALWAYS,  // CURLE_SSL_CONNECT_ERROR
    52 => self::TASK_RETRY_ALWAYS   // CURLE_GOT_NOTHING
  ];

  /**
   * Creates a new task runner with exponential backoff support.
   *
   * @param array $config The task runner config
   * @param string $name The name of the current task (used for logging)
   * @param callable $action The task to run and possibly retry
   * @param array $arguments The task arguments
   * @throws Google_Task_Exception when misconfigured
   */
  public function __construct(
      $config,
      $name,
      $action,
      array $arguments = array()
  ) {
    if (isset($config['initial_delay'])) {
      if ($config['initial_delay'] < 0) {
        throw new Google_Task_Exception(
            'Task configuration `initial_delay` must not be negative.'
        );
      }

      $this->delay = $config['initial_delay'];
    }

    if (isset($config['max_delay'])) {
      if ($config['max_delay'] <= 0) {
        throw new Google_Task_Exception(
            'Task configuration `max_delay` must be greater than 0.'
        );
      }

      $this->maxDelay = $config['max_delay'];
    }

    if (isset($config['factor'])) {
      if ($config['factor'] <= 0) {
        throw new Google_Task_Exception(
            'Task configuration `factor` must be greater than 0.'
        );
      }

      $this->factor = $config['factor'];
    }

    if (isset($config['jitter'])) {
      if ($config['jitter'] <= 0) {
        throw new Google_Task_Exception(
            'Task configuration `jitter` must be greater than 0.'
        );
      }

      $this->jitter = $config['jitter'];
    }

    if (isset($config['retries'])) {
      if ($config['retries'] < 0) {
        throw new Google_Task_Exception(
            'Task configuration `retries` must not be negative.'
        );
      }
      $this->maxAttempts += $config['retries'];
    }

    if (!is_callable($action)) {
        throw new Google_Task_Exception(
            'Task argument `$action` must be a valid callable.'
        );
    }

    $this->action = $action;
    $this->arguments = $arguments;
  }

  /**
   * Checks if a retry can be attempted.
   *
   * @return boolean
   */
  public function canAttempt()
  {
    return $this->attempts < $this->maxAttempts;
  }

  /**
   * Runs the task and (if applicable) automatically retries when errors occur.
   *
   * @return mixed
   * @throws Google_Task_Retryable on failure when no retries are available.
   */
  public function run()
  {
    while ($this->attempt()) {
      try {
        return call_user_func_array($this->action, $this->arguments);
      } catch (Google_Service_Exception $exception) {
        $allowedRetries = $this->allowedRetries(
            $exception->getCode(),
            $exception->getErrors()
        );

        if (!$this->canAttempt() || !$allowedRetries) {
          throw $exception;
        }

        if ($allowedRetries > 0) {
          $this->maxAttempts = min(
              $this->maxAttempts,
              $this->attempts + $allowedRetries
          );
        }
      }
    }
  }

  /**
   * Runs a task once, if possible. This is useful for bypassing the `run()`
   * loop.
   *
   * NOTE: If this is not the first attempt, this function will sleep in
   * accordance to the backoff configurations before running the task.
   *
   * @return boolean
   */
  public function attempt()
  {
    if (!$this->canAttempt()) {
      return false;
    }

    if ($this->attempts > 0) {
      $this->backOff();
    }

    $this->attempts++;
    return true;
  }

  /**
   * Sleeps in accordance to the backoff configurations.
   */
  private function backOff()
  {
    $delay = $this->getDelay();

    usleep($delay * 1000000);
  }

  /**
   * Gets the delay (in seconds) for the current backoff period.
   *
   * @return float
   */
  private function getDelay()
  {
    $jitter = $this->getJitter();
    $factor = $this->attempts > 1 ? $this->factor + $jitter : 1 + abs($jitter);

    return $this->delay = min($this->maxDelay, $this->delay * $factor);
  }

  /**
   * Gets the current jitter (random number between -$this->jitter and
   * $this->jitter).
   *
   * @return float
   */
  private function getJitter()
  {
    return $this->jitter * 2 * mt_rand() / mt_getrandmax() - $this->jitter;
  }

  /**
   * Gets the number of times the associated task can be retried.
   *
   * NOTE: -1 is returned if the task can be retried indefinitely
   *
   * @return integer
   */
  public function allowedRetries($code, $errors = array())
  {
    if (isset($this->retryMap[$code])) {
      return $this->retryMap[$code];
    }

    if (
        !empty($errors) &&
        isset($errors[0]['reason'], $this->retryMap[$errors[0]['reason']])
    ) {
      return $this->retryMap[$errors[0]['reason']];
    }

    return 0;
  }

  public function setRetryMap($retryMap)
  {
    $this->retryMap = $retryMap;
  }
}
