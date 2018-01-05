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
 * The "policies" collection of methods.
 * Typical usage is:
 *  <code>
 *   $androidmanagementService = new Google_Service_AndroidManagement(...);
 *   $policies = $androidmanagementService->policies;
 *  </code>
 */
class Google_Service_AndroidManagement_Resource_EnterprisesPolicies extends Google_Service_Resource
{
  /**
   * Deletes a policy. This operation is only permitted if no devices are
   * currently referencing the policy. (policies.delete)
   *
   * @param string $name The name of the policy in the form
   * enterprises/{enterpriseId}/policies/{policyId}
   * @param array $optParams Optional parameters.
   * @return Google_Service_AndroidManagement_AndroidmanagementEmpty
   */
  public function delete($name, $optParams = array())
  {
    $params = array('name' => $name);
    $params = array_merge($params, $optParams);
    return $this->call('delete', array($params), "Google_Service_AndroidManagement_AndroidmanagementEmpty");
  }
  /**
   * Gets a policy. (policies.get)
   *
   * @param string $name The name of the policy in the form
   * enterprises/{enterpriseId}/policies/{policyId}
   * @param array $optParams Optional parameters.
   * @return Google_Service_AndroidManagement_Policy
   */
  public function get($name, $optParams = array())
  {
    $params = array('name' => $name);
    $params = array_merge($params, $optParams);
    return $this->call('get', array($params), "Google_Service_AndroidManagement_Policy");
  }
  /**
   * Lists policies for a given enterprise. (policies.listEnterprisesPolicies)
   *
   * @param string $parent The name of the enterprise in the form
   * enterprises/{enterpriseId}
   * @param array $optParams Optional parameters.
   *
   * @opt_param int pageSize The requested page size. The actual page size may be
   * fixed to a min or max value.
   * @opt_param string pageToken A token identifying a page of results the server
   * should return.
   * @return Google_Service_AndroidManagement_ListPoliciesResponse
   */
  public function listEnterprisesPolicies($parent, $optParams = array())
  {
    $params = array('parent' => $parent);
    $params = array_merge($params, $optParams);
    return $this->call('list', array($params), "Google_Service_AndroidManagement_ListPoliciesResponse");
  }
  /**
   * Updates or creates a policy. (policies.patch)
   *
   * @param string $name The name of the policy in the form
   * enterprises/{enterpriseId}/policies/{policyId}
   * @param Google_Service_AndroidManagement_Policy $postBody
   * @param array $optParams Optional parameters.
   *
   * @opt_param string updateMask The field mask indicating the fields to update.
   * If not set, all modifiable fields will be modified.
   * @return Google_Service_AndroidManagement_Policy
   */
  public function patch($name, Google_Service_AndroidManagement_Policy $postBody, $optParams = array())
  {
    $params = array('name' => $name, 'postBody' => $postBody);
    $params = array_merge($params, $optParams);
    return $this->call('patch', array($params), "Google_Service_AndroidManagement_Policy");
  }
}
