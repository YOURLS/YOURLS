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

class Google_Service_AnalyticsReporting_Report extends Google_Model
{
  protected $columnHeaderType = 'Google_Service_AnalyticsReporting_ColumnHeader';
  protected $columnHeaderDataType = '';
  protected $dataType = 'Google_Service_AnalyticsReporting_ReportData';
  protected $dataDataType = '';
  public $nextPageToken;

  /**
   * @param Google_Service_AnalyticsReporting_ColumnHeader
   */
  public function setColumnHeader(Google_Service_AnalyticsReporting_ColumnHeader $columnHeader)
  {
    $this->columnHeader = $columnHeader;
  }
  /**
   * @return Google_Service_AnalyticsReporting_ColumnHeader
   */
  public function getColumnHeader()
  {
    return $this->columnHeader;
  }
  /**
   * @param Google_Service_AnalyticsReporting_ReportData
   */
  public function setData(Google_Service_AnalyticsReporting_ReportData $data)
  {
    $this->data = $data;
  }
  /**
   * @return Google_Service_AnalyticsReporting_ReportData
   */
  public function getData()
  {
    return $this->data;
  }
  public function setNextPageToken($nextPageToken)
  {
    $this->nextPageToken = $nextPageToken;
  }
  public function getNextPageToken()
  {
    return $this->nextPageToken;
  }
}
