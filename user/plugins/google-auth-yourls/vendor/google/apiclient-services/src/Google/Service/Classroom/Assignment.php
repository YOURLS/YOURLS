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

class Google_Service_Classroom_Assignment extends Google_Model
{
  protected $studentWorkFolderType = 'Google_Service_Classroom_DriveFolder';
  protected $studentWorkFolderDataType = '';

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
}
