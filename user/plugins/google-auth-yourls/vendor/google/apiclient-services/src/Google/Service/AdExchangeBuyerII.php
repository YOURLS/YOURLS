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
 * Service definition for AdExchangeBuyerII (v2beta1).
 *
 * <p>
 * Accesses the latest features for managing Ad Exchange accounts, Real-Time
 * Bidding configurations and auction metrics, and Marketplace programmatic
 * deals.</p>
 *
 * <p>
 * For more information about this service, see the API
 * <a href="https://developers.google.com/ad-exchange/buyer-rest/reference/rest/" target="_blank">Documentation</a>
 * </p>
 *
 * @author Google, Inc.
 */
class Google_Service_AdExchangeBuyerII extends Google_Service
{
  /** Manage your Ad Exchange buyer account configuration. */
  const ADEXCHANGE_BUYER =
      "https://www.googleapis.com/auth/adexchange.buyer";

  public $accounts_clients;
  public $accounts_clients_invitations;
  public $accounts_clients_users;
  public $accounts_creatives;
  public $accounts_creatives_dealAssociations;
  public $bidders_accounts_filterSets;
  public $bidders_accounts_filterSets_bidMetrics;
  public $bidders_accounts_filterSets_bidResponseErrors;
  public $bidders_accounts_filterSets_bidResponsesWithoutBids;
  public $bidders_accounts_filterSets_filteredBidRequests;
  public $bidders_accounts_filterSets_filteredBids;
  public $bidders_accounts_filterSets_filteredBids_creatives;
  public $bidders_accounts_filterSets_filteredBids_details;
  public $bidders_accounts_filterSets_impressionMetrics;
  public $bidders_accounts_filterSets_losingBids;
  public $bidders_accounts_filterSets_nonBillableWinningBids;
  public $bidders_filterSets;
  public $bidders_filterSets_bidMetrics;
  public $bidders_filterSets_bidResponseErrors;
  public $bidders_filterSets_bidResponsesWithoutBids;
  public $bidders_filterSets_filteredBidRequests;
  public $bidders_filterSets_filteredBids;
  public $bidders_filterSets_filteredBids_creatives;
  public $bidders_filterSets_filteredBids_details;
  public $bidders_filterSets_impressionMetrics;
  public $bidders_filterSets_losingBids;
  public $bidders_filterSets_nonBillableWinningBids;
  
  /**
   * Constructs the internal representation of the AdExchangeBuyerII service.
   *
   * @param Google_Client $client
   */
  public function __construct(Google_Client $client)
  {
    parent::__construct($client);
    $this->rootUrl = 'https://adexchangebuyer.googleapis.com/';
    $this->servicePath = '';
    $this->version = 'v2beta1';
    $this->serviceName = 'adexchangebuyer2';

    $this->accounts_clients = new Google_Service_AdExchangeBuyerII_Resource_AccountsClients(
        $this,
        $this->serviceName,
        'clients',
        array(
          'methods' => array(
            'create' => array(
              'path' => 'v2beta1/accounts/{accountId}/clients',
              'httpMethod' => 'POST',
              'parameters' => array(
                'accountId' => array(
                  'location' => 'path',
                  'type' => 'string',
                  'required' => true,
                ),
              ),
            ),'get' => array(
              'path' => 'v2beta1/accounts/{accountId}/clients/{clientAccountId}',
              'httpMethod' => 'GET',
              'parameters' => array(
                'accountId' => array(
                  'location' => 'path',
                  'type' => 'string',
                  'required' => true,
                ),
                'clientAccountId' => array(
                  'location' => 'path',
                  'type' => 'string',
                  'required' => true,
                ),
              ),
            ),'list' => array(
              'path' => 'v2beta1/accounts/{accountId}/clients',
              'httpMethod' => 'GET',
              'parameters' => array(
                'accountId' => array(
                  'location' => 'path',
                  'type' => 'string',
                  'required' => true,
                ),
                'pageToken' => array(
                  'location' => 'query',
                  'type' => 'string',
                ),
                'partnerClientId' => array(
                  'location' => 'query',
                  'type' => 'string',
                ),
                'pageSize' => array(
                  'location' => 'query',
                  'type' => 'integer',
                ),
              ),
            ),'update' => array(
              'path' => 'v2beta1/accounts/{accountId}/clients/{clientAccountId}',
              'httpMethod' => 'PUT',
              'parameters' => array(
                'accountId' => array(
                  'location' => 'path',
                  'type' => 'string',
                  'required' => true,
                ),
                'clientAccountId' => array(
                  'location' => 'path',
                  'type' => 'string',
                  'required' => true,
                ),
              ),
            ),
          )
        )
    );
    $this->accounts_clients_invitations = new Google_Service_AdExchangeBuyerII_Resource_AccountsClientsInvitations(
        $this,
        $this->serviceName,
        'invitations',
        array(
          'methods' => array(
            'create' => array(
              'path' => 'v2beta1/accounts/{accountId}/clients/{clientAccountId}/invitations',
              'httpMethod' => 'POST',
              'parameters' => array(
                'accountId' => array(
                  'location' => 'path',
                  'type' => 'string',
                  'required' => true,
                ),
                'clientAccountId' => array(
                  'location' => 'path',
                  'type' => 'string',
                  'required' => true,
                ),
              ),
            ),'get' => array(
              'path' => 'v2beta1/accounts/{accountId}/clients/{clientAccountId}/invitations/{invitationId}',
              'httpMethod' => 'GET',
              'parameters' => array(
                'accountId' => array(
                  'location' => 'path',
                  'type' => 'string',
                  'required' => true,
                ),
                'clientAccountId' => array(
                  'location' => 'path',
                  'type' => 'string',
                  'required' => true,
                ),
                'invitationId' => array(
                  'location' => 'path',
                  'type' => 'string',
                  'required' => true,
                ),
              ),
            ),'list' => array(
              'path' => 'v2beta1/accounts/{accountId}/clients/{clientAccountId}/invitations',
              'httpMethod' => 'GET',
              'parameters' => array(
                'accountId' => array(
                  'location' => 'path',
                  'type' => 'string',
                  'required' => true,
                ),
                'clientAccountId' => array(
                  'location' => 'path',
                  'type' => 'string',
                  'required' => true,
                ),
                'pageToken' => array(
                  'location' => 'query',
                  'type' => 'string',
                ),
                'pageSize' => array(
                  'location' => 'query',
                  'type' => 'integer',
                ),
              ),
            ),
          )
        )
    );
    $this->accounts_clients_users = new Google_Service_AdExchangeBuyerII_Resource_AccountsClientsUsers(
        $this,
        $this->serviceName,
        'users',
        array(
          'methods' => array(
            'get' => array(
              'path' => 'v2beta1/accounts/{accountId}/clients/{clientAccountId}/users/{userId}',
              'httpMethod' => 'GET',
              'parameters' => array(
                'accountId' => array(
                  'location' => 'path',
                  'type' => 'string',
                  'required' => true,
                ),
                'clientAccountId' => array(
                  'location' => 'path',
                  'type' => 'string',
                  'required' => true,
                ),
                'userId' => array(
                  'location' => 'path',
                  'type' => 'string',
                  'required' => true,
                ),
              ),
            ),'list' => array(
              'path' => 'v2beta1/accounts/{accountId}/clients/{clientAccountId}/users',
              'httpMethod' => 'GET',
              'parameters' => array(
                'accountId' => array(
                  'location' => 'path',
                  'type' => 'string',
                  'required' => true,
                ),
                'clientAccountId' => array(
                  'location' => 'path',
                  'type' => 'string',
                  'required' => true,
                ),
                'pageToken' => array(
                  'location' => 'query',
                  'type' => 'string',
                ),
                'pageSize' => array(
                  'location' => 'query',
                  'type' => 'integer',
                ),
              ),
            ),'update' => array(
              'path' => 'v2beta1/accounts/{accountId}/clients/{clientAccountId}/users/{userId}',
              'httpMethod' => 'PUT',
              'parameters' => array(
                'accountId' => array(
                  'location' => 'path',
                  'type' => 'string',
                  'required' => true,
                ),
                'clientAccountId' => array(
                  'location' => 'path',
                  'type' => 'string',
                  'required' => true,
                ),
                'userId' => array(
                  'location' => 'path',
                  'type' => 'string',
                  'required' => true,
                ),
              ),
            ),
          )
        )
    );
    $this->accounts_creatives = new Google_Service_AdExchangeBuyerII_Resource_AccountsCreatives(
        $this,
        $this->serviceName,
        'creatives',
        array(
          'methods' => array(
            'create' => array(
              'path' => 'v2beta1/accounts/{accountId}/creatives',
              'httpMethod' => 'POST',
              'parameters' => array(
                'accountId' => array(
                  'location' => 'path',
                  'type' => 'string',
                  'required' => true,
                ),
                'duplicateIdMode' => array(
                  'location' => 'query',
                  'type' => 'string',
                ),
              ),
            ),'get' => array(
              'path' => 'v2beta1/accounts/{accountId}/creatives/{creativeId}',
              'httpMethod' => 'GET',
              'parameters' => array(
                'accountId' => array(
                  'location' => 'path',
                  'type' => 'string',
                  'required' => true,
                ),
                'creativeId' => array(
                  'location' => 'path',
                  'type' => 'string',
                  'required' => true,
                ),
              ),
            ),'list' => array(
              'path' => 'v2beta1/accounts/{accountId}/creatives',
              'httpMethod' => 'GET',
              'parameters' => array(
                'accountId' => array(
                  'location' => 'path',
                  'type' => 'string',
                  'required' => true,
                ),
                'pageToken' => array(
                  'location' => 'query',
                  'type' => 'string',
                ),
                'pageSize' => array(
                  'location' => 'query',
                  'type' => 'integer',
                ),
                'query' => array(
                  'location' => 'query',
                  'type' => 'string',
                ),
              ),
            ),'stopWatching' => array(
              'path' => 'v2beta1/accounts/{accountId}/creatives/{creativeId}:stopWatching',
              'httpMethod' => 'POST',
              'parameters' => array(
                'accountId' => array(
                  'location' => 'path',
                  'type' => 'string',
                  'required' => true,
                ),
                'creativeId' => array(
                  'location' => 'path',
                  'type' => 'string',
                  'required' => true,
                ),
              ),
            ),'update' => array(
              'path' => 'v2beta1/accounts/{accountId}/creatives/{creativeId}',
              'httpMethod' => 'PUT',
              'parameters' => array(
                'accountId' => array(
                  'location' => 'path',
                  'type' => 'string',
                  'required' => true,
                ),
                'creativeId' => array(
                  'location' => 'path',
                  'type' => 'string',
                  'required' => true,
                ),
              ),
            ),'watch' => array(
              'path' => 'v2beta1/accounts/{accountId}/creatives/{creativeId}:watch',
              'httpMethod' => 'POST',
              'parameters' => array(
                'accountId' => array(
                  'location' => 'path',
                  'type' => 'string',
                  'required' => true,
                ),
                'creativeId' => array(
                  'location' => 'path',
                  'type' => 'string',
                  'required' => true,
                ),
              ),
            ),
          )
        )
    );
    $this->accounts_creatives_dealAssociations = new Google_Service_AdExchangeBuyerII_Resource_AccountsCreativesDealAssociations(
        $this,
        $this->serviceName,
        'dealAssociations',
        array(
          'methods' => array(
            'add' => array(
              'path' => 'v2beta1/accounts/{accountId}/creatives/{creativeId}/dealAssociations:add',
              'httpMethod' => 'POST',
              'parameters' => array(
                'accountId' => array(
                  'location' => 'path',
                  'type' => 'string',
                  'required' => true,
                ),
                'creativeId' => array(
                  'location' => 'path',
                  'type' => 'string',
                  'required' => true,
                ),
              ),
            ),'list' => array(
              'path' => 'v2beta1/accounts/{accountId}/creatives/{creativeId}/dealAssociations',
              'httpMethod' => 'GET',
              'parameters' => array(
                'accountId' => array(
                  'location' => 'path',
                  'type' => 'string',
                  'required' => true,
                ),
                'creativeId' => array(
                  'location' => 'path',
                  'type' => 'string',
                  'required' => true,
                ),
                'pageToken' => array(
                  'location' => 'query',
                  'type' => 'string',
                ),
                'pageSize' => array(
                  'location' => 'query',
                  'type' => 'integer',
                ),
                'query' => array(
                  'location' => 'query',
                  'type' => 'string',
                ),
              ),
            ),'remove' => array(
              'path' => 'v2beta1/accounts/{accountId}/creatives/{creativeId}/dealAssociations:remove',
              'httpMethod' => 'POST',
              'parameters' => array(
                'accountId' => array(
                  'location' => 'path',
                  'type' => 'string',
                  'required' => true,
                ),
                'creativeId' => array(
                  'location' => 'path',
                  'type' => 'string',
                  'required' => true,
                ),
              ),
            ),
          )
        )
    );
    $this->bidders_accounts_filterSets = new Google_Service_AdExchangeBuyerII_Resource_BiddersAccountsFilterSets(
        $this,
        $this->serviceName,
        'filterSets',
        array(
          'methods' => array(
            'create' => array(
              'path' => 'v2beta1/{+ownerName}/filterSets',
              'httpMethod' => 'POST',
              'parameters' => array(
                'ownerName' => array(
                  'location' => 'path',
                  'type' => 'string',
                  'required' => true,
                ),
                'isTransient' => array(
                  'location' => 'query',
                  'type' => 'boolean',
                ),
              ),
            ),'delete' => array(
              'path' => 'v2beta1/{+name}',
              'httpMethod' => 'DELETE',
              'parameters' => array(
                'name' => array(
                  'location' => 'path',
                  'type' => 'string',
                  'required' => true,
                ),
              ),
            ),'get' => array(
              'path' => 'v2beta1/{+name}',
              'httpMethod' => 'GET',
              'parameters' => array(
                'name' => array(
                  'location' => 'path',
                  'type' => 'string',
                  'required' => true,
                ),
              ),
            ),'list' => array(
              'path' => 'v2beta1/{+ownerName}/filterSets',
              'httpMethod' => 'GET',
              'parameters' => array(
                'ownerName' => array(
                  'location' => 'path',
                  'type' => 'string',
                  'required' => true,
                ),
                'pageToken' => array(
                  'location' => 'query',
                  'type' => 'string',
                ),
                'pageSize' => array(
                  'location' => 'query',
                  'type' => 'integer',
                ),
              ),
            ),
          )
        )
    );
    $this->bidders_accounts_filterSets_bidMetrics = new Google_Service_AdExchangeBuyerII_Resource_BiddersAccountsFilterSetsBidMetrics(
        $this,
        $this->serviceName,
        'bidMetrics',
        array(
          'methods' => array(
            'list' => array(
              'path' => 'v2beta1/{+filterSetName}/bidMetrics',
              'httpMethod' => 'GET',
              'parameters' => array(
                'filterSetName' => array(
                  'location' => 'path',
                  'type' => 'string',
                  'required' => true,
                ),
                'pageSize' => array(
                  'location' => 'query',
                  'type' => 'integer',
                ),
                'pageToken' => array(
                  'location' => 'query',
                  'type' => 'string',
                ),
              ),
            ),
          )
        )
    );
    $this->bidders_accounts_filterSets_bidResponseErrors = new Google_Service_AdExchangeBuyerII_Resource_BiddersAccountsFilterSetsBidResponseErrors(
        $this,
        $this->serviceName,
        'bidResponseErrors',
        array(
          'methods' => array(
            'list' => array(
              'path' => 'v2beta1/{+filterSetName}/bidResponseErrors',
              'httpMethod' => 'GET',
              'parameters' => array(
                'filterSetName' => array(
                  'location' => 'path',
                  'type' => 'string',
                  'required' => true,
                ),
                'pageToken' => array(
                  'location' => 'query',
                  'type' => 'string',
                ),
                'pageSize' => array(
                  'location' => 'query',
                  'type' => 'integer',
                ),
              ),
            ),
          )
        )
    );
    $this->bidders_accounts_filterSets_bidResponsesWithoutBids = new Google_Service_AdExchangeBuyerII_Resource_BiddersAccountsFilterSetsBidResponsesWithoutBids(
        $this,
        $this->serviceName,
        'bidResponsesWithoutBids',
        array(
          'methods' => array(
            'list' => array(
              'path' => 'v2beta1/{+filterSetName}/bidResponsesWithoutBids',
              'httpMethod' => 'GET',
              'parameters' => array(
                'filterSetName' => array(
                  'location' => 'path',
                  'type' => 'string',
                  'required' => true,
                ),
                'pageToken' => array(
                  'location' => 'query',
                  'type' => 'string',
                ),
                'pageSize' => array(
                  'location' => 'query',
                  'type' => 'integer',
                ),
              ),
            ),
          )
        )
    );
    $this->bidders_accounts_filterSets_filteredBidRequests = new Google_Service_AdExchangeBuyerII_Resource_BiddersAccountsFilterSetsFilteredBidRequests(
        $this,
        $this->serviceName,
        'filteredBidRequests',
        array(
          'methods' => array(
            'list' => array(
              'path' => 'v2beta1/{+filterSetName}/filteredBidRequests',
              'httpMethod' => 'GET',
              'parameters' => array(
                'filterSetName' => array(
                  'location' => 'path',
                  'type' => 'string',
                  'required' => true,
                ),
                'pageToken' => array(
                  'location' => 'query',
                  'type' => 'string',
                ),
                'pageSize' => array(
                  'location' => 'query',
                  'type' => 'integer',
                ),
              ),
            ),
          )
        )
    );
    $this->bidders_accounts_filterSets_filteredBids = new Google_Service_AdExchangeBuyerII_Resource_BiddersAccountsFilterSetsFilteredBids(
        $this,
        $this->serviceName,
        'filteredBids',
        array(
          'methods' => array(
            'list' => array(
              'path' => 'v2beta1/{+filterSetName}/filteredBids',
              'httpMethod' => 'GET',
              'parameters' => array(
                'filterSetName' => array(
                  'location' => 'path',
                  'type' => 'string',
                  'required' => true,
                ),
                'pageToken' => array(
                  'location' => 'query',
                  'type' => 'string',
                ),
                'pageSize' => array(
                  'location' => 'query',
                  'type' => 'integer',
                ),
              ),
            ),
          )
        )
    );
    $this->bidders_accounts_filterSets_filteredBids_creatives = new Google_Service_AdExchangeBuyerII_Resource_BiddersAccountsFilterSetsFilteredBidsCreatives(
        $this,
        $this->serviceName,
        'creatives',
        array(
          'methods' => array(
            'list' => array(
              'path' => 'v2beta1/{+filterSetName}/filteredBids/{creativeStatusId}/creatives',
              'httpMethod' => 'GET',
              'parameters' => array(
                'filterSetName' => array(
                  'location' => 'path',
                  'type' => 'string',
                  'required' => true,
                ),
                'creativeStatusId' => array(
                  'location' => 'path',
                  'type' => 'integer',
                  'required' => true,
                ),
                'pageToken' => array(
                  'location' => 'query',
                  'type' => 'string',
                ),
                'pageSize' => array(
                  'location' => 'query',
                  'type' => 'integer',
                ),
              ),
            ),
          )
        )
    );
    $this->bidders_accounts_filterSets_filteredBids_details = new Google_Service_AdExchangeBuyerII_Resource_BiddersAccountsFilterSetsFilteredBidsDetails(
        $this,
        $this->serviceName,
        'details',
        array(
          'methods' => array(
            'list' => array(
              'path' => 'v2beta1/{+filterSetName}/filteredBids/{creativeStatusId}/details',
              'httpMethod' => 'GET',
              'parameters' => array(
                'filterSetName' => array(
                  'location' => 'path',
                  'type' => 'string',
                  'required' => true,
                ),
                'creativeStatusId' => array(
                  'location' => 'path',
                  'type' => 'integer',
                  'required' => true,
                ),
                'pageToken' => array(
                  'location' => 'query',
                  'type' => 'string',
                ),
                'pageSize' => array(
                  'location' => 'query',
                  'type' => 'integer',
                ),
              ),
            ),
          )
        )
    );
    $this->bidders_accounts_filterSets_impressionMetrics = new Google_Service_AdExchangeBuyerII_Resource_BiddersAccountsFilterSetsImpressionMetrics(
        $this,
        $this->serviceName,
        'impressionMetrics',
        array(
          'methods' => array(
            'list' => array(
              'path' => 'v2beta1/{+filterSetName}/impressionMetrics',
              'httpMethod' => 'GET',
              'parameters' => array(
                'filterSetName' => array(
                  'location' => 'path',
                  'type' => 'string',
                  'required' => true,
                ),
                'pageSize' => array(
                  'location' => 'query',
                  'type' => 'integer',
                ),
                'pageToken' => array(
                  'location' => 'query',
                  'type' => 'string',
                ),
              ),
            ),
          )
        )
    );
    $this->bidders_accounts_filterSets_losingBids = new Google_Service_AdExchangeBuyerII_Resource_BiddersAccountsFilterSetsLosingBids(
        $this,
        $this->serviceName,
        'losingBids',
        array(
          'methods' => array(
            'list' => array(
              'path' => 'v2beta1/{+filterSetName}/losingBids',
              'httpMethod' => 'GET',
              'parameters' => array(
                'filterSetName' => array(
                  'location' => 'path',
                  'type' => 'string',
                  'required' => true,
                ),
                'pageToken' => array(
                  'location' => 'query',
                  'type' => 'string',
                ),
                'pageSize' => array(
                  'location' => 'query',
                  'type' => 'integer',
                ),
              ),
            ),
          )
        )
    );
    $this->bidders_accounts_filterSets_nonBillableWinningBids = new Google_Service_AdExchangeBuyerII_Resource_BiddersAccountsFilterSetsNonBillableWinningBids(
        $this,
        $this->serviceName,
        'nonBillableWinningBids',
        array(
          'methods' => array(
            'list' => array(
              'path' => 'v2beta1/{+filterSetName}/nonBillableWinningBids',
              'httpMethod' => 'GET',
              'parameters' => array(
                'filterSetName' => array(
                  'location' => 'path',
                  'type' => 'string',
                  'required' => true,
                ),
                'pageToken' => array(
                  'location' => 'query',
                  'type' => 'string',
                ),
                'pageSize' => array(
                  'location' => 'query',
                  'type' => 'integer',
                ),
              ),
            ),
          )
        )
    );
    $this->bidders_filterSets = new Google_Service_AdExchangeBuyerII_Resource_BiddersFilterSets(
        $this,
        $this->serviceName,
        'filterSets',
        array(
          'methods' => array(
            'create' => array(
              'path' => 'v2beta1/{+ownerName}/filterSets',
              'httpMethod' => 'POST',
              'parameters' => array(
                'ownerName' => array(
                  'location' => 'path',
                  'type' => 'string',
                  'required' => true,
                ),
                'isTransient' => array(
                  'location' => 'query',
                  'type' => 'boolean',
                ),
              ),
            ),'delete' => array(
              'path' => 'v2beta1/{+name}',
              'httpMethod' => 'DELETE',
              'parameters' => array(
                'name' => array(
                  'location' => 'path',
                  'type' => 'string',
                  'required' => true,
                ),
              ),
            ),'get' => array(
              'path' => 'v2beta1/{+name}',
              'httpMethod' => 'GET',
              'parameters' => array(
                'name' => array(
                  'location' => 'path',
                  'type' => 'string',
                  'required' => true,
                ),
              ),
            ),'list' => array(
              'path' => 'v2beta1/{+ownerName}/filterSets',
              'httpMethod' => 'GET',
              'parameters' => array(
                'ownerName' => array(
                  'location' => 'path',
                  'type' => 'string',
                  'required' => true,
                ),
                'pageToken' => array(
                  'location' => 'query',
                  'type' => 'string',
                ),
                'pageSize' => array(
                  'location' => 'query',
                  'type' => 'integer',
                ),
              ),
            ),
          )
        )
    );
    $this->bidders_filterSets_bidMetrics = new Google_Service_AdExchangeBuyerII_Resource_BiddersFilterSetsBidMetrics(
        $this,
        $this->serviceName,
        'bidMetrics',
        array(
          'methods' => array(
            'list' => array(
              'path' => 'v2beta1/{+filterSetName}/bidMetrics',
              'httpMethod' => 'GET',
              'parameters' => array(
                'filterSetName' => array(
                  'location' => 'path',
                  'type' => 'string',
                  'required' => true,
                ),
                'pageToken' => array(
                  'location' => 'query',
                  'type' => 'string',
                ),
                'pageSize' => array(
                  'location' => 'query',
                  'type' => 'integer',
                ),
              ),
            ),
          )
        )
    );
    $this->bidders_filterSets_bidResponseErrors = new Google_Service_AdExchangeBuyerII_Resource_BiddersFilterSetsBidResponseErrors(
        $this,
        $this->serviceName,
        'bidResponseErrors',
        array(
          'methods' => array(
            'list' => array(
              'path' => 'v2beta1/{+filterSetName}/bidResponseErrors',
              'httpMethod' => 'GET',
              'parameters' => array(
                'filterSetName' => array(
                  'location' => 'path',
                  'type' => 'string',
                  'required' => true,
                ),
                'pageToken' => array(
                  'location' => 'query',
                  'type' => 'string',
                ),
                'pageSize' => array(
                  'location' => 'query',
                  'type' => 'integer',
                ),
              ),
            ),
          )
        )
    );
    $this->bidders_filterSets_bidResponsesWithoutBids = new Google_Service_AdExchangeBuyerII_Resource_BiddersFilterSetsBidResponsesWithoutBids(
        $this,
        $this->serviceName,
        'bidResponsesWithoutBids',
        array(
          'methods' => array(
            'list' => array(
              'path' => 'v2beta1/{+filterSetName}/bidResponsesWithoutBids',
              'httpMethod' => 'GET',
              'parameters' => array(
                'filterSetName' => array(
                  'location' => 'path',
                  'type' => 'string',
                  'required' => true,
                ),
                'pageToken' => array(
                  'location' => 'query',
                  'type' => 'string',
                ),
                'pageSize' => array(
                  'location' => 'query',
                  'type' => 'integer',
                ),
              ),
            ),
          )
        )
    );
    $this->bidders_filterSets_filteredBidRequests = new Google_Service_AdExchangeBuyerII_Resource_BiddersFilterSetsFilteredBidRequests(
        $this,
        $this->serviceName,
        'filteredBidRequests',
        array(
          'methods' => array(
            'list' => array(
              'path' => 'v2beta1/{+filterSetName}/filteredBidRequests',
              'httpMethod' => 'GET',
              'parameters' => array(
                'filterSetName' => array(
                  'location' => 'path',
                  'type' => 'string',
                  'required' => true,
                ),
                'pageToken' => array(
                  'location' => 'query',
                  'type' => 'string',
                ),
                'pageSize' => array(
                  'location' => 'query',
                  'type' => 'integer',
                ),
              ),
            ),
          )
        )
    );
    $this->bidders_filterSets_filteredBids = new Google_Service_AdExchangeBuyerII_Resource_BiddersFilterSetsFilteredBids(
        $this,
        $this->serviceName,
        'filteredBids',
        array(
          'methods' => array(
            'list' => array(
              'path' => 'v2beta1/{+filterSetName}/filteredBids',
              'httpMethod' => 'GET',
              'parameters' => array(
                'filterSetName' => array(
                  'location' => 'path',
                  'type' => 'string',
                  'required' => true,
                ),
                'pageToken' => array(
                  'location' => 'query',
                  'type' => 'string',
                ),
                'pageSize' => array(
                  'location' => 'query',
                  'type' => 'integer',
                ),
              ),
            ),
          )
        )
    );
    $this->bidders_filterSets_filteredBids_creatives = new Google_Service_AdExchangeBuyerII_Resource_BiddersFilterSetsFilteredBidsCreatives(
        $this,
        $this->serviceName,
        'creatives',
        array(
          'methods' => array(
            'list' => array(
              'path' => 'v2beta1/{+filterSetName}/filteredBids/{creativeStatusId}/creatives',
              'httpMethod' => 'GET',
              'parameters' => array(
                'filterSetName' => array(
                  'location' => 'path',
                  'type' => 'string',
                  'required' => true,
                ),
                'creativeStatusId' => array(
                  'location' => 'path',
                  'type' => 'integer',
                  'required' => true,
                ),
                'pageToken' => array(
                  'location' => 'query',
                  'type' => 'string',
                ),
                'pageSize' => array(
                  'location' => 'query',
                  'type' => 'integer',
                ),
              ),
            ),
          )
        )
    );
    $this->bidders_filterSets_filteredBids_details = new Google_Service_AdExchangeBuyerII_Resource_BiddersFilterSetsFilteredBidsDetails(
        $this,
        $this->serviceName,
        'details',
        array(
          'methods' => array(
            'list' => array(
              'path' => 'v2beta1/{+filterSetName}/filteredBids/{creativeStatusId}/details',
              'httpMethod' => 'GET',
              'parameters' => array(
                'filterSetName' => array(
                  'location' => 'path',
                  'type' => 'string',
                  'required' => true,
                ),
                'creativeStatusId' => array(
                  'location' => 'path',
                  'type' => 'integer',
                  'required' => true,
                ),
                'pageToken' => array(
                  'location' => 'query',
                  'type' => 'string',
                ),
                'pageSize' => array(
                  'location' => 'query',
                  'type' => 'integer',
                ),
              ),
            ),
          )
        )
    );
    $this->bidders_filterSets_impressionMetrics = new Google_Service_AdExchangeBuyerII_Resource_BiddersFilterSetsImpressionMetrics(
        $this,
        $this->serviceName,
        'impressionMetrics',
        array(
          'methods' => array(
            'list' => array(
              'path' => 'v2beta1/{+filterSetName}/impressionMetrics',
              'httpMethod' => 'GET',
              'parameters' => array(
                'filterSetName' => array(
                  'location' => 'path',
                  'type' => 'string',
                  'required' => true,
                ),
                'pageToken' => array(
                  'location' => 'query',
                  'type' => 'string',
                ),
                'pageSize' => array(
                  'location' => 'query',
                  'type' => 'integer',
                ),
              ),
            ),
          )
        )
    );
    $this->bidders_filterSets_losingBids = new Google_Service_AdExchangeBuyerII_Resource_BiddersFilterSetsLosingBids(
        $this,
        $this->serviceName,
        'losingBids',
        array(
          'methods' => array(
            'list' => array(
              'path' => 'v2beta1/{+filterSetName}/losingBids',
              'httpMethod' => 'GET',
              'parameters' => array(
                'filterSetName' => array(
                  'location' => 'path',
                  'type' => 'string',
                  'required' => true,
                ),
                'pageToken' => array(
                  'location' => 'query',
                  'type' => 'string',
                ),
                'pageSize' => array(
                  'location' => 'query',
                  'type' => 'integer',
                ),
              ),
            ),
          )
        )
    );
    $this->bidders_filterSets_nonBillableWinningBids = new Google_Service_AdExchangeBuyerII_Resource_BiddersFilterSetsNonBillableWinningBids(
        $this,
        $this->serviceName,
        'nonBillableWinningBids',
        array(
          'methods' => array(
            'list' => array(
              'path' => 'v2beta1/{+filterSetName}/nonBillableWinningBids',
              'httpMethod' => 'GET',
              'parameters' => array(
                'filterSetName' => array(
                  'location' => 'path',
                  'type' => 'string',
                  'required' => true,
                ),
                'pageToken' => array(
                  'location' => 'query',
                  'type' => 'string',
                ),
                'pageSize' => array(
                  'location' => 'query',
                  'type' => 'integer',
                ),
              ),
            ),
          )
        )
    );
  }
}
