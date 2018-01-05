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
 * The "uptimeCheckConfigs" collection of methods.
 * Typical usage is:
 *  <code>
 *   $monitoringService = new Google_Service_Monitoring(...);
 *   $uptimeCheckConfigs = $monitoringService->uptimeCheckConfigs;
 *  </code>
 */
class Google_Service_Monitoring_Resource_ProjectsUptimeCheckConfigs extends Google_Service_Resource
{
  /**
   * Creates a new uptime check configuration. (uptimeCheckConfigs.create)
   *
   * @param string $parent The project in which to create the uptime check. The
   * format is:projects/[PROJECT_ID].
   * @param Google_Service_Monitoring_UptimeCheckConfig $postBody
   * @param array $optParams Optional parameters.
   * @return Google_Service_Monitoring_UptimeCheckConfig
   */
  public function create($parent, Google_Service_Monitoring_UptimeCheckConfig $postBody, $optParams = array())
  {
    $params = array('parent' => $parent, 'postBody' => $postBody);
    $params = array_merge($params, $optParams);
    return $this->call('create', array($params), "Google_Service_Monitoring_UptimeCheckConfig");
  }
  /**
   * Deletes an uptime check configuration. Note that this method will fail if the
   * uptime check configuration is referenced by an alert policy or other
   * dependent configs that would be rendered invalid by the deletion.
   * (uptimeCheckConfigs.delete)
   *
   * @param string $name The uptime check configuration to delete. The format
   * isprojects/[PROJECT_ID]/uptimeCheckConfigs/[UPTIME_CHECK_ID].
   * @param array $optParams Optional parameters.
   * @return Google_Service_Monitoring_MonitoringEmpty
   */
  public function delete($name, $optParams = array())
  {
    $params = array('name' => $name);
    $params = array_merge($params, $optParams);
    return $this->call('delete', array($params), "Google_Service_Monitoring_MonitoringEmpty");
  }
  /**
   * Gets a single uptime check configuration. (uptimeCheckConfigs.get)
   *
   * @param string $name The uptime check configuration to retrieve. The format
   * isprojects/[PROJECT_ID]/uptimeCheckConfigs/[UPTIME_CHECK_ID].
   * @param array $optParams Optional parameters.
   * @return Google_Service_Monitoring_UptimeCheckConfig
   */
  public function get($name, $optParams = array())
  {
    $params = array('name' => $name);
    $params = array_merge($params, $optParams);
    return $this->call('get', array($params), "Google_Service_Monitoring_UptimeCheckConfig");
  }
  /**
   * Lists the existing valid uptime check configurations for the project, leaving
   * out any invalid configurations.
   * (uptimeCheckConfigs.listProjectsUptimeCheckConfigs)
   *
   * @param string $parent The project whose uptime check configurations are
   * listed. The format isprojects/[PROJECT_ID].
   * @param array $optParams Optional parameters.
   *
   * @opt_param string pageToken If this field is not empty then it must contain
   * the nextPageToken value returned by a previous call to this method. Using
   * this field causes the method to return more results from the previous method
   * call.
   * @opt_param int pageSize The maximum number of results to return in a single
   * response. The server may further constrain the maximum number of results
   * returned in a single page. If the page_size is <=0, the server will decide
   * the number of results to be returned.
   * @return Google_Service_Monitoring_ListUptimeCheckConfigsResponse
   */
  public function listProjectsUptimeCheckConfigs($parent, $optParams = array())
  {
    $params = array('parent' => $parent);
    $params = array_merge($params, $optParams);
    return $this->call('list', array($params), "Google_Service_Monitoring_ListUptimeCheckConfigsResponse");
  }
  /**
   * Updates an uptime check configuration. You can either replace the entire
   * configuration with a new one or replace only certain fields in the current
   * configuration by specifying the fields to be updated via "updateMask".
   * Returns the updated configuration. (uptimeCheckConfigs.patch)
   *
   * @param string $name A unique resource name for this UptimeCheckConfig. The
   * format is:projects/[PROJECT_ID]/uptimeCheckConfigs/[UPTIME_CHECK_ID].This
   * field should be omitted when creating the uptime check configuration; on
   * create, the resource name is assigned by the server and included in the
   * response.
   * @param Google_Service_Monitoring_UptimeCheckConfig $postBody
   * @param array $optParams Optional parameters.
   *
   * @opt_param string updateMask Optional. If present, only the listed fields in
   * the current uptime check configuration are updated with values from the new
   * configuration. If this field is empty, then the current configuration is
   * completely replaced with the new configuration.
   * @return Google_Service_Monitoring_UptimeCheckConfig
   */
  public function patch($name, Google_Service_Monitoring_UptimeCheckConfig $postBody, $optParams = array())
  {
    $params = array('name' => $name, 'postBody' => $postBody);
    $params = array_merge($params, $optParams);
    return $this->call('patch', array($params), "Google_Service_Monitoring_UptimeCheckConfig");
  }
}
