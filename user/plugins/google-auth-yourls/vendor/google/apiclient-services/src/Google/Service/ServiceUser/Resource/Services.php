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
 * The "services" collection of methods.
 * Typical usage is:
 *  <code>
 *   $serviceuserService = new Google_Service_ServiceUser(...);
 *   $services = $serviceuserService->services;
 *  </code>
 */
class Google_Service_ServiceUser_Resource_Services extends Google_Service_Resource
{
  /**
   * Search available services.
   *
   * When no filter is specified, returns all accessible services. For
   * authenticated users, also returns all services the calling user has
   * "servicemanagement.services.bind" permission for. (services.search)
   *
   * @param array $optParams Optional parameters.
   *
   * @opt_param string pageToken Token identifying which result to start with;
   * returned by a previous list call.
   * @opt_param int pageSize Requested size of the next page of data.
   * @return Google_Service_ServiceUser_SearchServicesResponse
   */
  public function search($optParams = array())
  {
    $params = array();
    $params = array_merge($params, $optParams);
    return $this->call('search', array($params), "Google_Service_ServiceUser_SearchServicesResponse");
  }
}
