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

class Google_Service_Clouderrorreporting_ErrorEvent extends Google_Model
{
  protected $contextType = 'Google_Service_Clouderrorreporting_ErrorContext';
  protected $contextDataType = '';
  public $eventTime;
  public $message;
  protected $serviceContextType = 'Google_Service_Clouderrorreporting_ServiceContext';
  protected $serviceContextDataType = '';

  /**
   * @param Google_Service_Clouderrorreporting_ErrorContext
   */
  public function setContext(Google_Service_Clouderrorreporting_ErrorContext $context)
  {
    $this->context = $context;
  }
  /**
   * @return Google_Service_Clouderrorreporting_ErrorContext
   */
  public function getContext()
  {
    return $this->context;
  }
  public function setEventTime($eventTime)
  {
    $this->eventTime = $eventTime;
  }
  public function getEventTime()
  {
    return $this->eventTime;
  }
  public function setMessage($message)
  {
    $this->message = $message;
  }
  public function getMessage()
  {
    return $this->message;
  }
  /**
   * @param Google_Service_Clouderrorreporting_ServiceContext
   */
  public function setServiceContext(Google_Service_Clouderrorreporting_ServiceContext $serviceContext)
  {
    $this->serviceContext = $serviceContext;
  }
  /**
   * @return Google_Service_Clouderrorreporting_ServiceContext
   */
  public function getServiceContext()
  {
    return $this->serviceContext;
  }
}
