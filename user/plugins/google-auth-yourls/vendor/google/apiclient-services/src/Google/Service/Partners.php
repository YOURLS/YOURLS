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
 * Service definition for Partners (v2).
 *
 * <p>
 * Searches certified companies and creates contact leads with them, and also
 * audits the usage of clients.</p>
 *
 * <p>
 * For more information about this service, see the API
 * <a href="https://developers.google.com/partners/" target="_blank">Documentation</a>
 * </p>
 *
 * @author Google, Inc.
 */
class Google_Service_Partners extends Google_Service
{


  public $analytics;
  public $clientMessages;
  public $companies;
  public $companies_leads;
  public $exams;
  public $leads;
  public $offers;
  public $offers_history;
  public $userEvents;
  public $userStates;
  public $users;
  public $v2;
  
  /**
   * Constructs the internal representation of the Partners service.
   *
   * @param Google_Client $client
   */
  public function __construct(Google_Client $client)
  {
    parent::__construct($client);
    $this->rootUrl = 'https://partners.googleapis.com/';
    $this->servicePath = '';
    $this->version = 'v2';
    $this->serviceName = 'partners';

    $this->analytics = new Google_Service_Partners_Resource_Analytics(
        $this,
        $this->serviceName,
        'analytics',
        array(
          'methods' => array(
            'list' => array(
              'path' => 'v2/analytics',
              'httpMethod' => 'GET',
              'parameters' => array(
                'requestMetadata.trafficSource.trafficSubId' => array(
                  'location' => 'query',
                  'type' => 'string',
                ),
                'requestMetadata.userOverrides.userId' => array(
                  'location' => 'query',
                  'type' => 'string',
                ),
                'requestMetadata.partnersSessionId' => array(
                  'location' => 'query',
                  'type' => 'string',
                ),
                'pageToken' => array(
                  'location' => 'query',
                  'type' => 'string',
                ),
                'pageSize' => array(
                  'location' => 'query',
                  'type' => 'integer',
                ),
                'requestMetadata.trafficSource.trafficSourceId' => array(
                  'location' => 'query',
                  'type' => 'string',
                ),
                'requestMetadata.locale' => array(
                  'location' => 'query',
                  'type' => 'string',
                ),
                'requestMetadata.userOverrides.ipAddress' => array(
                  'location' => 'query',
                  'type' => 'string',
                ),
                'requestMetadata.experimentIds' => array(
                  'location' => 'query',
                  'type' => 'string',
                  'repeated' => true,
                ),
              ),
            ),
          )
        )
    );
    $this->clientMessages = new Google_Service_Partners_Resource_ClientMessages(
        $this,
        $this->serviceName,
        'clientMessages',
        array(
          'methods' => array(
            'log' => array(
              'path' => 'v2/clientMessages:log',
              'httpMethod' => 'POST',
              'parameters' => array(),
            ),
          )
        )
    );
    $this->companies = new Google_Service_Partners_Resource_Companies(
        $this,
        $this->serviceName,
        'companies',
        array(
          'methods' => array(
            'get' => array(
              'path' => 'v2/companies/{companyId}',
              'httpMethod' => 'GET',
              'parameters' => array(
                'companyId' => array(
                  'location' => 'path',
                  'type' => 'string',
                  'required' => true,
                ),
                'requestMetadata.userOverrides.userId' => array(
                  'location' => 'query',
                  'type' => 'string',
                ),
                'requestMetadata.partnersSessionId' => array(
                  'location' => 'query',
                  'type' => 'string',
                ),
                'view' => array(
                  'location' => 'query',
                  'type' => 'string',
                ),
                'address' => array(
                  'location' => 'query',
                  'type' => 'string',
                ),
                'requestMetadata.locale' => array(
                  'location' => 'query',
                  'type' => 'string',
                ),
                'requestMetadata.trafficSource.trafficSourceId' => array(
                  'location' => 'query',
                  'type' => 'string',
                ),
                'requestMetadata.userOverrides.ipAddress' => array(
                  'location' => 'query',
                  'type' => 'string',
                ),
                'currencyCode' => array(
                  'location' => 'query',
                  'type' => 'string',
                ),
                'requestMetadata.experimentIds' => array(
                  'location' => 'query',
                  'type' => 'string',
                  'repeated' => true,
                ),
                'orderBy' => array(
                  'location' => 'query',
                  'type' => 'string',
                ),
                'requestMetadata.trafficSource.trafficSubId' => array(
                  'location' => 'query',
                  'type' => 'string',
                ),
              ),
            ),'list' => array(
              'path' => 'v2/companies',
              'httpMethod' => 'GET',
              'parameters' => array(
                'minMonthlyBudget.nanos' => array(
                  'location' => 'query',
                  'type' => 'integer',
                ),
                'requestMetadata.trafficSource.trafficSubId' => array(
                  'location' => 'query',
                  'type' => 'string',
                ),
                'requestMetadata.partnersSessionId' => array(
                  'location' => 'query',
                  'type' => 'string',
                ),
                'companyName' => array(
                  'location' => 'query',
                  'type' => 'string',
                ),
                'pageToken' => array(
                  'location' => 'query',
                  'type' => 'string',
                ),
                'industries' => array(
                  'location' => 'query',
                  'type' => 'string',
                  'repeated' => true,
                ),
                'websiteUrl' => array(
                  'location' => 'query',
                  'type' => 'string',
                ),
                'gpsMotivations' => array(
                  'location' => 'query',
                  'type' => 'string',
                  'repeated' => true,
                ),
                'languageCodes' => array(
                  'location' => 'query',
                  'type' => 'string',
                  'repeated' => true,
                ),
                'pageSize' => array(
                  'location' => 'query',
                  'type' => 'integer',
                ),
                'requestMetadata.userOverrides.ipAddress' => array(
                  'location' => 'query',
                  'type' => 'string',
                ),
                'requestMetadata.experimentIds' => array(
                  'location' => 'query',
                  'type' => 'string',
                  'repeated' => true,
                ),
                'orderBy' => array(
                  'location' => 'query',
                  'type' => 'string',
                ),
                'specializations' => array(
                  'location' => 'query',
                  'type' => 'string',
                  'repeated' => true,
                ),
                'maxMonthlyBudget.currencyCode' => array(
                  'location' => 'query',
                  'type' => 'string',
                ),
                'minMonthlyBudget.currencyCode' => array(
                  'location' => 'query',
                  'type' => 'string',
                ),
                'requestMetadata.userOverrides.userId' => array(
                  'location' => 'query',
                  'type' => 'string',
                ),
                'view' => array(
                  'location' => 'query',
                  'type' => 'string',
                ),
                'address' => array(
                  'location' => 'query',
                  'type' => 'string',
                ),
                'requestMetadata.locale' => array(
                  'location' => 'query',
                  'type' => 'string',
                ),
                'minMonthlyBudget.units' => array(
                  'location' => 'query',
                  'type' => 'string',
                ),
                'maxMonthlyBudget.nanos' => array(
                  'location' => 'query',
                  'type' => 'integer',
                ),
                'services' => array(
                  'location' => 'query',
                  'type' => 'string',
                  'repeated' => true,
                ),
                'requestMetadata.trafficSource.trafficSourceId' => array(
                  'location' => 'query',
                  'type' => 'string',
                ),
                'maxMonthlyBudget.units' => array(
                  'location' => 'query',
                  'type' => 'string',
                ),
              ),
            ),
          )
        )
    );
    $this->companies_leads = new Google_Service_Partners_Resource_CompaniesLeads(
        $this,
        $this->serviceName,
        'leads',
        array(
          'methods' => array(
            'create' => array(
              'path' => 'v2/companies/{companyId}/leads',
              'httpMethod' => 'POST',
              'parameters' => array(
                'companyId' => array(
                  'location' => 'path',
                  'type' => 'string',
                  'required' => true,
                ),
              ),
            ),
          )
        )
    );
    $this->exams = new Google_Service_Partners_Resource_Exams(
        $this,
        $this->serviceName,
        'exams',
        array(
          'methods' => array(
            'getToken' => array(
              'path' => 'v2/exams/{examType}/token',
              'httpMethod' => 'GET',
              'parameters' => array(
                'examType' => array(
                  'location' => 'path',
                  'type' => 'string',
                  'required' => true,
                ),
                'requestMetadata.partnersSessionId' => array(
                  'location' => 'query',
                  'type' => 'string',
                ),
                'requestMetadata.userOverrides.userId' => array(
                  'location' => 'query',
                  'type' => 'string',
                ),
                'requestMetadata.trafficSource.trafficSourceId' => array(
                  'location' => 'query',
                  'type' => 'string',
                ),
                'requestMetadata.locale' => array(
                  'location' => 'query',
                  'type' => 'string',
                ),
                'requestMetadata.userOverrides.ipAddress' => array(
                  'location' => 'query',
                  'type' => 'string',
                ),
                'requestMetadata.experimentIds' => array(
                  'location' => 'query',
                  'type' => 'string',
                  'repeated' => true,
                ),
                'requestMetadata.trafficSource.trafficSubId' => array(
                  'location' => 'query',
                  'type' => 'string',
                ),
              ),
            ),
          )
        )
    );
    $this->leads = new Google_Service_Partners_Resource_Leads(
        $this,
        $this->serviceName,
        'leads',
        array(
          'methods' => array(
            'list' => array(
              'path' => 'v2/leads',
              'httpMethod' => 'GET',
              'parameters' => array(
                'requestMetadata.partnersSessionId' => array(
                  'location' => 'query',
                  'type' => 'string',
                ),
                'requestMetadata.userOverrides.userId' => array(
                  'location' => 'query',
                  'type' => 'string',
                ),
                'pageToken' => array(
                  'location' => 'query',
                  'type' => 'string',
                ),
                'pageSize' => array(
                  'location' => 'query',
                  'type' => 'integer',
                ),
                'requestMetadata.trafficSource.trafficSourceId' => array(
                  'location' => 'query',
                  'type' => 'string',
                ),
                'requestMetadata.locale' => array(
                  'location' => 'query',
                  'type' => 'string',
                ),
                'requestMetadata.userOverrides.ipAddress' => array(
                  'location' => 'query',
                  'type' => 'string',
                ),
                'requestMetadata.experimentIds' => array(
                  'location' => 'query',
                  'type' => 'string',
                  'repeated' => true,
                ),
                'orderBy' => array(
                  'location' => 'query',
                  'type' => 'string',
                ),
                'requestMetadata.trafficSource.trafficSubId' => array(
                  'location' => 'query',
                  'type' => 'string',
                ),
              ),
            ),
          )
        )
    );
    $this->offers = new Google_Service_Partners_Resource_Offers(
        $this,
        $this->serviceName,
        'offers',
        array(
          'methods' => array(
            'list' => array(
              'path' => 'v2/offers',
              'httpMethod' => 'GET',
              'parameters' => array(
                'requestMetadata.trafficSource.trafficSubId' => array(
                  'location' => 'query',
                  'type' => 'string',
                ),
                'requestMetadata.userOverrides.userId' => array(
                  'location' => 'query',
                  'type' => 'string',
                ),
                'requestMetadata.partnersSessionId' => array(
                  'location' => 'query',
                  'type' => 'string',
                ),
                'requestMetadata.trafficSource.trafficSourceId' => array(
                  'location' => 'query',
                  'type' => 'string',
                ),
                'requestMetadata.locale' => array(
                  'location' => 'query',
                  'type' => 'string',
                ),
                'requestMetadata.userOverrides.ipAddress' => array(
                  'location' => 'query',
                  'type' => 'string',
                ),
                'requestMetadata.experimentIds' => array(
                  'location' => 'query',
                  'type' => 'string',
                  'repeated' => true,
                ),
              ),
            ),
          )
        )
    );
    $this->offers_history = new Google_Service_Partners_Resource_OffersHistory(
        $this,
        $this->serviceName,
        'history',
        array(
          'methods' => array(
            'list' => array(
              'path' => 'v2/offers/history',
              'httpMethod' => 'GET',
              'parameters' => array(
                'requestMetadata.userOverrides.ipAddress' => array(
                  'location' => 'query',
                  'type' => 'string',
                ),
                'requestMetadata.experimentIds' => array(
                  'location' => 'query',
                  'type' => 'string',
                  'repeated' => true,
                ),
                'entireCompany' => array(
                  'location' => 'query',
                  'type' => 'boolean',
                ),
                'requestMetadata.trafficSource.trafficSubId' => array(
                  'location' => 'query',
                  'type' => 'string',
                ),
                'orderBy' => array(
                  'location' => 'query',
                  'type' => 'string',
                ),
                'requestMetadata.partnersSessionId' => array(
                  'location' => 'query',
                  'type' => 'string',
                ),
                'requestMetadata.userOverrides.userId' => array(
                  'location' => 'query',
                  'type' => 'string',
                ),
                'pageToken' => array(
                  'location' => 'query',
                  'type' => 'string',
                ),
                'pageSize' => array(
                  'location' => 'query',
                  'type' => 'integer',
                ),
                'requestMetadata.trafficSource.trafficSourceId' => array(
                  'location' => 'query',
                  'type' => 'string',
                ),
                'requestMetadata.locale' => array(
                  'location' => 'query',
                  'type' => 'string',
                ),
              ),
            ),
          )
        )
    );
    $this->userEvents = new Google_Service_Partners_Resource_UserEvents(
        $this,
        $this->serviceName,
        'userEvents',
        array(
          'methods' => array(
            'log' => array(
              'path' => 'v2/userEvents:log',
              'httpMethod' => 'POST',
              'parameters' => array(),
            ),
          )
        )
    );
    $this->userStates = new Google_Service_Partners_Resource_UserStates(
        $this,
        $this->serviceName,
        'userStates',
        array(
          'methods' => array(
            'list' => array(
              'path' => 'v2/userStates',
              'httpMethod' => 'GET',
              'parameters' => array(
                'requestMetadata.trafficSource.trafficSourceId' => array(
                  'location' => 'query',
                  'type' => 'string',
                ),
                'requestMetadata.locale' => array(
                  'location' => 'query',
                  'type' => 'string',
                ),
                'requestMetadata.userOverrides.ipAddress' => array(
                  'location' => 'query',
                  'type' => 'string',
                ),
                'requestMetadata.experimentIds' => array(
                  'location' => 'query',
                  'type' => 'string',
                  'repeated' => true,
                ),
                'requestMetadata.trafficSource.trafficSubId' => array(
                  'location' => 'query',
                  'type' => 'string',
                ),
                'requestMetadata.userOverrides.userId' => array(
                  'location' => 'query',
                  'type' => 'string',
                ),
                'requestMetadata.partnersSessionId' => array(
                  'location' => 'query',
                  'type' => 'string',
                ),
              ),
            ),
          )
        )
    );
    $this->users = new Google_Service_Partners_Resource_Users(
        $this,
        $this->serviceName,
        'users',
        array(
          'methods' => array(
            'createCompanyRelation' => array(
              'path' => 'v2/users/{userId}/companyRelation',
              'httpMethod' => 'PUT',
              'parameters' => array(
                'userId' => array(
                  'location' => 'path',
                  'type' => 'string',
                  'required' => true,
                ),
                'requestMetadata.trafficSource.trafficSourceId' => array(
                  'location' => 'query',
                  'type' => 'string',
                ),
                'requestMetadata.locale' => array(
                  'location' => 'query',
                  'type' => 'string',
                ),
                'requestMetadata.userOverrides.ipAddress' => array(
                  'location' => 'query',
                  'type' => 'string',
                ),
                'requestMetadata.experimentIds' => array(
                  'location' => 'query',
                  'type' => 'string',
                  'repeated' => true,
                ),
                'requestMetadata.trafficSource.trafficSubId' => array(
                  'location' => 'query',
                  'type' => 'string',
                ),
                'requestMetadata.userOverrides.userId' => array(
                  'location' => 'query',
                  'type' => 'string',
                ),
                'requestMetadata.partnersSessionId' => array(
                  'location' => 'query',
                  'type' => 'string',
                ),
              ),
            ),'deleteCompanyRelation' => array(
              'path' => 'v2/users/{userId}/companyRelation',
              'httpMethod' => 'DELETE',
              'parameters' => array(
                'userId' => array(
                  'location' => 'path',
                  'type' => 'string',
                  'required' => true,
                ),
                'requestMetadata.trafficSource.trafficSubId' => array(
                  'location' => 'query',
                  'type' => 'string',
                ),
                'requestMetadata.userOverrides.userId' => array(
                  'location' => 'query',
                  'type' => 'string',
                ),
                'requestMetadata.partnersSessionId' => array(
                  'location' => 'query',
                  'type' => 'string',
                ),
                'requestMetadata.trafficSource.trafficSourceId' => array(
                  'location' => 'query',
                  'type' => 'string',
                ),
                'requestMetadata.locale' => array(
                  'location' => 'query',
                  'type' => 'string',
                ),
                'requestMetadata.userOverrides.ipAddress' => array(
                  'location' => 'query',
                  'type' => 'string',
                ),
                'requestMetadata.experimentIds' => array(
                  'location' => 'query',
                  'type' => 'string',
                  'repeated' => true,
                ),
              ),
            ),'get' => array(
              'path' => 'v2/users/{userId}',
              'httpMethod' => 'GET',
              'parameters' => array(
                'userId' => array(
                  'location' => 'path',
                  'type' => 'string',
                  'required' => true,
                ),
                'requestMetadata.trafficSource.trafficSubId' => array(
                  'location' => 'query',
                  'type' => 'string',
                ),
                'requestMetadata.partnersSessionId' => array(
                  'location' => 'query',
                  'type' => 'string',
                ),
                'requestMetadata.userOverrides.userId' => array(
                  'location' => 'query',
                  'type' => 'string',
                ),
                'userView' => array(
                  'location' => 'query',
                  'type' => 'string',
                ),
                'requestMetadata.trafficSource.trafficSourceId' => array(
                  'location' => 'query',
                  'type' => 'string',
                ),
                'requestMetadata.locale' => array(
                  'location' => 'query',
                  'type' => 'string',
                ),
                'requestMetadata.userOverrides.ipAddress' => array(
                  'location' => 'query',
                  'type' => 'string',
                ),
                'requestMetadata.experimentIds' => array(
                  'location' => 'query',
                  'type' => 'string',
                  'repeated' => true,
                ),
              ),
            ),'updateProfile' => array(
              'path' => 'v2/users/profile',
              'httpMethod' => 'PATCH',
              'parameters' => array(
                'requestMetadata.trafficSource.trafficSubId' => array(
                  'location' => 'query',
                  'type' => 'string',
                ),
                'requestMetadata.userOverrides.userId' => array(
                  'location' => 'query',
                  'type' => 'string',
                ),
                'requestMetadata.partnersSessionId' => array(
                  'location' => 'query',
                  'type' => 'string',
                ),
                'requestMetadata.trafficSource.trafficSourceId' => array(
                  'location' => 'query',
                  'type' => 'string',
                ),
                'requestMetadata.locale' => array(
                  'location' => 'query',
                  'type' => 'string',
                ),
                'requestMetadata.userOverrides.ipAddress' => array(
                  'location' => 'query',
                  'type' => 'string',
                ),
                'requestMetadata.experimentIds' => array(
                  'location' => 'query',
                  'type' => 'string',
                  'repeated' => true,
                ),
              ),
            ),
          )
        )
    );
    $this->v2 = new Google_Service_Partners_Resource_V2(
        $this,
        $this->serviceName,
        'v2',
        array(
          'methods' => array(
            'getPartnersstatus' => array(
              'path' => 'v2/partnersstatus',
              'httpMethod' => 'GET',
              'parameters' => array(
                'requestMetadata.userOverrides.ipAddress' => array(
                  'location' => 'query',
                  'type' => 'string',
                ),
                'requestMetadata.experimentIds' => array(
                  'location' => 'query',
                  'type' => 'string',
                  'repeated' => true,
                ),
                'requestMetadata.trafficSource.trafficSubId' => array(
                  'location' => 'query',
                  'type' => 'string',
                ),
                'requestMetadata.userOverrides.userId' => array(
                  'location' => 'query',
                  'type' => 'string',
                ),
                'requestMetadata.partnersSessionId' => array(
                  'location' => 'query',
                  'type' => 'string',
                ),
                'requestMetadata.trafficSource.trafficSourceId' => array(
                  'location' => 'query',
                  'type' => 'string',
                ),
                'requestMetadata.locale' => array(
                  'location' => 'query',
                  'type' => 'string',
                ),
              ),
            ),'updateCompanies' => array(
              'path' => 'v2/companies',
              'httpMethod' => 'PATCH',
              'parameters' => array(
                'requestMetadata.userOverrides.ipAddress' => array(
                  'location' => 'query',
                  'type' => 'string',
                ),
                'updateMask' => array(
                  'location' => 'query',
                  'type' => 'string',
                ),
                'requestMetadata.experimentIds' => array(
                  'location' => 'query',
                  'type' => 'string',
                  'repeated' => true,
                ),
                'requestMetadata.trafficSource.trafficSubId' => array(
                  'location' => 'query',
                  'type' => 'string',
                ),
                'requestMetadata.userOverrides.userId' => array(
                  'location' => 'query',
                  'type' => 'string',
                ),
                'requestMetadata.partnersSessionId' => array(
                  'location' => 'query',
                  'type' => 'string',
                ),
                'requestMetadata.trafficSource.trafficSourceId' => array(
                  'location' => 'query',
                  'type' => 'string',
                ),
                'requestMetadata.locale' => array(
                  'location' => 'query',
                  'type' => 'string',
                ),
              ),
            ),'updateLeads' => array(
              'path' => 'v2/leads',
              'httpMethod' => 'PATCH',
              'parameters' => array(
                'requestMetadata.trafficSource.trafficSourceId' => array(
                  'location' => 'query',
                  'type' => 'string',
                ),
                'requestMetadata.locale' => array(
                  'location' => 'query',
                  'type' => 'string',
                ),
                'requestMetadata.userOverrides.ipAddress' => array(
                  'location' => 'query',
                  'type' => 'string',
                ),
                'updateMask' => array(
                  'location' => 'query',
                  'type' => 'string',
                ),
                'requestMetadata.experimentIds' => array(
                  'location' => 'query',
                  'type' => 'string',
                  'repeated' => true,
                ),
                'requestMetadata.trafficSource.trafficSubId' => array(
                  'location' => 'query',
                  'type' => 'string',
                ),
                'requestMetadata.partnersSessionId' => array(
                  'location' => 'query',
                  'type' => 'string',
                ),
                'requestMetadata.userOverrides.userId' => array(
                  'location' => 'query',
                  'type' => 'string',
                ),
              ),
            ),
          )
        )
    );
  }
}
