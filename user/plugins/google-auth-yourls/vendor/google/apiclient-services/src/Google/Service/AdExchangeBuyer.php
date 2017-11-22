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
 * Service definition for AdExchangeBuyer (v1.4).
 *
 * <p>
 * Accesses your bidding-account information, submits creatives for validation,
 * finds available direct deals, and retrieves performance reports.</p>
 *
 * <p>
 * For more information about this service, see the API
 * <a href="https://developers.google.com/ad-exchange/buyer-rest" target="_blank">Documentation</a>
 * </p>
 *
 * @author Google, Inc.
 */
class Google_Service_AdExchangeBuyer extends Google_Service
{
  /** Manage your Ad Exchange buyer account configuration. */
  const ADEXCHANGE_BUYER =
      "https://www.googleapis.com/auth/adexchange.buyer";

  public $accounts;
  public $billingInfo;
  public $budget;
  public $creatives;
  public $marketplacedeals;
  public $marketplacenotes;
  public $marketplaceprivateauction;
  public $performanceReport;
  public $pretargetingConfig;
  public $products;
  public $proposals;
  public $pubprofiles;
  
  /**
   * Constructs the internal representation of the AdExchangeBuyer service.
   *
   * @param Google_Client $client
   */
  public function __construct(Google_Client $client)
  {
    parent::__construct($client);
    $this->rootUrl = 'https://www.googleapis.com/';
    $this->servicePath = 'adexchangebuyer/v1.4/';
    $this->version = 'v1.4';
    $this->serviceName = 'adexchangebuyer';

    $this->accounts = new Google_Service_AdExchangeBuyer_Resource_Accounts(
        $this,
        $this->serviceName,
        'accounts',
        array(
          'methods' => array(
            'get' => array(
              'path' => 'accounts/{id}',
              'httpMethod' => 'GET',
              'parameters' => array(
                'id' => array(
                  'location' => 'path',
                  'type' => 'integer',
                  'required' => true,
                ),
              ),
            ),'list' => array(
              'path' => 'accounts',
              'httpMethod' => 'GET',
              'parameters' => array(),
            ),'patch' => array(
              'path' => 'accounts/{id}',
              'httpMethod' => 'PATCH',
              'parameters' => array(
                'id' => array(
                  'location' => 'path',
                  'type' => 'integer',
                  'required' => true,
                ),
                'confirmUnsafeAccountChange' => array(
                  'location' => 'query',
                  'type' => 'boolean',
                ),
              ),
            ),'update' => array(
              'path' => 'accounts/{id}',
              'httpMethod' => 'PUT',
              'parameters' => array(
                'id' => array(
                  'location' => 'path',
                  'type' => 'integer',
                  'required' => true,
                ),
                'confirmUnsafeAccountChange' => array(
                  'location' => 'query',
                  'type' => 'boolean',
                ),
              ),
            ),
          )
        )
    );
    $this->billingInfo = new Google_Service_AdExchangeBuyer_Resource_BillingInfo(
        $this,
        $this->serviceName,
        'billingInfo',
        array(
          'methods' => array(
            'get' => array(
              'path' => 'billinginfo/{accountId}',
              'httpMethod' => 'GET',
              'parameters' => array(
                'accountId' => array(
                  'location' => 'path',
                  'type' => 'integer',
                  'required' => true,
                ),
              ),
            ),'list' => array(
              'path' => 'billinginfo',
              'httpMethod' => 'GET',
              'parameters' => array(),
            ),
          )
        )
    );
    $this->budget = new Google_Service_AdExchangeBuyer_Resource_Budget(
        $this,
        $this->serviceName,
        'budget',
        array(
          'methods' => array(
            'get' => array(
              'path' => 'billinginfo/{accountId}/{billingId}',
              'httpMethod' => 'GET',
              'parameters' => array(
                'accountId' => array(
                  'location' => 'path',
                  'type' => 'string',
                  'required' => true,
                ),
                'billingId' => array(
                  'location' => 'path',
                  'type' => 'string',
                  'required' => true,
                ),
              ),
            ),'patch' => array(
              'path' => 'billinginfo/{accountId}/{billingId}',
              'httpMethod' => 'PATCH',
              'parameters' => array(
                'accountId' => array(
                  'location' => 'path',
                  'type' => 'string',
                  'required' => true,
                ),
                'billingId' => array(
                  'location' => 'path',
                  'type' => 'string',
                  'required' => true,
                ),
              ),
            ),'update' => array(
              'path' => 'billinginfo/{accountId}/{billingId}',
              'httpMethod' => 'PUT',
              'parameters' => array(
                'accountId' => array(
                  'location' => 'path',
                  'type' => 'string',
                  'required' => true,
                ),
                'billingId' => array(
                  'location' => 'path',
                  'type' => 'string',
                  'required' => true,
                ),
              ),
            ),
          )
        )
    );
    $this->creatives = new Google_Service_AdExchangeBuyer_Resource_Creatives(
        $this,
        $this->serviceName,
        'creatives',
        array(
          'methods' => array(
            'addDeal' => array(
              'path' => 'creatives/{accountId}/{buyerCreativeId}/addDeal/{dealId}',
              'httpMethod' => 'POST',
              'parameters' => array(
                'accountId' => array(
                  'location' => 'path',
                  'type' => 'integer',
                  'required' => true,
                ),
                'buyerCreativeId' => array(
                  'location' => 'path',
                  'type' => 'string',
                  'required' => true,
                ),
                'dealId' => array(
                  'location' => 'path',
                  'type' => 'string',
                  'required' => true,
                ),
              ),
            ),'get' => array(
              'path' => 'creatives/{accountId}/{buyerCreativeId}',
              'httpMethod' => 'GET',
              'parameters' => array(
                'accountId' => array(
                  'location' => 'path',
                  'type' => 'integer',
                  'required' => true,
                ),
                'buyerCreativeId' => array(
                  'location' => 'path',
                  'type' => 'string',
                  'required' => true,
                ),
              ),
            ),'insert' => array(
              'path' => 'creatives',
              'httpMethod' => 'POST',
              'parameters' => array(),
            ),'list' => array(
              'path' => 'creatives',
              'httpMethod' => 'GET',
              'parameters' => array(
                'accountId' => array(
                  'location' => 'query',
                  'type' => 'integer',
                  'repeated' => true,
                ),
                'buyerCreativeId' => array(
                  'location' => 'query',
                  'type' => 'string',
                  'repeated' => true,
                ),
                'dealsStatusFilter' => array(
                  'location' => 'query',
                  'type' => 'string',
                ),
                'maxResults' => array(
                  'location' => 'query',
                  'type' => 'integer',
                ),
                'openAuctionStatusFilter' => array(
                  'location' => 'query',
                  'type' => 'string',
                ),
                'pageToken' => array(
                  'location' => 'query',
                  'type' => 'string',
                ),
              ),
            ),'listDeals' => array(
              'path' => 'creatives/{accountId}/{buyerCreativeId}/listDeals',
              'httpMethod' => 'GET',
              'parameters' => array(
                'accountId' => array(
                  'location' => 'path',
                  'type' => 'integer',
                  'required' => true,
                ),
                'buyerCreativeId' => array(
                  'location' => 'path',
                  'type' => 'string',
                  'required' => true,
                ),
              ),
            ),'removeDeal' => array(
              'path' => 'creatives/{accountId}/{buyerCreativeId}/removeDeal/{dealId}',
              'httpMethod' => 'POST',
              'parameters' => array(
                'accountId' => array(
                  'location' => 'path',
                  'type' => 'integer',
                  'required' => true,
                ),
                'buyerCreativeId' => array(
                  'location' => 'path',
                  'type' => 'string',
                  'required' => true,
                ),
                'dealId' => array(
                  'location' => 'path',
                  'type' => 'string',
                  'required' => true,
                ),
              ),
            ),
          )
        )
    );
    $this->marketplacedeals = new Google_Service_AdExchangeBuyer_Resource_Marketplacedeals(
        $this,
        $this->serviceName,
        'marketplacedeals',
        array(
          'methods' => array(
            'delete' => array(
              'path' => 'proposals/{proposalId}/deals/delete',
              'httpMethod' => 'POST',
              'parameters' => array(
                'proposalId' => array(
                  'location' => 'path',
                  'type' => 'string',
                  'required' => true,
                ),
              ),
            ),'insert' => array(
              'path' => 'proposals/{proposalId}/deals/insert',
              'httpMethod' => 'POST',
              'parameters' => array(
                'proposalId' => array(
                  'location' => 'path',
                  'type' => 'string',
                  'required' => true,
                ),
              ),
            ),'list' => array(
              'path' => 'proposals/{proposalId}/deals',
              'httpMethod' => 'GET',
              'parameters' => array(
                'proposalId' => array(
                  'location' => 'path',
                  'type' => 'string',
                  'required' => true,
                ),
                'pqlQuery' => array(
                  'location' => 'query',
                  'type' => 'string',
                ),
              ),
            ),'update' => array(
              'path' => 'proposals/{proposalId}/deals/update',
              'httpMethod' => 'POST',
              'parameters' => array(
                'proposalId' => array(
                  'location' => 'path',
                  'type' => 'string',
                  'required' => true,
                ),
              ),
            ),
          )
        )
    );
    $this->marketplacenotes = new Google_Service_AdExchangeBuyer_Resource_Marketplacenotes(
        $this,
        $this->serviceName,
        'marketplacenotes',
        array(
          'methods' => array(
            'insert' => array(
              'path' => 'proposals/{proposalId}/notes/insert',
              'httpMethod' => 'POST',
              'parameters' => array(
                'proposalId' => array(
                  'location' => 'path',
                  'type' => 'string',
                  'required' => true,
                ),
              ),
            ),'list' => array(
              'path' => 'proposals/{proposalId}/notes',
              'httpMethod' => 'GET',
              'parameters' => array(
                'proposalId' => array(
                  'location' => 'path',
                  'type' => 'string',
                  'required' => true,
                ),
                'pqlQuery' => array(
                  'location' => 'query',
                  'type' => 'string',
                ),
              ),
            ),
          )
        )
    );
    $this->marketplaceprivateauction = new Google_Service_AdExchangeBuyer_Resource_Marketplaceprivateauction(
        $this,
        $this->serviceName,
        'marketplaceprivateauction',
        array(
          'methods' => array(
            'updateproposal' => array(
              'path' => 'privateauction/{privateAuctionId}/updateproposal',
              'httpMethod' => 'POST',
              'parameters' => array(
                'privateAuctionId' => array(
                  'location' => 'path',
                  'type' => 'string',
                  'required' => true,
                ),
              ),
            ),
          )
        )
    );
    $this->performanceReport = new Google_Service_AdExchangeBuyer_Resource_PerformanceReport(
        $this,
        $this->serviceName,
        'performanceReport',
        array(
          'methods' => array(
            'list' => array(
              'path' => 'performancereport',
              'httpMethod' => 'GET',
              'parameters' => array(
                'accountId' => array(
                  'location' => 'query',
                  'type' => 'string',
                  'required' => true,
                ),
                'endDateTime' => array(
                  'location' => 'query',
                  'type' => 'string',
                  'required' => true,
                ),
                'startDateTime' => array(
                  'location' => 'query',
                  'type' => 'string',
                  'required' => true,
                ),
                'maxResults' => array(
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
    $this->pretargetingConfig = new Google_Service_AdExchangeBuyer_Resource_PretargetingConfig(
        $this,
        $this->serviceName,
        'pretargetingConfig',
        array(
          'methods' => array(
            'delete' => array(
              'path' => 'pretargetingconfigs/{accountId}/{configId}',
              'httpMethod' => 'DELETE',
              'parameters' => array(
                'accountId' => array(
                  'location' => 'path',
                  'type' => 'string',
                  'required' => true,
                ),
                'configId' => array(
                  'location' => 'path',
                  'type' => 'string',
                  'required' => true,
                ),
              ),
            ),'get' => array(
              'path' => 'pretargetingconfigs/{accountId}/{configId}',
              'httpMethod' => 'GET',
              'parameters' => array(
                'accountId' => array(
                  'location' => 'path',
                  'type' => 'string',
                  'required' => true,
                ),
                'configId' => array(
                  'location' => 'path',
                  'type' => 'string',
                  'required' => true,
                ),
              ),
            ),'insert' => array(
              'path' => 'pretargetingconfigs/{accountId}',
              'httpMethod' => 'POST',
              'parameters' => array(
                'accountId' => array(
                  'location' => 'path',
                  'type' => 'string',
                  'required' => true,
                ),
              ),
            ),'list' => array(
              'path' => 'pretargetingconfigs/{accountId}',
              'httpMethod' => 'GET',
              'parameters' => array(
                'accountId' => array(
                  'location' => 'path',
                  'type' => 'string',
                  'required' => true,
                ),
              ),
            ),'patch' => array(
              'path' => 'pretargetingconfigs/{accountId}/{configId}',
              'httpMethod' => 'PATCH',
              'parameters' => array(
                'accountId' => array(
                  'location' => 'path',
                  'type' => 'string',
                  'required' => true,
                ),
                'configId' => array(
                  'location' => 'path',
                  'type' => 'string',
                  'required' => true,
                ),
              ),
            ),'update' => array(
              'path' => 'pretargetingconfigs/{accountId}/{configId}',
              'httpMethod' => 'PUT',
              'parameters' => array(
                'accountId' => array(
                  'location' => 'path',
                  'type' => 'string',
                  'required' => true,
                ),
                'configId' => array(
                  'location' => 'path',
                  'type' => 'string',
                  'required' => true,
                ),
              ),
            ),
          )
        )
    );
    $this->products = new Google_Service_AdExchangeBuyer_Resource_Products(
        $this,
        $this->serviceName,
        'products',
        array(
          'methods' => array(
            'get' => array(
              'path' => 'products/{productId}',
              'httpMethod' => 'GET',
              'parameters' => array(
                'productId' => array(
                  'location' => 'path',
                  'type' => 'string',
                  'required' => true,
                ),
              ),
            ),'search' => array(
              'path' => 'products/search',
              'httpMethod' => 'GET',
              'parameters' => array(
                'pqlQuery' => array(
                  'location' => 'query',
                  'type' => 'string',
                ),
              ),
            ),
          )
        )
    );
    $this->proposals = new Google_Service_AdExchangeBuyer_Resource_Proposals(
        $this,
        $this->serviceName,
        'proposals',
        array(
          'methods' => array(
            'get' => array(
              'path' => 'proposals/{proposalId}',
              'httpMethod' => 'GET',
              'parameters' => array(
                'proposalId' => array(
                  'location' => 'path',
                  'type' => 'string',
                  'required' => true,
                ),
              ),
            ),'insert' => array(
              'path' => 'proposals/insert',
              'httpMethod' => 'POST',
              'parameters' => array(),
            ),'patch' => array(
              'path' => 'proposals/{proposalId}/{revisionNumber}/{updateAction}',
              'httpMethod' => 'PATCH',
              'parameters' => array(
                'proposalId' => array(
                  'location' => 'path',
                  'type' => 'string',
                  'required' => true,
                ),
                'revisionNumber' => array(
                  'location' => 'path',
                  'type' => 'string',
                  'required' => true,
                ),
                'updateAction' => array(
                  'location' => 'path',
                  'type' => 'string',
                  'required' => true,
                ),
              ),
            ),'search' => array(
              'path' => 'proposals/search',
              'httpMethod' => 'GET',
              'parameters' => array(
                'pqlQuery' => array(
                  'location' => 'query',
                  'type' => 'string',
                ),
              ),
            ),'setupcomplete' => array(
              'path' => 'proposals/{proposalId}/setupcomplete',
              'httpMethod' => 'POST',
              'parameters' => array(
                'proposalId' => array(
                  'location' => 'path',
                  'type' => 'string',
                  'required' => true,
                ),
              ),
            ),'update' => array(
              'path' => 'proposals/{proposalId}/{revisionNumber}/{updateAction}',
              'httpMethod' => 'PUT',
              'parameters' => array(
                'proposalId' => array(
                  'location' => 'path',
                  'type' => 'string',
                  'required' => true,
                ),
                'revisionNumber' => array(
                  'location' => 'path',
                  'type' => 'string',
                  'required' => true,
                ),
                'updateAction' => array(
                  'location' => 'path',
                  'type' => 'string',
                  'required' => true,
                ),
              ),
            ),
          )
        )
    );
    $this->pubprofiles = new Google_Service_AdExchangeBuyer_Resource_Pubprofiles(
        $this,
        $this->serviceName,
        'pubprofiles',
        array(
          'methods' => array(
            'list' => array(
              'path' => 'publisher/{accountId}/profiles',
              'httpMethod' => 'GET',
              'parameters' => array(
                'accountId' => array(
                  'location' => 'path',
                  'type' => 'integer',
                  'required' => true,
                ),
              ),
            ),
          )
        )
    );
  }
}
