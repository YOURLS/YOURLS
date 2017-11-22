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
 * The "projects" collection of methods.
 * Typical usage is:
 *  <code>
 *   $cloudresourcemanagerService = new Google_Service_CloudResourceManager(...);
 *   $projects = $cloudresourcemanagerService->projects;
 *  </code>
 */
class Google_Service_CloudResourceManager_Resource_Projects extends Google_Service_Resource
{
  /**
   * Clears a `Policy` from a resource. (projects.clearOrgPolicy)
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
   * Request that a new Project be created. The result is an Operation which can
   * be used to track the creation process. It is automatically deleted after a
   * few hours, so there is no need to call DeleteOperation.
   *
   * Our SLO permits Project creation to take up to 30 seconds at the 90th
   * percentile. As of 2016-08-29, we are observing 6 seconds 50th percentile
   * latency. 95th percentile latency is around 11 seconds. We recommend polling
   * at the 5th second with an exponential backoff.
   *
   * Authorization requires the Google IAM permission
   * `resourcemanager.projects.create` on the specified parent for the new
   * project. (projects.create)
   *
   * @param Google_Service_CloudResourceManager_Project $postBody
   * @param array $optParams Optional parameters.
   * @return Google_Service_CloudResourceManager_Operation
   */
  public function create(Google_Service_CloudResourceManager_Project $postBody, $optParams = array())
  {
    $params = array('postBody' => $postBody);
    $params = array_merge($params, $optParams);
    return $this->call('create', array($params), "Google_Service_CloudResourceManager_Operation");
  }
  /**
   * Marks the Project identified by the specified `project_id` (for example, `my-
   * project-123`) for deletion. This method will only affect the Project if the
   * following criteria are met:
   *
   * + The Project does not have a billing account associated with it. + The
   * Project has a lifecycle state of ACTIVE.
   *
   * This method changes the Project's lifecycle state from ACTIVE to
   * DELETE_REQUESTED. The deletion starts at an unspecified time, at which point
   * the Project is no longer accessible.
   *
   * Until the deletion completes, you can check the lifecycle state checked by
   * retrieving the Project with GetProject, and the Project remains visible to
   * ListProjects. However, you cannot update the project.
   *
   * After the deletion completes, the Project is not retrievable by the
   * GetProject and ListProjects methods.
   *
   * The caller must have modify permissions for this Project. (projects.delete)
   *
   * @param string $projectId The Project ID (for example, `foo-bar-123`).
   *
   * Required.
   * @param array $optParams Optional parameters.
   * @return Google_Service_CloudResourceManager_CloudresourcemanagerEmpty
   */
  public function delete($projectId, $optParams = array())
  {
    $params = array('projectId' => $projectId);
    $params = array_merge($params, $optParams);
    return $this->call('delete', array($params), "Google_Service_CloudResourceManager_CloudresourcemanagerEmpty");
  }
  /**
   * Retrieves the Project identified by the specified `project_id` (for example,
   * `my-project-123`).
   *
   * The caller must have read permissions for this Project. (projects.get)
   *
   * @param string $projectId The Project ID (for example, `my-project-123`).
   *
   * Required.
   * @param array $optParams Optional parameters.
   * @return Google_Service_CloudResourceManager_Project
   */
  public function get($projectId, $optParams = array())
  {
    $params = array('projectId' => $projectId);
    $params = array_merge($params, $optParams);
    return $this->call('get', array($params), "Google_Service_CloudResourceManager_Project");
  }
  /**
   * Gets a list of ancestors in the resource hierarchy for the Project identified
   * by the specified `project_id` (for example, `my-project-123`).
   *
   * The caller must have read permissions for this Project.
   * (projects.getAncestry)
   *
   * @param string $projectId The Project ID (for example, `my-project-123`).
   *
   * Required.
   * @param Google_Service_CloudResourceManager_GetAncestryRequest $postBody
   * @param array $optParams Optional parameters.
   * @return Google_Service_CloudResourceManager_GetAncestryResponse
   */
  public function getAncestry($projectId, Google_Service_CloudResourceManager_GetAncestryRequest $postBody, $optParams = array())
  {
    $params = array('projectId' => $projectId, 'postBody' => $postBody);
    $params = array_merge($params, $optParams);
    return $this->call('getAncestry', array($params), "Google_Service_CloudResourceManager_GetAncestryResponse");
  }
  /**
   * Gets the effective `Policy` on a resource. This is the result of merging
   * `Policies` in the resource hierarchy. The returned `Policy` will not have an
   * `etag`set because it is a computed `Policy` across multiple resources.
   * (projects.getEffectiveOrgPolicy)
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
   * Returns the IAM access control policy for the specified Project. Permission
   * is denied if the policy or the resource does not exist.
   *
   * Authorization requires the Google IAM permission
   * `resourcemanager.projects.getIamPolicy` on the project
   * (projects.getIamPolicy)
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
   * during read-modify-write. (projects.getOrgPolicy)
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
   * Lists Projects that are visible to the user and satisfy the specified filter.
   * This method returns Projects in an unspecified order. New Projects do not
   * necessarily appear at the end of the list. (projects.listProjects)
   *
   * @param array $optParams Optional parameters.
   *
   * @opt_param string filter An expression for filtering the results of the
   * request.  Filter rules are case insensitive. The fields eligible for
   * filtering are:
   *
   * + `name` + `id` + labels.key where *key* is the name of a label
   *
   * Some examples of using labels as filters:
   *
   * |Filter|Description| |------|-----------| |name:how*|The project's name
   * starts with "how".| |name:Howl|The project's name is `Howl` or `howl`.|
   * |name:HOWL|Equivalent to above.| |NAME:howl|Equivalent to above.|
   * |labels.color:*|The project has the label `color`.| |labels.color:red|The
   * project's label `color` has the value `red`.|
   * |labels.color:redlabels.size:big|The project's label `color` has the value
   * `red` and its label `size` has the value `big`.
   *
   * If you specify a filter that has both `parent.type` and `parent.id`, then the
   * `resourcemanager.projects.list` permission is checked on the parent. If the
   * user has this permission, all projects under the parent will be returned
   * after remaining filters have been applied. If the user lacks this permission,
   * then all projects for which the user has the `resourcemanager.projects.get`
   * permission will be returned after remaining filters have been applied. If no
   * filter is specified, the call will return projects for which the user has
   * `resourcemanager.projects.get` permissions.
   *
   * Optional.
   * @opt_param string pageToken A pagination token returned from a previous call
   * to ListProjects that indicates from where listing should continue.
   *
   * Optional.
   * @opt_param int pageSize The maximum number of Projects to return in the
   * response. The server can return fewer Projects than requested. If
   * unspecified, server picks an appropriate default.
   *
   * Optional.
   * @return Google_Service_CloudResourceManager_ListProjectsResponse
   */
  public function listProjects($optParams = array())
  {
    $params = array();
    $params = array_merge($params, $optParams);
    return $this->call('list', array($params), "Google_Service_CloudResourceManager_ListProjectsResponse");
  }
  /**
   * Lists `Constraints` that could be applied on the specified resource.
   * (projects.listAvailableOrgPolicyConstraints)
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
   * (projects.listOrgPolicies)
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
   * Sets the IAM access control policy for the specified Project. Replaces any
   * existing policy.
   *
   * The following constraints apply when using `setIamPolicy()`:
   *
   * + Project does not support `allUsers` and `allAuthenticatedUsers` as
   * `members` in a `Binding` of a `Policy`.
   *
   * + The owner role can be granted only to `user` and `serviceAccount`.
   *
   * + Service accounts can be made owners of a project directly without any
   * restrictions. However, to be added as an owner, a user must be invited via
   * Cloud Platform console and must accept the invitation.
   *
   * + A user cannot be granted the owner role using `setIamPolicy()`. The user
   * must be granted the owner role using the Cloud Platform Console and must
   * explicitly accept the invitation.
   *
   * + Invitations to grant the owner role cannot be sent using `setIamPolicy()`;
   * they must be sent only using the Cloud Platform Console.
   *
   * + Membership changes that leave the project without any owners that have
   * accepted the Terms of Service (ToS) will be rejected.
   *
   * + If the project is not part of an organization, there must be at least one
   * owner who has accepted the Terms of Service (ToS) agreement in the policy.
   * Calling `setIamPolicy()` to remove the last ToS-accepted owner from the
   * policy will fail. This restriction also applies to legacy projects that no
   * longer have owners who have accepted the ToS. Edits to IAM policies will be
   * rejected until the lack of a ToS-accepting owner is rectified.
   *
   * + Calling this method requires enabling the App Engine Admin API.
   *
   * Note: Removing service accounts from policies or changing their roles can
   * render services completely inoperable. It is important to understand how the
   * service account is being used before removing or updating its roles.
   *
   * Authorization requires the Google IAM permission
   * `resourcemanager.projects.setIamPolicy` on the project
   * (projects.setIamPolicy)
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
   * write of the `Policy`. (projects.setOrgPolicy)
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
   * Returns permissions that a caller has on the specified Project.
   *
   * There are no permissions required for making this API call.
   * (projects.testIamPermissions)
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
  /**
   * Restores the Project identified by the specified `project_id` (for example,
   * `my-project-123`). You can only use this method for a Project that has a
   * lifecycle state of DELETE_REQUESTED. After deletion starts, the Project
   * cannot be restored.
   *
   * The caller must have modify permissions for this Project. (projects.undelete)
   *
   * @param string $projectId The project ID (for example, `foo-bar-123`).
   *
   * Required.
   * @param Google_Service_CloudResourceManager_UndeleteProjectRequest $postBody
   * @param array $optParams Optional parameters.
   * @return Google_Service_CloudResourceManager_CloudresourcemanagerEmpty
   */
  public function undelete($projectId, Google_Service_CloudResourceManager_UndeleteProjectRequest $postBody, $optParams = array())
  {
    $params = array('projectId' => $projectId, 'postBody' => $postBody);
    $params = array_merge($params, $optParams);
    return $this->call('undelete', array($params), "Google_Service_CloudResourceManager_CloudresourcemanagerEmpty");
  }
  /**
   * Updates the attributes of the Project identified by the specified
   * `project_id` (for example, `my-project-123`).
   *
   * The caller must have modify permissions for this Project. (projects.update)
   *
   * @param string $projectId The project ID (for example, `my-project-123`).
   *
   * Required.
   * @param Google_Service_CloudResourceManager_Project $postBody
   * @param array $optParams Optional parameters.
   * @return Google_Service_CloudResourceManager_Project
   */
  public function update($projectId, Google_Service_CloudResourceManager_Project $postBody, $optParams = array())
  {
    $params = array('projectId' => $projectId, 'postBody' => $postBody);
    $params = array_merge($params, $optParams);
    return $this->call('update', array($params), "Google_Service_CloudResourceManager_Project");
  }
}
