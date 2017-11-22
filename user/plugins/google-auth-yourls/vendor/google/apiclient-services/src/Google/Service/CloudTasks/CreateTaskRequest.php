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

class Google_Service_CloudTasks_CreateTaskRequest extends Google_Model
{
  public $responseView;
  protected $taskType = 'Google_Service_CloudTasks_Task';
  protected $taskDataType = '';

  public function setResponseView($responseView)
  {
    $this->responseView = $responseView;
  }
  public function getResponseView()
  {
    return $this->responseView;
  }
  /**
   * @param Google_Service_CloudTasks_Task
   */
  public function setTask(Google_Service_CloudTasks_Task $task)
  {
    $this->task = $task;
  }
  /**
   * @return Google_Service_CloudTasks_Task
   */
  public function getTask()
  {
    return $this->task;
  }
}
