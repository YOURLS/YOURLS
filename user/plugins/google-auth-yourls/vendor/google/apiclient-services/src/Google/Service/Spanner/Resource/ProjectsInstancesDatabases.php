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
 * The "databases" collection of methods.
 * Typical usage is:
 *  <code>
 *   $spannerService = new Google_Service_Spanner(...);
 *   $databases = $spannerService->databases;
 *  </code>
 */
class Google_Service_Spanner_Resource_ProjectsInstancesDatabases extends Google_Service_Resource
{
  /**
   * Creates a new Cloud Spanner database and starts to prepare it for serving.
   * The returned long-running operation will have a name of the format
   * `/operations/` and can be used to track preparation of the database. The
   * metadata field type is CreateDatabaseMetadata. The response field type is
   * Database, if successful. (databases.create)
   *
   * @param string $parent Required. The name of the instance that will serve the
   * new database. Values are of the form `projects//instances/`.
   * @param Google_Service_Spanner_CreateDatabaseRequest $postBody
   * @param array $optParams Optional parameters.
   * @return Google_Service_Spanner_Operation
   */
  public function create($parent, Google_Service_Spanner_CreateDatabaseRequest $postBody, $optParams = array())
  {
    $params = array('parent' => $parent, 'postBody' => $postBody);
    $params = array_merge($params, $optParams);
    return $this->call('create', array($params), "Google_Service_Spanner_Operation");
  }
  /**
   * Drops (aka deletes) a Cloud Spanner database. (databases.dropDatabase)
   *
   * @param string $database Required. The database to be dropped.
   * @param array $optParams Optional parameters.
   * @return Google_Service_Spanner_SpannerEmpty
   */
  public function dropDatabase($database, $optParams = array())
  {
    $params = array('database' => $database);
    $params = array_merge($params, $optParams);
    return $this->call('dropDatabase', array($params), "Google_Service_Spanner_SpannerEmpty");
  }
  /**
   * Gets the state of a Cloud Spanner database. (databases.get)
   *
   * @param string $name Required. The name of the requested database. Values are
   * of the form `projects//instances//databases/`.
   * @param array $optParams Optional parameters.
   * @return Google_Service_Spanner_Database
   */
  public function get($name, $optParams = array())
  {
    $params = array('name' => $name);
    $params = array_merge($params, $optParams);
    return $this->call('get', array($params), "Google_Service_Spanner_Database");
  }
  /**
   * Returns the schema of a Cloud Spanner database as a list of formatted DDL
   * statements. This method does not show pending schema updates, those may be
   * queried using the Operations API. (databases.getDdl)
   *
   * @param string $database Required. The database whose schema we wish to get.
   * @param array $optParams Optional parameters.
   * @return Google_Service_Spanner_GetDatabaseDdlResponse
   */
  public function getDdl($database, $optParams = array())
  {
    $params = array('database' => $database);
    $params = array_merge($params, $optParams);
    return $this->call('getDdl', array($params), "Google_Service_Spanner_GetDatabaseDdlResponse");
  }
  /**
   * Gets the access control policy for a database resource. Returns an empty
   * policy if a database exists but does not have a policy set.
   *
   * Authorization requires `spanner.databases.getIamPolicy` permission on
   * resource. (databases.getIamPolicy)
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
   * Lists Cloud Spanner databases. (databases.listProjectsInstancesDatabases)
   *
   * @param string $parent Required. The instance whose databases should be
   * listed. Values are of the form `projects//instances/`.
   * @param array $optParams Optional parameters.
   *
   * @opt_param string pageToken If non-empty, `page_token` should contain a
   * next_page_token from a previous ListDatabasesResponse.
   * @opt_param int pageSize Number of databases to be returned in the response.
   * If 0 or less, defaults to the server's maximum allowed page size.
   * @return Google_Service_Spanner_ListDatabasesResponse
   */
  public function listProjectsInstancesDatabases($parent, $optParams = array())
  {
    $params = array('parent' => $parent);
    $params = array_merge($params, $optParams);
    return $this->call('list', array($params), "Google_Service_Spanner_ListDatabasesResponse");
  }
  /**
   * Sets the access control policy on a database resource. Replaces any existing
   * policy.
   *
   * Authorization requires `spanner.databases.setIamPolicy` permission on
   * resource. (databases.setIamPolicy)
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
   * Returns permissions that the caller has on the specified database resource.
   *
   * Attempting this RPC on a non-existent Cloud Spanner database will result in a
   * NOT_FOUND error if the user has `spanner.databases.list` permission on the
   * containing Cloud Spanner instance. Otherwise returns an empty set of
   * permissions. (databases.testIamPermissions)
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
  /**
   * Updates the schema of a Cloud Spanner database by creating/altering/dropping
   * tables, columns, indexes, etc. The returned long-running operation will have
   * a name of the format `/operations/` and can be used to track execution of the
   * schema change(s). The metadata field type is UpdateDatabaseDdlMetadata.  The
   * operation has no response. (databases.updateDdl)
   *
   * @param string $database Required. The database to update.
   * @param Google_Service_Spanner_UpdateDatabaseDdlRequest $postBody
   * @param array $optParams Optional parameters.
   * @return Google_Service_Spanner_Operation
   */
  public function updateDdl($database, Google_Service_Spanner_UpdateDatabaseDdlRequest $postBody, $optParams = array())
  {
    $params = array('database' => $database, 'postBody' => $postBody);
    $params = array_merge($params, $optParams);
    return $this->call('updateDdl', array($params), "Google_Service_Spanner_Operation");
  }
}
