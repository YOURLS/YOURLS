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

class Google_Service_ServiceConsumerManagement_TenantProjectConfig extends Google_Collection
{
  protected $collection_key = 'services';
  protected $billingConfigType = 'Google_Service_ServiceConsumerManagement_BillingConfig';
  protected $billingConfigDataType = '';
  public $folder;
  public $labels;
  protected $serviceAccountConfigType = 'Google_Service_ServiceConsumerManagement_ServiceAccountConfig';
  protected $serviceAccountConfigDataType = '';
  public $services;
  protected $tenantProjectPolicyType = 'Google_Service_ServiceConsumerManagement_TenantProjectPolicy';
  protected $tenantProjectPolicyDataType = '';

  /**
   * @param Google_Service_ServiceConsumerManagement_BillingConfig
   */
  public function setBillingConfig(Google_Service_ServiceConsumerManagement_BillingConfig $billingConfig)
  {
    $this->billingConfig = $billingConfig;
  }
  /**
   * @return Google_Service_ServiceConsumerManagement_BillingConfig
   */
  public function getBillingConfig()
  {
    return $this->billingConfig;
  }
  public function setFolder($folder)
  {
    $this->folder = $folder;
  }
  public function getFolder()
  {
    return $this->folder;
  }
  public function setLabels($labels)
  {
    $this->labels = $labels;
  }
  public function getLabels()
  {
    return $this->labels;
  }
  /**
   * @param Google_Service_ServiceConsumerManagement_ServiceAccountConfig
   */
  public function setServiceAccountConfig(Google_Service_ServiceConsumerManagement_ServiceAccountConfig $serviceAccountConfig)
  {
    $this->serviceAccountConfig = $serviceAccountConfig;
  }
  /**
   * @return Google_Service_ServiceConsumerManagement_ServiceAccountConfig
   */
  public function getServiceAccountConfig()
  {
    return $this->serviceAccountConfig;
  }
  public function setServices($services)
  {
    $this->services = $services;
  }
  public function getServices()
  {
    return $this->services;
  }
  /**
   * @param Google_Service_ServiceConsumerManagement_TenantProjectPolicy
   */
  public function setTenantProjectPolicy(Google_Service_ServiceConsumerManagement_TenantProjectPolicy $tenantProjectPolicy)
  {
    $this->tenantProjectPolicy = $tenantProjectPolicy;
  }
  /**
   * @return Google_Service_ServiceConsumerManagement_TenantProjectPolicy
   */
  public function getTenantProjectPolicy()
  {
    return $this->tenantProjectPolicy;
  }
}
