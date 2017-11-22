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
 * Service definition for Safebrowsing (v4).
 *
 * <p>
 * Enables client applications to check web resources (most commonly URLs)
 * against Google-generated lists of unsafe web resources.</p>
 *
 * <p>
 * For more information about this service, see the API
 * <a href="https://developers.google.com/safe-browsing/" target="_blank">Documentation</a>
 * </p>
 *
 * @author Google, Inc.
 */
class Google_Service_Safebrowsing extends Google_Service
{


  public $encodedFullHashes;
  public $encodedUpdates;
  public $fullHashes;
  public $threatListUpdates;
  public $threatLists;
  public $threatMatches;
  
  /**
   * Constructs the internal representation of the Safebrowsing service.
   *
   * @param Google_Client $client
   */
  public function __construct(Google_Client $client)
  {
    parent::__construct($client);
    $this->rootUrl = 'https://safebrowsing.googleapis.com/';
    $this->servicePath = '';
    $this->version = 'v4';
    $this->serviceName = 'safebrowsing';

    $this->encodedFullHashes = new Google_Service_Safebrowsing_Resource_EncodedFullHashes(
        $this,
        $this->serviceName,
        'encodedFullHashes',
        array(
          'methods' => array(
            'get' => array(
              'path' => 'v4/encodedFullHashes/{encodedRequest}',
              'httpMethod' => 'GET',
              'parameters' => array(
                'encodedRequest' => array(
                  'location' => 'path',
                  'type' => 'string',
                  'required' => true,
                ),
                'clientVersion' => array(
                  'location' => 'query',
                  'type' => 'string',
                ),
                'clientId' => array(
                  'location' => 'query',
                  'type' => 'string',
                ),
              ),
            ),
          )
        )
    );
    $this->encodedUpdates = new Google_Service_Safebrowsing_Resource_EncodedUpdates(
        $this,
        $this->serviceName,
        'encodedUpdates',
        array(
          'methods' => array(
            'get' => array(
              'path' => 'v4/encodedUpdates/{encodedRequest}',
              'httpMethod' => 'GET',
              'parameters' => array(
                'encodedRequest' => array(
                  'location' => 'path',
                  'type' => 'string',
                  'required' => true,
                ),
                'clientVersion' => array(
                  'location' => 'query',
                  'type' => 'string',
                ),
                'clientId' => array(
                  'location' => 'query',
                  'type' => 'string',
                ),
              ),
            ),
          )
        )
    );
    $this->fullHashes = new Google_Service_Safebrowsing_Resource_FullHashes(
        $this,
        $this->serviceName,
        'fullHashes',
        array(
          'methods' => array(
            'find' => array(
              'path' => 'v4/fullHashes:find',
              'httpMethod' => 'POST',
              'parameters' => array(),
            ),
          )
        )
    );
    $this->threatListUpdates = new Google_Service_Safebrowsing_Resource_ThreatListUpdates(
        $this,
        $this->serviceName,
        'threatListUpdates',
        array(
          'methods' => array(
            'fetch' => array(
              'path' => 'v4/threatListUpdates:fetch',
              'httpMethod' => 'POST',
              'parameters' => array(),
            ),
          )
        )
    );
    $this->threatLists = new Google_Service_Safebrowsing_Resource_ThreatLists(
        $this,
        $this->serviceName,
        'threatLists',
        array(
          'methods' => array(
            'list' => array(
              'path' => 'v4/threatLists',
              'httpMethod' => 'GET',
              'parameters' => array(),
            ),
          )
        )
    );
    $this->threatMatches = new Google_Service_Safebrowsing_Resource_ThreatMatches(
        $this,
        $this->serviceName,
        'threatMatches',
        array(
          'methods' => array(
            'find' => array(
              'path' => 'v4/threatMatches:find',
              'httpMethod' => 'POST',
              'parameters' => array(),
            ),
          )
        )
    );
  }
}
