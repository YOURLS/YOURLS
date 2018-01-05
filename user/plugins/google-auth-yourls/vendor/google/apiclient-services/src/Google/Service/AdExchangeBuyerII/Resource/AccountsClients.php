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
 * The "clients" collection of methods.
 * Typical usage is:
 *  <code>
 *   $adexchangebuyer2Service = new Google_Service_AdExchangeBuyerII(...);
 *   $clients = $adexchangebuyer2Service->clients;
 *  </code>
 */
class Google_Service_AdExchangeBuyerII_Resource_AccountsClients extends Google_Service_Resource
{
  /**
   * Creates a new client buyer. (clients.create)
   *
   * @param string $accountId Unique numerical account ID for the buyer of which
   * the client buyer is a customer; the sponsor buyer to create a client for.
   * (required)
   * @param Google_Service_AdExchangeBuyerII_Client $postBody
   * @param array $optParams Optional parameters.
   * @return Google_Service_AdExchangeBuyerII_Client
   */
  public function create($accountId, Google_Service_AdExchangeBuyerII_Client $postBody, $optParams = array())
  {
    $params = array('accountId' => $accountId, 'postBody' => $postBody);
    $params = array_merge($params, $optParams);
    return $this->call('create', array($params), "Google_Service_AdExchangeBuyerII_Client");
  }
  /**
   * Gets a client buyer with a given client account ID. (clients.get)
   *
   * @param string $accountId Numerical account ID of the client's sponsor buyer.
   * (required)
   * @param string $clientAccountId Numerical account ID of the client buyer to
   * retrieve. (required)
   * @param array $optParams Optional parameters.
   * @return Google_Service_AdExchangeBuyerII_Client
   */
  public function get($accountId, $clientAccountId, $optParams = array())
  {
    $params = array('accountId' => $accountId, 'clientAccountId' => $clientAccountId);
    $params = array_merge($params, $optParams);
    return $this->call('get', array($params), "Google_Service_AdExchangeBuyerII_Client");
  }
  /**
   * Lists all the clients for the current sponsor buyer.
   * (clients.listAccountsClients)
   *
   * @param string $accountId Unique numerical account ID of the sponsor buyer to
   * list the clients for.
   * @param array $optParams Optional parameters.
   *
   * @opt_param string pageToken A token identifying a page of results the server
   * should return. Typically, this is the value of
   * ListClientsResponse.nextPageToken returned from the previous call to the
   * accounts.clients.list method.
   * @opt_param string partnerClientId Optional unique identifier (from the
   * standpoint of an Ad Exchange sponsor buyer partner) of the client to return.
   * If specified, at most one client will be returned in the response.
   * @opt_param int pageSize Requested page size. The server may return fewer
   * clients than requested. If unspecified, the server will pick an appropriate
   * default.
   * @return Google_Service_AdExchangeBuyerII_ListClientsResponse
   */
  public function listAccountsClients($accountId, $optParams = array())
  {
    $params = array('accountId' => $accountId);
    $params = array_merge($params, $optParams);
    return $this->call('list', array($params), "Google_Service_AdExchangeBuyerII_ListClientsResponse");
  }
  /**
   * Updates an existing client buyer. (clients.update)
   *
   * @param string $accountId Unique numerical account ID for the buyer of which
   * the client buyer is a customer; the sponsor buyer to update a client for.
   * (required)
   * @param string $clientAccountId Unique numerical account ID of the client to
   * update. (required)
   * @param Google_Service_AdExchangeBuyerII_Client $postBody
   * @param array $optParams Optional parameters.
   * @return Google_Service_AdExchangeBuyerII_Client
   */
  public function update($accountId, $clientAccountId, Google_Service_AdExchangeBuyerII_Client $postBody, $optParams = array())
  {
    $params = array('accountId' => $accountId, 'clientAccountId' => $clientAccountId, 'postBody' => $postBody);
    $params = array_merge($params, $optParams);
    return $this->call('update', array($params), "Google_Service_AdExchangeBuyerII_Client");
  }
}
