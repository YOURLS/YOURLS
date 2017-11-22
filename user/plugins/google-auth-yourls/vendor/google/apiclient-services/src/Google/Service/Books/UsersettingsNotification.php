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

class Google_Service_Books_UsersettingsNotification extends Google_Model
{
  protected $moreFromAuthorsType = 'Google_Service_Books_UsersettingsNotificationMoreFromAuthors';
  protected $moreFromAuthorsDataType = '';
  protected $moreFromSeriesType = 'Google_Service_Books_UsersettingsNotificationMoreFromSeries';
  protected $moreFromSeriesDataType = '';
  protected $rewardExpirationsType = 'Google_Service_Books_UsersettingsNotificationRewardExpirations';
  protected $rewardExpirationsDataType = '';

  /**
   * @param Google_Service_Books_UsersettingsNotificationMoreFromAuthors
   */
  public function setMoreFromAuthors(Google_Service_Books_UsersettingsNotificationMoreFromAuthors $moreFromAuthors)
  {
    $this->moreFromAuthors = $moreFromAuthors;
  }
  /**
   * @return Google_Service_Books_UsersettingsNotificationMoreFromAuthors
   */
  public function getMoreFromAuthors()
  {
    return $this->moreFromAuthors;
  }
  /**
   * @param Google_Service_Books_UsersettingsNotificationMoreFromSeries
   */
  public function setMoreFromSeries(Google_Service_Books_UsersettingsNotificationMoreFromSeries $moreFromSeries)
  {
    $this->moreFromSeries = $moreFromSeries;
  }
  /**
   * @return Google_Service_Books_UsersettingsNotificationMoreFromSeries
   */
  public function getMoreFromSeries()
  {
    return $this->moreFromSeries;
  }
  /**
   * @param Google_Service_Books_UsersettingsNotificationRewardExpirations
   */
  public function setRewardExpirations(Google_Service_Books_UsersettingsNotificationRewardExpirations $rewardExpirations)
  {
    $this->rewardExpirations = $rewardExpirations;
  }
  /**
   * @return Google_Service_Books_UsersettingsNotificationRewardExpirations
   */
  public function getRewardExpirations()
  {
    return $this->rewardExpirations;
  }
}
