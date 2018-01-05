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

class Google_Service_TPU_Node extends Google_Collection
{
  protected $collection_key = 'networkEndpoints';
  public $acceleratorType;
  public $cidrBlock;
  public $createTime;
  public $description;
  public $healthDescription;
  public $ipAddress;
  public $name;
  public $network;
  protected $networkEndpointsType = 'Google_Service_TPU_NetworkEndpoint';
  protected $networkEndpointsDataType = 'array';
  public $port;
  public $serviceAccount;
  public $state;
  public $tensorflowVersion;

  public function setAcceleratorType($acceleratorType)
  {
    $this->acceleratorType = $acceleratorType;
  }
  public function getAcceleratorType()
  {
    return $this->acceleratorType;
  }
  public function setCidrBlock($cidrBlock)
  {
    $this->cidrBlock = $cidrBlock;
  }
  public function getCidrBlock()
  {
    return $this->cidrBlock;
  }
  public function setCreateTime($createTime)
  {
    $this->createTime = $createTime;
  }
  public function getCreateTime()
  {
    return $this->createTime;
  }
  public function setDescription($description)
  {
    $this->description = $description;
  }
  public function getDescription()
  {
    return $this->description;
  }
  public function setHealthDescription($healthDescription)
  {
    $this->healthDescription = $healthDescription;
  }
  public function getHealthDescription()
  {
    return $this->healthDescription;
  }
  public function setIpAddress($ipAddress)
  {
    $this->ipAddress = $ipAddress;
  }
  public function getIpAddress()
  {
    return $this->ipAddress;
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
  /**
   * @param Google_Service_TPU_NetworkEndpoint
   */
  public function setNetworkEndpoints($networkEndpoints)
  {
    $this->networkEndpoints = $networkEndpoints;
  }
  /**
   * @return Google_Service_TPU_NetworkEndpoint
   */
  public function getNetworkEndpoints()
  {
    return $this->networkEndpoints;
  }
  public function setPort($port)
  {
    $this->port = $port;
  }
  public function getPort()
  {
    return $this->port;
  }
  public function setServiceAccount($serviceAccount)
  {
    $this->serviceAccount = $serviceAccount;
  }
  public function getServiceAccount()
  {
    return $this->serviceAccount;
  }
  public function setState($state)
  {
    $this->state = $state;
  }
  public function getState()
  {
    return $this->state;
  }
  public function setTensorflowVersion($tensorflowVersion)
  {
    $this->tensorflowVersion = $tensorflowVersion;
  }
  public function getTensorflowVersion()
  {
    return $this->tensorflowVersion;
  }
}
