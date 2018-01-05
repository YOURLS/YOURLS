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

class Google_Service_Logging_WriteLogEntriesRequest extends Google_Collection
{
  protected $collection_key = 'entries';
  protected $entriesType = 'Google_Service_Logging_LogEntry';
  protected $entriesDataType = 'array';
  public $labels;
  public $logName;
  public $partialSuccess;
  protected $resourceType = 'Google_Service_Logging_MonitoredResource';
  protected $resourceDataType = '';

  /**
   * @param Google_Service_Logging_LogEntry
   */
  public function setEntries($entries)
  {
    $this->entries = $entries;
  }
  /**
   * @return Google_Service_Logging_LogEntry
   */
  public function getEntries()
  {
    return $this->entries;
  }
  public function setLabels($labels)
  {
    $this->labels = $labels;
  }
  public function getLabels()
  {
    return $this->labels;
  }
  public function setLogName($logName)
  {
    $this->logName = $logName;
  }
  public function getLogName()
  {
    return $this->logName;
  }
  public function setPartialSuccess($partialSuccess)
  {
    $this->partialSuccess = $partialSuccess;
  }
  public function getPartialSuccess()
  {
    return $this->partialSuccess;
  }
  /**
   * @param Google_Service_Logging_MonitoredResource
   */
  public function setResource(Google_Service_Logging_MonitoredResource $resource)
  {
    $this->resource = $resource;
  }
  /**
   * @return Google_Service_Logging_MonitoredResource
   */
  public function getResource()
  {
    return $this->resource;
  }
}
