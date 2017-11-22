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
 * Service definition for Proximitybeacon (v1beta1).
 *
 * <p>
 * Registers, manages, indexes, and searches beacons.</p>
 *
 * <p>
 * For more information about this service, see the API
 * <a href="https://developers.google.com/beacons/proximity/" target="_blank">Documentation</a>
 * </p>
 *
 * @author Google, Inc.
 */
class Google_Service_Proximitybeacon extends Google_Service
{
  /** View and modify your beacons. */
  const USERLOCATION_BEACON_REGISTRY =
      "https://www.googleapis.com/auth/userlocation.beacon.registry";

  public $beaconinfo;
  public $beacons;
  public $beacons_attachments;
  public $beacons_diagnostics;
  public $namespaces;
  public $v1beta1;
  
  /**
   * Constructs the internal representation of the Proximitybeacon service.
   *
   * @param Google_Client $client
   */
  public function __construct(Google_Client $client)
  {
    parent::__construct($client);
    $this->rootUrl = 'https://proximitybeacon.googleapis.com/';
    $this->servicePath = '';
    $this->version = 'v1beta1';
    $this->serviceName = 'proximitybeacon';

    $this->beaconinfo = new Google_Service_Proximitybeacon_Resource_Beaconinfo(
        $this,
        $this->serviceName,
        'beaconinfo',
        array(
          'methods' => array(
            'getforobserved' => array(
              'path' => 'v1beta1/beaconinfo:getforobserved',
              'httpMethod' => 'POST',
              'parameters' => array(),
            ),
          )
        )
    );
    $this->beacons = new Google_Service_Proximitybeacon_Resource_Beacons(
        $this,
        $this->serviceName,
        'beacons',
        array(
          'methods' => array(
            'activate' => array(
              'path' => 'v1beta1/{+beaconName}:activate',
              'httpMethod' => 'POST',
              'parameters' => array(
                'beaconName' => array(
                  'location' => 'path',
                  'type' => 'string',
                  'required' => true,
                ),
                'projectId' => array(
                  'location' => 'query',
                  'type' => 'string',
                ),
              ),
            ),'deactivate' => array(
              'path' => 'v1beta1/{+beaconName}:deactivate',
              'httpMethod' => 'POST',
              'parameters' => array(
                'beaconName' => array(
                  'location' => 'path',
                  'type' => 'string',
                  'required' => true,
                ),
                'projectId' => array(
                  'location' => 'query',
                  'type' => 'string',
                ),
              ),
            ),'decommission' => array(
              'path' => 'v1beta1/{+beaconName}:decommission',
              'httpMethod' => 'POST',
              'parameters' => array(
                'beaconName' => array(
                  'location' => 'path',
                  'type' => 'string',
                  'required' => true,
                ),
                'projectId' => array(
                  'location' => 'query',
                  'type' => 'string',
                ),
              ),
            ),'delete' => array(
              'path' => 'v1beta1/{+beaconName}',
              'httpMethod' => 'DELETE',
              'parameters' => array(
                'beaconName' => array(
                  'location' => 'path',
                  'type' => 'string',
                  'required' => true,
                ),
                'projectId' => array(
                  'location' => 'query',
                  'type' => 'string',
                ),
              ),
            ),'get' => array(
              'path' => 'v1beta1/{+beaconName}',
              'httpMethod' => 'GET',
              'parameters' => array(
                'beaconName' => array(
                  'location' => 'path',
                  'type' => 'string',
                  'required' => true,
                ),
                'projectId' => array(
                  'location' => 'query',
                  'type' => 'string',
                ),
              ),
            ),'list' => array(
              'path' => 'v1beta1/beacons',
              'httpMethod' => 'GET',
              'parameters' => array(
                'pageToken' => array(
                  'location' => 'query',
                  'type' => 'string',
                ),
                'q' => array(
                  'location' => 'query',
                  'type' => 'string',
                ),
                'pageSize' => array(
                  'location' => 'query',
                  'type' => 'integer',
                ),
                'projectId' => array(
                  'location' => 'query',
                  'type' => 'string',
                ),
              ),
            ),'register' => array(
              'path' => 'v1beta1/beacons:register',
              'httpMethod' => 'POST',
              'parameters' => array(
                'projectId' => array(
                  'location' => 'query',
                  'type' => 'string',
                ),
              ),
            ),'update' => array(
              'path' => 'v1beta1/{+beaconName}',
              'httpMethod' => 'PUT',
              'parameters' => array(
                'beaconName' => array(
                  'location' => 'path',
                  'type' => 'string',
                  'required' => true,
                ),
                'projectId' => array(
                  'location' => 'query',
                  'type' => 'string',
                ),
              ),
            ),
          )
        )
    );
    $this->beacons_attachments = new Google_Service_Proximitybeacon_Resource_BeaconsAttachments(
        $this,
        $this->serviceName,
        'attachments',
        array(
          'methods' => array(
            'batchDelete' => array(
              'path' => 'v1beta1/{+beaconName}/attachments:batchDelete',
              'httpMethod' => 'POST',
              'parameters' => array(
                'beaconName' => array(
                  'location' => 'path',
                  'type' => 'string',
                  'required' => true,
                ),
                'namespacedType' => array(
                  'location' => 'query',
                  'type' => 'string',
                ),
                'projectId' => array(
                  'location' => 'query',
                  'type' => 'string',
                ),
              ),
            ),'create' => array(
              'path' => 'v1beta1/{+beaconName}/attachments',
              'httpMethod' => 'POST',
              'parameters' => array(
                'beaconName' => array(
                  'location' => 'path',
                  'type' => 'string',
                  'required' => true,
                ),
                'projectId' => array(
                  'location' => 'query',
                  'type' => 'string',
                ),
              ),
            ),'delete' => array(
              'path' => 'v1beta1/{+attachmentName}',
              'httpMethod' => 'DELETE',
              'parameters' => array(
                'attachmentName' => array(
                  'location' => 'path',
                  'type' => 'string',
                  'required' => true,
                ),
                'projectId' => array(
                  'location' => 'query',
                  'type' => 'string',
                ),
              ),
            ),'list' => array(
              'path' => 'v1beta1/{+beaconName}/attachments',
              'httpMethod' => 'GET',
              'parameters' => array(
                'beaconName' => array(
                  'location' => 'path',
                  'type' => 'string',
                  'required' => true,
                ),
                'projectId' => array(
                  'location' => 'query',
                  'type' => 'string',
                ),
                'namespacedType' => array(
                  'location' => 'query',
                  'type' => 'string',
                ),
              ),
            ),
          )
        )
    );
    $this->beacons_diagnostics = new Google_Service_Proximitybeacon_Resource_BeaconsDiagnostics(
        $this,
        $this->serviceName,
        'diagnostics',
        array(
          'methods' => array(
            'list' => array(
              'path' => 'v1beta1/{+beaconName}/diagnostics',
              'httpMethod' => 'GET',
              'parameters' => array(
                'beaconName' => array(
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
                'alertFilter' => array(
                  'location' => 'query',
                  'type' => 'string',
                ),
                'projectId' => array(
                  'location' => 'query',
                  'type' => 'string',
                ),
              ),
            ),
          )
        )
    );
    $this->namespaces = new Google_Service_Proximitybeacon_Resource_Namespaces(
        $this,
        $this->serviceName,
        'namespaces',
        array(
          'methods' => array(
            'list' => array(
              'path' => 'v1beta1/namespaces',
              'httpMethod' => 'GET',
              'parameters' => array(
                'projectId' => array(
                  'location' => 'query',
                  'type' => 'string',
                ),
              ),
            ),'update' => array(
              'path' => 'v1beta1/{+namespaceName}',
              'httpMethod' => 'PUT',
              'parameters' => array(
                'namespaceName' => array(
                  'location' => 'path',
                  'type' => 'string',
                  'required' => true,
                ),
                'projectId' => array(
                  'location' => 'query',
                  'type' => 'string',
                ),
              ),
            ),
          )
        )
    );
    $this->v1beta1 = new Google_Service_Proximitybeacon_Resource_V1beta1(
        $this,
        $this->serviceName,
        'v1beta1',
        array(
          'methods' => array(
            'getEidparams' => array(
              'path' => 'v1beta1/eidparams',
              'httpMethod' => 'GET',
              'parameters' => array(),
            ),
          )
        )
    );
  }
}
