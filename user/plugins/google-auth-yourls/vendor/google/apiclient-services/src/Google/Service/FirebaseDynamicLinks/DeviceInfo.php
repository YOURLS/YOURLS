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

class Google_Service_FirebaseDynamicLinks_DeviceInfo extends Google_Model
{
  public $deviceModelName;
  public $languageCode;
  public $languageCodeRaw;
  public $screenResolutionHeight;
  public $screenResolutionWidth;
  public $timezone;

  public function setDeviceModelName($deviceModelName)
  {
    $this->deviceModelName = $deviceModelName;
  }
  public function getDeviceModelName()
  {
    return $this->deviceModelName;
  }
  public function setLanguageCode($languageCode)
  {
    $this->languageCode = $languageCode;
  }
  public function getLanguageCode()
  {
    return $this->languageCode;
  }
  public function setLanguageCodeRaw($languageCodeRaw)
  {
    $this->languageCodeRaw = $languageCodeRaw;
  }
  public function getLanguageCodeRaw()
  {
    return $this->languageCodeRaw;
  }
  public function setScreenResolutionHeight($screenResolutionHeight)
  {
    $this->screenResolutionHeight = $screenResolutionHeight;
  }
  public function getScreenResolutionHeight()
  {
    return $this->screenResolutionHeight;
  }
  public function setScreenResolutionWidth($screenResolutionWidth)
  {
    $this->screenResolutionWidth = $screenResolutionWidth;
  }
  public function getScreenResolutionWidth()
  {
    return $this->screenResolutionWidth;
  }
  public function setTimezone($timezone)
  {
    $this->timezone = $timezone;
  }
  public function getTimezone()
  {
    return $this->timezone;
  }
}
