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

class Google_Service_Manager_ReplicaPoolParamsV1Beta1 extends Google_Collection
{
  protected $collection_key = 'serviceAccounts';
  public $autoRestart;
  public $baseInstanceName;
  public $canIpForward;
  public $description;
  protected $disksToAttachType = 'Google_Service_Manager_ExistingDisk';
  protected $disksToAttachDataType = 'array';
  protected $disksToCreateType = 'Google_Service_Manager_NewDisk';
  protected $disksToCreateDataType = 'array';
  public $initAction;
  public $machineType;
  protected $metadataType = 'Google_Service_Manager_Metadata';
  protected $metadataDataType = '';
  protected $networkInterfacesType = 'Google_Service_Manager_NetworkInterface';
  protected $networkInterfacesDataType = 'array';
  public $onHostMaintenance;
  protected $serviceAccountsType = 'Google_Service_Manager_ServiceAccount';
  protected $serviceAccountsDataType = 'array';
  protected $tagsType = 'Google_Service_Manager_Tag';
  protected $tagsDataType = '';
  public $zone;

  public function setAutoRestart($autoRestart)
  {
    $this->autoRestart = $autoRestart;
  }
  public function getAutoRestart()
  {
    return $this->autoRestart;
  }
  public function setBaseInstanceName($baseInstanceName)
  {
    $this->baseInstanceName = $baseInstanceName;
  }
  public function getBaseInstanceName()
  {
    return $this->baseInstanceName;
  }
  public function setCanIpForward($canIpForward)
  {
    $this->canIpForward = $canIpForward;
  }
  public function getCanIpForward()
  {
    return $this->canIpForward;
  }
  public function setDescription($description)
  {
    $this->description = $description;
  }
  public function getDescription()
  {
    return $this->description;
  }
  public function setDisksToAttach($disksToAttach)
  {
    $this->disksToAttach = $disksToAttach;
  }
  public function getDisksToAttach()
  {
    return $this->disksToAttach;
  }
  public function setDisksToCreate($disksToCreate)
  {
    $this->disksToCreate = $disksToCreate;
  }
  public function getDisksToCreate()
  {
    return $this->disksToCreate;
  }
  public function setInitAction($initAction)
  {
    $this->initAction = $initAction;
  }
  public function getInitAction()
  {
    return $this->initAction;
  }
  public function setMachineType($machineType)
  {
    $this->machineType = $machineType;
  }
  public function getMachineType()
  {
    return $this->machineType;
  }
  public function setMetadata(Google_Service_Manager_Metadata $metadata)
  {
    $this->metadata = $metadata;
  }
  public function getMetadata()
  {
    return $this->metadata;
  }
  public function setNetworkInterfaces($networkInterfaces)
  {
    $this->networkInterfaces = $networkInterfaces;
  }
  public function getNetworkInterfaces()
  {
    return $this->networkInterfaces;
  }
  public function setOnHostMaintenance($onHostMaintenance)
  {
    $this->onHostMaintenance = $onHostMaintenance;
  }
  public function getOnHostMaintenance()
  {
    return $this->onHostMaintenance;
  }
  public function setServiceAccounts($serviceAccounts)
  {
    $this->serviceAccounts = $serviceAccounts;
  }
  public function getServiceAccounts()
  {
    return $this->serviceAccounts;
  }
  public function setTags(Google_Service_Manager_Tag $tags)
  {
    $this->tags = $tags;
  }
  public function getTags()
  {
    return $this->tags;
  }
  public function setZone($zone)
  {
    $this->zone = $zone;
  }
  public function getZone()
  {
    return $this->zone;
  }
}
