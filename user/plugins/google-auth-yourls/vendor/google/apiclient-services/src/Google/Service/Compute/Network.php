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

class Google_Service_Compute_Network extends Google_Collection
{
  protected $collection_key = 'subnetworks';
  protected $internal_gapi_mappings = array(
        "iPv4Range" => "IPv4Range",
  );
  public $iPv4Range;
  public $autoCreateSubnetworks;
  public $creationTimestamp;
  public $description;
  public $gatewayIPv4;
  public $id;
  public $kind;
  public $name;
  protected $peeringsType = 'Google_Service_Compute_NetworkPeering';
  protected $peeringsDataType = 'array';
  protected $routingConfigType = 'Google_Service_Compute_NetworkRoutingConfig';
  protected $routingConfigDataType = '';
  public $selfLink;
  public $subnetworks;

  public function setIPv4Range($iPv4Range)
  {
    $this->iPv4Range = $iPv4Range;
  }
  public function getIPv4Range()
  {
    return $this->iPv4Range;
  }
  public function setAutoCreateSubnetworks($autoCreateSubnetworks)
  {
    $this->autoCreateSubnetworks = $autoCreateSubnetworks;
  }
  public function getAutoCreateSubnetworks()
  {
    return $this->autoCreateSubnetworks;
  }
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
  public function setGatewayIPv4($gatewayIPv4)
  {
    $this->gatewayIPv4 = $gatewayIPv4;
  }
  public function getGatewayIPv4()
  {
    return $this->gatewayIPv4;
  }
  public function setId($id)
  {
    $this->id = $id;
  }
  public function getId()
  {
    return $this->id;
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
  /**
   * @param Google_Service_Compute_NetworkPeering
   */
  public function setPeerings($peerings)
  {
    $this->peerings = $peerings;
  }
  /**
   * @return Google_Service_Compute_NetworkPeering
   */
  public function getPeerings()
  {
    return $this->peerings;
  }
  /**
   * @param Google_Service_Compute_NetworkRoutingConfig
   */
  public function setRoutingConfig(Google_Service_Compute_NetworkRoutingConfig $routingConfig)
  {
    $this->routingConfig = $routingConfig;
  }
  /**
   * @return Google_Service_Compute_NetworkRoutingConfig
   */
  public function getRoutingConfig()
  {
    return $this->routingConfig;
  }
  public function setSelfLink($selfLink)
  {
    $this->selfLink = $selfLink;
  }
  public function getSelfLink()
  {
    return $this->selfLink;
  }
  public function setSubnetworks($subnetworks)
  {
    $this->subnetworks = $subnetworks;
  }
  public function getSubnetworks()
  {
    return $this->subnetworks;
  }
}
