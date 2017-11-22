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
 * Service definition for AppState (v1).
 *
 * <p>
 * The Google App State API.</p>
 *
 * <p>
 * For more information about this service, see the API
 * <a href="https://developers.google.com/games/services/web/api/states" target="_blank">Documentation</a>
 * </p>
 *
 * @author Google, Inc.
 */
class Google_Service_AppState extends Google_Service
{
  /** View and manage your data for this application. */
  const APPSTATE =
      "https://www.googleapis.com/auth/appstate";

  public $states;
  
  /**
   * Constructs the internal representation of the AppState service.
   *
   * @param Google_Client $client
   */
  public function __construct(Google_Client $client)
  {
    parent::__construct($client);
    $this->rootUrl = 'https://www.googleapis.com/';
    $this->servicePath = 'appstate/v1/';
    $this->version = 'v1';
    $this->serviceName = 'appstate';

    $this->states = new Google_Service_AppState_Resource_States(
        $this,
        $this->serviceName,
        'states',
        array(
          'methods' => array(
            'clear' => array(
              'path' => 'states/{stateKey}/clear',
              'httpMethod' => 'POST',
              'parameters' => array(
                'stateKey' => array(
                  'location' => 'path',
                  'type' => 'integer',
                  'required' => true,
                ),
                'currentDataVersion' => array(
                  'location' => 'query',
                  'type' => 'string',
                ),
              ),
            ),'delete' => array(
              'path' => 'states/{stateKey}',
              'httpMethod' => 'DELETE',
              'parameters' => array(
                'stateKey' => array(
                  'location' => 'path',
                  'type' => 'integer',
                  'required' => true,
                ),
              ),
            ),'get' => array(
              'path' => 'states/{stateKey}',
              'httpMethod' => 'GET',
              'parameters' => array(
                'stateKey' => array(
                  'location' => 'path',
                  'type' => 'integer',
                  'required' => true,
                ),
              ),
            ),'list' => array(
              'path' => 'states',
              'httpMethod' => 'GET',
              'parameters' => array(
                'includeData' => array(
                  'location' => 'query',
                  'type' => 'boolean',
                ),
              ),
            ),'update' => array(
              'path' => 'states/{stateKey}',
              'httpMethod' => 'PUT',
              'parameters' => array(
                'stateKey' => array(
                  'location' => 'path',
                  'type' => 'integer',
                  'required' => true,
                ),
                'currentStateVersion' => array(
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
