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
 * Service definition for Kgsearch (v1).
 *
 * <p>
 * Searches the Google Knowledge Graph for entities.</p>
 *
 * <p>
 * For more information about this service, see the API
 * <a href="https://developers.google.com/knowledge-graph/" target="_blank">Documentation</a>
 * </p>
 *
 * @author Google, Inc.
 */
class Google_Service_Kgsearch extends Google_Service
{


  public $entities;
  
  /**
   * Constructs the internal representation of the Kgsearch service.
   *
   * @param Google_Client $client
   */
  public function __construct(Google_Client $client)
  {
    parent::__construct($client);
    $this->rootUrl = 'https://kgsearch.googleapis.com/';
    $this->servicePath = '';
    $this->version = 'v1';
    $this->serviceName = 'kgsearch';

    $this->entities = new Google_Service_Kgsearch_Resource_Entities(
        $this,
        $this->serviceName,
        'entities',
        array(
          'methods' => array(
            'search' => array(
              'path' => 'v1/entities:search',
              'httpMethod' => 'GET',
              'parameters' => array(
                'prefix' => array(
                  'location' => 'query',
                  'type' => 'boolean',
                ),
                'query' => array(
                  'location' => 'query',
                  'type' => 'string',
                ),
                'types' => array(
                  'location' => 'query',
                  'type' => 'string',
                  'repeated' => true,
                ),
                'indent' => array(
                  'location' => 'query',
                  'type' => 'boolean',
                ),
                'languages' => array(
                  'location' => 'query',
                  'type' => 'string',
                  'repeated' => true,
                ),
                'ids' => array(
                  'location' => 'query',
                  'type' => 'string',
                  'repeated' => true,
                ),
                'limit' => array(
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
