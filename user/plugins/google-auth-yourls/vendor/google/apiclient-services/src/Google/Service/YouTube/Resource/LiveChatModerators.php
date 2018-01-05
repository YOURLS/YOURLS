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
 * The "liveChatModerators" collection of methods.
 * Typical usage is:
 *  <code>
 *   $youtubeService = new Google_Service_YouTube(...);
 *   $liveChatModerators = $youtubeService->liveChatModerators;
 *  </code>
 */
class Google_Service_YouTube_Resource_LiveChatModerators extends Google_Service_Resource
{
  /**
   * Removes a chat moderator. (liveChatModerators.delete)
   *
   * @param string $id The id parameter identifies the chat moderator to remove.
   * The value uniquely identifies both the moderator and the chat.
   * @param array $optParams Optional parameters.
   */
  public function delete($id, $optParams = array())
  {
    $params = array('id' => $id);
    $params = array_merge($params, $optParams);
    return $this->call('delete', array($params));
  }
  /**
   * Adds a new moderator for the chat. (liveChatModerators.insert)
   *
   * @param string $part The part parameter serves two purposes in this operation.
   * It identifies the properties that the write operation will set as well as the
   * properties that the API response returns. Set the parameter value to snippet.
   * @param Google_Service_YouTube_LiveChatModerator $postBody
   * @param array $optParams Optional parameters.
   * @return Google_Service_YouTube_LiveChatModerator
   */
  public function insert($part, Google_Service_YouTube_LiveChatModerator $postBody, $optParams = array())
  {
    $params = array('part' => $part, 'postBody' => $postBody);
    $params = array_merge($params, $optParams);
    return $this->call('insert', array($params), "Google_Service_YouTube_LiveChatModerator");
  }
  /**
   * Lists moderators for a live chat. (liveChatModerators.listLiveChatModerators)
   *
   * @param string $liveChatId The liveChatId parameter specifies the YouTube live
   * chat for which the API should return moderators.
   * @param string $part The part parameter specifies the liveChatModerator
   * resource parts that the API response will include. Supported values are id
   * and snippet.
   * @param array $optParams Optional parameters.
   *
   * @opt_param string maxResults The maxResults parameter specifies the maximum
   * number of items that should be returned in the result set.
   * @opt_param string pageToken The pageToken parameter identifies a specific
   * page in the result set that should be returned. In an API response, the
   * nextPageToken and prevPageToken properties identify other pages that could be
   * retrieved.
   * @return Google_Service_YouTube_LiveChatModeratorListResponse
   */
  public function listLiveChatModerators($liveChatId, $part, $optParams = array())
  {
    $params = array('liveChatId' => $liveChatId, 'part' => $part);
    $params = array_merge($params, $optParams);
    return $this->call('list', array($params), "Google_Service_YouTube_LiveChatModeratorListResponse");
  }
}
