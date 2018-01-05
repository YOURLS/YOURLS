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
 * The "clientMessages" collection of methods.
 * Typical usage is:
 *  <code>
 *   $partnersService = new Google_Service_Partners(...);
 *   $clientMessages = $partnersService->clientMessages;
 *  </code>
 */
class Google_Service_Partners_Resource_ClientMessages extends Google_Service_Resource
{
  /**
   * Logs a generic message from the client, such as `Failed to render component`,
   * `Profile page is running slow`, `More than 500 users have accessed this
   * result.`, etc. (clientMessages.log)
   *
   * @param Google_Service_Partners_LogMessageRequest $postBody
   * @param array $optParams Optional parameters.
   * @return Google_Service_Partners_LogMessageResponse
   */
  public function log(Google_Service_Partners_LogMessageRequest $postBody, $optParams = array())
  {
    $params = array('postBody' => $postBody);
    $params = array_merge($params, $optParams);
    return $this->call('log', array($params), "Google_Service_Partners_LogMessageResponse");
  }
}
