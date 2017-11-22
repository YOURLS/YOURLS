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
 * The "devices" collection of methods.
 * Typical usage is:
 *  <code>
 *   $androidmanagementService = new Google_Service_AndroidManagement(...);
 *   $devices = $androidmanagementService->devices;
 *  </code>
 */
class Google_Service_AndroidManagement_Resource_EnterprisesDevices extends Google_Service_Resource
{
  /**
   * Deletes a device, which causes the device to be wiped. (devices.delete)
   *
   * @param string $name The name of the device in the form
   * enterprises/{enterpriseId}/devices/{deviceId}
   * @param array $optParams Optional parameters.
   * @return Google_Service_AndroidManagement_AndroidmanagementEmpty
   */
  public function delete($name, $optParams = array())
  {
    $params = array('name' => $name);
    $params = array_merge($params, $optParams);
    return $this->call('delete', array($params), "Google_Service_AndroidManagement_AndroidmanagementEmpty");
  }
  /**
   * Gets a device. (devices.get)
   *
   * @param string $name The name of the device in the form
   * enterprises/{enterpriseId}/devices/{deviceId}
   * @param array $optParams Optional parameters.
   * @return Google_Service_AndroidManagement_Device
   */
  public function get($name, $optParams = array())
  {
    $params = array('name' => $name);
    $params = array_merge($params, $optParams);
    return $this->call('get', array($params), "Google_Service_AndroidManagement_Device");
  }
  /**
   * Issues a command to a device. The Operation resource returned contains a
   * Command in its metadata field. Use the get operation method to get the status
   * of the command. (devices.issueCommand)
   *
   * @param string $name The name of the device in the form
   * enterprises/{enterpriseId}/devices/{deviceId}
   * @param Google_Service_AndroidManagement_Command $postBody
   * @param array $optParams Optional parameters.
   * @return Google_Service_AndroidManagement_Operation
   */
  public function issueCommand($name, Google_Service_AndroidManagement_Command $postBody, $optParams = array())
  {
    $params = array('name' => $name, 'postBody' => $postBody);
    $params = array_merge($params, $optParams);
    return $this->call('issueCommand', array($params), "Google_Service_AndroidManagement_Operation");
  }
  /**
   * Lists devices for a given enterprise. (devices.listEnterprisesDevices)
   *
   * @param string $parent The name of the enterprise in the form
   * enterprises/{enterpriseId}
   * @param array $optParams Optional parameters.
   *
   * @opt_param int pageSize The requested page size. The actual page size may be
   * fixed to a min or max value.
   * @opt_param string pageToken A token identifying a page of results the server
   * should return.
   * @return Google_Service_AndroidManagement_ListDevicesResponse
   */
  public function listEnterprisesDevices($parent, $optParams = array())
  {
    $params = array('parent' => $parent);
    $params = array_merge($params, $optParams);
    return $this->call('list', array($params), "Google_Service_AndroidManagement_ListDevicesResponse");
  }
  /**
   * Updates a device. (devices.patch)
   *
   * @param string $name The name of the device in the form
   * enterprises/{enterpriseId}/devices/{deviceId}
   * @param Google_Service_AndroidManagement_Device $postBody
   * @param array $optParams Optional parameters.
   *
   * @opt_param string updateMask The field mask indicating the fields to update.
   * If not set, all modifiable fields will be modified.
   * @return Google_Service_AndroidManagement_Device
   */
  public function patch($name, Google_Service_AndroidManagement_Device $postBody, $optParams = array())
  {
    $params = array('name' => $name, 'postBody' => $postBody);
    $params = array_merge($params, $optParams);
    return $this->call('patch', array($params), "Google_Service_AndroidManagement_Device");
  }
}
