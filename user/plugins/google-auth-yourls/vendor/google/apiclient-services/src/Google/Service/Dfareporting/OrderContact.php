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

class Google_Service_Dfareporting_OrderContact extends Google_Model
{
  public $contactInfo;
  public $contactName;
  public $contactTitle;
  public $contactType;
  public $signatureUserProfileId;

  public function setContactInfo($contactInfo)
  {
    $this->contactInfo = $contactInfo;
  }
  public function getContactInfo()
  {
    return $this->contactInfo;
  }
  public function setContactName($contactName)
  {
    $this->contactName = $contactName;
  }
  public function getContactName()
  {
    return $this->contactName;
  }
  public function setContactTitle($contactTitle)
  {
    $this->contactTitle = $contactTitle;
  }
  public function getContactTitle()
  {
    return $this->contactTitle;
  }
  public function setContactType($contactType)
  {
    $this->contactType = $contactType;
  }
  public function getContactType()
  {
    return $this->contactType;
  }
  public function setSignatureUserProfileId($signatureUserProfileId)
  {
    $this->signatureUserProfileId = $signatureUserProfileId;
  }
  public function getSignatureUserProfileId()
  {
    return $this->signatureUserProfileId;
  }
}
