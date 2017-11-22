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
 * The "folders" collection of methods.
 * Typical usage is:
 *  <code>
 *   $cloudresourcemanagerService = new Google_Service_CloudResourceManager(...);
 *   $folders = $cloudresourcemanagerService->folders;
 *  </code>
 */
class Google_Service_CloudResourceManager_Resource_Folders extends Google_Service_Resource
{
  /**
   * Clears a `Policy` from a resource. (folders.clearOrgPolicy)
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
   * Gets the effective `Policy` on a resource. This is the result of merging
   * `Policies` in the resource hierarchy. The returned `Policy` will not have an
   * `etag`set because it is a computed `Policy` across multiple resources.
   * (folders.getEffectiveOrgPolicy)
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
   * Gets a `Policy` on a resource.
   *
   * If no `Policy` is set on the resource, a `Policy` is returned with default
   * values including `POLICY_TYPE_NOT_SET` for the `policy_type oneof`. The
   * `etag` value can be used with `SetOrgPolicy()` to create or update a `Policy`
   * during read-modify-write. (folders.getOrgPolicy)
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
   * (folders.listAvailableOrgPolicyConstraints)
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
   * (folders.listOrgPolicies)
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
   * Updates the specified `Policy` on the resource. Creates a new `Policy` for
   * that `Constraint` on the resource if one does not exist.
   *
   * Not supplying an `etag` on the request `Policy` results in an unconditional
   * write of the `Policy`. (folders.setOrgPolicy)
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
}
