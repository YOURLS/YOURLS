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

class Google_Service_Classroom_Guardian extends Google_Model
{
  public $guardianId;
  protected $guardianProfileType = 'Google_Service_Classroom_UserProfile';
  protected $guardianProfileDataType = '';
  public $invitedEmailAddress;
  public $studentId;

  public function setGuardianId($guardianId)
  {
    $this->guardianId = $guardianId;
  }
  public function getGuardianId()
  {
    return $this->guardianId;
  }
  /**
   * @param Google_Service_Classroom_UserProfile
   */
  public function setGuardianProfile(Google_Service_Classroom_UserProfile $guardianProfile)
  {
    $this->guardianProfile = $guardianProfile;
  }
  /**
   * @return Google_Service_Classroom_UserProfile
   */
  public function getGuardianProfile()
  {
    return $this->guardianProfile;
  }
  public function setInvitedEmailAddress($invitedEmailAddress)
  {
    $this->invitedEmailAddress = $invitedEmailAddress;
  }
  public function getInvitedEmailAddress()
  {
    return $this->invitedEmailAddress;
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
