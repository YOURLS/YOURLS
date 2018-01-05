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
 * The "payments" collection of methods.
 * Typical usage is:
 *  <code>
 *   $chromewebstoreService = new Google_Service_Chromewebstore(...);
 *   $payments = $chromewebstoreService->payments;
 *  </code>
 */
class Google_Service_Chromewebstore_Resource_Payments extends Google_Service_Resource
{
  /**
   * Inserts a cart and returns the JWT. (payments.buy)
   *
   * @param Google_Service_Chromewebstore_PaymentsBuyRequest $postBody
   * @param array $optParams Optional parameters.
   *
   * @opt_param string projection Whether to return Play Store fields or just the
   * JWT.
   * @return Google_Service_Chromewebstore_Jwt
   */
  public function buy(Google_Service_Chromewebstore_PaymentsBuyRequest $postBody, $optParams = array())
  {
    $params = array('postBody' => $postBody);
    $params = array_merge($params, $optParams);
    return $this->call('buy', array($params), "Google_Service_Chromewebstore_Jwt");
  }
  /**
   * Consumes the in-app product for the user. (payments.delete)
   *
   * @param string $itemId The ID of the item to consume the in-app product.
   * @param string $sku The in-app product ID.
   * @param array $optParams Optional parameters.
   * @return Google_Service_Chromewebstore_PaymentsDeleteResponse
   */
  public function delete($itemId, $sku, $optParams = array())
  {
    $params = array('itemId' => $itemId, 'sku' => $sku);
    $params = array_merge($params, $optParams);
    return $this->call('delete', array($params), "Google_Service_Chromewebstore_PaymentsDeleteResponse");
  }
  /**
   * Lists the in-app products that the user has purchased.
   * (payments.listPayments)
   *
   * @param array $optParams Optional parameters.
   *
   * @opt_param string projection Whether to return all fields or a subset.
   * @return Google_Service_Chromewebstore_PaymentsListResponse
   */
  public function listPayments($optParams = array())
  {
    $params = array();
    $params = array_merge($params, $optParams);
    return $this->call('list', array($params), "Google_Service_Chromewebstore_PaymentsListResponse");
  }
}
