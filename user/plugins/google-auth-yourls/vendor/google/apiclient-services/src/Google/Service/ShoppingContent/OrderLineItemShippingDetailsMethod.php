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

class Google_Service_ShoppingContent_OrderLineItemShippingDetailsMethod extends Google_Model
{
  public $carrier;
  public $maxDaysInTransit;
  public $methodName;
  public $minDaysInTransit;

  public function setCarrier($carrier)
  {
    $this->carrier = $carrier;
  }
  public function getCarrier()
  {
    return $this->carrier;
  }
  public function setMaxDaysInTransit($maxDaysInTransit)
  {
    $this->maxDaysInTransit = $maxDaysInTransit;
  }
  public function getMaxDaysInTransit()
  {
    return $this->maxDaysInTransit;
  }
  public function setMethodName($methodName)
  {
    $this->methodName = $methodName;
  }
  public function getMethodName()
  {
    return $this->methodName;
  }
  public function setMinDaysInTransit($minDaysInTransit)
  {
    $this->minDaysInTransit = $minDaysInTransit;
  }
  public function getMinDaysInTransit()
  {
    return $this->minDaysInTransit;
  }
}
