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

class Google_Service_CloudTasks_Task extends Google_Model
{
  protected $appEngineHttpRequestType = 'Google_Service_CloudTasks_AppEngineHttpRequest';
  protected $appEngineHttpRequestDataType = '';
  protected $appEngineTaskTargetType = 'Google_Service_CloudTasks_AppEngineTaskTarget';
  protected $appEngineTaskTargetDataType = '';
  public $createTime;
  public $name;
  protected $pullMessageType = 'Google_Service_CloudTasks_PullMessage';
  protected $pullMessageDataType = '';
  protected $pullTaskTargetType = 'Google_Service_CloudTasks_PullTaskTarget';
  protected $pullTaskTargetDataType = '';
  public $scheduleTime;
  protected $taskStatusType = 'Google_Service_CloudTasks_TaskStatus';
  protected $taskStatusDataType = '';
  public $view;

  /**
   * @param Google_Service_CloudTasks_AppEngineHttpRequest
   */
  public function setAppEngineHttpRequest(Google_Service_CloudTasks_AppEngineHttpRequest $appEngineHttpRequest)
  {
    $this->appEngineHttpRequest = $appEngineHttpRequest;
  }
  /**
   * @return Google_Service_CloudTasks_AppEngineHttpRequest
   */
  public function getAppEngineHttpRequest()
  {
    return $this->appEngineHttpRequest;
  }
  /**
   * @param Google_Service_CloudTasks_AppEngineTaskTarget
   */
  public function setAppEngineTaskTarget(Google_Service_CloudTasks_AppEngineTaskTarget $appEngineTaskTarget)
  {
    $this->appEngineTaskTarget = $appEngineTaskTarget;
  }
  /**
   * @return Google_Service_CloudTasks_AppEngineTaskTarget
   */
  public function getAppEngineTaskTarget()
  {
    return $this->appEngineTaskTarget;
  }
  public function setCreateTime($createTime)
  {
    $this->createTime = $createTime;
  }
  public function getCreateTime()
  {
    return $this->createTime;
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
   * @param Google_Service_CloudTasks_PullMessage
   */
  public function setPullMessage(Google_Service_CloudTasks_PullMessage $pullMessage)
  {
    $this->pullMessage = $pullMessage;
  }
  /**
   * @return Google_Service_CloudTasks_PullMessage
   */
  public function getPullMessage()
  {
    return $this->pullMessage;
  }
  /**
   * @param Google_Service_CloudTasks_PullTaskTarget
   */
  public function setPullTaskTarget(Google_Service_CloudTasks_PullTaskTarget $pullTaskTarget)
  {
    $this->pullTaskTarget = $pullTaskTarget;
  }
  /**
   * @return Google_Service_CloudTasks_PullTaskTarget
   */
  public function getPullTaskTarget()
  {
    return $this->pullTaskTarget;
  }
  public function setScheduleTime($scheduleTime)
  {
    $this->scheduleTime = $scheduleTime;
  }
  public function getScheduleTime()
  {
    return $this->scheduleTime;
  }
  /**
   * @param Google_Service_CloudTasks_TaskStatus
   */
  public function setTaskStatus(Google_Service_CloudTasks_TaskStatus $taskStatus)
  {
    $this->taskStatus = $taskStatus;
  }
  /**
   * @return Google_Service_CloudTasks_TaskStatus
   */
  public function getTaskStatus()
  {
    return $this->taskStatus;
  }
  public function setView($view)
  {
    $this->view = $view;
  }
  public function getView()
  {
    return $this->view;
  }
}
