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

class Google_Service_Urlshortener_AnalyticsSnapshot extends Google_Collection
{
  protected $collection_key = 'referrers';
  protected $browsersType = 'Google_Service_Urlshortener_StringCount';
  protected $browsersDataType = 'array';
  protected $countriesType = 'Google_Service_Urlshortener_StringCount';
  protected $countriesDataType = 'array';
  public $longUrlClicks;
  protected $platformsType = 'Google_Service_Urlshortener_StringCount';
  protected $platformsDataType = 'array';
  protected $referrersType = 'Google_Service_Urlshortener_StringCount';
  protected $referrersDataType = 'array';
  public $shortUrlClicks;

  /**
   * @param Google_Service_Urlshortener_StringCount
   */
  public function setBrowsers($browsers)
  {
    $this->browsers = $browsers;
  }
  /**
   * @return Google_Service_Urlshortener_StringCount
   */
  public function getBrowsers()
  {
    return $this->browsers;
  }
  /**
   * @param Google_Service_Urlshortener_StringCount
   */
  public function setCountries($countries)
  {
    $this->countries = $countries;
  }
  /**
   * @return Google_Service_Urlshortener_StringCount
   */
  public function getCountries()
  {
    return $this->countries;
  }
  public function setLongUrlClicks($longUrlClicks)
  {
    $this->longUrlClicks = $longUrlClicks;
  }
  public function getLongUrlClicks()
  {
    return $this->longUrlClicks;
  }
  /**
   * @param Google_Service_Urlshortener_StringCount
   */
  public function setPlatforms($platforms)
  {
    $this->platforms = $platforms;
  }
  /**
   * @return Google_Service_Urlshortener_StringCount
   */
  public function getPlatforms()
  {
    return $this->platforms;
  }
  /**
   * @param Google_Service_Urlshortener_StringCount
   */
  public function setReferrers($referrers)
  {
    $this->referrers = $referrers;
  }
  /**
   * @return Google_Service_Urlshortener_StringCount
   */
  public function getReferrers()
  {
    return $this->referrers;
  }
  public function setShortUrlClicks($shortUrlClicks)
  {
    $this->shortUrlClicks = $shortUrlClicks;
  }
  public function getShortUrlClicks()
  {
    return $this->shortUrlClicks;
  }
}
