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
 *   $monitoringService = new Google_Service_Monitoring(...);
 *   $metricDescriptors = $monitoringService->metricDescriptors;
 *  </code>
 */
class Google_Service_Monitoring_Resource_ProjectsMetricDescriptors extends Google_Service_Resource
{
  /**
   * Creates a new metric descriptor. User-created metric descriptors define
   * custom metrics. (metricDescriptors.create)
   *
   * @param string $name The project on which to execute the request. The format
   * is "projects/{project_id_or_number}".
   * @param Google_Service_Monitoring_MetricDescriptor $postBody
   * @param array $optParams Optional parameters.
   * @return Google_Service_Monitoring_MetricDescriptor
   */
  public function create($name, Google_Service_Monitoring_MetricDescriptor $postBody, $optParams = array())
  {
    $params = array('name' => $name, 'postBody' => $postBody);
    $params = array_merge($params, $optParams);
    return $this->call('create', array($params), "Google_Service_Monitoring_MetricDescriptor");
  }
  /**
   * Deletes a metric descriptor. Only user-created custom metrics can be deleted.
   * (metricDescriptors.delete)
   *
   * @param string $name The metric descriptor on which to execute the request.
   * The format is
   * "projects/{project_id_or_number}/metricDescriptors/{metric_id}". An example
   * of {metric_id} is: "custom.googleapis.com/my_test_metric".
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
   * Gets a single metric descriptor. This method does not require a Stackdriver
   * account. (metricDescriptors.get)
   *
   * @param string $name The metric descriptor on which to execute the request.
   * The format is
   * "projects/{project_id_or_number}/metricDescriptors/{metric_id}". An example
   * value of {metric_id} is
   * "compute.googleapis.com/instance/disk/read_bytes_count".
   * @param array $optParams Optional parameters.
   * @return Google_Service_Monitoring_MetricDescriptor
   */
  public function get($name, $optParams = array())
  {
    $params = array('name' => $name);
    $params = array_merge($params, $optParams);
    return $this->call('get', array($params), "Google_Service_Monitoring_MetricDescriptor");
  }
  /**
   * Lists metric descriptors that match a filter. This method does not require a
   * Stackdriver account. (metricDescriptors.listProjectsMetricDescriptors)
   *
   * @param string $name The project on which to execute the request. The format
   * is "projects/{project_id_or_number}".
   * @param array $optParams Optional parameters.
   *
   * @opt_param string filter If this field is empty, all custom and system-
   * defined metric descriptors are returned. Otherwise, the filter specifies
   * which metric descriptors are to be returned. For example, the following
   * filter matches all custom metrics: metric.type =
   * starts_with("custom.googleapis.com/")
   * @opt_param string pageToken If this field is not empty then it must contain
   * the nextPageToken value returned by a previous call to this method. Using
   * this field causes the method to return additional results from the previous
   * method call.
   * @opt_param int pageSize A positive number that is the maximum number of
   * results to return.
   * @return Google_Service_Monitoring_ListMetricDescriptorsResponse
   */
  public function listProjectsMetricDescriptors($name, $optParams = array())
  {
    $params = array('name' => $name);
    $params = array_merge($params, $optParams);
    return $this->call('list', array($params), "Google_Service_Monitoring_ListMetricDescriptorsResponse");
  }
}
