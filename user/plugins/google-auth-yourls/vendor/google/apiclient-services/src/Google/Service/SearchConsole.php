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
 * Service definition for SearchConsole (v1).
 *
 * <p>
 * Provides tools for running validation tests against single URLs</p>
 *
 * <p>
 * For more information about this service, see the API
 * <a href="https://developers.google.com/webmaster-tools/search-console-api/" target="_blank">Documentation</a>
 * </p>
 *
 * @author Google, Inc.
 */
class Google_Service_SearchConsole extends Google_Service
{


  public $urlTestingTools_mobileFriendlyTest;
  
  /**
   * Constructs the internal representation of the SearchConsole service.
   *
   * @param Google_Client $client
   */
  public function __construct(Google_Client $client)
  {
    parent::__construct($client);
    $this->rootUrl = 'https://searchconsole.googleapis.com/';
    $this->servicePath = '';
    $this->version = 'v1';
    $this->serviceName = 'searchconsole';

    $this->urlTestingTools_mobileFriendlyTest = new Google_Service_SearchConsole_Resource_UrlTestingToolsMobileFriendlyTest(
        $this,
        $this->serviceName,
        'mobileFriendlyTest',
        array(
          'methods' => array(
            'run' => array(
              'path' => 'v1/urlTestingTools/mobileFriendlyTest:run',
              'httpMethod' => 'POST',
              'parameters' => array(),
            ),
          )
        )
    );
  }
}
