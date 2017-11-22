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

class Google_Service_Dfareporting_VideoSettings extends Google_Model
{
  protected $companionSettingsType = 'Google_Service_Dfareporting_CompanionSetting';
  protected $companionSettingsDataType = '';
  public $kind;
  public $orientation;
  protected $skippableSettingsType = 'Google_Service_Dfareporting_SkippableSetting';
  protected $skippableSettingsDataType = '';
  protected $transcodeSettingsType = 'Google_Service_Dfareporting_TranscodeSetting';
  protected $transcodeSettingsDataType = '';

  /**
   * @param Google_Service_Dfareporting_CompanionSetting
   */
  public function setCompanionSettings(Google_Service_Dfareporting_CompanionSetting $companionSettings)
  {
    $this->companionSettings = $companionSettings;
  }
  /**
   * @return Google_Service_Dfareporting_CompanionSetting
   */
  public function getCompanionSettings()
  {
    return $this->companionSettings;
  }
  public function setKind($kind)
  {
    $this->kind = $kind;
  }
  public function getKind()
  {
    return $this->kind;
  }
  public function setOrientation($orientation)
  {
    $this->orientation = $orientation;
  }
  public function getOrientation()
  {
    return $this->orientation;
  }
  /**
   * @param Google_Service_Dfareporting_SkippableSetting
   */
  public function setSkippableSettings(Google_Service_Dfareporting_SkippableSetting $skippableSettings)
  {
    $this->skippableSettings = $skippableSettings;
  }
  /**
   * @return Google_Service_Dfareporting_SkippableSetting
   */
  public function getSkippableSettings()
  {
    return $this->skippableSettings;
  }
  /**
   * @param Google_Service_Dfareporting_TranscodeSetting
   */
  public function setTranscodeSettings(Google_Service_Dfareporting_TranscodeSetting $transcodeSettings)
  {
    $this->transcodeSettings = $transcodeSettings;
  }
  /**
   * @return Google_Service_Dfareporting_TranscodeSetting
   */
  public function getTranscodeSettings()
  {
    return $this->transcodeSettings;
  }
}
