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
 * Service definition for Books (v1).
 *
 * <p>
 * Searches for books and manages your Google Books library.</p>
 *
 * <p>
 * For more information about this service, see the API
 * <a href="https://developers.google.com/books/docs/v1/getting_started" target="_blank">Documentation</a>
 * </p>
 *
 * @author Google, Inc.
 */
class Google_Service_Books extends Google_Service
{
  /** Manage your books. */
  const BOOKS =
      "https://www.googleapis.com/auth/books";

  public $bookshelves;
  public $bookshelves_volumes;
  public $cloudloading;
  public $dictionary;
  public $layers;
  public $layers_annotationData;
  public $layers_volumeAnnotations;
  public $myconfig;
  public $mylibrary_annotations;
  public $mylibrary_bookshelves;
  public $mylibrary_bookshelves_volumes;
  public $mylibrary_readingpositions;
  public $notification;
  public $onboarding;
  public $personalizedstream;
  public $promooffer;
  public $series;
  public $series_membership;
  public $volumes;
  public $volumes_associated;
  public $volumes_mybooks;
  public $volumes_recommended;
  public $volumes_useruploaded;
  
  /**
   * Constructs the internal representation of the Books service.
   *
   * @param Google_Client $client
   */
  public function __construct(Google_Client $client)
  {
    parent::__construct($client);
    $this->rootUrl = 'https://www.googleapis.com/';
    $this->servicePath = 'books/v1/';
    $this->version = 'v1';
    $this->serviceName = 'books';

    $this->bookshelves = new Google_Service_Books_Resource_Bookshelves(
        $this,
        $this->serviceName,
        'bookshelves',
        array(
          'methods' => array(
            'get' => array(
              'path' => 'users/{userId}/bookshelves/{shelf}',
              'httpMethod' => 'GET',
              'parameters' => array(
                'userId' => array(
                  'location' => 'path',
                  'type' => 'string',
                  'required' => true,
                ),
                'shelf' => array(
                  'location' => 'path',
                  'type' => 'string',
                  'required' => true,
                ),
                'source' => array(
                  'location' => 'query',
                  'type' => 'string',
                ),
              ),
            ),'list' => array(
              'path' => 'users/{userId}/bookshelves',
              'httpMethod' => 'GET',
              'parameters' => array(
                'userId' => array(
                  'location' => 'path',
                  'type' => 'string',
                  'required' => true,
                ),
                'source' => array(
                  'location' => 'query',
                  'type' => 'string',
                ),
              ),
            ),
          )
        )
    );
    $this->bookshelves_volumes = new Google_Service_Books_Resource_BookshelvesVolumes(
        $this,
        $this->serviceName,
        'volumes',
        array(
          'methods' => array(
            'list' => array(
              'path' => 'users/{userId}/bookshelves/{shelf}/volumes',
              'httpMethod' => 'GET',
              'parameters' => array(
                'userId' => array(
                  'location' => 'path',
                  'type' => 'string',
                  'required' => true,
                ),
                'shelf' => array(
                  'location' => 'path',
                  'type' => 'string',
                  'required' => true,
                ),
                'maxResults' => array(
                  'location' => 'query',
                  'type' => 'integer',
                ),
                'showPreorders' => array(
                  'location' => 'query',
                  'type' => 'boolean',
                ),
                'source' => array(
                  'location' => 'query',
                  'type' => 'string',
                ),
                'startIndex' => array(
                  'location' => 'query',
                  'type' => 'integer',
                ),
              ),
            ),
          )
        )
    );
    $this->cloudloading = new Google_Service_Books_Resource_Cloudloading(
        $this,
        $this->serviceName,
        'cloudloading',
        array(
          'methods' => array(
            'addBook' => array(
              'path' => 'cloudloading/addBook',
              'httpMethod' => 'POST',
              'parameters' => array(
                'drive_document_id' => array(
                  'location' => 'query',
                  'type' => 'string',
                ),
                'mime_type' => array(
                  'location' => 'query',
                  'type' => 'string',
                ),
                'name' => array(
                  'location' => 'query',
                  'type' => 'string',
                ),
                'upload_client_token' => array(
                  'location' => 'query',
                  'type' => 'string',
                ),
              ),
            ),'deleteBook' => array(
              'path' => 'cloudloading/deleteBook',
              'httpMethod' => 'POST',
              'parameters' => array(
                'volumeId' => array(
                  'location' => 'query',
                  'type' => 'string',
                  'required' => true,
                ),
              ),
            ),'updateBook' => array(
              'path' => 'cloudloading/updateBook',
              'httpMethod' => 'POST',
              'parameters' => array(),
            ),
          )
        )
    );
    $this->dictionary = new Google_Service_Books_Resource_Dictionary(
        $this,
        $this->serviceName,
        'dictionary',
        array(
          'methods' => array(
            'listOfflineMetadata' => array(
              'path' => 'dictionary/listOfflineMetadata',
              'httpMethod' => 'GET',
              'parameters' => array(
                'cpksver' => array(
                  'location' => 'query',
                  'type' => 'string',
                  'required' => true,
                ),
              ),
            ),
          )
        )
    );
    $this->layers = new Google_Service_Books_Resource_Layers(
        $this,
        $this->serviceName,
        'layers',
        array(
          'methods' => array(
            'get' => array(
              'path' => 'volumes/{volumeId}/layersummary/{summaryId}',
              'httpMethod' => 'GET',
              'parameters' => array(
                'volumeId' => array(
                  'location' => 'path',
                  'type' => 'string',
                  'required' => true,
                ),
                'summaryId' => array(
                  'location' => 'path',
                  'type' => 'string',
                  'required' => true,
                ),
                'contentVersion' => array(
                  'location' => 'query',
                  'type' => 'string',
                ),
                'source' => array(
                  'location' => 'query',
                  'type' => 'string',
                ),
              ),
            ),'list' => array(
              'path' => 'volumes/{volumeId}/layersummary',
              'httpMethod' => 'GET',
              'parameters' => array(
                'volumeId' => array(
                  'location' => 'path',
                  'type' => 'string',
                  'required' => true,
                ),
                'contentVersion' => array(
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
                'source' => array(
                  'location' => 'query',
                  'type' => 'string',
                ),
              ),
            ),
          )
        )
    );
    $this->layers_annotationData = new Google_Service_Books_Resource_LayersAnnotationData(
        $this,
        $this->serviceName,
        'annotationData',
        array(
          'methods' => array(
            'get' => array(
              'path' => 'volumes/{volumeId}/layers/{layerId}/data/{annotationDataId}',
              'httpMethod' => 'GET',
              'parameters' => array(
                'volumeId' => array(
                  'location' => 'path',
                  'type' => 'string',
                  'required' => true,
                ),
                'layerId' => array(
                  'location' => 'path',
                  'type' => 'string',
                  'required' => true,
                ),
                'annotationDataId' => array(
                  'location' => 'path',
                  'type' => 'string',
                  'required' => true,
                ),
                'contentVersion' => array(
                  'location' => 'query',
                  'type' => 'string',
                  'required' => true,
                ),
                'allowWebDefinitions' => array(
                  'location' => 'query',
                  'type' => 'boolean',
                ),
                'h' => array(
                  'location' => 'query',
                  'type' => 'integer',
                ),
                'locale' => array(
                  'location' => 'query',
                  'type' => 'string',
                ),
                'scale' => array(
                  'location' => 'query',
                  'type' => 'integer',
                ),
                'source' => array(
                  'location' => 'query',
                  'type' => 'string',
                ),
                'w' => array(
                  'location' => 'query',
                  'type' => 'integer',
                ),
              ),
            ),'list' => array(
              'path' => 'volumes/{volumeId}/layers/{layerId}/data',
              'httpMethod' => 'GET',
              'parameters' => array(
                'volumeId' => array(
                  'location' => 'path',
                  'type' => 'string',
                  'required' => true,
                ),
                'layerId' => array(
                  'location' => 'path',
                  'type' => 'string',
                  'required' => true,
                ),
                'contentVersion' => array(
                  'location' => 'query',
                  'type' => 'string',
                  'required' => true,
                ),
                'annotationDataId' => array(
                  'location' => 'query',
                  'type' => 'string',
                  'repeated' => true,
                ),
                'h' => array(
                  'location' => 'query',
                  'type' => 'integer',
                ),
                'locale' => array(
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
                'scale' => array(
                  'location' => 'query',
                  'type' => 'integer',
                ),
                'source' => array(
                  'location' => 'query',
                  'type' => 'string',
                ),
                'updatedMax' => array(
                  'location' => 'query',
                  'type' => 'string',
                ),
                'updatedMin' => array(
                  'location' => 'query',
                  'type' => 'string',
                ),
                'w' => array(
                  'location' => 'query',
                  'type' => 'integer',
                ),
              ),
            ),
          )
        )
    );
    $this->layers_volumeAnnotations = new Google_Service_Books_Resource_LayersVolumeAnnotations(
        $this,
        $this->serviceName,
        'volumeAnnotations',
        array(
          'methods' => array(
            'get' => array(
              'path' => 'volumes/{volumeId}/layers/{layerId}/annotations/{annotationId}',
              'httpMethod' => 'GET',
              'parameters' => array(
                'volumeId' => array(
                  'location' => 'path',
                  'type' => 'string',
                  'required' => true,
                ),
                'layerId' => array(
                  'location' => 'path',
                  'type' => 'string',
                  'required' => true,
                ),
                'annotationId' => array(
                  'location' => 'path',
                  'type' => 'string',
                  'required' => true,
                ),
                'locale' => array(
                  'location' => 'query',
                  'type' => 'string',
                ),
                'source' => array(
                  'location' => 'query',
                  'type' => 'string',
                ),
              ),
            ),'list' => array(
              'path' => 'volumes/{volumeId}/layers/{layerId}',
              'httpMethod' => 'GET',
              'parameters' => array(
                'volumeId' => array(
                  'location' => 'path',
                  'type' => 'string',
                  'required' => true,
                ),
                'layerId' => array(
                  'location' => 'path',
                  'type' => 'string',
                  'required' => true,
                ),
                'contentVersion' => array(
                  'location' => 'query',
                  'type' => 'string',
                  'required' => true,
                ),
                'endOffset' => array(
                  'location' => 'query',
                  'type' => 'string',
                ),
                'endPosition' => array(
                  'location' => 'query',
                  'type' => 'string',
                ),
                'locale' => array(
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
                'showDeleted' => array(
                  'location' => 'query',
                  'type' => 'boolean',
                ),
                'source' => array(
                  'location' => 'query',
                  'type' => 'string',
                ),
                'startOffset' => array(
                  'location' => 'query',
                  'type' => 'string',
                ),
                'startPosition' => array(
                  'location' => 'query',
                  'type' => 'string',
                ),
                'updatedMax' => array(
                  'location' => 'query',
                  'type' => 'string',
                ),
                'updatedMin' => array(
                  'location' => 'query',
                  'type' => 'string',
                ),
                'volumeAnnotationsVersion' => array(
                  'location' => 'query',
                  'type' => 'string',
                ),
              ),
            ),
          )
        )
    );
    $this->myconfig = new Google_Service_Books_Resource_Myconfig(
        $this,
        $this->serviceName,
        'myconfig',
        array(
          'methods' => array(
            'getUserSettings' => array(
              'path' => 'myconfig/getUserSettings',
              'httpMethod' => 'GET',
              'parameters' => array(),
            ),'releaseDownloadAccess' => array(
              'path' => 'myconfig/releaseDownloadAccess',
              'httpMethod' => 'POST',
              'parameters' => array(
                'volumeIds' => array(
                  'location' => 'query',
                  'type' => 'string',
                  'repeated' => true,
                  'required' => true,
                ),
                'cpksver' => array(
                  'location' => 'query',
                  'type' => 'string',
                  'required' => true,
                ),
                'locale' => array(
                  'location' => 'query',
                  'type' => 'string',
                ),
                'source' => array(
                  'location' => 'query',
                  'type' => 'string',
                ),
              ),
            ),'requestAccess' => array(
              'path' => 'myconfig/requestAccess',
              'httpMethod' => 'POST',
              'parameters' => array(
                'source' => array(
                  'location' => 'query',
                  'type' => 'string',
                  'required' => true,
                ),
                'volumeId' => array(
                  'location' => 'query',
                  'type' => 'string',
                  'required' => true,
                ),
                'nonce' => array(
                  'location' => 'query',
                  'type' => 'string',
                  'required' => true,
                ),
                'cpksver' => array(
                  'location' => 'query',
                  'type' => 'string',
                  'required' => true,
                ),
                'licenseTypes' => array(
                  'location' => 'query',
                  'type' => 'string',
                ),
                'locale' => array(
                  'location' => 'query',
                  'type' => 'string',
                ),
              ),
            ),'syncVolumeLicenses' => array(
              'path' => 'myconfig/syncVolumeLicenses',
              'httpMethod' => 'POST',
              'parameters' => array(
                'source' => array(
                  'location' => 'query',
                  'type' => 'string',
                  'required' => true,
                ),
                'nonce' => array(
                  'location' => 'query',
                  'type' => 'string',
                  'required' => true,
                ),
                'cpksver' => array(
                  'location' => 'query',
                  'type' => 'string',
                  'required' => true,
                ),
                'features' => array(
                  'location' => 'query',
                  'type' => 'string',
                  'repeated' => true,
                ),
                'includeNonComicsSeries' => array(
                  'location' => 'query',
                  'type' => 'boolean',
                ),
                'locale' => array(
                  'location' => 'query',
                  'type' => 'string',
                ),
                'showPreorders' => array(
                  'location' => 'query',
                  'type' => 'boolean',
                ),
                'volumeIds' => array(
                  'location' => 'query',
                  'type' => 'string',
                  'repeated' => true,
                ),
              ),
            ),'updateUserSettings' => array(
              'path' => 'myconfig/updateUserSettings',
              'httpMethod' => 'POST',
              'parameters' => array(),
            ),
          )
        )
    );
    $this->mylibrary_annotations = new Google_Service_Books_Resource_MylibraryAnnotations(
        $this,
        $this->serviceName,
        'annotations',
        array(
          'methods' => array(
            'delete' => array(
              'path' => 'mylibrary/annotations/{annotationId}',
              'httpMethod' => 'DELETE',
              'parameters' => array(
                'annotationId' => array(
                  'location' => 'path',
                  'type' => 'string',
                  'required' => true,
                ),
                'source' => array(
                  'location' => 'query',
                  'type' => 'string',
                ),
              ),
            ),'insert' => array(
              'path' => 'mylibrary/annotations',
              'httpMethod' => 'POST',
              'parameters' => array(
                'annotationId' => array(
                  'location' => 'query',
                  'type' => 'string',
                ),
                'country' => array(
                  'location' => 'query',
                  'type' => 'string',
                ),
                'showOnlySummaryInResponse' => array(
                  'location' => 'query',
                  'type' => 'boolean',
                ),
                'source' => array(
                  'location' => 'query',
                  'type' => 'string',
                ),
              ),
            ),'list' => array(
              'path' => 'mylibrary/annotations',
              'httpMethod' => 'GET',
              'parameters' => array(
                'contentVersion' => array(
                  'location' => 'query',
                  'type' => 'string',
                ),
                'layerId' => array(
                  'location' => 'query',
                  'type' => 'string',
                ),
                'layerIds' => array(
                  'location' => 'query',
                  'type' => 'string',
                  'repeated' => true,
                ),
                'maxResults' => array(
                  'location' => 'query',
                  'type' => 'integer',
                ),
                'pageToken' => array(
                  'location' => 'query',
                  'type' => 'string',
                ),
                'showDeleted' => array(
                  'location' => 'query',
                  'type' => 'boolean',
                ),
                'source' => array(
                  'location' => 'query',
                  'type' => 'string',
                ),
                'updatedMax' => array(
                  'location' => 'query',
                  'type' => 'string',
                ),
                'updatedMin' => array(
                  'location' => 'query',
                  'type' => 'string',
                ),
                'volumeId' => array(
                  'location' => 'query',
                  'type' => 'string',
                ),
              ),
            ),'summary' => array(
              'path' => 'mylibrary/annotations/summary',
              'httpMethod' => 'POST',
              'parameters' => array(
                'layerIds' => array(
                  'location' => 'query',
                  'type' => 'string',
                  'repeated' => true,
                  'required' => true,
                ),
                'volumeId' => array(
                  'location' => 'query',
                  'type' => 'string',
                  'required' => true,
                ),
              ),
            ),'update' => array(
              'path' => 'mylibrary/annotations/{annotationId}',
              'httpMethod' => 'PUT',
              'parameters' => array(
                'annotationId' => array(
                  'location' => 'path',
                  'type' => 'string',
                  'required' => true,
                ),
                'source' => array(
                  'location' => 'query',
                  'type' => 'string',
                ),
              ),
            ),
          )
        )
    );
    $this->mylibrary_bookshelves = new Google_Service_Books_Resource_MylibraryBookshelves(
        $this,
        $this->serviceName,
        'bookshelves',
        array(
          'methods' => array(
            'addVolume' => array(
              'path' => 'mylibrary/bookshelves/{shelf}/addVolume',
              'httpMethod' => 'POST',
              'parameters' => array(
                'shelf' => array(
                  'location' => 'path',
                  'type' => 'string',
                  'required' => true,
                ),
                'volumeId' => array(
                  'location' => 'query',
                  'type' => 'string',
                  'required' => true,
                ),
                'reason' => array(
                  'location' => 'query',
                  'type' => 'string',
                ),
                'source' => array(
                  'location' => 'query',
                  'type' => 'string',
                ),
              ),
            ),'clearVolumes' => array(
              'path' => 'mylibrary/bookshelves/{shelf}/clearVolumes',
              'httpMethod' => 'POST',
              'parameters' => array(
                'shelf' => array(
                  'location' => 'path',
                  'type' => 'string',
                  'required' => true,
                ),
                'source' => array(
                  'location' => 'query',
                  'type' => 'string',
                ),
              ),
            ),'get' => array(
              'path' => 'mylibrary/bookshelves/{shelf}',
              'httpMethod' => 'GET',
              'parameters' => array(
                'shelf' => array(
                  'location' => 'path',
                  'type' => 'string',
                  'required' => true,
                ),
                'source' => array(
                  'location' => 'query',
                  'type' => 'string',
                ),
              ),
            ),'list' => array(
              'path' => 'mylibrary/bookshelves',
              'httpMethod' => 'GET',
              'parameters' => array(
                'source' => array(
                  'location' => 'query',
                  'type' => 'string',
                ),
              ),
            ),'moveVolume' => array(
              'path' => 'mylibrary/bookshelves/{shelf}/moveVolume',
              'httpMethod' => 'POST',
              'parameters' => array(
                'shelf' => array(
                  'location' => 'path',
                  'type' => 'string',
                  'required' => true,
                ),
                'volumeId' => array(
                  'location' => 'query',
                  'type' => 'string',
                  'required' => true,
                ),
                'volumePosition' => array(
                  'location' => 'query',
                  'type' => 'integer',
                  'required' => true,
                ),
                'source' => array(
                  'location' => 'query',
                  'type' => 'string',
                ),
              ),
            ),'removeVolume' => array(
              'path' => 'mylibrary/bookshelves/{shelf}/removeVolume',
              'httpMethod' => 'POST',
              'parameters' => array(
                'shelf' => array(
                  'location' => 'path',
                  'type' => 'string',
                  'required' => true,
                ),
                'volumeId' => array(
                  'location' => 'query',
                  'type' => 'string',
                  'required' => true,
                ),
                'reason' => array(
                  'location' => 'query',
                  'type' => 'string',
                ),
                'source' => array(
                  'location' => 'query',
                  'type' => 'string',
                ),
              ),
            ),
          )
        )
    );
    $this->mylibrary_bookshelves_volumes = new Google_Service_Books_Resource_MylibraryBookshelvesVolumes(
        $this,
        $this->serviceName,
        'volumes',
        array(
          'methods' => array(
            'list' => array(
              'path' => 'mylibrary/bookshelves/{shelf}/volumes',
              'httpMethod' => 'GET',
              'parameters' => array(
                'shelf' => array(
                  'location' => 'path',
                  'type' => 'string',
                  'required' => true,
                ),
                'country' => array(
                  'location' => 'query',
                  'type' => 'string',
                ),
                'maxResults' => array(
                  'location' => 'query',
                  'type' => 'integer',
                ),
                'projection' => array(
                  'location' => 'query',
                  'type' => 'string',
                ),
                'q' => array(
                  'location' => 'query',
                  'type' => 'string',
                ),
                'showPreorders' => array(
                  'location' => 'query',
                  'type' => 'boolean',
                ),
                'source' => array(
                  'location' => 'query',
                  'type' => 'string',
                ),
                'startIndex' => array(
                  'location' => 'query',
                  'type' => 'integer',
                ),
              ),
            ),
          )
        )
    );
    $this->mylibrary_readingpositions = new Google_Service_Books_Resource_MylibraryReadingpositions(
        $this,
        $this->serviceName,
        'readingpositions',
        array(
          'methods' => array(
            'get' => array(
              'path' => 'mylibrary/readingpositions/{volumeId}',
              'httpMethod' => 'GET',
              'parameters' => array(
                'volumeId' => array(
                  'location' => 'path',
                  'type' => 'string',
                  'required' => true,
                ),
                'contentVersion' => array(
                  'location' => 'query',
                  'type' => 'string',
                ),
                'source' => array(
                  'location' => 'query',
                  'type' => 'string',
                ),
              ),
            ),'setPosition' => array(
              'path' => 'mylibrary/readingpositions/{volumeId}/setPosition',
              'httpMethod' => 'POST',
              'parameters' => array(
                'volumeId' => array(
                  'location' => 'path',
                  'type' => 'string',
                  'required' => true,
                ),
                'timestamp' => array(
                  'location' => 'query',
                  'type' => 'string',
                  'required' => true,
                ),
                'position' => array(
                  'location' => 'query',
                  'type' => 'string',
                  'required' => true,
                ),
                'action' => array(
                  'location' => 'query',
                  'type' => 'string',
                ),
                'contentVersion' => array(
                  'location' => 'query',
                  'type' => 'string',
                ),
                'deviceCookie' => array(
                  'location' => 'query',
                  'type' => 'string',
                ),
                'source' => array(
                  'location' => 'query',
                  'type' => 'string',
                ),
              ),
            ),
          )
        )
    );
    $this->notification = new Google_Service_Books_Resource_Notification(
        $this,
        $this->serviceName,
        'notification',
        array(
          'methods' => array(
            'get' => array(
              'path' => 'notification/get',
              'httpMethod' => 'GET',
              'parameters' => array(
                'notification_id' => array(
                  'location' => 'query',
                  'type' => 'string',
                  'required' => true,
                ),
                'locale' => array(
                  'location' => 'query',
                  'type' => 'string',
                ),
                'source' => array(
                  'location' => 'query',
                  'type' => 'string',
                ),
              ),
            ),
          )
        )
    );
    $this->onboarding = new Google_Service_Books_Resource_Onboarding(
        $this,
        $this->serviceName,
        'onboarding',
        array(
          'methods' => array(
            'listCategories' => array(
              'path' => 'onboarding/listCategories',
              'httpMethod' => 'GET',
              'parameters' => array(
                'locale' => array(
                  'location' => 'query',
                  'type' => 'string',
                ),
              ),
            ),'listCategoryVolumes' => array(
              'path' => 'onboarding/listCategoryVolumes',
              'httpMethod' => 'GET',
              'parameters' => array(
                'categoryId' => array(
                  'location' => 'query',
                  'type' => 'string',
                  'repeated' => true,
                ),
                'locale' => array(
                  'location' => 'query',
                  'type' => 'string',
                ),
                'maxAllowedMaturityRating' => array(
                  'location' => 'query',
                  'type' => 'string',
                ),
                'pageSize' => array(
                  'location' => 'query',
                  'type' => 'integer',
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
    $this->personalizedstream = new Google_Service_Books_Resource_Personalizedstream(
        $this,
        $this->serviceName,
        'personalizedstream',
        array(
          'methods' => array(
            'get' => array(
              'path' => 'personalizedstream/get',
              'httpMethod' => 'GET',
              'parameters' => array(
                'locale' => array(
                  'location' => 'query',
                  'type' => 'string',
                ),
                'maxAllowedMaturityRating' => array(
                  'location' => 'query',
                  'type' => 'string',
                ),
                'source' => array(
                  'location' => 'query',
                  'type' => 'string',
                ),
              ),
            ),
          )
        )
    );
    $this->promooffer = new Google_Service_Books_Resource_Promooffer(
        $this,
        $this->serviceName,
        'promooffer',
        array(
          'methods' => array(
            'accept' => array(
              'path' => 'promooffer/accept',
              'httpMethod' => 'POST',
              'parameters' => array(
                'androidId' => array(
                  'location' => 'query',
                  'type' => 'string',
                ),
                'device' => array(
                  'location' => 'query',
                  'type' => 'string',
                ),
                'manufacturer' => array(
                  'location' => 'query',
                  'type' => 'string',
                ),
                'model' => array(
                  'location' => 'query',
                  'type' => 'string',
                ),
                'offerId' => array(
                  'location' => 'query',
                  'type' => 'string',
                ),
                'product' => array(
                  'location' => 'query',
                  'type' => 'string',
                ),
                'serial' => array(
                  'location' => 'query',
                  'type' => 'string',
                ),
                'volumeId' => array(
                  'location' => 'query',
                  'type' => 'string',
                ),
              ),
            ),'dismiss' => array(
              'path' => 'promooffer/dismiss',
              'httpMethod' => 'POST',
              'parameters' => array(
                'androidId' => array(
                  'location' => 'query',
                  'type' => 'string',
                ),
                'device' => array(
                  'location' => 'query',
                  'type' => 'string',
                ),
                'manufacturer' => array(
                  'location' => 'query',
                  'type' => 'string',
                ),
                'model' => array(
                  'location' => 'query',
                  'type' => 'string',
                ),
                'offerId' => array(
                  'location' => 'query',
                  'type' => 'string',
                ),
                'product' => array(
                  'location' => 'query',
                  'type' => 'string',
                ),
                'serial' => array(
                  'location' => 'query',
                  'type' => 'string',
                ),
              ),
            ),'get' => array(
              'path' => 'promooffer/get',
              'httpMethod' => 'GET',
              'parameters' => array(
                'androidId' => array(
                  'location' => 'query',
                  'type' => 'string',
                ),
                'device' => array(
                  'location' => 'query',
                  'type' => 'string',
                ),
                'manufacturer' => array(
                  'location' => 'query',
                  'type' => 'string',
                ),
                'model' => array(
                  'location' => 'query',
                  'type' => 'string',
                ),
                'product' => array(
                  'location' => 'query',
                  'type' => 'string',
                ),
                'serial' => array(
                  'location' => 'query',
                  'type' => 'string',
                ),
              ),
            ),
          )
        )
    );
    $this->series = new Google_Service_Books_Resource_Series(
        $this,
        $this->serviceName,
        'series',
        array(
          'methods' => array(
            'get' => array(
              'path' => 'series/get',
              'httpMethod' => 'GET',
              'parameters' => array(
                'series_id' => array(
                  'location' => 'query',
                  'type' => 'string',
                  'repeated' => true,
                  'required' => true,
                ),
              ),
            ),
          )
        )
    );
    $this->series_membership = new Google_Service_Books_Resource_SeriesMembership(
        $this,
        $this->serviceName,
        'membership',
        array(
          'methods' => array(
            'get' => array(
              'path' => 'series/membership/get',
              'httpMethod' => 'GET',
              'parameters' => array(
                'series_id' => array(
                  'location' => 'query',
                  'type' => 'string',
                  'required' => true,
                ),
                'page_size' => array(
                  'location' => 'query',
                  'type' => 'integer',
                ),
                'page_token' => array(
                  'location' => 'query',
                  'type' => 'string',
                ),
              ),
            ),
          )
        )
    );
    $this->volumes = new Google_Service_Books_Resource_Volumes(
        $this,
        $this->serviceName,
        'volumes',
        array(
          'methods' => array(
            'get' => array(
              'path' => 'volumes/{volumeId}',
              'httpMethod' => 'GET',
              'parameters' => array(
                'volumeId' => array(
                  'location' => 'path',
                  'type' => 'string',
                  'required' => true,
                ),
                'country' => array(
                  'location' => 'query',
                  'type' => 'string',
                ),
                'includeNonComicsSeries' => array(
                  'location' => 'query',
                  'type' => 'boolean',
                ),
                'partner' => array(
                  'location' => 'query',
                  'type' => 'string',
                ),
                'projection' => array(
                  'location' => 'query',
                  'type' => 'string',
                ),
                'source' => array(
                  'location' => 'query',
                  'type' => 'string',
                ),
                'user_library_consistent_read' => array(
                  'location' => 'query',
                  'type' => 'boolean',
                ),
              ),
            ),'list' => array(
              'path' => 'volumes',
              'httpMethod' => 'GET',
              'parameters' => array(
                'q' => array(
                  'location' => 'query',
                  'type' => 'string',
                  'required' => true,
                ),
                'download' => array(
                  'location' => 'query',
                  'type' => 'string',
                ),
                'filter' => array(
                  'location' => 'query',
                  'type' => 'string',
                ),
                'langRestrict' => array(
                  'location' => 'query',
                  'type' => 'string',
                ),
                'libraryRestrict' => array(
                  'location' => 'query',
                  'type' => 'string',
                ),
                'maxAllowedMaturityRating' => array(
                  'location' => 'query',
                  'type' => 'string',
                ),
                'maxResults' => array(
                  'location' => 'query',
                  'type' => 'integer',
                ),
                'orderBy' => array(
                  'location' => 'query',
                  'type' => 'string',
                ),
                'partner' => array(
                  'location' => 'query',
                  'type' => 'string',
                ),
                'printType' => array(
                  'location' => 'query',
                  'type' => 'string',
                ),
                'projection' => array(
                  'location' => 'query',
                  'type' => 'string',
                ),
                'showPreorders' => array(
                  'location' => 'query',
                  'type' => 'boolean',
                ),
                'source' => array(
                  'location' => 'query',
                  'type' => 'string',
                ),
                'startIndex' => array(
                  'location' => 'query',
                  'type' => 'integer',
                ),
              ),
            ),
          )
        )
    );
    $this->volumes_associated = new Google_Service_Books_Resource_VolumesAssociated(
        $this,
        $this->serviceName,
        'associated',
        array(
          'methods' => array(
            'list' => array(
              'path' => 'volumes/{volumeId}/associated',
              'httpMethod' => 'GET',
              'parameters' => array(
                'volumeId' => array(
                  'location' => 'path',
                  'type' => 'string',
                  'required' => true,
                ),
                'association' => array(
                  'location' => 'query',
                  'type' => 'string',
                ),
                'locale' => array(
                  'location' => 'query',
                  'type' => 'string',
                ),
                'maxAllowedMaturityRating' => array(
                  'location' => 'query',
                  'type' => 'string',
                ),
                'source' => array(
                  'location' => 'query',
                  'type' => 'string',
                ),
              ),
            ),
          )
        )
    );
    $this->volumes_mybooks = new Google_Service_Books_Resource_VolumesMybooks(
        $this,
        $this->serviceName,
        'mybooks',
        array(
          'methods' => array(
            'list' => array(
              'path' => 'volumes/mybooks',
              'httpMethod' => 'GET',
              'parameters' => array(
                'acquireMethod' => array(
                  'location' => 'query',
                  'type' => 'string',
                  'repeated' => true,
                ),
                'country' => array(
                  'location' => 'query',
                  'type' => 'string',
                ),
                'locale' => array(
                  'location' => 'query',
                  'type' => 'string',
                ),
                'maxResults' => array(
                  'location' => 'query',
                  'type' => 'integer',
                ),
                'processingState' => array(
                  'location' => 'query',
                  'type' => 'string',
                  'repeated' => true,
                ),
                'source' => array(
                  'location' => 'query',
                  'type' => 'string',
                ),
                'startIndex' => array(
                  'location' => 'query',
                  'type' => 'integer',
                ),
              ),
            ),
          )
        )
    );
    $this->volumes_recommended = new Google_Service_Books_Resource_VolumesRecommended(
        $this,
        $this->serviceName,
        'recommended',
        array(
          'methods' => array(
            'list' => array(
              'path' => 'volumes/recommended',
              'httpMethod' => 'GET',
              'parameters' => array(
                'locale' => array(
                  'location' => 'query',
                  'type' => 'string',
                ),
                'maxAllowedMaturityRating' => array(
                  'location' => 'query',
                  'type' => 'string',
                ),
                'source' => array(
                  'location' => 'query',
                  'type' => 'string',
                ),
              ),
            ),'rate' => array(
              'path' => 'volumes/recommended/rate',
              'httpMethod' => 'POST',
              'parameters' => array(
                'rating' => array(
                  'location' => 'query',
                  'type' => 'string',
                  'required' => true,
                ),
                'volumeId' => array(
                  'location' => 'query',
                  'type' => 'string',
                  'required' => true,
                ),
                'locale' => array(
                  'location' => 'query',
                  'type' => 'string',
                ),
                'source' => array(
                  'location' => 'query',
                  'type' => 'string',
                ),
              ),
            ),
          )
        )
    );
    $this->volumes_useruploaded = new Google_Service_Books_Resource_VolumesUseruploaded(
        $this,
        $this->serviceName,
        'useruploaded',
        array(
          'methods' => array(
            'list' => array(
              'path' => 'volumes/useruploaded',
              'httpMethod' => 'GET',
              'parameters' => array(
                'locale' => array(
                  'location' => 'query',
                  'type' => 'string',
                ),
                'maxResults' => array(
                  'location' => 'query',
                  'type' => 'integer',
                ),
                'processingState' => array(
                  'location' => 'query',
                  'type' => 'string',
                  'repeated' => true,
                ),
                'source' => array(
                  'location' => 'query',
                  'type' => 'string',
                ),
                'startIndex' => array(
                  'location' => 'query',
                  'type' => 'integer',
                ),
                'volumeId' => array(
                  'location' => 'query',
                  'type' => 'string',
                  'repeated' => true,
                ),
              ),
            ),
          )
        )
    );
  }
}
