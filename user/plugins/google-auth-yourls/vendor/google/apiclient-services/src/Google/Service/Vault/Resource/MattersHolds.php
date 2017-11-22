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
 * The "holds" collection of methods.
 * Typical usage is:
 *  <code>
 *   $vaultService = new Google_Service_Vault(...);
 *   $holds = $vaultService->holds;
 *  </code>
 */
class Google_Service_Vault_Resource_MattersHolds extends Google_Service_Resource
{
  /**
   * Creates a hold in the given matter. (holds.create)
   *
   * @param string $matterId The matter ID.
   * @param Google_Service_Vault_Hold $postBody
   * @param array $optParams Optional parameters.
   * @return Google_Service_Vault_Hold
   */
  public function create($matterId, Google_Service_Vault_Hold $postBody, $optParams = array())
  {
    $params = array('matterId' => $matterId, 'postBody' => $postBody);
    $params = array_merge($params, $optParams);
    return $this->call('create', array($params), "Google_Service_Vault_Hold");
  }
  /**
   * Removes a hold by ID. This will release any HeldAccounts on this Hold.
   * (holds.delete)
   *
   * @param string $matterId The matter ID.
   * @param string $holdId The hold ID.
   * @param array $optParams Optional parameters.
   * @return Google_Service_Vault_VaultEmpty
   */
  public function delete($matterId, $holdId, $optParams = array())
  {
    $params = array('matterId' => $matterId, 'holdId' => $holdId);
    $params = array_merge($params, $optParams);
    return $this->call('delete', array($params), "Google_Service_Vault_VaultEmpty");
  }
  /**
   * Gets a hold by ID. (holds.get)
   *
   * @param string $matterId The matter ID.
   * @param string $holdId The hold ID.
   * @param array $optParams Optional parameters.
   * @return Google_Service_Vault_Hold
   */
  public function get($matterId, $holdId, $optParams = array())
  {
    $params = array('matterId' => $matterId, 'holdId' => $holdId);
    $params = array_merge($params, $optParams);
    return $this->call('get', array($params), "Google_Service_Vault_Hold");
  }
  /**
   * Lists holds within a matter. An empty page token in ListHoldsResponse denotes
   * no more holds to list. (holds.listMattersHolds)
   *
   * @param string $matterId The matter ID.
   * @param array $optParams Optional parameters.
   *
   * @opt_param string pageToken The pagination token as returned in the response.
   * An empty token means start from the beginning.
   * @opt_param int pageSize The number of holds to return in the response,
   * between 0 and 100 inclusive. Leaving this empty, or as 0, is the same as
   * page_size = 100.
   * @return Google_Service_Vault_ListHoldsResponse
   */
  public function listMattersHolds($matterId, $optParams = array())
  {
    $params = array('matterId' => $matterId);
    $params = array_merge($params, $optParams);
    return $this->call('list', array($params), "Google_Service_Vault_ListHoldsResponse");
  }
  /**
   * Updates the OU and/or query parameters of a hold. You cannot add accounts to
   * a hold that covers an OU, nor can you add OUs to a hold that covers
   * individual accounts. Accounts listed in the hold will be ignored.
   * (holds.update)
   *
   * @param string $matterId The matter ID.
   * @param string $holdId The ID of the hold.
   * @param Google_Service_Vault_Hold $postBody
   * @param array $optParams Optional parameters.
   * @return Google_Service_Vault_Hold
   */
  public function update($matterId, $holdId, Google_Service_Vault_Hold $postBody, $optParams = array())
  {
    $params = array('matterId' => $matterId, 'holdId' => $holdId, 'postBody' => $postBody);
    $params = array_merge($params, $optParams);
    return $this->call('update', array($params), "Google_Service_Vault_Hold");
  }
}
