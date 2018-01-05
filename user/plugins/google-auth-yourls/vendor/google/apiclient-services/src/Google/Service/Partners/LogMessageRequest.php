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

class Google_Service_Partners_LogMessageRequest extends Google_Model
{
  public $clientInfo;
  public $details;
  public $level;
  protected $requestMetadataType = 'Google_Service_Partners_RequestMetadata';
  protected $requestMetadataDataType = '';

  public function setClientInfo($clientInfo)
  {
    $this->clientInfo = $clientInfo;
  }
  public function getClientInfo()
  {
    return $this->clientInfo;
  }
  public function setDetails($details)
  {
    $this->details = $details;
  }
  public function getDetails()
  {
    return $this->details;
  }
  public function setLevel($level)
  {
    $this->level = $level;
  }
  public function getLevel()
  {
    return $this->level;
  }
  /**
   * @param Google_Service_Partners_RequestMetadata
   */
  public function setRequestMetadata(Google_Service_Partners_RequestMetadata $requestMetadata)
  {
    $this->requestMetadata = $requestMetadata;
  }
  /**
   * @return Google_Service_Partners_RequestMetadata
   */
  public function getRequestMetadata()
  {
    return $this->requestMetadata;
  }
}
