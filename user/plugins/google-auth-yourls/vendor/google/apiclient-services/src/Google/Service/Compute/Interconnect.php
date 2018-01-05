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

class Google_Service_Compute_Interconnect extends Google_Collection
{
  protected $collection_key = 'interconnectAttachments';
  public $adminEnabled;
  protected $circuitInfosType = 'Google_Service_Compute_InterconnectCircuitInfo';
  protected $circuitInfosDataType = 'array';
  public $creationTimestamp;
  public $customerName;
  public $description;
  protected $expectedOutagesType = 'Google_Service_Compute_InterconnectOutageNotification';
  protected $expectedOutagesDataType = 'array';
  public $googleIpAddress;
  public $googleReferenceId;
  public $id;
  public $interconnectAttachments;
  public $interconnectType;
  public $kind;
  public $linkType;
  public $location;
  public $name;
  public $nocContactEmail;
  public $operationalStatus;
  public $peerIpAddress;
  public $provisionedLinkCount;
  public $requestedLinkCount;
  public $selfLink;

  public function setAdminEnabled($adminEnabled)
  {
    $this->adminEnabled = $adminEnabled;
  }
  public function getAdminEnabled()
  {
    return $this->adminEnabled;
  }
  /**
   * @param Google_Service_Compute_InterconnectCircuitInfo
   */
  public function setCircuitInfos($circuitInfos)
  {
    $this->circuitInfos = $circuitInfos;
  }
  /**
   * @return Google_Service_Compute_InterconnectCircuitInfo
   */
  public function getCircuitInfos()
  {
    return $this->circuitInfos;
  }
  public function setCreationTimestamp($creationTimestamp)
  {
    $this->creationTimestamp = $creationTimestamp;
  }
  public function getCreationTimestamp()
  {
    return $this->creationTimestamp;
  }
  public function setCustomerName($customerName)
  {
    $this->customerName = $customerName;
  }
  public function getCustomerName()
  {
    return $this->customerName;
  }
  public function setDescription($description)
  {
    $this->description = $description;
  }
  public function getDescription()
  {
    return $this->description;
  }
  /**
   * @param Google_Service_Compute_InterconnectOutageNotification
   */
  public function setExpectedOutages($expectedOutages)
  {
    $this->expectedOutages = $expectedOutages;
  }
  /**
   * @return Google_Service_Compute_InterconnectOutageNotification
   */
  public function getExpectedOutages()
  {
    return $this->expectedOutages;
  }
  public function setGoogleIpAddress($googleIpAddress)
  {
    $this->googleIpAddress = $googleIpAddress;
  }
  public function getGoogleIpAddress()
  {
    return $this->googleIpAddress;
  }
  public function setGoogleReferenceId($googleReferenceId)
  {
    $this->googleReferenceId = $googleReferenceId;
  }
  public function getGoogleReferenceId()
  {
    return $this->googleReferenceId;
  }
  public function setId($id)
  {
    $this->id = $id;
  }
  public function getId()
  {
    return $this->id;
  }
  public function setInterconnectAttachments($interconnectAttachments)
  {
    $this->interconnectAttachments = $interconnectAttachments;
  }
  public function getInterconnectAttachments()
  {
    return $this->interconnectAttachments;
  }
  public function setInterconnectType($interconnectType)
  {
    $this->interconnectType = $interconnectType;
  }
  public function getInterconnectType()
  {
    return $this->interconnectType;
  }
  public function setKind($kind)
  {
    $this->kind = $kind;
  }
  public function getKind()
  {
    return $this->kind;
  }
  public function setLinkType($linkType)
  {
    $this->linkType = $linkType;
  }
  public function getLinkType()
  {
    return $this->linkType;
  }
  public function setLocation($location)
  {
    $this->location = $location;
  }
  public function getLocation()
  {
    return $this->location;
  }
  public function setName($name)
  {
    $this->name = $name;
  }
  public function getName()
  {
    return $this->name;
  }
  public function setNocContactEmail($nocContactEmail)
  {
    $this->nocContactEmail = $nocContactEmail;
  }
  public function getNocContactEmail()
  {
    return $this->nocContactEmail;
  }
  public function setOperationalStatus($operationalStatus)
  {
    $this->operationalStatus = $operationalStatus;
  }
  public function getOperationalStatus()
  {
    return $this->operationalStatus;
  }
  public function setPeerIpAddress($peerIpAddress)
  {
    $this->peerIpAddress = $peerIpAddress;
  }
  public function getPeerIpAddress()
  {
    return $this->peerIpAddress;
  }
  public function setProvisionedLinkCount($provisionedLinkCount)
  {
    $this->provisionedLinkCount = $provisionedLinkCount;
  }
  public function getProvisionedLinkCount()
  {
    return $this->provisionedLinkCount;
  }
  public function setRequestedLinkCount($requestedLinkCount)
  {
    $this->requestedLinkCount = $requestedLinkCount;
  }
  public function getRequestedLinkCount()
  {
    return $this->requestedLinkCount;
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
