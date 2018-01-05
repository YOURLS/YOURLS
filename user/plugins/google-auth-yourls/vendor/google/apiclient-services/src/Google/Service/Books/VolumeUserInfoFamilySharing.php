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

class Google_Service_Books_VolumeUserInfoFamilySharing extends Google_Model
{
  public $familyRole;
  public $isSharingAllowed;
  public $isSharingDisabledByFop;

  public function setFamilyRole($familyRole)
  {
    $this->familyRole = $familyRole;
  }
  public function getFamilyRole()
  {
    return $this->familyRole;
  }
  public function setIsSharingAllowed($isSharingAllowed)
  {
    $this->isSharingAllowed = $isSharingAllowed;
  }
  public function getIsSharingAllowed()
  {
    return $this->isSharingAllowed;
  }
  public function setIsSharingDisabledByFop($isSharingDisabledByFop)
  {
    $this->isSharingDisabledByFop = $isSharingDisabledByFop;
  }
  public function getIsSharingDisabledByFop()
  {
    return $this->isSharingDisabledByFop;
  }
}
