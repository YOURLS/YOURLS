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

class Google_Service_AndroidPublisher_SubscriptionPurchase extends Google_Model
{
  public $autoRenewing;
  public $cancelReason;
  public $countryCode;
  public $developerPayload;
  public $expiryTimeMillis;
  public $kind;
  public $orderId;
  public $paymentState;
  public $priceAmountMicros;
  public $priceCurrencyCode;
  public $startTimeMillis;
  public $userCancellationTimeMillis;

  public function setAutoRenewing($autoRenewing)
  {
    $this->autoRenewing = $autoRenewing;
  }
  public function getAutoRenewing()
  {
    return $this->autoRenewing;
  }
  public function setCancelReason($cancelReason)
  {
    $this->cancelReason = $cancelReason;
  }
  public function getCancelReason()
  {
    return $this->cancelReason;
  }
  public function setCountryCode($countryCode)
  {
    $this->countryCode = $countryCode;
  }
  public function getCountryCode()
  {
    return $this->countryCode;
  }
  public function setDeveloperPayload($developerPayload)
  {
    $this->developerPayload = $developerPayload;
  }
  public function getDeveloperPayload()
  {
    return $this->developerPayload;
  }
  public function setExpiryTimeMillis($expiryTimeMillis)
  {
    $this->expiryTimeMillis = $expiryTimeMillis;
  }
  public function getExpiryTimeMillis()
  {
    return $this->expiryTimeMillis;
  }
  public function setKind($kind)
  {
    $this->kind = $kind;
  }
  public function getKind()
  {
    return $this->kind;
  }
  public function setOrderId($orderId)
  {
    $this->orderId = $orderId;
  }
  public function getOrderId()
  {
    return $this->orderId;
  }
  public function setPaymentState($paymentState)
  {
    $this->paymentState = $paymentState;
  }
  public function getPaymentState()
  {
    return $this->paymentState;
  }
  public function setPriceAmountMicros($priceAmountMicros)
  {
    $this->priceAmountMicros = $priceAmountMicros;
  }
  public function getPriceAmountMicros()
  {
    return $this->priceAmountMicros;
  }
  public function setPriceCurrencyCode($priceCurrencyCode)
  {
    $this->priceCurrencyCode = $priceCurrencyCode;
  }
  public function getPriceCurrencyCode()
  {
    return $this->priceCurrencyCode;
  }
  public function setStartTimeMillis($startTimeMillis)
  {
    $this->startTimeMillis = $startTimeMillis;
  }
  public function getStartTimeMillis()
  {
    return $this->startTimeMillis;
  }
  public function setUserCancellationTimeMillis($userCancellationTimeMillis)
  {
    $this->userCancellationTimeMillis = $userCancellationTimeMillis;
  }
  public function getUserCancellationTimeMillis()
  {
    return $this->userCancellationTimeMillis;
  }
}
