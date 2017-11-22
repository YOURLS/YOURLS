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

class Google_Service_ConsumerSurveys_MobileAppPanel extends Google_Collection
{
  protected $collection_key = 'owners';
  public $country;
  public $isPublicPanel;
  public $language;
  public $mobileAppPanelId;
  public $name;
  public $owners;

  public function setCountry($country)
  {
    $this->country = $country;
  }
  public function getCountry()
  {
    return $this->country;
  }
  public function setIsPublicPanel($isPublicPanel)
  {
    $this->isPublicPanel = $isPublicPanel;
  }
  public function getIsPublicPanel()
  {
    return $this->isPublicPanel;
  }
  public function setLanguage($language)
  {
    $this->language = $language;
  }
  public function getLanguage()
  {
    return $this->language;
  }
  public function setMobileAppPanelId($mobileAppPanelId)
  {
    $this->mobileAppPanelId = $mobileAppPanelId;
  }
  public function getMobileAppPanelId()
  {
    return $this->mobileAppPanelId;
  }
  public function setName($name)
  {
    $this->name = $name;
  }
  public function getName()
  {
    return $this->name;
  }
  public function setOwners($owners)
  {
    $this->owners = $owners;
  }
  public function getOwners()
  {
    return $this->owners;
  }
}
