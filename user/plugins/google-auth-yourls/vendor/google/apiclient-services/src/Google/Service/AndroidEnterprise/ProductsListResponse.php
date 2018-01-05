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

class Google_Service_AndroidEnterprise_ProductsListResponse extends Google_Collection
{
  protected $collection_key = 'product';
  public $kind;
  protected $pageInfoType = 'Google_Service_AndroidEnterprise_PageInfo';
  protected $pageInfoDataType = '';
  protected $productType = 'Google_Service_AndroidEnterprise_Product';
  protected $productDataType = 'array';
  protected $tokenPaginationType = 'Google_Service_AndroidEnterprise_TokenPagination';
  protected $tokenPaginationDataType = '';

  public function setKind($kind)
  {
    $this->kind = $kind;
  }
  public function getKind()
  {
    return $this->kind;
  }
  /**
   * @param Google_Service_AndroidEnterprise_PageInfo
   */
  public function setPageInfo(Google_Service_AndroidEnterprise_PageInfo $pageInfo)
  {
    $this->pageInfo = $pageInfo;
  }
  /**
   * @return Google_Service_AndroidEnterprise_PageInfo
   */
  public function getPageInfo()
  {
    return $this->pageInfo;
  }
  /**
   * @param Google_Service_AndroidEnterprise_Product
   */
  public function setProduct($product)
  {
    $this->product = $product;
  }
  /**
   * @return Google_Service_AndroidEnterprise_Product
   */
  public function getProduct()
  {
    return $this->product;
  }
  /**
   * @param Google_Service_AndroidEnterprise_TokenPagination
   */
  public function setTokenPagination(Google_Service_AndroidEnterprise_TokenPagination $tokenPagination)
  {
    $this->tokenPagination = $tokenPagination;
  }
  /**
   * @return Google_Service_AndroidEnterprise_TokenPagination
   */
  public function getTokenPagination()
  {
    return $this->tokenPagination;
  }
}
