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

class Google_Service_CloudMonitoring_Point extends Google_Model
{
  public $boolValue;
  protected $distributionValueType = 'Google_Service_CloudMonitoring_PointDistribution';
  protected $distributionValueDataType = '';
  public $doubleValue;
  public $end;
  public $int64Value;
  public $start;
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
   * @param Google_Service_CloudMonitoring_PointDistribution
   */
  public function setDistributionValue(Google_Service_CloudMonitoring_PointDistribution $distributionValue)
  {
    $this->distributionValue = $distributionValue;
  }
  /**
   * @return Google_Service_CloudMonitoring_PointDistribution
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
  public function setEnd($end)
  {
    $this->end = $end;
  }
  public function getEnd()
  {
    return $this->end;
  }
  public function setInt64Value($int64Value)
  {
    $this->int64Value = $int64Value;
  }
  public function getInt64Value()
  {
    return $this->int64Value;
  }
  public function setStart($start)
  {
    $this->start = $start;
  }
  public function getStart()
  {
    return $this->start;
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
