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

class Google_Service_Compute_InterconnectLocation extends Google_Collection
{
  protected $collection_key = 'regionInfos';
  public $address;
  public $availabilityZone;
  public $city;
  public $continent;
  public $creationTimestamp;
  public $description;
  public $facilityProvider;
  public $facilityProviderFacilityId;
  public $id;
  public $kind;
  public $name;
  public $peeringdbFacilityId;
  protected $regionInfosType = 'Google_Service_Compute_InterconnectLocationRegionInfo';
  protected $regionInfosDataType = 'array';
  public $selfLink;

  public function setAddress($address)
  {
    $this->address = $address;
  }
  public function getAddress()
  {
    return $this->address;
  }
  public function setAvailabilityZone($availabilityZone)
  {
    $this->availabilityZone = $availabilityZone;
  }
  public function getAvailabilityZone()
  {
    return $this->availabilityZone;
  }
  public function setCity($city)
  {
    $this->city = $city;
  }
  public function getCity()
  {
    return $this->city;
  }
  public function setContinent($continent)
  {
    $this->continent = $continent;
  }
  public function getContinent()
  {
    return $this->continent;
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
  public function setFacilityProvider($facilityProvider)
  {
    $this->facilityProvider = $facilityProvider;
  }
  public function getFacilityProvider()
  {
    return $this->facilityProvider;
  }
  public function setFacilityProviderFacilityId($facilityProviderFacilityId)
  {
    $this->facilityProviderFacilityId = $facilityProviderFacilityId;
  }
  public function getFacilityProviderFacilityId()
  {
    return $this->facilityProviderFacilityId;
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
  public function setPeeringdbFacilityId($peeringdbFacilityId)
  {
    $this->peeringdbFacilityId = $peeringdbFacilityId;
  }
  public function getPeeringdbFacilityId()
  {
    return $this->peeringdbFacilityId;
  }
  /**
   * @param Google_Service_Compute_InterconnectLocationRegionInfo
   */
  public function setRegionInfos($regionInfos)
  {
    $this->regionInfos = $regionInfos;
  }
  /**
   * @return Google_Service_Compute_InterconnectLocationRegionInfo
   */
  public function getRegionInfos()
  {
    return $this->regionInfos;
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
