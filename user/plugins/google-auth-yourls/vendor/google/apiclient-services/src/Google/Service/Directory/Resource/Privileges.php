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
 * The "privileges" collection of methods.
 * Typical usage is:
 *  <code>
 *   $adminService = new Google_Service_Directory(...);
 *   $privileges = $adminService->privileges;
 *  </code>
 */
class Google_Service_Directory_Resource_Privileges extends Google_Service_Resource
{
  /**
   * Retrieves a paginated list of all privileges for a customer.
   * (privileges.listPrivileges)
   *
   * @param string $customer Immutable ID of the G Suite account.
   * @param array $optParams Optional parameters.
   * @return Google_Service_Directory_Privileges
   */
  public function listPrivileges($customer, $optParams = array())
  {
    $params = array('customer' => $customer);
    $params = array_merge($params, $optParams);
    return $this->call('list', array($params), "Google_Service_Directory_Privileges");
  }
}
