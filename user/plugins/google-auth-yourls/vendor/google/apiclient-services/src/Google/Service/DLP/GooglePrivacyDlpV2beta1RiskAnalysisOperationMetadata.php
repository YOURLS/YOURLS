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

class Google_Service_DLP_GooglePrivacyDlpV2beta1RiskAnalysisOperationMetadata extends Google_Model
{
  public $createTime;
  protected $requestedPrivacyMetricType = 'Google_Service_DLP_GooglePrivacyDlpV2beta1PrivacyMetric';
  protected $requestedPrivacyMetricDataType = '';
  protected $requestedSourceTableType = 'Google_Service_DLP_GooglePrivacyDlpV2beta1BigQueryTable';
  protected $requestedSourceTableDataType = '';

  public function setCreateTime($createTime)
  {
    $this->createTime = $createTime;
  }
  public function getCreateTime()
  {
    return $this->createTime;
  }
  /**
   * @param Google_Service_DLP_GooglePrivacyDlpV2beta1PrivacyMetric
   */
  public function setRequestedPrivacyMetric(Google_Service_DLP_GooglePrivacyDlpV2beta1PrivacyMetric $requestedPrivacyMetric)
  {
    $this->requestedPrivacyMetric = $requestedPrivacyMetric;
  }
  /**
   * @return Google_Service_DLP_GooglePrivacyDlpV2beta1PrivacyMetric
   */
  public function getRequestedPrivacyMetric()
  {
    return $this->requestedPrivacyMetric;
  }
  /**
   * @param Google_Service_DLP_GooglePrivacyDlpV2beta1BigQueryTable
   */
  public function setRequestedSourceTable(Google_Service_DLP_GooglePrivacyDlpV2beta1BigQueryTable $requestedSourceTable)
  {
    $this->requestedSourceTable = $requestedSourceTable;
  }
  /**
   * @return Google_Service_DLP_GooglePrivacyDlpV2beta1BigQueryTable
   */
  public function getRequestedSourceTable()
  {
    return $this->requestedSourceTable;
  }
}
