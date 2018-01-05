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
 *   $adexchangebuyerService = new Google_Service_AdExchangeBuyer(...);
 *   $accounts = $adexchangebuyerService->accounts;
 *  </code>
 */
class Google_Service_AdExchangeBuyer_Resource_Accounts extends Google_Service_Resource
{
  /**
   * Gets one account by ID. (accounts.get)
   *
   * @param int $id The account id
   * @param array $optParams Optional parameters.
   * @return Google_Service_AdExchangeBuyer_Account
   */
  public function get($id, $optParams = array())
  {
    $params = array('id' => $id);
    $params = array_merge($params, $optParams);
    return $this->call('get', array($params), "Google_Service_AdExchangeBuyer_Account");
  }
  /**
   * Retrieves the authenticated user's list of accounts. (accounts.listAccounts)
   *
   * @param array $optParams Optional parameters.
   * @return Google_Service_AdExchangeBuyer_AccountsList
   */
  public function listAccounts($optParams = array())
  {
    $params = array();
    $params = array_merge($params, $optParams);
    return $this->call('list', array($params), "Google_Service_AdExchangeBuyer_AccountsList");
  }
  /**
   * Updates an existing account. This method supports patch semantics.
   * (accounts.patch)
   *
   * @param int $id The account id
   * @param Google_Service_AdExchangeBuyer_Account $postBody
   * @param array $optParams Optional parameters.
   *
   * @opt_param bool confirmUnsafeAccountChange Confirmation for erasing bidder
   * and cookie matching urls.
   * @return Google_Service_AdExchangeBuyer_Account
   */
  public function patch($id, Google_Service_AdExchangeBuyer_Account $postBody, $optParams = array())
  {
    $params = array('id' => $id, 'postBody' => $postBody);
    $params = array_merge($params, $optParams);
    return $this->call('patch', array($params), "Google_Service_AdExchangeBuyer_Account");
  }
  /**
   * Updates an existing account. (accounts.update)
   *
   * @param int $id The account id
   * @param Google_Service_AdExchangeBuyer_Account $postBody
   * @param array $optParams Optional parameters.
   *
   * @opt_param bool confirmUnsafeAccountChange Confirmation for erasing bidder
   * and cookie matching urls.
   * @return Google_Service_AdExchangeBuyer_Account
   */
  public function update($id, Google_Service_AdExchangeBuyer_Account $postBody, $optParams = array())
  {
    $params = array('id' => $id, 'postBody' => $postBody);
    $params = array_merge($params, $optParams);
    return $this->call('update', array($params), "Google_Service_AdExchangeBuyer_Account");
  }
}
