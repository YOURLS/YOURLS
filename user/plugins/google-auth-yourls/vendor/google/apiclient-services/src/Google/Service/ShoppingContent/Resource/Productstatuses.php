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
 * The "productstatuses" collection of methods.
 * Typical usage is:
 *  <code>
 *   $contentService = new Google_Service_ShoppingContent(...);
 *   $productstatuses = $contentService->productstatuses;
 *  </code>
 */
class Google_Service_ShoppingContent_Resource_Productstatuses extends Google_Service_Resource
{
  /**
   * Gets the statuses of multiple products in a single request.
   * (productstatuses.custombatch)
   *
   * @param Google_Service_ShoppingContent_ProductstatusesCustomBatchRequest $postBody
   * @param array $optParams Optional parameters.
   *
   * @opt_param bool includeAttributes Flag to include full product data in the
   * results of this request. The default value is false.
   * @return Google_Service_ShoppingContent_ProductstatusesCustomBatchResponse
   */
  public function custombatch(Google_Service_ShoppingContent_ProductstatusesCustomBatchRequest $postBody, $optParams = array())
  {
    $params = array('postBody' => $postBody);
    $params = array_merge($params, $optParams);
    return $this->call('custombatch', array($params), "Google_Service_ShoppingContent_ProductstatusesCustomBatchResponse");
  }
  /**
   * Gets the status of a product from your Merchant Center account.
   * (productstatuses.get)
   *
   * @param string $merchantId The ID of the account that contains the product.
   * This account cannot be a multi-client account.
   * @param string $productId The REST id of the product.
   * @param array $optParams Optional parameters.
   *
   * @opt_param bool includeAttributes Flag to include full product data in the
   * result of this get request. The default value is false.
   * @return Google_Service_ShoppingContent_ProductStatus
   */
  public function get($merchantId, $productId, $optParams = array())
  {
    $params = array('merchantId' => $merchantId, 'productId' => $productId);
    $params = array_merge($params, $optParams);
    return $this->call('get', array($params), "Google_Service_ShoppingContent_ProductStatus");
  }
  /**
   * Lists the statuses of the products in your Merchant Center account.
   * (productstatuses.listProductstatuses)
   *
   * @param string $merchantId The ID of the account that contains the products.
   * This account cannot be a multi-client account.
   * @param array $optParams Optional parameters.
   *
   * @opt_param bool includeAttributes Flag to include full product data in the
   * results of the list request. The default value is false.
   * @opt_param bool includeInvalidInsertedItems Flag to include the invalid
   * inserted items in the result of the list request. By default the invalid
   * items are not shown (the default value is false).
   * @opt_param string maxResults The maximum number of product statuses to return
   * in the response, used for paging.
   * @opt_param string pageToken The token returned by the previous request.
   * @return Google_Service_ShoppingContent_ProductstatusesListResponse
   */
  public function listProductstatuses($merchantId, $optParams = array())
  {
    $params = array('merchantId' => $merchantId);
    $params = array_merge($params, $optParams);
    return $this->call('list', array($params), "Google_Service_ShoppingContent_ProductstatusesListResponse");
  }
}
