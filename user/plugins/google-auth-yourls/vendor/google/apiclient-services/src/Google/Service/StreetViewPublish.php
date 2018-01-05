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
 * Service definition for StreetViewPublish (v1).
 *
 * <p>
 * Publishes 360 photos to Google Maps, along with position, orientation, and
 * connectivity metadata. Apps can offer an interface for positioning,
 * connecting, and uploading user-generated Street View images.</p>
 *
 * <p>
 * For more information about this service, see the API
 * <a href="https://developers.google.com/streetview/publish/" target="_blank">Documentation</a>
 * </p>
 *
 * @author Google, Inc.
 */
class Google_Service_StreetViewPublish extends Google_Service
{
  /** Publish and manage your 360 photos on Google Street View. */
  const STREETVIEWPUBLISH =
      "https://www.googleapis.com/auth/streetviewpublish";

  public $photo;
  public $photos;
  
  /**
   * Constructs the internal representation of the StreetViewPublish service.
   *
   * @param Google_Client $client
   */
  public function __construct(Google_Client $client)
  {
    parent::__construct($client);
    $this->rootUrl = 'https://streetviewpublish.googleapis.com/';
    $this->servicePath = '';
    $this->version = 'v1';
    $this->serviceName = 'streetviewpublish';

    $this->photo = new Google_Service_StreetViewPublish_Resource_Photo(
        $this,
        $this->serviceName,
        'photo',
        array(
          'methods' => array(
            'create' => array(
              'path' => 'v1/photo',
              'httpMethod' => 'POST',
              'parameters' => array(),
            ),'delete' => array(
              'path' => 'v1/photo/{photoId}',
              'httpMethod' => 'DELETE',
              'parameters' => array(
                'photoId' => array(
                  'location' => 'path',
                  'type' => 'string',
                  'required' => true,
                ),
              ),
            ),'get' => array(
              'path' => 'v1/photo/{photoId}',
              'httpMethod' => 'GET',
              'parameters' => array(
                'photoId' => array(
                  'location' => 'path',
                  'type' => 'string',
                  'required' => true,
                ),
                'view' => array(
                  'location' => 'query',
                  'type' => 'string',
                ),
              ),
            ),'startUpload' => array(
              'path' => 'v1/photo:startUpload',
              'httpMethod' => 'POST',
              'parameters' => array(),
            ),'update' => array(
              'path' => 'v1/photo/{id}',
              'httpMethod' => 'PUT',
              'parameters' => array(
                'id' => array(
                  'location' => 'path',
                  'type' => 'string',
                  'required' => true,
                ),
                'updateMask' => array(
                  'location' => 'query',
                  'type' => 'string',
                ),
              ),
            ),
          )
        )
    );
    $this->photos = new Google_Service_StreetViewPublish_Resource_Photos(
        $this,
        $this->serviceName,
        'photos',
        array(
          'methods' => array(
            'batchDelete' => array(
              'path' => 'v1/photos:batchDelete',
              'httpMethod' => 'POST',
              'parameters' => array(),
            ),'batchGet' => array(
              'path' => 'v1/photos:batchGet',
              'httpMethod' => 'GET',
              'parameters' => array(
                'photoIds' => array(
                  'location' => 'query',
                  'type' => 'string',
                  'repeated' => true,
                ),
                'view' => array(
                  'location' => 'query',
                  'type' => 'string',
                ),
              ),
            ),'batchUpdate' => array(
              'path' => 'v1/photos:batchUpdate',
              'httpMethod' => 'POST',
              'parameters' => array(),
            ),'list' => array(
              'path' => 'v1/photos',
              'httpMethod' => 'GET',
              'parameters' => array(
                'pageToken' => array(
                  'location' => 'query',
                  'type' => 'string',
                ),
                'pageSize' => array(
                  'location' => 'query',
                  'type' => 'integer',
                ),
                'view' => array(
                  'location' => 'query',
                  'type' => 'string',
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
