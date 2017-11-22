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

class Google_Service_Partners_AnalyticsSummary extends Google_Model
{
  public $contactsCount;
  public $profileViewsCount;
  public $searchViewsCount;

  public function setContactsCount($contactsCount)
  {
    $this->contactsCount = $contactsCount;
  }
  public function getContactsCount()
  {
    return $this->contactsCount;
  }
  public function setProfileViewsCount($profileViewsCount)
  {
    $this->profileViewsCount = $profileViewsCount;
  }
  public function getProfileViewsCount()
  {
    return $this->profileViewsCount;
  }
  public function setSearchViewsCount($searchViewsCount)
  {
    $this->searchViewsCount = $searchViewsCount;
  }
  public function getSearchViewsCount()
  {
    return $this->searchViewsCount;
  }
}
