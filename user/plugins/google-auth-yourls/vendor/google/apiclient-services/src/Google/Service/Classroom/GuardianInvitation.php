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

class Google_Service_Classroom_GuardianInvitation extends Google_Model
{
  public $creationTime;
  public $invitationId;
  public $invitedEmailAddress;
  public $state;
  public $studentId;

  public function setCreationTime($creationTime)
  {
    $this->creationTime = $creationTime;
  }
  public function getCreationTime()
  {
    return $this->creationTime;
  }
  public function setInvitationId($invitationId)
  {
    $this->invitationId = $invitationId;
  }
  public function getInvitationId()
  {
    return $this->invitationId;
  }
  public function setInvitedEmailAddress($invitedEmailAddress)
  {
    $this->invitedEmailAddress = $invitedEmailAddress;
  }
  public function getInvitedEmailAddress()
  {
    return $this->invitedEmailAddress;
  }
  public function setState($state)
  {
    $this->state = $state;
  }
  public function getState()
  {
    return $this->state;
  }
  public function setStudentId($studentId)
  {
    $this->studentId = $studentId;
  }
  public function getStudentId()
  {
    return $this->studentId;
  }
}
