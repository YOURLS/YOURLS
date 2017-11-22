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
 * The "organizations" collection of methods.
 * Typical usage is:
 *  <code>
 *   $cloudresourcemanagerService = new Google_Service_CloudResourceManager(...);
 *   $organizations = $cloudresourcemanagerService->organizations;
 *  </code>
 */
class Google_Service_CloudResourceManager_Resource_Organizations extends Google_Service_Resource
{
  /**
   * Clears a `Policy` from a resource. (organizations.clearOrgPolicy)
   *
   * @param string $resource Name of the resource for the `Policy` to clear.
   * @param Google_Service_CloudResourceManager_ClearOrgPolicyRequest $postBody
   * @param array $optParams Optional parameters.
   * @return Google_Service_CloudResourceManager_CloudresourcemanagerEmpty
   */
  public function clearOrgPolicy($resource, Google_Service_CloudResourceManager_ClearOrgPolicyRequest $postBody, $optParams = array())
  {
    $params = array('resource' => $resource, 'postBody' => $postBody);
    $params = array_merge($params, $optParams);
    return $this->call('clearOrgPolicy', array($params), "Google_Service_CloudResourceManager_CloudresourcemanagerEmpty");
  }
  /**
   * Fetches an Organization resource identified by the specified resource name.
   * (organizations.get)
   *
   * @param string $name The resource name of the Organization to fetch, e.g.
   * "organizations/1234".
   * @param array $optParams Optional parameters.
   * @return Google_Service_CloudResourceManager_Organization
   */
  public function get($name, $optParams = array())
  {
    $params = array('name' => $name);
    $params = array_merge($params, $optParams);
    return $this->call('get', array($params), "Google_Service_CloudResourceManager_Organization");
  }
  /**
   * Gets the effective `Policy` on a resource. This is the result of merging
   * `Policies` in the resource hierarchy. The returned `Policy` will not have an
   * `etag`set because it is a computed `Policy` across multiple resources.
   * (organizations.getEffectiveOrgPolicy)
   *
   * @param string $resource The name of the resource to start computing the
   * effective `Policy`.
   * @param Google_Service_CloudResourceManager_GetEffectiveOrgPolicyRequest $postBody
   * @param array $optParams Optional parameters.
   * @return Google_Service_CloudResourceManager_OrgPolicy
   */
  public function getEffectiveOrgPolicy($resource, Google_Service_CloudResourceManager_GetEffectiveOrgPolicyRequest $postBody, $optParams = array())
  {
    $params = array('resource' => $resource, 'postBody' => $postBody);
    $params = array_merge($params, $optParams);
    return $this->call('getEffectiveOrgPolicy', array($params), "Google_Service_CloudResourceManager_OrgPolicy");
  }
  /**
   * Gets the access control policy for an Organization resource. May be empty if
   * no such policy or resource exists. The `resource` field should be the
   * organization's resource name, e.g. "organizations/123".
   *
   * Authorization requires the Google IAM permission
   * `resourcemanager.organizations.getIamPolicy` on the specified organization
   * (organizations.getIamPolicy)
   *
   * @param string $resource REQUIRED: The resource for which the policy is being
   * requested. See the operation documentation for the appropriate value for this
   * field.
   * @param Google_Service_CloudResourceManager_GetIamPolicyRequest $postBody
   * @param array $optParams Optional parameters.
   * @return Google_Service_CloudResourceManager_Policy
   */
  public function getIamPolicy($resource, Google_Service_CloudResourceManager_GetIamPolicyRequest $postBody, $optParams = array())
  {
    $params = array('resource' => $resource, 'postBody' => $postBody);
    $params = array_merge($params, $optParams);
    return $this->call('getIamPolicy', array($params), "Google_Service_CloudResourceManager_Policy");
  }
  /**
   * Gets a `Policy` on a resource.
   *
   * If no `Policy` is set on the resource, a `Policy` is returned with default
   * values including `POLICY_TYPE_NOT_SET` for the `policy_type oneof`. The
   * `etag` value can be used with `SetOrgPolicy()` to create or update a `Policy`
   * during read-modify-write. (organizations.getOrgPolicy)
   *
   * @param string $resource Name of the resource the `Policy` is set on.
   * @param Google_Service_CloudResourceManager_GetOrgPolicyRequest $postBody
   * @param array $optParams Optional parameters.
   * @return Google_Service_CloudResourceManager_OrgPolicy
   */
  public function getOrgPolicy($resource, Google_Service_CloudResourceManager_GetOrgPolicyRequest $postBody, $optParams = array())
  {
    $params = array('resource' => $resource, 'postBody' => $postBody);
    $params = array_merge($params, $optParams);
    return $this->call('getOrgPolicy', array($params), "Google_Service_CloudResourceManager_OrgPolicy");
  }
  /**
   * Lists `Constraints` that could be applied on the specified resource.
   * (organizations.listAvailableOrgPolicyConstraints)
   *
   * @param string $resource Name of the resource to list `Constraints` for.
   * @param Google_Service_CloudResourceManager_ListAvailableOrgPolicyConstraintsRequest $postBody
   * @param array $optParams Optional parameters.
   * @return Google_Service_CloudResourceManager_ListAvailableOrgPolicyConstraintsResponse
   */
  public function listAvailableOrgPolicyConstraints($resource, Google_Service_CloudResourceManager_ListAvailableOrgPolicyConstraintsRequest $postBody, $optParams = array())
  {
    $params = array('resource' => $resource, 'postBody' => $postBody);
    $params = array_merge($params, $optParams);
    return $this->call('listAvailableOrgPolicyConstraints', array($params), "Google_Service_CloudResourceManager_ListAvailableOrgPolicyConstraintsResponse");
  }
  /**
   * Lists all the `Policies` set for a particular resource.
   * (organizations.listOrgPolicies)
   *
   * @param string $resource Name of the resource to list Policies for.
   * @param Google_Service_CloudResourceManager_ListOrgPoliciesRequest $postBody
   * @param array $optParams Optional parameters.
   * @return Google_Service_CloudResourceManager_ListOrgPoliciesResponse
   */
  public function listOrgPolicies($resource, Google_Service_CloudResourceManager_ListOrgPoliciesRequest $postBody, $optParams = array())
  {
    $params = array('resource' => $resource, 'postBody' => $postBody);
    $params = array_merge($params, $optParams);
    return $this->call('listOrgPolicies', array($params), "Google_Service_CloudResourceManager_ListOrgPoliciesResponse");
  }
  /**
   * Searches Organization resources that are visible to the user and satisfy the
   * specified filter. This method returns Organizations in an unspecified order.
   * New Organizations do not necessarily appear at the end of the results.
   *
   * Search will only return organizations on which the user has the permission
   * `resourcemanager.organizations.get` (organizations.search)
   *
   * @param Google_Service_CloudResourceManager_SearchOrganizationsRequest $postBody
   * @param array $optParams Optional parameters.
   * @return Google_Service_CloudResourceManager_SearchOrganizationsResponse
   */
  public function search(Google_Service_CloudResourceManager_SearchOrganizationsRequest $postBody, $optParams = array())
  {
    $params = array('postBody' => $postBody);
    $params = array_merge($params, $optParams);
    return $this->call('search', array($params), "Google_Service_CloudResourceManager_SearchOrganizationsResponse");
  }
  /**
   * Sets the access control policy on an Organization resource. Replaces any
   * existing policy. The `resource` field should be the organization's resource
   * name, e.g. "organizations/123".
   *
   * Authorization requires the Google IAM permission
   * `resourcemanager.organizations.setIamPolicy` on the specified organization
   * (organizations.setIamPolicy)
   *
   * @param string $resource REQUIRED: The resource for which the policy is being
   * specified. See the operation documentation for the appropriate value for this
   * field.
   * @param Google_Service_CloudResourceManager_SetIamPolicyRequest $postBody
   * @param array $optParams Optional parameters.
   * @return Google_Service_CloudResourceManager_Policy
   */
  public function setIamPolicy($resource, Google_Service_CloudResourceManager_SetIamPolicyRequest $postBody, $optParams = array())
  {
    $params = array('resource' => $resource, 'postBody' => $postBody);
    $params = array_merge($params, $optParams);
    return $this->call('setIamPolicy', array($params), "Google_Service_CloudResourceManager_Policy");
  }
  /**
   * Updates the specified `Policy` on the resource. Creates a new `Policy` for
   * that `Constraint` on the resource if one does not exist.
   *
   * Not supplying an `etag` on the request `Policy` results in an unconditional
   * write of the `Policy`. (organizations.setOrgPolicy)
   *
   * @param string $resource Resource name of the resource to attach the `Policy`.
   * @param Google_Service_CloudResourceManager_SetOrgPolicyRequest $postBody
   * @param array $optParams Optional parameters.
   * @return Google_Service_CloudResourceManager_OrgPolicy
   */
  public function setOrgPolicy($resource, Google_Service_CloudResourceManager_SetOrgPolicyRequest $postBody, $optParams = array())
  {
    $params = array('resource' => $resource, 'postBody' => $postBody);
    $params = array_merge($params, $optParams);
    return $this->call('setOrgPolicy', array($params), "Google_Service_CloudResourceManager_OrgPolicy");
  }
  /**
   * Returns permissions that a caller has on the specified Organization. The
   * `resource` field should be the organization's resource name, e.g.
   * "organizations/123".
   *
   * There are no permissions required for making this API call.
   * (organizations.testIamPermissions)
   *
   * @param string $resource REQUIRED: The resource for which the policy detail is
   * being requested. See the operation documentation for the appropriate value
   * for this field.
   * @param Google_Service_CloudResourceManager_TestIamPermissionsRequest $postBody
   * @param array $optParams Optional parameters.
   * @return Google_Service_CloudResourceManager_TestIamPermissionsResponse
   */
  public function testIamPermissions($resource, Google_Service_CloudResourceManager_TestIamPermissionsRequest $postBody, $optParams = array())
  {
    $params = array('resource' => $resource, 'postBody' => $postBody);
    $params = array_merge($params, $optParams);
    return $this->call('testIamPermissions', array($params), "Google_Service_CloudResourceManager_TestIamPermissionsResponse");
  }
}
