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

class Google_Service_Storagetransfer_Schedule extends Google_Model
{
  protected $scheduleEndDateType = 'Google_Service_Storagetransfer_Date';
  protected $scheduleEndDateDataType = '';
  protected $scheduleStartDateType = 'Google_Service_Storagetransfer_Date';
  protected $scheduleStartDateDataType = '';
  protected $startTimeOfDayType = 'Google_Service_Storagetransfer_TimeOfDay';
  protected $startTimeOfDayDataType = '';

  /**
   * @param Google_Service_Storagetransfer_Date
   */
  public function setScheduleEndDate(Google_Service_Storagetransfer_Date $scheduleEndDate)
  {
    $this->scheduleEndDate = $scheduleEndDate;
  }
  /**
   * @return Google_Service_Storagetransfer_Date
   */
  public function getScheduleEndDate()
  {
    return $this->scheduleEndDate;
  }
  /**
   * @param Google_Service_Storagetransfer_Date
   */
  public function setScheduleStartDate(Google_Service_Storagetransfer_Date $scheduleStartDate)
  {
    $this->scheduleStartDate = $scheduleStartDate;
  }
  /**
   * @return Google_Service_Storagetransfer_Date
   */
  public function getScheduleStartDate()
  {
    return $this->scheduleStartDate;
  }
  /**
   * @param Google_Service_Storagetransfer_TimeOfDay
   */
  public function setStartTimeOfDay(Google_Service_Storagetransfer_TimeOfDay $startTimeOfDay)
  {
    $this->startTimeOfDay = $startTimeOfDay;
  }
  /**
   * @return Google_Service_Storagetransfer_TimeOfDay
   */
  public function getStartTimeOfDay()
  {
    return $this->startTimeOfDay;
  }
}
