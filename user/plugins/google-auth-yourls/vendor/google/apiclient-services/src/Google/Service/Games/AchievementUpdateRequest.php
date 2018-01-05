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

class Google_Service_Games_AchievementUpdateRequest extends Google_Model
{
  public $achievementId;
  protected $incrementPayloadType = 'Google_Service_Games_GamesAchievementIncrement';
  protected $incrementPayloadDataType = '';
  public $kind;
  protected $setStepsAtLeastPayloadType = 'Google_Service_Games_GamesAchievementSetStepsAtLeast';
  protected $setStepsAtLeastPayloadDataType = '';
  public $updateType;

  public function setAchievementId($achievementId)
  {
    $this->achievementId = $achievementId;
  }
  public function getAchievementId()
  {
    return $this->achievementId;
  }
  /**
   * @param Google_Service_Games_GamesAchievementIncrement
   */
  public function setIncrementPayload(Google_Service_Games_GamesAchievementIncrement $incrementPayload)
  {
    $this->incrementPayload = $incrementPayload;
  }
  /**
   * @return Google_Service_Games_GamesAchievementIncrement
   */
  public function getIncrementPayload()
  {
    return $this->incrementPayload;
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
   * @param Google_Service_Games_GamesAchievementSetStepsAtLeast
   */
  public function setSetStepsAtLeastPayload(Google_Service_Games_GamesAchievementSetStepsAtLeast $setStepsAtLeastPayload)
  {
    $this->setStepsAtLeastPayload = $setStepsAtLeastPayload;
  }
  /**
   * @return Google_Service_Games_GamesAchievementSetStepsAtLeast
   */
  public function getSetStepsAtLeastPayload()
  {
    return $this->setStepsAtLeastPayload;
  }
  public function setUpdateType($updateType)
  {
    $this->updateType = $updateType;
  }
  public function getUpdateType()
  {
    return $this->updateType;
  }
}
