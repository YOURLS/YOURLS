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

class Google_Service_Monitoring_UptimeCheckConfig extends Google_Collection
{
  protected $collection_key = 'selectedRegions';
  protected $contentMatchersType = 'Google_Service_Monitoring_ContentMatcher';
  protected $contentMatchersDataType = 'array';
  public $displayName;
  protected $httpCheckType = 'Google_Service_Monitoring_HttpCheck';
  protected $httpCheckDataType = '';
  protected $internalCheckersType = 'Google_Service_Monitoring_InternalChecker';
  protected $internalCheckersDataType = 'array';
  protected $monitoredResourceType = 'Google_Service_Monitoring_MonitoredResource';
  protected $monitoredResourceDataType = '';
  public $name;
  public $period;
  protected $resourceGroupType = 'Google_Service_Monitoring_ResourceGroup';
  protected $resourceGroupDataType = '';
  public $selectedRegions;
  protected $tcpCheckType = 'Google_Service_Monitoring_TcpCheck';
  protected $tcpCheckDataType = '';
  public $timeout;

  /**
   * @param Google_Service_Monitoring_ContentMatcher
   */
  public function setContentMatchers($contentMatchers)
  {
    $this->contentMatchers = $contentMatchers;
  }
  /**
   * @return Google_Service_Monitoring_ContentMatcher
   */
  public function getContentMatchers()
  {
    return $this->contentMatchers;
  }
  public function setDisplayName($displayName)
  {
    $this->displayName = $displayName;
  }
  public function getDisplayName()
  {
    return $this->displayName;
  }
  /**
   * @param Google_Service_Monitoring_HttpCheck
   */
  public function setHttpCheck(Google_Service_Monitoring_HttpCheck $httpCheck)
  {
    $this->httpCheck = $httpCheck;
  }
  /**
   * @return Google_Service_Monitoring_HttpCheck
   */
  public function getHttpCheck()
  {
    return $this->httpCheck;
  }
  /**
   * @param Google_Service_Monitoring_InternalChecker
   */
  public function setInternalCheckers($internalCheckers)
  {
    $this->internalCheckers = $internalCheckers;
  }
  /**
   * @return Google_Service_Monitoring_InternalChecker
   */
  public function getInternalCheckers()
  {
    return $this->internalCheckers;
  }
  /**
   * @param Google_Service_Monitoring_MonitoredResource
   */
  public function setMonitoredResource(Google_Service_Monitoring_MonitoredResource $monitoredResource)
  {
    $this->monitoredResource = $monitoredResource;
  }
  /**
   * @return Google_Service_Monitoring_MonitoredResource
   */
  public function getMonitoredResource()
  {
    return $this->monitoredResource;
  }
  public function setName($name)
  {
    $this->name = $name;
  }
  public function getName()
  {
    return $this->name;
  }
  public function setPeriod($period)
  {
    $this->period = $period;
  }
  public function getPeriod()
  {
    return $this->period;
  }
  /**
   * @param Google_Service_Monitoring_ResourceGroup
   */
  public function setResourceGroup(Google_Service_Monitoring_ResourceGroup $resourceGroup)
  {
    $this->resourceGroup = $resourceGroup;
  }
  /**
   * @return Google_Service_Monitoring_ResourceGroup
   */
  public function getResourceGroup()
  {
    return $this->resourceGroup;
  }
  public function setSelectedRegions($selectedRegions)
  {
    $this->selectedRegions = $selectedRegions;
  }
  public function getSelectedRegions()
  {
    return $this->selectedRegions;
  }
  /**
   * @param Google_Service_Monitoring_TcpCheck
   */
  public function setTcpCheck(Google_Service_Monitoring_TcpCheck $tcpCheck)
  {
    $this->tcpCheck = $tcpCheck;
  }
  /**
   * @return Google_Service_Monitoring_TcpCheck
   */
  public function getTcpCheck()
  {
    return $this->tcpCheck;
  }
  public function setTimeout($timeout)
  {
    $this->timeout = $timeout;
  }
  public function getTimeout()
  {
    return $this->timeout;
  }
}
