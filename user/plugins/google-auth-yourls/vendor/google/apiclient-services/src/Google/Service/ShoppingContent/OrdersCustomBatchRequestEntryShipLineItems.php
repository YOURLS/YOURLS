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

class Google_Service_ShoppingContent_OrdersCustomBatchRequestEntryShipLineItems extends Google_Collection
{
  protected $collection_key = 'shipmentInfos';
  public $carrier;
  protected $lineItemsType = 'Google_Service_ShoppingContent_OrderShipmentLineItemShipment';
  protected $lineItemsDataType = 'array';
  public $shipmentId;
  protected $shipmentInfosType = 'Google_Service_ShoppingContent_OrdersCustomBatchRequestEntryShipLineItemsShipmentInfo';
  protected $shipmentInfosDataType = 'array';
  public $trackingId;

  public function setCarrier($carrier)
  {
    $this->carrier = $carrier;
  }
  public function getCarrier()
  {
    return $this->carrier;
  }
  /**
   * @param Google_Service_ShoppingContent_OrderShipmentLineItemShipment
   */
  public function setLineItems($lineItems)
  {
    $this->lineItems = $lineItems;
  }
  /**
   * @return Google_Service_ShoppingContent_OrderShipmentLineItemShipment
   */
  public function getLineItems()
  {
    return $this->lineItems;
  }
  public function setShipmentId($shipmentId)
  {
    $this->shipmentId = $shipmentId;
  }
  public function getShipmentId()
  {
    return $this->shipmentId;
  }
  /**
   * @param Google_Service_ShoppingContent_OrdersCustomBatchRequestEntryShipLineItemsShipmentInfo
   */
  public function setShipmentInfos($shipmentInfos)
  {
    $this->shipmentInfos = $shipmentInfos;
  }
  /**
   * @return Google_Service_ShoppingContent_OrdersCustomBatchRequestEntryShipLineItemsShipmentInfo
   */
  public function getShipmentInfos()
  {
    return $this->shipmentInfos;
  }
  public function setTrackingId($trackingId)
  {
    $this->trackingId = $trackingId;
  }
  public function getTrackingId()
  {
    return $this->trackingId;
  }
}
