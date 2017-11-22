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
 * The "groups" collection of methods.
 * Typical usage is:
 *  <code>
 *   $monitoringService = new Google_Service_Monitoring(...);
 *   $groups = $monitoringService->groups;
 *  </code>
 */
class Google_Service_Monitoring_Resource_ProjectsGroups extends Google_Service_Resource
{
  /**
   * Creates a new group. (groups.create)
   *
   * @param string $name The project in which to create the group. The format is
   * "projects/{project_id_or_number}".
   * @param Google_Service_Monitoring_Group $postBody
   * @param array $optParams Optional parameters.
   *
   * @opt_param bool validateOnly If true, validate this request but do not create
   * the group.
   * @return Google_Service_Monitoring_Group
   */
  public function create($name, Google_Service_Monitoring_Group $postBody, $optParams = array())
  {
    $params = array('name' => $name, 'postBody' => $postBody);
    $params = array_merge($params, $optParams);
    return $this->call('create', array($params), "Google_Service_Monitoring_Group");
  }
  /**
   * Deletes an existing group. (groups.delete)
   *
   * @param string $name The group to delete. The format is
   * "projects/{project_id_or_number}/groups/{group_id}".
   * @param array $optParams Optional parameters.
   * @return Google_Service_Monitoring_MonitoringEmpty
   */
  public function delete($name, $optParams = array())
  {
    $params = array('name' => $name);
    $params = array_merge($params, $optParams);
    return $this->call('delete', array($params), "Google_Service_Monitoring_MonitoringEmpty");
  }
  /**
   * Gets a single group. (groups.get)
   *
   * @param string $name The group to retrieve. The format is
   * "projects/{project_id_or_number}/groups/{group_id}".
   * @param array $optParams Optional parameters.
   * @return Google_Service_Monitoring_Group
   */
  public function get($name, $optParams = array())
  {
    $params = array('name' => $name);
    $params = array_merge($params, $optParams);
    return $this->call('get', array($params), "Google_Service_Monitoring_Group");
  }
  /**
   * Lists the existing groups. (groups.listProjectsGroups)
   *
   * @param string $name The project whose groups are to be listed. The format is
   * "projects/{project_id_or_number}".
   * @param array $optParams Optional parameters.
   *
   * @opt_param string childrenOfGroup A group name:
   * "projects/{project_id_or_number}/groups/{group_id}". Returns groups whose
   * parentName field contains the group name. If no groups have this parent, the
   * results are empty.
   * @opt_param string descendantsOfGroup A group name:
   * "projects/{project_id_or_number}/groups/{group_id}". Returns the descendants
   * of the specified group. This is a superset of the results returned by the
   * childrenOfGroup filter, and includes children-of-children, and so forth.
   * @opt_param string pageToken If this field is not empty then it must contain
   * the nextPageToken value returned by a previous call to this method. Using
   * this field causes the method to return additional results from the previous
   * method call.
   * @opt_param int pageSize A positive number that is the maximum number of
   * results to return.
   * @opt_param string ancestorsOfGroup A group name:
   * "projects/{project_id_or_number}/groups/{group_id}". Returns groups that are
   * ancestors of the specified group. The groups are returned in order, starting
   * with the immediate parent and ending with the most distant ancestor. If the
   * specified group has no immediate parent, the results are empty.
   * @return Google_Service_Monitoring_ListGroupsResponse
   */
  public function listProjectsGroups($name, $optParams = array())
  {
    $params = array('name' => $name);
    $params = array_merge($params, $optParams);
    return $this->call('list', array($params), "Google_Service_Monitoring_ListGroupsResponse");
  }
  /**
   * Updates an existing group. You can change any group attributes except name.
   * (groups.update)
   *
   * @param string $name Output only. The name of this group. The format is
   * "projects/{project_id_or_number}/groups/{group_id}". When creating a group,
   * this field is ignored and a new name is created consisting of the project
   * specified in the call to CreateGroup and a unique {group_id} that is
   * generated automatically.
   * @param Google_Service_Monitoring_Group $postBody
   * @param array $optParams Optional parameters.
   *
   * @opt_param bool validateOnly If true, validate this request but do not update
   * the existing group.
   * @return Google_Service_Monitoring_Group
   */
  public function update($name, Google_Service_Monitoring_Group $postBody, $optParams = array())
  {
    $params = array('name' => $name, 'postBody' => $postBody);
    $params = array_merge($params, $optParams);
    return $this->call('update', array($params), "Google_Service_Monitoring_Group");
  }
}
