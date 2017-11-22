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

class Google_Service_Devprojects_QuotaConfiguration extends Google_Collection
{
  protected $collection_key = 'whitelist';
  public $allBlocked;
  protected $billableDailyLimitType = 'Google_Service_Devprojects_ApiLimitStatus';
  protected $billableDailyLimitDataType = 'array';
  protected $bucketBillableDailyLimitType = 'Google_Service_Devprojects_BucketLimitStatus';
  protected $bucketBillableDailyLimitDataType = 'array';
  protected $bucketDailyReportType = 'Google_Service_Devprojects_BucketLimitStatus';
  protected $bucketDailyReportDataType = 'array';
  protected $bucketPerVisitorLimitType = 'Google_Service_Devprojects_BucketLimitStatus';
  protected $bucketPerVisitorLimitDataType = 'array';
  protected $concurrentReportType = 'Google_Service_Devprojects_ApiLimitStatus';
  protected $concurrentReportDataType = 'array';
  public $configurationType;
  protected $dailyReportType = 'Google_Service_Devprojects_ApiLimitStatus';
  protected $dailyReportDataType = 'array';
  public $hasUserip;
  public $kind;
  protected $perProjectLimitType = 'Google_Service_Devprojects_ApiLimitStatus';
  protected $perProjectLimitDataType = 'array';
  protected $perVisitorLimitType = 'Google_Service_Devprojects_ApiLimitStatus';
  protected $perVisitorLimitDataType = 'array';
  protected $variableTermQuotaType = 'Google_Service_Devprojects_ApiLimitStatus';
  protected $variableTermQuotaDataType = 'array';
  public $whitelist;

  public function setAllBlocked($allBlocked)
  {
    $this->allBlocked = $allBlocked;
  }
  public function getAllBlocked()
  {
    return $this->allBlocked;
  }
  public function setBillableDailyLimit($billableDailyLimit)
  {
    $this->billableDailyLimit = $billableDailyLimit;
  }
  public function getBillableDailyLimit()
  {
    return $this->billableDailyLimit;
  }
  public function setBucketBillableDailyLimit($bucketBillableDailyLimit)
  {
    $this->bucketBillableDailyLimit = $bucketBillableDailyLimit;
  }
  public function getBucketBillableDailyLimit()
  {
    return $this->bucketBillableDailyLimit;
  }
  public function setBucketDailyReport($bucketDailyReport)
  {
    $this->bucketDailyReport = $bucketDailyReport;
  }
  public function getBucketDailyReport()
  {
    return $this->bucketDailyReport;
  }
  public function setBucketPerVisitorLimit($bucketPerVisitorLimit)
  {
    $this->bucketPerVisitorLimit = $bucketPerVisitorLimit;
  }
  public function getBucketPerVisitorLimit()
  {
    return $this->bucketPerVisitorLimit;
  }
  public function setConcurrentReport($concurrentReport)
  {
    $this->concurrentReport = $concurrentReport;
  }
  public function getConcurrentReport()
  {
    return $this->concurrentReport;
  }
  public function setConfigurationType($configurationType)
  {
    $this->configurationType = $configurationType;
  }
  public function getConfigurationType()
  {
    return $this->configurationType;
  }
  public function setDailyReport($dailyReport)
  {
    $this->dailyReport = $dailyReport;
  }
  public function getDailyReport()
  {
    return $this->dailyReport;
  }
  public function setHasUserip($hasUserip)
  {
    $this->hasUserip = $hasUserip;
  }
  public function getHasUserip()
  {
    return $this->hasUserip;
  }
  public function setKind($kind)
  {
    $this->kind = $kind;
  }
  public function getKind()
  {
    return $this->kind;
  }
  public function setPerProjectLimit($perProjectLimit)
  {
    $this->perProjectLimit = $perProjectLimit;
  }
  public function getPerProjectLimit()
  {
    return $this->perProjectLimit;
  }
  public function setPerVisitorLimit($perVisitorLimit)
  {
    $this->perVisitorLimit = $perVisitorLimit;
  }
  public function getPerVisitorLimit()
  {
    return $this->perVisitorLimit;
  }
  public function setVariableTermQuota($variableTermQuota)
  {
    $this->variableTermQuota = $variableTermQuota;
  }
  public function getVariableTermQuota()
  {
    return $this->variableTermQuota;
  }
  public function setWhitelist($whitelist)
  {
    $this->whitelist = $whitelist;
  }
  public function getWhitelist()
  {
    return $this->whitelist;
  }
}
