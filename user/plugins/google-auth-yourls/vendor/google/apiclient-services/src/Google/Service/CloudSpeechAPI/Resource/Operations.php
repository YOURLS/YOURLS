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
 *   $speechService = new Google_Service_CloudSpeechAPI(...);
 *   $operations = $speechService->operations;
 *  </code>
 */
class Google_Service_CloudSpeechAPI_Resource_Operations extends Google_Service_Resource
{
  /**
   * Starts asynchronous cancellation on a long-running operation.  The server
   * makes a best effort to cancel the operation, but success is not guaranteed.
   * If the server doesn't support this method, it returns
   * `google.rpc.Code.UNIMPLEMENTED`.  Clients can use Operations.GetOperation or
   * other methods to check whether the cancellation succeeded or whether the
   * operation completed despite cancellation. (operations.cancel)
   *
   * @param string $name The name of the operation resource to be cancelled.
   * @param Google_Service_CloudSpeechAPI_CancelOperationRequest $postBody
   * @param array $optParams Optional parameters.
   * @return Google_Service_CloudSpeechAPI_SpeechEmpty
   */
  public function cancel($name, Google_Service_CloudSpeechAPI_CancelOperationRequest $postBody, $optParams = array())
  {
    $params = array('name' => $name, 'postBody' => $postBody);
    $params = array_merge($params, $optParams);
    return $this->call('cancel', array($params), "Google_Service_CloudSpeechAPI_SpeechEmpty");
  }
  /**
   * Deletes a long-running operation. This method indicates that the client is no
   * longer interested in the operation result. It does not cancel the operation.
   * If the server doesn't support this method, it returns
   * `google.rpc.Code.UNIMPLEMENTED`. (operations.delete)
   *
   * @param string $name The name of the operation resource to be deleted.
   * @param array $optParams Optional parameters.
   * @return Google_Service_CloudSpeechAPI_SpeechEmpty
   */
  public function delete($name, $optParams = array())
  {
    $params = array('name' => $name);
    $params = array_merge($params, $optParams);
    return $this->call('delete', array($params), "Google_Service_CloudSpeechAPI_SpeechEmpty");
  }
  /**
   * Gets the latest state of a long-running operation.  Clients can use this
   * method to poll the operation result at intervals as recommended by the API
   * service. (operations.get)
   *
   * @param string $name The name of the operation resource.
   * @param array $optParams Optional parameters.
   * @return Google_Service_CloudSpeechAPI_Operation
   */
  public function get($name, $optParams = array())
  {
    $params = array('name' => $name);
    $params = array_merge($params, $optParams);
    return $this->call('get', array($params), "Google_Service_CloudSpeechAPI_Operation");
  }
  /**
   * Lists operations that match the specified filter in the request. If the
   * server doesn't support this method, it returns `UNIMPLEMENTED`.
   *
   * NOTE: the `name` binding below allows API services to override the binding to
   * use different resource name schemes, such as `users/operations`.
   * (operations.listOperations)
   *
   * @param array $optParams Optional parameters.
   *
   * @opt_param int pageSize The standard list page size.
   * @opt_param string filter The standard list filter.
   * @opt_param string name The name of the operation collection.
   * @opt_param string pageToken The standard list page token.
   * @return Google_Service_CloudSpeechAPI_ListOperationsResponse
   */
  public function listOperations($optParams = array())
  {
    $params = array();
    $params = array_merge($params, $optParams);
    return $this->call('list', array($params), "Google_Service_CloudSpeechAPI_ListOperationsResponse");
  }
}
