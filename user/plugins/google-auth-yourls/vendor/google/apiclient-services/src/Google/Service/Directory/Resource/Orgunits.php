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
 * The "orgunits" collection of methods.
 * Typical usage is:
 *  <code>
 *   $adminService = new Google_Service_Directory(...);
 *   $orgunits = $adminService->orgunits;
 *  </code>
 */
class Google_Service_Directory_Resource_Orgunits extends Google_Service_Resource
{
  /**
   * Remove organizational unit (orgunits.delete)
   *
   * @param string $customerId Immutable ID of the G Suite account
   * @param string|array $orgUnitPath Full path of the organizational unit or its
   * ID
   * @param array $optParams Optional parameters.
   */
  public function delete($customerId, $orgUnitPath, $optParams = array())
  {
    $params = array('customerId' => $customerId, 'orgUnitPath' => $orgUnitPath);
    $params = array_merge($params, $optParams);
    return $this->call('delete', array($params));
  }
  /**
   * Retrieve organizational unit (orgunits.get)
   *
   * @param string $customerId Immutable ID of the G Suite account
   * @param string|array $orgUnitPath Full path of the organizational unit or its
   * ID
   * @param array $optParams Optional parameters.
   * @return Google_Service_Directory_OrgUnit
   */
  public function get($customerId, $orgUnitPath, $optParams = array())
  {
    $params = array('customerId' => $customerId, 'orgUnitPath' => $orgUnitPath);
    $params = array_merge($params, $optParams);
    return $this->call('get', array($params), "Google_Service_Directory_OrgUnit");
  }
  /**
   * Add organizational unit (orgunits.insert)
   *
   * @param string $customerId Immutable ID of the G Suite account
   * @param Google_Service_Directory_OrgUnit $postBody
   * @param array $optParams Optional parameters.
   * @return Google_Service_Directory_OrgUnit
   */
  public function insert($customerId, Google_Service_Directory_OrgUnit $postBody, $optParams = array())
  {
    $params = array('customerId' => $customerId, 'postBody' => $postBody);
    $params = array_merge($params, $optParams);
    return $this->call('insert', array($params), "Google_Service_Directory_OrgUnit");
  }
  /**
   * Retrieve all organizational units (orgunits.listOrgunits)
   *
   * @param string $customerId Immutable ID of the G Suite account
   * @param array $optParams Optional parameters.
   *
   * @opt_param string orgUnitPath the URL-encoded organizational unit's path or
   * its ID
   * @opt_param string type Whether to return all sub-organizations or just
   * immediate children
   * @return Google_Service_Directory_OrgUnits
   */
  public function listOrgunits($customerId, $optParams = array())
  {
    $params = array('customerId' => $customerId);
    $params = array_merge($params, $optParams);
    return $this->call('list', array($params), "Google_Service_Directory_OrgUnits");
  }
  /**
   * Update organizational unit. This method supports patch semantics.
   * (orgunits.patch)
   *
   * @param string $customerId Immutable ID of the G Suite account
   * @param string|array $orgUnitPath Full path of the organizational unit or its
   * ID
   * @param Google_Service_Directory_OrgUnit $postBody
   * @param array $optParams Optional parameters.
   * @return Google_Service_Directory_OrgUnit
   */
  public function patch($customerId, $orgUnitPath, Google_Service_Directory_OrgUnit $postBody, $optParams = array())
  {
    $params = array('customerId' => $customerId, 'orgUnitPath' => $orgUnitPath, 'postBody' => $postBody);
    $params = array_merge($params, $optParams);
    return $this->call('patch', array($params), "Google_Service_Directory_OrgUnit");
  }
  /**
   * Update organizational unit (orgunits.update)
   *
   * @param string $customerId Immutable ID of the G Suite account
   * @param string|array $orgUnitPath Full path of the organizational unit or its
   * ID
   * @param Google_Service_Directory_OrgUnit $postBody
   * @param array $optParams Optional parameters.
   * @return Google_Service_Directory_OrgUnit
   */
  public function update($customerId, $orgUnitPath, Google_Service_Directory_OrgUnit $postBody, $optParams = array())
  {
    $params = array('customerId' => $customerId, 'orgUnitPath' => $orgUnitPath, 'postBody' => $postBody);
    $params = array_merge($params, $optParams);
    return $this->call('update', array($params), "Google_Service_Directory_OrgUnit");
  }
}
