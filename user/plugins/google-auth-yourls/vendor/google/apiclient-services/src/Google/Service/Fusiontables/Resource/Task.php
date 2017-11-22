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
 * The "task" collection of methods.
 * Typical usage is:
 *  <code>
 *   $fusiontablesService = new Google_Service_Fusiontables(...);
 *   $task = $fusiontablesService->task;
 *  </code>
 */
class Google_Service_Fusiontables_Resource_Task extends Google_Service_Resource
{
  /**
   * Deletes a specific task by its ID, unless that task has already started
   * running. (task.delete)
   *
   * @param string $tableId Table from which the task is being deleted.
   * @param string $taskId The identifier of the task to delete.
   * @param array $optParams Optional parameters.
   */
  public function delete($tableId, $taskId, $optParams = array())
  {
    $params = array('tableId' => $tableId, 'taskId' => $taskId);
    $params = array_merge($params, $optParams);
    return $this->call('delete', array($params));
  }
  /**
   * Retrieves a specific task by its ID. (task.get)
   *
   * @param string $tableId Table to which the task belongs.
   * @param string $taskId The identifier of the task to get.
   * @param array $optParams Optional parameters.
   * @return Google_Service_Fusiontables_Task
   */
  public function get($tableId, $taskId, $optParams = array())
  {
    $params = array('tableId' => $tableId, 'taskId' => $taskId);
    $params = array_merge($params, $optParams);
    return $this->call('get', array($params), "Google_Service_Fusiontables_Task");
  }
  /**
   * Retrieves a list of tasks. (task.listTask)
   *
   * @param string $tableId Table whose tasks are being listed.
   * @param array $optParams Optional parameters.
   *
   * @opt_param string maxResults Maximum number of tasks to return. Default is 5.
   * @opt_param string pageToken Continuation token specifying which result page
   * to return.
   * @opt_param string startIndex Index of the first result returned in the
   * current page.
   * @return Google_Service_Fusiontables_TaskList
   */
  public function listTask($tableId, $optParams = array())
  {
    $params = array('tableId' => $tableId);
    $params = array_merge($params, $optParams);
    return $this->call('list', array($params), "Google_Service_Fusiontables_TaskList");
  }
}
