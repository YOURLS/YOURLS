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

class Google_Service_SQLAdmin_DatabaseInstance extends Google_Collection
{
  protected $collection_key = 'suspensionReason';
  public $backendType;
  public $connectionName;
  public $currentDiskSize;
  public $databaseVersion;
  public $etag;
  protected $failoverReplicaType = 'Google_Service_SQLAdmin_DatabaseInstanceFailoverReplica';
  protected $failoverReplicaDataType = '';
  public $gceZone;
  public $instanceType;
  protected $ipAddressesType = 'Google_Service_SQLAdmin_IpMapping';
  protected $ipAddressesDataType = 'array';
  public $ipv6Address;
  public $kind;
  public $masterInstanceName;
  public $maxDiskSize;
  public $name;
  protected $onPremisesConfigurationType = 'Google_Service_SQLAdmin_OnPremisesConfiguration';
  protected $onPremisesConfigurationDataType = '';
  public $project;
  public $region;
  protected $replicaConfigurationType = 'Google_Service_SQLAdmin_ReplicaConfiguration';
  protected $replicaConfigurationDataType = '';
  public $replicaNames;
  public $selfLink;
  protected $serverCaCertType = 'Google_Service_SQLAdmin_SslCert';
  protected $serverCaCertDataType = '';
  public $serviceAccountEmailAddress;
  protected $settingsType = 'Google_Service_SQLAdmin_Settings';
  protected $settingsDataType = '';
  public $state;
  public $suspensionReason;

  public function setBackendType($backendType)
  {
    $this->backendType = $backendType;
  }
  public function getBackendType()
  {
    return $this->backendType;
  }
  public function setConnectionName($connectionName)
  {
    $this->connectionName = $connectionName;
  }
  public function getConnectionName()
  {
    return $this->connectionName;
  }
  public function setCurrentDiskSize($currentDiskSize)
  {
    $this->currentDiskSize = $currentDiskSize;
  }
  public function getCurrentDiskSize()
  {
    return $this->currentDiskSize;
  }
  public function setDatabaseVersion($databaseVersion)
  {
    $this->databaseVersion = $databaseVersion;
  }
  public function getDatabaseVersion()
  {
    return $this->databaseVersion;
  }
  public function setEtag($etag)
  {
    $this->etag = $etag;
  }
  public function getEtag()
  {
    return $this->etag;
  }
  /**
   * @param Google_Service_SQLAdmin_DatabaseInstanceFailoverReplica
   */
  public function setFailoverReplica(Google_Service_SQLAdmin_DatabaseInstanceFailoverReplica $failoverReplica)
  {
    $this->failoverReplica = $failoverReplica;
  }
  /**
   * @return Google_Service_SQLAdmin_DatabaseInstanceFailoverReplica
   */
  public function getFailoverReplica()
  {
    return $this->failoverReplica;
  }
  public function setGceZone($gceZone)
  {
    $this->gceZone = $gceZone;
  }
  public function getGceZone()
  {
    return $this->gceZone;
  }
  public function setInstanceType($instanceType)
  {
    $this->instanceType = $instanceType;
  }
  public function getInstanceType()
  {
    return $this->instanceType;
  }
  /**
   * @param Google_Service_SQLAdmin_IpMapping
   */
  public function setIpAddresses($ipAddresses)
  {
    $this->ipAddresses = $ipAddresses;
  }
  /**
   * @return Google_Service_SQLAdmin_IpMapping
   */
  public function getIpAddresses()
  {
    return $this->ipAddresses;
  }
  public function setIpv6Address($ipv6Address)
  {
    $this->ipv6Address = $ipv6Address;
  }
  public function getIpv6Address()
  {
    return $this->ipv6Address;
  }
  public function setKind($kind)
  {
    $this->kind = $kind;
  }
  public function getKind()
  {
    return $this->kind;
  }
  public function setMasterInstanceName($masterInstanceName)
  {
    $this->masterInstanceName = $masterInstanceName;
  }
  public function getMasterInstanceName()
  {
    return $this->masterInstanceName;
  }
  public function setMaxDiskSize($maxDiskSize)
  {
    $this->maxDiskSize = $maxDiskSize;
  }
  public function getMaxDiskSize()
  {
    return $this->maxDiskSize;
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
   * @param Google_Service_SQLAdmin_OnPremisesConfiguration
   */
  public function setOnPremisesConfiguration(Google_Service_SQLAdmin_OnPremisesConfiguration $onPremisesConfiguration)
  {
    $this->onPremisesConfiguration = $onPremisesConfiguration;
  }
  /**
   * @return Google_Service_SQLAdmin_OnPremisesConfiguration
   */
  public function getOnPremisesConfiguration()
  {
    return $this->onPremisesConfiguration;
  }
  public function setProject($project)
  {
    $this->project = $project;
  }
  public function getProject()
  {
    return $this->project;
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
   * @param Google_Service_SQLAdmin_ReplicaConfiguration
   */
  public function setReplicaConfiguration(Google_Service_SQLAdmin_ReplicaConfiguration $replicaConfiguration)
  {
    $this->replicaConfiguration = $replicaConfiguration;
  }
  /**
   * @return Google_Service_SQLAdmin_ReplicaConfiguration
   */
  public function getReplicaConfiguration()
  {
    return $this->replicaConfiguration;
  }
  public function setReplicaNames($replicaNames)
  {
    $this->replicaNames = $replicaNames;
  }
  public function getReplicaNames()
  {
    return $this->replicaNames;
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
   * @param Google_Service_SQLAdmin_SslCert
   */
  public function setServerCaCert(Google_Service_SQLAdmin_SslCert $serverCaCert)
  {
    $this->serverCaCert = $serverCaCert;
  }
  /**
   * @return Google_Service_SQLAdmin_SslCert
   */
  public function getServerCaCert()
  {
    return $this->serverCaCert;
  }
  public function setServiceAccountEmailAddress($serviceAccountEmailAddress)
  {
    $this->serviceAccountEmailAddress = $serviceAccountEmailAddress;
  }
  public function getServiceAccountEmailAddress()
  {
    return $this->serviceAccountEmailAddress;
  }
  /**
   * @param Google_Service_SQLAdmin_Settings
   */
  public function setSettings(Google_Service_SQLAdmin_Settings $settings)
  {
    $this->settings = $settings;
  }
  /**
   * @return Google_Service_SQLAdmin_Settings
   */
  public function getSettings()
  {
    return $this->settings;
  }
  public function setState($state)
  {
    $this->state = $state;
  }
  public function getState()
  {
    return $this->state;
  }
  public function setSuspensionReason($suspensionReason)
  {
    $this->suspensionReason = $suspensionReason;
  }
  public function getSuspensionReason()
  {
    return $this->suspensionReason;
  }
}
