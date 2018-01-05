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
 * Service definition for Firestore (v1beta1).
 *
 * <p>
</p>
 *
 * <p>
 * For more information about this service, see the API
 * <a href="https://cloud.google.com/firestore" target="_blank">Documentation</a>
 * </p>
 *
 * @author Google, Inc.
 */
class Google_Service_Firestore extends Google_Service
{
  /** View and manage your data across Google Cloud Platform services. */
  const CLOUD_PLATFORM =
      "https://www.googleapis.com/auth/cloud-platform";
  /** View and manage your Google Cloud Datastore data. */
  const DATASTORE =
      "https://www.googleapis.com/auth/datastore";

  public $projects_databases_documents;
  public $projects_databases_indexes;
  
  /**
   * Constructs the internal representation of the Firestore service.
   *
   * @param Google_Client $client
   */
  public function __construct(Google_Client $client)
  {
    parent::__construct($client);
    $this->rootUrl = 'https://firestore.googleapis.com/';
    $this->servicePath = '';
    $this->version = 'v1beta1';
    $this->serviceName = 'firestore';

    $this->projects_databases_documents = new Google_Service_Firestore_Resource_ProjectsDatabasesDocuments(
        $this,
        $this->serviceName,
        'documents',
        array(
          'methods' => array(
            'batchGet' => array(
              'path' => 'v1beta1/{+database}/documents:batchGet',
              'httpMethod' => 'POST',
              'parameters' => array(
                'database' => array(
                  'location' => 'path',
                  'type' => 'string',
                  'required' => true,
                ),
              ),
            ),'beginTransaction' => array(
              'path' => 'v1beta1/{+database}/documents:beginTransaction',
              'httpMethod' => 'POST',
              'parameters' => array(
                'database' => array(
                  'location' => 'path',
                  'type' => 'string',
                  'required' => true,
                ),
              ),
            ),'commit' => array(
              'path' => 'v1beta1/{+database}/documents:commit',
              'httpMethod' => 'POST',
              'parameters' => array(
                'database' => array(
                  'location' => 'path',
                  'type' => 'string',
                  'required' => true,
                ),
              ),
            ),'createDocument' => array(
              'path' => 'v1beta1/{+parent}/{collectionId}',
              'httpMethod' => 'POST',
              'parameters' => array(
                'parent' => array(
                  'location' => 'path',
                  'type' => 'string',
                  'required' => true,
                ),
                'collectionId' => array(
                  'location' => 'path',
                  'type' => 'string',
                  'required' => true,
                ),
                'documentId' => array(
                  'location' => 'query',
                  'type' => 'string',
                ),
                'mask.fieldPaths' => array(
                  'location' => 'query',
                  'type' => 'string',
                  'repeated' => true,
                ),
              ),
            ),'delete' => array(
              'path' => 'v1beta1/{+name}',
              'httpMethod' => 'DELETE',
              'parameters' => array(
                'name' => array(
                  'location' => 'path',
                  'type' => 'string',
                  'required' => true,
                ),
                'currentDocument.exists' => array(
                  'location' => 'query',
                  'type' => 'boolean',
                ),
                'currentDocument.updateTime' => array(
                  'location' => 'query',
                  'type' => 'string',
                ),
              ),
            ),'get' => array(
              'path' => 'v1beta1/{+name}',
              'httpMethod' => 'GET',
              'parameters' => array(
                'name' => array(
                  'location' => 'path',
                  'type' => 'string',
                  'required' => true,
                ),
                'mask.fieldPaths' => array(
                  'location' => 'query',
                  'type' => 'string',
                  'repeated' => true,
                ),
                'readTime' => array(
                  'location' => 'query',
                  'type' => 'string',
                ),
                'transaction' => array(
                  'location' => 'query',
                  'type' => 'string',
                ),
              ),
            ),'list' => array(
              'path' => 'v1beta1/{+parent}/{collectionId}',
              'httpMethod' => 'GET',
              'parameters' => array(
                'parent' => array(
                  'location' => 'path',
                  'type' => 'string',
                  'required' => true,
                ),
                'collectionId' => array(
                  'location' => 'path',
                  'type' => 'string',
                  'required' => true,
                ),
                'pageSize' => array(
                  'location' => 'query',
                  'type' => 'integer',
                ),
                'transaction' => array(
                  'location' => 'query',
                  'type' => 'string',
                ),
                'readTime' => array(
                  'location' => 'query',
                  'type' => 'string',
                ),
                'orderBy' => array(
                  'location' => 'query',
                  'type' => 'string',
                ),
                'showMissing' => array(
                  'location' => 'query',
                  'type' => 'boolean',
                ),
                'mask.fieldPaths' => array(
                  'location' => 'query',
                  'type' => 'string',
                  'repeated' => true,
                ),
                'pageToken' => array(
                  'location' => 'query',
                  'type' => 'string',
                ),
              ),
            ),'listCollectionIds' => array(
              'path' => 'v1beta1/{+parent}:listCollectionIds',
              'httpMethod' => 'POST',
              'parameters' => array(
                'parent' => array(
                  'location' => 'path',
                  'type' => 'string',
                  'required' => true,
                ),
              ),
            ),'listen' => array(
              'path' => 'v1beta1/{+database}/documents:listen',
              'httpMethod' => 'POST',
              'parameters' => array(
                'database' => array(
                  'location' => 'path',
                  'type' => 'string',
                  'required' => true,
                ),
              ),
            ),'patch' => array(
              'path' => 'v1beta1/{+name}',
              'httpMethod' => 'PATCH',
              'parameters' => array(
                'name' => array(
                  'location' => 'path',
                  'type' => 'string',
                  'required' => true,
                ),
                'currentDocument.exists' => array(
                  'location' => 'query',
                  'type' => 'boolean',
                ),
                'updateMask.fieldPaths' => array(
                  'location' => 'query',
                  'type' => 'string',
                  'repeated' => true,
                ),
                'mask.fieldPaths' => array(
                  'location' => 'query',
                  'type' => 'string',
                  'repeated' => true,
                ),
                'currentDocument.updateTime' => array(
                  'location' => 'query',
                  'type' => 'string',
                ),
              ),
            ),'rollback' => array(
              'path' => 'v1beta1/{+database}/documents:rollback',
              'httpMethod' => 'POST',
              'parameters' => array(
                'database' => array(
                  'location' => 'path',
                  'type' => 'string',
                  'required' => true,
                ),
              ),
            ),'runQuery' => array(
              'path' => 'v1beta1/{+parent}:runQuery',
              'httpMethod' => 'POST',
              'parameters' => array(
                'parent' => array(
                  'location' => 'path',
                  'type' => 'string',
                  'required' => true,
                ),
              ),
            ),'write' => array(
              'path' => 'v1beta1/{+database}/documents:write',
              'httpMethod' => 'POST',
              'parameters' => array(
                'database' => array(
                  'location' => 'path',
                  'type' => 'string',
                  'required' => true,
                ),
              ),
            ),
          )
        )
    );
    $this->projects_databases_indexes = new Google_Service_Firestore_Resource_ProjectsDatabasesIndexes(
        $this,
        $this->serviceName,
        'indexes',
        array(
          'methods' => array(
            'create' => array(
              'path' => 'v1beta1/{+parent}/indexes',
              'httpMethod' => 'POST',
              'parameters' => array(
                'parent' => array(
                  'location' => 'path',
                  'type' => 'string',
                  'required' => true,
                ),
              ),
            ),'delete' => array(
              'path' => 'v1beta1/{+name}',
              'httpMethod' => 'DELETE',
              'parameters' => array(
                'name' => array(
                  'location' => 'path',
                  'type' => 'string',
                  'required' => true,
                ),
              ),
            ),'get' => array(
              'path' => 'v1beta1/{+name}',
              'httpMethod' => 'GET',
              'parameters' => array(
                'name' => array(
                  'location' => 'path',
                  'type' => 'string',
                  'required' => true,
                ),
              ),
            ),'list' => array(
              'path' => 'v1beta1/{+parent}/indexes',
              'httpMethod' => 'GET',
              'parameters' => array(
                'parent' => array(
                  'location' => 'path',
                  'type' => 'string',
                  'required' => true,
                ),
                'pageSize' => array(
                  'location' => 'query',
                  'type' => 'integer',
                ),
                'filter' => array(
                  'location' => 'query',
                  'type' => 'string',
                ),
                'pageToken' => array(
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
