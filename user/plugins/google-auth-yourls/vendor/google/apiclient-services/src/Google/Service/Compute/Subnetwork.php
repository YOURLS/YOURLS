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

class Google_Service_Compute_Subnetwork extends Google_Collection
{
  protected $collection_key = 'secondaryIpRanges';
  public $creationTimestamp;
  public $description;
  public $gatewayAddress;
  public $id;
  public $ipCidrRange;
  public $kind;
  public $name;
  public $network;
  public $privateIpGoogleAccess;
  public $region;
  protected $secondaryIpRangesType = 'Google_Service_Compute_SubnetworkSecondaryRange';
  protected $secondaryIpRangesDataType = 'array';
  public $selfLink;

  public function setCreationTimestamp($creationTimestamp)
  {
    $this->creationTimestamp = $creationTimestamp;
  }
  public function getCreationTimestamp()
  {
    return $this->creationTimestamp;
  }
  public function setDescription($description)
  {
    $this->description = $description;
  }
  public function getDescription()
  {
    return $this->description;
  }
  public function setGatewayAddress($gatewayAddress)
  {
    $this->gatewayAddress = $gatewayAddress;
  }
  public function getGatewayAddress()
  {
    return $this->gatewayAddress;
  }
  public function setId($id)
  {
    $this->id = $id;
  }
  public function getId()
  {
    return $this->id;
  }
  public function setIpCidrRange($ipCidrRange)
  {
    $this->ipCidrRange = $ipCidrRange;
  }
  public function getIpCidrRange()
  {
    return $this->ipCidrRange;
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
  public function setPrivateIpGoogleAccess($privateIpGoogleAccess)
  {
    $this->privateIpGoogleAccess = $privateIpGoogleAccess;
  }
  public function getPrivateIpGoogleAccess()
  {
    return $this->privateIpGoogleAccess;
  }
  public function setRegion($region)
  {
    $this->region = $region;
  }
  public function getRegion()
  {
    return $this->region;
  }
  /**
   * @param Google_Service_Compute_SubnetworkSecondaryRange
   */
  public function setSecondaryIpRanges($secondaryIpRanges)
  {
    $this->secondaryIpRanges = $secondaryIpRanges;
  }
  /**
   * @return Google_Service_Compute_SubnetworkSecondaryRange
   */
  public function getSecondaryIpRanges()
  {
    return $this->secondaryIpRanges;
  }
  public function setSelfLink($selfLink)
  {
    $this->selfLink = $selfLink;
  }
  public function getSelfLink()
  {
    return $this->selfLink;
  }
}
