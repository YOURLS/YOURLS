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

class Google_Service_GamesManagement_GamesPlayerExperienceInfoResource extends Google_Model
{
  public $currentExperiencePoints;
  protected $currentLevelType = 'Google_Service_GamesManagement_GamesPlayerLevelResource';
  protected $currentLevelDataType = '';
  public $lastLevelUpTimestampMillis;
  protected $nextLevelType = 'Google_Service_GamesManagement_GamesPlayerLevelResource';
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
   * @param Google_Service_GamesManagement_GamesPlayerLevelResource
   */
  public function setCurrentLevel(Google_Service_GamesManagement_GamesPlayerLevelResource $currentLevel)
  {
    $this->currentLevel = $currentLevel;
  }
  /**
   * @return Google_Service_GamesManagement_GamesPlayerLevelResource
   */
  public function getCurrentLevel()
  {
    return $this->currentLevel;
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
   * @param Google_Service_GamesManagement_GamesPlayerLevelResource
   */
  public function setNextLevel(Google_Service_GamesManagement_GamesPlayerLevelResource $nextLevel)
  {
    $this->nextLevel = $nextLevel;
  }
  /**
   * @return Google_Service_GamesManagement_GamesPlayerLevelResource
   */
  public function getNextLevel()
  {
    return $this->nextLevel;
  }
}
