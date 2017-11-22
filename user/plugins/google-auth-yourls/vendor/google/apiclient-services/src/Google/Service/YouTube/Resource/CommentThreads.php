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
 * The "commentThreads" collection of methods.
 * Typical usage is:
 *  <code>
 *   $youtubeService = new Google_Service_YouTube(...);
 *   $commentThreads = $youtubeService->commentThreads;
 *  </code>
 */
class Google_Service_YouTube_Resource_CommentThreads extends Google_Service_Resource
{
  /**
   * Creates a new top-level comment. To add a reply to an existing comment, use
   * the comments.insert method instead. (commentThreads.insert)
   *
   * @param string $part The part parameter identifies the properties that the API
   * response will include. Set the parameter value to snippet. The snippet part
   * has a quota cost of 2 units.
   * @param Google_Service_YouTube_CommentThread $postBody
   * @param array $optParams Optional parameters.
   * @return Google_Service_YouTube_CommentThread
   */
  public function insert($part, Google_Service_YouTube_CommentThread $postBody, $optParams = array())
  {
    $params = array('part' => $part, 'postBody' => $postBody);
    $params = array_merge($params, $optParams);
    return $this->call('insert', array($params), "Google_Service_YouTube_CommentThread");
  }
  /**
   * Returns a list of comment threads that match the API request parameters.
   * (commentThreads.listCommentThreads)
   *
   * @param string $part The part parameter specifies a comma-separated list of
   * one or more commentThread resource properties that the API response will
   * include.
   * @param array $optParams Optional parameters.
   *
   * @opt_param string allThreadsRelatedToChannelId The
   * allThreadsRelatedToChannelId parameter instructs the API to return all
   * comment threads associated with the specified channel. The response can
   * include comments about the channel or about the channel's videos.
   * @opt_param string channelId The channelId parameter instructs the API to
   * return comment threads containing comments about the specified channel. (The
   * response will not include comments left on videos that the channel uploaded.)
   * @opt_param string id The id parameter specifies a comma-separated list of
   * comment thread IDs for the resources that should be retrieved.
   * @opt_param string maxResults The maxResults parameter specifies the maximum
   * number of items that should be returned in the result set.
   *
   * Note: This parameter is not supported for use in conjunction with the id
   * parameter.
   * @opt_param string moderationStatus Set this parameter to limit the returned
   * comment threads to a particular moderation state.
   *
   * Note: This parameter is not supported for use in conjunction with the id
   * parameter.
   * @opt_param string order The order parameter specifies the order in which the
   * API response should list comment threads. Valid values are: - time - Comment
   * threads are ordered by time. This is the default behavior. - relevance -
   * Comment threads are ordered by relevance.Note: This parameter is not
   * supported for use in conjunction with the id parameter.
   * @opt_param string pageToken The pageToken parameter identifies a specific
   * page in the result set that should be returned. In an API response, the
   * nextPageToken property identifies the next page of the result that can be
   * retrieved.
   *
   * Note: This parameter is not supported for use in conjunction with the id
   * parameter.
   * @opt_param string searchTerms The searchTerms parameter instructs the API to
   * limit the API response to only contain comments that contain the specified
   * search terms.
   *
   * Note: This parameter is not supported for use in conjunction with the id
   * parameter.
   * @opt_param string textFormat Set this parameter's value to html or plainText
   * to instruct the API to return the comments left by users in html formatted or
   * in plain text.
   * @opt_param string videoId The videoId parameter instructs the API to return
   * comment threads associated with the specified video ID.
   * @return Google_Service_YouTube_CommentThreadListResponse
   */
  public function listCommentThreads($part, $optParams = array())
  {
    $params = array('part' => $part);
    $params = array_merge($params, $optParams);
    return $this->call('list', array($params), "Google_Service_YouTube_CommentThreadListResponse");
  }
  /**
   * Modifies the top-level comment in a comment thread. (commentThreads.update)
   *
   * @param string $part The part parameter specifies a comma-separated list of
   * commentThread resource properties that the API response will include. You
   * must at least include the snippet part in the parameter value since that part
   * contains all of the properties that the API request can update.
   * @param Google_Service_YouTube_CommentThread $postBody
   * @param array $optParams Optional parameters.
   * @return Google_Service_YouTube_CommentThread
   */
  public function update($part, Google_Service_YouTube_CommentThread $postBody, $optParams = array())
  {
    $params = array('part' => $part, 'postBody' => $postBody);
    $params = array_merge($params, $optParams);
    return $this->call('update', array($params), "Google_Service_YouTube_CommentThread");
  }
}
