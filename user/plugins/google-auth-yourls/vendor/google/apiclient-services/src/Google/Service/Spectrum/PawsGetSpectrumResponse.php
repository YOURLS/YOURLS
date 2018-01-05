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

class Google_Service_Spectrum_PawsGetSpectrumResponse extends Google_Collection
{
  protected $collection_key = 'spectrumSchedules';
  protected $databaseChangeType = 'Google_Service_Spectrum_DbUpdateSpec';
  protected $databaseChangeDataType = '';
  protected $deviceDescType = 'Google_Service_Spectrum_DeviceDescriptor';
  protected $deviceDescDataType = '';
  public $kind;
  public $maxContiguousBwHz;
  public $maxTotalBwHz;
  public $needsSpectrumReport;
  protected $rulesetInfoType = 'Google_Service_Spectrum_RulesetInfo';
  protected $rulesetInfoDataType = '';
  protected $spectrumSchedulesType = 'Google_Service_Spectrum_SpectrumSchedule';
  protected $spectrumSchedulesDataType = 'array';
  public $timestamp;
  public $type;
  public $version;

  /**
   * @param Google_Service_Spectrum_DbUpdateSpec
   */
  public function setDatabaseChange(Google_Service_Spectrum_DbUpdateSpec $databaseChange)
  {
    $this->databaseChange = $databaseChange;
  }
  /**
   * @return Google_Service_Spectrum_DbUpdateSpec
   */
  public function getDatabaseChange()
  {
    return $this->databaseChange;
  }
  /**
   * @param Google_Service_Spectrum_DeviceDescriptor
   */
  public function setDeviceDesc(Google_Service_Spectrum_DeviceDescriptor $deviceDesc)
  {
    $this->deviceDesc = $deviceDesc;
  }
  /**
   * @return Google_Service_Spectrum_DeviceDescriptor
   */
  public function getDeviceDesc()
  {
    return $this->deviceDesc;
  }
  public function setKind($kind)
  {
    $this->kind = $kind;
  }
  public function getKind()
  {
    return $this->kind;
  }
  public function setMaxContiguousBwHz($maxContiguousBwHz)
  {
    $this->maxContiguousBwHz = $maxContiguousBwHz;
  }
  public function getMaxContiguousBwHz()
  {
    return $this->maxContiguousBwHz;
  }
  public function setMaxTotalBwHz($maxTotalBwHz)
  {
    $this->maxTotalBwHz = $maxTotalBwHz;
  }
  public function getMaxTotalBwHz()
  {
    return $this->maxTotalBwHz;
  }
  public function setNeedsSpectrumReport($needsSpectrumReport)
  {
    $this->needsSpectrumReport = $needsSpectrumReport;
  }
  public function getNeedsSpectrumReport()
  {
    return $this->needsSpectrumReport;
  }
  /**
   * @param Google_Service_Spectrum_RulesetInfo
   */
  public function setRulesetInfo(Google_Service_Spectrum_RulesetInfo $rulesetInfo)
  {
    $this->rulesetInfo = $rulesetInfo;
  }
  /**
   * @return Google_Service_Spectrum_RulesetInfo
   */
  public function getRulesetInfo()
  {
    return $this->rulesetInfo;
  }
  /**
   * @param Google_Service_Spectrum_SpectrumSchedule
   */
  public function setSpectrumSchedules($spectrumSchedules)
  {
    $this->spectrumSchedules = $spectrumSchedules;
  }
  /**
   * @return Google_Service_Spectrum_SpectrumSchedule
   */
  public function getSpectrumSchedules()
  {
    return $this->spectrumSchedules;
  }
  public function setTimestamp($timestamp)
  {
    $this->timestamp = $timestamp;
  }
  public function getTimestamp()
  {
    return $this->timestamp;
  }
  public function setType($type)
  {
    $this->type = $type;
  }
  public function getType()
  {
    return $this->type;
  }
  public function setVersion($version)
  {
    $this->version = $version;
  }
  public function getVersion()
  {
    return $this->version;
  }
}
