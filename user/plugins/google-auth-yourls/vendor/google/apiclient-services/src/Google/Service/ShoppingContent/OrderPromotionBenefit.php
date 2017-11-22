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

class Google_Service_ShoppingContent_OrderPromotionBenefit extends Google_Collection
{
  protected $collection_key = 'offerIds';
  protected $discountType = 'Google_Service_ShoppingContent_Price';
  protected $discountDataType = '';
  public $offerIds;
  public $subType;
  protected $taxImpactType = 'Google_Service_ShoppingContent_Price';
  protected $taxImpactDataType = '';
  public $type;

  /**
   * @param Google_Service_ShoppingContent_Price
   */
  public function setDiscount(Google_Service_ShoppingContent_Price $discount)
  {
    $this->discount = $discount;
  }
  /**
   * @return Google_Service_ShoppingContent_Price
   */
  public function getDiscount()
  {
    return $this->discount;
  }
  public function setOfferIds($offerIds)
  {
    $this->offerIds = $offerIds;
  }
  public function getOfferIds()
  {
    return $this->offerIds;
  }
  public function setSubType($subType)
  {
    $this->subType = $subType;
  }
  public function getSubType()
  {
    return $this->subType;
  }
  /**
   * @param Google_Service_ShoppingContent_Price
   */
  public function setTaxImpact(Google_Service_ShoppingContent_Price $taxImpact)
  {
    $this->taxImpact = $taxImpact;
  }
  /**
   * @return Google_Service_ShoppingContent_Price
   */
  public function getTaxImpact()
  {
    return $this->taxImpact;
  }
  public function setType($type)
  {
    $this->type = $type;
  }
  public function getType()
  {
    return $this->type;
  }
}
