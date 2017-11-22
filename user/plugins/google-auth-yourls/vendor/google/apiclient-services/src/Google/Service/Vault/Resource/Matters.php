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
 * The "matters" collection of methods.
 * Typical usage is:
 *  <code>
 *   $vaultService = new Google_Service_Vault(...);
 *   $matters = $vaultService->matters;
 *  </code>
 */
class Google_Service_Vault_Resource_Matters extends Google_Service_Resource
{
  /**
   * Adds an account as a matter collaborator. (matters.addPermissions)
   *
   * @param string $matterId The matter ID.
   * @param Google_Service_Vault_AddMatterPermissionsRequest $postBody
   * @param array $optParams Optional parameters.
   * @return Google_Service_Vault_MatterPermission
   */
  public function addPermissions($matterId, Google_Service_Vault_AddMatterPermissionsRequest $postBody, $optParams = array())
  {
    $params = array('matterId' => $matterId, 'postBody' => $postBody);
    $params = array_merge($params, $optParams);
    return $this->call('addPermissions', array($params), "Google_Service_Vault_MatterPermission");
  }
  /**
   * Closes the specified matter. Returns matter with updated state.
   * (matters.close)
   *
   * @param string $matterId The matter ID.
   * @param Google_Service_Vault_CloseMatterRequest $postBody
   * @param array $optParams Optional parameters.
   * @return Google_Service_Vault_CloseMatterResponse
   */
  public function close($matterId, Google_Service_Vault_CloseMatterRequest $postBody, $optParams = array())
  {
    $params = array('matterId' => $matterId, 'postBody' => $postBody);
    $params = array_merge($params, $optParams);
    return $this->call('close', array($params), "Google_Service_Vault_CloseMatterResponse");
  }
  /**
   * Creates a new matter. Returns created matter with default view.
   * (matters.create)
   *
   * @param Google_Service_Vault_Matter $postBody
   * @param array $optParams Optional parameters.
   * @return Google_Service_Vault_Matter
   */
  public function create(Google_Service_Vault_Matter $postBody, $optParams = array())
  {
    $params = array('postBody' => $postBody);
    $params = array_merge($params, $optParams);
    return $this->call('create', array($params), "Google_Service_Vault_Matter");
  }
  /**
   * Deletes the specified matter. Returns matter with updated state.
   * (matters.delete)
   *
   * @param string $matterId The matter ID
   * @param array $optParams Optional parameters.
   * @return Google_Service_Vault_Matter
   */
  public function delete($matterId, $optParams = array())
  {
    $params = array('matterId' => $matterId);
    $params = array_merge($params, $optParams);
    return $this->call('delete', array($params), "Google_Service_Vault_Matter");
  }
  /**
   * Gets the specified matter. (matters.get)
   *
   * @param string $matterId The matter ID.
   * @param array $optParams Optional parameters.
   *
   * @opt_param string view Specifies which parts of the Matter to return in the
   * response.
   * @return Google_Service_Vault_Matter
   */
  public function get($matterId, $optParams = array())
  {
    $params = array('matterId' => $matterId);
    $params = array_merge($params, $optParams);
    return $this->call('get', array($params), "Google_Service_Vault_Matter");
  }
  /**
   * Lists matters the user has access to. (matters.listMatters)
   *
   * @param array $optParams Optional parameters.
   *
   * @opt_param int pageSize The number of matters to return in the response.
   * Default and maximum are 100.
   * @opt_param string view Specifies which parts of the matter to return in
   * response.
   * @opt_param string pageToken The pagination token as returned in the response.
   * @return Google_Service_Vault_ListMattersResponse
   */
  public function listMatters($optParams = array())
  {
    $params = array();
    $params = array_merge($params, $optParams);
    return $this->call('list', array($params), "Google_Service_Vault_ListMattersResponse");
  }
  /**
   * Removes an account as a matter collaborator. (matters.removePermissions)
   *
   * @param string $matterId The matter ID.
   * @param Google_Service_Vault_RemoveMatterPermissionsRequest $postBody
   * @param array $optParams Optional parameters.
   * @return Google_Service_Vault_VaultEmpty
   */
  public function removePermissions($matterId, Google_Service_Vault_RemoveMatterPermissionsRequest $postBody, $optParams = array())
  {
    $params = array('matterId' => $matterId, 'postBody' => $postBody);
    $params = array_merge($params, $optParams);
    return $this->call('removePermissions', array($params), "Google_Service_Vault_VaultEmpty");
  }
  /**
   * Reopens the specified matter. Returns matter with updated state.
   * (matters.reopen)
   *
   * @param string $matterId The matter ID.
   * @param Google_Service_Vault_ReopenMatterRequest $postBody
   * @param array $optParams Optional parameters.
   * @return Google_Service_Vault_ReopenMatterResponse
   */
  public function reopen($matterId, Google_Service_Vault_ReopenMatterRequest $postBody, $optParams = array())
  {
    $params = array('matterId' => $matterId, 'postBody' => $postBody);
    $params = array_merge($params, $optParams);
    return $this->call('reopen', array($params), "Google_Service_Vault_ReopenMatterResponse");
  }
  /**
   * Undeletes the specified matter. Returns matter with updated state.
   * (matters.undelete)
   *
   * @param string $matterId The matter ID.
   * @param Google_Service_Vault_UndeleteMatterRequest $postBody
   * @param array $optParams Optional parameters.
   * @return Google_Service_Vault_Matter
   */
  public function undelete($matterId, Google_Service_Vault_UndeleteMatterRequest $postBody, $optParams = array())
  {
    $params = array('matterId' => $matterId, 'postBody' => $postBody);
    $params = array_merge($params, $optParams);
    return $this->call('undelete', array($params), "Google_Service_Vault_Matter");
  }
  /**
   * Updates the specified matter. This updates only the name and description of
   * the matter, identified by matter id. Changes to any other fields are ignored.
   * Returns the default view of the matter. (matters.update)
   *
   * @param string $matterId The matter ID.
   * @param Google_Service_Vault_Matter $postBody
   * @param array $optParams Optional parameters.
   * @return Google_Service_Vault_Matter
   */
  public function update($matterId, Google_Service_Vault_Matter $postBody, $optParams = array())
  {
    $params = array('matterId' => $matterId, 'postBody' => $postBody);
    $params = array_merge($params, $optParams);
    return $this->call('update', array($params), "Google_Service_Vault_Matter");
  }
}
