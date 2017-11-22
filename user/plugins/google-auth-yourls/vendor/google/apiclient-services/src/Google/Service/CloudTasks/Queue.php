<?php
/*
 * Copyright 2014 Google Inc.
 *
 * Licensed under the Apache License, Version 2.0 (the "License"); you may not
 * use this file except in compliance with the License. You may obtain a copy of
 * the License at
 *
 * http://www.apache.org/licenses/LICENSE-2.0
 *
 * Unless required by applicable law or agreed to in writing, software
 * distributed under the License is distributed on an "AS IS" BASIS, WITHOUT
 * WARRANTIES OR CONDITIONS OF ANY KIND, either express or implied. See the
 * License for the specific language governing permissions and limitations under
 * the License.
 */

class Google_Service_CloudTasks_Queue extends Google_Model
{
  protected $appEngineHttpTargetType = 'Google_Service_CloudTasks_AppEngineHttpTarget';
  protected $appEngineHttpTargetDataType = '';
  protected $appEngineQueueConfigType = 'Google_Service_CloudTasks_AppEngineQueueConfig';
  protected $appEngineQueueConfigDataType = '';
  public $name;
  protected $pullQueueConfigType = 'Google_Service_CloudTasks_PullQueueConfig';
  protected $pullQueueConfigDataType = '';
  protected $pullTargetType = 'Google_Service_CloudTasks_PullTarget';
  protected $pullTargetDataType = '';
  public $purgeTime;
  public $queueState;
  protected $rateLimitsType = 'Google_Service_CloudTasks_RateLimits';
  protected $rateLimitsDataType = '';
  protected $retryConfigType = 'Google_Service_CloudTasks_RetryConfig';
  protected $retryConfigDataType = '';

  /**
   * @param Google_Service_CloudTasks_AppEngineHttpTarget
   */
  public function setAppEngineHttpTarget(Google_Service_CloudTasks_AppEngineHttpTarget $appEngineHttpTarget)
  {
    $this->appEngineHttpTarget = $appEngineHttpTarget;
  }
  /**
   * @return Google_Service_CloudTasks_AppEngineHttpTarget
   */
  public function getAppEngineHttpTarget()
  {
    return $this->appEngineHttpTarget;
  }
  /**
   * @param Google_Service_CloudTasks_AppEngineQueueConfig
   */
  public function setAppEngineQueueConfig(Google_Service_CloudTasks_AppEngineQueueConfig $appEngineQueueConfig)
  {
    $this->appEngineQueueConfig = $appEngineQueueConfig;
  }
  /**
   * @return Google_Service_CloudTasks_AppEngineQueueConfig
   */
  public function getAppEngineQueueConfig()
  {
    return $this->appEngineQueueConfig;
  }
  public function setName($name)
  {
    $this->name = $name;
  }
  public function getName()
  {
    return $this->name;
  }
  /**
   * @param Google_Service_CloudTasks_PullQueueConfig
   */
  public function setPullQueueConfig(Google_Service_CloudTasks_PullQueueConfig $pullQueueConfig)
  {
    $this->pullQueueConfig = $pullQueueConfig;
  }
  /**
   * @return Google_Service_CloudTasks_PullQueueConfig
   */
  public function getPullQueueConfig()
  {
    return $this->pullQueueConfig;
  }
  /**
   * @param Google_Service_CloudTasks_PullTarget
   */
  public function setPullTarget(Google_Service_CloudTasks_PullTarget $pullTarget)
  {
    $this->pullTarget = $pullTarget;
  }
  /**
   * @return Google_Service_CloudTasks_PullTarget
   */
  public function getPullTarget()
  {
    return $this->pullTarget;
  }
  public function setPurgeTime($purgeTime)
  {
    $this->purgeTime = $purgeTime;
  }
  public function getPurgeTime()
  {
    return $this->purgeTime;
  }
  public function setQueueState($queueState)
  {
    $this->queueState = $queueState;
  }
  public function getQueueState()
  {
    return $this->queueState;
  }
  /**
   * @param Google_Service_CloudTasks_RateLimits
   */
  public function setRateLimits(Google_Service_CloudTasks_RateLimits $rateLimits)
  {
    $this->rateLimits = $rateLimits;
  }
  /**
   * @return Google_Service_CloudTasks_RateLimits
   */
  public function getRateLimits()
  {
    return $this->rateLimits;
  }
  /**
   * @param Google_Service_CloudTasks_RetryConfig
   */
  public function setRetryConfig(Google_Service_CloudTasks_RetryConfig $retryConfig)
  {
    $this->retryConfig = $retryConfig;
  }
  /**
   * @return Google_Service_CloudTasks_RetryConfig
   */
  public function getRetryConfig()
  {
    return $this->retryConfig;
  }
}
