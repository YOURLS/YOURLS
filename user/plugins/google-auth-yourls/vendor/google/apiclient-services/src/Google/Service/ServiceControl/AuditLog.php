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

class Google_Service_ServiceControl_AuditLog extends Google_Collection
{
  protected $collection_key = 'authorizationInfo';
  protected $authenticationInfoType = 'Google_Service_ServiceControl_AuthenticationInfo';
  protected $authenticationInfoDataType = '';
  protected $authorizationInfoType = 'Google_Service_ServiceControl_AuthorizationInfo';
  protected $authorizationInfoDataType = 'array';
  public $metadata;
  public $methodName;
  public $numResponseItems;
  public $request;
  protected $requestMetadataType = 'Google_Service_ServiceControl_RequestMetadata';
  protected $requestMetadataDataType = '';
  public $resourceName;
  public $response;
  public $serviceData;
  public $serviceName;
  protected $statusType = 'Google_Service_ServiceControl_Status';
  protected $statusDataType = '';

  /**
   * @param Google_Service_ServiceControl_AuthenticationInfo
   */
  public function setAuthenticationInfo(Google_Service_ServiceControl_AuthenticationInfo $authenticationInfo)
  {
    $this->authenticationInfo = $authenticationInfo;
  }
  /**
   * @return Google_Service_ServiceControl_AuthenticationInfo
   */
  public function getAuthenticationInfo()
  {
    return $this->authenticationInfo;
  }
  /**
   * @param Google_Service_ServiceControl_AuthorizationInfo
   */
  public function setAuthorizationInfo($authorizationInfo)
  {
    $this->authorizationInfo = $authorizationInfo;
  }
  /**
   * @return Google_Service_ServiceControl_AuthorizationInfo
   */
  public function getAuthorizationInfo()
  {
    return $this->authorizationInfo;
  }
  public function setMetadata($metadata)
  {
    $this->metadata = $metadata;
  }
  public function getMetadata()
  {
    return $this->metadata;
  }
  public function setMethodName($methodName)
  {
    $this->methodName = $methodName;
  }
  public function getMethodName()
  {
    return $this->methodName;
  }
  public function setNumResponseItems($numResponseItems)
  {
    $this->numResponseItems = $numResponseItems;
  }
  public function getNumResponseItems()
  {
    return $this->numResponseItems;
  }
  public function setRequest($request)
  {
    $this->request = $request;
  }
  public function getRequest()
  {
    return $this->request;
  }
  /**
   * @param Google_Service_ServiceControl_RequestMetadata
   */
  public function setRequestMetadata(Google_Service_ServiceControl_RequestMetadata $requestMetadata)
  {
    $this->requestMetadata = $requestMetadata;
  }
  /**
   * @return Google_Service_ServiceControl_RequestMetadata
   */
  public function getRequestMetadata()
  {
    return $this->requestMetadata;
  }
  public function setResourceName($resourceName)
  {
    $this->resourceName = $resourceName;
  }
  public function getResourceName()
  {
    return $this->resourceName;
  }
  public function setResponse($response)
  {
    $this->response = $response;
  }
  public function getResponse()
  {
    return $this->response;
  }
  public function setServiceData($serviceData)
  {
    $this->serviceData = $serviceData;
  }
  public function getServiceData()
  {
    return $this->serviceData;
  }
  public function setServiceName($serviceName)
  {
    $this->serviceName = $serviceName;
  }
  public function getServiceName()
  {
    return $this->serviceName;
  }
  /**
   * @param Google_Service_ServiceControl_Status
   */
  public function setStatus(Google_Service_ServiceControl_Status $status)
  {
    $this->status = $status;
  }
  /**
   * @return Google_Service_ServiceControl_Status
   */
  public function getStatus()
  {
    return $this->status;
  }
}
