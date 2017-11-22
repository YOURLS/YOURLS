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
 * The "services" collection of methods.
 * Typical usage is:
 *  <code>
 *   $servicemanagementService = new Google_Service_ServiceManagement(...);
 *   $services = $servicemanagementService->services;
 *  </code>
 */
class Google_Service_ServiceManagement_Resource_Services extends Google_Service_Resource
{
  /**
   * Creates a new managed service. Please note one producer project can own no
   * more than 20 services.
   *
   * Operation (services.create)
   *
   * @param Google_Service_ServiceManagement_ManagedService $postBody
   * @param array $optParams Optional parameters.
   * @return Google_Service_ServiceManagement_Operation
   */
  public function create(Google_Service_ServiceManagement_ManagedService $postBody, $optParams = array())
  {
    $params = array('postBody' => $postBody);
    $params = array_merge($params, $optParams);
    return $this->call('create', array($params), "Google_Service_ServiceManagement_Operation");
  }
  /**
   * Deletes a managed service. This method will change the service to the `Soft-
   * Delete` state for 30 days. Within this period, service producers may call
   * UndeleteService to restore the service. After 30 days, the service will be
   * permanently deleted.
   *
   * Operation (services.delete)
   *
   * @param string $serviceName The name of the service.  See the [overview
   * ](/service-management/overview) for naming requirements.  For example:
   * `example.googleapis.com`.
   * @param array $optParams Optional parameters.
   * @return Google_Service_ServiceManagement_Operation
   */
  public function delete($serviceName, $optParams = array())
  {
    $params = array('serviceName' => $serviceName);
    $params = array_merge($params, $optParams);
    return $this->call('delete', array($params), "Google_Service_ServiceManagement_Operation");
  }
  /**
   * Disables a service for a project, so it can no longer be be used for the
   * project. It prevents accidental usage that may cause unexpected billing
   * charges or security leaks.
   *
   * Operation (services.disable)
   *
   * @param string $serviceName Name of the service to disable. Specifying an
   * unknown service name will cause the request to fail.
   * @param Google_Service_ServiceManagement_DisableServiceRequest $postBody
   * @param array $optParams Optional parameters.
   * @return Google_Service_ServiceManagement_Operation
   */
  public function disable($serviceName, Google_Service_ServiceManagement_DisableServiceRequest $postBody, $optParams = array())
  {
    $params = array('serviceName' => $serviceName, 'postBody' => $postBody);
    $params = array_merge($params, $optParams);
    return $this->call('disable', array($params), "Google_Service_ServiceManagement_Operation");
  }
  /**
   * Enables a service for a project, so it can be used for the project. See
   * [Cloud Auth Guide](https://cloud.google.com/docs/authentication) for more
   * information.
   *
   * Operation (services.enable)
   *
   * @param string $serviceName Name of the service to enable. Specifying an
   * unknown service name will cause the request to fail.
   * @param Google_Service_ServiceManagement_EnableServiceRequest $postBody
   * @param array $optParams Optional parameters.
   * @return Google_Service_ServiceManagement_Operation
   */
  public function enable($serviceName, Google_Service_ServiceManagement_EnableServiceRequest $postBody, $optParams = array())
  {
    $params = array('serviceName' => $serviceName, 'postBody' => $postBody);
    $params = array_merge($params, $optParams);
    return $this->call('enable', array($params), "Google_Service_ServiceManagement_Operation");
  }
  /**
   * Generates and returns a report (errors, warnings and changes from existing
   * configurations) associated with GenerateConfigReportRequest.new_value
   *
   * If GenerateConfigReportRequest.old_value is specified,
   * GenerateConfigReportRequest will contain a single ChangeReport based on the
   * comparison between GenerateConfigReportRequest.new_value and
   * GenerateConfigReportRequest.old_value. If
   * GenerateConfigReportRequest.old_value is not specified, this method will
   * compare GenerateConfigReportRequest.new_value with the last pushed service
   * configuration. (services.generateConfigReport)
   *
   * @param Google_Service_ServiceManagement_GenerateConfigReportRequest $postBody
   * @param array $optParams Optional parameters.
   * @return Google_Service_ServiceManagement_GenerateConfigReportResponse
   */
  public function generateConfigReport(Google_Service_ServiceManagement_GenerateConfigReportRequest $postBody, $optParams = array())
  {
    $params = array('postBody' => $postBody);
    $params = array_merge($params, $optParams);
    return $this->call('generateConfigReport', array($params), "Google_Service_ServiceManagement_GenerateConfigReportResponse");
  }
  /**
   * Gets a managed service. Authentication is required unless the service is
   * public. (services.get)
   *
   * @param string $serviceName The name of the service.  See the `ServiceManager`
   * overview for naming requirements.  For example: `example.googleapis.com`.
   * @param array $optParams Optional parameters.
   * @return Google_Service_ServiceManagement_ManagedService
   */
  public function get($serviceName, $optParams = array())
  {
    $params = array('serviceName' => $serviceName);
    $params = array_merge($params, $optParams);
    return $this->call('get', array($params), "Google_Service_ServiceManagement_ManagedService");
  }
  /**
   * Gets a service configuration (version) for a managed service.
   * (services.getConfig)
   *
   * @param string $serviceName The name of the service.  See the [overview
   * ](/service-management/overview) for naming requirements.  For example:
   * `example.googleapis.com`.
   * @param array $optParams Optional parameters.
   *
   * @opt_param string configId The id of the service configuration resource.
   * @opt_param string view Specifies which parts of the Service Config should be
   * returned in the response.
   * @return Google_Service_ServiceManagement_Service
   */
  public function getConfig($serviceName, $optParams = array())
  {
    $params = array('serviceName' => $serviceName);
    $params = array_merge($params, $optParams);
    return $this->call('getConfig', array($params), "Google_Service_ServiceManagement_Service");
  }
  /**
   * Gets the access control policy for a resource. Returns an empty policy if the
   * resource exists and does not have a policy set. (services.getIamPolicy)
   *
   * @param string $resource REQUIRED: The resource for which the policy is being
   * requested. See the operation documentation for the appropriate value for this
   * field.
   * @param Google_Service_ServiceManagement_GetIamPolicyRequest $postBody
   * @param array $optParams Optional parameters.
   * @return Google_Service_ServiceManagement_Policy
   */
  public function getIamPolicy($resource, Google_Service_ServiceManagement_GetIamPolicyRequest $postBody, $optParams = array())
  {
    $params = array('resource' => $resource, 'postBody' => $postBody);
    $params = array_merge($params, $optParams);
    return $this->call('getIamPolicy', array($params), "Google_Service_ServiceManagement_Policy");
  }
  /**
   * Lists managed services.
   *
   * Returns all public services. For authenticated users, also returns all
   * services the calling user has "servicemanagement.services.get" permission
   * for.
   *
   * **BETA:** If the caller specifies the `consumer_id`, it returns only the
   * services enabled on the consumer. The `consumer_id` must have the format of
   * "project:{PROJECT-ID}". (services.listServices)
   *
   * @param array $optParams Optional parameters.
   *
   * @opt_param string consumerId Include services consumed by the specified
   * consumer.
   *
   * The Google Service Management implementation accepts the following forms: -
   * project:
   * @opt_param string pageToken Token identifying which result to start with;
   * returned by a previous list call.
   * @opt_param int pageSize Requested size of the next page of data.
   * @opt_param string producerProjectId Include services produced by the
   * specified project.
   * @return Google_Service_ServiceManagement_ListServicesResponse
   */
  public function listServices($optParams = array())
  {
    $params = array();
    $params = array_merge($params, $optParams);
    return $this->call('list', array($params), "Google_Service_ServiceManagement_ListServicesResponse");
  }
  /**
   * Sets the access control policy on the specified resource. Replaces any
   * existing policy. (services.setIamPolicy)
   *
   * @param string $resource REQUIRED: The resource for which the policy is being
   * specified. See the operation documentation for the appropriate value for this
   * field.
   * @param Google_Service_ServiceManagement_SetIamPolicyRequest $postBody
   * @param array $optParams Optional parameters.
   * @return Google_Service_ServiceManagement_Policy
   */
  public function setIamPolicy($resource, Google_Service_ServiceManagement_SetIamPolicyRequest $postBody, $optParams = array())
  {
    $params = array('resource' => $resource, 'postBody' => $postBody);
    $params = array_merge($params, $optParams);
    return $this->call('setIamPolicy', array($params), "Google_Service_ServiceManagement_Policy");
  }
  /**
   * Returns permissions that a caller has on the specified resource. If the
   * resource does not exist, this will return an empty set of permissions, not a
   * NOT_FOUND error.
   *
   * Note: This operation is designed to be used for building permission-aware UIs
   * and command-line tools, not for authorization checking. This operation may
   * "fail open" without warning. (services.testIamPermissions)
   *
   * @param string $resource REQUIRED: The resource for which the policy detail is
   * being requested. See the operation documentation for the appropriate value
   * for this field.
   * @param Google_Service_ServiceManagement_TestIamPermissionsRequest $postBody
   * @param array $optParams Optional parameters.
   * @return Google_Service_ServiceManagement_TestIamPermissionsResponse
   */
  public function testIamPermissions($resource, Google_Service_ServiceManagement_TestIamPermissionsRequest $postBody, $optParams = array())
  {
    $params = array('resource' => $resource, 'postBody' => $postBody);
    $params = array_merge($params, $optParams);
    return $this->call('testIamPermissions', array($params), "Google_Service_ServiceManagement_TestIamPermissionsResponse");
  }
  /**
   * Revives a previously deleted managed service. The method restores the service
   * using the configuration at the time the service was deleted. The target
   * service must exist and must have been deleted within the last 30 days.
   *
   * Operation (services.undelete)
   *
   * @param string $serviceName The name of the service. See the [overview
   * ](/service-management/overview) for naming requirements. For example:
   * `example.googleapis.com`.
   * @param array $optParams Optional parameters.
   * @return Google_Service_ServiceManagement_Operation
   */
  public function undelete($serviceName, $optParams = array())
  {
    $params = array('serviceName' => $serviceName);
    $params = array_merge($params, $optParams);
    return $this->call('undelete', array($params), "Google_Service_ServiceManagement_Operation");
  }
}
