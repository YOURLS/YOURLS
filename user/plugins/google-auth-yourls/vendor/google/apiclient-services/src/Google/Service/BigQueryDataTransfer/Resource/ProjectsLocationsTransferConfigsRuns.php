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
 * The "runs" collection of methods.
 * Typical usage is:
 *  <code>
 *   $bigquerydatatransferService = new Google_Service_BigQueryDataTransfer(...);
 *   $runs = $bigquerydatatransferService->runs;
 *  </code>
 */
class Google_Service_BigQueryDataTransfer_Resource_ProjectsLocationsTransferConfigsRuns extends Google_Service_Resource
{
  /**
   * Deletes the specified transfer run. (runs.delete)
   *
   * @param string $name The field will contain name of the resource requested,
   * for example:
   * `projects/{project_id}/transferConfigs/{config_id}/runs/{run_id}`
   * @param array $optParams Optional parameters.
   * @return Google_Service_BigQueryDataTransfer_BigquerydatatransferEmpty
   */
  public function delete($name, $optParams = array())
  {
    $params = array('name' => $name);
    $params = array_merge($params, $optParams);
    return $this->call('delete', array($params), "Google_Service_BigQueryDataTransfer_BigquerydatatransferEmpty");
  }
  /**
   * Returns information about the particular transfer run. (runs.get)
   *
   * @param string $name The field will contain name of the resource requested,
   * for example:
   * `projects/{project_id}/transferConfigs/{config_id}/runs/{run_id}`
   * @param array $optParams Optional parameters.
   * @return Google_Service_BigQueryDataTransfer_TransferRun
   */
  public function get($name, $optParams = array())
  {
    $params = array('name' => $name);
    $params = array_merge($params, $optParams);
    return $this->call('get', array($params), "Google_Service_BigQueryDataTransfer_TransferRun");
  }
  /**
   * Returns information about running and completed jobs.
   * (runs.listProjectsLocationsTransferConfigsRuns)
   *
   * @param string $parent Name of transfer configuration for which transfer runs
   * should be retrieved. Format of transfer configuration resource name is:
   * `projects/{project_id}/transferConfigs/{config_id}`.
   * @param array $optParams Optional parameters.
   *
   * @opt_param string pageToken Pagination token, which can be used to request a
   * specific page of `ListTransferRunsRequest` list results. For multiple-page
   * results, `ListTransferRunsResponse` outputs a `next_page` token, which can be
   * used as the `page_token` value to request the next page of list results.
   * @opt_param string states When specified, only transfer runs with requested
   * states are returned.
   * @opt_param int pageSize Page size. The default page size is the maximum value
   * of 1000 results.
   * @opt_param string runAttempt Indicates how run attempts are to be pulled.
   * @return Google_Service_BigQueryDataTransfer_ListTransferRunsResponse
   */
  public function listProjectsLocationsTransferConfigsRuns($parent, $optParams = array())
  {
    $params = array('parent' => $parent);
    $params = array_merge($params, $optParams);
    return $this->call('list', array($params), "Google_Service_BigQueryDataTransfer_ListTransferRunsResponse");
  }
}
