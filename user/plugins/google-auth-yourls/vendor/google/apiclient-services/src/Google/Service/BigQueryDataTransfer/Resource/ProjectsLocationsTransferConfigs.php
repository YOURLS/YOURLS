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
 * The "transferConfigs" collection of methods.
 * Typical usage is:
 *  <code>
 *   $bigquerydatatransferService = new Google_Service_BigQueryDataTransfer(...);
 *   $transferConfigs = $bigquerydatatransferService->transferConfigs;
 *  </code>
 */
class Google_Service_BigQueryDataTransfer_Resource_ProjectsLocationsTransferConfigs extends Google_Service_Resource
{
  /**
   * Creates a new data transfer configuration. (transferConfigs.create)
   *
   * @param string $parent The BigQuery project id where the transfer
   * configuration should be created. Must be in the format
   * /projects/{project_id}/locations/{location_id} or
   * /projects/{project_id}/locations/- In case when '-' is specified as
   * location_id, location is infered from the destination dataset region.
   * @param Google_Service_BigQueryDataTransfer_TransferConfig $postBody
   * @param array $optParams Optional parameters.
   *
   * @opt_param string authorizationCode Optional OAuth2 authorization code to use
   * with this transfer configuration. This is required if new credentials are
   * needed, as indicated by `CheckValidCreds`. In order to obtain
   * authorization_code, please make a request to
   * https://www.gstatic.com/bigquerydatatransfer/oauthz/auth?client_id==_uri=
   *
   * * client_id should be OAuth client_id of BigQuery DTS API for the given
   * data source returned by ListDataSources method. * data_source_scopes are the
   * scopes returned by ListDataSources method. * redirect_uri is an optional
   * parameter. If not specified, then   authorization code is posted to the
   * opener of authorization flow window.   Otherwise it will be sent to the
   * redirect uri. A special value of   urn:ietf:wg:oauth:2.0:oob means that
   * authorization code should be   returned in the title bar of the browser, with
   * the page text prompting   the user to copy the code and paste it in the
   * application.
   * @return Google_Service_BigQueryDataTransfer_TransferConfig
   */
  public function create($parent, Google_Service_BigQueryDataTransfer_TransferConfig $postBody, $optParams = array())
  {
    $params = array('parent' => $parent, 'postBody' => $postBody);
    $params = array_merge($params, $optParams);
    return $this->call('create', array($params), "Google_Service_BigQueryDataTransfer_TransferConfig");
  }
  /**
   * Deletes a data transfer configuration, including any associated transfer runs
   * and logs. (transferConfigs.delete)
   *
   * @param string $name The field will contain name of the resource requested,
   * for example: `projects/{project_id}/transferConfigs/{config_id}`
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
   * Returns information about a data transfer config. (transferConfigs.get)
   *
   * @param string $name The field will contain name of the resource requested,
   * for example: `projects/{project_id}/transferConfigs/{config_id}`
   * @param array $optParams Optional parameters.
   * @return Google_Service_BigQueryDataTransfer_TransferConfig
   */
  public function get($name, $optParams = array())
  {
    $params = array('name' => $name);
    $params = array_merge($params, $optParams);
    return $this->call('get', array($params), "Google_Service_BigQueryDataTransfer_TransferConfig");
  }
  /**
   * Returns information about all data transfers in the project.
   * (transferConfigs.listProjectsLocationsTransferConfigs)
   *
   * @param string $parent The BigQuery project id for which data sources should
   * be returned: `projects/{project_id}`.
   * @param array $optParams Optional parameters.
   *
   * @opt_param string pageToken Pagination token, which can be used to request a
   * specific page of `ListTransfersRequest` list results. For multiple-page
   * results, `ListTransfersResponse` outputs a `next_page` token, which can be
   * used as the `page_token` value to request the next page of list results.
   * @opt_param int pageSize Page size. The default page size is the maximum value
   * of 1000 results.
   * @opt_param string dataSourceIds When specified, only configurations of
   * requested data sources are returned.
   * @return Google_Service_BigQueryDataTransfer_ListTransferConfigsResponse
   */
  public function listProjectsLocationsTransferConfigs($parent, $optParams = array())
  {
    $params = array('parent' => $parent);
    $params = array_merge($params, $optParams);
    return $this->call('list', array($params), "Google_Service_BigQueryDataTransfer_ListTransferConfigsResponse");
  }
  /**
   * Updates a data transfer configuration. All fields must be set, even if they
   * are not updated. (transferConfigs.patch)
   *
   * @param string $name The resource name of the transfer config. Transfer config
   * names have the form `projects/{project_id}/transferConfigs/{config_id}`.
   * Where `config_id` is usually a uuid, even though it is not guaranteed or
   * required. The name is ignored when creating a transfer config.
   * @param Google_Service_BigQueryDataTransfer_TransferConfig $postBody
   * @param array $optParams Optional parameters.
   *
   * @opt_param string authorizationCode Optional OAuth2 authorization code to use
   * with this transfer configuration. If it is provided, the transfer
   * configuration will be associated with the authorizing user. In order to
   * obtain authorization_code, please make a request to
   * https://www.gstatic.com/bigquerydatatransfer/oauthz/auth?client_id==_uri=
   *
   * * client_id should be OAuth client_id of BigQuery DTS API for the given
   * data source returned by ListDataSources method. * data_source_scopes are the
   * scopes returned by ListDataSources method. * redirect_uri is an optional
   * parameter. If not specified, then   authorization code is posted to the
   * opener of authorization flow window.   Otherwise it will be sent to the
   * redirect uri. A special value of   urn:ietf:wg:oauth:2.0:oob means that
   * authorization code should be   returned in the title bar of the browser, with
   * the page text prompting   the user to copy the code and paste it in the
   * application.
   * @opt_param string updateMask Required list of fields to be updated in this
   * request.
   * @return Google_Service_BigQueryDataTransfer_TransferConfig
   */
  public function patch($name, Google_Service_BigQueryDataTransfer_TransferConfig $postBody, $optParams = array())
  {
    $params = array('name' => $name, 'postBody' => $postBody);
    $params = array_merge($params, $optParams);
    return $this->call('patch', array($params), "Google_Service_BigQueryDataTransfer_TransferConfig");
  }
  /**
   * Creates transfer runs for a time range [start_time, end_time]. For each date
   * - or whatever granularity the data source supports - in the range, one
   * transfer run is created. Note that runs are created per UTC time in the time
   * range. (transferConfigs.scheduleRuns)
   *
   * @param string $parent Transfer configuration name in the form:
   * `projects/{project_id}/transferConfigs/{config_id}`.
   * @param Google_Service_BigQueryDataTransfer_ScheduleTransferRunsRequest $postBody
   * @param array $optParams Optional parameters.
   * @return Google_Service_BigQueryDataTransfer_ScheduleTransferRunsResponse
   */
  public function scheduleRuns($parent, Google_Service_BigQueryDataTransfer_ScheduleTransferRunsRequest $postBody, $optParams = array())
  {
    $params = array('parent' => $parent, 'postBody' => $postBody);
    $params = array_merge($params, $optParams);
    return $this->call('scheduleRuns', array($params), "Google_Service_BigQueryDataTransfer_ScheduleTransferRunsResponse");
  }
}
