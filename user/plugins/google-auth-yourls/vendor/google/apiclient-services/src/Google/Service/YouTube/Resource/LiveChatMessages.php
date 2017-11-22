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
 * The "liveChatMessages" collection of methods.
 * Typical usage is:
 *  <code>
 *   $youtubeService = new Google_Service_YouTube(...);
 *   $liveChatMessages = $youtubeService->liveChatMessages;
 *  </code>
 */
class Google_Service_YouTube_Resource_LiveChatMessages extends Google_Service_Resource
{
  /**
   * Deletes a chat message. (liveChatMessages.delete)
   *
   * @param string $id The id parameter specifies the YouTube chat message ID of
   * the resource that is being deleted.
   * @param array $optParams Optional parameters.
   */
  public function delete($id, $optParams = array())
  {
    $params = array('id' => $id);
    $params = array_merge($params, $optParams);
    return $this->call('delete', array($params));
  }
  /**
   * Adds a message to a live chat. (liveChatMessages.insert)
   *
   * @param string $part The part parameter serves two purposes. It identifies the
   * properties that the write operation will set as well as the properties that
   * the API response will include. Set the parameter value to snippet.
   * @param Google_Service_YouTube_LiveChatMessage $postBody
   * @param array $optParams Optional parameters.
   * @return Google_Service_YouTube_LiveChatMessage
   */
  public function insert($part, Google_Service_YouTube_LiveChatMessage $postBody, $optParams = array())
  {
    $params = array('part' => $part, 'postBody' => $postBody);
    $params = array_merge($params, $optParams);
    return $this->call('insert', array($params), "Google_Service_YouTube_LiveChatMessage");
  }
  /**
   * Lists live chat messages for a specific chat.
   * (liveChatMessages.listLiveChatMessages)
   *
   * @param string $liveChatId The liveChatId parameter specifies the ID of the
   * chat whose messages will be returned.
   * @param string $part The part parameter specifies the liveChatComment resource
   * parts that the API response will include. Supported values are id and
   * snippet.
   * @param array $optParams Optional parameters.
   *
   * @opt_param string hl The hl parameter instructs the API to retrieve localized
   * resource metadata for a specific application language that the YouTube
   * website supports. The parameter value must be a language code included in the
   * list returned by the i18nLanguages.list method.
   *
   * If localized resource details are available in that language, the resource's
   * snippet.localized object will contain the localized values. However, if
   * localized details are not available, the snippet.localized object will
   * contain resource details in the resource's default language.
   * @opt_param string maxResults The maxResults parameter specifies the maximum
   * number of messages that should be returned in the result set.
   * @opt_param string pageToken The pageToken parameter identifies a specific
   * page in the result set that should be returned. In an API response, the
   * nextPageToken property identify other pages that could be retrieved.
   * @opt_param string profileImageSize The profileImageSize parameter specifies
   * the size of the user profile pictures that should be returned in the result
   * set. Default: 88.
   * @return Google_Service_YouTube_LiveChatMessageListResponse
   */
  public function listLiveChatMessages($liveChatId, $part, $optParams = array())
  {
    $params = array('liveChatId' => $liveChatId, 'part' => $part);
    $params = array_merge($params, $optParams);
    return $this->call('list', array($params), "Google_Service_YouTube_LiveChatMessageListResponse");
  }
}
