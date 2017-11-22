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

class Google_Service_Games_Player extends Google_Model
{
  public $avatarImageUrl;
  public $bannerUrlLandscape;
  public $bannerUrlPortrait;
  public $displayName;
  protected $experienceInfoType = 'Google_Service_Games_PlayerExperienceInfo';
  protected $experienceInfoDataType = '';
  public $kind;
  protected $lastPlayedWithType = 'Google_Service_Games_Played';
  protected $lastPlayedWithDataType = '';
  protected $nameType = 'Google_Service_Games_PlayerName';
  protected $nameDataType = '';
  public $originalPlayerId;
  public $playerId;
  protected $profileSettingsType = 'Google_Service_Games_ProfileSettings';
  protected $profileSettingsDataType = '';
  public $title;

  public function setAvatarImageUrl($avatarImageUrl)
  {
    $this->avatarImageUrl = $avatarImageUrl;
  }
  public function getAvatarImageUrl()
  {
    return $this->avatarImageUrl;
  }
  public function setBannerUrlLandscape($bannerUrlLandscape)
  {
    $this->bannerUrlLandscape = $bannerUrlLandscape;
  }
  public function getBannerUrlLandscape()
  {
    return $this->bannerUrlLandscape;
  }
  public function setBannerUrlPortrait($bannerUrlPortrait)
  {
    $this->bannerUrlPortrait = $bannerUrlPortrait;
  }
  public function getBannerUrlPortrait()
  {
    return $this->bannerUrlPortrait;
  }
  public function setDisplayName($displayName)
  {
    $this->displayName = $displayName;
  }
  public function getDisplayName()
  {
    return $this->displayName;
  }
  /**
   * @param Google_Service_Games_PlayerExperienceInfo
   */
  public function setExperienceInfo(Google_Service_Games_PlayerExperienceInfo $experienceInfo)
  {
    $this->experienceInfo = $experienceInfo;
  }
  /**
   * @return Google_Service_Games_PlayerExperienceInfo
   */
  public function getExperienceInfo()
  {
    return $this->experienceInfo;
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
   * @param Google_Service_Games_Played
   */
  public function setLastPlayedWith(Google_Service_Games_Played $lastPlayedWith)
  {
    $this->lastPlayedWith = $lastPlayedWith;
  }
  /**
   * @return Google_Service_Games_Played
   */
  public function getLastPlayedWith()
  {
    return $this->lastPlayedWith;
  }
  /**
   * @param Google_Service_Games_PlayerName
   */
  public function setName(Google_Service_Games_PlayerName $name)
  {
    $this->name = $name;
  }
  /**
   * @return Google_Service_Games_PlayerName
   */
  public function getName()
  {
    return $this->name;
  }
  public function setOriginalPlayerId($originalPlayerId)
  {
    $this->originalPlayerId = $originalPlayerId;
  }
  public function getOriginalPlayerId()
  {
    return $this->originalPlayerId;
  }
  public function setPlayerId($playerId)
  {
    $this->playerId = $playerId;
  }
  public function getPlayerId()
  {
    return $this->playerId;
  }
  /**
   * @param Google_Service_Games_ProfileSettings
   */
  public function setProfileSettings(Google_Service_Games_ProfileSettings $profileSettings)
  {
    $this->profileSettings = $profileSettings;
  }
  /**
   * @return Google_Service_Games_ProfileSettings
   */
  public function getProfileSettings()
  {
    return $this->profileSettings;
  }
  public function setTitle($title)
  {
    $this->title = $title;
  }
  public function getTitle()
  {
    return $this->title;
  }
}
