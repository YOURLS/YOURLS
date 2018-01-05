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
 * Service definition for Cih (v3).
 *
 * <p>
 * Retrieving customer interactions API.</p>
 *
 * <p>
 * For more information about this service, see the API
 * <a href="https://sites.google.com/a/google.com/cih/engineering/eng-documents" target="_blank">Documentation</a>
 * </p>
 *
 * @author Google, Inc.
 */
class Google_Service_Cih extends Google_Service
{


  public $associatedEmails;
  public $userInteractions;
  
  /**
   * Constructs the internal representation of the Cih service.
   *
   * @param Google_Client $client
   */
  public function __construct(Google_Client $client)
  {
    parent::__construct($client);
    $this->rootUrl = 'https://www.googleapis.com/';
    $this->servicePath = 'cih/v3/';
    $this->version = 'v3';
    $this->serviceName = 'cih';

    $this->associatedEmails = new Google_Service_Cih_Resource_AssociatedEmails(
        $this,
        $this->serviceName,
        'associatedEmails',
        array(
          'methods' => array(
            'create' => array(
              'path' => 'associatedEmails/insert/{customerId}',
              'httpMethod' => 'PUT',
              'parameters' => array(
                'customerId' => array(
                  'location' => 'path',
                  'type' => 'string',
                  'required' => true,
                ),
              ),
            ),'delete' => array(
              'path' => 'associatedEmails/delete/{customerId}',
              'httpMethod' => 'DELETE',
              'parameters' => array(
                'customerId' => array(
                  'location' => 'path',
                  'type' => 'string',
                  'required' => true,
                ),
                'emailAddress' => array(
                  'location' => 'query',
                  'type' => 'string',
                  'required' => true,
                ),
                'operator' => array(
                  'location' => 'query',
                  'type' => 'string',
                  'required' => true,
                ),
              ),
            ),
          )
        )
    );
    $this->userInteractions = new Google_Service_Cih_Resource_UserInteractions(
        $this,
        $this->serviceName,
        'userInteractions',
        array(
          'methods' => array(
            'get' => array(
              'path' => 'userInteractions/{entityType}/{entityId}/{timestamp}/{interactionType}',
              'httpMethod' => 'GET',
              'parameters' => array(
                'entityType' => array(
                  'location' => 'path',
                  'type' => 'string',
                  'required' => true,
                ),
                'entityId' => array(
                  'location' => 'path',
                  'type' => 'string',
                  'required' => true,
                ),
                'timestamp' => array(
                  'location' => 'path',
                  'type' => 'string',
                  'required' => true,
                ),
                'interactionType' => array(
                  'location' => 'path',
                  'type' => 'string',
                  'required' => true,
                ),
              ),
            ),'insert' => array(
              'path' => 'userInteractions/insert',
              'httpMethod' => 'POST',
              'parameters' => array(),
            ),'list' => array(
              'path' => 'userInteractions',
              'httpMethod' => 'GET',
              'parameters' => array(
                'entity' => array(
                  'location' => 'query',
                  'type' => 'string',
                  'repeated' => true,
                  'required' => true,
                ),
                'entityFilter' => array(
                  'location' => 'query',
                  'type' => 'string',
                  'repeated' => true,
                ),
                'excludePassedInteractionOrigin' => array(
                  'location' => 'query',
                  'type' => 'boolean',
                ),
                'excludePassedInteractionType' => array(
                  'location' => 'query',
                  'type' => 'boolean',
                ),
                'includeRelatedInteractions' => array(
                  'location' => 'query',
                  'type' => 'boolean',
                ),
                'interactionOrigin' => array(
                  'location' => 'query',
                  'type' => 'string',
                  'repeated' => true,
                ),
                'interactionType' => array(
                  'location' => 'query',
                  'type' => 'string',
                  'repeated' => true,
                ),
                'lookup_participant_info' => array(
                  'location' => 'query',
                  'type' => 'boolean',
                ),
                'maxInteractionsPerPage' => array(
                  'location' => 'query',
                  'type' => 'integer',
                ),
                'maxResults' => array(
                  'location' => 'query',
                  'type' => 'integer',
                ),
                'metaTypeFilter' => array(
                  'location' => 'query',
                  'type' => 'string',
                  'repeated' => true,
                ),
                'minMainEntityInteractions' => array(
                  'location' => 'query',
                  'type' => 'integer',
                ),
                'pageToken' => array(
                  'location' => 'query',
                  'type' => 'string',
                ),
                'phoneMatcher' => array(
                  'location' => 'query',
                  'type' => 'string',
                  'repeated' => true,
                ),
                'timestampEnd' => array(
                  'location' => 'query',
                  'type' => 'string',
                ),
                'timestampStart' => array(
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
