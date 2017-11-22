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
 * The "activities" collection of methods.
 * Typical usage is:
 *  <code>
 *   $youtubeService = new Google_Service_YouTube(...);
 *   $activities = $youtubeService->activities;
 *  </code>
 */
class Google_Service_YouTube_Resource_Activities extends Google_Service_Resource
{
  /**
   * Posts a bulletin for a specific channel. (The user submitting the request
   * must be authorized to act on the channel's behalf.)
   *
   * Note: Even though an activity resource can contain information about actions
   * like a user rating a video or marking a video as a favorite, you need to use
   * other API methods to generate those activity resources. For example, you
   * would use the API's videos.rate() method to rate a video and the
   * playlistItems.insert() method to mark a video as a favorite.
   * (activities.insert)
   *
   * @param string $part The part parameter serves two purposes in this operation.
   * It identifies the properties that the write operation will set as well as the
   * properties that the API response will include.
   * @param Google_Service_YouTube_Activity $postBody
   * @param array $optParams Optional parameters.
   * @return Google_Service_YouTube_Activity
   */
  public function insert($part, Google_Service_YouTube_Activity $postBody, $optParams = array())
  {
    $params = array('part' => $part, 'postBody' => $postBody);
    $params = array_merge($params, $optParams);
    return $this->call('insert', array($params), "Google_Service_YouTube_Activity");
  }
  /**
   * Returns a list of channel activity events that match the request criteria.
   * For example, you can retrieve events associated with a particular channel,
   * events associated with the user's subscriptions and Google+ friends, or the
   * YouTube home page feed, which is customized for each user.
   * (activities.listActivities)
   *
   * @param string $part The part parameter specifies a comma-separated list of
   * one or more activity resource properties that the API response will include.
   *
   * If the parameter identifies a property that contains child properties, the
   * child properties will be included in the response. For example, in an
   * activity resource, the snippet property contains other properties that
   * identify the type of activity, a display title for the activity, and so
   * forth. If you set part=snippet, the API response will also contain all of
   * those nested properties.
   * @param array $optParams Optional parameters.
   *
   * @opt_param string channelId The channelId parameter specifies a unique
   * YouTube channel ID. The API will then return a list of that channel's
   * activities.
   * @opt_param bool home Set this parameter's value to true to retrieve the
   * activity feed that displays on the YouTube home page for the currently
   * authenticated user.
   * @opt_param string maxResults The maxResults parameter specifies the maximum
   * number of items that should be returned in the result set.
   * @opt_param bool mine Set this parameter's value to true to retrieve a feed of
   * the authenticated user's activities.
   * @opt_param string pageToken The pageToken parameter identifies a specific
   * page in the result set that should be returned. In an API response, the
   * nextPageToken and prevPageToken properties identify other pages that could be
   * retrieved.
   * @opt_param string publishedAfter The publishedAfter parameter specifies the
   * earliest date and time that an activity could have occurred for that activity
   * to be included in the API response. If the parameter value specifies a day,
   * but not a time, then any activities that occurred that day will be included
   * in the result set. The value is specified in ISO 8601 (YYYY-MM-
   * DDThh:mm:ss.sZ) format.
   * @opt_param string publishedBefore The publishedBefore parameter specifies the
   * date and time before which an activity must have occurred for that activity
   * to be included in the API response. If the parameter value specifies a day,
   * but not a time, then any activities that occurred that day will be excluded
   * from the result set. The value is specified in ISO 8601 (YYYY-MM-
   * DDThh:mm:ss.sZ) format.
   * @opt_param string regionCode The regionCode parameter instructs the API to
   * return results for the specified country. The parameter value is an ISO
   * 3166-1 alpha-2 country code. YouTube uses this value when the authorized
   * user's previous activity on YouTube does not provide enough information to
   * generate the activity feed.
   * @return Google_Service_YouTube_ActivityListResponse
   */
  public function listActivities($part, $optParams = array())
  {
    $params = array('part' => $part);
    $params = array_merge($params, $optParams);
    return $this->call('list', array($params), "Google_Service_YouTube_ActivityListResponse");
  }
}
