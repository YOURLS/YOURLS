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

class Google_Service_Games_AchievementUpdateResponse extends Google_Model
{
  public $achievementId;
  public $currentState;
  public $currentSteps;
  public $kind;
  public $newlyUnlocked;
  public $updateOccurred;

  public function setAchievementId($achievementId)
  {
    $this->achievementId = $achievementId;
  }
  public function getAchievementId()
  {
    return $this->achievementId;
  }
  public function setCurrentState($currentState)
  {
    $this->currentState = $currentState;
  }
  public function getCurrentState()
  {
    return $this->currentState;
  }
  public function setCurrentSteps($currentSteps)
  {
    $this->currentSteps = $currentSteps;
  }
  public function getCurrentSteps()
  {
    return $this->currentSteps;
  }
  public function setKind($kind)
  {
    $this->kind = $kind;
  }
  public function getKind()
  {
    return $this->kind;
  }
  public function setNewlyUnlocked($newlyUnlocked)
  {
    $this->newlyUnlocked = $newlyUnlocked;
  }
  public function getNewlyUnlocked()
  {
    return $this->newlyUnlocked;
  }
  public function setUpdateOccurred($updateOccurred)
  {
    $this->updateOccurred = $updateOccurred;
  }
  public function getUpdateOccurred()
  {
    return $this->updateOccurred;
  }
}
