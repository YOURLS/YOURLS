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
 * The "customers" collection of methods.
 * Typical usage is:
 *  <code>
 *   $resellerService = new Google_Service_Reseller(...);
 *   $customers = $resellerService->customers;
 *  </code>
 */
class Google_Service_Reseller_Resource_Customers extends Google_Service_Resource
{
  /**
   * Get a customer account. (customers.get)
   *
   * @param string $customerId Either the customer's primary domain name or the
   * customer's unique identifier. If using the domain name, we do not recommend
   * using a customerId as a key for persistent data. If the domain name for a
   * customerId is changed, the Google system automatically updates.
   * @param array $optParams Optional parameters.
   * @return Google_Service_Reseller_Customer
   */
  public function get($customerId, $optParams = array())
  {
    $params = array('customerId' => $customerId);
    $params = array_merge($params, $optParams);
    return $this->call('get', array($params), "Google_Service_Reseller_Customer");
  }
  /**
   * Order a new customer's account. (customers.insert)
   *
   * @param Google_Service_Reseller_Customer $postBody
   * @param array $optParams Optional parameters.
   *
   * @opt_param string customerAuthToken The customerAuthToken query string is
   * required when creating a resold account that transfers a direct customer's
   * subscription or transfers another reseller customer's subscription to your
   * reseller management. This is a hexadecimal authentication token needed to
   * complete the subscription transfer. For more information, see the
   * administrator help center.
   * @return Google_Service_Reseller_Customer
   */
  public function insert(Google_Service_Reseller_Customer $postBody, $optParams = array())
  {
    $params = array('postBody' => $postBody);
    $params = array_merge($params, $optParams);
    return $this->call('insert', array($params), "Google_Service_Reseller_Customer");
  }
  /**
   * Update a customer account's settings. This method supports patch semantics.
   * (customers.patch)
   *
   * @param string $customerId Either the customer's primary domain name or the
   * customer's unique identifier. If using the domain name, we do not recommend
   * using a customerId as a key for persistent data. If the domain name for a
   * customerId is changed, the Google system automatically updates.
   * @param Google_Service_Reseller_Customer $postBody
   * @param array $optParams Optional parameters.
   * @return Google_Service_Reseller_Customer
   */
  public function patch($customerId, Google_Service_Reseller_Customer $postBody, $optParams = array())
  {
    $params = array('customerId' => $customerId, 'postBody' => $postBody);
    $params = array_merge($params, $optParams);
    return $this->call('patch', array($params), "Google_Service_Reseller_Customer");
  }
  /**
   * Update a customer account's settings. (customers.update)
   *
   * @param string $customerId Either the customer's primary domain name or the
   * customer's unique identifier. If using the domain name, we do not recommend
   * using a customerId as a key for persistent data. If the domain name for a
   * customerId is changed, the Google system automatically updates.
   * @param Google_Service_Reseller_Customer $postBody
   * @param array $optParams Optional parameters.
   * @return Google_Service_Reseller_Customer
   */
  public function update($customerId, Google_Service_Reseller_Customer $postBody, $optParams = array())
  {
    $params = array('customerId' => $customerId, 'postBody' => $postBody);
    $params = array_merge($params, $optParams);
    return $this->call('update', array($params), "Google_Service_Reseller_Customer");
  }
}
