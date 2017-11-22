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
 * The "changeLogs" collection of methods.
 * Typical usage is:
 *  <code>
 *   $dfareportingService = new Google_Service_Dfareporting(...);
 *   $changeLogs = $dfareportingService->changeLogs;
 *  </code>
 */
class Google_Service_Dfareporting_Resource_ChangeLogs extends Google_Service_Resource
{
  /**
   * Gets one change log by ID. (changeLogs.get)
   *
   * @param string $profileId User profile ID associated with this request.
   * @param string $id Change log ID.
   * @param array $optParams Optional parameters.
   * @return Google_Service_Dfareporting_ChangeLog
   */
  public function get($profileId, $id, $optParams = array())
  {
    $params = array('profileId' => $profileId, 'id' => $id);
    $params = array_merge($params, $optParams);
    return $this->call('get', array($params), "Google_Service_Dfareporting_ChangeLog");
  }
  /**
   * Retrieves a list of change logs. This method supports paging.
   * (changeLogs.listChangeLogs)
   *
   * @param string $profileId User profile ID associated with this request.
   * @param array $optParams Optional parameters.
   *
   * @opt_param string action Select only change logs with the specified action.
   * @opt_param string ids Select only change logs with these IDs.
   * @opt_param string maxChangeTime Select only change logs whose change time is
   * before the specified maxChangeTime.The time should be formatted as an RFC3339
   * date/time string. For example, for 10:54 PM on July 18th, 2015, in the
   * America/New York time zone, the format is "2015-07-18T22:54:00-04:00". In
   * other words, the year, month, day, the letter T, the hour (24-hour clock
   * system), minute, second, and then the time zone offset.
   * @opt_param int maxResults Maximum number of results to return.
   * @opt_param string minChangeTime Select only change logs whose change time is
   * before the specified minChangeTime.The time should be formatted as an RFC3339
   * date/time string. For example, for 10:54 PM on July 18th, 2015, in the
   * America/New York time zone, the format is "2015-07-18T22:54:00-04:00". In
   * other words, the year, month, day, the letter T, the hour (24-hour clock
   * system), minute, second, and then the time zone offset.
   * @opt_param string objectIds Select only change logs with these object IDs.
   * @opt_param string objectType Select only change logs with the specified
   * object type.
   * @opt_param string pageToken Value of the nextPageToken from the previous
   * result page.
   * @opt_param string searchString Select only change logs whose object ID, user
   * name, old or new values match the search string.
   * @opt_param string userProfileIds Select only change logs with these user
   * profile IDs.
   * @return Google_Service_Dfareporting_ChangeLogsListResponse
   */
  public function listChangeLogs($profileId, $optParams = array())
  {
    $params = array('profileId' => $profileId);
    $params = array_merge($params, $optParams);
    return $this->call('list', array($params), "Google_Service_Dfareporting_ChangeLogsListResponse");
  }
}
