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

class Google_Service_FirebaseDynamicLinks_AnalyticsInfo extends Google_Model
{
  protected $googlePlayAnalyticsType = 'Google_Service_FirebaseDynamicLinks_GooglePlayAnalytics';
  protected $googlePlayAnalyticsDataType = '';
  protected $itunesConnectAnalyticsType = 'Google_Service_FirebaseDynamicLinks_ITunesConnectAnalytics';
  protected $itunesConnectAnalyticsDataType = '';

  /**
   * @param Google_Service_FirebaseDynamicLinks_GooglePlayAnalytics
   */
  public function setGooglePlayAnalytics(Google_Service_FirebaseDynamicLinks_GooglePlayAnalytics $googlePlayAnalytics)
  {
    $this->googlePlayAnalytics = $googlePlayAnalytics;
  }
  /**
   * @return Google_Service_FirebaseDynamicLinks_GooglePlayAnalytics
   */
  public function getGooglePlayAnalytics()
  {
    return $this->googlePlayAnalytics;
  }
  /**
   * @param Google_Service_FirebaseDynamicLinks_ITunesConnectAnalytics
   */
  public function setItunesConnectAnalytics(Google_Service_FirebaseDynamicLinks_ITunesConnectAnalytics $itunesConnectAnalytics)
  {
    $this->itunesConnectAnalytics = $itunesConnectAnalytics;
  }
  /**
   * @return Google_Service_FirebaseDynamicLinks_ITunesConnectAnalytics
   */
  public function getItunesConnectAnalytics()
  {
    return $this->itunesConnectAnalytics;
  }
}
