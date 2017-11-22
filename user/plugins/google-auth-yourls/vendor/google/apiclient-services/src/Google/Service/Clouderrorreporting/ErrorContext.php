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

class Google_Service_Clouderrorreporting_ErrorContext extends Google_Collection
{
  protected $collection_key = 'sourceReferences';
  protected $httpRequestType = 'Google_Service_Clouderrorreporting_HttpRequestContext';
  protected $httpRequestDataType = '';
  protected $reportLocationType = 'Google_Service_Clouderrorreporting_SourceLocation';
  protected $reportLocationDataType = '';
  protected $sourceReferencesType = 'Google_Service_Clouderrorreporting_SourceReference';
  protected $sourceReferencesDataType = 'array';
  public $user;

  /**
   * @param Google_Service_Clouderrorreporting_HttpRequestContext
   */
  public function setHttpRequest(Google_Service_Clouderrorreporting_HttpRequestContext $httpRequest)
  {
    $this->httpRequest = $httpRequest;
  }
  /**
   * @return Google_Service_Clouderrorreporting_HttpRequestContext
   */
  public function getHttpRequest()
  {
    return $this->httpRequest;
  }
  /**
   * @param Google_Service_Clouderrorreporting_SourceLocation
   */
  public function setReportLocation(Google_Service_Clouderrorreporting_SourceLocation $reportLocation)
  {
    $this->reportLocation = $reportLocation;
  }
  /**
   * @return Google_Service_Clouderrorreporting_SourceLocation
   */
  public function getReportLocation()
  {
    return $this->reportLocation;
  }
  /**
   * @param Google_Service_Clouderrorreporting_SourceReference
   */
  public function setSourceReferences($sourceReferences)
  {
    $this->sourceReferences = $sourceReferences;
  }
  /**
   * @return Google_Service_Clouderrorreporting_SourceReference
   */
  public function getSourceReferences()
  {
    return $this->sourceReferences;
  }
  public function setUser($user)
  {
    $this->user = $user;
  }
  public function getUser()
  {
    return $this->user;
  }
}
