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

class Google_Service_ServiceControl_QuotaOperation extends Google_Collection
{
  protected $collection_key = 'quotaMetrics';
  public $consumerId;
  public $labels;
  public $methodName;
  public $operationId;
  protected $quotaMetricsType = 'Google_Service_ServiceControl_MetricValueSet';
  protected $quotaMetricsDataType = 'array';
  public $quotaMode;

  public function setConsumerId($consumerId)
  {
    $this->consumerId = $consumerId;
  }
  public function getConsumerId()
  {
    return $this->consumerId;
  }
  public function setLabels($labels)
  {
    $this->labels = $labels;
  }
  public function getLabels()
  {
    return $this->labels;
  }
  public function setMethodName($methodName)
  {
    $this->methodName = $methodName;
  }
  public function getMethodName()
  {
    return $this->methodName;
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
  public function setQuotaMode($quotaMode)
  {
    $this->quotaMode = $quotaMode;
  }
  public function getQuotaMode()
  {
    return $this->quotaMode;
  }
}
