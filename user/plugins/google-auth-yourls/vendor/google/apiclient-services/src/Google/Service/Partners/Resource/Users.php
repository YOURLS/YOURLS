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
 * The "users" collection of methods.
 * Typical usage is:
 *  <code>
 *   $partnersService = new Google_Service_Partners(...);
 *   $users = $partnersService->users;
 *  </code>
 */
class Google_Service_Partners_Resource_Users extends Google_Service_Resource
{
  /**
   * Creates a user's company relation. Affiliates the user to a company.
   * (users.createCompanyRelation)
   *
   * @param string $userId The ID of the user. Can be set to me to mean the
   * currently authenticated user.
   * @param Google_Service_Partners_CompanyRelation $postBody
   * @param array $optParams Optional parameters.
   *
   * @opt_param string requestMetadata.trafficSource.trafficSourceId Identifier to
   * indicate where the traffic comes from. An identifier has multiple letters
   * created by a team which redirected the traffic to us.
   * @opt_param string requestMetadata.locale Locale to use for the current
   * request.
   * @opt_param string requestMetadata.userOverrides.ipAddress IP address to use
   * instead of the user's geo-located IP address.
   * @opt_param string requestMetadata.experimentIds Experiment IDs the current
   * request belongs to.
   * @opt_param string requestMetadata.trafficSource.trafficSubId Second level
   * identifier to indicate where the traffic comes from. An identifier has
   * multiple letters created by a team which redirected the traffic to us.
   * @opt_param string requestMetadata.userOverrides.userId Logged-in user ID to
   * impersonate instead of the user's ID.
   * @opt_param string requestMetadata.partnersSessionId Google Partners session
   * ID.
   * @return Google_Service_Partners_CompanyRelation
   */
  public function createCompanyRelation($userId, Google_Service_Partners_CompanyRelation $postBody, $optParams = array())
  {
    $params = array('userId' => $userId, 'postBody' => $postBody);
    $params = array_merge($params, $optParams);
    return $this->call('createCompanyRelation', array($params), "Google_Service_Partners_CompanyRelation");
  }
  /**
   * Deletes a user's company relation. Unaffiliaites the user from a company.
   * (users.deleteCompanyRelation)
   *
   * @param string $userId The ID of the user. Can be set to me to mean the
   * currently authenticated user.
   * @param array $optParams Optional parameters.
   *
   * @opt_param string requestMetadata.trafficSource.trafficSubId Second level
   * identifier to indicate where the traffic comes from. An identifier has
   * multiple letters created by a team which redirected the traffic to us.
   * @opt_param string requestMetadata.userOverrides.userId Logged-in user ID to
   * impersonate instead of the user's ID.
   * @opt_param string requestMetadata.partnersSessionId Google Partners session
   * ID.
   * @opt_param string requestMetadata.trafficSource.trafficSourceId Identifier to
   * indicate where the traffic comes from. An identifier has multiple letters
   * created by a team which redirected the traffic to us.
   * @opt_param string requestMetadata.locale Locale to use for the current
   * request.
   * @opt_param string requestMetadata.userOverrides.ipAddress IP address to use
   * instead of the user's geo-located IP address.
   * @opt_param string requestMetadata.experimentIds Experiment IDs the current
   * request belongs to.
   * @return Google_Service_Partners_PartnersEmpty
   */
  public function deleteCompanyRelation($userId, $optParams = array())
  {
    $params = array('userId' => $userId);
    $params = array_merge($params, $optParams);
    return $this->call('deleteCompanyRelation', array($params), "Google_Service_Partners_PartnersEmpty");
  }
  /**
   * Gets a user. (users.get)
   *
   * @param string $userId Identifier of the user. Can be set to me to mean the
   * currently authenticated user.
   * @param array $optParams Optional parameters.
   *
   * @opt_param string requestMetadata.trafficSource.trafficSubId Second level
   * identifier to indicate where the traffic comes from. An identifier has
   * multiple letters created by a team which redirected the traffic to us.
   * @opt_param string requestMetadata.partnersSessionId Google Partners session
   * ID.
   * @opt_param string requestMetadata.userOverrides.userId Logged-in user ID to
   * impersonate instead of the user's ID.
   * @opt_param string userView Specifies what parts of the user information to
   * return.
   * @opt_param string requestMetadata.trafficSource.trafficSourceId Identifier to
   * indicate where the traffic comes from. An identifier has multiple letters
   * created by a team which redirected the traffic to us.
   * @opt_param string requestMetadata.locale Locale to use for the current
   * request.
   * @opt_param string requestMetadata.userOverrides.ipAddress IP address to use
   * instead of the user's geo-located IP address.
   * @opt_param string requestMetadata.experimentIds Experiment IDs the current
   * request belongs to.
   * @return Google_Service_Partners_User
   */
  public function get($userId, $optParams = array())
  {
    $params = array('userId' => $userId);
    $params = array_merge($params, $optParams);
    return $this->call('get', array($params), "Google_Service_Partners_User");
  }
  /**
   * Updates a user's profile. A user can only update their own profile and should
   * only be called within the context of a logged in user. (users.updateProfile)
   *
   * @param Google_Service_Partners_UserProfile $postBody
   * @param array $optParams Optional parameters.
   *
   * @opt_param string requestMetadata.trafficSource.trafficSubId Second level
   * identifier to indicate where the traffic comes from. An identifier has
   * multiple letters created by a team which redirected the traffic to us.
   * @opt_param string requestMetadata.userOverrides.userId Logged-in user ID to
   * impersonate instead of the user's ID.
   * @opt_param string requestMetadata.partnersSessionId Google Partners session
   * ID.
   * @opt_param string requestMetadata.trafficSource.trafficSourceId Identifier to
   * indicate where the traffic comes from. An identifier has multiple letters
   * created by a team which redirected the traffic to us.
   * @opt_param string requestMetadata.locale Locale to use for the current
   * request.
   * @opt_param string requestMetadata.userOverrides.ipAddress IP address to use
   * instead of the user's geo-located IP address.
   * @opt_param string requestMetadata.experimentIds Experiment IDs the current
   * request belongs to.
   * @return Google_Service_Partners_UserProfile
   */
  public function updateProfile(Google_Service_Partners_UserProfile $postBody, $optParams = array())
  {
    $params = array('postBody' => $postBody);
    $params = array_merge($params, $optParams);
    return $this->call('updateProfile', array($params), "Google_Service_Partners_UserProfile");
  }
}
