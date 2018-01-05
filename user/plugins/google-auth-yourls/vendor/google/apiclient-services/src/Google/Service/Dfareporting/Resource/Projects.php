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
 * The "projects" collection of methods.
 * Typical usage is:
 *  <code>
 *   $dfareportingService = new Google_Service_Dfareporting(...);
 *   $projects = $dfareportingService->projects;
 *  </code>
 */
class Google_Service_Dfareporting_Resource_Projects extends Google_Service_Resource
{
  /**
   * Gets one project by ID. (projects.get)
   *
   * @param string $profileId User profile ID associated with this request.
   * @param string $id Project ID.
   * @param array $optParams Optional parameters.
   * @return Google_Service_Dfareporting_Project
   */
  public function get($profileId, $id, $optParams = array())
  {
    $params = array('profileId' => $profileId, 'id' => $id);
    $params = array_merge($params, $optParams);
    return $this->call('get', array($params), "Google_Service_Dfareporting_Project");
  }
  /**
   * Retrieves a list of projects, possibly filtered. This method supports paging.
   * (projects.listProjects)
   *
   * @param string $profileId User profile ID associated with this request.
   * @param array $optParams Optional parameters.
   *
   * @opt_param string advertiserIds Select only projects with these advertiser
   * IDs.
   * @opt_param string ids Select only projects with these IDs.
   * @opt_param int maxResults Maximum number of results to return.
   * @opt_param string pageToken Value of the nextPageToken from the previous
   * result page.
   * @opt_param string searchString Allows searching for projects by name or ID.
   * Wildcards (*) are allowed. For example, "project*2015" will return projects
   * with names like "project June 2015", "project April 2015", or simply "project
   * 2015". Most of the searches also add wildcards implicitly at the start and
   * the end of the search string. For example, a search string of "project" will
   * match projects with name "my project", "project 2015", or simply "project".
   * @opt_param string sortField Field by which to sort the list.
   * @opt_param string sortOrder Order of sorted results.
   * @return Google_Service_Dfareporting_ProjectsListResponse
   */
  public function listProjects($profileId, $optParams = array())
  {
    $params = array('profileId' => $profileId);
    $params = array_merge($params, $optParams);
    return $this->call('list', array($params), "Google_Service_Dfareporting_ProjectsListResponse");
  }
}
