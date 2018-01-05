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

class Google_Service_Classroom_Student extends Google_Model
{
  public $courseId;
  protected $profileType = 'Google_Service_Classroom_UserProfile';
  protected $profileDataType = '';
  protected $studentWorkFolderType = 'Google_Service_Classroom_DriveFolder';
  protected $studentWorkFolderDataType = '';
  public $userId;

  public function setCourseId($courseId)
  {
    $this->courseId = $courseId;
  }
  public function getCourseId()
  {
    return $this->courseId;
  }
  /**
   * @param Google_Service_Classroom_UserProfile
   */
  public function setProfile(Google_Service_Classroom_UserProfile $profile)
  {
    $this->profile = $profile;
  }
  /**
   * @return Google_Service_Classroom_UserProfile
   */
  public function getProfile()
  {
    return $this->profile;
  }
  /**
   * @param Google_Service_Classroom_DriveFolder
   */
  public function setStudentWorkFolder(Google_Service_Classroom_DriveFolder $studentWorkFolder)
  {
    $this->studentWorkFolder = $studentWorkFolder;
  }
  /**
   * @return Google_Service_Classroom_DriveFolder
   */
  public function getStudentWorkFolder()
  {
    return $this->studentWorkFolder;
  }
  public function setUserId($userId)
  {
    $this->userId = $userId;
  }
  public function getUserId()
  {
    return $this->userId;
  }
}
