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
 * The "licenseAssignments" collection of methods.
 * Typical usage is:
 *  <code>
 *   $licensingService = new Google_Service_Licensing(...);
 *   $licenseAssignments = $licensingService->licenseAssignments;
 *  </code>
 */
class Google_Service_Licensing_Resource_LicenseAssignments extends Google_Service_Resource
{
  /**
   * Revoke License. (licenseAssignments.delete)
   *
   * @param string $productId Name for product
   * @param string $skuId Name for sku
   * @param string $userId email id or unique Id of the user
   * @param array $optParams Optional parameters.
   */
  public function delete($productId, $skuId, $userId, $optParams = array())
  {
    $params = array('productId' => $productId, 'skuId' => $skuId, 'userId' => $userId);
    $params = array_merge($params, $optParams);
    return $this->call('delete', array($params));
  }
  /**
   * Get license assignment of a particular product and sku for a user
   * (licenseAssignments.get)
   *
   * @param string $productId Name for product
   * @param string $skuId Name for sku
   * @param string $userId email id or unique Id of the user
   * @param array $optParams Optional parameters.
   * @return Google_Service_Licensing_LicenseAssignment
   */
  public function get($productId, $skuId, $userId, $optParams = array())
  {
    $params = array('productId' => $productId, 'skuId' => $skuId, 'userId' => $userId);
    $params = array_merge($params, $optParams);
    return $this->call('get', array($params), "Google_Service_Licensing_LicenseAssignment");
  }
  /**
   * Assign License. (licenseAssignments.insert)
   *
   * @param string $productId Name for product
   * @param string $skuId Name for sku
   * @param Google_Service_Licensing_LicenseAssignmentInsert $postBody
   * @param array $optParams Optional parameters.
   * @return Google_Service_Licensing_LicenseAssignment
   */
  public function insert($productId, $skuId, Google_Service_Licensing_LicenseAssignmentInsert $postBody, $optParams = array())
  {
    $params = array('productId' => $productId, 'skuId' => $skuId, 'postBody' => $postBody);
    $params = array_merge($params, $optParams);
    return $this->call('insert', array($params), "Google_Service_Licensing_LicenseAssignment");
  }
  /**
   * List license assignments for given product of the customer.
   * (licenseAssignments.listForProduct)
   *
   * @param string $productId Name for product
   * @param string $customerId CustomerId represents the customer for whom
   * licenseassignments are queried
   * @param array $optParams Optional parameters.
   *
   * @opt_param string maxResults Maximum number of campaigns to return at one
   * time. Must be positive. Optional. Default value is 100.
   * @opt_param string pageToken Token to fetch the next page.Optional. By default
   * server will return first page
   * @return Google_Service_Licensing_LicenseAssignmentList
   */
  public function listForProduct($productId, $customerId, $optParams = array())
  {
    $params = array('productId' => $productId, 'customerId' => $customerId);
    $params = array_merge($params, $optParams);
    return $this->call('listForProduct', array($params), "Google_Service_Licensing_LicenseAssignmentList");
  }
  /**
   * List license assignments for given product and sku of the customer.
   * (licenseAssignments.listForProductAndSku)
   *
   * @param string $productId Name for product
   * @param string $skuId Name for sku
   * @param string $customerId CustomerId represents the customer for whom
   * licenseassignments are queried
   * @param array $optParams Optional parameters.
   *
   * @opt_param string maxResults Maximum number of campaigns to return at one
   * time. Must be positive. Optional. Default value is 100.
   * @opt_param string pageToken Token to fetch the next page.Optional. By default
   * server will return first page
   * @return Google_Service_Licensing_LicenseAssignmentList
   */
  public function listForProductAndSku($productId, $skuId, $customerId, $optParams = array())
  {
    $params = array('productId' => $productId, 'skuId' => $skuId, 'customerId' => $customerId);
    $params = array_merge($params, $optParams);
    return $this->call('listForProductAndSku', array($params), "Google_Service_Licensing_LicenseAssignmentList");
  }
  /**
   * Assign License. This method supports patch semantics.
   * (licenseAssignments.patch)
   *
   * @param string $productId Name for product
   * @param string $skuId Name for sku for which license would be revoked
   * @param string $userId email id or unique Id of the user
   * @param Google_Service_Licensing_LicenseAssignment $postBody
   * @param array $optParams Optional parameters.
   * @return Google_Service_Licensing_LicenseAssignment
   */
  public function patch($productId, $skuId, $userId, Google_Service_Licensing_LicenseAssignment $postBody, $optParams = array())
  {
    $params = array('productId' => $productId, 'skuId' => $skuId, 'userId' => $userId, 'postBody' => $postBody);
    $params = array_merge($params, $optParams);
    return $this->call('patch', array($params), "Google_Service_Licensing_LicenseAssignment");
  }
  /**
   * Assign License. (licenseAssignments.update)
   *
   * @param string $productId Name for product
   * @param string $skuId Name for sku for which license would be revoked
   * @param string $userId email id or unique Id of the user
   * @param Google_Service_Licensing_LicenseAssignment $postBody
   * @param array $optParams Optional parameters.
   * @return Google_Service_Licensing_LicenseAssignment
   */
  public function update($productId, $skuId, $userId, Google_Service_Licensing_LicenseAssignment $postBody, $optParams = array())
  {
    $params = array('productId' => $productId, 'skuId' => $skuId, 'userId' => $userId, 'postBody' => $postBody);
    $params = array_merge($params, $optParams);
    return $this->call('update', array($params), "Google_Service_Licensing_LicenseAssignment");
  }
}
