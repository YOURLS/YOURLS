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
 * The "sizes" collection of methods.
 * Typical usage is:
 *  <code>
 *   $dfareportingService = new Google_Service_Dfareporting(...);
 *   $sizes = $dfareportingService->sizes;
 *  </code>
 */
class Google_Service_Dfareporting_Resource_Sizes extends Google_Service_Resource
{
  /**
   * Gets one size by ID. (sizes.get)
   *
   * @param string $profileId User profile ID associated with this request.
   * @param string $id Size ID.
   * @param array $optParams Optional parameters.
   * @return Google_Service_Dfareporting_Size
   */
  public function get($profileId, $id, $optParams = array())
  {
    $params = array('profileId' => $profileId, 'id' => $id);
    $params = array_merge($params, $optParams);
    return $this->call('get', array($params), "Google_Service_Dfareporting_Size");
  }
  /**
   * Inserts a new size. (sizes.insert)
   *
   * @param string $profileId User profile ID associated with this request.
   * @param Google_Service_Dfareporting_Size $postBody
   * @param array $optParams Optional parameters.
   * @return Google_Service_Dfareporting_Size
   */
  public function insert($profileId, Google_Service_Dfareporting_Size $postBody, $optParams = array())
  {
    $params = array('profileId' => $profileId, 'postBody' => $postBody);
    $params = array_merge($params, $optParams);
    return $this->call('insert', array($params), "Google_Service_Dfareporting_Size");
  }
  /**
   * Retrieves a list of sizes, possibly filtered. (sizes.listSizes)
   *
   * @param string $profileId User profile ID associated with this request.
   * @param array $optParams Optional parameters.
   *
   * @opt_param int height Select only sizes with this height.
   * @opt_param bool iabStandard Select only IAB standard sizes.
   * @opt_param string ids Select only sizes with these IDs.
   * @opt_param int width Select only sizes with this width.
   * @return Google_Service_Dfareporting_SizesListResponse
   */
  public function listSizes($profileId, $optParams = array())
  {
    $params = array('profileId' => $profileId);
    $params = array_merge($params, $optParams);
    return $this->call('list', array($params), "Google_Service_Dfareporting_SizesListResponse");
  }
}
