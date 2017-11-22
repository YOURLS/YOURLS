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

class Google_Service_Partners_Analytics extends Google_Model
{
  protected $contactsType = 'Google_Service_Partners_AnalyticsDataPoint';
  protected $contactsDataType = '';
  protected $eventDateType = 'Google_Service_Partners_Date';
  protected $eventDateDataType = '';
  protected $profileViewsType = 'Google_Service_Partners_AnalyticsDataPoint';
  protected $profileViewsDataType = '';
  protected $searchViewsType = 'Google_Service_Partners_AnalyticsDataPoint';
  protected $searchViewsDataType = '';

  /**
   * @param Google_Service_Partners_AnalyticsDataPoint
   */
  public function setContacts(Google_Service_Partners_AnalyticsDataPoint $contacts)
  {
    $this->contacts = $contacts;
  }
  /**
   * @return Google_Service_Partners_AnalyticsDataPoint
   */
  public function getContacts()
  {
    return $this->contacts;
  }
  /**
   * @param Google_Service_Partners_Date
   */
  public function setEventDate(Google_Service_Partners_Date $eventDate)
  {
    $this->eventDate = $eventDate;
  }
  /**
   * @return Google_Service_Partners_Date
   */
  public function getEventDate()
  {
    return $this->eventDate;
  }
  /**
   * @param Google_Service_Partners_AnalyticsDataPoint
   */
  public function setProfileViews(Google_Service_Partners_AnalyticsDataPoint $profileViews)
  {
    $this->profileViews = $profileViews;
  }
  /**
   * @return Google_Service_Partners_AnalyticsDataPoint
   */
  public function getProfileViews()
  {
    return $this->profileViews;
  }
  /**
   * @param Google_Service_Partners_AnalyticsDataPoint
   */
  public function setSearchViews(Google_Service_Partners_AnalyticsDataPoint $searchViews)
  {
    $this->searchViews = $searchViews;
  }
  /**
   * @return Google_Service_Partners_AnalyticsDataPoint
   */
  public function getSearchViews()
  {
    return $this->searchViews;
  }
}
