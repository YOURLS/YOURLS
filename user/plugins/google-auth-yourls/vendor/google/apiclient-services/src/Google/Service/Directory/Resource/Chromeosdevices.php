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
 * The "chromeosdevices" collection of methods.
 * Typical usage is:
 *  <code>
 *   $adminService = new Google_Service_Directory(...);
 *   $chromeosdevices = $adminService->chromeosdevices;
 *  </code>
 */
class Google_Service_Directory_Resource_Chromeosdevices extends Google_Service_Resource
{
  /**
   * Take action on Chrome OS Device (chromeosdevices.action)
   *
   * @param string $customerId Immutable ID of the G Suite account
   * @param string $resourceId Immutable ID of Chrome OS Device
   * @param Google_Service_Directory_ChromeOsDeviceAction $postBody
   * @param array $optParams Optional parameters.
   */
  public function action($customerId, $resourceId, Google_Service_Directory_ChromeOsDeviceAction $postBody, $optParams = array())
  {
    $params = array('customerId' => $customerId, 'resourceId' => $resourceId, 'postBody' => $postBody);
    $params = array_merge($params, $optParams);
    return $this->call('action', array($params));
  }
  /**
   * Retrieve Chrome OS Device (chromeosdevices.get)
   *
   * @param string $customerId Immutable ID of the G Suite account
   * @param string $deviceId Immutable ID of Chrome OS Device
   * @param array $optParams Optional parameters.
   *
   * @opt_param string projection Restrict information returned to a set of
   * selected fields.
   * @return Google_Service_Directory_ChromeOsDevice
   */
  public function get($customerId, $deviceId, $optParams = array())
  {
    $params = array('customerId' => $customerId, 'deviceId' => $deviceId);
    $params = array_merge($params, $optParams);
    return $this->call('get', array($params), "Google_Service_Directory_ChromeOsDevice");
  }
  /**
   * Retrieve all Chrome OS Devices of a customer (paginated)
   * (chromeosdevices.listChromeosdevices)
   *
   * @param string $customerId Immutable ID of the G Suite account
   * @param array $optParams Optional parameters.
   *
   * @opt_param int maxResults Maximum number of results to return. Default is 100
   * @opt_param string orderBy Column to use for sorting results
   * @opt_param string orgUnitPath Full path of the organizational unit or its ID
   * @opt_param string pageToken Token to specify next page in the list
   * @opt_param string projection Restrict information returned to a set of
   * selected fields.
   * @opt_param string query Search string in the format given at
   * http://support.google.com/chromeos/a/bin/answer.py?hl=en=1698333
   * @opt_param string sortOrder Whether to return results in ascending or
   * descending order. Only of use when orderBy is also used
   * @return Google_Service_Directory_ChromeOsDevices
   */
  public function listChromeosdevices($customerId, $optParams = array())
  {
    $params = array('customerId' => $customerId);
    $params = array_merge($params, $optParams);
    return $this->call('list', array($params), "Google_Service_Directory_ChromeOsDevices");
  }
  /**
   * Move or insert multiple Chrome OS Devices to organizational unit
   * (chromeosdevices.moveDevicesToOu)
   *
   * @param string $customerId Immutable ID of the G Suite account
   * @param string $orgUnitPath Full path of the target organizational unit or its
   * ID
   * @param Google_Service_Directory_ChromeOsMoveDevicesToOu $postBody
   * @param array $optParams Optional parameters.
   */
  public function moveDevicesToOu($customerId, $orgUnitPath, Google_Service_Directory_ChromeOsMoveDevicesToOu $postBody, $optParams = array())
  {
    $params = array('customerId' => $customerId, 'orgUnitPath' => $orgUnitPath, 'postBody' => $postBody);
    $params = array_merge($params, $optParams);
    return $this->call('moveDevicesToOu', array($params));
  }
  /**
   * Update Chrome OS Device. This method supports patch semantics.
   * (chromeosdevices.patch)
   *
   * @param string $customerId Immutable ID of the G Suite account
   * @param string $deviceId Immutable ID of Chrome OS Device
   * @param Google_Service_Directory_ChromeOsDevice $postBody
   * @param array $optParams Optional parameters.
   *
   * @opt_param string projection Restrict information returned to a set of
   * selected fields.
   * @return Google_Service_Directory_ChromeOsDevice
   */
  public function patch($customerId, $deviceId, Google_Service_Directory_ChromeOsDevice $postBody, $optParams = array())
  {
    $params = array('customerId' => $customerId, 'deviceId' => $deviceId, 'postBody' => $postBody);
    $params = array_merge($params, $optParams);
    return $this->call('patch', array($params), "Google_Service_Directory_ChromeOsDevice");
  }
  /**
   * Update Chrome OS Device (chromeosdevices.update)
   *
   * @param string $customerId Immutable ID of the G Suite account
   * @param string $deviceId Immutable ID of Chrome OS Device
   * @param Google_Service_Directory_ChromeOsDevice $postBody
   * @param array $optParams Optional parameters.
   *
   * @opt_param string projection Restrict information returned to a set of
   * selected fields.
   * @return Google_Service_Directory_ChromeOsDevice
   */
  public function update($customerId, $deviceId, Google_Service_Directory_ChromeOsDevice $postBody, $optParams = array())
  {
    $params = array('customerId' => $customerId, 'deviceId' => $deviceId, 'postBody' => $postBody);
    $params = array_merge($params, $optParams);
    return $this->call('update', array($params), "Google_Service_Directory_ChromeOsDevice");
  }
}
