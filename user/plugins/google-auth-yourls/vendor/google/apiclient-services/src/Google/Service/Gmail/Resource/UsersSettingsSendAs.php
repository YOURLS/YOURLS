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
 * The "sendAs" collection of methods.
 * Typical usage is:
 *  <code>
 *   $gmailService = new Google_Service_Gmail(...);
 *   $sendAs = $gmailService->sendAs;
 *  </code>
 */
class Google_Service_Gmail_Resource_UsersSettingsSendAs extends Google_Service_Resource
{
  /**
   * Creates a custom "from" send-as alias. If an SMTP MSA is specified, Gmail
   * will attempt to connect to the SMTP service to validate the configuration
   * before creating the alias. If ownership verification is required for the
   * alias, a message will be sent to the email address and the resource's
   * verification status will be set to pending; otherwise, the resource will be
   * created with verification status set to accepted. If a signature is provided,
   * Gmail will sanitize the HTML before saving it with the alias.
   *
   * This method is only available to service account clients that have been
   * delegated domain-wide authority. (sendAs.create)
   *
   * @param string $userId User's email address. The special value "me" can be
   * used to indicate the authenticated user.
   * @param Google_Service_Gmail_SendAs $postBody
   * @param array $optParams Optional parameters.
   * @return Google_Service_Gmail_SendAs
   */
  public function create($userId, Google_Service_Gmail_SendAs $postBody, $optParams = array())
  {
    $params = array('userId' => $userId, 'postBody' => $postBody);
    $params = array_merge($params, $optParams);
    return $this->call('create', array($params), "Google_Service_Gmail_SendAs");
  }
  /**
   * Deletes the specified send-as alias. Revokes any verification that may have
   * been required for using it.
   *
   * This method is only available to service account clients that have been
   * delegated domain-wide authority. (sendAs.delete)
   *
   * @param string $userId User's email address. The special value "me" can be
   * used to indicate the authenticated user.
   * @param string $sendAsEmail The send-as alias to be deleted.
   * @param array $optParams Optional parameters.
   */
  public function delete($userId, $sendAsEmail, $optParams = array())
  {
    $params = array('userId' => $userId, 'sendAsEmail' => $sendAsEmail);
    $params = array_merge($params, $optParams);
    return $this->call('delete', array($params));
  }
  /**
   * Gets the specified send-as alias. Fails with an HTTP 404 error if the
   * specified address is not a member of the collection. (sendAs.get)
   *
   * @param string $userId User's email address. The special value "me" can be
   * used to indicate the authenticated user.
   * @param string $sendAsEmail The send-as alias to be retrieved.
   * @param array $optParams Optional parameters.
   * @return Google_Service_Gmail_SendAs
   */
  public function get($userId, $sendAsEmail, $optParams = array())
  {
    $params = array('userId' => $userId, 'sendAsEmail' => $sendAsEmail);
    $params = array_merge($params, $optParams);
    return $this->call('get', array($params), "Google_Service_Gmail_SendAs");
  }
  /**
   * Lists the send-as aliases for the specified account. The result includes the
   * primary send-as address associated with the account as well as any custom
   * "from" aliases. (sendAs.listUsersSettingsSendAs)
   *
   * @param string $userId User's email address. The special value "me" can be
   * used to indicate the authenticated user.
   * @param array $optParams Optional parameters.
   * @return Google_Service_Gmail_ListSendAsResponse
   */
  public function listUsersSettingsSendAs($userId, $optParams = array())
  {
    $params = array('userId' => $userId);
    $params = array_merge($params, $optParams);
    return $this->call('list', array($params), "Google_Service_Gmail_ListSendAsResponse");
  }
  /**
   * Updates a send-as alias. If a signature is provided, Gmail will sanitize the
   * HTML before saving it with the alias.
   *
   * Addresses other than the primary address for the account can only be updated
   * by service account clients that have been delegated domain-wide authority.
   * This method supports patch semantics. (sendAs.patch)
   *
   * @param string $userId User's email address. The special value "me" can be
   * used to indicate the authenticated user.
   * @param string $sendAsEmail The send-as alias to be updated.
   * @param Google_Service_Gmail_SendAs $postBody
   * @param array $optParams Optional parameters.
   * @return Google_Service_Gmail_SendAs
   */
  public function patch($userId, $sendAsEmail, Google_Service_Gmail_SendAs $postBody, $optParams = array())
  {
    $params = array('userId' => $userId, 'sendAsEmail' => $sendAsEmail, 'postBody' => $postBody);
    $params = array_merge($params, $optParams);
    return $this->call('patch', array($params), "Google_Service_Gmail_SendAs");
  }
  /**
   * Updates a send-as alias. If a signature is provided, Gmail will sanitize the
   * HTML before saving it with the alias.
   *
   * Addresses other than the primary address for the account can only be updated
   * by service account clients that have been delegated domain-wide authority.
   * (sendAs.update)
   *
   * @param string $userId User's email address. The special value "me" can be
   * used to indicate the authenticated user.
   * @param string $sendAsEmail The send-as alias to be updated.
   * @param Google_Service_Gmail_SendAs $postBody
   * @param array $optParams Optional parameters.
   * @return Google_Service_Gmail_SendAs
   */
  public function update($userId, $sendAsEmail, Google_Service_Gmail_SendAs $postBody, $optParams = array())
  {
    $params = array('userId' => $userId, 'sendAsEmail' => $sendAsEmail, 'postBody' => $postBody);
    $params = array_merge($params, $optParams);
    return $this->call('update', array($params), "Google_Service_Gmail_SendAs");
  }
  /**
   * Sends a verification email to the specified send-as alias address. The
   * verification status must be pending.
   *
   * This method is only available to service account clients that have been
   * delegated domain-wide authority. (sendAs.verify)
   *
   * @param string $userId User's email address. The special value "me" can be
   * used to indicate the authenticated user.
   * @param string $sendAsEmail The send-as alias to be verified.
   * @param array $optParams Optional parameters.
   */
  public function verify($userId, $sendAsEmail, $optParams = array())
  {
    $params = array('userId' => $userId, 'sendAsEmail' => $sendAsEmail);
    $params = array_merge($params, $optParams);
    return $this->call('verify', array($params));
  }
}
