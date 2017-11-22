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

class Google_Service_Dataflow_SendWorkerMessagesRequest extends Google_Collection
{
  protected $collection_key = 'workerMessages';
  public $location;
  protected $workerMessagesType = 'Google_Service_Dataflow_WorkerMessage';
  protected $workerMessagesDataType = 'array';

  public function setLocation($location)
  {
    $this->location = $location;
  }
  public function getLocation()
  {
    return $this->location;
  }
  /**
   * @param Google_Service_Dataflow_WorkerMessage
   */
  public function setWorkerMessages($workerMessages)
  {
    $this->workerMessages = $workerMessages;
  }
  /**
   * @return Google_Service_Dataflow_WorkerMessage
   */
  public function getWorkerMessages()
  {
    return $this->workerMessages;
  }
}
