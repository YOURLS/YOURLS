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
 * The "creativeAssets" collection of methods.
 * Typical usage is:
 *  <code>
 *   $dfareportingService = new Google_Service_Dfareporting(...);
 *   $creativeAssets = $dfareportingService->creativeAssets;
 *  </code>
 */
class Google_Service_Dfareporting_Resource_CreativeAssets extends Google_Service_Resource
{
  /**
   * Inserts a new creative asset. (creativeAssets.insert)
   *
   * @param string $profileId User profile ID associated with this request.
   * @param string $advertiserId Advertiser ID of this creative. This is a
   * required field.
   * @param Google_Service_Dfareporting_CreativeAssetMetadata $postBody
   * @param array $optParams Optional parameters.
   * @return Google_Service_Dfareporting_CreativeAssetMetadata
   */
  public function insert($profileId, $advertiserId, Google_Service_Dfareporting_CreativeAssetMetadata $postBody, $optParams = array())
  {
    $params = array('profileId' => $profileId, 'advertiserId' => $advertiserId, 'postBody' => $postBody);
    $params = array_merge($params, $optParams);
    return $this->call('insert', array($params), "Google_Service_Dfareporting_CreativeAssetMetadata");
  }
}
