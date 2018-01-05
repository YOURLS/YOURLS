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

class Google_Service_ServiceConsumerManagement_AuthRequirement extends Google_Model
{
  public $audiences;
  public $providerId;

  public function setAudiences($audiences)
  {
    $this->audiences = $audiences;
  }
  public function getAudiences()
  {
    return $this->audiences;
  }
  public function setProviderId($providerId)
  {
    $this->providerId = $providerId;
  }
  public function getProviderId()
  {
    return $this->providerId;
  }
}
