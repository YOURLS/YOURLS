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
 * The "schemas" collection of methods.
 * Typical usage is:
 *  <code>
 *   $adminService = new Google_Service_Directory(...);
 *   $schemas = $adminService->schemas;
 *  </code>
 */
class Google_Service_Directory_Resource_Schemas extends Google_Service_Resource
{
  /**
   * Delete schema (schemas.delete)
   *
   * @param string $customerId Immutable ID of the G Suite account
   * @param string $schemaKey Name or immutable ID of the schema
   * @param array $optParams Optional parameters.
   */
  public function delete($customerId, $schemaKey, $optParams = array())
  {
    $params = array('customerId' => $customerId, 'schemaKey' => $schemaKey);
    $params = array_merge($params, $optParams);
    return $this->call('delete', array($params));
  }
  /**
   * Retrieve schema (schemas.get)
   *
   * @param string $customerId Immutable ID of the G Suite account
   * @param string $schemaKey Name or immutable ID of the schema
   * @param array $optParams Optional parameters.
   * @return Google_Service_Directory_Schema
   */
  public function get($customerId, $schemaKey, $optParams = array())
  {
    $params = array('customerId' => $customerId, 'schemaKey' => $schemaKey);
    $params = array_merge($params, $optParams);
    return $this->call('get', array($params), "Google_Service_Directory_Schema");
  }
  /**
   * Create schema. (schemas.insert)
   *
   * @param string $customerId Immutable ID of the G Suite account
   * @param Google_Service_Directory_Schema $postBody
   * @param array $optParams Optional parameters.
   * @return Google_Service_Directory_Schema
   */
  public function insert($customerId, Google_Service_Directory_Schema $postBody, $optParams = array())
  {
    $params = array('customerId' => $customerId, 'postBody' => $postBody);
    $params = array_merge($params, $optParams);
    return $this->call('insert', array($params), "Google_Service_Directory_Schema");
  }
  /**
   * Retrieve all schemas for a customer (schemas.listSchemas)
   *
   * @param string $customerId Immutable ID of the G Suite account
   * @param array $optParams Optional parameters.
   * @return Google_Service_Directory_Schemas
   */
  public function listSchemas($customerId, $optParams = array())
  {
    $params = array('customerId' => $customerId);
    $params = array_merge($params, $optParams);
    return $this->call('list', array($params), "Google_Service_Directory_Schemas");
  }
  /**
   * Update schema. This method supports patch semantics. (schemas.patch)
   *
   * @param string $customerId Immutable ID of the G Suite account
   * @param string $schemaKey Name or immutable ID of the schema.
   * @param Google_Service_Directory_Schema $postBody
   * @param array $optParams Optional parameters.
   * @return Google_Service_Directory_Schema
   */
  public function patch($customerId, $schemaKey, Google_Service_Directory_Schema $postBody, $optParams = array())
  {
    $params = array('customerId' => $customerId, 'schemaKey' => $schemaKey, 'postBody' => $postBody);
    $params = array_merge($params, $optParams);
    return $this->call('patch', array($params), "Google_Service_Directory_Schema");
  }
  /**
   * Update schema (schemas.update)
   *
   * @param string $customerId Immutable ID of the G Suite account
   * @param string $schemaKey Name or immutable ID of the schema.
   * @param Google_Service_Directory_Schema $postBody
   * @param array $optParams Optional parameters.
   * @return Google_Service_Directory_Schema
   */
  public function update($customerId, $schemaKey, Google_Service_Directory_Schema $postBody, $optParams = array())
  {
    $params = array('customerId' => $customerId, 'schemaKey' => $schemaKey, 'postBody' => $postBody);
    $params = array_merge($params, $optParams);
    return $this->call('update', array($params), "Google_Service_Directory_Schema");
  }
}
