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
 * The "apis" collection of methods.
 * Typical usage is:
 *  <code>
 *   $devprojectsService = new Google_Service_Devprojects(...);
 *   $apis = $devprojectsService->apis;
 *  </code>
 */
class Google_Service_Devprojects_Resource_Apis extends Google_Service_Resource
{
  /**
   * Get the ApiData definition details for a given API. (apis.get)
   *
   * @param string $apisId The resource ID.
   * @param array $optParams Optional parameters.
   *
   * @opt_param string locale The language code, country code and locale variant
   * encoded as a single string. This is intended to be the locale for the end
   * user, and hence the target of translations. Presence of the language code
   * indicates that the response should include translation strings for the
   * requested sections, as appropriate.
   * @opt_param string projectId The numeric ID of the project for which to get
   * the API definition. It has to be either the ID of the project producing the
   * API or the ID of a project having the API available for consumption
   * @opt_param string whitelistId The whitelist project ID. See
   * Projects.Insert.whitelist_id documentation for details.
   * @return Google_Service_Devprojects_ApiData
   */
  public function get($apisId, $optParams = array())
  {
    $params = array('apisId' => $apisId);
    $params = array_merge($params, $optParams);
    return $this->call('get', array($params), "Google_Service_Devprojects_ApiData");
  }
  /**
   * Retrieves a list of resources, possibly filtered based on visibility settings
   * related to the originator of the current end-user request. (apis.listApis)
   *
   * @param array $optParams Optional parameters.
   *
   * @opt_param string locale The language code, country code and locale variant
   * encoded as a single string. This is intended to be the locale for the end
   * user, and hence the target of translations. Presence of the language code
   * indicates that the response should include translation strings for the
   * requested sections, as appropriate.
   * @opt_param string projectId The numeric ID of the project for which to list
   * APIs. If present the API definition list will include all the first-party
   * APIs available to the current user as well as all the third party APIs
   * produced on the specified project or made available for "consumption" to the
   * current project - independently of their activation (enablement) status. If
   * not present only first-party APIs available to the current user are returned.
   * @opt_param string whitelistId The whitelist project ID. See
   * Projects.Insert.whitelist_id documentation for details.
   * @return Google_Service_Devprojects_ApisListResponse
   */
  public function listApis($optParams = array())
  {
    $params = array();
    $params = array_merge($params, $optParams);
    return $this->call('list', array($params), "Google_Service_Devprojects_ApisListResponse");
  }
  /**
   * List APIs consumed by a given project (apis.listconsumed)
   *
   * @param array $optParams Optional parameters.
   *
   * @opt_param string consumerProjectId The numeric ID of the project for which
   * consumed APIs are listed
   * @opt_param string locale The language code, country code and locale variant
   * encoded as a single string. This is intended to be the locale for the end
   * user, and hence the target of translations. Presence of the language code
   * indicates that the response should include translation strings for the
   * requested sections, as appropriate.
   * @opt_param string whitelistId The whitelist project ID. See
   * Projects.Insert.whitelist_id documentation for details.
   * @return Google_Service_Devprojects_ApisListConsumedResponse
   */
  public function listconsumed($optParams = array())
  {
    $params = array();
    $params = array_merge($params, $optParams);
    return $this->call('listconsumed', array($params), "Google_Service_Devprojects_ApisListConsumedResponse");
  }
  /**
   * List APIs produced by a given project (apis.listproduced)
   *
   * @param array $optParams Optional parameters.
   *
   * @opt_param string locale The language code, country code and locale variant
   * encoded as a single string. This is intended to be the locale for the end
   * user, and hence the target of translations. Presence of the language code
   * indicates that the response should include translation strings for the
   * requested sections, as appropriate.
   * @opt_param string producerProjectId The producer project ID to list APIs for.
   * @opt_param string whitelistId The whitelist project ID. See
   * Projects.Insert.whitelist_id documentation for details.
   * @return Google_Service_Devprojects_ApisListProducedResponse
   */
  public function listproduced($optParams = array())
  {
    $params = array();
    $params = array_merge($params, $optParams);
    return $this->call('listproduced', array($params), "Google_Service_Devprojects_ApisListProducedResponse");
  }
}
