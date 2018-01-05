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

class Google_Service_DLP_GooglePrivacyDlpV2beta1Value extends Google_Model
{
  public $booleanValue;
  protected $dateValueType = 'Google_Service_DLP_GoogleTypeDate';
  protected $dateValueDataType = '';
  public $floatValue;
  public $integerValue;
  public $stringValue;
  protected $timeValueType = 'Google_Service_DLP_GoogleTypeTimeOfDay';
  protected $timeValueDataType = '';
  public $timestampValue;

  public function setBooleanValue($booleanValue)
  {
    $this->booleanValue = $booleanValue;
  }
  public function getBooleanValue()
  {
    return $this->booleanValue;
  }
  /**
   * @param Google_Service_DLP_GoogleTypeDate
   */
  public function setDateValue(Google_Service_DLP_GoogleTypeDate $dateValue)
  {
    $this->dateValue = $dateValue;
  }
  /**
   * @return Google_Service_DLP_GoogleTypeDate
   */
  public function getDateValue()
  {
    return $this->dateValue;
  }
  public function setFloatValue($floatValue)
  {
    $this->floatValue = $floatValue;
  }
  public function getFloatValue()
  {
    return $this->floatValue;
  }
  public function setIntegerValue($integerValue)
  {
    $this->integerValue = $integerValue;
  }
  public function getIntegerValue()
  {
    return $this->integerValue;
  }
  public function setStringValue($stringValue)
  {
    $this->stringValue = $stringValue;
  }
  public function getStringValue()
  {
    return $this->stringValue;
  }
  /**
   * @param Google_Service_DLP_GoogleTypeTimeOfDay
   */
  public function setTimeValue(Google_Service_DLP_GoogleTypeTimeOfDay $timeValue)
  {
    $this->timeValue = $timeValue;
  }
  /**
   * @return Google_Service_DLP_GoogleTypeTimeOfDay
   */
  public function getTimeValue()
  {
    return $this->timeValue;
  }
  public function setTimestampValue($timestampValue)
  {
    $this->timestampValue = $timestampValue;
  }
  public function getTimestampValue()
  {
    return $this->timestampValue;
  }
}
