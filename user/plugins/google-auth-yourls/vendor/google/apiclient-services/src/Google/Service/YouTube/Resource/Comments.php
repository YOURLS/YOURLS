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
 * The "comments" collection of methods.
 * Typical usage is:
 *  <code>
 *   $youtubeService = new Google_Service_YouTube(...);
 *   $comments = $youtubeService->comments;
 *  </code>
 */
class Google_Service_YouTube_Resource_Comments extends Google_Service_Resource
{
  /**
   * Deletes a comment. (comments.delete)
   *
   * @param string $id The id parameter specifies the comment ID for the resource
   * that is being deleted.
   * @param array $optParams Optional parameters.
   */
  public function delete($id, $optParams = array())
  {
    $params = array('id' => $id);
    $params = array_merge($params, $optParams);
    return $this->call('delete', array($params));
  }
  /**
   * Creates a reply to an existing comment. Note: To create a top-level comment,
   * use the commentThreads.insert method. (comments.insert)
   *
   * @param string $part The part parameter identifies the properties that the API
   * response will include. Set the parameter value to snippet. The snippet part
   * has a quota cost of 2 units.
   * @param Google_Service_YouTube_Comment $postBody
   * @param array $optParams Optional parameters.
   * @return Google_Service_YouTube_Comment
   */
  public function insert($part, Google_Service_YouTube_Comment $postBody, $optParams = array())
  {
    $params = array('part' => $part, 'postBody' => $postBody);
    $params = array_merge($params, $optParams);
    return $this->call('insert', array($params), "Google_Service_YouTube_Comment");
  }
  /**
   * Returns a list of comments that match the API request parameters.
   * (comments.listComments)
   *
   * @param string $part The part parameter specifies a comma-separated list of
   * one or more comment resource properties that the API response will include.
   * @param array $optParams Optional parameters.
   *
   * @opt_param string id The id parameter specifies a comma-separated list of
   * comment IDs for the resources that are being retrieved. In a comment
   * resource, the id property specifies the comment's ID.
   * @opt_param string maxResults The maxResults parameter specifies the maximum
   * number of items that should be returned in the result set.
   *
   * Note: This parameter is not supported for use in conjunction with the id
   * parameter.
   * @opt_param string pageToken The pageToken parameter identifies a specific
   * page in the result set that should be returned. In an API response, the
   * nextPageToken property identifies the next page of the result that can be
   * retrieved.
   *
   * Note: This parameter is not supported for use in conjunction with the id
   * parameter.
   * @opt_param string parentId The parentId parameter specifies the ID of the
   * comment for which replies should be retrieved.
   *
   * Note: YouTube currently supports replies only for top-level comments.
   * However, replies to replies may be supported in the future.
   * @opt_param string textFormat This parameter indicates whether the API should
   * return comments formatted as HTML or as plain text.
   * @return Google_Service_YouTube_CommentListResponse
   */
  public function listComments($part, $optParams = array())
  {
    $params = array('part' => $part);
    $params = array_merge($params, $optParams);
    return $this->call('list', array($params), "Google_Service_YouTube_CommentListResponse");
  }
  /**
   * Expresses the caller's opinion that one or more comments should be flagged as
   * spam. (comments.markAsSpam)
   *
   * @param string $id The id parameter specifies a comma-separated list of IDs of
   * comments that the caller believes should be classified as spam.
   * @param array $optParams Optional parameters.
   */
  public function markAsSpam($id, $optParams = array())
  {
    $params = array('id' => $id);
    $params = array_merge($params, $optParams);
    return $this->call('markAsSpam', array($params));
  }
  /**
   * Sets the moderation status of one or more comments. The API request must be
   * authorized by the owner of the channel or video associated with the comments.
   * (comments.setModerationStatus)
   *
   * @param string $id The id parameter specifies a comma-separated list of IDs
   * that identify the comments for which you are updating the moderation status.
   * @param string $moderationStatus Identifies the new moderation status of the
   * specified comments.
   * @param array $optParams Optional parameters.
   *
   * @opt_param bool banAuthor The banAuthor parameter lets you indicate that you
   * want to automatically reject any additional comments written by the comment's
   * author. Set the parameter value to true to ban the author.
   *
   * Note: This parameter is only valid if the moderationStatus parameter is also
   * set to rejected.
   */
  public function setModerationStatus($id, $moderationStatus, $optParams = array())
  {
    $params = array('id' => $id, 'moderationStatus' => $moderationStatus);
    $params = array_merge($params, $optParams);
    return $this->call('setModerationStatus', array($params));
  }
  /**
   * Modifies a comment. (comments.update)
   *
   * @param string $part The part parameter identifies the properties that the API
   * response will include. You must at least include the snippet part in the
   * parameter value since that part contains all of the properties that the API
   * request can update.
   * @param Google_Service_YouTube_Comment $postBody
   * @param array $optParams Optional parameters.
   * @return Google_Service_YouTube_Comment
   */
  public function update($part, Google_Service_YouTube_Comment $postBody, $optParams = array())
  {
    $params = array('part' => $part, 'postBody' => $postBody);
    $params = array_merge($params, $optParams);
    return $this->call('update', array($params), "Google_Service_YouTube_Comment");
  }
}
