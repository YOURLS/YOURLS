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

class Google_Service_Compute_Router extends Google_Collection
{
  protected $collection_key = 'interfaces';
  protected $bgpType = 'Google_Service_Compute_RouterBgp';
  protected $bgpDataType = '';
  protected $bgpPeersType = 'Google_Service_Compute_RouterBgpPeer';
  protected $bgpPeersDataType = 'array';
  public $creationTimestamp;
  public $description;
  public $id;
  protected $interfacesType = 'Google_Service_Compute_RouterInterface';
  protected $interfacesDataType = 'array';
  public $kind;
  public $name;
  public $network;
  public $region;
  public $selfLink;

  /**
   * @param Google_Service_Compute_RouterBgp
   */
  public function setBgp(Google_Service_Compute_RouterBgp $bgp)
  {
    $this->bgp = $bgp;
  }
  /**
   * @return Google_Service_Compute_RouterBgp
   */
  public function getBgp()
  {
    return $this->bgp;
  }
  /**
   * @param Google_Service_Compute_RouterBgpPeer
   */
  public function setBgpPeers($bgpPeers)
  {
    $this->bgpPeers = $bgpPeers;
  }
  /**
   * @return Google_Service_Compute_RouterBgpPeer
   */
  public function getBgpPeers()
  {
    return $this->bgpPeers;
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
  public function setId($id)
  {
    $this->id = $id;
  }
  public function getId()
  {
    return $this->id;
  }
  /**
   * @param Google_Service_Compute_RouterInterface
   */
  public function setInterfaces($interfaces)
  {
    $this->interfaces = $interfaces;
  }
  /**
   * @return Google_Service_Compute_RouterInterface
   */
  public function getInterfaces()
  {
    return $this->interfaces;
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
  public function setRegion($region)
  {
    $this->region = $region;
  }
  public function getRegion()
  {
    return $this->region;
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
