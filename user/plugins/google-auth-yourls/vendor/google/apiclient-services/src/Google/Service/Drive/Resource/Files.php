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
 * The "files" collection of methods.
 * Typical usage is:
 *  <code>
 *   $driveService = new Google_Service_Drive(...);
 *   $files = $driveService->files;
 *  </code>
 */
class Google_Service_Drive_Resource_Files extends Google_Service_Resource
{
  /**
   * Creates a copy of a file and applies any requested updates with patch
   * semantics. (files.copy)
   *
   * @param string $fileId The ID of the file.
   * @param Google_Service_Drive_DriveFile $postBody
   * @param array $optParams Optional parameters.
   *
   * @opt_param bool ignoreDefaultVisibility Whether to ignore the domain's
   * default visibility settings for the created file. Domain administrators can
   * choose to make all uploaded files visible to the domain by default; this
   * parameter bypasses that behavior for the request. Permissions are still
   * inherited from parent folders.
   * @opt_param bool keepRevisionForever Whether to set the 'keepForever' field in
   * the new head revision. This is only applicable to files with binary content
   * in Drive.
   * @opt_param string ocrLanguage A language hint for OCR processing during image
   * import (ISO 639-1 code).
   * @opt_param bool supportsTeamDrives Whether the requesting application
   * supports Team Drives.
   * @return Google_Service_Drive_DriveFile
   */
  public function copy($fileId, Google_Service_Drive_DriveFile $postBody, $optParams = array())
  {
    $params = array('fileId' => $fileId, 'postBody' => $postBody);
    $params = array_merge($params, $optParams);
    return $this->call('copy', array($params), "Google_Service_Drive_DriveFile");
  }
  /**
   * Creates a new file. (files.create)
   *
   * @param Google_Service_Drive_DriveFile $postBody
   * @param array $optParams Optional parameters.
   *
   * @opt_param bool ignoreDefaultVisibility Whether to ignore the domain's
   * default visibility settings for the created file. Domain administrators can
   * choose to make all uploaded files visible to the domain by default; this
   * parameter bypasses that behavior for the request. Permissions are still
   * inherited from parent folders.
   * @opt_param bool keepRevisionForever Whether to set the 'keepForever' field in
   * the new head revision. This is only applicable to files with binary content
   * in Drive.
   * @opt_param string ocrLanguage A language hint for OCR processing during image
   * import (ISO 639-1 code).
   * @opt_param bool supportsTeamDrives Whether the requesting application
   * supports Team Drives.
   * @opt_param bool useContentAsIndexableText Whether to use the uploaded content
   * as indexable text.
   * @return Google_Service_Drive_DriveFile
   */
  public function create(Google_Service_Drive_DriveFile $postBody, $optParams = array())
  {
    $params = array('postBody' => $postBody);
    $params = array_merge($params, $optParams);
    return $this->call('create', array($params), "Google_Service_Drive_DriveFile");
  }
  /**
   * Permanently deletes a file owned by the user without moving it to the trash.
   * If the file belongs to a Team Drive the user must be an organizer on the
   * parent. If the target is a folder, all descendants owned by the user are also
   * deleted. (files.delete)
   *
   * @param string $fileId The ID of the file.
   * @param array $optParams Optional parameters.
   *
   * @opt_param bool supportsTeamDrives Whether the requesting application
   * supports Team Drives.
   */
  public function delete($fileId, $optParams = array())
  {
    $params = array('fileId' => $fileId);
    $params = array_merge($params, $optParams);
    return $this->call('delete', array($params));
  }
  /**
   * Permanently deletes all of the user's trashed files. (files.emptyTrash)
   *
   * @param array $optParams Optional parameters.
   */
  public function emptyTrash($optParams = array())
  {
    $params = array();
    $params = array_merge($params, $optParams);
    return $this->call('emptyTrash', array($params));
  }
  /**
   * Exports a Google Doc to the requested MIME type and returns the exported
   * content. Please note that the exported content is limited to 10MB.
   * (files.export)
   *
   * @param string $fileId The ID of the file.
   * @param string $mimeType The MIME type of the format requested for this
   * export.
   * @param array $optParams Optional parameters.
   */
  public function export($fileId, $mimeType, $optParams = array())
  {
    $params = array('fileId' => $fileId, 'mimeType' => $mimeType);
    $params = array_merge($params, $optParams);
    return $this->call('export', array($params));
  }
  /**
   * Generates a set of file IDs which can be provided in create requests.
   * (files.generateIds)
   *
   * @param array $optParams Optional parameters.
   *
   * @opt_param int count The number of IDs to return.
   * @opt_param string space The space in which the IDs can be used to create new
   * files. Supported values are 'drive' and 'appDataFolder'.
   * @return Google_Service_Drive_GeneratedIds
   */
  public function generateIds($optParams = array())
  {
    $params = array();
    $params = array_merge($params, $optParams);
    return $this->call('generateIds', array($params), "Google_Service_Drive_GeneratedIds");
  }
  /**
   * Gets a file's metadata or content by ID. (files.get)
   *
   * @param string $fileId The ID of the file.
   * @param array $optParams Optional parameters.
   *
   * @opt_param bool acknowledgeAbuse Whether the user is acknowledging the risk
   * of downloading known malware or other abusive files. This is only applicable
   * when alt=media.
   * @opt_param bool supportsTeamDrives Whether the requesting application
   * supports Team Drives.
   * @return Google_Service_Drive_DriveFile
   */
  public function get($fileId, $optParams = array())
  {
    $params = array('fileId' => $fileId);
    $params = array_merge($params, $optParams);
    return $this->call('get', array($params), "Google_Service_Drive_DriveFile");
  }
  /**
   * Lists or searches files. (files.listFiles)
   *
   * @param array $optParams Optional parameters.
   *
   * @opt_param string corpora Comma-separated list of bodies of items
   * (files/documents) to which the query applies. Supported bodies are 'user',
   * 'domain', 'teamDrive' and 'allTeamDrives'. 'allTeamDrives' must be combined
   * with 'user'; all other values must be used in isolation. Prefer 'user' or
   * 'teamDrive' to 'allTeamDrives' for efficiency.
   * @opt_param string corpus The source of files to list. Deprecated: use
   * 'corpora' instead.
   * @opt_param bool includeTeamDriveItems Whether Team Drive items should be
   * included in results.
   * @opt_param string orderBy A comma-separated list of sort keys. Valid keys are
   * 'createdTime', 'folder', 'modifiedByMeTime', 'modifiedTime', 'name',
   * 'name_natural', 'quotaBytesUsed', 'recency', 'sharedWithMeTime', 'starred',
   * and 'viewedByMeTime'. Each key sorts ascending by default, but may be
   * reversed with the 'desc' modifier. Example usage:
   * ?orderBy=folder,modifiedTime desc,name. Please note that there is a current
   * limitation for users with approximately one million files in which the
   * requested sort order is ignored.
   * @opt_param int pageSize The maximum number of files to return per page.
   * Partial or empty result pages are possible even before the end of the files
   * list has been reached.
   * @opt_param string pageToken The token for continuing a previous list request
   * on the next page. This should be set to the value of 'nextPageToken' from the
   * previous response.
   * @opt_param string q A query for filtering the file results. See the "Search
   * for Files" guide for supported syntax.
   * @opt_param string spaces A comma-separated list of spaces to query within the
   * corpus. Supported values are 'drive', 'appDataFolder' and 'photos'.
   * @opt_param bool supportsTeamDrives Whether the requesting application
   * supports Team Drives.
   * @opt_param string teamDriveId ID of Team Drive to search.
   * @return Google_Service_Drive_FileList
   */
  public function listFiles($optParams = array())
  {
    $params = array();
    $params = array_merge($params, $optParams);
    return $this->call('list', array($params), "Google_Service_Drive_FileList");
  }
  /**
   * Updates a file's metadata and/or content with patch semantics. (files.update)
   *
   * @param string $fileId The ID of the file.
   * @param Google_Service_Drive_DriveFile $postBody
   * @param array $optParams Optional parameters.
   *
   * @opt_param string addParents A comma-separated list of parent IDs to add.
   * @opt_param bool keepRevisionForever Whether to set the 'keepForever' field in
   * the new head revision. This is only applicable to files with binary content
   * in Drive.
   * @opt_param string ocrLanguage A language hint for OCR processing during image
   * import (ISO 639-1 code).
   * @opt_param string removeParents A comma-separated list of parent IDs to
   * remove.
   * @opt_param bool supportsTeamDrives Whether the requesting application
   * supports Team Drives.
   * @opt_param bool useContentAsIndexableText Whether to use the uploaded content
   * as indexable text.
   * @return Google_Service_Drive_DriveFile
   */
  public function update($fileId, Google_Service_Drive_DriveFile $postBody, $optParams = array())
  {
    $params = array('fileId' => $fileId, 'postBody' => $postBody);
    $params = array_merge($params, $optParams);
    return $this->call('update', array($params), "Google_Service_Drive_DriveFile");
  }
  /**
   * Subscribes to changes to a file (files.watch)
   *
   * @param string $fileId The ID of the file.
   * @param Google_Service_Drive_Channel $postBody
   * @param array $optParams Optional parameters.
   *
   * @opt_param bool acknowledgeAbuse Whether the user is acknowledging the risk
   * of downloading known malware or other abusive files. This is only applicable
   * when alt=media.
   * @opt_param bool supportsTeamDrives Whether the requesting application
   * supports Team Drives.
   * @return Google_Service_Drive_Channel
   */
  public function watch($fileId, Google_Service_Drive_Channel $postBody, $optParams = array())
  {
    $params = array('fileId' => $fileId, 'postBody' => $postBody);
    $params = array_merge($params, $optParams);
    return $this->call('watch', array($params), "Google_Service_Drive_Channel");
  }
}
