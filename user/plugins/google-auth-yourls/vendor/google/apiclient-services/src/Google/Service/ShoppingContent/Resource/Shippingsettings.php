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
 * The "shippingsettings" collection of methods.
 * Typical usage is:
 *  <code>
 *   $contentService = new Google_Service_ShoppingContent(...);
 *   $shippingsettings = $contentService->shippingsettings;
 *  </code>
 */
class Google_Service_ShoppingContent_Resource_Shippingsettings extends Google_Service_Resource
{
  /**
   * Retrieves and updates the shipping settings of multiple accounts in a single
   * request. (shippingsettings.custombatch)
   *
   * @param Google_Service_ShoppingContent_ShippingsettingsCustomBatchRequest $postBody
   * @param array $optParams Optional parameters.
   *
   * @opt_param bool dryRun Flag to run the request in dry-run mode.
   * @return Google_Service_ShoppingContent_ShippingsettingsCustomBatchResponse
   */
  public function custombatch(Google_Service_ShoppingContent_ShippingsettingsCustomBatchRequest $postBody, $optParams = array())
  {
    $params = array('postBody' => $postBody);
    $params = array_merge($params, $optParams);
    return $this->call('custombatch', array($params), "Google_Service_ShoppingContent_ShippingsettingsCustomBatchResponse");
  }
  /**
   * Retrieves the shipping settings of the account. (shippingsettings.get)
   *
   * @param string $merchantId The ID of the managing account. If this account is
   * not a multi-client account, then this parameter must be the same as
   * accountId.
   * @param string $accountId The ID of the account for which to get/update
   * shipping settings.
   * @param array $optParams Optional parameters.
   * @return Google_Service_ShoppingContent_ShippingSettings
   */
  public function get($merchantId, $accountId, $optParams = array())
  {
    $params = array('merchantId' => $merchantId, 'accountId' => $accountId);
    $params = array_merge($params, $optParams);
    return $this->call('get', array($params), "Google_Service_ShoppingContent_ShippingSettings");
  }
  /**
   * Retrieves supported carriers and carrier services for an account.
   * (shippingsettings.getsupportedcarriers)
   *
   * @param string $merchantId The ID of the account for which to retrieve the
   * supported carriers.
   * @param array $optParams Optional parameters.
   * @return Google_Service_ShoppingContent_ShippingsettingsGetSupportedCarriersResponse
   */
  public function getsupportedcarriers($merchantId, $optParams = array())
  {
    $params = array('merchantId' => $merchantId);
    $params = array_merge($params, $optParams);
    return $this->call('getsupportedcarriers', array($params), "Google_Service_ShoppingContent_ShippingsettingsGetSupportedCarriersResponse");
  }
  /**
   * Lists the shipping settings of the sub-accounts in your Merchant Center
   * account. (shippingsettings.listShippingsettings)
   *
   * @param string $merchantId The ID of the managing account. This must be a
   * multi-client account.
   * @param array $optParams Optional parameters.
   *
   * @opt_param string maxResults The maximum number of shipping settings to
   * return in the response, used for paging.
   * @opt_param string pageToken The token returned by the previous request.
   * @return Google_Service_ShoppingContent_ShippingsettingsListResponse
   */
  public function listShippingsettings($merchantId, $optParams = array())
  {
    $params = array('merchantId' => $merchantId);
    $params = array_merge($params, $optParams);
    return $this->call('list', array($params), "Google_Service_ShoppingContent_ShippingsettingsListResponse");
  }
  /**
   * Updates the shipping settings of the account. This method supports patch
   * semantics. (shippingsettings.patch)
   *
   * @param string $merchantId The ID of the managing account. If this account is
   * not a multi-client account, then this parameter must be the same as
   * accountId.
   * @param string $accountId The ID of the account for which to get/update
   * shipping settings.
   * @param Google_Service_ShoppingContent_ShippingSettings $postBody
   * @param array $optParams Optional parameters.
   *
   * @opt_param bool dryRun Flag to run the request in dry-run mode.
   * @return Google_Service_ShoppingContent_ShippingSettings
   */
  public function patch($merchantId, $accountId, Google_Service_ShoppingContent_ShippingSettings $postBody, $optParams = array())
  {
    $params = array('merchantId' => $merchantId, 'accountId' => $accountId, 'postBody' => $postBody);
    $params = array_merge($params, $optParams);
    return $this->call('patch', array($params), "Google_Service_ShoppingContent_ShippingSettings");
  }
  /**
   * Updates the shipping settings of the account. (shippingsettings.update)
   *
   * @param string $merchantId The ID of the managing account. If this account is
   * not a multi-client account, then this parameter must be the same as
   * accountId.
   * @param string $accountId The ID of the account for which to get/update
   * shipping settings.
   * @param Google_Service_ShoppingContent_ShippingSettings $postBody
   * @param array $optParams Optional parameters.
   *
   * @opt_param bool dryRun Flag to run the request in dry-run mode.
   * @return Google_Service_ShoppingContent_ShippingSettings
   */
  public function update($merchantId, $accountId, Google_Service_ShoppingContent_ShippingSettings $postBody, $optParams = array())
  {
    $params = array('merchantId' => $merchantId, 'accountId' => $accountId, 'postBody' => $postBody);
    $params = array_merge($params, $optParams);
    return $this->call('update', array($params), "Google_Service_ShoppingContent_ShippingSettings");
  }
}
