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
 * Service definition for Playmoviespartner (v1).
 *
 * <p>
 * Lets Google Play Movies Partners get the delivery status of their titles.</p>
 *
 * <p>
 * For more information about this service, see the API
 * <a href="https://developers.google.com/playmoviespartner/" target="_blank">Documentation</a>
 * </p>
 *
 * @author Google, Inc.
 */
class Google_Service_Playmoviespartner extends Google_Service
{
  /** View the digital assets you publish on Google Play Movies and TV. */
  const PLAYMOVIES_PARTNER_READONLY =
      "https://www.googleapis.com/auth/playmovies_partner.readonly";

  public $accounts_avails;
  public $accounts_experienceLocales;
  public $accounts_orders;
  public $accounts_storeInfos;
  public $accounts_storeInfos_country;
  
  /**
   * Constructs the internal representation of the Playmoviespartner service.
   *
   * @param Google_Client $client
   */
  public function __construct(Google_Client $client)
  {
    parent::__construct($client);
    $this->rootUrl = 'https://playmoviespartner.googleapis.com/';
    $this->servicePath = '';
    $this->version = 'v1';
    $this->serviceName = 'playmoviespartner';

    $this->accounts_avails = new Google_Service_Playmoviespartner_AccountsAvailsResource(
        $this,
        $this->serviceName,
        'avails',
        array(
          'methods' => array(
            'list' => array(
              'path' => 'v1/accounts/{accountId}/avails',
              'httpMethod' => 'GET',
              'parameters' => array(
                'accountId' => array(
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
                'pphNames' => array(
                  'location' => 'query',
                  'type' => 'string',
                  'repeated' => true,
                ),
                'studioNames' => array(
                  'location' => 'query',
                  'type' => 'string',
                  'repeated' => true,
                ),
                'title' => array(
                  'location' => 'query',
                  'type' => 'string',
                ),
                'territories' => array(
                  'location' => 'query',
                  'type' => 'string',
                  'repeated' => true,
                ),
                'altId' => array(
                  'location' => 'query',
                  'type' => 'string',
                ),
                'videoIds' => array(
                  'location' => 'query',
                  'type' => 'string',
                  'repeated' => true,
                ),
              ),
            ),
          )
        )
    );
    $this->accounts_experienceLocales = new Google_Service_Playmoviespartner_AccountsExperienceLocalesResource(
        $this,
        $this->serviceName,
        'experienceLocales',
        array(
          'methods' => array(
            'get' => array(
              'path' => 'v1/accounts/{accountId}/experienceLocales/{elId}',
              'httpMethod' => 'GET',
              'parameters' => array(
                'accountId' => array(
                  'location' => 'path',
                  'type' => 'string',
                  'required' => true,
                ),
                'elId' => array(
                  'location' => 'path',
                  'type' => 'string',
                  'required' => true,
                ),
              ),
            ),'list' => array(
              'path' => 'v1/accounts/{accountId}/experienceLocales',
              'httpMethod' => 'GET',
              'parameters' => array(
                'accountId' => array(
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
                'pphNames' => array(
                  'location' => 'query',
                  'type' => 'string',
                  'repeated' => true,
                ),
                'studioNames' => array(
                  'location' => 'query',
                  'type' => 'string',
                  'repeated' => true,
                ),
                'titleLevelEidr' => array(
                  'location' => 'query',
                  'type' => 'string',
                ),
                'editLevelEidr' => array(
                  'location' => 'query',
                  'type' => 'string',
                ),
                'status' => array(
                  'location' => 'query',
                  'type' => 'string',
                  'repeated' => true,
                ),
                'customId' => array(
                  'location' => 'query',
                  'type' => 'string',
                ),
                'altCutId' => array(
                  'location' => 'query',
                  'type' => 'string',
                ),
              ),
            ),
          )
        )
    );
    $this->accounts_orders = new Google_Service_Playmoviespartner_AccountsOrdersResource(
        $this,
        $this->serviceName,
        'orders',
        array(
          'methods' => array(
            'get' => array(
              'path' => 'v1/accounts/{accountId}/orders/{orderId}',
              'httpMethod' => 'GET',
              'parameters' => array(
                'accountId' => array(
                  'location' => 'path',
                  'type' => 'string',
                  'required' => true,
                ),
                'orderId' => array(
                  'location' => 'path',
                  'type' => 'string',
                  'required' => true,
                ),
              ),
            ),'list' => array(
              'path' => 'v1/accounts/{accountId}/orders',
              'httpMethod' => 'GET',
              'parameters' => array(
                'accountId' => array(
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
                'pphNames' => array(
                  'location' => 'query',
                  'type' => 'string',
                  'repeated' => true,
                ),
                'studioNames' => array(
                  'location' => 'query',
                  'type' => 'string',
                  'repeated' => true,
                ),
                'name' => array(
                  'location' => 'query',
                  'type' => 'string',
                ),
                'status' => array(
                  'location' => 'query',
                  'type' => 'string',
                  'repeated' => true,
                ),
                'customId' => array(
                  'location' => 'query',
                  'type' => 'string',
                ),
              ),
            ),
          )
        )
    );
    $this->accounts_storeInfos = new Google_Service_Playmoviespartner_AccountsStoreInfosResource(
        $this,
        $this->serviceName,
        'storeInfos',
        array(
          'methods' => array(
            'list' => array(
              'path' => 'v1/accounts/{accountId}/storeInfos',
              'httpMethod' => 'GET',
              'parameters' => array(
                'accountId' => array(
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
                'pphNames' => array(
                  'location' => 'query',
                  'type' => 'string',
                  'repeated' => true,
                ),
                'studioNames' => array(
                  'location' => 'query',
                  'type' => 'string',
                  'repeated' => true,
                ),
                'videoId' => array(
                  'location' => 'query',
                  'type' => 'string',
                ),
                'countries' => array(
                  'location' => 'query',
                  'type' => 'string',
                  'repeated' => true,
                ),
                'name' => array(
                  'location' => 'query',
                  'type' => 'string',
                ),
                'videoIds' => array(
                  'location' => 'query',
                  'type' => 'string',
                  'repeated' => true,
                ),
              ),
            ),
          )
        )
    );
    $this->accounts_storeInfos_country = new Google_Service_Playmoviespartner_AccountsStoreInfosCountryResource(
        $this,
        $this->serviceName,
        'country',
        array(
          'methods' => array(
            'get' => array(
              'path' => 'v1/accounts/{accountId}/storeInfos/{videoId}/country/{country}',
              'httpMethod' => 'GET',
              'parameters' => array(
                'accountId' => array(
                  'location' => 'path',
                  'type' => 'string',
                  'required' => true,
                ),
                'videoId' => array(
                  'location' => 'path',
                  'type' => 'string',
                  'required' => true,
                ),
                'country' => array(
                  'location' => 'path',
                  'type' => 'string',
                  'required' => true,
                ),
              ),
            ),
          )
        )
    );
  }
}
