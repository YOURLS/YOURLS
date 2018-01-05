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
 * The "timeSeries" collection of methods.
 * Typical usage is:
 *  <code>
 *   $monitoringService = new Google_Service_Monitoring(...);
 *   $timeSeries = $monitoringService->timeSeries;
 *  </code>
 */
class Google_Service_Monitoring_Resource_ProjectsTimeSeries extends Google_Service_Resource
{
  /**
   * Creates or adds data to one or more time series. The response is empty if all
   * time series in the request were written. If any time series could not be
   * written, a corresponding failure message is included in the error response.
   * (timeSeries.create)
   *
   * @param string $name The project on which to execute the request. The format
   * is "projects/{project_id_or_number}".
   * @param Google_Service_Monitoring_CreateTimeSeriesRequest $postBody
   * @param array $optParams Optional parameters.
   * @return Google_Service_Monitoring_MonitoringEmpty
   */
  public function create($name, Google_Service_Monitoring_CreateTimeSeriesRequest $postBody, $optParams = array())
  {
    $params = array('name' => $name, 'postBody' => $postBody);
    $params = array_merge($params, $optParams);
    return $this->call('create', array($params), "Google_Service_Monitoring_MonitoringEmpty");
  }
  /**
   * Lists time series that match a filter. This method does not require a
   * Stackdriver account. (timeSeries.listProjectsTimeSeries)
   *
   * @param string $name The project on which to execute the request. The format
   * is "projects/{project_id_or_number}".
   * @param array $optParams Optional parameters.
   *
   * @opt_param string aggregation.crossSeriesReducer The approach to be used to
   * combine time series. Not all reducer functions may be applied to all time
   * series, depending on the metric type and the value type of the original time
   * series. Reduction may change the metric type of value type of the time
   * series.Time series data must be aligned in order to perform cross-time series
   * reduction. If crossSeriesReducer is specified, then perSeriesAligner must be
   * specified and not equal ALIGN_NONE and alignmentPeriod must be specified;
   * otherwise, an error is returned.
   * @opt_param string filter A monitoring filter that specifies which time series
   * should be returned. The filter must specify a single metric type, and can
   * additionally specify metric labels and other information. For example:
   * metric.type = "compute.googleapis.com/instance/cpu/usage_time" AND
   * metric.label.instance_name = "my-instance-name"
   * @opt_param string aggregation.perSeriesAligner The approach to be used to
   * align individual time series. Not all alignment functions may be applied to
   * all time series, depending on the metric type and value type of the original
   * time series. Alignment may change the metric type or the value type of the
   * time series.Time series data must be aligned in order to perform cross-time
   * series reduction. If crossSeriesReducer is specified, then perSeriesAligner
   * must be specified and not equal ALIGN_NONE and alignmentPeriod must be
   * specified; otherwise, an error is returned.
   * @opt_param string pageToken If this field is not empty then it must contain
   * the nextPageToken value returned by a previous call to this method. Using
   * this field causes the method to return additional results from the previous
   * method call.
   * @opt_param string interval.startTime Optional. The beginning of the time
   * interval. The default value for the start time is the end time. The start
   * time must not be later than the end time.
   * @opt_param string view Specifies which information is returned about the time
   * series.
   * @opt_param string aggregation.groupByFields The set of fields to preserve
   * when crossSeriesReducer is specified. The groupByFields determine how the
   * time series are partitioned into subsets prior to applying the aggregation
   * function. Each subset contains time series that have the same value for each
   * of the grouping fields. Each individual time series is a member of exactly
   * one subset. The crossSeriesReducer is applied to each subset of time series.
   * It is not possible to reduce across different resource types, so this field
   * implicitly contains resource.type. Fields not specified in groupByFields are
   * aggregated away. If groupByFields is not specified and all the time series
   * have the same resource type, then the time series are aggregated into a
   * single output time series. If crossSeriesReducer is not defined, this field
   * is ignored.
   * @opt_param string interval.endTime Required. The end of the time interval.
   * @opt_param string aggregation.alignmentPeriod The alignment period for per-
   * time series alignment. If present, alignmentPeriod must be at least 60
   * seconds. After per-time series alignment, each time series will contain data
   * points only on the period boundaries. If perSeriesAligner is not specified or
   * equals ALIGN_NONE, then this field is ignored. If perSeriesAligner is
   * specified and does not equal ALIGN_NONE, then this field must be defined;
   * otherwise an error is returned.
   * @opt_param int pageSize A positive number that is the maximum number of
   * results to return. When view field sets to FULL, it limits the number of
   * Points server will return; if view field is HEADERS, it limits the number of
   * TimeSeries server will return.
   * @opt_param string orderBy Specifies the order in which the points of the time
   * series should be returned. By default, results are not ordered. Currently,
   * this field must be left blank.
   * @return Google_Service_Monitoring_ListTimeSeriesResponse
   */
  public function listProjectsTimeSeries($name, $optParams = array())
  {
    $params = array('name' => $name);
    $params = array_merge($params, $optParams);
    return $this->call('list', array($params), "Google_Service_Monitoring_ListTimeSeriesResponse");
  }
}
