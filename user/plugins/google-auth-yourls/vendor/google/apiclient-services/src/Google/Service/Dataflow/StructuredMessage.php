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

class Google_Service_Dataflow_StructuredMessage extends Google_Collection
{
  protected $collection_key = 'parameters';
  public $messageKey;
  public $messageText;
  protected $parametersType = 'Google_Service_Dataflow_Parameter';
  protected $parametersDataType = 'array';

  public function setMessageKey($messageKey)
  {
    $this->messageKey = $messageKey;
  }
  public function getMessageKey()
  {
    return $this->messageKey;
  }
  public function setMessageText($messageText)
  {
    $this->messageText = $messageText;
  }
  public function getMessageText()
  {
    return $this->messageText;
  }
  /**
   * @param Google_Service_Dataflow_Parameter
   */
  public function setParameters($parameters)
  {
    $this->parameters = $parameters;
  }
  /**
   * @return Google_Service_Dataflow_Parameter
   */
  public function getParameters()
  {
    return $this->parameters;
  }
}
