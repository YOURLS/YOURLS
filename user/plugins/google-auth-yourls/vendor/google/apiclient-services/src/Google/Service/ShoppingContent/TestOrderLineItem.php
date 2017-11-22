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

class Google_Service_ShoppingContent_TestOrderLineItem extends Google_Model
{
  protected $productType = 'Google_Service_ShoppingContent_TestOrderLineItemProduct';
  protected $productDataType = '';
  public $quantityOrdered;
  protected $returnInfoType = 'Google_Service_ShoppingContent_OrderLineItemReturnInfo';
  protected $returnInfoDataType = '';
  protected $shippingDetailsType = 'Google_Service_ShoppingContent_OrderLineItemShippingDetails';
  protected $shippingDetailsDataType = '';
  protected $unitTaxType = 'Google_Service_ShoppingContent_Price';
  protected $unitTaxDataType = '';

  /**
   * @param Google_Service_ShoppingContent_TestOrderLineItemProduct
   */
  public function setProduct(Google_Service_ShoppingContent_TestOrderLineItemProduct $product)
  {
    $this->product = $product;
  }
  /**
   * @return Google_Service_ShoppingContent_TestOrderLineItemProduct
   */
  public function getProduct()
  {
    return $this->product;
  }
  public function setQuantityOrdered($quantityOrdered)
  {
    $this->quantityOrdered = $quantityOrdered;
  }
  public function getQuantityOrdered()
  {
    return $this->quantityOrdered;
  }
  /**
   * @param Google_Service_ShoppingContent_OrderLineItemReturnInfo
   */
  public function setReturnInfo(Google_Service_ShoppingContent_OrderLineItemReturnInfo $returnInfo)
  {
    $this->returnInfo = $returnInfo;
  }
  /**
   * @return Google_Service_ShoppingContent_OrderLineItemReturnInfo
   */
  public function getReturnInfo()
  {
    return $this->returnInfo;
  }
  /**
   * @param Google_Service_ShoppingContent_OrderLineItemShippingDetails
   */
  public function setShippingDetails(Google_Service_ShoppingContent_OrderLineItemShippingDetails $shippingDetails)
  {
    $this->shippingDetails = $shippingDetails;
  }
  /**
   * @return Google_Service_ShoppingContent_OrderLineItemShippingDetails
   */
  public function getShippingDetails()
  {
    return $this->shippingDetails;
  }
  /**
   * @param Google_Service_ShoppingContent_Price
   */
  public function setUnitTax(Google_Service_ShoppingContent_Price $unitTax)
  {
    $this->unitTax = $unitTax;
  }
  /**
   * @return Google_Service_ShoppingContent_Price
   */
  public function getUnitTax()
  {
    return $this->unitTax;
  }
}
