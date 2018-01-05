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

class Google_Service_AdSenseHost_AdUnit extends Google_Model
{
  public $code;
  protected $contentAdsSettingsType = 'Google_Service_AdSenseHost_AdUnitContentAdsSettings';
  protected $contentAdsSettingsDataType = '';
  protected $customStyleType = 'Google_Service_AdSenseHost_AdStyle';
  protected $customStyleDataType = '';
  public $id;
  public $kind;
  protected $mobileContentAdsSettingsType = 'Google_Service_AdSenseHost_AdUnitMobileContentAdsSettings';
  protected $mobileContentAdsSettingsDataType = '';
  public $name;
  public $status;

  public function setCode($code)
  {
    $this->code = $code;
  }
  public function getCode()
  {
    return $this->code;
  }
  /**
   * @param Google_Service_AdSenseHost_AdUnitContentAdsSettings
   */
  public function setContentAdsSettings(Google_Service_AdSenseHost_AdUnitContentAdsSettings $contentAdsSettings)
  {
    $this->contentAdsSettings = $contentAdsSettings;
  }
  /**
   * @return Google_Service_AdSenseHost_AdUnitContentAdsSettings
   */
  public function getContentAdsSettings()
  {
    return $this->contentAdsSettings;
  }
  /**
   * @param Google_Service_AdSenseHost_AdStyle
   */
  public function setCustomStyle(Google_Service_AdSenseHost_AdStyle $customStyle)
  {
    $this->customStyle = $customStyle;
  }
  /**
   * @return Google_Service_AdSenseHost_AdStyle
   */
  public function getCustomStyle()
  {
    return $this->customStyle;
  }
  public function setId($id)
  {
    $this->id = $id;
  }
  public function getId()
  {
    return $this->id;
  }
  public function setKind($kind)
  {
    $this->kind = $kind;
  }
  public function getKind()
  {
    return $this->kind;
  }
  /**
   * @param Google_Service_AdSenseHost_AdUnitMobileContentAdsSettings
   */
  public function setMobileContentAdsSettings(Google_Service_AdSenseHost_AdUnitMobileContentAdsSettings $mobileContentAdsSettings)
  {
    $this->mobileContentAdsSettings = $mobileContentAdsSettings;
  }
  /**
   * @return Google_Service_AdSenseHost_AdUnitMobileContentAdsSettings
   */
  public function getMobileContentAdsSettings()
  {
    return $this->mobileContentAdsSettings;
  }
  public function setName($name)
  {
    $this->name = $name;
  }
  public function getName()
  {
    return $this->name;
  }
  public function setStatus($status)
  {
    $this->status = $status;
  }
  public function getStatus()
  {
    return $this->status;
  }
}
