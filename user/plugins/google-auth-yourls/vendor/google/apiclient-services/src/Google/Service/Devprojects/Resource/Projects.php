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
 *   $devprojectsService = new Google_Service_Devprojects(...);
 *   $projects = $devprojectsService->projects;
 *  </code>
 */
class Google_Service_Devprojects_Resource_Projects extends Google_Service_Resource
{
  /**
   * Deletes a resource. (projects.delete)
   *
   * @param string $projectId The Devconsole project ID.
   * @param array $optParams Optional parameters.
   *
   * @opt_param bool disableAuthorizationCheck If set to true, authorization
   * checks will be disabled for this request. This field is intended to be used
   * as part of rolling out IAM authorization checks in the CRM Projects API.
   * Initially, we will perform IAM authorization checks in the Projects API, but
   * ignore the result and simply log differences between IAM and DevConsole
   * authorization checks. Once we have confidence in IAM, we will enforce the IAM
   * check authorization checks and use this field to disable authorization
   * checking in DevConsole.
   * @opt_param string whitelistId The whitelist project ID. See
   * Projects.Insert.whitelist_id documentation for details.
   */
  public function delete($projectId, $optParams = array())
  {
    $params = array('projectId' => $projectId);
    $params = array_merge($params, $optParams);
    return $this->call('delete', array($params));
  }
  /**
   * Converts a developer key into a project id.
   * (projects.developerkeytoprojectid)
   *
   * @param string $developerKey The developer key
   * @param array $optParams Optional parameters.
   *
   * @opt_param string whitelistId The whitelist project ID. See
   * Projects.Insert.whitelist_id documentation for details.
   * @return Google_Service_Devprojects_ProjectsDeveloperKeyToProjectIdResponse
   */
  public function developerkeytoprojectid($developerKey, $optParams = array())
  {
    $params = array('developerKey' => $developerKey);
    $params = array_merge($params, $optParams);
    return $this->call('developerkeytoprojectid', array($params), "Google_Service_Devprojects_ProjectsDeveloperKeyToProjectIdResponse");
  }
  /**
   * Get a project. (projects.get)
   *
   * @param string $projectId The Devconsole project ID.
   * @param array $optParams Optional parameters.
   *
   * @opt_param string locale The language code, country code and locale variant
   * encoded as a single string. This is intended to be the locale for the end
   * user, and hence the target of translations. Presence of the language code
   * indicates that the response should include translation strings for the
   * requested sections, as appropriate.
   * @opt_param bool retrieveCurrentUserRole Whether to also retrieve the role of
   * the user for which the project is currently fetched
   * @opt_param string section The list of sections that should be returned. By
   * default, the API will only prefill the basic project data, since loading a
   * project in its entirety can take relatively long and is often not needed.
   * @opt_param string whitelistId The whitelist project ID. See
   * Projects.Insert.whitelist_id documentation for details.
   * @return Google_Service_Devprojects_ProjectData
   */
  public function get($projectId, $optParams = array())
  {
    $params = array('projectId' => $projectId);
    $params = array_merge($params, $optParams);
    return $this->call('get', array($params), "Google_Service_Devprojects_ProjectData");
  }
  /**
   * Obtain the structure of clients within the project for use in abuse control
   * and takedowns. (projects.getprojectclientstructure)
   *
   * @param Google_Service_Devprojects_ProjectsGetProjectClientStructureRequest $postBody
   * @param array $optParams Optional parameters.
   * @return Google_Service_Devprojects_ProjectsGetProjectClientStructureResponse
   */
  public function getprojectclientstructure(Google_Service_Devprojects_ProjectsGetProjectClientStructureRequest $postBody, $optParams = array())
  {
    $params = array('postBody' => $postBody);
    $params = array_merge($params, $optParams);
    return $this->call('getprojectclientstructure', array($params), "Google_Service_Devprojects_ProjectsGetProjectClientStructureResponse");
  }
  /**
   * Create a new project. Note that only the base data of a project will be
   * transferred. Everything else needs to go through an update request.
   * (projects.insert)
   *
   * @param Google_Service_Devprojects_ProjectData $postBody
   * @param array $optParams Optional parameters.
   *
   * @opt_param string initialOwner Gaia id of the initial project owner.
   * Currently,this should always be provided, but that might change in the
   * future.
   * @opt_param bool retryRequest Set to true to indicate that this is a retry
   * request
   * @opt_param string section The list of sections that should be created.
   * @opt_param string whitelistId The whitelist project ID. See
   * Projects.Insert.whitelist_id documentation for details.
   * @return Google_Service_Devprojects_ProjectData
   */
  public function insert(Google_Service_Devprojects_ProjectData $postBody, $optParams = array())
  {
    $params = array('postBody' => $postBody);
    $params = array_merge($params, $optParams);
    return $this->call('insert', array($params), "Google_Service_Devprojects_ProjectData");
  }
  /**
   * Query projects (projects.listProjects)
   *
   * @param array $optParams Optional parameters.
   *
   * @opt_param string fillSection Return projects with the following sections
   * included if possible.
   * @opt_param bool includeNonActive Whether also non-active projects should be
   * included in results
   * @opt_param string includedShard If this list is nonempty, projects are only
   * returned if they contain some shard in the list. If the list is empty, no
   * filtering occurs
   * @opt_param string requiredApiId Return only projects that have all the given
   * APIs active
   * @opt_param string requiredSection Return only projects that have all the
   * given sections
   * @opt_param bool retrieveCurrentUserRole Whether to also retrieve the role of
   * the user for which projects are currently listed
   * @opt_param string user Return only projects that the given user has access
   * to. For now, this is always required. Later, this will be required for LOAS
   * based access only, and we can infer the user from the access control. As such
   * the user will need to be a team member of the project. Also the user might be
   * logged as the initiator of the update.
   * @opt_param string whitelistId The whitelist project ID. See
   * Projects.Insert.whitelist_id documentation for details.
   * @return Google_Service_Devprojects_ProjectsListResponse
   */
  public function listProjects($optParams = array())
  {
    $params = array();
    $params = array_merge($params, $optParams);
    return $this->call('list', array($params), "Google_Service_Devprojects_ProjectsListResponse");
  }
  /**
   * Uses DevConsole notification endpoint to notify project owners of important
   * events, such as quota breaching. Currently only supports emailing the users
   * of a project who fill the OWNER role, though there's been talk of adding
   * support for other notification formats as well. (projects.notifyowners)
   *
   * @param string $projectsId The resource ID.
   * @param Google_Service_Devprojects_ProjectsNotifyOwnersRequest $postBody
   * @param array $optParams Optional parameters.
   *
   * @opt_param string whitelistId The whitelist project ID. See
   * Projects.Insert.whitelist_id documentation for details.
   * @return Google_Service_Devprojects_ProjectsNotifyOwnersResponse
   */
  public function notifyowners($projectsId, Google_Service_Devprojects_ProjectsNotifyOwnersRequest $postBody, $optParams = array())
  {
    $params = array('projectsId' => $projectsId, 'postBody' => $postBody);
    $params = array_merge($params, $optParams);
    return $this->call('notifyowners', array($params), "Google_Service_Devprojects_ProjectsNotifyOwnersResponse");
  }
  /**
   * Update a project. This method supports patch semantics. (projects.patch)
   *
   * @param string $projectId The Devconsole project ID.
   * @param Google_Service_Devprojects_ProjectData $postBody
   * @param array $optParams Optional parameters.
   *
   * @opt_param string section The list of sections that should be updated. Any
   * parts of the project entity that are not listed here will not be considered
   * for updates.
   * @opt_param string user If specified, the user to check accepted TOSes
   * against. This is needed when an update (e.g., enabling the BigStore Apiary
   * API requires the user to accept a specific ToS. In the future the nuser could
   * be inferred from the access control.
   * @opt_param string whitelistId The whitelist project ID. See
   * Projects.Insert.whitelist_id documentation for details.
   * @return Google_Service_Devprojects_ProjectData
   */
  public function patch($projectId, Google_Service_Devprojects_ProjectData $postBody, $optParams = array())
  {
    $params = array('projectId' => $projectId, 'postBody' => $postBody);
    $params = array_merge($params, $optParams);
    return $this->call('patch', array($params), "Google_Service_Devprojects_ProjectData");
  }
  /**
   * Looks-up a project specified via a string ID in app-engine app ID form and if
   * found returns its numeric ID. Note: in the case of Dasher-based projects the
   * string ID is in the form "domain:appId" (e.g., "google.com:cohesive-
   * bonbon-301") If the lookup fails a PROJECT_NOT_FOUND error is returned.
   * (projects.stringidtonumericid)
   *
   * @param string $project The string project id to lookup
   * @param array $optParams Optional parameters.
   *
   * @opt_param string whitelistId The whitelist project ID. See
   * Projects.Insert.whitelist_id documentation for details.
   * @return Google_Service_Devprojects_ProjectsStringIdToNumericIdResponse
   */
  public function stringidtonumericid($project, $optParams = array())
  {
    $params = array('project' => $project);
    $params = array_merge($params, $optParams);
    return $this->call('stringidtonumericid', array($params), "Google_Service_Devprojects_ProjectsStringIdToNumericIdResponse");
  }
  /**
   * Undelete a project (projects.undelete)
   *
   * @param string $projectId The resource ID.
   * @param Google_Service_Devprojects_ProjectsUndeleteRequest $postBody
   * @param array $optParams Optional parameters.
   *
   * @opt_param string whitelistId The whitelist project ID. See
   * Projects.Insert.whitelist_id documentation for details.
   */
  public function undelete($projectId, Google_Service_Devprojects_ProjectsUndeleteRequest $postBody, $optParams = array())
  {
    $params = array('projectId' => $projectId, 'postBody' => $postBody);
    $params = array_merge($params, $optParams);
    return $this->call('undelete', array($params));
  }
  /**
   * Update a project. (projects.update)
   *
   * @param string $projectId The Devconsole project ID.
   * @param Google_Service_Devprojects_ProjectData $postBody
   * @param array $optParams Optional parameters.
   *
   * @opt_param string section The list of sections that should be updated. Any
   * parts of the project entity that are not listed here will not be considered
   * for updates.
   * @opt_param string user If specified, the user to check accepted TOSes
   * against. This is needed when an update (e.g., enabling the BigStore Apiary
   * API requires the user to accept a specific ToS. In the future the nuser could
   * be inferred from the access control.
   * @opt_param string whitelistId The whitelist project ID. See
   * Projects.Insert.whitelist_id documentation for details.
   * @return Google_Service_Devprojects_ProjectData
   */
  public function update($projectId, Google_Service_Devprojects_ProjectData $postBody, $optParams = array())
  {
    $params = array('projectId' => $projectId, 'postBody' => $postBody);
    $params = array_merge($params, $optParams);
    return $this->call('update', array($params), "Google_Service_Devprojects_ProjectData");
  }
}
