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
 * The "entitlements" collection of methods.
 * Typical usage is:
 *  <code>
 *   $androidenterpriseService = new Google_Service_AndroidEnterprise(...);
 *   $entitlements = $androidenterpriseService->entitlements;
 *  </code>
 */
class Google_Service_AndroidEnterprise_Resource_Entitlements extends Google_Service_Resource
{
  /**
   * Removes an entitlement to an app for a user. (entitlements.delete)
   *
   * @param string $enterpriseId The ID of the enterprise.
   * @param string $userId The ID of the user.
   * @param string $entitlementId The ID of the entitlement (a product ID), e.g.
   * "app:com.google.android.gm".
   * @param array $optParams Optional parameters.
   */
  public function delete($enterpriseId, $userId, $entitlementId, $optParams = array())
  {
    $params = array('enterpriseId' => $enterpriseId, 'userId' => $userId, 'entitlementId' => $entitlementId);
    $params = array_merge($params, $optParams);
    return $this->call('delete', array($params));
  }
  /**
   * Retrieves details of an entitlement. (entitlements.get)
   *
   * @param string $enterpriseId The ID of the enterprise.
   * @param string $userId The ID of the user.
   * @param string $entitlementId The ID of the entitlement (a product ID), e.g.
   * "app:com.google.android.gm".
   * @param array $optParams Optional parameters.
   * @return Google_Service_AndroidEnterprise_Entitlement
   */
  public function get($enterpriseId, $userId, $entitlementId, $optParams = array())
  {
    $params = array('enterpriseId' => $enterpriseId, 'userId' => $userId, 'entitlementId' => $entitlementId);
    $params = array_merge($params, $optParams);
    return $this->call('get', array($params), "Google_Service_AndroidEnterprise_Entitlement");
  }
  /**
   * Lists all entitlements for the specified user. Only the ID is set.
   * (entitlements.listEntitlements)
   *
   * @param string $enterpriseId The ID of the enterprise.
   * @param string $userId The ID of the user.
   * @param array $optParams Optional parameters.
   * @return Google_Service_AndroidEnterprise_EntitlementsListResponse
   */
  public function listEntitlements($enterpriseId, $userId, $optParams = array())
  {
    $params = array('enterpriseId' => $enterpriseId, 'userId' => $userId);
    $params = array_merge($params, $optParams);
    return $this->call('list', array($params), "Google_Service_AndroidEnterprise_EntitlementsListResponse");
  }
  /**
   * Adds or updates an entitlement to an app for a user. This method supports
   * patch semantics. (entitlements.patch)
   *
   * @param string $enterpriseId The ID of the enterprise.
   * @param string $userId The ID of the user.
   * @param string $entitlementId The ID of the entitlement (a product ID), e.g.
   * "app:com.google.android.gm".
   * @param Google_Service_AndroidEnterprise_Entitlement $postBody
   * @param array $optParams Optional parameters.
   *
   * @opt_param bool install Set to true to also install the product on all the
   * user's devices where possible. Failure to install on one or more devices will
   * not prevent this operation from returning successfully, as long as the
   * entitlement was successfully assigned to the user.
   * @return Google_Service_AndroidEnterprise_Entitlement
   */
  public function patch($enterpriseId, $userId, $entitlementId, Google_Service_AndroidEnterprise_Entitlement $postBody, $optParams = array())
  {
    $params = array('enterpriseId' => $enterpriseId, 'userId' => $userId, 'entitlementId' => $entitlementId, 'postBody' => $postBody);
    $params = array_merge($params, $optParams);
    return $this->call('patch', array($params), "Google_Service_AndroidEnterprise_Entitlement");
  }
  /**
   * Adds or updates an entitlement to an app for a user. (entitlements.update)
   *
   * @param string $enterpriseId The ID of the enterprise.
   * @param string $userId The ID of the user.
   * @param string $entitlementId The ID of the entitlement (a product ID), e.g.
   * "app:com.google.android.gm".
   * @param Google_Service_AndroidEnterprise_Entitlement $postBody
   * @param array $optParams Optional parameters.
   *
   * @opt_param bool install Set to true to also install the product on all the
   * user's devices where possible. Failure to install on one or more devices will
   * not prevent this operation from returning successfully, as long as the
   * entitlement was successfully assigned to the user.
   * @return Google_Service_AndroidEnterprise_Entitlement
   */
  public function update($enterpriseId, $userId, $entitlementId, Google_Service_AndroidEnterprise_Entitlement $postBody, $optParams = array())
  {
    $params = array('enterpriseId' => $enterpriseId, 'userId' => $userId, 'entitlementId' => $entitlementId, 'postBody' => $postBody);
    $params = array_merge($params, $optParams);
    return $this->call('update', array($params), "Google_Service_AndroidEnterprise_Entitlement");
  }
}
