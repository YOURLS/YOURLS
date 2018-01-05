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

class Google_Service_ShoppingContent_OrderLineItemShippingDetails extends Google_Model
{
  public $deliverByDate;
  protected $methodType = 'Google_Service_ShoppingContent_OrderLineItemShippingDetailsMethod';
  protected $methodDataType = '';
  public $shipByDate;

  public function setDeliverByDate($deliverByDate)
  {
    $this->deliverByDate = $deliverByDate;
  }
  public function getDeliverByDate()
  {
    return $this->deliverByDate;
  }
  /**
   * @param Google_Service_ShoppingContent_OrderLineItemShippingDetailsMethod
   */
  public function setMethod(Google_Service_ShoppingContent_OrderLineItemShippingDetailsMethod $method)
  {
    $this->method = $method;
  }
  /**
   * @return Google_Service_ShoppingContent_OrderLineItemShippingDetailsMethod
   */
  public function getMethod()
  {
    return $this->method;
  }
  public function setShipByDate($shipByDate)
  {
    $this->shipByDate = $shipByDate;
  }
  public function getShipByDate()
  {
    return $this->shipByDate;
  }
}
