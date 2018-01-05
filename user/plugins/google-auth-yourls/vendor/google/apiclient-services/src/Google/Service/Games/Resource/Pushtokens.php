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
 * The "pushtokens" collection of methods.
 * Typical usage is:
 *  <code>
 *   $gamesService = new Google_Service_Games(...);
 *   $pushtokens = $gamesService->pushtokens;
 *  </code>
 */
class Google_Service_Games_Resource_Pushtokens extends Google_Service_Resource
{
  /**
   * Removes a push token for the current user and application. Removing a non-
   * existent push token will report success. (pushtokens.remove)
   *
   * @param Google_Service_Games_PushTokenId $postBody
   * @param array $optParams Optional parameters.
   *
   * @opt_param string consistencyToken The last-seen mutation timestamp.
   */
  public function remove(Google_Service_Games_PushTokenId $postBody, $optParams = array())
  {
    $params = array('postBody' => $postBody);
    $params = array_merge($params, $optParams);
    return $this->call('remove', array($params));
  }
  /**
   * Registers a push token for the current user and application.
   * (pushtokens.update)
   *
   * @param Google_Service_Games_PushToken $postBody
   * @param array $optParams Optional parameters.
   *
   * @opt_param string consistencyToken The last-seen mutation timestamp.
   */
  public function update(Google_Service_Games_PushToken $postBody, $optParams = array())
  {
    $params = array('postBody' => $postBody);
    $params = array_merge($params, $optParams);
    return $this->call('update', array($params));
  }
}
