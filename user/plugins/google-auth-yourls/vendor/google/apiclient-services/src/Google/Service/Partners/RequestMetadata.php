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

class Google_Service_Partners_RequestMetadata extends Google_Collection
{
  protected $collection_key = 'experimentIds';
  public $experimentIds;
  public $locale;
  public $partnersSessionId;
  protected $trafficSourceType = 'Google_Service_Partners_TrafficSource';
  protected $trafficSourceDataType = '';
  protected $userOverridesType = 'Google_Service_Partners_UserOverrides';
  protected $userOverridesDataType = '';

  public function setExperimentIds($experimentIds)
  {
    $this->experimentIds = $experimentIds;
  }
  public function getExperimentIds()
  {
    return $this->experimentIds;
  }
  public function setLocale($locale)
  {
    $this->locale = $locale;
  }
  public function getLocale()
  {
    return $this->locale;
  }
  public function setPartnersSessionId($partnersSessionId)
  {
    $this->partnersSessionId = $partnersSessionId;
  }
  public function getPartnersSessionId()
  {
    return $this->partnersSessionId;
  }
  /**
   * @param Google_Service_Partners_TrafficSource
   */
  public function setTrafficSource(Google_Service_Partners_TrafficSource $trafficSource)
  {
    $this->trafficSource = $trafficSource;
  }
  /**
   * @return Google_Service_Partners_TrafficSource
   */
  public function getTrafficSource()
  {
    return $this->trafficSource;
  }
  /**
   * @param Google_Service_Partners_UserOverrides
   */
  public function setUserOverrides(Google_Service_Partners_UserOverrides $userOverrides)
  {
    $this->userOverrides = $userOverrides;
  }
  /**
   * @return Google_Service_Partners_UserOverrides
   */
  public function getUserOverrides()
  {
    return $this->userOverrides;
  }
}
