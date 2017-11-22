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

/**
 * The "taskqueues" collection of methods.
 * Typical usage is:
 *  <code>
 *   $taskqueueService = new Google_Service_Taskqueue(...);
 *   $taskqueues = $taskqueueService->taskqueues;
 *  </code>
 */
class Google_Service_Taskqueue_Resource_Taskqueues extends Google_Service_Resource
{
  /**
   * Get detailed information about a TaskQueue. (taskqueues.get)
   *
   * @param string $project The project under which the queue lies.
   * @param string $taskqueue The id of the taskqueue to get the properties of.
   * @param array $optParams Optional parameters.
   *
   * @opt_param bool getStats Whether to get stats. Optional.
   * @return Google_Service_Taskqueue_TaskQueue
   */
  public function get($project, $taskqueue, $optParams = array())
  {
    $params = array('project' => $project, 'taskqueue' => $taskqueue);
    $params = array_merge($params, $optParams);
    return $this->call('get', array($params), "Google_Service_Taskqueue_TaskQueue");
  }
}
