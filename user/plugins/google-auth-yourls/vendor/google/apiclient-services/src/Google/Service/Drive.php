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
 * Service definition for Drive (v3).
 *
 * <p>
 * Manages files in Drive including uploading, downloading, searching, detecting
 * changes, and updating sharing permissions.</p>
 *
 * <p>
 * For more information about this service, see the API
 * <a href="https://developers.google.com/drive/" target="_blank">Documentation</a>
 * </p>
 *
 * @author Google, Inc.
 */
class Google_Service_Drive extends Google_Service
{
  /** View and manage the files in your Google Drive. */
  const DRIVE =
      "https://www.googleapis.com/auth/drive";
  /** View and manage its own configuration data in your Google Drive. */
  const DRIVE_APPDATA =
      "https://www.googleapis.com/auth/drive.appdata";
  /** View and manage Google Drive files and folders that you have opened or created with this app. */
  const DRIVE_FILE =
      "https://www.googleapis.com/auth/drive.file";
  /** View and manage metadata of files in your Google Drive. */
  const DRIVE_METADATA =
      "https://www.googleapis.com/auth/drive.metadata";
  /** View metadata for files in your Google Drive. */
  const DRIVE_METADATA_READONLY =
      "https://www.googleapis.com/auth/drive.metadata.readonly";
  /** View the photos, videos and albums in your Google Photos. */
  const DRIVE_PHOTOS_READONLY =
      "https://www.googleapis.com/auth/drive.photos.readonly";
  /** View the files in your Google Drive. */
  const DRIVE_READONLY =
      "https://www.googleapis.com/auth/drive.readonly";
  /** Modify your Google Apps Script scripts' behavior. */
  const DRIVE_SCRIPTS =
      "https://www.googleapis.com/auth/drive.scripts";

  public $about;
  public $changes;
  public $channels;
  public $comments;
  public $files;
  public $permissions;
  public $replies;
  public $revisions;
  public $teamdrives;
  
  /**
   * Constructs the internal representation of the Drive service.
   *
   * @param Google_Client $client
   */
  public function __construct(Google_Client $client)
  {
    parent::__construct($client);
    $this->rootUrl = 'https://www.googleapis.com/';
    $this->servicePath = 'drive/v3/';
    $this->version = 'v3';
    $this->serviceName = 'drive';

    $this->about = new Google_Service_Drive_Resource_About(
        $this,
        $this->serviceName,
        'about',
        array(
          'methods' => array(
            'get' => array(
              'path' => 'about',
              'httpMethod' => 'GET',
              'parameters' => array(),
            ),
          )
        )
    );
    $this->changes = new Google_Service_Drive_Resource_Changes(
        $this,
        $this->serviceName,
        'changes',
        array(
          'methods' => array(
            'getStartPageToken' => array(
              'path' => 'changes/startPageToken',
              'httpMethod' => 'GET',
              'parameters' => array(
                'supportsTeamDrives' => array(
                  'location' => 'query',
                  'type' => 'boolean',
                ),
                'teamDriveId' => array(
                  'location' => 'query',
                  'type' => 'string',
                ),
              ),
            ),'list' => array(
              'path' => 'changes',
              'httpMethod' => 'GET',
              'parameters' => array(
                'pageToken' => array(
                  'location' => 'query',
                  'type' => 'string',
                  'required' => true,
                ),
                'includeCorpusRemovals' => array(
                  'location' => 'query',
                  'type' => 'boolean',
                ),
                'includeRemoved' => array(
                  'location' => 'query',
                  'type' => 'boolean',
                ),
                'includeTeamDriveItems' => array(
                  'location' => 'query',
                  'type' => 'boolean',
                ),
                'pageSize' => array(
                  'location' => 'query',
                  'type' => 'integer',
                ),
                'restrictToMyDrive' => array(
                  'location' => 'query',
                  'type' => 'boolean',
                ),
                'spaces' => array(
                  'location' => 'query',
                  'type' => 'string',
                ),
                'supportsTeamDrives' => array(
                  'location' => 'query',
                  'type' => 'boolean',
                ),
                'teamDriveId' => array(
                  'location' => 'query',
                  'type' => 'string',
                ),
              ),
            ),'watch' => array(
              'path' => 'changes/watch',
              'httpMethod' => 'POST',
              'parameters' => array(
                'pageToken' => array(
                  'location' => 'query',
                  'type' => 'string',
                  'required' => true,
                ),
                'includeCorpusRemovals' => array(
                  'location' => 'query',
                  'type' => 'boolean',
                ),
                'includeRemoved' => array(
                  'location' => 'query',
                  'type' => 'boolean',
                ),
                'includeTeamDriveItems' => array(
                  'location' => 'query',
                  'type' => 'boolean',
                ),
                'pageSize' => array(
                  'location' => 'query',
                  'type' => 'integer',
                ),
                'restrictToMyDrive' => array(
                  'location' => 'query',
                  'type' => 'boolean',
                ),
                'spaces' => array(
                  'location' => 'query',
                  'type' => 'string',
                ),
                'supportsTeamDrives' => array(
                  'location' => 'query',
                  'type' => 'boolean',
                ),
                'teamDriveId' => array(
                  'location' => 'query',
                  'type' => 'string',
                ),
              ),
            ),
          )
        )
    );
    $this->channels = new Google_Service_Drive_Resource_Channels(
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
    $this->comments = new Google_Service_Drive_Resource_Comments(
        $this,
        $this->serviceName,
        'comments',
        array(
          'methods' => array(
            'create' => array(
              'path' => 'files/{fileId}/comments',
              'httpMethod' => 'POST',
              'parameters' => array(
                'fileId' => array(
                  'location' => 'path',
                  'type' => 'string',
                  'required' => true,
                ),
              ),
            ),'delete' => array(
              'path' => 'files/{fileId}/comments/{commentId}',
              'httpMethod' => 'DELETE',
              'parameters' => array(
                'fileId' => array(
                  'location' => 'path',
                  'type' => 'string',
                  'required' => true,
                ),
                'commentId' => array(
                  'location' => 'path',
                  'type' => 'string',
                  'required' => true,
                ),
              ),
            ),'get' => array(
              'path' => 'files/{fileId}/comments/{commentId}',
              'httpMethod' => 'GET',
              'parameters' => array(
                'fileId' => array(
                  'location' => 'path',
                  'type' => 'string',
                  'required' => true,
                ),
                'commentId' => array(
                  'location' => 'path',
                  'type' => 'string',
                  'required' => true,
                ),
                'includeDeleted' => array(
                  'location' => 'query',
                  'type' => 'boolean',
                ),
              ),
            ),'list' => array(
              'path' => 'files/{fileId}/comments',
              'httpMethod' => 'GET',
              'parameters' => array(
                'fileId' => array(
                  'location' => 'path',
                  'type' => 'string',
                  'required' => true,
                ),
                'includeDeleted' => array(
                  'location' => 'query',
                  'type' => 'boolean',
                ),
                'pageSize' => array(
                  'location' => 'query',
                  'type' => 'integer',
                ),
                'pageToken' => array(
                  'location' => 'query',
                  'type' => 'string',
                ),
                'startModifiedTime' => array(
                  'location' => 'query',
                  'type' => 'string',
                ),
              ),
            ),'update' => array(
              'path' => 'files/{fileId}/comments/{commentId}',
              'httpMethod' => 'PATCH',
              'parameters' => array(
                'fileId' => array(
                  'location' => 'path',
                  'type' => 'string',
                  'required' => true,
                ),
                'commentId' => array(
                  'location' => 'path',
                  'type' => 'string',
                  'required' => true,
                ),
              ),
            ),
          )
        )
    );
    $this->files = new Google_Service_Drive_Resource_Files(
        $this,
        $this->serviceName,
        'files',
        array(
          'methods' => array(
            'copy' => array(
              'path' => 'files/{fileId}/copy',
              'httpMethod' => 'POST',
              'parameters' => array(
                'fileId' => array(
                  'location' => 'path',
                  'type' => 'string',
                  'required' => true,
                ),
                'ignoreDefaultVisibility' => array(
                  'location' => 'query',
                  'type' => 'boolean',
                ),
                'keepRevisionForever' => array(
                  'location' => 'query',
                  'type' => 'boolean',
                ),
                'ocrLanguage' => array(
                  'location' => 'query',
                  'type' => 'string',
                ),
                'supportsTeamDrives' => array(
                  'location' => 'query',
                  'type' => 'boolean',
                ),
              ),
            ),'create' => array(
              'path' => 'files',
              'httpMethod' => 'POST',
              'parameters' => array(
                'ignoreDefaultVisibility' => array(
                  'location' => 'query',
                  'type' => 'boolean',
                ),
                'keepRevisionForever' => array(
                  'location' => 'query',
                  'type' => 'boolean',
                ),
                'ocrLanguage' => array(
                  'location' => 'query',
                  'type' => 'string',
                ),
                'supportsTeamDrives' => array(
                  'location' => 'query',
                  'type' => 'boolean',
                ),
                'useContentAsIndexableText' => array(
                  'location' => 'query',
                  'type' => 'boolean',
                ),
              ),
            ),'delete' => array(
              'path' => 'files/{fileId}',
              'httpMethod' => 'DELETE',
              'parameters' => array(
                'fileId' => array(
                  'location' => 'path',
                  'type' => 'string',
                  'required' => true,
                ),
                'supportsTeamDrives' => array(
                  'location' => 'query',
                  'type' => 'boolean',
                ),
              ),
            ),'emptyTrash' => array(
              'path' => 'files/trash',
              'httpMethod' => 'DELETE',
              'parameters' => array(),
            ),'export' => array(
              'path' => 'files/{fileId}/export',
              'httpMethod' => 'GET',
              'parameters' => array(
                'fileId' => array(
                  'location' => 'path',
                  'type' => 'string',
                  'required' => true,
                ),
                'mimeType' => array(
                  'location' => 'query',
                  'type' => 'string',
                  'required' => true,
                ),
              ),
            ),'generateIds' => array(
              'path' => 'files/generateIds',
              'httpMethod' => 'GET',
              'parameters' => array(
                'count' => array(
                  'location' => 'query',
                  'type' => 'integer',
                ),
                'space' => array(
                  'location' => 'query',
                  'type' => 'string',
                ),
              ),
            ),'get' => array(
              'path' => 'files/{fileId}',
              'httpMethod' => 'GET',
              'parameters' => array(
                'fileId' => array(
                  'location' => 'path',
                  'type' => 'string',
                  'required' => true,
                ),
                'acknowledgeAbuse' => array(
                  'location' => 'query',
                  'type' => 'boolean',
                ),
                'supportsTeamDrives' => array(
                  'location' => 'query',
                  'type' => 'boolean',
                ),
              ),
            ),'list' => array(
              'path' => 'files',
              'httpMethod' => 'GET',
              'parameters' => array(
                'corpora' => array(
                  'location' => 'query',
                  'type' => 'string',
                ),
                'corpus' => array(
                  'location' => 'query',
                  'type' => 'string',
                ),
                'includeTeamDriveItems' => array(
                  'location' => 'query',
                  'type' => 'boolean',
                ),
                'orderBy' => array(
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
                'q' => array(
                  'location' => 'query',
                  'type' => 'string',
                ),
                'spaces' => array(
                  'location' => 'query',
                  'type' => 'string',
                ),
                'supportsTeamDrives' => array(
                  'location' => 'query',
                  'type' => 'boolean',
                ),
                'teamDriveId' => array(
                  'location' => 'query',
                  'type' => 'string',
                ),
              ),
            ),'update' => array(
              'path' => 'files/{fileId}',
              'httpMethod' => 'PATCH',
              'parameters' => array(
                'fileId' => array(
                  'location' => 'path',
                  'type' => 'string',
                  'required' => true,
                ),
                'addParents' => array(
                  'location' => 'query',
                  'type' => 'string',
                ),
                'keepRevisionForever' => array(
                  'location' => 'query',
                  'type' => 'boolean',
                ),
                'ocrLanguage' => array(
                  'location' => 'query',
                  'type' => 'string',
                ),
                'removeParents' => array(
                  'location' => 'query',
                  'type' => 'string',
                ),
                'supportsTeamDrives' => array(
                  'location' => 'query',
                  'type' => 'boolean',
                ),
                'useContentAsIndexableText' => array(
                  'location' => 'query',
                  'type' => 'boolean',
                ),
              ),
            ),'watch' => array(
              'path' => 'files/{fileId}/watch',
              'httpMethod' => 'POST',
              'parameters' => array(
                'fileId' => array(
                  'location' => 'path',
                  'type' => 'string',
                  'required' => true,
                ),
                'acknowledgeAbuse' => array(
                  'location' => 'query',
                  'type' => 'boolean',
                ),
                'supportsTeamDrives' => array(
                  'location' => 'query',
                  'type' => 'boolean',
                ),
              ),
            ),
          )
        )
    );
    $this->permissions = new Google_Service_Drive_Resource_Permissions(
        $this,
        $this->serviceName,
        'permissions',
        array(
          'methods' => array(
            'create' => array(
              'path' => 'files/{fileId}/permissions',
              'httpMethod' => 'POST',
              'parameters' => array(
                'fileId' => array(
                  'location' => 'path',
                  'type' => 'string',
                  'required' => true,
                ),
                'emailMessage' => array(
                  'location' => 'query',
                  'type' => 'string',
                ),
                'sendNotificationEmail' => array(
                  'location' => 'query',
                  'type' => 'boolean',
                ),
                'supportsTeamDrives' => array(
                  'location' => 'query',
                  'type' => 'boolean',
                ),
                'transferOwnership' => array(
                  'location' => 'query',
                  'type' => 'boolean',
                ),
                'useDomainAdminAccess' => array(
                  'location' => 'query',
                  'type' => 'boolean',
                ),
              ),
            ),'delete' => array(
              'path' => 'files/{fileId}/permissions/{permissionId}',
              'httpMethod' => 'DELETE',
              'parameters' => array(
                'fileId' => array(
                  'location' => 'path',
                  'type' => 'string',
                  'required' => true,
                ),
                'permissionId' => array(
                  'location' => 'path',
                  'type' => 'string',
                  'required' => true,
                ),
                'supportsTeamDrives' => array(
                  'location' => 'query',
                  'type' => 'boolean',
                ),
                'useDomainAdminAccess' => array(
                  'location' => 'query',
                  'type' => 'boolean',
                ),
              ),
            ),'get' => array(
              'path' => 'files/{fileId}/permissions/{permissionId}',
              'httpMethod' => 'GET',
              'parameters' => array(
                'fileId' => array(
                  'location' => 'path',
                  'type' => 'string',
                  'required' => true,
                ),
                'permissionId' => array(
                  'location' => 'path',
                  'type' => 'string',
                  'required' => true,
                ),
                'supportsTeamDrives' => array(
                  'location' => 'query',
                  'type' => 'boolean',
                ),
                'useDomainAdminAccess' => array(
                  'location' => 'query',
                  'type' => 'boolean',
                ),
              ),
            ),'list' => array(
              'path' => 'files/{fileId}/permissions',
              'httpMethod' => 'GET',
              'parameters' => array(
                'fileId' => array(
                  'location' => 'path',
                  'type' => 'string',
                  'required' => true,
                ),
                'pageSize' => array(
                  'location' => 'query',
                  'type' => 'integer',
                ),
                'pageToken' => array(
                  'location' => 'query',
                  'type' => 'string',
                ),
                'supportsTeamDrives' => array(
                  'location' => 'query',
                  'type' => 'boolean',
                ),
                'useDomainAdminAccess' => array(
                  'location' => 'query',
                  'type' => 'boolean',
                ),
              ),
            ),'update' => array(
              'path' => 'files/{fileId}/permissions/{permissionId}',
              'httpMethod' => 'PATCH',
              'parameters' => array(
                'fileId' => array(
                  'location' => 'path',
                  'type' => 'string',
                  'required' => true,
                ),
                'permissionId' => array(
                  'location' => 'path',
                  'type' => 'string',
                  'required' => true,
                ),
                'removeExpiration' => array(
                  'location' => 'query',
                  'type' => 'boolean',
                ),
                'supportsTeamDrives' => array(
                  'location' => 'query',
                  'type' => 'boolean',
                ),
                'transferOwnership' => array(
                  'location' => 'query',
                  'type' => 'boolean',
                ),
                'useDomainAdminAccess' => array(
                  'location' => 'query',
                  'type' => 'boolean',
                ),
              ),
            ),
          )
        )
    );
    $this->replies = new Google_Service_Drive_Resource_Replies(
        $this,
        $this->serviceName,
        'replies',
        array(
          'methods' => array(
            'create' => array(
              'path' => 'files/{fileId}/comments/{commentId}/replies',
              'httpMethod' => 'POST',
              'parameters' => array(
                'fileId' => array(
                  'location' => 'path',
                  'type' => 'string',
                  'required' => true,
                ),
                'commentId' => array(
                  'location' => 'path',
                  'type' => 'string',
                  'required' => true,
                ),
              ),
            ),'delete' => array(
              'path' => 'files/{fileId}/comments/{commentId}/replies/{replyId}',
              'httpMethod' => 'DELETE',
              'parameters' => array(
                'fileId' => array(
                  'location' => 'path',
                  'type' => 'string',
                  'required' => true,
                ),
                'commentId' => array(
                  'location' => 'path',
                  'type' => 'string',
                  'required' => true,
                ),
                'replyId' => array(
                  'location' => 'path',
                  'type' => 'string',
                  'required' => true,
                ),
              ),
            ),'get' => array(
              'path' => 'files/{fileId}/comments/{commentId}/replies/{replyId}',
              'httpMethod' => 'GET',
              'parameters' => array(
                'fileId' => array(
                  'location' => 'path',
                  'type' => 'string',
                  'required' => true,
                ),
                'commentId' => array(
                  'location' => 'path',
                  'type' => 'string',
                  'required' => true,
                ),
                'replyId' => array(
                  'location' => 'path',
                  'type' => 'string',
                  'required' => true,
                ),
                'includeDeleted' => array(
                  'location' => 'query',
                  'type' => 'boolean',
                ),
              ),
            ),'list' => array(
              'path' => 'files/{fileId}/comments/{commentId}/replies',
              'httpMethod' => 'GET',
              'parameters' => array(
                'fileId' => array(
                  'location' => 'path',
                  'type' => 'string',
                  'required' => true,
                ),
                'commentId' => array(
                  'location' => 'path',
                  'type' => 'string',
                  'required' => true,
                ),
                'includeDeleted' => array(
                  'location' => 'query',
                  'type' => 'boolean',
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
            ),'update' => array(
              'path' => 'files/{fileId}/comments/{commentId}/replies/{replyId}',
              'httpMethod' => 'PATCH',
              'parameters' => array(
                'fileId' => array(
                  'location' => 'path',
                  'type' => 'string',
                  'required' => true,
                ),
                'commentId' => array(
                  'location' => 'path',
                  'type' => 'string',
                  'required' => true,
                ),
                'replyId' => array(
                  'location' => 'path',
                  'type' => 'string',
                  'required' => true,
                ),
              ),
            ),
          )
        )
    );
    $this->revisions = new Google_Service_Drive_Resource_Revisions(
        $this,
        $this->serviceName,
        'revisions',
        array(
          'methods' => array(
            'delete' => array(
              'path' => 'files/{fileId}/revisions/{revisionId}',
              'httpMethod' => 'DELETE',
              'parameters' => array(
                'fileId' => array(
                  'location' => 'path',
                  'type' => 'string',
                  'required' => true,
                ),
                'revisionId' => array(
                  'location' => 'path',
                  'type' => 'string',
                  'required' => true,
                ),
              ),
            ),'get' => array(
              'path' => 'files/{fileId}/revisions/{revisionId}',
              'httpMethod' => 'GET',
              'parameters' => array(
                'fileId' => array(
                  'location' => 'path',
                  'type' => 'string',
                  'required' => true,
                ),
                'revisionId' => array(
                  'location' => 'path',
                  'type' => 'string',
                  'required' => true,
                ),
                'acknowledgeAbuse' => array(
                  'location' => 'query',
                  'type' => 'boolean',
                ),
              ),
            ),'list' => array(
              'path' => 'files/{fileId}/revisions',
              'httpMethod' => 'GET',
              'parameters' => array(
                'fileId' => array(
                  'location' => 'path',
                  'type' => 'string',
                  'required' => true,
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
            ),'update' => array(
              'path' => 'files/{fileId}/revisions/{revisionId}',
              'httpMethod' => 'PATCH',
              'parameters' => array(
                'fileId' => array(
                  'location' => 'path',
                  'type' => 'string',
                  'required' => true,
                ),
                'revisionId' => array(
                  'location' => 'path',
                  'type' => 'string',
                  'required' => true,
                ),
              ),
            ),
          )
        )
    );
    $this->teamdrives = new Google_Service_Drive_Resource_Teamdrives(
        $this,
        $this->serviceName,
        'teamdrives',
        array(
          'methods' => array(
            'create' => array(
              'path' => 'teamdrives',
              'httpMethod' => 'POST',
              'parameters' => array(
                'requestId' => array(
                  'location' => 'query',
                  'type' => 'string',
                  'required' => true,
                ),
              ),
            ),'delete' => array(
              'path' => 'teamdrives/{teamDriveId}',
              'httpMethod' => 'DELETE',
              'parameters' => array(
                'teamDriveId' => array(
                  'location' => 'path',
                  'type' => 'string',
                  'required' => true,
                ),
              ),
            ),'get' => array(
              'path' => 'teamdrives/{teamDriveId}',
              'httpMethod' => 'GET',
              'parameters' => array(
                'teamDriveId' => array(
                  'location' => 'path',
                  'type' => 'string',
                  'required' => true,
                ),
                'useDomainAdminAccess' => array(
                  'location' => 'query',
                  'type' => 'boolean',
                ),
              ),
            ),'list' => array(
              'path' => 'teamdrives',
              'httpMethod' => 'GET',
              'parameters' => array(
                'pageSize' => array(
                  'location' => 'query',
                  'type' => 'integer',
                ),
                'pageToken' => array(
                  'location' => 'query',
                  'type' => 'string',
                ),
                'q' => array(
                  'location' => 'query',
                  'type' => 'string',
                ),
                'useDomainAdminAccess' => array(
                  'location' => 'query',
                  'type' => 'boolean',
                ),
              ),
            ),'update' => array(
              'path' => 'teamdrives/{teamDriveId}',
              'httpMethod' => 'PATCH',
              'parameters' => array(
                'teamDriveId' => array(
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
