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
 *   $mirrorService = new Google_Service_Mirror(...);
 *   $accounts = $mirrorService->accounts;
 *  </code>
 */
class Google_Service_Mirror_Resource_Accounts extends Google_Service_Resource
{
  /**
   * Inserts a new account for a user (accounts.insert)
   *
   * @param string $userToken The ID for the user.
   * @param string $accountType Account type to be passed to Android Account
   * Manager.
   * @param string $accountName The name of the account to be passed to the
   * Android Account Manager.
   * @param Google_Service_Mirror_Account $postBody
   * @param array $optParams Optional parameters.
   * @return Google_Service_Mirror_Account
   */
  public function insert($userToken, $accountType, $accountName, Google_Service_Mirror_Account $postBody, $optParams = array())
  {
    $params = array('userToken' => $userToken, 'accountType' => $accountType, 'accountName' => $accountName, 'postBody' => $postBody);
    $params = array_merge($params, $optParams);
    return $this->call('insert', array($params), "Google_Service_Mirror_Account");
  }
}
