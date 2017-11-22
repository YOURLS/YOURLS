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
 * The "linux" collection of methods.
 * Typical usage is:
 *  <code>
 *   $clouduseraccountsService = new Google_Service_CloudUserAccounts(...);
 *   $linux = $clouduseraccountsService->linux;
 *  </code>
 */
class Google_Service_CloudUserAccounts_Resource_Linux extends Google_Service_Resource
{
  /**
   * Returns a list of authorized public keys for a specific user account.
   * (linux.getAuthorizedKeysView)
   *
   * @param string $project Project ID for this request.
   * @param string $zone Name of the zone for this request.
   * @param string $user The user account for which you want to get a list of
   * authorized public keys.
   * @param string $instance The fully-qualified URL of the virtual machine
   * requesting the view.
   * @param array $optParams Optional parameters.
   *
   * @opt_param bool login Whether the view was requested as part of a user-
   * initiated login.
   * @return Google_Service_CloudUserAccounts_LinuxGetAuthorizedKeysViewResponse
   */
  public function getAuthorizedKeysView($project, $zone, $user, $instance, $optParams = array())
  {
    $params = array('project' => $project, 'zone' => $zone, 'user' => $user, 'instance' => $instance);
    $params = array_merge($params, $optParams);
    return $this->call('getAuthorizedKeysView', array($params), "Google_Service_CloudUserAccounts_LinuxGetAuthorizedKeysViewResponse");
  }
  /**
   * Retrieves a list of user accounts for an instance within a specific project.
   * (linux.getLinuxAccountViews)
   *
   * @param string $project Project ID for this request.
   * @param string $zone Name of the zone for this request.
   * @param string $instance The fully-qualified URL of the virtual machine
   * requesting the views.
   * @param array $optParams Optional parameters.
   *
   * @opt_param string filter Sets a filter expression for filtering listed
   * resources, in the form filter={expression}. Your {expression} must be in the
   * format: field_name comparison_string literal_string.
   *
   * The field_name is the name of the field you want to compare. Only atomic
   * field types are supported (string, number, boolean). The comparison_string
   * must be either eq (equals) or ne (not equals). The literal_string is the
   * string value to filter to. The literal value must be valid for the type of
   * field you are filtering by (string, number, boolean). For string fields, the
   * literal value is interpreted as a regular expression using RE2 syntax. The
   * literal value must match the entire field.
   *
   * For example, to filter for instances that do not have a name of example-
   * instance, you would use filter=name ne example-instance.
   *
   * Compute Engine Beta API Only: If you use filtering in the Beta API, you can
   * also filter on nested fields. For example, you could filter on instances that
   * have set the scheduling.automaticRestart field to true. In particular, use
   * filtering on nested fields to take advantage of instance labels to organize
   * and filter results based on label values.
   *
   * The Beta API also supports filtering on multiple expressions by providing
   * each separate expression within parentheses. For example,
   * (scheduling.automaticRestart eq true) (zone eq us-central1-f). Multiple
   * expressions are treated as AND expressions, meaning that resources must match
   * all expressions to pass the filters.
   * @opt_param string maxResults The maximum number of results per page that
   * should be returned. If the number of available results is larger than
   * maxResults, Compute Engine returns a nextPageToken that can be used to get
   * the next page of results in subsequent list requests.
   * @opt_param string orderBy Sorts list results by a certain order. By default,
   * results are returned in alphanumerical order based on the resource name.
   *
   * You can also sort results in descending order based on the creation timestamp
   * using orderBy="creationTimestamp desc". This sorts results based on the
   * creationTimestamp field in reverse chronological order (newest result first).
   * Use this to sort resources like operations so that the newest operation is
   * returned first.
   *
   * Currently, only sorting by name or creationTimestamp desc is supported.
   * @opt_param string pageToken Specifies a page token to use. Set pageToken to
   * the nextPageToken returned by a previous list request to get the next page of
   * results.
   * @return Google_Service_CloudUserAccounts_LinuxGetLinuxAccountViewsResponse
   */
  public function getLinuxAccountViews($project, $zone, $instance, $optParams = array())
  {
    $params = array('project' => $project, 'zone' => $zone, 'instance' => $instance);
    $params = array_merge($params, $optParams);
    return $this->call('getLinuxAccountViews', array($params), "Google_Service_CloudUserAccounts_LinuxGetLinuxAccountViewsResponse");
  }
}
