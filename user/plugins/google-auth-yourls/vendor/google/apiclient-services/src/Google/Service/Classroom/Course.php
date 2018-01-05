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

class Google_Service_Classroom_Course extends Google_Collection
{
  protected $collection_key = 'courseMaterialSets';
  public $alternateLink;
  public $calendarId;
  public $courseGroupEmail;
  protected $courseMaterialSetsType = 'Google_Service_Classroom_CourseMaterialSet';
  protected $courseMaterialSetsDataType = 'array';
  public $courseState;
  public $creationTime;
  public $description;
  public $descriptionHeading;
  public $enrollmentCode;
  public $guardiansEnabled;
  public $id;
  public $name;
  public $ownerId;
  public $room;
  public $section;
  protected $teacherFolderType = 'Google_Service_Classroom_DriveFolder';
  protected $teacherFolderDataType = '';
  public $teacherGroupEmail;
  public $updateTime;

  public function setAlternateLink($alternateLink)
  {
    $this->alternateLink = $alternateLink;
  }
  public function getAlternateLink()
  {
    return $this->alternateLink;
  }
  public function setCalendarId($calendarId)
  {
    $this->calendarId = $calendarId;
  }
  public function getCalendarId()
  {
    return $this->calendarId;
  }
  public function setCourseGroupEmail($courseGroupEmail)
  {
    $this->courseGroupEmail = $courseGroupEmail;
  }
  public function getCourseGroupEmail()
  {
    return $this->courseGroupEmail;
  }
  /**
   * @param Google_Service_Classroom_CourseMaterialSet
   */
  public function setCourseMaterialSets($courseMaterialSets)
  {
    $this->courseMaterialSets = $courseMaterialSets;
  }
  /**
   * @return Google_Service_Classroom_CourseMaterialSet
   */
  public function getCourseMaterialSets()
  {
    return $this->courseMaterialSets;
  }
  public function setCourseState($courseState)
  {
    $this->courseState = $courseState;
  }
  public function getCourseState()
  {
    return $this->courseState;
  }
  public function setCreationTime($creationTime)
  {
    $this->creationTime = $creationTime;
  }
  public function getCreationTime()
  {
    return $this->creationTime;
  }
  public function setDescription($description)
  {
    $this->description = $description;
  }
  public function getDescription()
  {
    return $this->description;
  }
  public function setDescriptionHeading($descriptionHeading)
  {
    $this->descriptionHeading = $descriptionHeading;
  }
  public function getDescriptionHeading()
  {
    return $this->descriptionHeading;
  }
  public function setEnrollmentCode($enrollmentCode)
  {
    $this->enrollmentCode = $enrollmentCode;
  }
  public function getEnrollmentCode()
  {
    return $this->enrollmentCode;
  }
  public function setGuardiansEnabled($guardiansEnabled)
  {
    $this->guardiansEnabled = $guardiansEnabled;
  }
  public function getGuardiansEnabled()
  {
    return $this->guardiansEnabled;
  }
  public function setId($id)
  {
    $this->id = $id;
  }
  public function getId()
  {
    return $this->id;
  }
  public function setName($name)
  {
    $this->name = $name;
  }
  public function getName()
  {
    return $this->name;
  }
  public function setOwnerId($ownerId)
  {
    $this->ownerId = $ownerId;
  }
  public function getOwnerId()
  {
    return $this->ownerId;
  }
  public function setRoom($room)
  {
    $this->room = $room;
  }
  public function getRoom()
  {
    return $this->room;
  }
  public function setSection($section)
  {
    $this->section = $section;
  }
  public function getSection()
  {
    return $this->section;
  }
  /**
   * @param Google_Service_Classroom_DriveFolder
   */
  public function setTeacherFolder(Google_Service_Classroom_DriveFolder $teacherFolder)
  {
    $this->teacherFolder = $teacherFolder;
  }
  /**
   * @return Google_Service_Classroom_DriveFolder
   */
  public function getTeacherFolder()
  {
    return $this->teacherFolder;
  }
  public function setTeacherGroupEmail($teacherGroupEmail)
  {
    $this->teacherGroupEmail = $teacherGroupEmail;
  }
  public function getTeacherGroupEmail()
  {
    return $this->teacherGroupEmail;
  }
  public function setUpdateTime($updateTime)
  {
    $this->updateTime = $updateTime;
  }
  public function getUpdateTime()
  {
    return $this->updateTime;
  }
}
