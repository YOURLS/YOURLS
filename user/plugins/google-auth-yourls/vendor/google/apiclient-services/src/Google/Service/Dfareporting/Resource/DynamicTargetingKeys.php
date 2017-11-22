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
 * The "dynamicTargetingKeys" collection of methods.
 * Typical usage is:
 *  <code>
 *   $dfareportingService = new Google_Service_Dfareporting(...);
 *   $dynamicTargetingKeys = $dfareportingService->dynamicTargetingKeys;
 *  </code>
 */
class Google_Service_Dfareporting_Resource_DynamicTargetingKeys extends Google_Service_Resource
{
  /**
   * Deletes an existing dynamic targeting key. (dynamicTargetingKeys.delete)
   *
   * @param string $profileId User profile ID associated with this request.
   * @param string $objectId ID of the object of this dynamic targeting key. This
   * is a required field.
   * @param string $name Name of this dynamic targeting key. This is a required
   * field. Must be less than 256 characters long and cannot contain commas. All
   * characters are converted to lowercase.
   * @param string $objectType Type of the object of this dynamic targeting key.
   * This is a required field.
   * @param array $optParams Optional parameters.
   */
  public function delete($profileId, $objectId, $name, $objectType, $optParams = array())
  {
    $params = array('profileId' => $profileId, 'objectId' => $objectId, 'name' => $name, 'objectType' => $objectType);
    $params = array_merge($params, $optParams);
    return $this->call('delete', array($params));
  }
  /**
   * Inserts a new dynamic targeting key. Keys must be created at the advertiser
   * level before being assigned to the advertiser's ads, creatives, or
   * placements. There is a maximum of 1000 keys per advertiser, out of which a
   * maximum of 20 keys can be assigned per ad, creative, or placement.
   * (dynamicTargetingKeys.insert)
   *
   * @param string $profileId User profile ID associated with this request.
   * @param Google_Service_Dfareporting_DynamicTargetingKey $postBody
   * @param array $optParams Optional parameters.
   * @return Google_Service_Dfareporting_DynamicTargetingKey
   */
  public function insert($profileId, Google_Service_Dfareporting_DynamicTargetingKey $postBody, $optParams = array())
  {
    $params = array('profileId' => $profileId, 'postBody' => $postBody);
    $params = array_merge($params, $optParams);
    return $this->call('insert', array($params), "Google_Service_Dfareporting_DynamicTargetingKey");
  }
  /**
   * Retrieves a list of dynamic targeting keys.
   * (dynamicTargetingKeys.listDynamicTargetingKeys)
   *
   * @param string $profileId User profile ID associated with this request.
   * @param array $optParams Optional parameters.
   *
   * @opt_param string advertiserId Select only dynamic targeting keys whose
   * object has this advertiser ID.
   * @opt_param string names Select only dynamic targeting keys exactly matching
   * these names.
   * @opt_param string objectId Select only dynamic targeting keys with this
   * object ID.
   * @opt_param string objectType Select only dynamic targeting keys with this
   * object type.
   * @return Google_Service_Dfareporting_DynamicTargetingKeysListResponse
   */
  public function listDynamicTargetingKeys($profileId, $optParams = array())
  {
    $params = array('profileId' => $profileId);
    $params = array_merge($params, $optParams);
    return $this->call('list', array($params), "Google_Service_Dfareporting_DynamicTargetingKeysListResponse");
  }
}
