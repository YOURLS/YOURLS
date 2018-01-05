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

class Google_Service_AnalyticsReporting_GetReportsRequest extends Google_Collection
{
  protected $collection_key = 'reportRequests';
  protected $reportRequestsType = 'Google_Service_AnalyticsReporting_ReportRequest';
  protected $reportRequestsDataType = 'array';
  public $useResourceQuotas;

  /**
   * @param Google_Service_AnalyticsReporting_ReportRequest
   */
  public function setReportRequests($reportRequests)
  {
    $this->reportRequests = $reportRequests;
  }
  /**
   * @return Google_Service_AnalyticsReporting_ReportRequest
   */
  public function getReportRequests()
  {
    return $this->reportRequests;
  }
  public function setUseResourceQuotas($useResourceQuotas)
  {
    $this->useResourceQuotas = $useResourceQuotas;
  }
  public function getUseResourceQuotas()
  {
    return $this->useResourceQuotas;
  }
}
