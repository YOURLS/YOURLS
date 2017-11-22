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

class Google_Service_Classroom_GradeHistory extends Google_Model
{
  public $actorUserId;
  public $gradeChangeType;
  public $gradeTimestamp;
  public $maxPoints;
  public $pointsEarned;

  public function setActorUserId($actorUserId)
  {
    $this->actorUserId = $actorUserId;
  }
  public function getActorUserId()
  {
    return $this->actorUserId;
  }
  public function setGradeChangeType($gradeChangeType)
  {
    $this->gradeChangeType = $gradeChangeType;
  }
  public function getGradeChangeType()
  {
    return $this->gradeChangeType;
  }
  public function setGradeTimestamp($gradeTimestamp)
  {
    $this->gradeTimestamp = $gradeTimestamp;
  }
  public function getGradeTimestamp()
  {
    return $this->gradeTimestamp;
  }
  public function setMaxPoints($maxPoints)
  {
    $this->maxPoints = $maxPoints;
  }
  public function getMaxPoints()
  {
    return $this->maxPoints;
  }
  public function setPointsEarned($pointsEarned)
  {
    $this->pointsEarned = $pointsEarned;
  }
  public function getPointsEarned()
  {
    return $this->pointsEarned;
  }
}
