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
 * The "revisions" collection of methods.
 * Typical usage is:
 *  <code>
 *   $gamesService = new Google_Service_Games(...);
 *   $revisions = $gamesService->revisions;
 *  </code>
 */
class Google_Service_Games_Resource_Revisions extends Google_Service_Resource
{
  /**
   * Checks whether the games client is out of date. (revisions.check)
   *
   * @param string $clientRevision The revision of the client SDK used by your
   * application. Format: [PLATFORM_TYPE]:[VERSION_NUMBER]. Possible values of
   * PLATFORM_TYPE are:   - "ANDROID" - Client is running the Android SDK.  -
   * "IOS" - Client is running the iOS SDK.  - "WEB_APP" - Client is running as a
   * Web App.
   * @param array $optParams Optional parameters.
   *
   * @opt_param string consistencyToken The last-seen mutation timestamp.
   * @return Google_Service_Games_RevisionCheckResponse
   */
  public function check($clientRevision, $optParams = array())
  {
    $params = array('clientRevision' => $clientRevision);
    $params = array_merge($params, $optParams);
    return $this->call('check', array($params), "Google_Service_Games_RevisionCheckResponse");
  }
}
