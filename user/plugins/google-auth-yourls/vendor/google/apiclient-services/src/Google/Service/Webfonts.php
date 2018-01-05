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
 * Service definition for Webfonts (v1).
 *
 * <p>
 * Accesses the metadata for all families served by Google Fonts, providing a
 * list of families currently available (including available styles and a list
 * of supported script subsets).</p>
 *
 * <p>
 * For more information about this service, see the API
 * <a href="https://developers.google.com/fonts/docs/developer_api" target="_blank">Documentation</a>
 * </p>
 *
 * @author Google, Inc.
 */
class Google_Service_Webfonts extends Google_Service
{


  public $webfonts;
  
  /**
   * Constructs the internal representation of the Webfonts service.
   *
   * @param Google_Client $client
   */
  public function __construct(Google_Client $client)
  {
    parent::__construct($client);
    $this->rootUrl = 'https://www.googleapis.com/';
    $this->servicePath = 'webfonts/v1/';
    $this->version = 'v1';
    $this->serviceName = 'webfonts';

    $this->webfonts = new Google_Service_Webfonts_Resource_Webfonts(
        $this,
        $this->serviceName,
        'webfonts',
        array(
          'methods' => array(
            'list' => array(
              'path' => 'webfonts',
              'httpMethod' => 'GET',
              'parameters' => array(
                'sort' => array(
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
