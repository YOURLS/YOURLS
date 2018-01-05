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
 * The "instances" collection of methods.
 * Typical usage is:
 *  <code>
 *   $spannerService = new Google_Service_Spanner(...);
 *   $instances = $spannerService->instances;
 *  </code>
 */
class Google_Service_Spanner_Resource_ProjectsInstances extends Google_Service_Resource
{
  /**
   * Creates an instance and begins preparing it to begin serving. The returned
   * long-running operation can be used to track the progress of preparing the new
   * instance. The instance name is assigned by the caller. If the named instance
   * already exists, `CreateInstance` returns `ALREADY_EXISTS`.
   *
   * Immediately upon completion of this request:
   *
   *   * The instance is readable via the API, with all requested attributes
   * but no allocated resources. Its state is `CREATING`.
   *
   * Until completion of the returned operation:
   *
   *   * Cancelling the operation renders the instance immediately unreadable
   * via the API.   * The instance can be deleted.   * All other attempts to
   * modify the instance are rejected.
   *
   * Upon completion of the returned operation:
   *
   *   * Billing for all successfully-allocated resources begins (some types
   * may have lower than the requested levels).   * Databases can be created in
   * the instance.   * The instance's allocated resource levels are readable via
   * the API.   * The instance's state becomes `READY`.
   *
   * The returned long-running operation will have a name of the format
   * `/operations/` and can be used to track creation of the instance.  The
   * metadata field type is CreateInstanceMetadata. The response field type is
   * Instance, if successful. (instances.create)
   *
   * @param string $parent Required. The name of the project in which to create
   * the instance. Values are of the form `projects/`.
   * @param Google_Service_Spanner_CreateInstanceRequest $postBody
   * @param array $optParams Optional parameters.
   * @return Google_Service_Spanner_Operation
   */
  public function create($parent, Google_Service_Spanner_CreateInstanceRequest $postBody, $optParams = array())
  {
    $params = array('parent' => $parent, 'postBody' => $postBody);
    $params = array_merge($params, $optParams);
    return $this->call('create', array($params), "Google_Service_Spanner_Operation");
  }
  /**
   * Deletes an instance.
   *
   * Immediately upon completion of the request:
   *
   *   * Billing ceases for all of the instance's reserved resources.
   *
   * Soon afterward:
   *
   *   * The instance and *all of its databases* immediately and     irrevocably
   * disappear from the API. All data in the databases     is permanently deleted.
   * (instances.delete)
   *
   * @param string $name Required. The name of the instance to be deleted. Values
   * are of the form `projects//instances/`
   * @param array $optParams Optional parameters.
   * @return Google_Service_Spanner_SpannerEmpty
   */
  public function delete($name, $optParams = array())
  {
    $params = array('name' => $name);
    $params = array_merge($params, $optParams);
    return $this->call('delete', array($params), "Google_Service_Spanner_SpannerEmpty");
  }
  /**
   * Gets information about a particular instance. (instances.get)
   *
   * @param string $name Required. The name of the requested instance. Values are
   * of the form `projects//instances/`.
   * @param array $optParams Optional parameters.
   * @return Google_Service_Spanner_Instance
   */
  public function get($name, $optParams = array())
  {
    $params = array('name' => $name);
    $params = array_merge($params, $optParams);
    return $this->call('get', array($params), "Google_Service_Spanner_Instance");
  }
  /**
   * Gets the access control policy for an instance resource. Returns an empty
   * policy if an instance exists but does not have a policy set.
   *
   * Authorization requires `spanner.instances.getIamPolicy` on resource.
   * (instances.getIamPolicy)
   *
   * @param string $resource REQUIRED: The Cloud Spanner resource for which the
   * policy is being retrieved. The format is `projects//instances/` for instance
   * resources and `projects//instances//databases/` for database resources.
   * @param Google_Service_Spanner_GetIamPolicyRequest $postBody
   * @param array $optParams Optional parameters.
   * @return Google_Service_Spanner_Policy
   */
  public function getIamPolicy($resource, Google_Service_Spanner_GetIamPolicyRequest $postBody, $optParams = array())
  {
    $params = array('resource' => $resource, 'postBody' => $postBody);
    $params = array_merge($params, $optParams);
    return $this->call('getIamPolicy', array($params), "Google_Service_Spanner_Policy");
  }
  /**
   * Lists all instances in the given project. (instances.listProjectsInstances)
   *
   * @param string $parent Required. The name of the project for which a list of
   * instances is requested. Values are of the form `projects/`.
   * @param array $optParams Optional parameters.
   *
   * @opt_param string filter An expression for filtering the results of the
   * request. Filter rules are case insensitive. The fields eligible for filtering
   * are:
   *
   *   * `name`   * `display_name`   * `labels.key` where key is the name of a
   * label
   *
   * Some examples of using filters are:
   *
   *   * `name:*` --> The instance has a name.   * `name:Howl` --> The instance's
   * name contains the string "howl".   * `name:HOWL` --> Equivalent to above.   *
   * `NAME:howl` --> Equivalent to above.   * `labels.env:*` --> The instance has
   * the label "env".   * `labels.env:dev` --> The instance has the label "env"
   * and the value of                        the label contains the string "dev".
   * * `name:howl labels.env:dev` --> The instance's name contains "howl" and
   * it has the label "env" with its value
   * containing "dev".
   * @opt_param string pageToken If non-empty, `page_token` should contain a
   * next_page_token from a previous ListInstancesResponse.
   * @opt_param int pageSize Number of instances to be returned in the response.
   * If 0 or less, defaults to the server's maximum allowed page size.
   * @return Google_Service_Spanner_ListInstancesResponse
   */
  public function listProjectsInstances($parent, $optParams = array())
  {
    $params = array('parent' => $parent);
    $params = array_merge($params, $optParams);
    return $this->call('list', array($params), "Google_Service_Spanner_ListInstancesResponse");
  }
  /**
   * Updates an instance, and begins allocating or releasing resources as
   * requested. The returned long-running operation can be used to track the
   * progress of updating the instance. If the named instance does not exist,
   * returns `NOT_FOUND`.
   *
   * Immediately upon completion of this request:
   *
   *   * For resource types for which a decrease in the instance's allocation
   * has been requested, billing is based on the newly-requested level.
   *
   * Until completion of the returned operation:
   *
   *   * Cancelling the operation sets its metadata's     cancel_time, and begins
   * restoring resources to their pre-request values. The operation     is
   * guaranteed to succeed at undoing all resource changes,     after which point
   * it terminates with a `CANCELLED` status.   * All other attempts to modify the
   * instance are rejected.   * Reading the instance via the API continues to give
   * the pre-request     resource levels.
   *
   * Upon completion of the returned operation:
   *
   *   * Billing begins for all successfully-allocated resources (some types
   * may have lower than the requested levels).   * All newly-reserved resources
   * are available for serving the instance's     tables.   * The instance's new
   * resource levels are readable via the API.
   *
   * The returned long-running operation will have a name of the format
   * `/operations/` and can be used to track the instance modification.  The
   * metadata field type is UpdateInstanceMetadata. The response field type is
   * Instance, if successful.
   *
   * Authorization requires `spanner.instances.update` permission on resource
   * name. (instances.patch)
   *
   * @param string $name Required. A unique identifier for the instance, which
   * cannot be changed after the instance is created. Values are of the form
   * `projects//instances/a-z*[a-z0-9]`. The final segment of the name must be
   * between 6 and 30 characters in length.
   * @param Google_Service_Spanner_UpdateInstanceRequest $postBody
   * @param array $optParams Optional parameters.
   * @return Google_Service_Spanner_Operation
   */
  public function patch($name, Google_Service_Spanner_UpdateInstanceRequest $postBody, $optParams = array())
  {
    $params = array('name' => $name, 'postBody' => $postBody);
    $params = array_merge($params, $optParams);
    return $this->call('patch', array($params), "Google_Service_Spanner_Operation");
  }
  /**
   * Sets the access control policy on an instance resource. Replaces any existing
   * policy.
   *
   * Authorization requires `spanner.instances.setIamPolicy` on resource.
   * (instances.setIamPolicy)
   *
   * @param string $resource REQUIRED: The Cloud Spanner resource for which the
   * policy is being set. The format is `projects//instances/` for instance
   * resources and `projects//instances//databases/` for databases resources.
   * @param Google_Service_Spanner_SetIamPolicyRequest $postBody
   * @param array $optParams Optional parameters.
   * @return Google_Service_Spanner_Policy
   */
  public function setIamPolicy($resource, Google_Service_Spanner_SetIamPolicyRequest $postBody, $optParams = array())
  {
    $params = array('resource' => $resource, 'postBody' => $postBody);
    $params = array_merge($params, $optParams);
    return $this->call('setIamPolicy', array($params), "Google_Service_Spanner_Policy");
  }
  /**
   * Returns permissions that the caller has on the specified instance resource.
   *
   * Attempting this RPC on a non-existent Cloud Spanner instance resource will
   * result in a NOT_FOUND error if the user has `spanner.instances.list`
   * permission on the containing Google Cloud Project. Otherwise returns an empty
   * set of permissions. (instances.testIamPermissions)
   *
   * @param string $resource REQUIRED: The Cloud Spanner resource for which
   * permissions are being tested. The format is `projects//instances/` for
   * instance resources and `projects//instances//databases/` for database
   * resources.
   * @param Google_Service_Spanner_TestIamPermissionsRequest $postBody
   * @param array $optParams Optional parameters.
   * @return Google_Service_Spanner_TestIamPermissionsResponse
   */
  public function testIamPermissions($resource, Google_Service_Spanner_TestIamPermissionsRequest $postBody, $optParams = array())
  {
    $params = array('resource' => $resource, 'postBody' => $postBody);
    $params = array_merge($params, $optParams);
    return $this->call('testIamPermissions', array($params), "Google_Service_Spanner_TestIamPermissionsResponse");
  }
}
