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
 * The "bucketAccessControls" collection of methods.
 * Typical usage is:
 *  <code>
 *   $storageService = new Google_Service_Storage(...);
 *   $bucketAccessControls = $storageService->bucketAccessControls;
 *  </code>
 */
class Google_Service_Storage_Resource_BucketAccessControls extends Google_Service_Resource
{
  /**
   * Permanently deletes the ACL entry for the specified entity on the specified
   * bucket. (bucketAccessControls.delete)
   *
   * @param string $bucket Name of a bucket.
   * @param string $entity The entity holding the permission. Can be user-userId,
   * user-emailAddress, group-groupId, group-emailAddress, allUsers, or
   * allAuthenticatedUsers.
   * @param array $optParams Optional parameters.
   *
   * @opt_param string userProject The project to be billed for this request.
   * Required for Requester Pays buckets.
   */
  public function delete($bucket, $entity, $optParams = array())
  {
    $params = array('bucket' => $bucket, 'entity' => $entity);
    $params = array_merge($params, $optParams);
    return $this->call('delete', array($params));
  }
  /**
   * Returns the ACL entry for the specified entity on the specified bucket.
   * (bucketAccessControls.get)
   *
   * @param string $bucket Name of a bucket.
   * @param string $entity The entity holding the permission. Can be user-userId,
   * user-emailAddress, group-groupId, group-emailAddress, allUsers, or
   * allAuthenticatedUsers.
   * @param array $optParams Optional parameters.
   *
   * @opt_param string userProject The project to be billed for this request.
   * Required for Requester Pays buckets.
   * @return Google_Service_Storage_BucketAccessControl
   */
  public function get($bucket, $entity, $optParams = array())
  {
    $params = array('bucket' => $bucket, 'entity' => $entity);
    $params = array_merge($params, $optParams);
    return $this->call('get', array($params), "Google_Service_Storage_BucketAccessControl");
  }
  /**
   * Creates a new ACL entry on the specified bucket.
   * (bucketAccessControls.insert)
   *
   * @param string $bucket Name of a bucket.
   * @param Google_Service_Storage_BucketAccessControl $postBody
   * @param array $optParams Optional parameters.
   *
   * @opt_param string userProject The project to be billed for this request.
   * Required for Requester Pays buckets.
   * @return Google_Service_Storage_BucketAccessControl
   */
  public function insert($bucket, Google_Service_Storage_BucketAccessControl $postBody, $optParams = array())
  {
    $params = array('bucket' => $bucket, 'postBody' => $postBody);
    $params = array_merge($params, $optParams);
    return $this->call('insert', array($params), "Google_Service_Storage_BucketAccessControl");
  }
  /**
   * Retrieves ACL entries on the specified bucket.
   * (bucketAccessControls.listBucketAccessControls)
   *
   * @param string $bucket Name of a bucket.
   * @param array $optParams Optional parameters.
   *
   * @opt_param string userProject The project to be billed for this request.
   * Required for Requester Pays buckets.
   * @return Google_Service_Storage_BucketAccessControls
   */
  public function listBucketAccessControls($bucket, $optParams = array())
  {
    $params = array('bucket' => $bucket);
    $params = array_merge($params, $optParams);
    return $this->call('list', array($params), "Google_Service_Storage_BucketAccessControls");
  }
  /**
   * Updates an ACL entry on the specified bucket. This method supports patch
   * semantics. (bucketAccessControls.patch)
   *
   * @param string $bucket Name of a bucket.
   * @param string $entity The entity holding the permission. Can be user-userId,
   * user-emailAddress, group-groupId, group-emailAddress, allUsers, or
   * allAuthenticatedUsers.
   * @param Google_Service_Storage_BucketAccessControl $postBody
   * @param array $optParams Optional parameters.
   *
   * @opt_param string userProject The project to be billed for this request.
   * Required for Requester Pays buckets.
   * @return Google_Service_Storage_BucketAccessControl
   */
  public function patch($bucket, $entity, Google_Service_Storage_BucketAccessControl $postBody, $optParams = array())
  {
    $params = array('bucket' => $bucket, 'entity' => $entity, 'postBody' => $postBody);
    $params = array_merge($params, $optParams);
    return $this->call('patch', array($params), "Google_Service_Storage_BucketAccessControl");
  }
  /**
   * Updates an ACL entry on the specified bucket. (bucketAccessControls.update)
   *
   * @param string $bucket Name of a bucket.
   * @param string $entity The entity holding the permission. Can be user-userId,
   * user-emailAddress, group-groupId, group-emailAddress, allUsers, or
   * allAuthenticatedUsers.
   * @param Google_Service_Storage_BucketAccessControl $postBody
   * @param array $optParams Optional parameters.
   *
   * @opt_param string userProject The project to be billed for this request.
   * Required for Requester Pays buckets.
   * @return Google_Service_Storage_BucketAccessControl
   */
  public function update($bucket, $entity, Google_Service_Storage_BucketAccessControl $postBody, $optParams = array())
  {
    $params = array('bucket' => $bucket, 'entity' => $entity, 'postBody' => $postBody);
    $params = array_merge($params, $optParams);
    return $this->call('update', array($params), "Google_Service_Storage_BucketAccessControl");
  }
}
