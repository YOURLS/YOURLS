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
 * The "operations" collection of methods.
 * Typical usage is:
 *  <code>
 *   $dlpService = new Google_Service_DLP(...);
 *   $operations = $dlpService->operations;
 *  </code>
 */
class Google_Service_DLP_Resource_RiskAnalysisOperations extends Google_Service_Resource
{
  /**
   * Cancels an operation. Use the `inspect.operations.get` to check whether the
   * cancellation succeeded or the operation completed despite cancellation.
   * (operations.cancel)
   *
   * @param string $name The name of the operation resource to be cancelled.
   * @param Google_Service_DLP_GoogleLongrunningCancelOperationRequest $postBody
   * @param array $optParams Optional parameters.
   * @return Google_Service_DLP_GoogleProtobufEmpty
   */
  public function cancel($name, Google_Service_DLP_GoogleLongrunningCancelOperationRequest $postBody, $optParams = array())
  {
    $params = array('name' => $name, 'postBody' => $postBody);
    $params = array_merge($params, $optParams);
    return $this->call('cancel', array($params), "Google_Service_DLP_GoogleProtobufEmpty");
  }
  /**
   * This method is not supported and the server returns `UNIMPLEMENTED`.
   * (operations.delete)
   *
   * @param string $name The name of the operation resource to be deleted.
   * @param array $optParams Optional parameters.
   * @return Google_Service_DLP_GoogleProtobufEmpty
   */
  public function delete($name, $optParams = array())
  {
    $params = array('name' => $name);
    $params = array_merge($params, $optParams);
    return $this->call('delete', array($params), "Google_Service_DLP_GoogleProtobufEmpty");
  }
  /**
   * Gets the latest state of a long-running operation.  Clients can use this
   * method to poll the operation result at intervals as recommended by the API
   * service. (operations.get)
   *
   * @param string $name The name of the operation resource.
   * @param array $optParams Optional parameters.
   * @return Google_Service_DLP_GoogleLongrunningOperation
   */
  public function get($name, $optParams = array())
  {
    $params = array('name' => $name);
    $params = array_merge($params, $optParams);
    return $this->call('get', array($params), "Google_Service_DLP_GoogleLongrunningOperation");
  }
  /**
   * Fetches the list of long running operations.
   * (operations.listRiskAnalysisOperations)
   *
   * @param string $name The name of the operation's parent resource.
   * @param array $optParams Optional parameters.
   *
   * @opt_param string filter Filters by `done`. That is, `done=true` or
   * `done=false`.
   * @opt_param string pageToken The standard list page token.
   * @opt_param int pageSize The list page size. The maximum allowed value is 256
   * and the default is 100.
   * @return Google_Service_DLP_GoogleLongrunningListOperationsResponse
   */
  public function listRiskAnalysisOperations($name, $optParams = array())
  {
    $params = array('name' => $name);
    $params = array_merge($params, $optParams);
    return $this->call('list', array($params), "Google_Service_DLP_GoogleLongrunningListOperationsResponse");
  }
}
