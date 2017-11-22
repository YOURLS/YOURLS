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

class Google_Service_ServiceControl_CheckInfo extends Google_Collection
{
  protected $collection_key = 'unusedArguments';
  protected $consumerInfoType = 'Google_Service_ServiceControl_ConsumerInfo';
  protected $consumerInfoDataType = '';
  public $unusedArguments;

  /**
   * @param Google_Service_ServiceControl_ConsumerInfo
   */
  public function setConsumerInfo(Google_Service_ServiceControl_ConsumerInfo $consumerInfo)
  {
    $this->consumerInfo = $consumerInfo;
  }
  /**
   * @return Google_Service_ServiceControl_ConsumerInfo
   */
  public function getConsumerInfo()
  {
    return $this->consumerInfo;
  }
  public function setUnusedArguments($unusedArguments)
  {
    $this->unusedArguments = $unusedArguments;
  }
  public function getUnusedArguments()
  {
    return $this->unusedArguments;
  }
}
