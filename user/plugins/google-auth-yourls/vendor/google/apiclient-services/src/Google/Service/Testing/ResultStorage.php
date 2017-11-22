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

class Google_Service_Testing_ResultStorage extends Google_Model
{
  protected $googleCloudStorageType = 'Google_Service_Testing_GoogleCloudStorage';
  protected $googleCloudStorageDataType = '';
  protected $toolResultsExecutionType = 'Google_Service_Testing_ToolResultsExecution';
  protected $toolResultsExecutionDataType = '';
  protected $toolResultsHistoryType = 'Google_Service_Testing_ToolResultsHistory';
  protected $toolResultsHistoryDataType = '';

  /**
   * @param Google_Service_Testing_GoogleCloudStorage
   */
  public function setGoogleCloudStorage(Google_Service_Testing_GoogleCloudStorage $googleCloudStorage)
  {
    $this->googleCloudStorage = $googleCloudStorage;
  }
  /**
   * @return Google_Service_Testing_GoogleCloudStorage
   */
  public function getGoogleCloudStorage()
  {
    return $this->googleCloudStorage;
  }
  /**
   * @param Google_Service_Testing_ToolResultsExecution
   */
  public function setToolResultsExecution(Google_Service_Testing_ToolResultsExecution $toolResultsExecution)
  {
    $this->toolResultsExecution = $toolResultsExecution;
  }
  /**
   * @return Google_Service_Testing_ToolResultsExecution
   */
  public function getToolResultsExecution()
  {
    return $this->toolResultsExecution;
  }
  /**
   * @param Google_Service_Testing_ToolResultsHistory
   */
  public function setToolResultsHistory(Google_Service_Testing_ToolResultsHistory $toolResultsHistory)
  {
    $this->toolResultsHistory = $toolResultsHistory;
  }
  /**
   * @return Google_Service_Testing_ToolResultsHistory
   */
  public function getToolResultsHistory()
  {
    return $this->toolResultsHistory;
  }
}
