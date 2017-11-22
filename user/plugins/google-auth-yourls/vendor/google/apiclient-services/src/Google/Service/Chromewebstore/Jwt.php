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

class Google_Service_Chromewebstore_Jwt extends Google_Model
{
  public $jwt;
  public $kind;
  public $paymentData;
  public $signature;

  public function setJwt($jwt)
  {
    $this->jwt = $jwt;
  }
  public function getJwt()
  {
    return $this->jwt;
  }
  public function setKind($kind)
  {
    $this->kind = $kind;
  }
  public function getKind()
  {
    return $this->kind;
  }
  public function setPaymentData($paymentData)
  {
    $this->paymentData = $paymentData;
  }
  public function getPaymentData()
  {
    return $this->paymentData;
  }
  public function setSignature($signature)
  {
    $this->signature = $signature;
  }
  public function getSignature()
  {
    return $this->signature;
  }
}
