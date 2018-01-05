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
 * Service definition for ServiceManagement (v1).
 *
 * <p>
 * Google Service Management allows service producers to publish their services
 * on Google Cloud Platform so that they can be discovered and used by service
 * consumers.</p>
 *
 * <p>
 * For more information about this service, see the API
 * <a href="https://cloud.google.com/service-management/" target="_blank">Documentation</a>
 * </p>
 *
 * @author Google, Inc.
 */
class Google_Service_ServiceManagement extends Google_Service
{
  /** View and manage your data across Google Cloud Platform services. */
  const CLOUD_PLATFORM =
      "https://www.googleapis.com/auth/cloud-platform";
  /** View your data across Google Cloud Platform services. */
  const CLOUD_PLATFORM_READ_ONLY =
      "https://www.googleapis.com/auth/cloud-platform.read-only";
  /** Manage your Google API service configuration. */
  const SERVICE_MANAGEMENT =
      "https://www.googleapis.com/auth/service.management";
  /** View your Google API service configuration. */
  const SERVICE_MANAGEMENT_READONLY =
      "https://www.googleapis.com/auth/service.management.readonly";

  public $operations;
  public $services;
  public $services_configs;
  public $services_consumers;
  public $services_rollouts;
  
  /**
   * Constructs the internal representation of the ServiceManagement service.
   *
   * @param Google_Client $client
   */
  public function __construct(Google_Client $client)
  {
    parent::__construct($client);
    $this->rootUrl = 'https://servicemanagement.googleapis.com/';
    $this->servicePath = '';
    $this->version = 'v1';
    $this->serviceName = 'servicemanagement';

    $this->operations = new Google_Service_ServiceManagement_Resource_Operations(
        $this,
        $this->serviceName,
        'operations',
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
            ),'list' => array(
              'path' => 'v1/operations',
              'httpMethod' => 'GET',
              'parameters' => array(
                'name' => array(
                  'location' => 'query',
                  'type' => 'string',
                ),
                'pageToken' => array(
                  'location' => 'query',
                  'type' => 'string',
                ),
                'pageSize' => array(
                  'location' => 'query',
                  'type' => 'integer',
                ),
                'filter' => array(
                  'location' => 'query',
                  'type' => 'string',
                ),
              ),
            ),
          )
        )
    );
    $this->services = new Google_Service_ServiceManagement_Resource_Services(
        $this,
        $this->serviceName,
        'services',
        array(
          'methods' => array(
            'create' => array(
              'path' => 'v1/services',
              'httpMethod' => 'POST',
              'parameters' => array(),
            ),'delete' => array(
              'path' => 'v1/services/{serviceName}',
              'httpMethod' => 'DELETE',
              'parameters' => array(
                'serviceName' => array(
                  'location' => 'path',
                  'type' => 'string',
                  'required' => true,
                ),
              ),
            ),'disable' => array(
              'path' => 'v1/services/{serviceName}:disable',
              'httpMethod' => 'POST',
              'parameters' => array(
                'serviceName' => array(
                  'location' => 'path',
                  'type' => 'string',
                  'required' => true,
                ),
              ),
            ),'enable' => array(
              'path' => 'v1/services/{serviceName}:enable',
              'httpMethod' => 'POST',
              'parameters' => array(
                'serviceName' => array(
                  'location' => 'path',
                  'type' => 'string',
                  'required' => true,
                ),
              ),
            ),'generateConfigReport' => array(
              'path' => 'v1/services:generateConfigReport',
              'httpMethod' => 'POST',
              'parameters' => array(),
            ),'get' => array(
              'path' => 'v1/services/{serviceName}',
              'httpMethod' => 'GET',
              'parameters' => array(
                'serviceName' => array(
                  'location' => 'path',
                  'type' => 'string',
                  'required' => true,
                ),
              ),
            ),'getConfig' => array(
              'path' => 'v1/services/{serviceName}/config',
              'httpMethod' => 'GET',
              'parameters' => array(
                'serviceName' => array(
                  'location' => 'path',
                  'type' => 'string',
                  'required' => true,
                ),
                'configId' => array(
                  'location' => 'query',
                  'type' => 'string',
                ),
                'view' => array(
                  'location' => 'query',
                  'type' => 'string',
                ),
              ),
            ),'getIamPolicy' => array(
              'path' => 'v1/{+resource}:getIamPolicy',
              'httpMethod' => 'POST',
              'parameters' => array(
                'resource' => array(
                  'location' => 'path',
                  'type' => 'string',
                  'required' => true,
                ),
              ),
            ),'list' => array(
              'path' => 'v1/services',
              'httpMethod' => 'GET',
              'parameters' => array(
                'consumerId' => array(
                  'location' => 'query',
                  'type' => 'string',
                ),
                'pageToken' => array(
                  'location' => 'query',
                  'type' => 'string',
                ),
                'pageSize' => array(
                  'location' => 'query',
                  'type' => 'integer',
                ),
                'producerProjectId' => array(
                  'location' => 'query',
                  'type' => 'string',
                ),
              ),
            ),'setIamPolicy' => array(
              'path' => 'v1/{+resource}:setIamPolicy',
              'httpMethod' => 'POST',
              'parameters' => array(
                'resource' => array(
                  'location' => 'path',
                  'type' => 'string',
                  'required' => true,
                ),
              ),
            ),'testIamPermissions' => array(
              'path' => 'v1/{+resource}:testIamPermissions',
              'httpMethod' => 'POST',
              'parameters' => array(
                'resource' => array(
                  'location' => 'path',
                  'type' => 'string',
                  'required' => true,
                ),
              ),
            ),'undelete' => array(
              'path' => 'v1/services/{serviceName}:undelete',
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
    $this->services_configs = new Google_Service_ServiceManagement_Resource_ServicesConfigs(
        $this,
        $this->serviceName,
        'configs',
        array(
          'methods' => array(
            'create' => array(
              'path' => 'v1/services/{serviceName}/configs',
              'httpMethod' => 'POST',
              'parameters' => array(
                'serviceName' => array(
                  'location' => 'path',
                  'type' => 'string',
                  'required' => true,
                ),
              ),
            ),'get' => array(
              'path' => 'v1/services/{serviceName}/configs/{configId}',
              'httpMethod' => 'GET',
              'parameters' => array(
                'serviceName' => array(
                  'location' => 'path',
                  'type' => 'string',
                  'required' => true,
                ),
                'configId' => array(
                  'location' => 'path',
                  'type' => 'string',
                  'required' => true,
                ),
                'view' => array(
                  'location' => 'query',
                  'type' => 'string',
                ),
              ),
            ),'list' => array(
              'path' => 'v1/services/{serviceName}/configs',
              'httpMethod' => 'GET',
              'parameters' => array(
                'serviceName' => array(
                  'location' => 'path',
                  'type' => 'string',
                  'required' => true,
                ),
                'pageToken' => array(
                  'location' => 'query',
                  'type' => 'string',
                ),
                'pageSize' => array(
                  'location' => 'query',
                  'type' => 'integer',
                ),
              ),
            ),'submit' => array(
              'path' => 'v1/services/{serviceName}/configs:submit',
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
    $this->services_consumers = new Google_Service_ServiceManagement_Resource_ServicesConsumers(
        $this,
        $this->serviceName,
        'consumers',
        array(
          'methods' => array(
            'getIamPolicy' => array(
              'path' => 'v1/{+resource}:getIamPolicy',
              'httpMethod' => 'POST',
              'parameters' => array(
                'resource' => array(
                  'location' => 'path',
                  'type' => 'string',
                  'required' => true,
                ),
              ),
            ),'setIamPolicy' => array(
              'path' => 'v1/{+resource}:setIamPolicy',
              'httpMethod' => 'POST',
              'parameters' => array(
                'resource' => array(
                  'location' => 'path',
                  'type' => 'string',
                  'required' => true,
                ),
              ),
            ),'testIamPermissions' => array(
              'path' => 'v1/{+resource}:testIamPermissions',
              'httpMethod' => 'POST',
              'parameters' => array(
                'resource' => array(
                  'location' => 'path',
                  'type' => 'string',
                  'required' => true,
                ),
              ),
            ),
          )
        )
    );
    $this->services_rollouts = new Google_Service_ServiceManagement_Resource_ServicesRollouts(
        $this,
        $this->serviceName,
        'rollouts',
        array(
          'methods' => array(
            'create' => array(
              'path' => 'v1/services/{serviceName}/rollouts',
              'httpMethod' => 'POST',
              'parameters' => array(
                'serviceName' => array(
                  'location' => 'path',
                  'type' => 'string',
                  'required' => true,
                ),
              ),
            ),'get' => array(
              'path' => 'v1/services/{serviceName}/rollouts/{rolloutId}',
              'httpMethod' => 'GET',
              'parameters' => array(
                'serviceName' => array(
                  'location' => 'path',
                  'type' => 'string',
                  'required' => true,
                ),
                'rolloutId' => array(
                  'location' => 'path',
                  'type' => 'string',
                  'required' => true,
                ),
              ),
            ),'list' => array(
              'path' => 'v1/services/{serviceName}/rollouts',
              'httpMethod' => 'GET',
              'parameters' => array(
                'serviceName' => array(
                  'location' => 'path',
                  'type' => 'string',
                  'required' => true,
                ),
                'pageToken' => array(
                  'location' => 'query',
                  'type' => 'string',
                ),
                'pageSize' => array(
                  'location' => 'query',
                  'type' => 'integer',
                ),
                'filter' => array(
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
