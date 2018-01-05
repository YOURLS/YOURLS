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
 * The "instanceConfigs" collection of methods.
 * Typical usage is:
 *  <code>
 *   $spannerService = new Google_Service_Spanner(...);
 *   $instanceConfigs = $spannerService->instanceConfigs;
 *  </code>
 */
class Google_Service_Spanner_Resource_ProjectsInstanceConfigs extends Google_Service_Resource
{
  /**
   * Gets information about a particular instance configuration.
   * (instanceConfigs.get)
   *
   * @param string $name Required. The name of the requested instance
   * configuration. Values are of the form `projects//instanceConfigs/`.
   * @param array $optParams Optional parameters.
   * @return Google_Service_Spanner_InstanceConfig
   */
  public function get($name, $optParams = array())
  {
    $params = array('name' => $name);
    $params = array_merge($params, $optParams);
    return $this->call('get', array($params), "Google_Service_Spanner_InstanceConfig");
  }
  /**
   * Lists the supported instance configurations for a given project.
   * (instanceConfigs.listProjectsInstanceConfigs)
   *
   * @param string $parent Required. The name of the project for which a list of
   * supported instance configurations is requested. Values are of the form
   * `projects/`.
   * @param array $optParams Optional parameters.
   *
   * @opt_param int pageSize Number of instance configurations to be returned in
   * the response. If 0 or less, defaults to the server's maximum allowed page
   * size.
   * @opt_param string pageToken If non-empty, `page_token` should contain a
   * next_page_token from a previous ListInstanceConfigsResponse.
   * @return Google_Service_Spanner_ListInstanceConfigsResponse
   */
  public function listProjectsInstanceConfigs($parent, $optParams = array())
  {
    $params = array('parent' => $parent);
    $params = array_merge($params, $optParams);
    return $this->call('list', array($params), "Google_Service_Spanner_ListInstanceConfigsResponse");
  }
}
