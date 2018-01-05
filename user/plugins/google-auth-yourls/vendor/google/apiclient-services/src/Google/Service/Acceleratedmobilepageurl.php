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
 * Service definition for Acceleratedmobilepageurl (v1).
 *
 * <p>
 * Retrieves the list of AMP URLs (and equivalent AMP Cache URLs) for a given
 * list of public URL(s).</p>
 *
 * <p>
 * For more information about this service, see the API
 * <a href="https://developers.google.com/amp/cache/" target="_blank">Documentation</a>
 * </p>
 *
 * @author Google, Inc.
 */
class Google_Service_Acceleratedmobilepageurl extends Google_Service
{


  public $ampUrls;
  
  /**
   * Constructs the internal representation of the Acceleratedmobilepageurl
   * service.
   *
   * @param Google_Client $client
   */
  public function __construct(Google_Client $client)
  {
    parent::__construct($client);
    $this->rootUrl = 'https://acceleratedmobilepageurl.googleapis.com/';
    $this->servicePath = '';
    $this->version = 'v1';
    $this->serviceName = 'acceleratedmobilepageurl';

    $this->ampUrls = new Google_Service_Acceleratedmobilepageurl_Resource_AmpUrls(
        $this,
        $this->serviceName,
        'ampUrls',
        array(
          'methods' => array(
            'batchGet' => array(
              'path' => 'v1/ampUrls:batchGet',
              'httpMethod' => 'POST',
              'parameters' => array(),
            ),
          )
        )
    );
  }
}
