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
 * Service definition for CloudMonitoring (v2beta2).
 *
 * <p>
 * Accesses Google Cloud Monitoring data.</p>
 *
 * <p>
 * For more information about this service, see the API
 * <a href="https://cloud.google.com/monitoring/v2beta2/" target="_blank">Documentation</a>
 * </p>
 *
 * @author Google, Inc.
 */
class Google_Service_CloudMonitoring extends Google_Service
{
  /** View and manage your data across Google Cloud Platform services. */
  const CLOUD_PLATFORM =
      "https://www.googleapis.com/auth/cloud-platform";
  /** View and write monitoring data for all of your Google and third-party Cloud and API projects. */
  const MONITORING =
      "https://www.googleapis.com/auth/monitoring";

  public $metricDescriptors;
  public $timeseries;
  public $timeseriesDescriptors;
  
  /**
   * Constructs the internal representation of the CloudMonitoring service.
   *
   * @param Google_Client $client
   */
  public function __construct(Google_Client $client)
  {
    parent::__construct($client);
    $this->rootUrl = 'https://www.googleapis.com/';
    $this->servicePath = 'cloudmonitoring/v2beta2/projects/';
    $this->version = 'v2beta2';
    $this->serviceName = 'cloudmonitoring';

    $this->metricDescriptors = new Google_Service_CloudMonitoring_Resource_MetricDescriptors(
        $this,
        $this->serviceName,
        'metricDescriptors',
        array(
          'methods' => array(
            'create' => array(
              'path' => '{project}/metricDescriptors',
              'httpMethod' => 'POST',
              'parameters' => array(
                'project' => array(
                  'location' => 'path',
                  'type' => 'string',
                  'required' => true,
                ),
              ),
            ),'delete' => array(
              'path' => '{project}/metricDescriptors/{metric}',
              'httpMethod' => 'DELETE',
              'parameters' => array(
                'project' => array(
                  'location' => 'path',
                  'type' => 'string',
                  'required' => true,
                ),
                'metric' => array(
                  'location' => 'path',
                  'type' => 'string',
                  'required' => true,
                ),
              ),
            ),'list' => array(
              'path' => '{project}/metricDescriptors',
              'httpMethod' => 'GET',
              'parameters' => array(
                'project' => array(
                  'location' => 'path',
                  'type' => 'string',
                  'required' => true,
                ),
                'count' => array(
                  'location' => 'query',
                  'type' => 'integer',
                ),
                'pageToken' => array(
                  'location' => 'query',
                  'type' => 'string',
                ),
                'query' => array(
                  'location' => 'query',
                  'type' => 'string',
                ),
              ),
            ),
          )
        )
    );
    $this->timeseries = new Google_Service_CloudMonitoring_Resource_Timeseries(
        $this,
        $this->serviceName,
        'timeseries',
        array(
          'methods' => array(
            'list' => array(
              'path' => '{project}/timeseries/{metric}',
              'httpMethod' => 'GET',
              'parameters' => array(
                'project' => array(
                  'location' => 'path',
                  'type' => 'string',
                  'required' => true,
                ),
                'metric' => array(
                  'location' => 'path',
                  'type' => 'string',
                  'required' => true,
                ),
                'youngest' => array(
                  'location' => 'query',
                  'type' => 'string',
                  'required' => true,
                ),
                'aggregator' => array(
                  'location' => 'query',
                  'type' => 'string',
                ),
                'count' => array(
                  'location' => 'query',
                  'type' => 'integer',
                ),
                'labels' => array(
                  'location' => 'query',
                  'type' => 'string',
                  'repeated' => true,
                ),
                'oldest' => array(
                  'location' => 'query',
                  'type' => 'string',
                ),
                'pageToken' => array(
                  'location' => 'query',
                  'type' => 'string',
                ),
                'timespan' => array(
                  'location' => 'query',
                  'type' => 'string',
                ),
                'window' => array(
                  'location' => 'query',
                  'type' => 'string',
                ),
              ),
            ),'write' => array(
              'path' => '{project}/timeseries:write',
              'httpMethod' => 'POST',
              'parameters' => array(
                'project' => array(
                  'location' => 'path',
                  'type' => 'string',
                  'required' => true,
                ),
              ),
            ),
          )
        )
    );
    $this->timeseriesDescriptors = new Google_Service_CloudMonitoring_Resource_TimeseriesDescriptors(
        $this,
        $this->serviceName,
        'timeseriesDescriptors',
        array(
          'methods' => array(
            'list' => array(
              'path' => '{project}/timeseriesDescriptors/{metric}',
              'httpMethod' => 'GET',
              'parameters' => array(
                'project' => array(
                  'location' => 'path',
                  'type' => 'string',
                  'required' => true,
                ),
                'metric' => array(
                  'location' => 'path',
                  'type' => 'string',
                  'required' => true,
                ),
                'youngest' => array(
                  'location' => 'query',
                  'type' => 'string',
                  'required' => true,
                ),
                'aggregator' => array(
                  'location' => 'query',
                  'type' => 'string',
                ),
                'count' => array(
                  'location' => 'query',
                  'type' => 'integer',
                ),
                'labels' => array(
                  'location' => 'query',
                  'type' => 'string',
                  'repeated' => true,
                ),
                'oldest' => array(
                  'location' => 'query',
                  'type' => 'string',
                ),
                'pageToken' => array(
                  'location' => 'query',
                  'type' => 'string',
                ),
                'timespan' => array(
                  'location' => 'query',
                  'type' => 'string',
                ),
                'window' => array(
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
