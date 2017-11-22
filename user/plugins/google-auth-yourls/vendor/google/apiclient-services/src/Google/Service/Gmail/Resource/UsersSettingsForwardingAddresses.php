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
 * The "forwardingAddresses" collection of methods.
 * Typical usage is:
 *  <code>
 *   $gmailService = new Google_Service_Gmail(...);
 *   $forwardingAddresses = $gmailService->forwardingAddresses;
 *  </code>
 */
class Google_Service_Gmail_Resource_UsersSettingsForwardingAddresses extends Google_Service_Resource
{
  /**
   * Creates a forwarding address. If ownership verification is required, a
   * message will be sent to the recipient and the resource's verification status
   * will be set to pending; otherwise, the resource will be created with
   * verification status set to accepted.
   *
   * This method is only available to service account clients that have been
   * delegated domain-wide authority. (forwardingAddresses.create)
   *
   * @param string $userId User's email address. The special value "me" can be
   * used to indicate the authenticated user.
   * @param Google_Service_Gmail_ForwardingAddress $postBody
   * @param array $optParams Optional parameters.
   * @return Google_Service_Gmail_ForwardingAddress
   */
  public function create($userId, Google_Service_Gmail_ForwardingAddress $postBody, $optParams = array())
  {
    $params = array('userId' => $userId, 'postBody' => $postBody);
    $params = array_merge($params, $optParams);
    return $this->call('create', array($params), "Google_Service_Gmail_ForwardingAddress");
  }
  /**
   * Deletes the specified forwarding address and revokes any verification that
   * may have been required.
   *
   * This method is only available to service account clients that have been
   * delegated domain-wide authority. (forwardingAddresses.delete)
   *
   * @param string $userId User's email address. The special value "me" can be
   * used to indicate the authenticated user.
   * @param string $forwardingEmail The forwarding address to be deleted.
   * @param array $optParams Optional parameters.
   */
  public function delete($userId, $forwardingEmail, $optParams = array())
  {
    $params = array('userId' => $userId, 'forwardingEmail' => $forwardingEmail);
    $params = array_merge($params, $optParams);
    return $this->call('delete', array($params));
  }
  /**
   * Gets the specified forwarding address. (forwardingAddresses.get)
   *
   * @param string $userId User's email address. The special value "me" can be
   * used to indicate the authenticated user.
   * @param string $forwardingEmail The forwarding address to be retrieved.
   * @param array $optParams Optional parameters.
   * @return Google_Service_Gmail_ForwardingAddress
   */
  public function get($userId, $forwardingEmail, $optParams = array())
  {
    $params = array('userId' => $userId, 'forwardingEmail' => $forwardingEmail);
    $params = array_merge($params, $optParams);
    return $this->call('get', array($params), "Google_Service_Gmail_ForwardingAddress");
  }
  /**
   * Lists the forwarding addresses for the specified account.
   * (forwardingAddresses.listUsersSettingsForwardingAddresses)
   *
   * @param string $userId User's email address. The special value "me" can be
   * used to indicate the authenticated user.
   * @param array $optParams Optional parameters.
   * @return Google_Service_Gmail_ListForwardingAddressesResponse
   */
  public function listUsersSettingsForwardingAddresses($userId, $optParams = array())
  {
    $params = array('userId' => $userId);
    $params = array_merge($params, $optParams);
    return $this->call('list', array($params), "Google_Service_Gmail_ListForwardingAddressesResponse");
  }
}
