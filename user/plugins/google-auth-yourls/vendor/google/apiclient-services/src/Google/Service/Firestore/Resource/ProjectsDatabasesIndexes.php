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
 * The "indexes" collection of methods.
 * Typical usage is:
 *  <code>
 *   $firestoreService = new Google_Service_Firestore(...);
 *   $indexes = $firestoreService->indexes;
 *  </code>
 */
class Google_Service_Firestore_Resource_ProjectsDatabasesIndexes extends Google_Service_Resource
{
  /**
   * Creates the specified index. A newly created index's initial state is
   * `CREATING`. On completion of the returned google.longrunning.Operation, the
   * state will be `READY`. If the index already exists, the call will return an
   * `ALREADY_EXISTS` status.
   *
   * During creation, the process could result in an error, in which case the
   * index will move to the `ERROR` state. The process can be recovered by fixing
   * the data that caused the error, removing the index with delete, then re-
   * creating the index with create.
   *
   * Indexes with a single field cannot be created. (indexes.create)
   *
   * @param string $parent The name of the database this index will apply to. For
   * example: `projects/{project_id}/databases/{database_id}`
   * @param Google_Service_Firestore_Index $postBody
   * @param array $optParams Optional parameters.
   * @return Google_Service_Firestore_Operation
   */
  public function create($parent, Google_Service_Firestore_Index $postBody, $optParams = array())
  {
    $params = array('parent' => $parent, 'postBody' => $postBody);
    $params = array_merge($params, $optParams);
    return $this->call('create', array($params), "Google_Service_Firestore_Operation");
  }
  /**
   * Deletes an index. (indexes.delete)
   *
   * @param string $name The index name. For example:
   * `projects/{project_id}/databases/{database_id}/indexes/{index_id}`
   * @param array $optParams Optional parameters.
   * @return Google_Service_Firestore_FirestoreEmpty
   */
  public function delete($name, $optParams = array())
  {
    $params = array('name' => $name);
    $params = array_merge($params, $optParams);
    return $this->call('delete', array($params), "Google_Service_Firestore_FirestoreEmpty");
  }
  /**
   * Gets an index. (indexes.get)
   *
   * @param string $name The name of the index. For example:
   * `projects/{project_id}/databases/{database_id}/indexes/{index_id}`
   * @param array $optParams Optional parameters.
   * @return Google_Service_Firestore_Index
   */
  public function get($name, $optParams = array())
  {
    $params = array('name' => $name);
    $params = array_merge($params, $optParams);
    return $this->call('get', array($params), "Google_Service_Firestore_Index");
  }
  /**
   * Lists the indexes that match the specified filters.
   * (indexes.listProjectsDatabasesIndexes)
   *
   * @param string $parent The database name. For example:
   * `projects/{project_id}/databases/{database_id}`
   * @param array $optParams Optional parameters.
   *
   * @opt_param int pageSize The standard List page size.
   * @opt_param string filter
   * @opt_param string pageToken The standard List page token.
   * @return Google_Service_Firestore_ListIndexesResponse
   */
  public function listProjectsDatabasesIndexes($parent, $optParams = array())
  {
    $params = array('parent' => $parent);
    $params = array_merge($params, $optParams);
    return $this->call('list', array($params), "Google_Service_Firestore_ListIndexesResponse");
  }
}
