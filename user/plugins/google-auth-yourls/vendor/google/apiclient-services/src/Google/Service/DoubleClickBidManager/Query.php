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

class Google_Service_DoubleClickBidManager_Query extends Google_Model
{
  public $kind;
  protected $metadataType = 'Google_Service_DoubleClickBidManager_QueryMetadata';
  protected $metadataDataType = '';
  protected $paramsType = 'Google_Service_DoubleClickBidManager_Parameters';
  protected $paramsDataType = '';
  public $queryId;
  public $reportDataEndTimeMs;
  public $reportDataStartTimeMs;
  protected $scheduleType = 'Google_Service_DoubleClickBidManager_QuerySchedule';
  protected $scheduleDataType = '';
  public $timezoneCode;

  public function setKind($kind)
  {
    $this->kind = $kind;
  }
  public function getKind()
  {
    return $this->kind;
  }
  /**
   * @param Google_Service_DoubleClickBidManager_QueryMetadata
   */
  public function setMetadata(Google_Service_DoubleClickBidManager_QueryMetadata $metadata)
  {
    $this->metadata = $metadata;
  }
  /**
   * @return Google_Service_DoubleClickBidManager_QueryMetadata
   */
  public function getMetadata()
  {
    return $this->metadata;
  }
  /**
   * @param Google_Service_DoubleClickBidManager_Parameters
   */
  public function setParams(Google_Service_DoubleClickBidManager_Parameters $params)
  {
    $this->params = $params;
  }
  /**
   * @return Google_Service_DoubleClickBidManager_Parameters
   */
  public function getParams()
  {
    return $this->params;
  }
  public function setQueryId($queryId)
  {
    $this->queryId = $queryId;
  }
  public function getQueryId()
  {
    return $this->queryId;
  }
  public function setReportDataEndTimeMs($reportDataEndTimeMs)
  {
    $this->reportDataEndTimeMs = $reportDataEndTimeMs;
  }
  public function getReportDataEndTimeMs()
  {
    return $this->reportDataEndTimeMs;
  }
  public function setReportDataStartTimeMs($reportDataStartTimeMs)
  {
    $this->reportDataStartTimeMs = $reportDataStartTimeMs;
  }
  public function getReportDataStartTimeMs()
  {
    return $this->reportDataStartTimeMs;
  }
  /**
   * @param Google_Service_DoubleClickBidManager_QuerySchedule
   */
  public function setSchedule(Google_Service_DoubleClickBidManager_QuerySchedule $schedule)
  {
    $this->schedule = $schedule;
  }
  /**
   * @return Google_Service_DoubleClickBidManager_QuerySchedule
   */
  public function getSchedule()
  {
    return $this->schedule;
  }
  public function setTimezoneCode($timezoneCode)
  {
    $this->timezoneCode = $timezoneCode;
  }
  public function getTimezoneCode()
  {
    return $this->timezoneCode;
  }
}
