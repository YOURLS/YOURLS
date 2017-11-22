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

class Google_Service_AdSense_Payment extends Google_Model
{
  public $id;
  public $kind;
  public $paymentAmount;
  public $paymentAmountCurrencyCode;
  public $paymentDate;

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
  public function setPaymentAmount($paymentAmount)
  {
    $this->paymentAmount = $paymentAmount;
  }
  public function getPaymentAmount()
  {
    return $this->paymentAmount;
  }
  public function setPaymentAmountCurrencyCode($paymentAmountCurrencyCode)
  {
    $this->paymentAmountCurrencyCode = $paymentAmountCurrencyCode;
  }
  public function getPaymentAmountCurrencyCode()
  {
    return $this->paymentAmountCurrencyCode;
  }
  public function setPaymentDate($paymentDate)
  {
    $this->paymentDate = $paymentDate;
  }
  public function getPaymentDate()
  {
    return $this->paymentDate;
  }
}
