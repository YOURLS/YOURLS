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

class Google_Service_Classroom_SubmissionHistory extends Google_Model
{
  protected $gradeHistoryType = 'Google_Service_Classroom_GradeHistory';
  protected $gradeHistoryDataType = '';
  protected $stateHistoryType = 'Google_Service_Classroom_StateHistory';
  protected $stateHistoryDataType = '';

  /**
   * @param Google_Service_Classroom_GradeHistory
   */
  public function setGradeHistory(Google_Service_Classroom_GradeHistory $gradeHistory)
  {
    $this->gradeHistory = $gradeHistory;
  }
  /**
   * @return Google_Service_Classroom_GradeHistory
   */
  public function getGradeHistory()
  {
    return $this->gradeHistory;
  }
  /**
   * @param Google_Service_Classroom_StateHistory
   */
  public function setStateHistory(Google_Service_Classroom_StateHistory $stateHistory)
  {
    $this->stateHistory = $stateHistory;
  }
  /**
   * @return Google_Service_Classroom_StateHistory
   */
  public function getStateHistory()
  {
    return $this->stateHistory;
  }
}
