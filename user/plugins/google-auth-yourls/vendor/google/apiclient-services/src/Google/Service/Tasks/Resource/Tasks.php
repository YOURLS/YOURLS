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
 * The "tasks" collection of methods.
 * Typical usage is:
 *  <code>
 *   $tasksService = new Google_Service_Tasks(...);
 *   $tasks = $tasksService->tasks;
 *  </code>
 */
class Google_Service_Tasks_Resource_Tasks extends Google_Service_Resource
{
  /**
   * Clears all completed tasks from the specified task list. The affected tasks
   * will be marked as 'hidden' and no longer be returned by default when
   * retrieving all tasks for a task list. (tasks.clear)
   *
   * @param string $tasklist Task list identifier.
   * @param array $optParams Optional parameters.
   */
  public function clear($tasklist, $optParams = array())
  {
    $params = array('tasklist' => $tasklist);
    $params = array_merge($params, $optParams);
    return $this->call('clear', array($params));
  }
  /**
   * Deletes the specified task from the task list. (tasks.delete)
   *
   * @param string $tasklist Task list identifier.
   * @param string $task Task identifier.
   * @param array $optParams Optional parameters.
   */
  public function delete($tasklist, $task, $optParams = array())
  {
    $params = array('tasklist' => $tasklist, 'task' => $task);
    $params = array_merge($params, $optParams);
    return $this->call('delete', array($params));
  }
  /**
   * Returns the specified task. (tasks.get)
   *
   * @param string $tasklist Task list identifier.
   * @param string $task Task identifier.
   * @param array $optParams Optional parameters.
   * @return Google_Service_Tasks_Task
   */
  public function get($tasklist, $task, $optParams = array())
  {
    $params = array('tasklist' => $tasklist, 'task' => $task);
    $params = array_merge($params, $optParams);
    return $this->call('get', array($params), "Google_Service_Tasks_Task");
  }
  /**
   * Creates a new task on the specified task list. (tasks.insert)
   *
   * @param string $tasklist Task list identifier.
   * @param Google_Service_Tasks_Task $postBody
   * @param array $optParams Optional parameters.
   *
   * @opt_param string parent Parent task identifier. If the task is created at
   * the top level, this parameter is omitted. Optional.
   * @opt_param string previous Previous sibling task identifier. If the task is
   * created at the first position among its siblings, this parameter is omitted.
   * Optional.
   * @return Google_Service_Tasks_Task
   */
  public function insert($tasklist, Google_Service_Tasks_Task $postBody, $optParams = array())
  {
    $params = array('tasklist' => $tasklist, 'postBody' => $postBody);
    $params = array_merge($params, $optParams);
    return $this->call('insert', array($params), "Google_Service_Tasks_Task");
  }
  /**
   * Returns all tasks in the specified task list. (tasks.listTasks)
   *
   * @param string $tasklist Task list identifier.
   * @param array $optParams Optional parameters.
   *
   * @opt_param string completedMax Upper bound for a task's completion date (as a
   * RFC 3339 timestamp) to filter by. Optional. The default is not to filter by
   * completion date.
   * @opt_param string completedMin Lower bound for a task's completion date (as a
   * RFC 3339 timestamp) to filter by. Optional. The default is not to filter by
   * completion date.
   * @opt_param string dueMax Upper bound for a task's due date (as a RFC 3339
   * timestamp) to filter by. Optional. The default is not to filter by due date.
   * @opt_param string dueMin Lower bound for a task's due date (as a RFC 3339
   * timestamp) to filter by. Optional. The default is not to filter by due date.
   * @opt_param string maxResults Maximum number of task lists returned on one
   * page. Optional. The default is 100.
   * @opt_param string pageToken Token specifying the result page to return.
   * Optional.
   * @opt_param bool showCompleted Flag indicating whether completed tasks are
   * returned in the result. Optional. The default is True.
   * @opt_param bool showDeleted Flag indicating whether deleted tasks are
   * returned in the result. Optional. The default is False.
   * @opt_param bool showHidden Flag indicating whether hidden tasks are returned
   * in the result. Optional. The default is False.
   * @opt_param string updatedMin Lower bound for a task's last modification time
   * (as a RFC 3339 timestamp) to filter by. Optional. The default is not to
   * filter by last modification time.
   * @return Google_Service_Tasks_Tasks
   */
  public function listTasks($tasklist, $optParams = array())
  {
    $params = array('tasklist' => $tasklist);
    $params = array_merge($params, $optParams);
    return $this->call('list', array($params), "Google_Service_Tasks_Tasks");
  }
  /**
   * Moves the specified task to another position in the task list. This can
   * include putting it as a child task under a new parent and/or move it to a
   * different position among its sibling tasks. (tasks.move)
   *
   * @param string $tasklist Task list identifier.
   * @param string $task Task identifier.
   * @param array $optParams Optional parameters.
   *
   * @opt_param string parent New parent task identifier. If the task is moved to
   * the top level, this parameter is omitted. Optional.
   * @opt_param string previous New previous sibling task identifier. If the task
   * is moved to the first position among its siblings, this parameter is omitted.
   * Optional.
   * @return Google_Service_Tasks_Task
   */
  public function move($tasklist, $task, $optParams = array())
  {
    $params = array('tasklist' => $tasklist, 'task' => $task);
    $params = array_merge($params, $optParams);
    return $this->call('move', array($params), "Google_Service_Tasks_Task");
  }
  /**
   * Updates the specified task. This method supports patch semantics.
   * (tasks.patch)
   *
   * @param string $tasklist Task list identifier.
   * @param string $task Task identifier.
   * @param Google_Service_Tasks_Task $postBody
   * @param array $optParams Optional parameters.
   * @return Google_Service_Tasks_Task
   */
  public function patch($tasklist, $task, Google_Service_Tasks_Task $postBody, $optParams = array())
  {
    $params = array('tasklist' => $tasklist, 'task' => $task, 'postBody' => $postBody);
    $params = array_merge($params, $optParams);
    return $this->call('patch', array($params), "Google_Service_Tasks_Task");
  }
  /**
   * Updates the specified task. (tasks.update)
   *
   * @param string $tasklist Task list identifier.
   * @param string $task Task identifier.
   * @param Google_Service_Tasks_Task $postBody
   * @param array $optParams Optional parameters.
   * @return Google_Service_Tasks_Task
   */
  public function update($tasklist, $task, Google_Service_Tasks_Task $postBody, $optParams = array())
  {
    $params = array('tasklist' => $tasklist, 'task' => $task, 'postBody' => $postBody);
    $params = array_merge($params, $optParams);
    return $this->call('update', array($params), "Google_Service_Tasks_Task");
  }
}
