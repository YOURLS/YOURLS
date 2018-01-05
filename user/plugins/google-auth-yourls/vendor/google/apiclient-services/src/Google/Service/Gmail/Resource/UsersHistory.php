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
 * The "history" collection of methods.
 * Typical usage is:
 *  <code>
 *   $gmailService = new Google_Service_Gmail(...);
 *   $history = $gmailService->history;
 *  </code>
 */
class Google_Service_Gmail_Resource_UsersHistory extends Google_Service_Resource
{
  /**
   * Lists the history of all changes to the given mailbox. History results are
   * returned in chronological order (increasing historyId).
   * (history.listUsersHistory)
   *
   * @param string $userId The user's email address. The special value me can be
   * used to indicate the authenticated user.
   * @param array $optParams Optional parameters.
   *
   * @opt_param string historyTypes History types to be returned by the function
   * @opt_param string labelId Only return messages with a label matching the ID.
   * @opt_param string maxResults The maximum number of history records to return.
   * @opt_param string pageToken Page token to retrieve a specific page of results
   * in the list.
   * @opt_param string startHistoryId Required. Returns history records after the
   * specified startHistoryId. The supplied startHistoryId should be obtained from
   * the historyId of a message, thread, or previous list response. History IDs
   * increase chronologically but are not contiguous with random gaps in between
   * valid IDs. Supplying an invalid or out of date startHistoryId typically
   * returns an HTTP 404 error code. A historyId is typically valid for at least a
   * week, but in some rare circumstances may be valid for only a few hours. If
   * you receive an HTTP 404 error response, your application should perform a
   * full sync. If you receive no nextPageToken in the response, there are no
   * updates to retrieve and you can store the returned historyId for a future
   * request.
   * @return Google_Service_Gmail_ListHistoryResponse
   */
  public function listUsersHistory($userId, $optParams = array())
  {
    $params = array('userId' => $userId);
    $params = array_merge($params, $optParams);
    return $this->call('list', array($params), "Google_Service_Gmail_ListHistoryResponse");
  }
}
