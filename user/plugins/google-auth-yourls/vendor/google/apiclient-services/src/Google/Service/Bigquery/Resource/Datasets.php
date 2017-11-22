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
 *   $bigqueryService = new Google_Service_Bigquery(...);
 *   $datasets = $bigqueryService->datasets;
 *  </code>
 */
class Google_Service_Bigquery_Resource_Datasets extends Google_Service_Resource
{
  /**
   * Deletes the dataset specified by the datasetId value. Before you can delete a
   * dataset, you must delete all its tables, either manually or by specifying
   * deleteContents. Immediately after deletion, you can create another dataset
   * with the same name. (datasets.delete)
   *
   * @param string $projectId Project ID of the dataset being deleted
   * @param string $datasetId Dataset ID of dataset being deleted
   * @param array $optParams Optional parameters.
   *
   * @opt_param bool deleteContents If True, delete all the tables in the dataset.
   * If False and the dataset contains tables, the request will fail. Default is
   * False
   */
  public function delete($projectId, $datasetId, $optParams = array())
  {
    $params = array('projectId' => $projectId, 'datasetId' => $datasetId);
    $params = array_merge($params, $optParams);
    return $this->call('delete', array($params));
  }
  /**
   * Returns the dataset specified by datasetID. (datasets.get)
   *
   * @param string $projectId Project ID of the requested dataset
   * @param string $datasetId Dataset ID of the requested dataset
   * @param array $optParams Optional parameters.
   * @return Google_Service_Bigquery_Dataset
   */
  public function get($projectId, $datasetId, $optParams = array())
  {
    $params = array('projectId' => $projectId, 'datasetId' => $datasetId);
    $params = array_merge($params, $optParams);
    return $this->call('get', array($params), "Google_Service_Bigquery_Dataset");
  }
  /**
   * Creates a new empty dataset. (datasets.insert)
   *
   * @param string $projectId Project ID of the new dataset
   * @param Google_Service_Bigquery_Dataset $postBody
   * @param array $optParams Optional parameters.
   * @return Google_Service_Bigquery_Dataset
   */
  public function insert($projectId, Google_Service_Bigquery_Dataset $postBody, $optParams = array())
  {
    $params = array('projectId' => $projectId, 'postBody' => $postBody);
    $params = array_merge($params, $optParams);
    return $this->call('insert', array($params), "Google_Service_Bigquery_Dataset");
  }
  /**
   * Lists all datasets in the specified project to which you have been granted
   * the READER dataset role. (datasets.listDatasets)
   *
   * @param string $projectId Project ID of the datasets to be listed
   * @param array $optParams Optional parameters.
   *
   * @opt_param bool all Whether to list all datasets, including hidden ones
   * @opt_param string filter An expression for filtering the results of the
   * request by label. The syntax is "labels.[:]". Multiple filters can be ANDed
   * together by connecting with a space. Example: "labels.department:receiving
   * labels.active". See Filtering datasets using labels for details.
   * @opt_param string maxResults The maximum number of results to return
   * @opt_param string pageToken Page token, returned by a previous call, to
   * request the next page of results
   * @return Google_Service_Bigquery_DatasetList
   */
  public function listDatasets($projectId, $optParams = array())
  {
    $params = array('projectId' => $projectId);
    $params = array_merge($params, $optParams);
    return $this->call('list', array($params), "Google_Service_Bigquery_DatasetList");
  }
  /**
   * Updates information in an existing dataset. The update method replaces the
   * entire dataset resource, whereas the patch method only replaces fields that
   * are provided in the submitted dataset resource. This method supports patch
   * semantics. (datasets.patch)
   *
   * @param string $projectId Project ID of the dataset being updated
   * @param string $datasetId Dataset ID of the dataset being updated
   * @param Google_Service_Bigquery_Dataset $postBody
   * @param array $optParams Optional parameters.
   * @return Google_Service_Bigquery_Dataset
   */
  public function patch($projectId, $datasetId, Google_Service_Bigquery_Dataset $postBody, $optParams = array())
  {
    $params = array('projectId' => $projectId, 'datasetId' => $datasetId, 'postBody' => $postBody);
    $params = array_merge($params, $optParams);
    return $this->call('patch', array($params), "Google_Service_Bigquery_Dataset");
  }
  /**
   * Updates information in an existing dataset. The update method replaces the
   * entire dataset resource, whereas the patch method only replaces fields that
   * are provided in the submitted dataset resource. (datasets.update)
   *
   * @param string $projectId Project ID of the dataset being updated
   * @param string $datasetId Dataset ID of the dataset being updated
   * @param Google_Service_Bigquery_Dataset $postBody
   * @param array $optParams Optional parameters.
   * @return Google_Service_Bigquery_Dataset
   */
  public function update($projectId, $datasetId, Google_Service_Bigquery_Dataset $postBody, $optParams = array())
  {
    $params = array('projectId' => $projectId, 'datasetId' => $datasetId, 'postBody' => $postBody);
    $params = array_merge($params, $optParams);
    return $this->call('update', array($params), "Google_Service_Bigquery_Dataset");
  }
}
