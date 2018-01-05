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

class Google_Service_Compute_NetworkInterface extends Google_Collection
{
  protected $collection_key = 'aliasIpRanges';
  protected $accessConfigsType = 'Google_Service_Compute_AccessConfig';
  protected $accessConfigsDataType = 'array';
  protected $aliasIpRangesType = 'Google_Service_Compute_AliasIpRange';
  protected $aliasIpRangesDataType = 'array';
  public $kind;
  public $name;
  public $network;
  public $networkIP;
  public $subnetwork;

  /**
   * @param Google_Service_Compute_AccessConfig
   */
  public function setAccessConfigs($accessConfigs)
  {
    $this->accessConfigs = $accessConfigs;
  }
  /**
   * @return Google_Service_Compute_AccessConfig
   */
  public function getAccessConfigs()
  {
    return $this->accessConfigs;
  }
  /**
   * @param Google_Service_Compute_AliasIpRange
   */
  public function setAliasIpRanges($aliasIpRanges)
  {
    $this->aliasIpRanges = $aliasIpRanges;
  }
  /**
   * @return Google_Service_Compute_AliasIpRange
   */
  public function getAliasIpRanges()
  {
    return $this->aliasIpRanges;
  }
  public function setKind($kind)
  {
    $this->kind = $kind;
  }
  public function getKind()
  {
    return $this->kind;
  }
  public function setName($name)
  {
    $this->name = $name;
  }
  public function getName()
  {
    return $this->name;
  }
  public function setNetwork($network)
  {
    $this->network = $network;
  }
  public function getNetwork()
  {
    return $this->network;
  }
  public function setNetworkIP($networkIP)
  {
    $this->networkIP = $networkIP;
  }
  public function getNetworkIP()
  {
    return $this->networkIP;
  }
  public function setSubnetwork($subnetwork)
  {
    $this->subnetwork = $subnetwork;
  }
  public function getSubnetwork()
  {
    return $this->subnetwork;
  }
}
