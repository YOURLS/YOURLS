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
 * The "revisions" collection of methods.
 * Typical usage is:
 *  <code>
 *   $driveService = new Google_Service_Drive(...);
 *   $revisions = $driveService->revisions;
 *  </code>
 */
class Google_Service_Drive_Resource_Revisions extends Google_Service_Resource
{
  /**
   * Permanently deletes a revision. This method is only applicable to files with
   * binary content in Drive. (revisions.delete)
   *
   * @param string $fileId The ID of the file.
   * @param string $revisionId The ID of the revision.
   * @param array $optParams Optional parameters.
   */
  public function delete($fileId, $revisionId, $optParams = array())
  {
    $params = array('fileId' => $fileId, 'revisionId' => $revisionId);
    $params = array_merge($params, $optParams);
    return $this->call('delete', array($params));
  }
  /**
   * Gets a revision's metadata or content by ID. (revisions.get)
   *
   * @param string $fileId The ID of the file.
   * @param string $revisionId The ID of the revision.
   * @param array $optParams Optional parameters.
   *
   * @opt_param bool acknowledgeAbuse Whether the user is acknowledging the risk
   * of downloading known malware or other abusive files. This is only applicable
   * when alt=media.
   * @return Google_Service_Drive_Revision
   */
  public function get($fileId, $revisionId, $optParams = array())
  {
    $params = array('fileId' => $fileId, 'revisionId' => $revisionId);
    $params = array_merge($params, $optParams);
    return $this->call('get', array($params), "Google_Service_Drive_Revision");
  }
  /**
   * Lists a file's revisions. (revisions.listRevisions)
   *
   * @param string $fileId The ID of the file.
   * @param array $optParams Optional parameters.
   *
   * @opt_param int pageSize The maximum number of revisions to return per page.
   * @opt_param string pageToken The token for continuing a previous list request
   * on the next page. This should be set to the value of 'nextPageToken' from the
   * previous response.
   * @return Google_Service_Drive_RevisionList
   */
  public function listRevisions($fileId, $optParams = array())
  {
    $params = array('fileId' => $fileId);
    $params = array_merge($params, $optParams);
    return $this->call('list', array($params), "Google_Service_Drive_RevisionList");
  }
  /**
   * Updates a revision with patch semantics. (revisions.update)
   *
   * @param string $fileId The ID of the file.
   * @param string $revisionId The ID of the revision.
   * @param Google_Service_Drive_Revision $postBody
   * @param array $optParams Optional parameters.
   * @return Google_Service_Drive_Revision
   */
  public function update($fileId, $revisionId, Google_Service_Drive_Revision $postBody, $optParams = array())
  {
    $params = array('fileId' => $fileId, 'revisionId' => $revisionId, 'postBody' => $postBody);
    $params = array_merge($params, $optParams);
    return $this->call('update', array($params), "Google_Service_Drive_Revision");
  }
}
