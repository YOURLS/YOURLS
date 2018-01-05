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

class Google_Service_ShoppingContent_TestOrder extends Google_Collection
{
  protected $collection_key = 'promotions';
  protected $customerType = 'Google_Service_ShoppingContent_TestOrderCustomer';
  protected $customerDataType = '';
  public $kind;
  protected $lineItemsType = 'Google_Service_ShoppingContent_TestOrderLineItem';
  protected $lineItemsDataType = 'array';
  protected $paymentMethodType = 'Google_Service_ShoppingContent_TestOrderPaymentMethod';
  protected $paymentMethodDataType = '';
  public $predefinedDeliveryAddress;
  protected $promotionsType = 'Google_Service_ShoppingContent_OrderPromotion';
  protected $promotionsDataType = 'array';
  protected $shippingCostType = 'Google_Service_ShoppingContent_Price';
  protected $shippingCostDataType = '';
  protected $shippingCostTaxType = 'Google_Service_ShoppingContent_Price';
  protected $shippingCostTaxDataType = '';
  public $shippingOption;

  /**
   * @param Google_Service_ShoppingContent_TestOrderCustomer
   */
  public function setCustomer(Google_Service_ShoppingContent_TestOrderCustomer $customer)
  {
    $this->customer = $customer;
  }
  /**
   * @return Google_Service_ShoppingContent_TestOrderCustomer
   */
  public function getCustomer()
  {
    return $this->customer;
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
   * @param Google_Service_ShoppingContent_TestOrderLineItem
   */
  public function setLineItems($lineItems)
  {
    $this->lineItems = $lineItems;
  }
  /**
   * @return Google_Service_ShoppingContent_TestOrderLineItem
   */
  public function getLineItems()
  {
    return $this->lineItems;
  }
  /**
   * @param Google_Service_ShoppingContent_TestOrderPaymentMethod
   */
  public function setPaymentMethod(Google_Service_ShoppingContent_TestOrderPaymentMethod $paymentMethod)
  {
    $this->paymentMethod = $paymentMethod;
  }
  /**
   * @return Google_Service_ShoppingContent_TestOrderPaymentMethod
   */
  public function getPaymentMethod()
  {
    return $this->paymentMethod;
  }
  public function setPredefinedDeliveryAddress($predefinedDeliveryAddress)
  {
    $this->predefinedDeliveryAddress = $predefinedDeliveryAddress;
  }
  public function getPredefinedDeliveryAddress()
  {
    return $this->predefinedDeliveryAddress;
  }
  /**
   * @param Google_Service_ShoppingContent_OrderPromotion
   */
  public function setPromotions($promotions)
  {
    $this->promotions = $promotions;
  }
  /**
   * @return Google_Service_ShoppingContent_OrderPromotion
   */
  public function getPromotions()
  {
    return $this->promotions;
  }
  /**
   * @param Google_Service_ShoppingContent_Price
   */
  public function setShippingCost(Google_Service_ShoppingContent_Price $shippingCost)
  {
    $this->shippingCost = $shippingCost;
  }
  /**
   * @return Google_Service_ShoppingContent_Price
   */
  public function getShippingCost()
  {
    return $this->shippingCost;
  }
  /**
   * @param Google_Service_ShoppingContent_Price
   */
  public function setShippingCostTax(Google_Service_ShoppingContent_Price $shippingCostTax)
  {
    $this->shippingCostTax = $shippingCostTax;
  }
  /**
   * @return Google_Service_ShoppingContent_Price
   */
  public function getShippingCostTax()
  {
    return $this->shippingCostTax;
  }
  public function setShippingOption($shippingOption)
  {
    $this->shippingOption = $shippingOption;
  }
  public function getShippingOption()
  {
    return $this->shippingOption;
  }
}
