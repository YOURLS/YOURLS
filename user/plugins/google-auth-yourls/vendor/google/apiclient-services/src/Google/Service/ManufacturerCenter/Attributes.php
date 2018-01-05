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

class Google_Service_ManufacturerCenter_Attributes extends Google_Collection
{
  protected $collection_key = 'videoLink';
  protected $additionalImageLinkType = 'Google_Service_ManufacturerCenter_Image';
  protected $additionalImageLinkDataType = 'array';
  public $ageGroup;
  public $brand;
  protected $capacityType = 'Google_Service_ManufacturerCenter_Capacity';
  protected $capacityDataType = '';
  public $color;
  protected $countType = 'Google_Service_ManufacturerCenter_Count';
  protected $countDataType = '';
  public $description;
  public $disclosureDate;
  protected $featureDescriptionType = 'Google_Service_ManufacturerCenter_FeatureDescription';
  protected $featureDescriptionDataType = 'array';
  public $flavor;
  public $format;
  public $gender;
  public $gtin;
  protected $imageLinkType = 'Google_Service_ManufacturerCenter_Image';
  protected $imageLinkDataType = '';
  public $itemGroupId;
  public $material;
  public $mpn;
  public $pattern;
  protected $productDetailType = 'Google_Service_ManufacturerCenter_ProductDetail';
  protected $productDetailDataType = 'array';
  public $productLine;
  public $productName;
  public $productPageUrl;
  public $productType;
  public $releaseDate;
  public $scent;
  public $size;
  public $sizeSystem;
  public $sizeType;
  protected $suggestedRetailPriceType = 'Google_Service_ManufacturerCenter_Price';
  protected $suggestedRetailPriceDataType = '';
  public $targetClientId;
  public $theme;
  public $title;
  public $videoLink;

  /**
   * @param Google_Service_ManufacturerCenter_Image
   */
  public function setAdditionalImageLink($additionalImageLink)
  {
    $this->additionalImageLink = $additionalImageLink;
  }
  /**
   * @return Google_Service_ManufacturerCenter_Image
   */
  public function getAdditionalImageLink()
  {
    return $this->additionalImageLink;
  }
  public function setAgeGroup($ageGroup)
  {
    $this->ageGroup = $ageGroup;
  }
  public function getAgeGroup()
  {
    return $this->ageGroup;
  }
  public function setBrand($brand)
  {
    $this->brand = $brand;
  }
  public function getBrand()
  {
    return $this->brand;
  }
  /**
   * @param Google_Service_ManufacturerCenter_Capacity
   */
  public function setCapacity(Google_Service_ManufacturerCenter_Capacity $capacity)
  {
    $this->capacity = $capacity;
  }
  /**
   * @return Google_Service_ManufacturerCenter_Capacity
   */
  public function getCapacity()
  {
    return $this->capacity;
  }
  public function setColor($color)
  {
    $this->color = $color;
  }
  public function getColor()
  {
    return $this->color;
  }
  /**
   * @param Google_Service_ManufacturerCenter_Count
   */
  public function setCount(Google_Service_ManufacturerCenter_Count $count)
  {
    $this->count = $count;
  }
  /**
   * @return Google_Service_ManufacturerCenter_Count
   */
  public function getCount()
  {
    return $this->count;
  }
  public function setDescription($description)
  {
    $this->description = $description;
  }
  public function getDescription()
  {
    return $this->description;
  }
  public function setDisclosureDate($disclosureDate)
  {
    $this->disclosureDate = $disclosureDate;
  }
  public function getDisclosureDate()
  {
    return $this->disclosureDate;
  }
  /**
   * @param Google_Service_ManufacturerCenter_FeatureDescription
   */
  public function setFeatureDescription($featureDescription)
  {
    $this->featureDescription = $featureDescription;
  }
  /**
   * @return Google_Service_ManufacturerCenter_FeatureDescription
   */
  public function getFeatureDescription()
  {
    return $this->featureDescription;
  }
  public function setFlavor($flavor)
  {
    $this->flavor = $flavor;
  }
  public function getFlavor()
  {
    return $this->flavor;
  }
  public function setFormat($format)
  {
    $this->format = $format;
  }
  public function getFormat()
  {
    return $this->format;
  }
  public function setGender($gender)
  {
    $this->gender = $gender;
  }
  public function getGender()
  {
    return $this->gender;
  }
  public function setGtin($gtin)
  {
    $this->gtin = $gtin;
  }
  public function getGtin()
  {
    return $this->gtin;
  }
  /**
   * @param Google_Service_ManufacturerCenter_Image
   */
  public function setImageLink(Google_Service_ManufacturerCenter_Image $imageLink)
  {
    $this->imageLink = $imageLink;
  }
  /**
   * @return Google_Service_ManufacturerCenter_Image
   */
  public function getImageLink()
  {
    return $this->imageLink;
  }
  public function setItemGroupId($itemGroupId)
  {
    $this->itemGroupId = $itemGroupId;
  }
  public function getItemGroupId()
  {
    return $this->itemGroupId;
  }
  public function setMaterial($material)
  {
    $this->material = $material;
  }
  public function getMaterial()
  {
    return $this->material;
  }
  public function setMpn($mpn)
  {
    $this->mpn = $mpn;
  }
  public function getMpn()
  {
    return $this->mpn;
  }
  public function setPattern($pattern)
  {
    $this->pattern = $pattern;
  }
  public function getPattern()
  {
    return $this->pattern;
  }
  /**
   * @param Google_Service_ManufacturerCenter_ProductDetail
   */
  public function setProductDetail($productDetail)
  {
    $this->productDetail = $productDetail;
  }
  /**
   * @return Google_Service_ManufacturerCenter_ProductDetail
   */
  public function getProductDetail()
  {
    return $this->productDetail;
  }
  public function setProductLine($productLine)
  {
    $this->productLine = $productLine;
  }
  public function getProductLine()
  {
    return $this->productLine;
  }
  public function setProductName($productName)
  {
    $this->productName = $productName;
  }
  public function getProductName()
  {
    return $this->productName;
  }
  public function setProductPageUrl($productPageUrl)
  {
    $this->productPageUrl = $productPageUrl;
  }
  public function getProductPageUrl()
  {
    return $this->productPageUrl;
  }
  public function setProductType($productType)
  {
    $this->productType = $productType;
  }
  public function getProductType()
  {
    return $this->productType;
  }
  public function setReleaseDate($releaseDate)
  {
    $this->releaseDate = $releaseDate;
  }
  public function getReleaseDate()
  {
    return $this->releaseDate;
  }
  public function setScent($scent)
  {
    $this->scent = $scent;
  }
  public function getScent()
  {
    return $this->scent;
  }
  public function setSize($size)
  {
    $this->size = $size;
  }
  public function getSize()
  {
    return $this->size;
  }
  public function setSizeSystem($sizeSystem)
  {
    $this->sizeSystem = $sizeSystem;
  }
  public function getSizeSystem()
  {
    return $this->sizeSystem;
  }
  public function setSizeType($sizeType)
  {
    $this->sizeType = $sizeType;
  }
  public function getSizeType()
  {
    return $this->sizeType;
  }
  /**
   * @param Google_Service_ManufacturerCenter_Price
   */
  public function setSuggestedRetailPrice(Google_Service_ManufacturerCenter_Price $suggestedRetailPrice)
  {
    $this->suggestedRetailPrice = $suggestedRetailPrice;
  }
  /**
   * @return Google_Service_ManufacturerCenter_Price
   */
  public function getSuggestedRetailPrice()
  {
    return $this->suggestedRetailPrice;
  }
  public function setTargetClientId($targetClientId)
  {
    $this->targetClientId = $targetClientId;
  }
  public function getTargetClientId()
  {
    return $this->targetClientId;
  }
  public function setTheme($theme)
  {
    $this->theme = $theme;
  }
  public function getTheme()
  {
    return $this->theme;
  }
  public function setTitle($title)
  {
    $this->title = $title;
  }
  public function getTitle()
  {
    return $this->title;
  }
  public function setVideoLink($videoLink)
  {
    $this->videoLink = $videoLink;
  }
  public function getVideoLink()
  {
    return $this->videoLink;
  }
}
