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
 *   $serviceuserService = new Google_Service_ServiceUser(...);
 *   $services = $serviceuserService->services;
 *  </code>
 */
class Google_Service_ServiceUser_Resource_ProjectsServices extends Google_Service_Resource
{
  /**
   * Disable a service so it can no longer be used with a project. This prevents
   * unintended usage that may cause unexpected billing charges or security leaks.
   *
   * Operation (services.disable)
   *
   * @param string $name Name of the consumer and the service to disable for that
   * consumer.
   *
   * The Service User implementation accepts the following forms for consumer: -
   * "project:"
   *
   * A valid path would be: - /v1/projects/my-
   * project/services/servicemanagement.googleapis.com:disable
   * @param Google_Service_ServiceUser_DisableServiceRequest $postBody
   * @param array $optParams Optional parameters.
   * @return Google_Service_ServiceUser_Operation
   */
  public function disable($name, Google_Service_ServiceUser_DisableServiceRequest $postBody, $optParams = array())
  {
    $params = array('name' => $name, 'postBody' => $postBody);
    $params = array_merge($params, $optParams);
    return $this->call('disable', array($params), "Google_Service_ServiceUser_Operation");
  }
  /**
   * Enable a service so it can be used with a project. See [Cloud Auth
   * Guide](https://cloud.google.com/docs/authentication) for more information.
   *
   * Operation (services.enable)
   *
   * @param string $name Name of the consumer and the service to enable for that
   * consumer.
   *
   * A valid path would be: - /v1/projects/my-
   * project/services/servicemanagement.googleapis.com:enable
   * @param Google_Service_ServiceUser_EnableServiceRequest $postBody
   * @param array $optParams Optional parameters.
   * @return Google_Service_ServiceUser_Operation
   */
  public function enable($name, Google_Service_ServiceUser_EnableServiceRequest $postBody, $optParams = array())
  {
    $params = array('name' => $name, 'postBody' => $postBody);
    $params = array_merge($params, $optParams);
    return $this->call('enable', array($params), "Google_Service_ServiceUser_Operation");
  }
  /**
   * List enabled services for the specified consumer.
   * (services.listProjectsServices)
   *
   * @param string $parent List enabled services for the specified parent.
   *
   * An example valid parent would be: - projects/my-project
   * @param array $optParams Optional parameters.
   *
   * @opt_param string pageToken Token identifying which result to start with;
   * returned by a previous list call.
   * @opt_param int pageSize Requested size of the next page of data.
   * @return Google_Service_ServiceUser_ListEnabledServicesResponse
   */
  public function listProjectsServices($parent, $optParams = array())
  {
    $params = array('parent' => $parent);
    $params = array_merge($params, $optParams);
    return $this->call('list', array($params), "Google_Service_ServiceUser_ListEnabledServicesResponse");
  }
}
