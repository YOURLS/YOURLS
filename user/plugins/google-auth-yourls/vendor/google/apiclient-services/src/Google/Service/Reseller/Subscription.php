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

class Google_Service_Reseller_Subscription extends Google_Collection
{
  protected $collection_key = 'suspensionReasons';
  public $billingMethod;
  public $creationTime;
  public $customerDomain;
  public $customerId;
  public $dealCode;
  public $kind;
  protected $planType = 'Google_Service_Reseller_SubscriptionPlan';
  protected $planDataType = '';
  public $purchaseOrderId;
  protected $renewalSettingsType = 'Google_Service_Reseller_RenewalSettings';
  protected $renewalSettingsDataType = '';
  public $resourceUiUrl;
  protected $seatsType = 'Google_Service_Reseller_Seats';
  protected $seatsDataType = '';
  public $skuId;
  public $skuName;
  public $status;
  public $subscriptionId;
  public $suspensionReasons;
  protected $transferInfoType = 'Google_Service_Reseller_SubscriptionTransferInfo';
  protected $transferInfoDataType = '';
  protected $trialSettingsType = 'Google_Service_Reseller_SubscriptionTrialSettings';
  protected $trialSettingsDataType = '';

  public function setBillingMethod($billingMethod)
  {
    $this->billingMethod = $billingMethod;
  }
  public function getBillingMethod()
  {
    return $this->billingMethod;
  }
  public function setCreationTime($creationTime)
  {
    $this->creationTime = $creationTime;
  }
  public function getCreationTime()
  {
    return $this->creationTime;
  }
  public function setCustomerDomain($customerDomain)
  {
    $this->customerDomain = $customerDomain;
  }
  public function getCustomerDomain()
  {
    return $this->customerDomain;
  }
  public function setCustomerId($customerId)
  {
    $this->customerId = $customerId;
  }
  public function getCustomerId()
  {
    return $this->customerId;
  }
  public function setDealCode($dealCode)
  {
    $this->dealCode = $dealCode;
  }
  public function getDealCode()
  {
    return $this->dealCode;
  }
  public function setKind($kind)
  {
    $this->kind = $kind;
  }
  public function getKind()
  {
    return $this->kind;
  }
  /**
   * @param Google_Service_Reseller_SubscriptionPlan
   */
  public function setPlan(Google_Service_Reseller_SubscriptionPlan $plan)
  {
    $this->plan = $plan;
  }
  /**
   * @return Google_Service_Reseller_SubscriptionPlan
   */
  public function getPlan()
  {
    return $this->plan;
  }
  public function setPurchaseOrderId($purchaseOrderId)
  {
    $this->purchaseOrderId = $purchaseOrderId;
  }
  public function getPurchaseOrderId()
  {
    return $this->purchaseOrderId;
  }
  /**
   * @param Google_Service_Reseller_RenewalSettings
   */
  public function setRenewalSettings(Google_Service_Reseller_RenewalSettings $renewalSettings)
  {
    $this->renewalSettings = $renewalSettings;
  }
  /**
   * @return Google_Service_Reseller_RenewalSettings
   */
  public function getRenewalSettings()
  {
    return $this->renewalSettings;
  }
  public function setResourceUiUrl($resourceUiUrl)
  {
    $this->resourceUiUrl = $resourceUiUrl;
  }
  public function getResourceUiUrl()
  {
    return $this->resourceUiUrl;
  }
  /**
   * @param Google_Service_Reseller_Seats
   */
  public function setSeats(Google_Service_Reseller_Seats $seats)
  {
    $this->seats = $seats;
  }
  /**
   * @return Google_Service_Reseller_Seats
   */
  public function getSeats()
  {
    return $this->seats;
  }
  public function setSkuId($skuId)
  {
    $this->skuId = $skuId;
  }
  public function getSkuId()
  {
    return $this->skuId;
  }
  public function setSkuName($skuName)
  {
    $this->skuName = $skuName;
  }
  public function getSkuName()
  {
    return $this->skuName;
  }
  public function setStatus($status)
  {
    $this->status = $status;
  }
  public function getStatus()
  {
    return $this->status;
  }
  public function setSubscriptionId($subscriptionId)
  {
    $this->subscriptionId = $subscriptionId;
  }
  public function getSubscriptionId()
  {
    return $this->subscriptionId;
  }
  public function setSuspensionReasons($suspensionReasons)
  {
    $this->suspensionReasons = $suspensionReasons;
  }
  public function getSuspensionReasons()
  {
    return $this->suspensionReasons;
  }
  /**
   * @param Google_Service_Reseller_SubscriptionTransferInfo
   */
  public function setTransferInfo(Google_Service_Reseller_SubscriptionTransferInfo $transferInfo)
  {
    $this->transferInfo = $transferInfo;
  }
  /**
   * @return Google_Service_Reseller_SubscriptionTransferInfo
   */
  public function getTransferInfo()
  {
    return $this->transferInfo;
  }
  /**
   * @param Google_Service_Reseller_SubscriptionTrialSettings
   */
  public function setTrialSettings(Google_Service_Reseller_SubscriptionTrialSettings $trialSettings)
  {
    $this->trialSettings = $trialSettings;
  }
  /**
   * @return Google_Service_Reseller_SubscriptionTrialSettings
   */
  public function getTrialSettings()
  {
    return $this->trialSettings;
  }
}
