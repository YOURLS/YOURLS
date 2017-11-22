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

class Google_Service_Dfareporting_DirectorySiteSettings extends Google_Model
{
  public $activeViewOptOut;
  protected $dfpSettingsType = 'Google_Service_Dfareporting_DfpSettings';
  protected $dfpSettingsDataType = '';
  public $instreamVideoPlacementAccepted;
  public $interstitialPlacementAccepted;
  public $nielsenOcrOptOut;
  public $verificationTagOptOut;
  public $videoActiveViewOptOut;

  public function setActiveViewOptOut($activeViewOptOut)
  {
    $this->activeViewOptOut = $activeViewOptOut;
  }
  public function getActiveViewOptOut()
  {
    return $this->activeViewOptOut;
  }
  /**
   * @param Google_Service_Dfareporting_DfpSettings
   */
  public function setDfpSettings(Google_Service_Dfareporting_DfpSettings $dfpSettings)
  {
    $this->dfpSettings = $dfpSettings;
  }
  /**
   * @return Google_Service_Dfareporting_DfpSettings
   */
  public function getDfpSettings()
  {
    return $this->dfpSettings;
  }
  public function setInstreamVideoPlacementAccepted($instreamVideoPlacementAccepted)
  {
    $this->instreamVideoPlacementAccepted = $instreamVideoPlacementAccepted;
  }
  public function getInstreamVideoPlacementAccepted()
  {
    return $this->instreamVideoPlacementAccepted;
  }
  public function setInterstitialPlacementAccepted($interstitialPlacementAccepted)
  {
    $this->interstitialPlacementAccepted = $interstitialPlacementAccepted;
  }
  public function getInterstitialPlacementAccepted()
  {
    return $this->interstitialPlacementAccepted;
  }
  public function setNielsenOcrOptOut($nielsenOcrOptOut)
  {
    $this->nielsenOcrOptOut = $nielsenOcrOptOut;
  }
  public function getNielsenOcrOptOut()
  {
    return $this->nielsenOcrOptOut;
  }
  public function setVerificationTagOptOut($verificationTagOptOut)
  {
    $this->verificationTagOptOut = $verificationTagOptOut;
  }
  public function getVerificationTagOptOut()
  {
    return $this->verificationTagOptOut;
  }
  public function setVideoActiveViewOptOut($videoActiveViewOptOut)
  {
    $this->videoActiveViewOptOut = $videoActiveViewOptOut;
  }
  public function getVideoActiveViewOptOut()
  {
    return $this->videoActiveViewOptOut;
  }
}
