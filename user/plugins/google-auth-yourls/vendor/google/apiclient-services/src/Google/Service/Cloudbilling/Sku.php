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

class Google_Service_Cloudbilling_Sku extends Google_Collection
{
  protected $collection_key = 'serviceRegions';
  protected $categoryType = 'Google_Service_Cloudbilling_Category';
  protected $categoryDataType = '';
  public $description;
  public $name;
  protected $pricingInfoType = 'Google_Service_Cloudbilling_PricingInfo';
  protected $pricingInfoDataType = 'array';
  public $serviceProviderName;
  public $serviceRegions;
  public $skuId;

  /**
   * @param Google_Service_Cloudbilling_Category
   */
  public function setCategory(Google_Service_Cloudbilling_Category $category)
  {
    $this->category = $category;
  }
  /**
   * @return Google_Service_Cloudbilling_Category
   */
  public function getCategory()
  {
    return $this->category;
  }
  public function setDescription($description)
  {
    $this->description = $description;
  }
  public function getDescription()
  {
    return $this->description;
  }
  public function setName($name)
  {
    $this->name = $name;
  }
  public function getName()
  {
    return $this->name;
  }
  /**
   * @param Google_Service_Cloudbilling_PricingInfo
   */
  public function setPricingInfo($pricingInfo)
  {
    $this->pricingInfo = $pricingInfo;
  }
  /**
   * @return Google_Service_Cloudbilling_PricingInfo
   */
  public function getPricingInfo()
  {
    return $this->pricingInfo;
  }
  public function setServiceProviderName($serviceProviderName)
  {
    $this->serviceProviderName = $serviceProviderName;
  }
  public function getServiceProviderName()
  {
    return $this->serviceProviderName;
  }
  public function setServiceRegions($serviceRegions)
  {
    $this->serviceRegions = $serviceRegions;
  }
  public function getServiceRegions()
  {
    return $this->serviceRegions;
  }
  public function setSkuId($skuId)
  {
    $this->skuId = $skuId;
  }
  public function getSkuId()
  {
    return $this->skuId;
  }
}
