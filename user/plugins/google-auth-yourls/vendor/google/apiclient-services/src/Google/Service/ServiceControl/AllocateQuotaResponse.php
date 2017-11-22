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

class Google_Service_ServiceControl_AllocateQuotaResponse extends Google_Collection
{
  protected $collection_key = 'quotaMetrics';
  protected $allocateErrorsType = 'Google_Service_ServiceControl_QuotaError';
  protected $allocateErrorsDataType = 'array';
  protected $allocateInfoType = 'Google_Service_ServiceControl_AllocateInfo';
  protected $allocateInfoDataType = '';
  public $operationId;
  protected $quotaMetricsType = 'Google_Service_ServiceControl_MetricValueSet';
  protected $quotaMetricsDataType = 'array';
  public $serviceConfigId;

  /**
   * @param Google_Service_ServiceControl_QuotaError
   */
  public function setAllocateErrors($allocateErrors)
  {
    $this->allocateErrors = $allocateErrors;
  }
  /**
   * @return Google_Service_ServiceControl_QuotaError
   */
  public function getAllocateErrors()
  {
    return $this->allocateErrors;
  }
  /**
   * @param Google_Service_ServiceControl_AllocateInfo
   */
  public function setAllocateInfo(Google_Service_ServiceControl_AllocateInfo $allocateInfo)
  {
    $this->allocateInfo = $allocateInfo;
  }
  /**
   * @return Google_Service_ServiceControl_AllocateInfo
   */
  public function getAllocateInfo()
  {
    return $this->allocateInfo;
  }
  public function setOperationId($operationId)
  {
    $this->operationId = $operationId;
  }
  public function getOperationId()
  {
    return $this->operationId;
  }
  /**
   * @param Google_Service_ServiceControl_MetricValueSet
   */
  public function setQuotaMetrics($quotaMetrics)
  {
    $this->quotaMetrics = $quotaMetrics;
  }
  /**
   * @return Google_Service_ServiceControl_MetricValueSet
   */
  public function getQuotaMetrics()
  {
    return $this->quotaMetrics;
  }
  public function setServiceConfigId($serviceConfigId)
  {
    $this->serviceConfigId = $serviceConfigId;
  }
  public function getServiceConfigId()
  {
    return $this->serviceConfigId;
  }
}
