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

class Google_Service_ServiceControl_MetricValue extends Google_Model
{
  public $boolValue;
  protected $distributionValueType = 'Google_Service_ServiceControl_Distribution';
  protected $distributionValueDataType = '';
  public $doubleValue;
  public $endTime;
  public $int64Value;
  public $labels;
  protected $moneyValueType = 'Google_Service_ServiceControl_Money';
  protected $moneyValueDataType = '';
  public $startTime;
  public $stringValue;

  public function setBoolValue($boolValue)
  {
    $this->boolValue = $boolValue;
  }
  public function getBoolValue()
  {
    return $this->boolValue;
  }
  /**
   * @param Google_Service_ServiceControl_Distribution
   */
  public function setDistributionValue(Google_Service_ServiceControl_Distribution $distributionValue)
  {
    $this->distributionValue = $distributionValue;
  }
  /**
   * @return Google_Service_ServiceControl_Distribution
   */
  public function getDistributionValue()
  {
    return $this->distributionValue;
  }
  public function setDoubleValue($doubleValue)
  {
    $this->doubleValue = $doubleValue;
  }
  public function getDoubleValue()
  {
    return $this->doubleValue;
  }
  public function setEndTime($endTime)
  {
    $this->endTime = $endTime;
  }
  public function getEndTime()
  {
    return $this->endTime;
  }
  public function setInt64Value($int64Value)
  {
    $this->int64Value = $int64Value;
  }
  public function getInt64Value()
  {
    return $this->int64Value;
  }
  public function setLabels($labels)
  {
    $this->labels = $labels;
  }
  public function getLabels()
  {
    return $this->labels;
  }
  /**
   * @param Google_Service_ServiceControl_Money
   */
  public function setMoneyValue(Google_Service_ServiceControl_Money $moneyValue)
  {
    $this->moneyValue = $moneyValue;
  }
  /**
   * @return Google_Service_ServiceControl_Money
   */
  public function getMoneyValue()
  {
    return $this->moneyValue;
  }
  public function setStartTime($startTime)
  {
    $this->startTime = $startTime;
  }
  public function getStartTime()
  {
    return $this->startTime;
  }
  public function setStringValue($stringValue)
  {
    $this->stringValue = $stringValue;
  }
  public function getStringValue()
  {
    return $this->stringValue;
  }
}
