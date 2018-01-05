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
 *   $adsenseService = new Google_Service_AdSense(...);
 *   $accounts = $adsenseService->accounts;
 *  </code>
 */
class Google_Service_AdSense_Resource_Accounts extends Google_Service_Resource
{
  /**
   * Get information about the selected AdSense account. (accounts.get)
   *
   * @param string $accountId Account to get information about.
   * @param array $optParams Optional parameters.
   *
   * @opt_param bool tree Whether the tree of sub accounts should be returned.
   * @return Google_Service_AdSense_Account
   */
  public function get($accountId, $optParams = array())
  {
    $params = array('accountId' => $accountId);
    $params = array_merge($params, $optParams);
    return $this->call('get', array($params), "Google_Service_AdSense_Account");
  }
  /**
   * List all accounts available to this AdSense account. (accounts.listAccounts)
   *
   * @param array $optParams Optional parameters.
   *
   * @opt_param int maxResults The maximum number of accounts to include in the
   * response, used for paging.
   * @opt_param string pageToken A continuation token, used to page through
   * accounts. To retrieve the next page, set this parameter to the value of
   * "nextPageToken" from the previous response.
   * @return Google_Service_AdSense_Accounts
   */
  public function listAccounts($optParams = array())
  {
    $params = array();
    $params = array_merge($params, $optParams);
    return $this->call('list', array($params), "Google_Service_AdSense_Accounts");
  }
}
