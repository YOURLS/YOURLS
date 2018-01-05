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
 * The "accounts" collection of methods.
 * Typical usage is:
 *  <code>
 *   $contentService = new Google_Service_ShoppingContent(...);
 *   $accounts = $contentService->accounts;
 *  </code>
 */
class Google_Service_ShoppingContent_Resource_Accounts extends Google_Service_Resource
{
  /**
   * Returns information about the authenticated user. (accounts.authinfo)
   *
   * @param array $optParams Optional parameters.
   * @return Google_Service_ShoppingContent_AccountsAuthInfoResponse
   */
  public function authinfo($optParams = array())
  {
    $params = array();
    $params = array_merge($params, $optParams);
    return $this->call('authinfo', array($params), "Google_Service_ShoppingContent_AccountsAuthInfoResponse");
  }
  /**
   * Claims the website of a Merchant Center sub-account. (accounts.claimwebsite)
   *
   * @param string $merchantId The ID of the managing account. If this account is
   * not a multi-client account, then this parameter must be the same as
   * accountId.
   * @param string $accountId The ID of the account whose website is claimed.
   * @param array $optParams Optional parameters.
   *
   * @opt_param bool overwrite Only available to selected merchants. When set to
   * True, this flag removes any existing claim on the requested website by
   * another account and replaces it with a claim from this account.
   * @return Google_Service_ShoppingContent_AccountsClaimWebsiteResponse
   */
  public function claimwebsite($merchantId, $accountId, $optParams = array())
  {
    $params = array('merchantId' => $merchantId, 'accountId' => $accountId);
    $params = array_merge($params, $optParams);
    return $this->call('claimwebsite', array($params), "Google_Service_ShoppingContent_AccountsClaimWebsiteResponse");
  }
  /**
   * Retrieves, inserts, updates, and deletes multiple Merchant Center
   * (sub-)accounts in a single request. (accounts.custombatch)
   *
   * @param Google_Service_ShoppingContent_AccountsCustomBatchRequest $postBody
   * @param array $optParams Optional parameters.
   *
   * @opt_param bool dryRun Flag to run the request in dry-run mode.
   * @return Google_Service_ShoppingContent_AccountsCustomBatchResponse
   */
  public function custombatch(Google_Service_ShoppingContent_AccountsCustomBatchRequest $postBody, $optParams = array())
  {
    $params = array('postBody' => $postBody);
    $params = array_merge($params, $optParams);
    return $this->call('custombatch', array($params), "Google_Service_ShoppingContent_AccountsCustomBatchResponse");
  }
  /**
   * Deletes a Merchant Center sub-account. (accounts.delete)
   *
   * @param string $merchantId The ID of the managing account. This must be a
   * multi-client account.
   * @param string $accountId The ID of the account.
   * @param array $optParams Optional parameters.
   *
   * @opt_param bool dryRun Flag to run the request in dry-run mode.
   * @opt_param bool force Flag to delete sub-accounts with products. The default
   * value is false.
   */
  public function delete($merchantId, $accountId, $optParams = array())
  {
    $params = array('merchantId' => $merchantId, 'accountId' => $accountId);
    $params = array_merge($params, $optParams);
    return $this->call('delete', array($params));
  }
  /**
   * Retrieves a Merchant Center account. (accounts.get)
   *
   * @param string $merchantId The ID of the managing account. If this account is
   * not a multi-client account, then this parameter must be the same as
   * accountId.
   * @param string $accountId The ID of the account.
   * @param array $optParams Optional parameters.
   * @return Google_Service_ShoppingContent_Account
   */
  public function get($merchantId, $accountId, $optParams = array())
  {
    $params = array('merchantId' => $merchantId, 'accountId' => $accountId);
    $params = array_merge($params, $optParams);
    return $this->call('get', array($params), "Google_Service_ShoppingContent_Account");
  }
  /**
   * Creates a Merchant Center sub-account. (accounts.insert)
   *
   * @param string $merchantId The ID of the managing account. This must be a
   * multi-client account.
   * @param Google_Service_ShoppingContent_Account $postBody
   * @param array $optParams Optional parameters.
   *
   * @opt_param bool dryRun Flag to run the request in dry-run mode.
   * @return Google_Service_ShoppingContent_Account
   */
  public function insert($merchantId, Google_Service_ShoppingContent_Account $postBody, $optParams = array())
  {
    $params = array('merchantId' => $merchantId, 'postBody' => $postBody);
    $params = array_merge($params, $optParams);
    return $this->call('insert', array($params), "Google_Service_ShoppingContent_Account");
  }
  /**
   * Lists the sub-accounts in your Merchant Center account.
   * (accounts.listAccounts)
   *
   * @param string $merchantId The ID of the managing account. This must be a
   * multi-client account.
   * @param array $optParams Optional parameters.
   *
   * @opt_param string maxResults The maximum number of accounts to return in the
   * response, used for paging.
   * @opt_param string pageToken The token returned by the previous request.
   * @return Google_Service_ShoppingContent_AccountsListResponse
   */
  public function listAccounts($merchantId, $optParams = array())
  {
    $params = array('merchantId' => $merchantId);
    $params = array_merge($params, $optParams);
    return $this->call('list', array($params), "Google_Service_ShoppingContent_AccountsListResponse");
  }
  /**
   * Updates a Merchant Center account. This method supports patch semantics.
   * (accounts.patch)
   *
   * @param string $merchantId The ID of the managing account. If this account is
   * not a multi-client account, then this parameter must be the same as
   * accountId.
   * @param string $accountId The ID of the account.
   * @param Google_Service_ShoppingContent_Account $postBody
   * @param array $optParams Optional parameters.
   *
   * @opt_param bool dryRun Flag to run the request in dry-run mode.
   * @return Google_Service_ShoppingContent_Account
   */
  public function patch($merchantId, $accountId, Google_Service_ShoppingContent_Account $postBody, $optParams = array())
  {
    $params = array('merchantId' => $merchantId, 'accountId' => $accountId, 'postBody' => $postBody);
    $params = array_merge($params, $optParams);
    return $this->call('patch', array($params), "Google_Service_ShoppingContent_Account");
  }
  /**
   * Updates a Merchant Center account. (accounts.update)
   *
   * @param string $merchantId The ID of the managing account. If this account is
   * not a multi-client account, then this parameter must be the same as
   * accountId.
   * @param string $accountId The ID of the account.
   * @param Google_Service_ShoppingContent_Account $postBody
   * @param array $optParams Optional parameters.
   *
   * @opt_param bool dryRun Flag to run the request in dry-run mode.
   * @return Google_Service_ShoppingContent_Account
   */
  public function update($merchantId, $accountId, Google_Service_ShoppingContent_Account $postBody, $optParams = array())
  {
    $params = array('merchantId' => $merchantId, 'accountId' => $accountId, 'postBody' => $postBody);
    $params = array_merge($params, $optParams);
    return $this->call('update', array($params), "Google_Service_ShoppingContent_Account");
  }
}
