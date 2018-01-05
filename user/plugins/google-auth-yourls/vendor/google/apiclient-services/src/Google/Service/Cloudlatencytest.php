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
 * Service definition for Cloudlatencytest (v2).
 *
 * <p>
 * Reports latency data.</p>
 *
 * <p>
 * For more information about this service, see the API
 * <a href="" target="_blank">Documentation</a>
 * </p>
 *
 * @author Google, Inc.
 */
class Google_Service_Cloudlatencytest extends Google_Service
{
  /** View monitoring data for all of your Google Cloud and API projects. */
  const MONITORING_READONLY =
      "https://www.googleapis.com/auth/monitoring.readonly";

  public $statscollection;
  
  /**
   * Constructs the internal representation of the Cloudlatencytest service.
   *
   * @param Google_Client $client
   */
  public function __construct(Google_Client $client)
  {
    parent::__construct($client);
    $this->rootUrl = 'https://cloudlatencytest-pa.googleapis.com/';
    $this->servicePath = 'v2/statscollection/';
    $this->version = 'v2';
    $this->serviceName = 'cloudlatencytest';

    $this->statscollection = new Google_Service_Cloudlatencytest_StatscollectionResource(
        $this,
        $this->serviceName,
        'statscollection',
        array(
          'methods' => array(
            'updateaggregatedstats' => array(
              'path' => 'updateaggregatedstats',
              'httpMethod' => 'POST',
              'parameters' => array(),
            ),'updatestats' => array(
              'path' => 'updatestats',
              'httpMethod' => 'POST',
              'parameters' => array(),
            ),
          )
        )
    );
  }
}
