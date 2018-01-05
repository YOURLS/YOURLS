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
 * The "invitations" collection of methods.
 * Typical usage is:
 *  <code>
 *   $adexchangebuyer2Service = new Google_Service_AdExchangeBuyerII(...);
 *   $invitations = $adexchangebuyer2Service->invitations;
 *  </code>
 */
class Google_Service_AdExchangeBuyerII_Resource_AccountsClientsInvitations extends Google_Service_Resource
{
  /**
   * Creates and sends out an email invitation to access an Ad Exchange client
   * buyer account. (invitations.create)
   *
   * @param string $accountId Numerical account ID of the client's sponsor buyer.
   * (required)
   * @param string $clientAccountId Numerical account ID of the client buyer that
   * the user should be associated with. (required)
   * @param Google_Service_AdExchangeBuyerII_ClientUserInvitation $postBody
   * @param array $optParams Optional parameters.
   * @return Google_Service_AdExchangeBuyerII_ClientUserInvitation
   */
  public function create($accountId, $clientAccountId, Google_Service_AdExchangeBuyerII_ClientUserInvitation $postBody, $optParams = array())
  {
    $params = array('accountId' => $accountId, 'clientAccountId' => $clientAccountId, 'postBody' => $postBody);
    $params = array_merge($params, $optParams);
    return $this->call('create', array($params), "Google_Service_AdExchangeBuyerII_ClientUserInvitation");
  }
  /**
   * Retrieves an existing client user invitation. (invitations.get)
   *
   * @param string $accountId Numerical account ID of the client's sponsor buyer.
   * (required)
   * @param string $clientAccountId Numerical account ID of the client buyer that
   * the user invitation to be retrieved is associated with. (required)
   * @param string $invitationId Numerical identifier of the user invitation to
   * retrieve. (required)
   * @param array $optParams Optional parameters.
   * @return Google_Service_AdExchangeBuyerII_ClientUserInvitation
   */
  public function get($accountId, $clientAccountId, $invitationId, $optParams = array())
  {
    $params = array('accountId' => $accountId, 'clientAccountId' => $clientAccountId, 'invitationId' => $invitationId);
    $params = array_merge($params, $optParams);
    return $this->call('get', array($params), "Google_Service_AdExchangeBuyerII_ClientUserInvitation");
  }
  /**
   * Lists all the client users invitations for a client with a given account ID.
   * (invitations.listAccountsClientsInvitations)
   *
   * @param string $accountId Numerical account ID of the client's sponsor buyer.
   * (required)
   * @param string $clientAccountId Numerical account ID of the client buyer to
   * list invitations for. (required) You must either specify a string
   * representation of a numerical account identifier or the `-` character to list
   * all the invitations for all the clients of a given sponsor buyer.
   * @param array $optParams Optional parameters.
   *
   * @opt_param string pageToken A token identifying a page of results the server
   * should return. Typically, this is the value of
   * ListClientUserInvitationsResponse.nextPageToken returned from the previous
   * call to the clients.invitations.list method.
   * @opt_param int pageSize Requested page size. Server may return fewer clients
   * than requested. If unspecified, server will pick an appropriate default.
   * @return Google_Service_AdExchangeBuyerII_ListClientUserInvitationsResponse
   */
  public function listAccountsClientsInvitations($accountId, $clientAccountId, $optParams = array())
  {
    $params = array('accountId' => $accountId, 'clientAccountId' => $clientAccountId);
    $params = array_merge($params, $optParams);
    return $this->call('list', array($params), "Google_Service_AdExchangeBuyerII_ListClientUserInvitationsResponse");
  }
}
