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
 * Service definition for ServiceControl (v1).
 *
 * <p>
 * Google Service Control provides control plane functionality to managed
 * services, such as logging, monitoring, and status checks.</p>
 *
 * <p>
 * For more information about this service, see the API
 * <a href="https://cloud.google.com/service-control/" target="_blank">Documentation</a>
 * </p>
 *
 * @author Google, Inc.
 */
class Google_Service_ServiceControl extends Google_Service
{
  /** View and manage your data across Google Cloud Platform services. */
  const CLOUD_PLATFORM =
      "https://www.googleapis.com/auth/cloud-platform";
  /** Manage your Google Service Control data. */
  const SERVICECONTROL =
      "https://www.googleapis.com/auth/servicecontrol";

  public $services;
  
  /**
   * Constructs the internal representation of the ServiceControl service.
   *
   * @param Google_Client $client
   */
  public function __construct(Google_Client $client)
  {
    parent::__construct($client);
    $this->rootUrl = 'https://servicecontrol.googleapis.com/';
    $this->servicePath = '';
    $this->version = 'v1';
    $this->serviceName = 'servicecontrol';

    $this->services = new Google_Service_ServiceControl_Resource_Services(
        $this,
        $this->serviceName,
        'services',
        array(
          'methods' => array(
            'allocateQuota' => array(
              'path' => 'v1/services/{serviceName}:allocateQuota',
              'httpMethod' => 'POST',
              'parameters' => array(
                'serviceName' => array(
                  'location' => 'path',
                  'type' => 'string',
                  'required' => true,
                ),
              ),
            ),'check' => array(
              'path' => 'v1/services/{serviceName}:check',
              'httpMethod' => 'POST',
              'parameters' => array(
                'serviceName' => array(
                  'location' => 'path',
                  'type' => 'string',
                  'required' => true,
                ),
              ),
            ),'endReconciliation' => array(
              'path' => 'v1/services/{serviceName}:endReconciliation',
              'httpMethod' => 'POST',
              'parameters' => array(
                'serviceName' => array(
                  'location' => 'path',
                  'type' => 'string',
                  'required' => true,
                ),
              ),
            ),'releaseQuota' => array(
              'path' => 'v1/services/{serviceName}:releaseQuota',
              'httpMethod' => 'POST',
              'parameters' => array(
                'serviceName' => array(
                  'location' => 'path',
                  'type' => 'string',
                  'required' => true,
                ),
              ),
            ),'report' => array(
              'path' => 'v1/services/{serviceName}:report',
              'httpMethod' => 'POST',
              'parameters' => array(
                'serviceName' => array(
                  'location' => 'path',
                  'type' => 'string',
                  'required' => true,
                ),
              ),
            ),'startReconciliation' => array(
              'path' => 'v1/services/{serviceName}:startReconciliation',
              'httpMethod' => 'POST',
              'parameters' => array(
                'serviceName' => array(
                  'location' => 'path',
                  'type' => 'string',
                  'required' => true,
                ),
              ),
            ),
          )
        )
    );
  }
}
