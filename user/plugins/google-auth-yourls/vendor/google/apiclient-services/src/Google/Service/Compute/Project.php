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

class Google_Service_Compute_Project extends Google_Collection
{
  protected $collection_key = 'quotas';
  protected $commonInstanceMetadataType = 'Google_Service_Compute_Metadata';
  protected $commonInstanceMetadataDataType = '';
  public $creationTimestamp;
  public $defaultServiceAccount;
  public $description;
  public $enabledFeatures;
  public $id;
  public $kind;
  public $name;
  protected $quotasType = 'Google_Service_Compute_Quota';
  protected $quotasDataType = 'array';
  public $selfLink;
  protected $usageExportLocationType = 'Google_Service_Compute_UsageExportLocation';
  protected $usageExportLocationDataType = '';
  public $xpnProjectStatus;

  /**
   * @param Google_Service_Compute_Metadata
   */
  public function setCommonInstanceMetadata(Google_Service_Compute_Metadata $commonInstanceMetadata)
  {
    $this->commonInstanceMetadata = $commonInstanceMetadata;
  }
  /**
   * @return Google_Service_Compute_Metadata
   */
  public function getCommonInstanceMetadata()
  {
    return $this->commonInstanceMetadata;
  }
  public function setCreationTimestamp($creationTimestamp)
  {
    $this->creationTimestamp = $creationTimestamp;
  }
  public function getCreationTimestamp()
  {
    return $this->creationTimestamp;
  }
  public function setDefaultServiceAccount($defaultServiceAccount)
  {
    $this->defaultServiceAccount = $defaultServiceAccount;
  }
  public function getDefaultServiceAccount()
  {
    return $this->defaultServiceAccount;
  }
  public function setDescription($description)
  {
    $this->description = $description;
  }
  public function getDescription()
  {
    return $this->description;
  }
  public function setEnabledFeatures($enabledFeatures)
  {
    $this->enabledFeatures = $enabledFeatures;
  }
  public function getEnabledFeatures()
  {
    return $this->enabledFeatures;
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
   * @param Google_Service_Compute_Quota
   */
  public function setQuotas($quotas)
  {
    $this->quotas = $quotas;
  }
  /**
   * @return Google_Service_Compute_Quota
   */
  public function getQuotas()
  {
    return $this->quotas;
  }
  public function setSelfLink($selfLink)
  {
    $this->selfLink = $selfLink;
  }
  public function getSelfLink()
  {
    return $this->selfLink;
  }
  /**
   * @param Google_Service_Compute_UsageExportLocation
   */
  public function setUsageExportLocation(Google_Service_Compute_UsageExportLocation $usageExportLocation)
  {
    $this->usageExportLocation = $usageExportLocation;
  }
  /**
   * @return Google_Service_Compute_UsageExportLocation
   */
  public function getUsageExportLocation()
  {
    return $this->usageExportLocation;
  }
  public function setXpnProjectStatus($xpnProjectStatus)
  {
    $this->xpnProjectStatus = $xpnProjectStatus;
  }
  public function getXpnProjectStatus()
  {
    return $this->xpnProjectStatus;
  }
}
