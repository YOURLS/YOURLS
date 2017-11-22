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
 * Service definition for Storage (v1).
 *
 * <p>
 * Stores and retrieves potentially large, immutable data objects.</p>
 *
 * <p>
 * For more information about this service, see the API
 * <a href="https://developers.google.com/storage/docs/json_api/" target="_blank">Documentation</a>
 * </p>
 *
 * @author Google, Inc.
 */
class Google_Service_Storage extends Google_Service
{
  /** View and manage your data across Google Cloud Platform services. */
  const CLOUD_PLATFORM =
      "https://www.googleapis.com/auth/cloud-platform";
  /** View your data across Google Cloud Platform services. */
  const CLOUD_PLATFORM_READ_ONLY =
      "https://www.googleapis.com/auth/cloud-platform.read-only";
  /** Manage your data and permissions in Google Cloud Storage. */
  const DEVSTORAGE_FULL_CONTROL =
      "https://www.googleapis.com/auth/devstorage.full_control";
  /** View your data in Google Cloud Storage. */
  const DEVSTORAGE_READ_ONLY =
      "https://www.googleapis.com/auth/devstorage.read_only";
  /** Manage your data in Google Cloud Storage. */
  const DEVSTORAGE_READ_WRITE =
      "https://www.googleapis.com/auth/devstorage.read_write";

  public $bucketAccessControls;
  public $buckets;
  public $channels;
  public $defaultObjectAccessControls;
  public $notifications;
  public $objectAccessControls;
  public $objects;
  public $projects_serviceAccount;
  
  /**
   * Constructs the internal representation of the Storage service.
   *
   * @param Google_Client $client
   */
  public function __construct(Google_Client $client)
  {
    parent::__construct($client);
    $this->rootUrl = 'https://www.googleapis.com/';
    $this->servicePath = 'storage/v1/';
    $this->version = 'v1';
    $this->serviceName = 'storage';

    $this->bucketAccessControls = new Google_Service_Storage_Resource_BucketAccessControls(
        $this,
        $this->serviceName,
        'bucketAccessControls',
        array(
          'methods' => array(
            'delete' => array(
              'path' => 'b/{bucket}/acl/{entity}',
              'httpMethod' => 'DELETE',
              'parameters' => array(
                'bucket' => array(
                  'location' => 'path',
                  'type' => 'string',
                  'required' => true,
                ),
                'entity' => array(
                  'location' => 'path',
                  'type' => 'string',
                  'required' => true,
                ),
                'userProject' => array(
                  'location' => 'query',
                  'type' => 'string',
                ),
              ),
            ),'get' => array(
              'path' => 'b/{bucket}/acl/{entity}',
              'httpMethod' => 'GET',
              'parameters' => array(
                'bucket' => array(
                  'location' => 'path',
                  'type' => 'string',
                  'required' => true,
                ),
                'entity' => array(
                  'location' => 'path',
                  'type' => 'string',
                  'required' => true,
                ),
                'userProject' => array(
                  'location' => 'query',
                  'type' => 'string',
                ),
              ),
            ),'insert' => array(
              'path' => 'b/{bucket}/acl',
              'httpMethod' => 'POST',
              'parameters' => array(
                'bucket' => array(
                  'location' => 'path',
                  'type' => 'string',
                  'required' => true,
                ),
                'userProject' => array(
                  'location' => 'query',
                  'type' => 'string',
                ),
              ),
            ),'list' => array(
              'path' => 'b/{bucket}/acl',
              'httpMethod' => 'GET',
              'parameters' => array(
                'bucket' => array(
                  'location' => 'path',
                  'type' => 'string',
                  'required' => true,
                ),
                'userProject' => array(
                  'location' => 'query',
                  'type' => 'string',
                ),
              ),
            ),'patch' => array(
              'path' => 'b/{bucket}/acl/{entity}',
              'httpMethod' => 'PATCH',
              'parameters' => array(
                'bucket' => array(
                  'location' => 'path',
                  'type' => 'string',
                  'required' => true,
                ),
                'entity' => array(
                  'location' => 'path',
                  'type' => 'string',
                  'required' => true,
                ),
                'userProject' => array(
                  'location' => 'query',
                  'type' => 'string',
                ),
              ),
            ),'update' => array(
              'path' => 'b/{bucket}/acl/{entity}',
              'httpMethod' => 'PUT',
              'parameters' => array(
                'bucket' => array(
                  'location' => 'path',
                  'type' => 'string',
                  'required' => true,
                ),
                'entity' => array(
                  'location' => 'path',
                  'type' => 'string',
                  'required' => true,
                ),
                'userProject' => array(
                  'location' => 'query',
                  'type' => 'string',
                ),
              ),
            ),
          )
        )
    );
    $this->buckets = new Google_Service_Storage_Resource_Buckets(
        $this,
        $this->serviceName,
        'buckets',
        array(
          'methods' => array(
            'delete' => array(
              'path' => 'b/{bucket}',
              'httpMethod' => 'DELETE',
              'parameters' => array(
                'bucket' => array(
                  'location' => 'path',
                  'type' => 'string',
                  'required' => true,
                ),
                'ifMetagenerationMatch' => array(
                  'location' => 'query',
                  'type' => 'string',
                ),
                'ifMetagenerationNotMatch' => array(
                  'location' => 'query',
                  'type' => 'string',
                ),
                'userProject' => array(
                  'location' => 'query',
                  'type' => 'string',
                ),
              ),
            ),'get' => array(
              'path' => 'b/{bucket}',
              'httpMethod' => 'GET',
              'parameters' => array(
                'bucket' => array(
                  'location' => 'path',
                  'type' => 'string',
                  'required' => true,
                ),
                'ifMetagenerationMatch' => array(
                  'location' => 'query',
                  'type' => 'string',
                ),
                'ifMetagenerationNotMatch' => array(
                  'location' => 'query',
                  'type' => 'string',
                ),
                'projection' => array(
                  'location' => 'query',
                  'type' => 'string',
                ),
                'userProject' => array(
                  'location' => 'query',
                  'type' => 'string',
                ),
              ),
            ),'getIamPolicy' => array(
              'path' => 'b/{bucket}/iam',
              'httpMethod' => 'GET',
              'parameters' => array(
                'bucket' => array(
                  'location' => 'path',
                  'type' => 'string',
                  'required' => true,
                ),
                'userProject' => array(
                  'location' => 'query',
                  'type' => 'string',
                ),
              ),
            ),'insert' => array(
              'path' => 'b',
              'httpMethod' => 'POST',
              'parameters' => array(
                'project' => array(
                  'location' => 'query',
                  'type' => 'string',
                  'required' => true,
                ),
                'predefinedAcl' => array(
                  'location' => 'query',
                  'type' => 'string',
                ),
                'predefinedDefaultObjectAcl' => array(
                  'location' => 'query',
                  'type' => 'string',
                ),
                'projection' => array(
                  'location' => 'query',
                  'type' => 'string',
                ),
                'userProject' => array(
                  'location' => 'query',
                  'type' => 'string',
                ),
              ),
            ),'list' => array(
              'path' => 'b',
              'httpMethod' => 'GET',
              'parameters' => array(
                'project' => array(
                  'location' => 'query',
                  'type' => 'string',
                  'required' => true,
                ),
                'maxResults' => array(
                  'location' => 'query',
                  'type' => 'integer',
                ),
                'pageToken' => array(
                  'location' => 'query',
                  'type' => 'string',
                ),
                'prefix' => array(
                  'location' => 'query',
                  'type' => 'string',
                ),
                'projection' => array(
                  'location' => 'query',
                  'type' => 'string',
                ),
                'userProject' => array(
                  'location' => 'query',
                  'type' => 'string',
                ),
              ),
            ),'patch' => array(
              'path' => 'b/{bucket}',
              'httpMethod' => 'PATCH',
              'parameters' => array(
                'bucket' => array(
                  'location' => 'path',
                  'type' => 'string',
                  'required' => true,
                ),
                'ifMetagenerationMatch' => array(
                  'location' => 'query',
                  'type' => 'string',
                ),
                'ifMetagenerationNotMatch' => array(
                  'location' => 'query',
                  'type' => 'string',
                ),
                'predefinedAcl' => array(
                  'location' => 'query',
                  'type' => 'string',
                ),
                'predefinedDefaultObjectAcl' => array(
                  'location' => 'query',
                  'type' => 'string',
                ),
                'projection' => array(
                  'location' => 'query',
                  'type' => 'string',
                ),
                'userProject' => array(
                  'location' => 'query',
                  'type' => 'string',
                ),
              ),
            ),'setIamPolicy' => array(
              'path' => 'b/{bucket}/iam',
              'httpMethod' => 'PUT',
              'parameters' => array(
                'bucket' => array(
                  'location' => 'path',
                  'type' => 'string',
                  'required' => true,
                ),
                'userProject' => array(
                  'location' => 'query',
                  'type' => 'string',
                ),
              ),
            ),'testIamPermissions' => array(
              'path' => 'b/{bucket}/iam/testPermissions',
              'httpMethod' => 'GET',
              'parameters' => array(
                'bucket' => array(
                  'location' => 'path',
                  'type' => 'string',
                  'required' => true,
                ),
                'permissions' => array(
                  'location' => 'query',
                  'type' => 'string',
                  'repeated' => true,
                  'required' => true,
                ),
                'userProject' => array(
                  'location' => 'query',
                  'type' => 'string',
                ),
              ),
            ),'update' => array(
              'path' => 'b/{bucket}',
              'httpMethod' => 'PUT',
              'parameters' => array(
                'bucket' => array(
                  'location' => 'path',
                  'type' => 'string',
                  'required' => true,
                ),
                'ifMetagenerationMatch' => array(
                  'location' => 'query',
                  'type' => 'string',
                ),
                'ifMetagenerationNotMatch' => array(
                  'location' => 'query',
                  'type' => 'string',
                ),
                'predefinedAcl' => array(
                  'location' => 'query',
                  'type' => 'string',
                ),
                'predefinedDefaultObjectAcl' => array(
                  'location' => 'query',
                  'type' => 'string',
                ),
                'projection' => array(
                  'location' => 'query',
                  'type' => 'string',
                ),
                'userProject' => array(
                  'location' => 'query',
                  'type' => 'string',
                ),
              ),
            ),
          )
        )
    );
    $this->channels = new Google_Service_Storage_Resource_Channels(
        $this,
        $this->serviceName,
        'channels',
        array(
          'methods' => array(
            'stop' => array(
              'path' => 'channels/stop',
              'httpMethod' => 'POST',
              'parameters' => array(),
            ),
          )
        )
    );
    $this->defaultObjectAccessControls = new Google_Service_Storage_Resource_DefaultObjectAccessControls(
        $this,
        $this->serviceName,
        'defaultObjectAccessControls',
        array(
          'methods' => array(
            'delete' => array(
              'path' => 'b/{bucket}/defaultObjectAcl/{entity}',
              'httpMethod' => 'DELETE',
              'parameters' => array(
                'bucket' => array(
                  'location' => 'path',
                  'type' => 'string',
                  'required' => true,
                ),
                'entity' => array(
                  'location' => 'path',
                  'type' => 'string',
                  'required' => true,
                ),
                'userProject' => array(
                  'location' => 'query',
                  'type' => 'string',
                ),
              ),
            ),'get' => array(
              'path' => 'b/{bucket}/defaultObjectAcl/{entity}',
              'httpMethod' => 'GET',
              'parameters' => array(
                'bucket' => array(
                  'location' => 'path',
                  'type' => 'string',
                  'required' => true,
                ),
                'entity' => array(
                  'location' => 'path',
                  'type' => 'string',
                  'required' => true,
                ),
                'userProject' => array(
                  'location' => 'query',
                  'type' => 'string',
                ),
              ),
            ),'insert' => array(
              'path' => 'b/{bucket}/defaultObjectAcl',
              'httpMethod' => 'POST',
              'parameters' => array(
                'bucket' => array(
                  'location' => 'path',
                  'type' => 'string',
                  'required' => true,
                ),
                'userProject' => array(
                  'location' => 'query',
                  'type' => 'string',
                ),
              ),
            ),'list' => array(
              'path' => 'b/{bucket}/defaultObjectAcl',
              'httpMethod' => 'GET',
              'parameters' => array(
                'bucket' => array(
                  'location' => 'path',
                  'type' => 'string',
                  'required' => true,
                ),
                'ifMetagenerationMatch' => array(
                  'location' => 'query',
                  'type' => 'string',
                ),
                'ifMetagenerationNotMatch' => array(
                  'location' => 'query',
                  'type' => 'string',
                ),
                'userProject' => array(
                  'location' => 'query',
                  'type' => 'string',
                ),
              ),
            ),'patch' => array(
              'path' => 'b/{bucket}/defaultObjectAcl/{entity}',
              'httpMethod' => 'PATCH',
              'parameters' => array(
                'bucket' => array(
                  'location' => 'path',
                  'type' => 'string',
                  'required' => true,
                ),
                'entity' => array(
                  'location' => 'path',
                  'type' => 'string',
                  'required' => true,
                ),
                'userProject' => array(
                  'location' => 'query',
                  'type' => 'string',
                ),
              ),
            ),'update' => array(
              'path' => 'b/{bucket}/defaultObjectAcl/{entity}',
              'httpMethod' => 'PUT',
              'parameters' => array(
                'bucket' => array(
                  'location' => 'path',
                  'type' => 'string',
                  'required' => true,
                ),
                'entity' => array(
                  'location' => 'path',
                  'type' => 'string',
                  'required' => true,
                ),
                'userProject' => array(
                  'location' => 'query',
                  'type' => 'string',
                ),
              ),
            ),
          )
        )
    );
    $this->notifications = new Google_Service_Storage_Resource_Notifications(
        $this,
        $this->serviceName,
        'notifications',
        array(
          'methods' => array(
            'delete' => array(
              'path' => 'b/{bucket}/notificationConfigs/{notification}',
              'httpMethod' => 'DELETE',
              'parameters' => array(
                'bucket' => array(
                  'location' => 'path',
                  'type' => 'string',
                  'required' => true,
                ),
                'notification' => array(
                  'location' => 'path',
                  'type' => 'string',
                  'required' => true,
                ),
                'userProject' => array(
                  'location' => 'query',
                  'type' => 'string',
                ),
              ),
            ),'get' => array(
              'path' => 'b/{bucket}/notificationConfigs/{notification}',
              'httpMethod' => 'GET',
              'parameters' => array(
                'bucket' => array(
                  'location' => 'path',
                  'type' => 'string',
                  'required' => true,
                ),
                'notification' => array(
                  'location' => 'path',
                  'type' => 'string',
                  'required' => true,
                ),
                'userProject' => array(
                  'location' => 'query',
                  'type' => 'string',
                ),
              ),
            ),'insert' => array(
              'path' => 'b/{bucket}/notificationConfigs',
              'httpMethod' => 'POST',
              'parameters' => array(
                'bucket' => array(
                  'location' => 'path',
                  'type' => 'string',
                  'required' => true,
                ),
                'userProject' => array(
                  'location' => 'query',
                  'type' => 'string',
                ),
              ),
            ),'list' => array(
              'path' => 'b/{bucket}/notificationConfigs',
              'httpMethod' => 'GET',
              'parameters' => array(
                'bucket' => array(
                  'location' => 'path',
                  'type' => 'string',
                  'required' => true,
                ),
                'userProject' => array(
                  'location' => 'query',
                  'type' => 'string',
                ),
              ),
            ),
          )
        )
    );
    $this->objectAccessControls = new Google_Service_Storage_Resource_ObjectAccessControls(
        $this,
        $this->serviceName,
        'objectAccessControls',
        array(
          'methods' => array(
            'delete' => array(
              'path' => 'b/{bucket}/o/{object}/acl/{entity}',
              'httpMethod' => 'DELETE',
              'parameters' => array(
                'bucket' => array(
                  'location' => 'path',
                  'type' => 'string',
                  'required' => true,
                ),
                'object' => array(
                  'location' => 'path',
                  'type' => 'string',
                  'required' => true,
                ),
                'entity' => array(
                  'location' => 'path',
                  'type' => 'string',
                  'required' => true,
                ),
                'generation' => array(
                  'location' => 'query',
                  'type' => 'string',
                ),
                'userProject' => array(
                  'location' => 'query',
                  'type' => 'string',
                ),
              ),
            ),'get' => array(
              'path' => 'b/{bucket}/o/{object}/acl/{entity}',
              'httpMethod' => 'GET',
              'parameters' => array(
                'bucket' => array(
                  'location' => 'path',
                  'type' => 'string',
                  'required' => true,
                ),
                'object' => array(
                  'location' => 'path',
                  'type' => 'string',
                  'required' => true,
                ),
                'entity' => array(
                  'location' => 'path',
                  'type' => 'string',
                  'required' => true,
                ),
                'generation' => array(
                  'location' => 'query',
                  'type' => 'string',
                ),
                'userProject' => array(
                  'location' => 'query',
                  'type' => 'string',
                ),
              ),
            ),'insert' => array(
              'path' => 'b/{bucket}/o/{object}/acl',
              'httpMethod' => 'POST',
              'parameters' => array(
                'bucket' => array(
                  'location' => 'path',
                  'type' => 'string',
                  'required' => true,
                ),
                'object' => array(
                  'location' => 'path',
                  'type' => 'string',
                  'required' => true,
                ),
                'generation' => array(
                  'location' => 'query',
                  'type' => 'string',
                ),
                'userProject' => array(
                  'location' => 'query',
                  'type' => 'string',
                ),
              ),
            ),'list' => array(
              'path' => 'b/{bucket}/o/{object}/acl',
              'httpMethod' => 'GET',
              'parameters' => array(
                'bucket' => array(
                  'location' => 'path',
                  'type' => 'string',
                  'required' => true,
                ),
                'object' => array(
                  'location' => 'path',
                  'type' => 'string',
                  'required' => true,
                ),
                'generation' => array(
                  'location' => 'query',
                  'type' => 'string',
                ),
                'userProject' => array(
                  'location' => 'query',
                  'type' => 'string',
                ),
              ),
            ),'patch' => array(
              'path' => 'b/{bucket}/o/{object}/acl/{entity}',
              'httpMethod' => 'PATCH',
              'parameters' => array(
                'bucket' => array(
                  'location' => 'path',
                  'type' => 'string',
                  'required' => true,
                ),
                'object' => array(
                  'location' => 'path',
                  'type' => 'string',
                  'required' => true,
                ),
                'entity' => array(
                  'location' => 'path',
                  'type' => 'string',
                  'required' => true,
                ),
                'generation' => array(
                  'location' => 'query',
                  'type' => 'string',
                ),
                'userProject' => array(
                  'location' => 'query',
                  'type' => 'string',
                ),
              ),
            ),'update' => array(
              'path' => 'b/{bucket}/o/{object}/acl/{entity}',
              'httpMethod' => 'PUT',
              'parameters' => array(
                'bucket' => array(
                  'location' => 'path',
                  'type' => 'string',
                  'required' => true,
                ),
                'object' => array(
                  'location' => 'path',
                  'type' => 'string',
                  'required' => true,
                ),
                'entity' => array(
                  'location' => 'path',
                  'type' => 'string',
                  'required' => true,
                ),
                'generation' => array(
                  'location' => 'query',
                  'type' => 'string',
                ),
                'userProject' => array(
                  'location' => 'query',
                  'type' => 'string',
                ),
              ),
            ),
          )
        )
    );
    $this->objects = new Google_Service_Storage_Resource_Objects(
        $this,
        $this->serviceName,
        'objects',
        array(
          'methods' => array(
            'compose' => array(
              'path' => 'b/{destinationBucket}/o/{destinationObject}/compose',
              'httpMethod' => 'POST',
              'parameters' => array(
                'destinationBucket' => array(
                  'location' => 'path',
                  'type' => 'string',
                  'required' => true,
                ),
                'destinationObject' => array(
                  'location' => 'path',
                  'type' => 'string',
                  'required' => true,
                ),
                'destinationPredefinedAcl' => array(
                  'location' => 'query',
                  'type' => 'string',
                ),
                'ifGenerationMatch' => array(
                  'location' => 'query',
                  'type' => 'string',
                ),
                'ifMetagenerationMatch' => array(
                  'location' => 'query',
                  'type' => 'string',
                ),
                'kmsKeyName' => array(
                  'location' => 'query',
                  'type' => 'string',
                ),
                'userProject' => array(
                  'location' => 'query',
                  'type' => 'string',
                ),
              ),
            ),'copy' => array(
              'path' => 'b/{sourceBucket}/o/{sourceObject}/copyTo/b/{destinationBucket}/o/{destinationObject}',
              'httpMethod' => 'POST',
              'parameters' => array(
                'sourceBucket' => array(
                  'location' => 'path',
                  'type' => 'string',
                  'required' => true,
                ),
                'sourceObject' => array(
                  'location' => 'path',
                  'type' => 'string',
                  'required' => true,
                ),
                'destinationBucket' => array(
                  'location' => 'path',
                  'type' => 'string',
                  'required' => true,
                ),
                'destinationObject' => array(
                  'location' => 'path',
                  'type' => 'string',
                  'required' => true,
                ),
                'destinationPredefinedAcl' => array(
                  'location' => 'query',
                  'type' => 'string',
                ),
                'ifGenerationMatch' => array(
                  'location' => 'query',
                  'type' => 'string',
                ),
                'ifGenerationNotMatch' => array(
                  'location' => 'query',
                  'type' => 'string',
                ),
                'ifMetagenerationMatch' => array(
                  'location' => 'query',
                  'type' => 'string',
                ),
                'ifMetagenerationNotMatch' => array(
                  'location' => 'query',
                  'type' => 'string',
                ),
                'ifSourceGenerationMatch' => array(
                  'location' => 'query',
                  'type' => 'string',
                ),
                'ifSourceGenerationNotMatch' => array(
                  'location' => 'query',
                  'type' => 'string',
                ),
                'ifSourceMetagenerationMatch' => array(
                  'location' => 'query',
                  'type' => 'string',
                ),
                'ifSourceMetagenerationNotMatch' => array(
                  'location' => 'query',
                  'type' => 'string',
                ),
                'projection' => array(
                  'location' => 'query',
                  'type' => 'string',
                ),
                'sourceGeneration' => array(
                  'location' => 'query',
                  'type' => 'string',
                ),
                'userProject' => array(
                  'location' => 'query',
                  'type' => 'string',
                ),
              ),
            ),'delete' => array(
              'path' => 'b/{bucket}/o/{object}',
              'httpMethod' => 'DELETE',
              'parameters' => array(
                'bucket' => array(
                  'location' => 'path',
                  'type' => 'string',
                  'required' => true,
                ),
                'object' => array(
                  'location' => 'path',
                  'type' => 'string',
                  'required' => true,
                ),
                'generation' => array(
                  'location' => 'query',
                  'type' => 'string',
                ),
                'ifGenerationMatch' => array(
                  'location' => 'query',
                  'type' => 'string',
                ),
                'ifGenerationNotMatch' => array(
                  'location' => 'query',
                  'type' => 'string',
                ),
                'ifMetagenerationMatch' => array(
                  'location' => 'query',
                  'type' => 'string',
                ),
                'ifMetagenerationNotMatch' => array(
                  'location' => 'query',
                  'type' => 'string',
                ),
                'userProject' => array(
                  'location' => 'query',
                  'type' => 'string',
                ),
              ),
            ),'get' => array(
              'path' => 'b/{bucket}/o/{object}',
              'httpMethod' => 'GET',
              'parameters' => array(
                'bucket' => array(
                  'location' => 'path',
                  'type' => 'string',
                  'required' => true,
                ),
                'object' => array(
                  'location' => 'path',
                  'type' => 'string',
                  'required' => true,
                ),
                'generation' => array(
                  'location' => 'query',
                  'type' => 'string',
                ),
                'ifGenerationMatch' => array(
                  'location' => 'query',
                  'type' => 'string',
                ),
                'ifGenerationNotMatch' => array(
                  'location' => 'query',
                  'type' => 'string',
                ),
                'ifMetagenerationMatch' => array(
                  'location' => 'query',
                  'type' => 'string',
                ),
                'ifMetagenerationNotMatch' => array(
                  'location' => 'query',
                  'type' => 'string',
                ),
                'projection' => array(
                  'location' => 'query',
                  'type' => 'string',
                ),
                'userProject' => array(
                  'location' => 'query',
                  'type' => 'string',
                ),
              ),
            ),'getIamPolicy' => array(
              'path' => 'b/{bucket}/o/{object}/iam',
              'httpMethod' => 'GET',
              'parameters' => array(
                'bucket' => array(
                  'location' => 'path',
                  'type' => 'string',
                  'required' => true,
                ),
                'object' => array(
                  'location' => 'path',
                  'type' => 'string',
                  'required' => true,
                ),
                'generation' => array(
                  'location' => 'query',
                  'type' => 'string',
                ),
                'userProject' => array(
                  'location' => 'query',
                  'type' => 'string',
                ),
              ),
            ),'insert' => array(
              'path' => 'b/{bucket}/o',
              'httpMethod' => 'POST',
              'parameters' => array(
                'bucket' => array(
                  'location' => 'path',
                  'type' => 'string',
                  'required' => true,
                ),
                'contentEncoding' => array(
                  'location' => 'query',
                  'type' => 'string',
                ),
                'ifGenerationMatch' => array(
                  'location' => 'query',
                  'type' => 'string',
                ),
                'ifGenerationNotMatch' => array(
                  'location' => 'query',
                  'type' => 'string',
                ),
                'ifMetagenerationMatch' => array(
                  'location' => 'query',
                  'type' => 'string',
                ),
                'ifMetagenerationNotMatch' => array(
                  'location' => 'query',
                  'type' => 'string',
                ),
                'kmsKeyName' => array(
                  'location' => 'query',
                  'type' => 'string',
                ),
                'name' => array(
                  'location' => 'query',
                  'type' => 'string',
                ),
                'predefinedAcl' => array(
                  'location' => 'query',
                  'type' => 'string',
                ),
                'projection' => array(
                  'location' => 'query',
                  'type' => 'string',
                ),
                'userProject' => array(
                  'location' => 'query',
                  'type' => 'string',
                ),
              ),
            ),'list' => array(
              'path' => 'b/{bucket}/o',
              'httpMethod' => 'GET',
              'parameters' => array(
                'bucket' => array(
                  'location' => 'path',
                  'type' => 'string',
                  'required' => true,
                ),
                'delimiter' => array(
                  'location' => 'query',
                  'type' => 'string',
                ),
                'maxResults' => array(
                  'location' => 'query',
                  'type' => 'integer',
                ),
                'pageToken' => array(
                  'location' => 'query',
                  'type' => 'string',
                ),
                'prefix' => array(
                  'location' => 'query',
                  'type' => 'string',
                ),
                'projection' => array(
                  'location' => 'query',
                  'type' => 'string',
                ),
                'userProject' => array(
                  'location' => 'query',
                  'type' => 'string',
                ),
                'versions' => array(
                  'location' => 'query',
                  'type' => 'boolean',
                ),
              ),
            ),'patch' => array(
              'path' => 'b/{bucket}/o/{object}',
              'httpMethod' => 'PATCH',
              'parameters' => array(
                'bucket' => array(
                  'location' => 'path',
                  'type' => 'string',
                  'required' => true,
                ),
                'object' => array(
                  'location' => 'path',
                  'type' => 'string',
                  'required' => true,
                ),
                'generation' => array(
                  'location' => 'query',
                  'type' => 'string',
                ),
                'ifGenerationMatch' => array(
                  'location' => 'query',
                  'type' => 'string',
                ),
                'ifGenerationNotMatch' => array(
                  'location' => 'query',
                  'type' => 'string',
                ),
                'ifMetagenerationMatch' => array(
                  'location' => 'query',
                  'type' => 'string',
                ),
                'ifMetagenerationNotMatch' => array(
                  'location' => 'query',
                  'type' => 'string',
                ),
                'predefinedAcl' => array(
                  'location' => 'query',
                  'type' => 'string',
                ),
                'projection' => array(
                  'location' => 'query',
                  'type' => 'string',
                ),
                'userProject' => array(
                  'location' => 'query',
                  'type' => 'string',
                ),
              ),
            ),'rewrite' => array(
              'path' => 'b/{sourceBucket}/o/{sourceObject}/rewriteTo/b/{destinationBucket}/o/{destinationObject}',
              'httpMethod' => 'POST',
              'parameters' => array(
                'sourceBucket' => array(
                  'location' => 'path',
                  'type' => 'string',
                  'required' => true,
                ),
                'sourceObject' => array(
                  'location' => 'path',
                  'type' => 'string',
                  'required' => true,
                ),
                'destinationBucket' => array(
                  'location' => 'path',
                  'type' => 'string',
                  'required' => true,
                ),
                'destinationObject' => array(
                  'location' => 'path',
                  'type' => 'string',
                  'required' => true,
                ),
                'destinationKmsKeyName' => array(
                  'location' => 'query',
                  'type' => 'string',
                ),
                'destinationPredefinedAcl' => array(
                  'location' => 'query',
                  'type' => 'string',
                ),
                'ifGenerationMatch' => array(
                  'location' => 'query',
                  'type' => 'string',
                ),
                'ifGenerationNotMatch' => array(
                  'location' => 'query',
                  'type' => 'string',
                ),
                'ifMetagenerationMatch' => array(
                  'location' => 'query',
                  'type' => 'string',
                ),
                'ifMetagenerationNotMatch' => array(
                  'location' => 'query',
                  'type' => 'string',
                ),
                'ifSourceGenerationMatch' => array(
                  'location' => 'query',
                  'type' => 'string',
                ),
                'ifSourceGenerationNotMatch' => array(
                  'location' => 'query',
                  'type' => 'string',
                ),
                'ifSourceMetagenerationMatch' => array(
                  'location' => 'query',
                  'type' => 'string',
                ),
                'ifSourceMetagenerationNotMatch' => array(
                  'location' => 'query',
                  'type' => 'string',
                ),
                'maxBytesRewrittenPerCall' => array(
                  'location' => 'query',
                  'type' => 'string',
                ),
                'projection' => array(
                  'location' => 'query',
                  'type' => 'string',
                ),
                'rewriteToken' => array(
                  'location' => 'query',
                  'type' => 'string',
                ),
                'sourceGeneration' => array(
                  'location' => 'query',
                  'type' => 'string',
                ),
                'userProject' => array(
                  'location' => 'query',
                  'type' => 'string',
                ),
              ),
            ),'setIamPolicy' => array(
              'path' => 'b/{bucket}/o/{object}/iam',
              'httpMethod' => 'PUT',
              'parameters' => array(
                'bucket' => array(
                  'location' => 'path',
                  'type' => 'string',
                  'required' => true,
                ),
                'object' => array(
                  'location' => 'path',
                  'type' => 'string',
                  'required' => true,
                ),
                'generation' => array(
                  'location' => 'query',
                  'type' => 'string',
                ),
                'userProject' => array(
                  'location' => 'query',
                  'type' => 'string',
                ),
              ),
            ),'testIamPermissions' => array(
              'path' => 'b/{bucket}/o/{object}/iam/testPermissions',
              'httpMethod' => 'GET',
              'parameters' => array(
                'bucket' => array(
                  'location' => 'path',
                  'type' => 'string',
                  'required' => true,
                ),
                'object' => array(
                  'location' => 'path',
                  'type' => 'string',
                  'required' => true,
                ),
                'permissions' => array(
                  'location' => 'query',
                  'type' => 'string',
                  'repeated' => true,
                  'required' => true,
                ),
                'generation' => array(
                  'location' => 'query',
                  'type' => 'string',
                ),
                'userProject' => array(
                  'location' => 'query',
                  'type' => 'string',
                ),
              ),
            ),'update' => array(
              'path' => 'b/{bucket}/o/{object}',
              'httpMethod' => 'PUT',
              'parameters' => array(
                'bucket' => array(
                  'location' => 'path',
                  'type' => 'string',
                  'required' => true,
                ),
                'object' => array(
                  'location' => 'path',
                  'type' => 'string',
                  'required' => true,
                ),
                'generation' => array(
                  'location' => 'query',
                  'type' => 'string',
                ),
                'ifGenerationMatch' => array(
                  'location' => 'query',
                  'type' => 'string',
                ),
                'ifGenerationNotMatch' => array(
                  'location' => 'query',
                  'type' => 'string',
                ),
                'ifMetagenerationMatch' => array(
                  'location' => 'query',
                  'type' => 'string',
                ),
                'ifMetagenerationNotMatch' => array(
                  'location' => 'query',
                  'type' => 'string',
                ),
                'predefinedAcl' => array(
                  'location' => 'query',
                  'type' => 'string',
                ),
                'projection' => array(
                  'location' => 'query',
                  'type' => 'string',
                ),
                'userProject' => array(
                  'location' => 'query',
                  'type' => 'string',
                ),
              ),
            ),'watchAll' => array(
              'path' => 'b/{bucket}/o/watch',
              'httpMethod' => 'POST',
              'parameters' => array(
                'bucket' => array(
                  'location' => 'path',
                  'type' => 'string',
                  'required' => true,
                ),
                'delimiter' => array(
                  'location' => 'query',
                  'type' => 'string',
                ),
                'maxResults' => array(
                  'location' => 'query',
                  'type' => 'integer',
                ),
                'pageToken' => array(
                  'location' => 'query',
                  'type' => 'string',
                ),
                'prefix' => array(
                  'location' => 'query',
                  'type' => 'string',
                ),
                'projection' => array(
                  'location' => 'query',
                  'type' => 'string',
                ),
                'userProject' => array(
                  'location' => 'query',
                  'type' => 'string',
                ),
                'versions' => array(
                  'location' => 'query',
                  'type' => 'boolean',
                ),
              ),
            ),
          )
        )
    );
    $this->projects_serviceAccount = new Google_Service_Storage_Resource_ProjectsServiceAccount(
        $this,
        $this->serviceName,
        'serviceAccount',
        array(
          'methods' => array(
            'get' => array(
              'path' => 'projects/{projectId}/serviceAccount',
              'httpMethod' => 'GET',
              'parameters' => array(
                'projectId' => array(
                  'location' => 'path',
                  'type' => 'string',
                  'required' => true,
                ),
                'userProject' => array(
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
