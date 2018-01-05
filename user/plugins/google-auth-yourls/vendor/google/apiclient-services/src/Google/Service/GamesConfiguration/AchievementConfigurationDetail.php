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

class Google_Service_GamesConfiguration_AchievementConfigurationDetail extends Google_Model
{
  protected $descriptionType = 'Google_Service_GamesConfiguration_LocalizedStringBundle';
  protected $descriptionDataType = '';
  public $iconUrl;
  public $kind;
  protected $nameType = 'Google_Service_GamesConfiguration_LocalizedStringBundle';
  protected $nameDataType = '';
  public $pointValue;
  public $sortRank;

  /**
   * @param Google_Service_GamesConfiguration_LocalizedStringBundle
   */
  public function setDescription(Google_Service_GamesConfiguration_LocalizedStringBundle $description)
  {
    $this->description = $description;
  }
  /**
   * @return Google_Service_GamesConfiguration_LocalizedStringBundle
   */
  public function getDescription()
  {
    return $this->description;
  }
  public function setIconUrl($iconUrl)
  {
    $this->iconUrl = $iconUrl;
  }
  public function getIconUrl()
  {
    return $this->iconUrl;
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
   * @param Google_Service_GamesConfiguration_LocalizedStringBundle
   */
  public function setName(Google_Service_GamesConfiguration_LocalizedStringBundle $name)
  {
    $this->name = $name;
  }
  /**
   * @return Google_Service_GamesConfiguration_LocalizedStringBundle
   */
  public function getName()
  {
    return $this->name;
  }
  public function setPointValue($pointValue)
  {
    $this->pointValue = $pointValue;
  }
  public function getPointValue()
  {
    return $this->pointValue;
  }
  public function setSortRank($sortRank)
  {
    $this->sortRank = $sortRank;
  }
  public function getSortRank()
  {
    return $this->sortRank;
  }
}
