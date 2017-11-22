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
 * Service definition for AndroidProvisioningPartner (v1).
 *
 * <p>
 * Automates reseller integration into zero-touch enrollment by assigning
 * devices to customers and creating device reports.</p>
 *
 * <p>
 * For more information about this service, see the API
 * <a href="https://developers.google.com/zero-touch/" target="_blank">Documentation</a>
 * </p>
 *
 * @author Google, Inc.
 */
class Google_Service_AndroidProvisioningPartner extends Google_Service
{


  public $operations;
  public $partners_customers;
  public $partners_devices;
  
  /**
   * Constructs the internal representation of the AndroidProvisioningPartner
   * service.
   *
   * @param Google_Client $client
   */
  public function __construct(Google_Client $client)
  {
    parent::__construct($client);
    $this->rootUrl = 'https://androiddeviceprovisioning.googleapis.com/';
    $this->servicePath = '';
    $this->version = 'v1';
    $this->serviceName = 'androiddeviceprovisioning';

    $this->operations = new Google_Service_AndroidProvisioningPartner_Resource_Operations(
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
            ),
          )
        )
    );
    $this->partners_customers = new Google_Service_AndroidProvisioningPartner_Resource_PartnersCustomers(
        $this,
        $this->serviceName,
        'customers',
        array(
          'methods' => array(
            'create' => array(
              'path' => 'v1/{+parent}/customers',
              'httpMethod' => 'POST',
              'parameters' => array(
                'parent' => array(
                  'location' => 'path',
                  'type' => 'string',
                  'required' => true,
                ),
              ),
            ),'list' => array(
              'path' => 'v1/partners/{+partnerId}/customers',
              'httpMethod' => 'GET',
              'parameters' => array(
                'partnerId' => array(
                  'location' => 'path',
                  'type' => 'string',
                  'required' => true,
                ),
              ),
            ),
          )
        )
    );
    $this->partners_devices = new Google_Service_AndroidProvisioningPartner_Resource_PartnersDevices(
        $this,
        $this->serviceName,
        'devices',
        array(
          'methods' => array(
            'claim' => array(
              'path' => 'v1/partners/{+partnerId}/devices:claim',
              'httpMethod' => 'POST',
              'parameters' => array(
                'partnerId' => array(
                  'location' => 'path',
                  'type' => 'string',
                  'required' => true,
                ),
              ),
            ),'claimAsync' => array(
              'path' => 'v1/partners/{+partnerId}/devices:claimAsync',
              'httpMethod' => 'POST',
              'parameters' => array(
                'partnerId' => array(
                  'location' => 'path',
                  'type' => 'string',
                  'required' => true,
                ),
              ),
            ),'findByIdentifier' => array(
              'path' => 'v1/partners/{+partnerId}/devices:findByIdentifier',
              'httpMethod' => 'POST',
              'parameters' => array(
                'partnerId' => array(
                  'location' => 'path',
                  'type' => 'string',
                  'required' => true,
                ),
              ),
            ),'findByOwner' => array(
              'path' => 'v1/partners/{+partnerId}/devices:findByOwner',
              'httpMethod' => 'POST',
              'parameters' => array(
                'partnerId' => array(
                  'location' => 'path',
                  'type' => 'string',
                  'required' => true,
                ),
              ),
            ),'get' => array(
              'path' => 'v1/{+name}',
              'httpMethod' => 'GET',
              'parameters' => array(
                'name' => array(
                  'location' => 'path',
                  'type' => 'string',
                  'required' => true,
                ),
              ),
            ),'metadata' => array(
              'path' => 'v1/partners/{+metadataOwnerId}/devices/{+deviceId}/metadata',
              'httpMethod' => 'POST',
              'parameters' => array(
                'metadataOwnerId' => array(
                  'location' => 'path',
                  'type' => 'string',
                  'required' => true,
                ),
                'deviceId' => array(
                  'location' => 'path',
                  'type' => 'string',
                  'required' => true,
                ),
              ),
            ),'unclaim' => array(
              'path' => 'v1/partners/{+partnerId}/devices:unclaim',
              'httpMethod' => 'POST',
              'parameters' => array(
                'partnerId' => array(
                  'location' => 'path',
                  'type' => 'string',
                  'required' => true,
                ),
              ),
            ),'unclaimAsync' => array(
              'path' => 'v1/partners/{+partnerId}/devices:unclaimAsync',
              'httpMethod' => 'POST',
              'parameters' => array(
                'partnerId' => array(
                  'location' => 'path',
                  'type' => 'string',
                  'required' => true,
                ),
              ),
            ),'updateMetadataAsync' => array(
              'path' => 'v1/partners/{+partnerId}/devices:updateMetadataAsync',
              'httpMethod' => 'POST',
              'parameters' => array(
                'partnerId' => array(
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
