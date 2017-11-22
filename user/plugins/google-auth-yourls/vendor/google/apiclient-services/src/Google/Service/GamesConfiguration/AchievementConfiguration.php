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

class Google_Service_GamesConfiguration_AchievementConfiguration extends Google_Model
{
  public $achievementType;
  protected $draftType = 'Google_Service_GamesConfiguration_AchievementConfigurationDetail';
  protected $draftDataType = '';
  public $id;
  public $initialState;
  public $kind;
  protected $publishedType = 'Google_Service_GamesConfiguration_AchievementConfigurationDetail';
  protected $publishedDataType = '';
  public $stepsToUnlock;
  public $token;

  public function setAchievementType($achievementType)
  {
    $this->achievementType = $achievementType;
  }
  public function getAchievementType()
  {
    return $this->achievementType;
  }
  /**
   * @param Google_Service_GamesConfiguration_AchievementConfigurationDetail
   */
  public function setDraft(Google_Service_GamesConfiguration_AchievementConfigurationDetail $draft)
  {
    $this->draft = $draft;
  }
  /**
   * @return Google_Service_GamesConfiguration_AchievementConfigurationDetail
   */
  public function getDraft()
  {
    return $this->draft;
  }
  public function setId($id)
  {
    $this->id = $id;
  }
  public function getId()
  {
    return $this->id;
  }
  public function setInitialState($initialState)
  {
    $this->initialState = $initialState;
  }
  public function getInitialState()
  {
    return $this->initialState;
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
   * @param Google_Service_GamesConfiguration_AchievementConfigurationDetail
   */
  public function setPublished(Google_Service_GamesConfiguration_AchievementConfigurationDetail $published)
  {
    $this->published = $published;
  }
  /**
   * @return Google_Service_GamesConfiguration_AchievementConfigurationDetail
   */
  public function getPublished()
  {
    return $this->published;
  }
  public function setStepsToUnlock($stepsToUnlock)
  {
    $this->stepsToUnlock = $stepsToUnlock;
  }
  public function getStepsToUnlock()
  {
    return $this->stepsToUnlock;
  }
  public function setToken($token)
  {
    $this->token = $token;
  }
  public function getToken()
  {
    return $this->token;
  }
}
