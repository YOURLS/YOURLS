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

class Google_Service_Cih_HelpcenterData extends Google_Model
{
  public $internalHelpCenterName;
  public $isApiClient;
  public $referer;

  public function setInternalHelpCenterName($internalHelpCenterName)
  {
    $this->internalHelpCenterName = $internalHelpCenterName;
  }
  public function getInternalHelpCenterName()
  {
    return $this->internalHelpCenterName;
  }
  public function setIsApiClient($isApiClient)
  {
    $this->isApiClient = $isApiClient;
  }
  public function getIsApiClient()
  {
    return $this->isApiClient;
  }
  public function setReferer($referer)
  {
    $this->referer = $referer;
  }
  public function getReferer()
  {
    return $this->referer;
  }
}
