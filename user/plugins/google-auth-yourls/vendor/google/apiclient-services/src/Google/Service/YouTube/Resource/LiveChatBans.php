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
 * The "liveChatBans" collection of methods.
 * Typical usage is:
 *  <code>
 *   $youtubeService = new Google_Service_YouTube(...);
 *   $liveChatBans = $youtubeService->liveChatBans;
 *  </code>
 */
class Google_Service_YouTube_Resource_LiveChatBans extends Google_Service_Resource
{
  /**
   * Removes a chat ban. (liveChatBans.delete)
   *
   * @param string $id The id parameter identifies the chat ban to remove. The
   * value uniquely identifies both the ban and the chat.
   * @param array $optParams Optional parameters.
   */
  public function delete($id, $optParams = array())
  {
    $params = array('id' => $id);
    $params = array_merge($params, $optParams);
    return $this->call('delete', array($params));
  }
  /**
   * Adds a new ban to the chat. (liveChatBans.insert)
   *
   * @param string $part The part parameter serves two purposes in this operation.
   * It identifies the properties that the write operation will set as well as the
   * properties that the API response returns. Set the parameter value to snippet.
   * @param Google_Service_YouTube_LiveChatBan $postBody
   * @param array $optParams Optional parameters.
   * @return Google_Service_YouTube_LiveChatBan
   */
  public function insert($part, Google_Service_YouTube_LiveChatBan $postBody, $optParams = array())
  {
    $params = array('part' => $part, 'postBody' => $postBody);
    $params = array_merge($params, $optParams);
    return $this->call('insert', array($params), "Google_Service_YouTube_LiveChatBan");
  }
}
