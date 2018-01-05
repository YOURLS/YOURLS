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
 *   $genomicsService = new Google_Service_Genomics(...);
 *   $datasets = $genomicsService->datasets;
 *  </code>
 */
class Google_Service_Genomics_Resource_Datasets extends Google_Service_Resource
{
  /**
   * Creates a new dataset.
   *
   * For the definitions of datasets and other genomics resources, see
   * [Fundamentals of Google Genomics](https://cloud.google.com/genomics
   * /fundamentals-of-google-genomics) (datasets.create)
   *
   * @param Google_Service_Genomics_Dataset $postBody
   * @param array $optParams Optional parameters.
   * @return Google_Service_Genomics_Dataset
   */
  public function create(Google_Service_Genomics_Dataset $postBody, $optParams = array())
  {
    $params = array('postBody' => $postBody);
    $params = array_merge($params, $optParams);
    return $this->call('create', array($params), "Google_Service_Genomics_Dataset");
  }
  /**
   * Deletes a dataset and all of its contents (all read group sets, reference
   * sets, variant sets, call sets, annotation sets, etc.) This is reversible (up
   * to one week after the deletion) via the datasets.undelete operation.
   *
   * For the definitions of datasets and other genomics resources, see
   * [Fundamentals of Google Genomics](https://cloud.google.com/genomics
   * /fundamentals-of-google-genomics) (datasets.delete)
   *
   * @param string $datasetId The ID of the dataset to be deleted.
   * @param array $optParams Optional parameters.
   * @return Google_Service_Genomics_GenomicsEmpty
   */
  public function delete($datasetId, $optParams = array())
  {
    $params = array('datasetId' => $datasetId);
    $params = array_merge($params, $optParams);
    return $this->call('delete', array($params), "Google_Service_Genomics_GenomicsEmpty");
  }
  /**
   * Gets a dataset by ID.
   *
   * For the definitions of datasets and other genomics resources, see
   * [Fundamentals of Google Genomics](https://cloud.google.com/genomics
   * /fundamentals-of-google-genomics) (datasets.get)
   *
   * @param string $datasetId The ID of the dataset.
   * @param array $optParams Optional parameters.
   * @return Google_Service_Genomics_Dataset
   */
  public function get($datasetId, $optParams = array())
  {
    $params = array('datasetId' => $datasetId);
    $params = array_merge($params, $optParams);
    return $this->call('get', array($params), "Google_Service_Genomics_Dataset");
  }
  /**
   * Gets the access control policy for the dataset. This is empty if the policy
   * or resource does not exist.
   *
   * See Getting a Policy for more information.
   *
   * For the definitions of datasets and other genomics resources, see
   * [Fundamentals of Google Genomics](https://cloud.google.com/genomics
   * /fundamentals-of-google-genomics) (datasets.getIamPolicy)
   *
   * @param string $resource REQUIRED: The resource for which policy is being
   * specified. Format is `datasets/`.
   * @param Google_Service_Genomics_GetIamPolicyRequest $postBody
   * @param array $optParams Optional parameters.
   * @return Google_Service_Genomics_Policy
   */
  public function getIamPolicy($resource, Google_Service_Genomics_GetIamPolicyRequest $postBody, $optParams = array())
  {
    $params = array('resource' => $resource, 'postBody' => $postBody);
    $params = array_merge($params, $optParams);
    return $this->call('getIamPolicy', array($params), "Google_Service_Genomics_Policy");
  }
  /**
   * Lists datasets within a project.
   *
   * For the definitions of datasets and other genomics resources, see
   * [Fundamentals of Google Genomics](https://cloud.google.com/genomics
   * /fundamentals-of-google-genomics) (datasets.listDatasets)
   *
   * @param array $optParams Optional parameters.
   *
   * @opt_param string pageToken The continuation token, which is used to page
   * through large result sets. To get the next page of results, set this
   * parameter to the value of `nextPageToken` from the previous response.
   * @opt_param int pageSize The maximum number of results to return in a single
   * page. If unspecified, defaults to 50. The maximum value is 1024.
   * @opt_param string projectId Required. The Google Cloud project ID to list
   * datasets for.
   * @return Google_Service_Genomics_ListDatasetsResponse
   */
  public function listDatasets($optParams = array())
  {
    $params = array();
    $params = array_merge($params, $optParams);
    return $this->call('list', array($params), "Google_Service_Genomics_ListDatasetsResponse");
  }
  /**
   * Updates a dataset.
   *
   * For the definitions of datasets and other genomics resources, see
   * [Fundamentals of Google Genomics](https://cloud.google.com/genomics
   * /fundamentals-of-google-genomics)
   *
   * This method supports patch semantics. (datasets.patch)
   *
   * @param string $datasetId The ID of the dataset to be updated.
   * @param Google_Service_Genomics_Dataset $postBody
   * @param array $optParams Optional parameters.
   *
   * @opt_param string updateMask An optional mask specifying which fields to
   * update. At this time, the only mutable field is name. The only acceptable
   * value is "name". If unspecified, all mutable fields will be updated.
   * @return Google_Service_Genomics_Dataset
   */
  public function patch($datasetId, Google_Service_Genomics_Dataset $postBody, $optParams = array())
  {
    $params = array('datasetId' => $datasetId, 'postBody' => $postBody);
    $params = array_merge($params, $optParams);
    return $this->call('patch', array($params), "Google_Service_Genomics_Dataset");
  }
  /**
   * Sets the access control policy on the specified dataset. Replaces any
   * existing policy.
   *
   * For the definitions of datasets and other genomics resources, see
   * [Fundamentals of Google Genomics](https://cloud.google.com/genomics
   * /fundamentals-of-google-genomics)
   *
   * See Setting a Policy for more information. (datasets.setIamPolicy)
   *
   * @param string $resource REQUIRED: The resource for which policy is being
   * specified. Format is `datasets/`.
   * @param Google_Service_Genomics_SetIamPolicyRequest $postBody
   * @param array $optParams Optional parameters.
   * @return Google_Service_Genomics_Policy
   */
  public function setIamPolicy($resource, Google_Service_Genomics_SetIamPolicyRequest $postBody, $optParams = array())
  {
    $params = array('resource' => $resource, 'postBody' => $postBody);
    $params = array_merge($params, $optParams);
    return $this->call('setIamPolicy', array($params), "Google_Service_Genomics_Policy");
  }
  /**
   * Returns permissions that a caller has on the specified resource. See Testing
   * Permissions for more information.
   *
   * For the definitions of datasets and other genomics resources, see
   * [Fundamentals of Google Genomics](https://cloud.google.com/genomics
   * /fundamentals-of-google-genomics) (datasets.testIamPermissions)
   *
   * @param string $resource REQUIRED: The resource for which policy is being
   * specified. Format is `datasets/`.
   * @param Google_Service_Genomics_TestIamPermissionsRequest $postBody
   * @param array $optParams Optional parameters.
   * @return Google_Service_Genomics_TestIamPermissionsResponse
   */
  public function testIamPermissions($resource, Google_Service_Genomics_TestIamPermissionsRequest $postBody, $optParams = array())
  {
    $params = array('resource' => $resource, 'postBody' => $postBody);
    $params = array_merge($params, $optParams);
    return $this->call('testIamPermissions', array($params), "Google_Service_Genomics_TestIamPermissionsResponse");
  }
  /**
   * Undeletes a dataset by restoring a dataset which was deleted via this API.
   *
   * For the definitions of datasets and other genomics resources, see
   * [Fundamentals of Google Genomics](https://cloud.google.com/genomics
   * /fundamentals-of-google-genomics)
   *
   * This operation is only possible for a week after the deletion occurred.
   * (datasets.undelete)
   *
   * @param string $datasetId The ID of the dataset to be undeleted.
   * @param Google_Service_Genomics_UndeleteDatasetRequest $postBody
   * @param array $optParams Optional parameters.
   * @return Google_Service_Genomics_Dataset
   */
  public function undelete($datasetId, Google_Service_Genomics_UndeleteDatasetRequest $postBody, $optParams = array())
  {
    $params = array('datasetId' => $datasetId, 'postBody' => $postBody);
    $params = array_merge($params, $optParams);
    return $this->call('undelete', array($params), "Google_Service_Genomics_Dataset");
  }
}
