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
 * The "shortDynamicLinks" collection of methods.
 * Typical usage is:
 *  <code>
 *   $firebasedynamiclinksService = new Google_Service_FirebaseDynamicLinksAPI(...);
 *   $shortDynamicLinks = $firebasedynamiclinksService->shortDynamicLinks;
 *  </code>
 */
class Google_Service_FirebaseDynamicLinksAPI_Resource_ShortDynamicLinks extends Google_Service_Resource
{
  /**
   * Creates a short Dynamic Link given either a valid long Dynamic Link or
   * details such as Dynamic Link domain, Android and iOS app information. The
   * created short Dynamic Link will not expire.
   *
   * Repeated calls with the same long Dynamic Link or Dynamic Link information
   * will produce the same short Dynamic Link.
   *
   * The Dynamic Link domain in the request must be owned by requester's Firebase
   * project. (shortDynamicLinks.create)
   *
   * @param Google_Service_FirebaseDynamicLinksAPI_CreateShortDynamicLinkRequest $postBody
   * @param array $optParams Optional parameters.
   * @return Google_Service_FirebaseDynamicLinksAPI_CreateShortDynamicLinkResponse
   */
  public function create(Google_Service_FirebaseDynamicLinksAPI_CreateShortDynamicLinkRequest $postBody, $optParams = array())
  {
    $params = array('postBody' => $postBody);
    $params = array_merge($params, $optParams);
    return $this->call('create', array($params), "Google_Service_FirebaseDynamicLinksAPI_CreateShortDynamicLinkResponse");
  }
}
