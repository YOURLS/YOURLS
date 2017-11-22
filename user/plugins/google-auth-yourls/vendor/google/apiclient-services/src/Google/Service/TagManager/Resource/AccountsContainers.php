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
 * The "containers" collection of methods.
 * Typical usage is:
 *  <code>
 *   $tagmanagerService = new Google_Service_TagManager(...);
 *   $containers = $tagmanagerService->containers;
 *  </code>
 */
class Google_Service_TagManager_Resource_AccountsContainers extends Google_Service_Resource
{
  /**
   * Creates a Container. (containers.create)
   *
   * @param string $parent GTM Account's API relative path. Example:
   * accounts/{account_id}.
   * @param Google_Service_TagManager_Container $postBody
   * @param array $optParams Optional parameters.
   * @return Google_Service_TagManager_Container
   */
  public function create($parent, Google_Service_TagManager_Container $postBody, $optParams = array())
  {
    $params = array('parent' => $parent, 'postBody' => $postBody);
    $params = array_merge($params, $optParams);
    return $this->call('create', array($params), "Google_Service_TagManager_Container");
  }
  /**
   * Deletes a Container. (containers.delete)
   *
   * @param string $path GTM Container's API relative path. Example:
   * accounts/{account_id}/containers/{container_id}
   * @param array $optParams Optional parameters.
   */
  public function delete($path, $optParams = array())
  {
    $params = array('path' => $path);
    $params = array_merge($params, $optParams);
    return $this->call('delete', array($params));
  }
  /**
   * Gets a Container. (containers.get)
   *
   * @param string $path GTM Container's API relative path. Example:
   * accounts/{account_id}/containers/{container_id}
   * @param array $optParams Optional parameters.
   * @return Google_Service_TagManager_Container
   */
  public function get($path, $optParams = array())
  {
    $params = array('path' => $path);
    $params = array_merge($params, $optParams);
    return $this->call('get', array($params), "Google_Service_TagManager_Container");
  }
  /**
   * Lists all Containers that belongs to a GTM Account.
   * (containers.listAccountsContainers)
   *
   * @param string $parent GTM Accounts's API relative path. Example:
   * accounts/{account_id}.
   * @param array $optParams Optional parameters.
   *
   * @opt_param string pageToken Continuation token for fetching the next page of
   * results.
   * @return Google_Service_TagManager_ListContainersResponse
   */
  public function listAccountsContainers($parent, $optParams = array())
  {
    $params = array('parent' => $parent);
    $params = array_merge($params, $optParams);
    return $this->call('list', array($params), "Google_Service_TagManager_ListContainersResponse");
  }
  /**
   * Updates a Container. (containers.update)
   *
   * @param string $path GTM Container's API relative path. Example:
   * accounts/{account_id}/containers/{container_id}
   * @param Google_Service_TagManager_Container $postBody
   * @param array $optParams Optional parameters.
   *
   * @opt_param string fingerprint When provided, this fingerprint must match the
   * fingerprint of the container in storage.
   * @return Google_Service_TagManager_Container
   */
  public function update($path, Google_Service_TagManager_Container $postBody, $optParams = array())
  {
    $params = array('path' => $path, 'postBody' => $postBody);
    $params = array_merge($params, $optParams);
    return $this->call('update', array($params), "Google_Service_TagManager_Container");
  }
}
