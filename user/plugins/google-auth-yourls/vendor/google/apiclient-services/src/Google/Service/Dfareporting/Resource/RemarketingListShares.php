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
 * The "remarketingListShares" collection of methods.
 * Typical usage is:
 *  <code>
 *   $dfareportingService = new Google_Service_Dfareporting(...);
 *   $remarketingListShares = $dfareportingService->remarketingListShares;
 *  </code>
 */
class Google_Service_Dfareporting_Resource_RemarketingListShares extends Google_Service_Resource
{
  /**
   * Gets one remarketing list share by remarketing list ID.
   * (remarketingListShares.get)
   *
   * @param string $profileId User profile ID associated with this request.
   * @param string $remarketingListId Remarketing list ID.
   * @param array $optParams Optional parameters.
   * @return Google_Service_Dfareporting_RemarketingListShare
   */
  public function get($profileId, $remarketingListId, $optParams = array())
  {
    $params = array('profileId' => $profileId, 'remarketingListId' => $remarketingListId);
    $params = array_merge($params, $optParams);
    return $this->call('get', array($params), "Google_Service_Dfareporting_RemarketingListShare");
  }
  /**
   * Updates an existing remarketing list share. This method supports patch
   * semantics. (remarketingListShares.patch)
   *
   * @param string $profileId User profile ID associated with this request.
   * @param string $remarketingListId Remarketing list ID.
   * @param Google_Service_Dfareporting_RemarketingListShare $postBody
   * @param array $optParams Optional parameters.
   * @return Google_Service_Dfareporting_RemarketingListShare
   */
  public function patch($profileId, $remarketingListId, Google_Service_Dfareporting_RemarketingListShare $postBody, $optParams = array())
  {
    $params = array('profileId' => $profileId, 'remarketingListId' => $remarketingListId, 'postBody' => $postBody);
    $params = array_merge($params, $optParams);
    return $this->call('patch', array($params), "Google_Service_Dfareporting_RemarketingListShare");
  }
  /**
   * Updates an existing remarketing list share. (remarketingListShares.update)
   *
   * @param string $profileId User profile ID associated with this request.
   * @param Google_Service_Dfareporting_RemarketingListShare $postBody
   * @param array $optParams Optional parameters.
   * @return Google_Service_Dfareporting_RemarketingListShare
   */
  public function update($profileId, Google_Service_Dfareporting_RemarketingListShare $postBody, $optParams = array())
  {
    $params = array('profileId' => $profileId, 'postBody' => $postBody);
    $params = array_merge($params, $optParams);
    return $this->call('update', array($params), "Google_Service_Dfareporting_RemarketingListShare");
  }
}
