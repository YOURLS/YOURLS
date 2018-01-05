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
 * The "teamdrives" collection of methods.
 * Typical usage is:
 *  <code>
 *   $driveService = new Google_Service_Drive(...);
 *   $teamdrives = $driveService->teamdrives;
 *  </code>
 */
class Google_Service_Drive_Resource_Teamdrives extends Google_Service_Resource
{
  /**
   * Creates a new Team Drive. (teamdrives.create)
   *
   * @param string $requestId An ID, such as a random UUID, which uniquely
   * identifies this user's request for idempotent creation of a Team Drive. A
   * repeated request by the same user and with the same request ID will avoid
   * creating duplicates by attempting to create the same Team Drive. If the Team
   * Drive already exists a 409 error will be returned.
   * @param Google_Service_Drive_TeamDrive $postBody
   * @param array $optParams Optional parameters.
   * @return Google_Service_Drive_TeamDrive
   */
  public function create($requestId, Google_Service_Drive_TeamDrive $postBody, $optParams = array())
  {
    $params = array('requestId' => $requestId, 'postBody' => $postBody);
    $params = array_merge($params, $optParams);
    return $this->call('create', array($params), "Google_Service_Drive_TeamDrive");
  }
  /**
   * Permanently deletes a Team Drive for which the user is an organizer. The Team
   * Drive cannot contain any untrashed items. (teamdrives.delete)
   *
   * @param string $teamDriveId The ID of the Team Drive
   * @param array $optParams Optional parameters.
   */
  public function delete($teamDriveId, $optParams = array())
  {
    $params = array('teamDriveId' => $teamDriveId);
    $params = array_merge($params, $optParams);
    return $this->call('delete', array($params));
  }
  /**
   * Gets a Team Drive's metadata by ID. (teamdrives.get)
   *
   * @param string $teamDriveId The ID of the Team Drive
   * @param array $optParams Optional parameters.
   *
   * @opt_param bool useDomainAdminAccess Whether the request should be treated as
   * if it was issued by a domain administrator; if set to true, then the
   * requester will be granted access if they are an administrator of the domain
   * to which the Team Drive belongs.
   * @return Google_Service_Drive_TeamDrive
   */
  public function get($teamDriveId, $optParams = array())
  {
    $params = array('teamDriveId' => $teamDriveId);
    $params = array_merge($params, $optParams);
    return $this->call('get', array($params), "Google_Service_Drive_TeamDrive");
  }
  /**
   * Lists the user's Team Drives. (teamdrives.listTeamdrives)
   *
   * @param array $optParams Optional parameters.
   *
   * @opt_param int pageSize Maximum number of Team Drives to return.
   * @opt_param string pageToken Page token for Team Drives.
   * @opt_param string q Query string for searching Team Drives.
   * @opt_param bool useDomainAdminAccess Whether the request should be treated as
   * if it was issued by a domain administrator; if set to true, then all Team
   * Drives of the domain in which the requester is an administrator are returned.
   * @return Google_Service_Drive_TeamDriveList
   */
  public function listTeamdrives($optParams = array())
  {
    $params = array();
    $params = array_merge($params, $optParams);
    return $this->call('list', array($params), "Google_Service_Drive_TeamDriveList");
  }
  /**
   * Updates a Team Drive's metadata (teamdrives.update)
   *
   * @param string $teamDriveId The ID of the Team Drive
   * @param Google_Service_Drive_TeamDrive $postBody
   * @param array $optParams Optional parameters.
   * @return Google_Service_Drive_TeamDrive
   */
  public function update($teamDriveId, Google_Service_Drive_TeamDrive $postBody, $optParams = array())
  {
    $params = array('teamDriveId' => $teamDriveId, 'postBody' => $postBody);
    $params = array_merge($params, $optParams);
    return $this->call('update', array($params), "Google_Service_Drive_TeamDrive");
  }
}
