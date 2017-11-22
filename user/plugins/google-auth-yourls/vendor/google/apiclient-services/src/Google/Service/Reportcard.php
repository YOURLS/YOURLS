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
 * Service definition for Reportcard (v1).
 *
 * <p>
 * Reportcard is an internal tool for serving non-critical notices to engineers
 * and application developers.</p>
 *
 * <p>
 * For more information about this service, see the API
 * <a href="http://goto.google.com/reportcard" target="_blank">Documentation</a>
 * </p>
 *
 * @author Google, Inc.
 */
class Google_Service_Reportcard extends Google_Service
{


  public $mutes;
  public $notices;
  
  /**
   * Constructs the internal representation of the Reportcard service.
   *
   * @param Google_Client $client
   */
  public function __construct(Google_Client $client)
  {
    parent::__construct($client);
    $this->rootUrl = 'https://www.googleapis.com/';
    $this->servicePath = 'reportcard/v1/';
    $this->version = 'v1';
    $this->serviceName = 'reportcard';

    $this->mutes = new Google_Service_Reportcard_Resource_Mutes(
        $this,
        $this->serviceName,
        'mutes',
        array(
          'methods' => array(
            'delete' => array(
              'path' => 'mutes/{mutesId}',
              'httpMethod' => 'DELETE',
              'parameters' => array(
                'mutesId' => array(
                  'location' => 'path',
                  'type' => 'string',
                  'required' => true,
                ),
              ),
            ),'get' => array(
              'path' => 'mutes/{mutesId}',
              'httpMethod' => 'GET',
              'parameters' => array(
                'mutesId' => array(
                  'location' => 'path',
                  'type' => 'string',
                  'required' => true,
                ),
              ),
            ),'insert' => array(
              'path' => 'mutes',
              'httpMethod' => 'POST',
              'parameters' => array(),
            ),'list' => array(
              'path' => 'mutes',
              'httpMethod' => 'GET',
              'parameters' => array(
                'consumer' => array(
                  'location' => 'query',
                  'type' => 'string',
                ),
                'groupKey' => array(
                  'location' => 'query',
                  'type' => 'string',
                ),
                'sourceKey' => array(
                  'location' => 'query',
                  'type' => 'string',
                ),
                'supplier' => array(
                  'location' => 'query',
                  'type' => 'string',
                ),
              ),
            ),'patch' => array(
              'path' => 'mutes/{mutesId}',
              'httpMethod' => 'PATCH',
              'parameters' => array(
                'mutesId' => array(
                  'location' => 'path',
                  'type' => 'string',
                  'required' => true,
                ),
              ),
            ),'update' => array(
              'path' => 'mutes/{mutesId}',
              'httpMethod' => 'PUT',
              'parameters' => array(
                'mutesId' => array(
                  'location' => 'path',
                  'type' => 'string',
                  'required' => true,
                ),
              ),
            ),
          )
        )
    );
    $this->notices = new Google_Service_Reportcard_Resource_Notices(
        $this,
        $this->serviceName,
        'notices',
        array(
          'methods' => array(
            'delete' => array(
              'path' => 'notices/{noticesId}',
              'httpMethod' => 'DELETE',
              'parameters' => array(
                'noticesId' => array(
                  'location' => 'path',
                  'type' => 'string',
                  'required' => true,
                ),
              ),
            ),'get' => array(
              'path' => 'notices/{noticesId}',
              'httpMethod' => 'GET',
              'parameters' => array(
                'noticesId' => array(
                  'location' => 'path',
                  'type' => 'string',
                  'required' => true,
                ),
              ),
            ),'insert' => array(
              'path' => 'notices',
              'httpMethod' => 'POST',
              'parameters' => array(),
            ),'list' => array(
              'path' => 'notices',
              'httpMethod' => 'GET',
              'parameters' => array(
                'consumer' => array(
                  'location' => 'query',
                  'type' => 'string',
                  'repeated' => true,
                ),
                'showMuted' => array(
                  'location' => 'query',
                  'type' => 'boolean',
                ),
              ),
            ),'patch' => array(
              'path' => 'notices/{noticesId}',
              'httpMethod' => 'PATCH',
              'parameters' => array(
                'noticesId' => array(
                  'location' => 'path',
                  'type' => 'string',
                  'required' => true,
                ),
              ),
            ),'update' => array(
              'path' => 'notices/{noticesId}',
              'httpMethod' => 'PUT',
              'parameters' => array(
                'noticesId' => array(
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
