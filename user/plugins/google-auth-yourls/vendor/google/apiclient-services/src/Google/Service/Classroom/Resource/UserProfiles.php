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
 * The "userProfiles" collection of methods.
 * Typical usage is:
 *  <code>
 *   $classroomService = new Google_Service_Classroom(...);
 *   $userProfiles = $classroomService->userProfiles;
 *  </code>
 */
class Google_Service_Classroom_Resource_UserProfiles extends Google_Service_Resource
{
  /**
   * Returns a user profile.
   *
   * This method returns the following error codes:
   *
   * * `PERMISSION_DENIED` if the requesting user is not permitted to access this
   * user profile, if no profile exists with the requested ID, or for access
   * errors. (userProfiles.get)
   *
   * @param string $userId Identifier of the profile to return. The identifier can
   * be one of the following:
   *
   * * the numeric identifier for the user * the email address of the user * the
   * string literal `"me"`, indicating the requesting user
   * @param array $optParams Optional parameters.
   * @return Google_Service_Classroom_UserProfile
   */
  public function get($userId, $optParams = array())
  {
    $params = array('userId' => $userId);
    $params = array_merge($params, $optParams);
    return $this->call('get', array($params), "Google_Service_Classroom_UserProfile");
  }
}
