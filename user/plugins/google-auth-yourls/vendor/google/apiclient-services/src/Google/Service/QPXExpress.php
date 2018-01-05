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
 * Service definition for QPXExpress (v1).
 *
 * <p>
 * Finds the least expensive flights between an origin and a destination.</p>
 *
 * <p>
 * For more information about this service, see the API
 * <a href="http://developers.google.com/qpx-express" target="_blank">Documentation</a>
 * </p>
 *
 * @author Google, Inc.
 */
class Google_Service_QPXExpress extends Google_Service
{


  public $trips;
  
  /**
   * Constructs the internal representation of the QPXExpress service.
   *
   * @param Google_Client $client
   */
  public function __construct(Google_Client $client)
  {
    parent::__construct($client);
    $this->rootUrl = 'https://www.googleapis.com/';
    $this->servicePath = 'qpxExpress/v1/trips/';
    $this->version = 'v1';
    $this->serviceName = 'qpxExpress';

    $this->trips = new Google_Service_QPXExpress_Resource_Trips(
        $this,
        $this->serviceName,
        'trips',
        array(
          'methods' => array(
            'search' => array(
              'path' => 'search',
              'httpMethod' => 'POST',
              'parameters' => array(),
            ),
          )
        )
    );
  }
}
