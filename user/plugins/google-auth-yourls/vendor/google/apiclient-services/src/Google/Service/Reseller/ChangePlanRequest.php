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

class Google_Service_Reseller_ChangePlanRequest extends Google_Model
{
  public $dealCode;
  public $kind;
  public $planName;
  public $purchaseOrderId;
  protected $seatsType = 'Google_Service_Reseller_Seats';
  protected $seatsDataType = '';

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
  public function setPlanName($planName)
  {
    $this->planName = $planName;
  }
  public function getPlanName()
  {
    return $this->planName;
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
}
