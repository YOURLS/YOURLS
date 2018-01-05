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
 * The "mobiledevices" collection of methods.
 * Typical usage is:
 *  <code>
 *   $adminService = new Google_Service_Directory(...);
 *   $mobiledevices = $adminService->mobiledevices;
 *  </code>
 */
class Google_Service_Directory_Resource_Mobiledevices extends Google_Service_Resource
{
  /**
   * Take action on Mobile Device (mobiledevices.action)
   *
   * @param string $customerId Immutable ID of the G Suite account
   * @param string $resourceId Immutable ID of Mobile Device
   * @param Google_Service_Directory_MobileDeviceAction $postBody
   * @param array $optParams Optional parameters.
   */
  public function action($customerId, $resourceId, Google_Service_Directory_MobileDeviceAction $postBody, $optParams = array())
  {
    $params = array('customerId' => $customerId, 'resourceId' => $resourceId, 'postBody' => $postBody);
    $params = array_merge($params, $optParams);
    return $this->call('action', array($params));
  }
  /**
   * Delete Mobile Device (mobiledevices.delete)
   *
   * @param string $customerId Immutable ID of the G Suite account
   * @param string $resourceId Immutable ID of Mobile Device
   * @param array $optParams Optional parameters.
   */
  public function delete($customerId, $resourceId, $optParams = array())
  {
    $params = array('customerId' => $customerId, 'resourceId' => $resourceId);
    $params = array_merge($params, $optParams);
    return $this->call('delete', array($params));
  }
  /**
   * Retrieve Mobile Device (mobiledevices.get)
   *
   * @param string $customerId Immutable ID of the G Suite account
   * @param string $resourceId Immutable ID of Mobile Device
   * @param array $optParams Optional parameters.
   *
   * @opt_param string projection Restrict information returned to a set of
   * selected fields.
   * @return Google_Service_Directory_MobileDevice
   */
  public function get($customerId, $resourceId, $optParams = array())
  {
    $params = array('customerId' => $customerId, 'resourceId' => $resourceId);
    $params = array_merge($params, $optParams);
    return $this->call('get', array($params), "Google_Service_Directory_MobileDevice");
  }
  /**
   * Retrieve all Mobile Devices of a customer (paginated)
   * (mobiledevices.listMobiledevices)
   *
   * @param string $customerId Immutable ID of the G Suite account
   * @param array $optParams Optional parameters.
   *
   * @opt_param int maxResults Maximum number of results to return. Default is 100
   * @opt_param string orderBy Column to use for sorting results
   * @opt_param string pageToken Token to specify next page in the list
   * @opt_param string projection Restrict information returned to a set of
   * selected fields.
   * @opt_param string query Search string in the format given at
   * http://support.google.com/a/bin/answer.py?hl=en=1408863#search
   * @opt_param string sortOrder Whether to return results in ascending or
   * descending order. Only of use when orderBy is also used
   * @return Google_Service_Directory_MobileDevices
   */
  public function listMobiledevices($customerId, $optParams = array())
  {
    $params = array('customerId' => $customerId);
    $params = array_merge($params, $optParams);
    return $this->call('list', array($params), "Google_Service_Directory_MobileDevices");
  }
}
