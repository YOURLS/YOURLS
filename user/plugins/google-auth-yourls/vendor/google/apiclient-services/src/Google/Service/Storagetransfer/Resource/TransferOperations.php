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
 * The "transferOperations" collection of methods.
 * Typical usage is:
 *  <code>
 *   $storagetransferService = new Google_Service_Storagetransfer(...);
 *   $transferOperations = $storagetransferService->transferOperations;
 *  </code>
 */
class Google_Service_Storagetransfer_Resource_TransferOperations extends Google_Service_Resource
{
  /**
   * Cancels a transfer. Use the get method to check whether the cancellation
   * succeeded or whether the operation completed despite cancellation.
   * (transferOperations.cancel)
   *
   * @param string $name The name of the operation resource to be cancelled.
   * @param array $optParams Optional parameters.
   * @return Google_Service_Storagetransfer_StoragetransferEmpty
   */
  public function cancel($name, $optParams = array())
  {
    $params = array('name' => $name);
    $params = array_merge($params, $optParams);
    return $this->call('cancel', array($params), "Google_Service_Storagetransfer_StoragetransferEmpty");
  }
  /**
   * This method is not supported and the server returns `UNIMPLEMENTED`.
   * (transferOperations.delete)
   *
   * @param string $name The name of the operation resource to be deleted.
   * @param array $optParams Optional parameters.
   * @return Google_Service_Storagetransfer_StoragetransferEmpty
   */
  public function delete($name, $optParams = array())
  {
    $params = array('name' => $name);
    $params = array_merge($params, $optParams);
    return $this->call('delete', array($params), "Google_Service_Storagetransfer_StoragetransferEmpty");
  }
  /**
   * Gets the latest state of a long-running operation.  Clients can use this
   * method to poll the operation result at intervals as recommended by the API
   * service. (transferOperations.get)
   *
   * @param string $name The name of the operation resource.
   * @param array $optParams Optional parameters.
   * @return Google_Service_Storagetransfer_Operation
   */
  public function get($name, $optParams = array())
  {
    $params = array('name' => $name);
    $params = array_merge($params, $optParams);
    return $this->call('get', array($params), "Google_Service_Storagetransfer_Operation");
  }
  /**
   * Lists operations that match the specified filter in the request. If the
   * server doesn't support this method, it returns `UNIMPLEMENTED`.
   *
   * NOTE: the `name` binding allows API services to override the binding to use
   * different resource name schemes, such as `users/operations`. To override the
   * binding, API services can add a binding such as
   * `"/v1/{name=users}/operations"` to their service configuration. For backwards
   * compatibility, the default name includes the operations collection id,
   * however overriding users must ensure the name binding is the parent resource,
   * without the operations collection id.
   * (transferOperations.listTransferOperations)
   *
   * @param string $name The value `transferOperations`.
   * @param array $optParams Optional parameters.
   *
   * @opt_param string pageToken The list page token.
   * @opt_param int pageSize The list page size. The max allowed value is 256.
   * @opt_param string filter A list of query parameters specified as JSON text in
   * the form of {\"project_id\" : \"my_project_id\", \"job_names\" : [\"jobid1\",
   * \"jobid2\",...], \"operation_names\" : [\"opid1\", \"opid2\",...],
   * \"transfer_statuses\":[\"status1\", \"status2\",...]}. Since `job_names`,
   * `operation_names`, and `transfer_statuses` support multiple values, they must
   * be specified with array notation. `job_names`, `operation_names`, and
   * `transfer_statuses` are optional.
   * @return Google_Service_Storagetransfer_ListOperationsResponse
   */
  public function listTransferOperations($name, $optParams = array())
  {
    $params = array('name' => $name);
    $params = array_merge($params, $optParams);
    return $this->call('list', array($params), "Google_Service_Storagetransfer_ListOperationsResponse");
  }
  /**
   * Pauses a transfer operation. (transferOperations.pause)
   *
   * @param string $name The name of the transfer operation. Required.
   * @param Google_Service_Storagetransfer_PauseTransferOperationRequest $postBody
   * @param array $optParams Optional parameters.
   * @return Google_Service_Storagetransfer_StoragetransferEmpty
   */
  public function pause($name, Google_Service_Storagetransfer_PauseTransferOperationRequest $postBody, $optParams = array())
  {
    $params = array('name' => $name, 'postBody' => $postBody);
    $params = array_merge($params, $optParams);
    return $this->call('pause', array($params), "Google_Service_Storagetransfer_StoragetransferEmpty");
  }
  /**
   * Resumes a transfer operation that is paused. (transferOperations.resume)
   *
   * @param string $name The name of the transfer operation. Required.
   * @param Google_Service_Storagetransfer_ResumeTransferOperationRequest $postBody
   * @param array $optParams Optional parameters.
   * @return Google_Service_Storagetransfer_StoragetransferEmpty
   */
  public function resume($name, Google_Service_Storagetransfer_ResumeTransferOperationRequest $postBody, $optParams = array())
  {
    $params = array('name' => $name, 'postBody' => $postBody);
    $params = array_merge($params, $optParams);
    return $this->call('resume', array($params), "Google_Service_Storagetransfer_StoragetransferEmpty");
  }
}
