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
 * The "directorySiteContacts" collection of methods.
 * Typical usage is:
 *  <code>
 *   $dfareportingService = new Google_Service_Dfareporting(...);
 *   $directorySiteContacts = $dfareportingService->directorySiteContacts;
 *  </code>
 */
class Google_Service_Dfareporting_Resource_DirectorySiteContacts extends Google_Service_Resource
{
  /**
   * Gets one directory site contact by ID. (directorySiteContacts.get)
   *
   * @param string $profileId User profile ID associated with this request.
   * @param string $id Directory site contact ID.
   * @param array $optParams Optional parameters.
   * @return Google_Service_Dfareporting_DirectorySiteContact
   */
  public function get($profileId, $id, $optParams = array())
  {
    $params = array('profileId' => $profileId, 'id' => $id);
    $params = array_merge($params, $optParams);
    return $this->call('get', array($params), "Google_Service_Dfareporting_DirectorySiteContact");
  }
  /**
   * Retrieves a list of directory site contacts, possibly filtered. This method
   * supports paging. (directorySiteContacts.listDirectorySiteContacts)
   *
   * @param string $profileId User profile ID associated with this request.
   * @param array $optParams Optional parameters.
   *
   * @opt_param string directorySiteIds Select only directory site contacts with
   * these directory site IDs. This is a required field.
   * @opt_param string ids Select only directory site contacts with these IDs.
   * @opt_param int maxResults Maximum number of results to return.
   * @opt_param string pageToken Value of the nextPageToken from the previous
   * result page.
   * @opt_param string searchString Allows searching for objects by name, ID or
   * email. Wildcards (*) are allowed. For example, "directory site contact*2015"
   * will return objects with names like "directory site contact June 2015",
   * "directory site contact April 2015", or simply "directory site contact 2015".
   * Most of the searches also add wildcards implicitly at the start and the end
   * of the search string. For example, a search string of "directory site
   * contact" will match objects with name "my directory site contact", "directory
   * site contact 2015", or simply "directory site contact".
   * @opt_param string sortField Field by which to sort the list.
   * @opt_param string sortOrder Order of sorted results.
   * @return Google_Service_Dfareporting_DirectorySiteContactsListResponse
   */
  public function listDirectorySiteContacts($profileId, $optParams = array())
  {
    $params = array('profileId' => $profileId);
    $params = array_merge($params, $optParams);
    return $this->call('list', array($params), "Google_Service_Dfareporting_DirectorySiteContactsListResponse");
  }
}
