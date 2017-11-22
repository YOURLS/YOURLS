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
 * Service definition for AdExperienceReport (v1).
 *
 * <p>
 * View Ad Experience Report data, and get a list of sites that have a
 * significant number of annoying ads.</p>
 *
 * <p>
 * For more information about this service, see the API
 * <a href="https://developers.google.com/ad-experience-report/" target="_blank">Documentation</a>
 * </p>
 *
 * @author Google, Inc.
 */
class Google_Service_AdExperienceReport extends Google_Service
{
  /** Test scope for access to the Zoo service. */
  const XAPI_ZOO =
      "https://www.googleapis.com/auth/xapi.zoo";

  public $sites;
  public $violatingSites;
  
  /**
   * Constructs the internal representation of the AdExperienceReport service.
   *
   * @param Google_Client $client
   */
  public function __construct(Google_Client $client)
  {
    parent::__construct($client);
    $this->rootUrl = 'https://adexperiencereport.googleapis.com/';
    $this->servicePath = '';
    $this->version = 'v1';
    $this->serviceName = 'adexperiencereport';

    $this->sites = new Google_Service_AdExperienceReport_Resource_Sites(
        $this,
        $this->serviceName,
        'sites',
        array(
          'methods' => array(
            'get' => array(
              'path' => 'v1/{+name}',
              'httpMethod' => 'GET',
              'parameters' => array(
                'name' => array(
                  'location' => 'path',
                  'type' => 'string',
                  'required' => true,
                ),
              ),
            ),
          )
        )
    );
    $this->violatingSites = new Google_Service_AdExperienceReport_Resource_ViolatingSites(
        $this,
        $this->serviceName,
        'violatingSites',
        array(
          'methods' => array(
            'list' => array(
              'path' => 'v1/violatingSites',
              'httpMethod' => 'GET',
              'parameters' => array(),
            ),
          )
        )
    );
  }
}
