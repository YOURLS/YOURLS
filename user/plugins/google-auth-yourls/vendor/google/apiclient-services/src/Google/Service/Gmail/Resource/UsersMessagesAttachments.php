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
 * The "attachments" collection of methods.
 * Typical usage is:
 *  <code>
 *   $gmailService = new Google_Service_Gmail(...);
 *   $attachments = $gmailService->attachments;
 *  </code>
 */
class Google_Service_Gmail_Resource_UsersMessagesAttachments extends Google_Service_Resource
{
  /**
   * Gets the specified message attachment. (attachments.get)
   *
   * @param string $userId The user's email address. The special value me can be
   * used to indicate the authenticated user.
   * @param string $messageId The ID of the message containing the attachment.
   * @param string $id The ID of the attachment.
   * @param array $optParams Optional parameters.
   * @return Google_Service_Gmail_MessagePartBody
   */
  public function get($userId, $messageId, $id, $optParams = array())
  {
    $params = array('userId' => $userId, 'messageId' => $messageId, 'id' => $id);
    $params = array_merge($params, $optParams);
    return $this->call('get', array($params), "Google_Service_Gmail_MessagePartBody");
  }
}
