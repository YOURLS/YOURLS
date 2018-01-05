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
 *   $adsensehostService = new Google_Service_AdSenseHost(...);
 *   $accounts = $adsensehostService->accounts;
 *  </code>
 */
class Google_Service_AdSenseHost_Resource_Accounts extends Google_Service_Resource
{
  /**
   * Get information about the selected associated AdSense account. (accounts.get)
   *
   * @param string $accountId Account to get information about.
   * @param array $optParams Optional parameters.
   * @return Google_Service_AdSenseHost_Account
   */
  public function get($accountId, $optParams = array())
  {
    $params = array('accountId' => $accountId);
    $params = array_merge($params, $optParams);
    return $this->call('get', array($params), "Google_Service_AdSenseHost_Account");
  }
  /**
   * List hosted accounts associated with this AdSense account by ad client id.
   * (accounts.listAccounts)
   *
   * @param string|array $filterAdClientId Ad clients to list accounts for.
   * @param array $optParams Optional parameters.
   * @return Google_Service_AdSenseHost_Accounts
   */
  public function listAccounts($filterAdClientId, $optParams = array())
  {
    $params = array('filterAdClientId' => $filterAdClientId);
    $params = array_merge($params, $optParams);
    return $this->call('list', array($params), "Google_Service_AdSenseHost_Accounts");
  }
}
