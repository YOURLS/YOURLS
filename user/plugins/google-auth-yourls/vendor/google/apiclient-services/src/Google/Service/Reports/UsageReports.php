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

class Google_Service_Reports_UsageReports extends Google_Collection
{
  protected $collection_key = 'warnings';
  public $etag;
  public $kind;
  public $nextPageToken;
  protected $usageReportsType = 'Google_Service_Reports_UsageReport';
  protected $usageReportsDataType = 'array';
  protected $warningsType = 'Google_Service_Reports_UsageReportsWarnings';
  protected $warningsDataType = 'array';

  public function setEtag($etag)
  {
    $this->etag = $etag;
  }
  public function getEtag()
  {
    return $this->etag;
  }
  public function setKind($kind)
  {
    $this->kind = $kind;
  }
  public function getKind()
  {
    return $this->kind;
  }
  public function setNextPageToken($nextPageToken)
  {
    $this->nextPageToken = $nextPageToken;
  }
  public function getNextPageToken()
  {
    return $this->nextPageToken;
  }
  /**
   * @param Google_Service_Reports_UsageReport
   */
  public function setUsageReports($usageReports)
  {
    $this->usageReports = $usageReports;
  }
  /**
   * @return Google_Service_Reports_UsageReport
   */
  public function getUsageReports()
  {
    return $this->usageReports;
  }
  /**
   * @param Google_Service_Reports_UsageReportsWarnings
   */
  public function setWarnings($warnings)
  {
    $this->warnings = $warnings;
  }
  /**
   * @return Google_Service_Reports_UsageReportsWarnings
   */
  public function getWarnings()
  {
    return $this->warnings;
  }
}
