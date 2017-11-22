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
 * The "datasets" collection of methods.
 * Typical usage is:
 *  <code>
 *   $fitnessService = new Google_Service_Fitness(...);
 *   $datasets = $fitnessService->datasets;
 *  </code>
 */
class Google_Service_Fitness_Resource_UsersDataSourcesDatasets extends Google_Service_Resource
{
  /**
   * Performs an inclusive delete of all data points whose start and end times
   * have any overlap with the time range specified by the dataset ID. For most
   * data types, the entire data point will be deleted. For data types where the
   * time span represents a consistent value (such as
   * com.google.activity.segment), and a data point straddles either end point of
   * the dataset, only the overlapping portion of the data point will be deleted.
   * (datasets.delete)
   *
   * @param string $userId Delete a dataset for the person identified. Use me to
   * indicate the authenticated user. Only me is supported at this time.
   * @param string $dataSourceId The data stream ID of the data source that
   * created the dataset.
   * @param string $datasetId Dataset identifier that is a composite of the
   * minimum data point start time and maximum data point end time represented as
   * nanoseconds from the epoch. The ID is formatted like: "startTime-endTime"
   * where startTime and endTime are 64 bit integers.
   * @param array $optParams Optional parameters.
   *
   * @opt_param string currentTimeMillis The client's current time in milliseconds
   * since epoch.
   * @opt_param string modifiedTimeMillis When the operation was performed on the
   * client.
   */
  public function delete($userId, $dataSourceId, $datasetId, $optParams = array())
  {
    $params = array('userId' => $userId, 'dataSourceId' => $dataSourceId, 'datasetId' => $datasetId);
    $params = array_merge($params, $optParams);
    return $this->call('delete', array($params));
  }
  /**
   * Returns a dataset containing all data points whose start and end times
   * overlap with the specified range of the dataset minimum start time and
   * maximum end time. Specifically, any data point whose start time is less than
   * or equal to the dataset end time and whose end time is greater than or equal
   * to the dataset start time. (datasets.get)
   *
   * @param string $userId Retrieve a dataset for the person identified. Use me to
   * indicate the authenticated user. Only me is supported at this time.
   * @param string $dataSourceId The data stream ID of the data source that
   * created the dataset.
   * @param string $datasetId Dataset identifier that is a composite of the
   * minimum data point start time and maximum data point end time represented as
   * nanoseconds from the epoch. The ID is formatted like: "startTime-endTime"
   * where startTime and endTime are 64 bit integers.
   * @param array $optParams Optional parameters.
   *
   * @opt_param int limit If specified, no more than this many data points will be
   * included in the dataset. If there are more data points in the dataset,
   * nextPageToken will be set in the dataset response.
   * @opt_param string pageToken The continuation token, which is used to page
   * through large datasets. To get the next page of a dataset, set this parameter
   * to the value of nextPageToken from the previous response. Each subsequent
   * call will yield a partial dataset with data point end timestamps that are
   * strictly smaller than those in the previous partial response.
   * @return Google_Service_Fitness_Dataset
   */
  public function get($userId, $dataSourceId, $datasetId, $optParams = array())
  {
    $params = array('userId' => $userId, 'dataSourceId' => $dataSourceId, 'datasetId' => $datasetId);
    $params = array_merge($params, $optParams);
    return $this->call('get', array($params), "Google_Service_Fitness_Dataset");
  }
  /**
   * Adds data points to a dataset. The dataset need not be previously created.
   * All points within the given dataset will be returned with subsquent calls to
   * retrieve this dataset. Data points can belong to more than one dataset. This
   * method does not use patch semantics. (datasets.patch)
   *
   * @param string $userId Patch a dataset for the person identified. Use me to
   * indicate the authenticated user. Only me is supported at this time.
   * @param string $dataSourceId The data stream ID of the data source that
   * created the dataset.
   * @param string $datasetId Dataset identifier that is a composite of the
   * minimum data point start time and maximum data point end time represented as
   * nanoseconds from the epoch. The ID is formatted like: "startTime-endTime"
   * where startTime and endTime are 64 bit integers.
   * @param Google_Service_Fitness_Dataset $postBody
   * @param array $optParams Optional parameters.
   *
   * @opt_param string currentTimeMillis The client's current time in milliseconds
   * since epoch. Note that the minStartTimeNs and maxEndTimeNs properties in the
   * request body are in nanoseconds instead of milliseconds.
   * @return Google_Service_Fitness_Dataset
   */
  public function patch($userId, $dataSourceId, $datasetId, Google_Service_Fitness_Dataset $postBody, $optParams = array())
  {
    $params = array('userId' => $userId, 'dataSourceId' => $dataSourceId, 'datasetId' => $datasetId, 'postBody' => $postBody);
    $params = array_merge($params, $optParams);
    return $this->call('patch', array($params), "Google_Service_Fitness_Dataset");
  }
}
