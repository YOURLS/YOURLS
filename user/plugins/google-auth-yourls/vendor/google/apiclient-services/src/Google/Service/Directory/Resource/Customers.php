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
 *   $adminService = new Google_Service_Directory(...);
 *   $customers = $adminService->customers;
 *  </code>
 */
class Google_Service_Directory_Resource_Customers extends Google_Service_Resource
{
  /**
   * Retrieves a customer. (customers.get)
   *
   * @param string $customerKey Id of the customer to be retrieved
   * @param array $optParams Optional parameters.
   * @return Google_Service_Directory_Customer
   */
  public function get($customerKey, $optParams = array())
  {
    $params = array('customerKey' => $customerKey);
    $params = array_merge($params, $optParams);
    return $this->call('get', array($params), "Google_Service_Directory_Customer");
  }
  /**
   * Updates a customer. This method supports patch semantics. (customers.patch)
   *
   * @param string $customerKey Id of the customer to be updated
   * @param Google_Service_Directory_Customer $postBody
   * @param array $optParams Optional parameters.
   * @return Google_Service_Directory_Customer
   */
  public function patch($customerKey, Google_Service_Directory_Customer $postBody, $optParams = array())
  {
    $params = array('customerKey' => $customerKey, 'postBody' => $postBody);
    $params = array_merge($params, $optParams);
    return $this->call('patch', array($params), "Google_Service_Directory_Customer");
  }
  /**
   * Updates a customer. (customers.update)
   *
   * @param string $customerKey Id of the customer to be updated
   * @param Google_Service_Directory_Customer $postBody
   * @param array $optParams Optional parameters.
   * @return Google_Service_Directory_Customer
   */
  public function update($customerKey, Google_Service_Directory_Customer $postBody, $optParams = array())
  {
    $params = array('customerKey' => $customerKey, 'postBody' => $postBody);
    $params = array_merge($params, $optParams);
    return $this->call('update', array($params), "Google_Service_Directory_Customer");
  }
}
