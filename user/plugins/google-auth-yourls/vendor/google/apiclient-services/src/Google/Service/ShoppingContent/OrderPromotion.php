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

class Google_Service_ShoppingContent_OrderPromotion extends Google_Collection
{
  protected $collection_key = 'benefits';
  protected $benefitsType = 'Google_Service_ShoppingContent_OrderPromotionBenefit';
  protected $benefitsDataType = 'array';
  public $effectiveDates;
  public $genericRedemptionCode;
  public $id;
  public $longTitle;
  public $productApplicability;
  public $redemptionChannel;

  /**
   * @param Google_Service_ShoppingContent_OrderPromotionBenefit
   */
  public function setBenefits($benefits)
  {
    $this->benefits = $benefits;
  }
  /**
   * @return Google_Service_ShoppingContent_OrderPromotionBenefit
   */
  public function getBenefits()
  {
    return $this->benefits;
  }
  public function setEffectiveDates($effectiveDates)
  {
    $this->effectiveDates = $effectiveDates;
  }
  public function getEffectiveDates()
  {
    return $this->effectiveDates;
  }
  public function setGenericRedemptionCode($genericRedemptionCode)
  {
    $this->genericRedemptionCode = $genericRedemptionCode;
  }
  public function getGenericRedemptionCode()
  {
    return $this->genericRedemptionCode;
  }
  public function setId($id)
  {
    $this->id = $id;
  }
  public function getId()
  {
    return $this->id;
  }
  public function setLongTitle($longTitle)
  {
    $this->longTitle = $longTitle;
  }
  public function getLongTitle()
  {
    return $this->longTitle;
  }
  public function setProductApplicability($productApplicability)
  {
    $this->productApplicability = $productApplicability;
  }
  public function getProductApplicability()
  {
    return $this->productApplicability;
  }
  public function setRedemptionChannel($redemptionChannel)
  {
    $this->redemptionChannel = $redemptionChannel;
  }
  public function getRedemptionChannel()
  {
    return $this->redemptionChannel;
  }
}
