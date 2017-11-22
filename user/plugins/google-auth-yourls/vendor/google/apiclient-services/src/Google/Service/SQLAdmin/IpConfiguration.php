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

class Google_Service_SQLAdmin_IpConfiguration extends Google_Collection
{
  protected $collection_key = 'authorizedNetworks';
  protected $authorizedNetworksType = 'Google_Service_SQLAdmin_AclEntry';
  protected $authorizedNetworksDataType = 'array';
  public $ipv4Enabled;
  public $requireSsl;

  /**
   * @param Google_Service_SQLAdmin_AclEntry
   */
  public function setAuthorizedNetworks($authorizedNetworks)
  {
    $this->authorizedNetworks = $authorizedNetworks;
  }
  /**
   * @return Google_Service_SQLAdmin_AclEntry
   */
  public function getAuthorizedNetworks()
  {
    return $this->authorizedNetworks;
  }
  public function setIpv4Enabled($ipv4Enabled)
  {
    $this->ipv4Enabled = $ipv4Enabled;
  }
  public function getIpv4Enabled()
  {
    return $this->ipv4Enabled;
  }
  public function setRequireSsl($requireSsl)
  {
    $this->requireSsl = $requireSsl;
  }
  public function getRequireSsl()
  {
    return $this->requireSsl;
  }
}
