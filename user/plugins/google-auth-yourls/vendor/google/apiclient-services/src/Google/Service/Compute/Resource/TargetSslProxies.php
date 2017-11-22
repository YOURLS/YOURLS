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
 * The "targetSslProxies" collection of methods.
 * Typical usage is:
 *  <code>
 *   $computeService = new Google_Service_Compute(...);
 *   $targetSslProxies = $computeService->targetSslProxies;
 *  </code>
 */
class Google_Service_Compute_Resource_TargetSslProxies extends Google_Service_Resource
{
  /**
   * Deletes the specified TargetSslProxy resource. (targetSslProxies.delete)
   *
   * @param string $project Project ID for this request.
   * @param string $targetSslProxy Name of the TargetSslProxy resource to delete.
   * @param array $optParams Optional parameters.
   *
   * @opt_param string requestId An optional request ID to identify requests.
   * Specify a unique request ID so that if you must retry your request, the
   * server will know to ignore the request if it has already been completed.
   *
   * For example, consider a situation where you make an initial request and the
   * request times out. If you make the request again with the same request ID,
   * the server can check if original operation with the same request ID was
   * received, and if so, will ignore the second request. This prevents clients
   * from accidentally creating duplicate commitments.
   *
   * The request ID must be a valid UUID with the exception that zero UUID is not
   * supported (00000000-0000-0000-0000-000000000000).
   * @return Google_Service_Compute_Operation
   */
  public function delete($project, $targetSslProxy, $optParams = array())
  {
    $params = array('project' => $project, 'targetSslProxy' => $targetSslProxy);
    $params = array_merge($params, $optParams);
    return $this->call('delete', array($params), "Google_Service_Compute_Operation");
  }
  /**
   * Returns the specified TargetSslProxy resource. Get a list of available target
   * SSL proxies by making a list() request. (targetSslProxies.get)
   *
   * @param string $project Project ID for this request.
   * @param string $targetSslProxy Name of the TargetSslProxy resource to return.
   * @param array $optParams Optional parameters.
   * @return Google_Service_Compute_TargetSslProxy
   */
  public function get($project, $targetSslProxy, $optParams = array())
  {
    $params = array('project' => $project, 'targetSslProxy' => $targetSslProxy);
    $params = array_merge($params, $optParams);
    return $this->call('get', array($params), "Google_Service_Compute_TargetSslProxy");
  }
  /**
   * Creates a TargetSslProxy resource in the specified project using the data
   * included in the request. (targetSslProxies.insert)
   *
   * @param string $project Project ID for this request.
   * @param Google_Service_Compute_TargetSslProxy $postBody
   * @param array $optParams Optional parameters.
   *
   * @opt_param string requestId An optional request ID to identify requests.
   * Specify a unique request ID so that if you must retry your request, the
   * server will know to ignore the request if it has already been completed.
   *
   * For example, consider a situation where you make an initial request and the
   * request times out. If you make the request again with the same request ID,
   * the server can check if original operation with the same request ID was
   * received, and if so, will ignore the second request. This prevents clients
   * from accidentally creating duplicate commitments.
   *
   * The request ID must be a valid UUID with the exception that zero UUID is not
   * supported (00000000-0000-0000-0000-000000000000).
   * @return Google_Service_Compute_Operation
   */
  public function insert($project, Google_Service_Compute_TargetSslProxy $postBody, $optParams = array())
  {
    $params = array('project' => $project, 'postBody' => $postBody);
    $params = array_merge($params, $optParams);
    return $this->call('insert', array($params), "Google_Service_Compute_Operation");
  }
  /**
   * Retrieves the list of TargetSslProxy resources available to the specified
   * project. (targetSslProxies.listTargetSslProxies)
   *
   * @param string $project Project ID for this request.
   * @param array $optParams Optional parameters.
   *
   * @opt_param string filter Sets a filter {expression} for filtering listed
   * resources. Your {expression} must be in the format: field_name
   * comparison_string literal_string.
   *
   * The field_name is the name of the field you want to compare. Only atomic
   * field types are supported (string, number, boolean). The comparison_string
   * must be either eq (equals) or ne (not equals). The literal_string is the
   * string value to filter to. The literal value must be valid for the type of
   * field you are filtering by (string, number, boolean). For string fields, the
   * literal value is interpreted as a regular expression using RE2 syntax. The
   * literal value must match the entire field.
   *
   * For example, to filter for instances that do not have a name of example-
   * instance, you would use name ne example-instance.
   *
   * You can filter on nested fields. For example, you could filter on instances
   * that have set the scheduling.automaticRestart field to true. Use filtering on
   * nested fields to take advantage of labels to organize and search for results
   * based on label values.
   *
   * To filter on multiple expressions, provide each separate expression within
   * parentheses. For example, (scheduling.automaticRestart eq true) (zone eq us-
   * central1-f). Multiple expressions are treated as AND expressions, meaning
   * that resources must match all expressions to pass the filters.
   * @opt_param string maxResults The maximum number of results per page that
   * should be returned. If the number of available results is larger than
   * maxResults, Compute Engine returns a nextPageToken that can be used to get
   * the next page of results in subsequent list requests. Acceptable values are 0
   * to 500, inclusive. (Default: 500)
   * @opt_param string orderBy Sorts list results by a certain order. By default,
   * results are returned in alphanumerical order based on the resource name.
   *
   * You can also sort results in descending order based on the creation timestamp
   * using orderBy="creationTimestamp desc". This sorts results based on the
   * creationTimestamp field in reverse chronological order (newest result first).
   * Use this to sort resources like operations so that the newest operation is
   * returned first.
   *
   * Currently, only sorting by name or creationTimestamp desc is supported.
   * @opt_param string pageToken Specifies a page token to use. Set pageToken to
   * the nextPageToken returned by a previous list request to get the next page of
   * results.
   * @return Google_Service_Compute_TargetSslProxyList
   */
  public function listTargetSslProxies($project, $optParams = array())
  {
    $params = array('project' => $project);
    $params = array_merge($params, $optParams);
    return $this->call('list', array($params), "Google_Service_Compute_TargetSslProxyList");
  }
  /**
   * Changes the BackendService for TargetSslProxy.
   * (targetSslProxies.setBackendService)
   *
   * @param string $project Project ID for this request.
   * @param string $targetSslProxy Name of the TargetSslProxy resource whose
   * BackendService resource is to be set.
   * @param Google_Service_Compute_TargetSslProxiesSetBackendServiceRequest $postBody
   * @param array $optParams Optional parameters.
   *
   * @opt_param string requestId An optional request ID to identify requests.
   * Specify a unique request ID so that if you must retry your request, the
   * server will know to ignore the request if it has already been completed.
   *
   * For example, consider a situation where you make an initial request and the
   * request times out. If you make the request again with the same request ID,
   * the server can check if original operation with the same request ID was
   * received, and if so, will ignore the second request. This prevents clients
   * from accidentally creating duplicate commitments.
   *
   * The request ID must be a valid UUID with the exception that zero UUID is not
   * supported (00000000-0000-0000-0000-000000000000).
   * @return Google_Service_Compute_Operation
   */
  public function setBackendService($project, $targetSslProxy, Google_Service_Compute_TargetSslProxiesSetBackendServiceRequest $postBody, $optParams = array())
  {
    $params = array('project' => $project, 'targetSslProxy' => $targetSslProxy, 'postBody' => $postBody);
    $params = array_merge($params, $optParams);
    return $this->call('setBackendService', array($params), "Google_Service_Compute_Operation");
  }
  /**
   * Changes the ProxyHeaderType for TargetSslProxy.
   * (targetSslProxies.setProxyHeader)
   *
   * @param string $project Project ID for this request.
   * @param string $targetSslProxy Name of the TargetSslProxy resource whose
   * ProxyHeader is to be set.
   * @param Google_Service_Compute_TargetSslProxiesSetProxyHeaderRequest $postBody
   * @param array $optParams Optional parameters.
   *
   * @opt_param string requestId An optional request ID to identify requests.
   * Specify a unique request ID so that if you must retry your request, the
   * server will know to ignore the request if it has already been completed.
   *
   * For example, consider a situation where you make an initial request and the
   * request times out. If you make the request again with the same request ID,
   * the server can check if original operation with the same request ID was
   * received, and if so, will ignore the second request. This prevents clients
   * from accidentally creating duplicate commitments.
   *
   * The request ID must be a valid UUID with the exception that zero UUID is not
   * supported (00000000-0000-0000-0000-000000000000).
   * @return Google_Service_Compute_Operation
   */
  public function setProxyHeader($project, $targetSslProxy, Google_Service_Compute_TargetSslProxiesSetProxyHeaderRequest $postBody, $optParams = array())
  {
    $params = array('project' => $project, 'targetSslProxy' => $targetSslProxy, 'postBody' => $postBody);
    $params = array_merge($params, $optParams);
    return $this->call('setProxyHeader', array($params), "Google_Service_Compute_Operation");
  }
  /**
   * Changes SslCertificates for TargetSslProxy.
   * (targetSslProxies.setSslCertificates)
   *
   * @param string $project Project ID for this request.
   * @param string $targetSslProxy Name of the TargetSslProxy resource whose
   * SslCertificate resource is to be set.
   * @param Google_Service_Compute_TargetSslProxiesSetSslCertificatesRequest $postBody
   * @param array $optParams Optional parameters.
   *
   * @opt_param string requestId An optional request ID to identify requests.
   * Specify a unique request ID so that if you must retry your request, the
   * server will know to ignore the request if it has already been completed.
   *
   * For example, consider a situation where you make an initial request and the
   * request times out. If you make the request again with the same request ID,
   * the server can check if original operation with the same request ID was
   * received, and if so, will ignore the second request. This prevents clients
   * from accidentally creating duplicate commitments.
   *
   * The request ID must be a valid UUID with the exception that zero UUID is not
   * supported (00000000-0000-0000-0000-000000000000).
   * @return Google_Service_Compute_Operation
   */
  public function setSslCertificates($project, $targetSslProxy, Google_Service_Compute_TargetSslProxiesSetSslCertificatesRequest $postBody, $optParams = array())
  {
    $params = array('project' => $project, 'targetSslProxy' => $targetSslProxy, 'postBody' => $postBody);
    $params = array_merge($params, $optParams);
    return $this->call('setSslCertificates', array($params), "Google_Service_Compute_Operation");
  }
}
