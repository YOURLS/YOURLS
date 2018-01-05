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

class Google_Service_Devprojects_QuotaInfo extends Google_Model
{
  public $allBlocked;
  protected $billableDailyLimitType = 'Google_Service_Devprojects_ApiLimitStatus';
  protected $billableDailyLimitDataType = '';
  protected $bucketBillableDailyLimitType = 'Google_Service_Devprojects_BucketLimitStatus';
  protected $bucketBillableDailyLimitDataType = '';
  protected $bucketDailyReportType = 'Google_Service_Devprojects_BucketLimitStatus';
  protected $bucketDailyReportDataType = '';
  protected $bucketPerVisitorLimitType = 'Google_Service_Devprojects_BucketLimitStatus';
  protected $bucketPerVisitorLimitDataType = '';
  protected $bucketVariableTermQuotaType = 'Google_Service_Devprojects_BucketLimitStatus';
  protected $bucketVariableTermQuotaDataType = '';
  protected $concurrentReportType = 'Google_Service_Devprojects_ApiLimitStatus';
  protected $concurrentReportDataType = '';
  protected $dailyReportType = 'Google_Service_Devprojects_ApiLimitStatus';
  protected $dailyReportDataType = '';
  public $kind;
  protected $perProjectLimitType = 'Google_Service_Devprojects_ApiLimitStatus';
  protected $perProjectLimitDataType = '';
  protected $perVisitorLimitType = 'Google_Service_Devprojects_ApiLimitStatus';
  protected $perVisitorLimitDataType = '';
  protected $variableTermQuotaType = 'Google_Service_Devprojects_ApiLimitStatus';
  protected $variableTermQuotaDataType = '';

  public function setAllBlocked($allBlocked)
  {
    $this->allBlocked = $allBlocked;
  }
  public function getAllBlocked()
  {
    return $this->allBlocked;
  }
  public function setBillableDailyLimit(Google_Service_Devprojects_ApiLimitStatus $billableDailyLimit)
  {
    $this->billableDailyLimit = $billableDailyLimit;
  }
  public function getBillableDailyLimit()
  {
    return $this->billableDailyLimit;
  }
  public function setBucketBillableDailyLimit(Google_Service_Devprojects_BucketLimitStatus $bucketBillableDailyLimit)
  {
    $this->bucketBillableDailyLimit = $bucketBillableDailyLimit;
  }
  public function getBucketBillableDailyLimit()
  {
    return $this->bucketBillableDailyLimit;
  }
  public function setBucketDailyReport(Google_Service_Devprojects_BucketLimitStatus $bucketDailyReport)
  {
    $this->bucketDailyReport = $bucketDailyReport;
  }
  public function getBucketDailyReport()
  {
    return $this->bucketDailyReport;
  }
  public function setBucketPerVisitorLimit(Google_Service_Devprojects_BucketLimitStatus $bucketPerVisitorLimit)
  {
    $this->bucketPerVisitorLimit = $bucketPerVisitorLimit;
  }
  public function getBucketPerVisitorLimit()
  {
    return $this->bucketPerVisitorLimit;
  }
  public function setBucketVariableTermQuota(Google_Service_Devprojects_BucketLimitStatus $bucketVariableTermQuota)
  {
    $this->bucketVariableTermQuota = $bucketVariableTermQuota;
  }
  public function getBucketVariableTermQuota()
  {
    return $this->bucketVariableTermQuota;
  }
  public function setConcurrentReport(Google_Service_Devprojects_ApiLimitStatus $concurrentReport)
  {
    $this->concurrentReport = $concurrentReport;
  }
  public function getConcurrentReport()
  {
    return $this->concurrentReport;
  }
  public function setDailyReport(Google_Service_Devprojects_ApiLimitStatus $dailyReport)
  {
    $this->dailyReport = $dailyReport;
  }
  public function getDailyReport()
  {
    return $this->dailyReport;
  }
  public function setKind($kind)
  {
    $this->kind = $kind;
  }
  public function getKind()
  {
    return $this->kind;
  }
  public function setPerProjectLimit(Google_Service_Devprojects_ApiLimitStatus $perProjectLimit)
  {
    $this->perProjectLimit = $perProjectLimit;
  }
  public function getPerProjectLimit()
  {
    return $this->perProjectLimit;
  }
  public function setPerVisitorLimit(Google_Service_Devprojects_ApiLimitStatus $perVisitorLimit)
  {
    $this->perVisitorLimit = $perVisitorLimit;
  }
  public function getPerVisitorLimit()
  {
    return $this->perVisitorLimit;
  }
  public function setVariableTermQuota(Google_Service_Devprojects_ApiLimitStatus $variableTermQuota)
  {
    $this->variableTermQuota = $variableTermQuota;
  }
  public function getVariableTermQuota()
  {
    return $this->variableTermQuota;
  }
}
