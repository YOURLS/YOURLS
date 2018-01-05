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

class Google_Service_Classroom_Feed extends Google_Model
{
  protected $courseRosterChangesInfoType = 'Google_Service_Classroom_CourseRosterChangesInfo';
  protected $courseRosterChangesInfoDataType = '';
  public $feedType;

  /**
   * @param Google_Service_Classroom_CourseRosterChangesInfo
   */
  public function setCourseRosterChangesInfo(Google_Service_Classroom_CourseRosterChangesInfo $courseRosterChangesInfo)
  {
    $this->courseRosterChangesInfo = $courseRosterChangesInfo;
  }
  /**
   * @return Google_Service_Classroom_CourseRosterChangesInfo
   */
  public function getCourseRosterChangesInfo()
  {
    return $this->courseRosterChangesInfo;
  }
  public function setFeedType($feedType)
  {
    $this->feedType = $feedType;
  }
  public function getFeedType()
  {
    return $this->feedType;
  }
}
