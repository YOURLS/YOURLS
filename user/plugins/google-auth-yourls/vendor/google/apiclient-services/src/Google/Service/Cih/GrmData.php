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

class Google_Service_Cih_GrmData extends Google_Collection
{
  protected $collection_key = 'intentId';
  public $agencyId;
  public $contactLdap;
  public $intentId;

  public function setAgencyId($agencyId)
  {
    $this->agencyId = $agencyId;
  }
  public function getAgencyId()
  {
    return $this->agencyId;
  }
  public function setContactLdap($contactLdap)
  {
    $this->contactLdap = $contactLdap;
  }
  public function getContactLdap()
  {
    return $this->contactLdap;
  }
  public function setIntentId($intentId)
  {
    $this->intentId = $intentId;
  }
  public function getIntentId()
  {
    return $this->intentId;
  }
}
