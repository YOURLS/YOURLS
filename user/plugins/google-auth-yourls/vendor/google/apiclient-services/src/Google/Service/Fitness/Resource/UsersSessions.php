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
 * The "sessions" collection of methods.
 * Typical usage is:
 *  <code>
 *   $fitnessService = new Google_Service_Fitness(...);
 *   $sessions = $fitnessService->sessions;
 *  </code>
 */
class Google_Service_Fitness_Resource_UsersSessions extends Google_Service_Resource
{
  /**
   * Deletes a session specified by the given session ID. (sessions.delete)
   *
   * @param string $userId Delete a session for the person identified. Use me to
   * indicate the authenticated user. Only me is supported at this time.
   * @param string $sessionId The ID of the session to be deleted.
   * @param array $optParams Optional parameters.
   *
   * @opt_param string currentTimeMillis The client's current time in milliseconds
   * since epoch.
   */
  public function delete($userId, $sessionId, $optParams = array())
  {
    $params = array('userId' => $userId, 'sessionId' => $sessionId);
    $params = array_merge($params, $optParams);
    return $this->call('delete', array($params));
  }
  /**
   * Lists sessions previously created. (sessions.listUsersSessions)
   *
   * @param string $userId List sessions for the person identified. Use me to
   * indicate the authenticated user. Only me is supported at this time.
   * @param array $optParams Optional parameters.
   *
   * @opt_param string endTime An RFC3339 timestamp. Only sessions ending between
   * the start and end times will be included in the response.
   * @opt_param bool includeDeleted If true, deleted sessions will be returned.
   * When set to true, sessions returned in this response will only have an ID and
   * will not have any other fields.
   * @opt_param string pageToken The continuation token, which is used to page
   * through large result sets. To get the next page of results, set this
   * parameter to the value of nextPageToken from the previous response.
   * @opt_param string startTime An RFC3339 timestamp. Only sessions ending
   * between the start and end times will be included in the response.
   * @return Google_Service_Fitness_ListSessionsResponse
   */
  public function listUsersSessions($userId, $optParams = array())
  {
    $params = array('userId' => $userId);
    $params = array_merge($params, $optParams);
    return $this->call('list', array($params), "Google_Service_Fitness_ListSessionsResponse");
  }
  /**
   * Updates or insert a given session. (sessions.update)
   *
   * @param string $userId Create sessions for the person identified. Use me to
   * indicate the authenticated user. Only me is supported at this time.
   * @param string $sessionId The ID of the session to be created.
   * @param Google_Service_Fitness_Session $postBody
   * @param array $optParams Optional parameters.
   *
   * @opt_param string currentTimeMillis The client's current time in milliseconds
   * since epoch.
   * @return Google_Service_Fitness_Session
   */
  public function update($userId, $sessionId, Google_Service_Fitness_Session $postBody, $optParams = array())
  {
    $params = array('userId' => $userId, 'sessionId' => $sessionId, 'postBody' => $postBody);
    $params = array_merge($params, $optParams);
    return $this->call('update', array($params), "Google_Service_Fitness_Session");
  }
}
