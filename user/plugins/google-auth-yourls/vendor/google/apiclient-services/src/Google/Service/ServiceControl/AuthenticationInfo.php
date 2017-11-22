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

class Google_Service_ServiceControl_AuthenticationInfo extends Google_Model
{
  public $authoritySelector;
  public $principalEmail;
  public $thirdPartyPrincipal;

  public function setAuthoritySelector($authoritySelector)
  {
    $this->authoritySelector = $authoritySelector;
  }
  public function getAuthoritySelector()
  {
    return $this->authoritySelector;
  }
  public function setPrincipalEmail($principalEmail)
  {
    $this->principalEmail = $principalEmail;
  }
  public function getPrincipalEmail()
  {
    return $this->principalEmail;
  }
  public function setThirdPartyPrincipal($thirdPartyPrincipal)
  {
    $this->thirdPartyPrincipal = $thirdPartyPrincipal;
  }
  public function getThirdPartyPrincipal()
  {
    return $this->thirdPartyPrincipal;
  }
}
