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

class Google_Service_ManufacturerCenter_Product extends Google_Collection
{
  protected $collection_key = 'manuallyDeletedAttributes';
  public $contentLanguage;
  protected $finalAttributesType = 'Google_Service_ManufacturerCenter_Attributes';
  protected $finalAttributesDataType = '';
  protected $issuesType = 'Google_Service_ManufacturerCenter_Issue';
  protected $issuesDataType = 'array';
  public $manuallyDeletedAttributes;
  protected $manuallyProvidedAttributesType = 'Google_Service_ManufacturerCenter_Attributes';
  protected $manuallyProvidedAttributesDataType = '';
  public $name;
  public $parent;
  public $productId;
  public $targetCountry;
  protected $uploadedAttributesType = 'Google_Service_ManufacturerCenter_Attributes';
  protected $uploadedAttributesDataType = '';

  public function setContentLanguage($contentLanguage)
  {
    $this->contentLanguage = $contentLanguage;
  }
  public function getContentLanguage()
  {
    return $this->contentLanguage;
  }
  /**
   * @param Google_Service_ManufacturerCenter_Attributes
   */
  public function setFinalAttributes(Google_Service_ManufacturerCenter_Attributes $finalAttributes)
  {
    $this->finalAttributes = $finalAttributes;
  }
  /**
   * @return Google_Service_ManufacturerCenter_Attributes
   */
  public function getFinalAttributes()
  {
    return $this->finalAttributes;
  }
  /**
   * @param Google_Service_ManufacturerCenter_Issue
   */
  public function setIssues($issues)
  {
    $this->issues = $issues;
  }
  /**
   * @return Google_Service_ManufacturerCenter_Issue
   */
  public function getIssues()
  {
    return $this->issues;
  }
  public function setManuallyDeletedAttributes($manuallyDeletedAttributes)
  {
    $this->manuallyDeletedAttributes = $manuallyDeletedAttributes;
  }
  public function getManuallyDeletedAttributes()
  {
    return $this->manuallyDeletedAttributes;
  }
  /**
   * @param Google_Service_ManufacturerCenter_Attributes
   */
  public function setManuallyProvidedAttributes(Google_Service_ManufacturerCenter_Attributes $manuallyProvidedAttributes)
  {
    $this->manuallyProvidedAttributes = $manuallyProvidedAttributes;
  }
  /**
   * @return Google_Service_ManufacturerCenter_Attributes
   */
  public function getManuallyProvidedAttributes()
  {
    return $this->manuallyProvidedAttributes;
  }
  public function setName($name)
  {
    $this->name = $name;
  }
  public function getName()
  {
    return $this->name;
  }
  public function setParent($parent)
  {
    $this->parent = $parent;
  }
  public function getParent()
  {
    return $this->parent;
  }
  public function setProductId($productId)
  {
    $this->productId = $productId;
  }
  public function getProductId()
  {
    return $this->productId;
  }
  public function setTargetCountry($targetCountry)
  {
    $this->targetCountry = $targetCountry;
  }
  public function getTargetCountry()
  {
    return $this->targetCountry;
  }
  /**
   * @param Google_Service_ManufacturerCenter_Attributes
   */
  public function setUploadedAttributes(Google_Service_ManufacturerCenter_Attributes $uploadedAttributes)
  {
    $this->uploadedAttributes = $uploadedAttributes;
  }
  /**
   * @return Google_Service_ManufacturerCenter_Attributes
   */
  public function getUploadedAttributes()
  {
    return $this->uploadedAttributes;
  }
}
