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

class Google_Service_Appengine_Version extends Google_Collection
{
  protected $collection_key = 'libraries';
  protected $apiConfigType = 'Google_Service_Appengine_ApiConfigHandler';
  protected $apiConfigDataType = '';
  protected $automaticScalingType = 'Google_Service_Appengine_AutomaticScaling';
  protected $automaticScalingDataType = '';
  protected $basicScalingType = 'Google_Service_Appengine_BasicScaling';
  protected $basicScalingDataType = '';
  public $betaSettings;
  public $createTime;
  public $createdBy;
  public $defaultExpiration;
  protected $deploymentType = 'Google_Service_Appengine_Deployment';
  protected $deploymentDataType = '';
  public $diskUsageBytes;
  protected $endpointsApiServiceType = 'Google_Service_Appengine_EndpointsApiService';
  protected $endpointsApiServiceDataType = '';
  public $env;
  public $envVariables;
  protected $errorHandlersType = 'Google_Service_Appengine_ErrorHandler';
  protected $errorHandlersDataType = 'array';
  protected $handlersType = 'Google_Service_Appengine_UrlMap';
  protected $handlersDataType = 'array';
  protected $healthCheckType = 'Google_Service_Appengine_HealthCheck';
  protected $healthCheckDataType = '';
  public $id;
  public $inboundServices;
  public $instanceClass;
  protected $librariesType = 'Google_Service_Appengine_Library';
  protected $librariesDataType = 'array';
  protected $livenessCheckType = 'Google_Service_Appengine_LivenessCheck';
  protected $livenessCheckDataType = '';
  protected $manualScalingType = 'Google_Service_Appengine_ManualScaling';
  protected $manualScalingDataType = '';
  public $name;
  protected $networkType = 'Google_Service_Appengine_Network';
  protected $networkDataType = '';
  public $nobuildFilesRegex;
  protected $readinessCheckType = 'Google_Service_Appengine_ReadinessCheck';
  protected $readinessCheckDataType = '';
  protected $resourcesType = 'Google_Service_Appengine_Resources';
  protected $resourcesDataType = '';
  public $runtime;
  public $runtimeApiVersion;
  public $servingStatus;
  public $threadsafe;
  public $versionUrl;
  public $vm;

  /**
   * @param Google_Service_Appengine_ApiConfigHandler
   */
  public function setApiConfig(Google_Service_Appengine_ApiConfigHandler $apiConfig)
  {
    $this->apiConfig = $apiConfig;
  }
  /**
   * @return Google_Service_Appengine_ApiConfigHandler
   */
  public function getApiConfig()
  {
    return $this->apiConfig;
  }
  /**
   * @param Google_Service_Appengine_AutomaticScaling
   */
  public function setAutomaticScaling(Google_Service_Appengine_AutomaticScaling $automaticScaling)
  {
    $this->automaticScaling = $automaticScaling;
  }
  /**
   * @return Google_Service_Appengine_AutomaticScaling
   */
  public function getAutomaticScaling()
  {
    return $this->automaticScaling;
  }
  /**
   * @param Google_Service_Appengine_BasicScaling
   */
  public function setBasicScaling(Google_Service_Appengine_BasicScaling $basicScaling)
  {
    $this->basicScaling = $basicScaling;
  }
  /**
   * @return Google_Service_Appengine_BasicScaling
   */
  public function getBasicScaling()
  {
    return $this->basicScaling;
  }
  public function setBetaSettings($betaSettings)
  {
    $this->betaSettings = $betaSettings;
  }
  public function getBetaSettings()
  {
    return $this->betaSettings;
  }
  public function setCreateTime($createTime)
  {
    $this->createTime = $createTime;
  }
  public function getCreateTime()
  {
    return $this->createTime;
  }
  public function setCreatedBy($createdBy)
  {
    $this->createdBy = $createdBy;
  }
  public function getCreatedBy()
  {
    return $this->createdBy;
  }
  public function setDefaultExpiration($defaultExpiration)
  {
    $this->defaultExpiration = $defaultExpiration;
  }
  public function getDefaultExpiration()
  {
    return $this->defaultExpiration;
  }
  /**
   * @param Google_Service_Appengine_Deployment
   */
  public function setDeployment(Google_Service_Appengine_Deployment $deployment)
  {
    $this->deployment = $deployment;
  }
  /**
   * @return Google_Service_Appengine_Deployment
   */
  public function getDeployment()
  {
    return $this->deployment;
  }
  public function setDiskUsageBytes($diskUsageBytes)
  {
    $this->diskUsageBytes = $diskUsageBytes;
  }
  public function getDiskUsageBytes()
  {
    return $this->diskUsageBytes;
  }
  /**
   * @param Google_Service_Appengine_EndpointsApiService
   */
  public function setEndpointsApiService(Google_Service_Appengine_EndpointsApiService $endpointsApiService)
  {
    $this->endpointsApiService = $endpointsApiService;
  }
  /**
   * @return Google_Service_Appengine_EndpointsApiService
   */
  public function getEndpointsApiService()
  {
    return $this->endpointsApiService;
  }
  public function setEnv($env)
  {
    $this->env = $env;
  }
  public function getEnv()
  {
    return $this->env;
  }
  public function setEnvVariables($envVariables)
  {
    $this->envVariables = $envVariables;
  }
  public function getEnvVariables()
  {
    return $this->envVariables;
  }
  /**
   * @param Google_Service_Appengine_ErrorHandler
   */
  public function setErrorHandlers($errorHandlers)
  {
    $this->errorHandlers = $errorHandlers;
  }
  /**
   * @return Google_Service_Appengine_ErrorHandler
   */
  public function getErrorHandlers()
  {
    return $this->errorHandlers;
  }
  /**
   * @param Google_Service_Appengine_UrlMap
   */
  public function setHandlers($handlers)
  {
    $this->handlers = $handlers;
  }
  /**
   * @return Google_Service_Appengine_UrlMap
   */
  public function getHandlers()
  {
    return $this->handlers;
  }
  /**
   * @param Google_Service_Appengine_HealthCheck
   */
  public function setHealthCheck(Google_Service_Appengine_HealthCheck $healthCheck)
  {
    $this->healthCheck = $healthCheck;
  }
  /**
   * @return Google_Service_Appengine_HealthCheck
   */
  public function getHealthCheck()
  {
    return $this->healthCheck;
  }
  public function setId($id)
  {
    $this->id = $id;
  }
  public function getId()
  {
    return $this->id;
  }
  public function setInboundServices($inboundServices)
  {
    $this->inboundServices = $inboundServices;
  }
  public function getInboundServices()
  {
    return $this->inboundServices;
  }
  public function setInstanceClass($instanceClass)
  {
    $this->instanceClass = $instanceClass;
  }
  public function getInstanceClass()
  {
    return $this->instanceClass;
  }
  /**
   * @param Google_Service_Appengine_Library
   */
  public function setLibraries($libraries)
  {
    $this->libraries = $libraries;
  }
  /**
   * @return Google_Service_Appengine_Library
   */
  public function getLibraries()
  {
    return $this->libraries;
  }
  /**
   * @param Google_Service_Appengine_LivenessCheck
   */
  public function setLivenessCheck(Google_Service_Appengine_LivenessCheck $livenessCheck)
  {
    $this->livenessCheck = $livenessCheck;
  }
  /**
   * @return Google_Service_Appengine_LivenessCheck
   */
  public function getLivenessCheck()
  {
    return $this->livenessCheck;
  }
  /**
   * @param Google_Service_Appengine_ManualScaling
   */
  public function setManualScaling(Google_Service_Appengine_ManualScaling $manualScaling)
  {
    $this->manualScaling = $manualScaling;
  }
  /**
   * @return Google_Service_Appengine_ManualScaling
   */
  public function getManualScaling()
  {
    return $this->manualScaling;
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
   * @param Google_Service_Appengine_Network
   */
  public function setNetwork(Google_Service_Appengine_Network $network)
  {
    $this->network = $network;
  }
  /**
   * @return Google_Service_Appengine_Network
   */
  public function getNetwork()
  {
    return $this->network;
  }
  public function setNobuildFilesRegex($nobuildFilesRegex)
  {
    $this->nobuildFilesRegex = $nobuildFilesRegex;
  }
  public function getNobuildFilesRegex()
  {
    return $this->nobuildFilesRegex;
  }
  /**
   * @param Google_Service_Appengine_ReadinessCheck
   */
  public function setReadinessCheck(Google_Service_Appengine_ReadinessCheck $readinessCheck)
  {
    $this->readinessCheck = $readinessCheck;
  }
  /**
   * @return Google_Service_Appengine_ReadinessCheck
   */
  public function getReadinessCheck()
  {
    return $this->readinessCheck;
  }
  /**
   * @param Google_Service_Appengine_Resources
   */
  public function setResources(Google_Service_Appengine_Resources $resources)
  {
    $this->resources = $resources;
  }
  /**
   * @return Google_Service_Appengine_Resources
   */
  public function getResources()
  {
    return $this->resources;
  }
  public function setRuntime($runtime)
  {
    $this->runtime = $runtime;
  }
  public function getRuntime()
  {
    return $this->runtime;
  }
  public function setRuntimeApiVersion($runtimeApiVersion)
  {
    $this->runtimeApiVersion = $runtimeApiVersion;
  }
  public function getRuntimeApiVersion()
  {
    return $this->runtimeApiVersion;
  }
  public function setServingStatus($servingStatus)
  {
    $this->servingStatus = $servingStatus;
  }
  public function getServingStatus()
  {
    return $this->servingStatus;
  }
  public function setThreadsafe($threadsafe)
  {
    $this->threadsafe = $threadsafe;
  }
  public function getThreadsafe()
  {
    return $this->threadsafe;
  }
  public function setVersionUrl($versionUrl)
  {
    $this->versionUrl = $versionUrl;
  }
  public function getVersionUrl()
  {
    return $this->versionUrl;
  }
  public function setVm($vm)
  {
    $this->vm = $vm;
  }
  public function getVm()
  {
    return $this->vm;
  }
}
