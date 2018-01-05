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

class Google_Service_Games_PlayerExperienceInfo extends Google_Model
{
  public $currentExperiencePoints;
  protected $currentLevelType = 'Google_Service_Games_PlayerLevel';
  protected $currentLevelDataType = '';
  public $kind;
  public $lastLevelUpTimestampMillis;
  protected $nextLevelType = 'Google_Service_Games_PlayerLevel';
  protected $nextLevelDataType = '';

  public function setCurrentExperiencePoints($currentExperiencePoints)
  {
    $this->currentExperiencePoints = $currentExperiencePoints;
  }
  public function getCurrentExperiencePoints()
  {
    return $this->currentExperiencePoints;
  }
  /**
   * @param Google_Service_Games_PlayerLevel
   */
  public function setCurrentLevel(Google_Service_Games_PlayerLevel $currentLevel)
  {
    $this->currentLevel = $currentLevel;
  }
  /**
   * @return Google_Service_Games_PlayerLevel
   */
  public function getCurrentLevel()
  {
    return $this->currentLevel;
  }
  public function setKind($kind)
  {
    $this->kind = $kind;
  }
  public function getKind()
  {
    return $this->kind;
  }
  public function setLastLevelUpTimestampMillis($lastLevelUpTimestampMillis)
  {
    $this->lastLevelUpTimestampMillis = $lastLevelUpTimestampMillis;
  }
  public function getLastLevelUpTimestampMillis()
  {
    return $this->lastLevelUpTimestampMillis;
  }
  /**
   * @param Google_Service_Games_PlayerLevel
   */
  public function setNextLevel(Google_Service_Games_PlayerLevel $nextLevel)
  {
    $this->nextLevel = $nextLevel;
  }
  /**
   * @return Google_Service_Games_PlayerLevel
   */
  public function getNextLevel()
  {
    return $this->nextLevel;
  }
}
