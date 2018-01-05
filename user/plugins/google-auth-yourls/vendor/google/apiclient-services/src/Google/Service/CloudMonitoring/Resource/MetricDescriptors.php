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
 * The "metricDescriptors" collection of methods.
 * Typical usage is:
 *  <code>
 *   $cloudmonitoringService = new Google_Service_CloudMonitoring(...);
 *   $metricDescriptors = $cloudmonitoringService->metricDescriptors;
 *  </code>
 */
class Google_Service_CloudMonitoring_Resource_MetricDescriptors extends Google_Service_Resource
{
  /**
   * Create a new metric. (metricDescriptors.create)
   *
   * @param string $project The project id. The value can be the numeric project
   * ID or string-based project name.
   * @param Google_Service_CloudMonitoring_MetricDescriptor $postBody
   * @param array $optParams Optional parameters.
   * @return Google_Service_CloudMonitoring_MetricDescriptor
   */
  public function create($project, Google_Service_CloudMonitoring_MetricDescriptor $postBody, $optParams = array())
  {
    $params = array('project' => $project, 'postBody' => $postBody);
    $params = array_merge($params, $optParams);
    return $this->call('create', array($params), "Google_Service_CloudMonitoring_MetricDescriptor");
  }
  /**
   * Delete an existing metric. (metricDescriptors.delete)
   *
   * @param string $project The project ID to which the metric belongs.
   * @param string $metric Name of the metric.
   * @param array $optParams Optional parameters.
   * @return Google_Service_CloudMonitoring_DeleteMetricDescriptorResponse
   */
  public function delete($project, $metric, $optParams = array())
  {
    $params = array('project' => $project, 'metric' => $metric);
    $params = array_merge($params, $optParams);
    return $this->call('delete', array($params), "Google_Service_CloudMonitoring_DeleteMetricDescriptorResponse");
  }
  /**
   * List metric descriptors that match the query. If the query is not set, then
   * all of the metric descriptors will be returned. Large responses will be
   * paginated, use the nextPageToken returned in the response to request
   * subsequent pages of results by setting the pageToken query parameter to the
   * value of the nextPageToken. (metricDescriptors.listMetricDescriptors)
   *
   * @param string $project The project id. The value can be the numeric project
   * ID or string-based project name.
   * @param array $optParams Optional parameters.
   *
   * @opt_param int count Maximum number of metric descriptors per page. Used for
   * pagination. If not specified, count = 100.
   * @opt_param string pageToken The pagination token, which is used to page
   * through large result sets. Set this value to the value of the nextPageToken
   * to retrieve the next page of results.
   * @opt_param string query The query used to search against existing metrics.
   * Separate keywords with a space; the service joins all keywords with AND,
   * meaning that all keywords must match for a metric to be returned. If this
   * field is omitted, all metrics are returned. If an empty string is passed with
   * this field, no metrics are returned.
   * @return Google_Service_CloudMonitoring_ListMetricDescriptorsResponse
   */
  public function listMetricDescriptors($project, $optParams = array())
  {
    $params = array('project' => $project);
    $params = array_merge($params, $optParams);
    return $this->call('list', array($params), "Google_Service_CloudMonitoring_ListMetricDescriptorsResponse");
  }
}
