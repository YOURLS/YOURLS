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

/**
 * The "products" collection of methods.
 * Typical usage is:
 *  <code>
 *   $contentService = new Google_Service_ShoppingContent(...);
 *   $products = $contentService->products;
 *  </code>
 */
class Google_Service_ShoppingContent_Resource_Products extends Google_Service_Resource
{
  /**
   * Retrieves, inserts, and deletes multiple products in a single request.
   * (products.custombatch)
   *
   * @param Google_Service_ShoppingContent_ProductsCustomBatchRequest $postBody
   * @param array $optParams Optional parameters.
   *
   * @opt_param bool dryRun Flag to run the request in dry-run mode.
   * @return Google_Service_ShoppingContent_ProductsCustomBatchResponse
   */
  public function custombatch(Google_Service_ShoppingContent_ProductsCustomBatchRequest $postBody, $optParams = array())
  {
    $params = array('postBody' => $postBody);
    $params = array_merge($params, $optParams);
    return $this->call('custombatch', array($params), "Google_Service_ShoppingContent_ProductsCustomBatchResponse");
  }
  /**
   * Deletes a product from your Merchant Center account. (products.delete)
   *
   * @param string $merchantId The ID of the account that contains the product.
   * This account cannot be a multi-client account.
   * @param string $productId The REST id of the product.
   * @param array $optParams Optional parameters.
   *
   * @opt_param bool dryRun Flag to run the request in dry-run mode.
   */
  public function delete($merchantId, $productId, $optParams = array())
  {
    $params = array('merchantId' => $merchantId, 'productId' => $productId);
    $params = array_merge($params, $optParams);
    return $this->call('delete', array($params));
  }
  /**
   * Retrieves a product from your Merchant Center account. (products.get)
   *
   * @param string $merchantId The ID of the account that contains the product.
   * This account cannot be a multi-client account.
   * @param string $productId The REST id of the product.
   * @param array $optParams Optional parameters.
   * @return Google_Service_ShoppingContent_Product
   */
  public function get($merchantId, $productId, $optParams = array())
  {
    $params = array('merchantId' => $merchantId, 'productId' => $productId);
    $params = array_merge($params, $optParams);
    return $this->call('get', array($params), "Google_Service_ShoppingContent_Product");
  }
  /**
   * Uploads a product to your Merchant Center account. If an item with the same
   * channel, contentLanguage, offerId, and targetCountry already exists, this
   * method updates that entry. (products.insert)
   *
   * @param string $merchantId The ID of the account that contains the product.
   * This account cannot be a multi-client account.
   * @param Google_Service_ShoppingContent_Product $postBody
   * @param array $optParams Optional parameters.
   *
   * @opt_param bool dryRun Flag to run the request in dry-run mode.
   * @return Google_Service_ShoppingContent_Product
   */
  public function insert($merchantId, Google_Service_ShoppingContent_Product $postBody, $optParams = array())
  {
    $params = array('merchantId' => $merchantId, 'postBody' => $postBody);
    $params = array_merge($params, $optParams);
    return $this->call('insert', array($params), "Google_Service_ShoppingContent_Product");
  }
  /**
   * Lists the products in your Merchant Center account. (products.listProducts)
   *
   * @param string $merchantId The ID of the account that contains the products.
   * This account cannot be a multi-client account.
   * @param array $optParams Optional parameters.
   *
   * @opt_param bool includeInvalidInsertedItems Flag to include the invalid
   * inserted items in the result of the list request. By default the invalid
   * items are not shown (the default value is false).
   * @opt_param string maxResults The maximum number of products to return in the
   * response, used for paging.
   * @opt_param string pageToken The token returned by the previous request.
   * @return Google_Service_ShoppingContent_ProductsListResponse
   */
  public function listProducts($merchantId, $optParams = array())
  {
    $params = array('merchantId' => $merchantId);
    $params = array_merge($params, $optParams);
    return $this->call('list', array($params), "Google_Service_ShoppingContent_ProductsListResponse");
  }
}
