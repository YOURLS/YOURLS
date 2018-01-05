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

class Google_Service_IdentityToolkit_IdpConfig extends Google_Collection
{
  protected $collection_key = 'whitelistedAudiences';
  public $clientId;
  public $enabled;
  public $experimentPercent;
  public $provider;
  public $secret;
  public $whitelistedAudiences;

  public function setClientId($clientId)
  {
    $this->clientId = $clientId;
  }
  public function getClientId()
  {
    return $this->clientId;
  }
  public function setEnabled($enabled)
  {
    $this->enabled = $enabled;
  }
  public function getEnabled()
  {
    return $this->enabled;
  }
  public function setExperimentPercent($experimentPercent)
  {
    $this->experimentPercent = $experimentPercent;
  }
  public function getExperimentPercent()
  {
    return $this->experimentPercent;
  }
  public function setProvider($provider)
  {
    $this->provider = $provider;
  }
  public function getProvider()
  {
    return $this->provider;
  }
  public function setSecret($secret)
  {
    $this->secret = $secret;
  }
  public function getSecret()
  {
    return $this->secret;
  }
  public function setWhitelistedAudiences($whitelistedAudiences)
  {
    $this->whitelistedAudiences = $whitelistedAudiences;
  }
  public function getWhitelistedAudiences()
  {
    return $this->whitelistedAudiences;
  }
}
