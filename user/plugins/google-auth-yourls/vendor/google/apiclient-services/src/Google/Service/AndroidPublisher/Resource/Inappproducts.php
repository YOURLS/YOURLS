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
 * The "inappproducts" collection of methods.
 * Typical usage is:
 *  <code>
 *   $androidpublisherService = new Google_Service_AndroidPublisher(...);
 *   $inappproducts = $androidpublisherService->inappproducts;
 *  </code>
 */
class Google_Service_AndroidPublisher_Resource_Inappproducts extends Google_Service_Resource
{
  /**
   * Delete an in-app product for an app. (inappproducts.delete)
   *
   * @param string $packageName Unique identifier for the Android app with the in-
   * app product; for example, "com.spiffygame".
   * @param string $sku Unique identifier for the in-app product.
   * @param array $optParams Optional parameters.
   */
  public function delete($packageName, $sku, $optParams = array())
  {
    $params = array('packageName' => $packageName, 'sku' => $sku);
    $params = array_merge($params, $optParams);
    return $this->call('delete', array($params));
  }
  /**
   * Returns information about the in-app product specified. (inappproducts.get)
   *
   * @param string $packageName
   * @param string $sku Unique identifier for the in-app product.
   * @param array $optParams Optional parameters.
   * @return Google_Service_AndroidPublisher_InAppProduct
   */
  public function get($packageName, $sku, $optParams = array())
  {
    $params = array('packageName' => $packageName, 'sku' => $sku);
    $params = array_merge($params, $optParams);
    return $this->call('get', array($params), "Google_Service_AndroidPublisher_InAppProduct");
  }
  /**
   * Creates a new in-app product for an app. (inappproducts.insert)
   *
   * @param string $packageName Unique identifier for the Android app; for
   * example, "com.spiffygame".
   * @param Google_Service_AndroidPublisher_InAppProduct $postBody
   * @param array $optParams Optional parameters.
   *
   * @opt_param bool autoConvertMissingPrices If true the prices for all regions
   * targeted by the parent app that don't have a price specified for this in-app
   * product will be auto converted to the target currency based on the default
   * price. Defaults to false.
   * @return Google_Service_AndroidPublisher_InAppProduct
   */
  public function insert($packageName, Google_Service_AndroidPublisher_InAppProduct $postBody, $optParams = array())
  {
    $params = array('packageName' => $packageName, 'postBody' => $postBody);
    $params = array_merge($params, $optParams);
    return $this->call('insert', array($params), "Google_Service_AndroidPublisher_InAppProduct");
  }
  /**
   * List all the in-app products for an Android app, both subscriptions and
   * managed in-app products.. (inappproducts.listInappproducts)
   *
   * @param string $packageName Unique identifier for the Android app with in-app
   * products; for example, "com.spiffygame".
   * @param array $optParams Optional parameters.
   *
   * @opt_param string maxResults
   * @opt_param string startIndex
   * @opt_param string token
   * @return Google_Service_AndroidPublisher_InappproductsListResponse
   */
  public function listInappproducts($packageName, $optParams = array())
  {
    $params = array('packageName' => $packageName);
    $params = array_merge($params, $optParams);
    return $this->call('list', array($params), "Google_Service_AndroidPublisher_InappproductsListResponse");
  }
  /**
   * Updates the details of an in-app product. This method supports patch
   * semantics. (inappproducts.patch)
   *
   * @param string $packageName Unique identifier for the Android app with the in-
   * app product; for example, "com.spiffygame".
   * @param string $sku Unique identifier for the in-app product.
   * @param Google_Service_AndroidPublisher_InAppProduct $postBody
   * @param array $optParams Optional parameters.
   *
   * @opt_param bool autoConvertMissingPrices If true the prices for all regions
   * targeted by the parent app that don't have a price specified for this in-app
   * product will be auto converted to the target currency based on the default
   * price. Defaults to false.
   * @return Google_Service_AndroidPublisher_InAppProduct
   */
  public function patch($packageName, $sku, Google_Service_AndroidPublisher_InAppProduct $postBody, $optParams = array())
  {
    $params = array('packageName' => $packageName, 'sku' => $sku, 'postBody' => $postBody);
    $params = array_merge($params, $optParams);
    return $this->call('patch', array($params), "Google_Service_AndroidPublisher_InAppProduct");
  }
  /**
   * Updates the details of an in-app product. (inappproducts.update)
   *
   * @param string $packageName Unique identifier for the Android app with the in-
   * app product; for example, "com.spiffygame".
   * @param string $sku Unique identifier for the in-app product.
   * @param Google_Service_AndroidPublisher_InAppProduct $postBody
   * @param array $optParams Optional parameters.
   *
   * @opt_param bool autoConvertMissingPrices If true the prices for all regions
   * targeted by the parent app that don't have a price specified for this in-app
   * product will be auto converted to the target currency based on the default
   * price. Defaults to false.
   * @return Google_Service_AndroidPublisher_InAppProduct
   */
  public function update($packageName, $sku, Google_Service_AndroidPublisher_InAppProduct $postBody, $optParams = array())
  {
    $params = array('packageName' => $packageName, 'sku' => $sku, 'postBody' => $postBody);
    $params = array_merge($params, $optParams);
    return $this->call('update', array($params), "Google_Service_AndroidPublisher_InAppProduct");
  }
}
