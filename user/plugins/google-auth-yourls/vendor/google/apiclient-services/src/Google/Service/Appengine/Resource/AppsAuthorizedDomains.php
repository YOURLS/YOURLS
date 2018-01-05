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
 * The "authorizedDomains" collection of methods.
 * Typical usage is:
 *  <code>
 *   $appengineService = new Google_Service_Appengine(...);
 *   $authorizedDomains = $appengineService->authorizedDomains;
 *  </code>
 */
class Google_Service_Appengine_Resource_AppsAuthorizedDomains extends Google_Service_Resource
{
  /**
   * Lists all domains the user is authorized to administer.
   * (authorizedDomains.listAppsAuthorizedDomains)
   *
   * @param string $appsId Part of `parent`. Name of the parent Application
   * resource. Example: apps/myapp.
   * @param array $optParams Optional parameters.
   *
   * @opt_param string pageToken Continuation token for fetching the next page of
   * results.
   * @opt_param int pageSize Maximum results to return per page.
   * @return Google_Service_Appengine_ListAuthorizedDomainsResponse
   */
  public function listAppsAuthorizedDomains($appsId, $optParams = array())
  {
    $params = array('appsId' => $appsId);
    $params = array_merge($params, $optParams);
    return $this->call('list', array($params), "Google_Service_Appengine_ListAuthorizedDomainsResponse");
  }
}
