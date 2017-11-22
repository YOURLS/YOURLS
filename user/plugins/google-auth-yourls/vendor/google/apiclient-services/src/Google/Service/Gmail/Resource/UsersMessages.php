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
 * The "messages" collection of methods.
 * Typical usage is:
 *  <code>
 *   $gmailService = new Google_Service_Gmail(...);
 *   $messages = $gmailService->messages;
 *  </code>
 */
class Google_Service_Gmail_Resource_UsersMessages extends Google_Service_Resource
{
  /**
   * Deletes many messages by message ID. Provides no guarantees that messages
   * were not already deleted or even existed at all. (messages.batchDelete)
   *
   * @param string $userId The user's email address. The special value me can be
   * used to indicate the authenticated user.
   * @param Google_Service_Gmail_BatchDeleteMessagesRequest $postBody
   * @param array $optParams Optional parameters.
   */
  public function batchDelete($userId, Google_Service_Gmail_BatchDeleteMessagesRequest $postBody, $optParams = array())
  {
    $params = array('userId' => $userId, 'postBody' => $postBody);
    $params = array_merge($params, $optParams);
    return $this->call('batchDelete', array($params));
  }
  /**
   * Modifies the labels on the specified messages. (messages.batchModify)
   *
   * @param string $userId The user's email address. The special value me can be
   * used to indicate the authenticated user.
   * @param Google_Service_Gmail_BatchModifyMessagesRequest $postBody
   * @param array $optParams Optional parameters.
   */
  public function batchModify($userId, Google_Service_Gmail_BatchModifyMessagesRequest $postBody, $optParams = array())
  {
    $params = array('userId' => $userId, 'postBody' => $postBody);
    $params = array_merge($params, $optParams);
    return $this->call('batchModify', array($params));
  }
  /**
   * Immediately and permanently deletes the specified message. This operation
   * cannot be undone. Prefer messages.trash instead. (messages.delete)
   *
   * @param string $userId The user's email address. The special value me can be
   * used to indicate the authenticated user.
   * @param string $id The ID of the message to delete.
   * @param array $optParams Optional parameters.
   */
  public function delete($userId, $id, $optParams = array())
  {
    $params = array('userId' => $userId, 'id' => $id);
    $params = array_merge($params, $optParams);
    return $this->call('delete', array($params));
  }
  /**
   * Gets the specified message. (messages.get)
   *
   * @param string $userId The user's email address. The special value me can be
   * used to indicate the authenticated user.
   * @param string $id The ID of the message to retrieve.
   * @param array $optParams Optional parameters.
   *
   * @opt_param string format The format to return the message in.
   * @opt_param string metadataHeaders When given and format is METADATA, only
   * include headers specified.
   * @return Google_Service_Gmail_Message
   */
  public function get($userId, $id, $optParams = array())
  {
    $params = array('userId' => $userId, 'id' => $id);
    $params = array_merge($params, $optParams);
    return $this->call('get', array($params), "Google_Service_Gmail_Message");
  }
  /**
   * Imports a message into only this user's mailbox, with standard email delivery
   * scanning and classification similar to receiving via SMTP. Does not send a
   * message. (messages.import)
   *
   * @param string $userId The user's email address. The special value me can be
   * used to indicate the authenticated user.
   * @param Google_Service_Gmail_Message $postBody
   * @param array $optParams Optional parameters.
   *
   * @opt_param bool deleted Mark the email as permanently deleted (not TRASH) and
   * only visible in Google Vault to a Vault administrator. Only used for G Suite
   * accounts.
   * @opt_param string internalDateSource Source for Gmail's internal date of the
   * message.
   * @opt_param bool neverMarkSpam Ignore the Gmail spam classifier decision and
   * never mark this email as SPAM in the mailbox.
   * @opt_param bool processForCalendar Process calendar invites in the email and
   * add any extracted meetings to the Google Calendar for this user.
   * @return Google_Service_Gmail_Message
   */
  public function import($userId, Google_Service_Gmail_Message $postBody, $optParams = array())
  {
    $params = array('userId' => $userId, 'postBody' => $postBody);
    $params = array_merge($params, $optParams);
    return $this->call('import', array($params), "Google_Service_Gmail_Message");
  }
  /**
   * Directly inserts a message into only this user's mailbox similar to IMAP
   * APPEND, bypassing most scanning and classification. Does not send a message.
   * (messages.insert)
   *
   * @param string $userId The user's email address. The special value me can be
   * used to indicate the authenticated user.
   * @param Google_Service_Gmail_Message $postBody
   * @param array $optParams Optional parameters.
   *
   * @opt_param bool deleted Mark the email as permanently deleted (not TRASH) and
   * only visible in Google Vault to a Vault administrator. Only used for G Suite
   * accounts.
   * @opt_param string internalDateSource Source for Gmail's internal date of the
   * message.
   * @return Google_Service_Gmail_Message
   */
  public function insert($userId, Google_Service_Gmail_Message $postBody, $optParams = array())
  {
    $params = array('userId' => $userId, 'postBody' => $postBody);
    $params = array_merge($params, $optParams);
    return $this->call('insert', array($params), "Google_Service_Gmail_Message");
  }
  /**
   * Lists the messages in the user's mailbox. (messages.listUsersMessages)
   *
   * @param string $userId The user's email address. The special value me can be
   * used to indicate the authenticated user.
   * @param array $optParams Optional parameters.
   *
   * @opt_param bool includeSpamTrash Include messages from SPAM and TRASH in the
   * results.
   * @opt_param string labelIds Only return messages with labels that match all of
   * the specified label IDs.
   * @opt_param string maxResults Maximum number of messages to return.
   * @opt_param string pageToken Page token to retrieve a specific page of results
   * in the list.
   * @opt_param string q Only return messages matching the specified query.
   * Supports the same query format as the Gmail search box. For example,
   * "from:someuser@example.com rfc822msgid: is:unread". Parameter cannot be used
   * when accessing the api using the gmail.metadata scope.
   * @return Google_Service_Gmail_ListMessagesResponse
   */
  public function listUsersMessages($userId, $optParams = array())
  {
    $params = array('userId' => $userId);
    $params = array_merge($params, $optParams);
    return $this->call('list', array($params), "Google_Service_Gmail_ListMessagesResponse");
  }
  /**
   * Modifies the labels on the specified message. (messages.modify)
   *
   * @param string $userId The user's email address. The special value me can be
   * used to indicate the authenticated user.
   * @param string $id The ID of the message to modify.
   * @param Google_Service_Gmail_ModifyMessageRequest $postBody
   * @param array $optParams Optional parameters.
   * @return Google_Service_Gmail_Message
   */
  public function modify($userId, $id, Google_Service_Gmail_ModifyMessageRequest $postBody, $optParams = array())
  {
    $params = array('userId' => $userId, 'id' => $id, 'postBody' => $postBody);
    $params = array_merge($params, $optParams);
    return $this->call('modify', array($params), "Google_Service_Gmail_Message");
  }
  /**
   * Sends the specified message to the recipients in the To, Cc, and Bcc headers.
   * (messages.send)
   *
   * @param string $userId The user's email address. The special value me can be
   * used to indicate the authenticated user.
   * @param Google_Service_Gmail_Message $postBody
   * @param array $optParams Optional parameters.
   * @return Google_Service_Gmail_Message
   */
  public function send($userId, Google_Service_Gmail_Message $postBody, $optParams = array())
  {
    $params = array('userId' => $userId, 'postBody' => $postBody);
    $params = array_merge($params, $optParams);
    return $this->call('send', array($params), "Google_Service_Gmail_Message");
  }
  /**
   * Moves the specified message to the trash. (messages.trash)
   *
   * @param string $userId The user's email address. The special value me can be
   * used to indicate the authenticated user.
   * @param string $id The ID of the message to Trash.
   * @param array $optParams Optional parameters.
   * @return Google_Service_Gmail_Message
   */
  public function trash($userId, $id, $optParams = array())
  {
    $params = array('userId' => $userId, 'id' => $id);
    $params = array_merge($params, $optParams);
    return $this->call('trash', array($params), "Google_Service_Gmail_Message");
  }
  /**
   * Removes the specified message from the trash. (messages.untrash)
   *
   * @param string $userId The user's email address. The special value me can be
   * used to indicate the authenticated user.
   * @param string $id The ID of the message to remove from Trash.
   * @param array $optParams Optional parameters.
   * @return Google_Service_Gmail_Message
   */
  public function untrash($userId, $id, $optParams = array())
  {
    $params = array('userId' => $userId, 'id' => $id);
    $params = array_merge($params, $optParams);
    return $this->call('untrash', array($params), "Google_Service_Gmail_Message");
  }
}
