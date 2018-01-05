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

class Google_Service_Compute_InterconnectCircuitInfo extends Google_Model
{
  public $customerDemarcId;
  public $googleCircuitId;
  public $googleDemarcId;

  public function setCustomerDemarcId($customerDemarcId)
  {
    $this->customerDemarcId = $customerDemarcId;
  }
  public function getCustomerDemarcId()
  {
    return $this->customerDemarcId;
  }
  public function setGoogleCircuitId($googleCircuitId)
  {
    $this->googleCircuitId = $googleCircuitId;
  }
  public function getGoogleCircuitId()
  {
    return $this->googleCircuitId;
  }
  public function setGoogleDemarcId($googleDemarcId)
  {
    $this->googleDemarcId = $googleDemarcId;
  }
  public function getGoogleDemarcId()
  {
    return $this->googleDemarcId;
  }
}
