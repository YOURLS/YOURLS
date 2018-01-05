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
 * The "buckets" collection of methods.
 * Typical usage is:
 *  <code>
 *   $storageService = new Google_Service_Storage(...);
 *   $buckets = $storageService->buckets;
 *  </code>
 */
class Google_Service_Storage_Resource_Buckets extends Google_Service_Resource
{
  /**
   * Permanently deletes an empty bucket. (buckets.delete)
   *
   * @param string $bucket Name of a bucket.
   * @param array $optParams Optional parameters.
   *
   * @opt_param string ifMetagenerationMatch If set, only deletes the bucket if
   * its metageneration matches this value.
   * @opt_param string ifMetagenerationNotMatch If set, only deletes the bucket if
   * its metageneration does not match this value.
   * @opt_param string userProject The project to be billed for this request.
   * Required for Requester Pays buckets.
   */
  public function delete($bucket, $optParams = array())
  {
    $params = array('bucket' => $bucket);
    $params = array_merge($params, $optParams);
    return $this->call('delete', array($params));
  }
  /**
   * Returns metadata for the specified bucket. (buckets.get)
   *
   * @param string $bucket Name of a bucket.
   * @param array $optParams Optional parameters.
   *
   * @opt_param string ifMetagenerationMatch Makes the return of the bucket
   * metadata conditional on whether the bucket's current metageneration matches
   * the given value.
   * @opt_param string ifMetagenerationNotMatch Makes the return of the bucket
   * metadata conditional on whether the bucket's current metageneration does not
   * match the given value.
   * @opt_param string projection Set of properties to return. Defaults to noAcl.
   * @opt_param string userProject The project to be billed for this request.
   * Required for Requester Pays buckets.
   * @return Google_Service_Storage_Bucket
   */
  public function get($bucket, $optParams = array())
  {
    $params = array('bucket' => $bucket);
    $params = array_merge($params, $optParams);
    return $this->call('get', array($params), "Google_Service_Storage_Bucket");
  }
  /**
   * Returns an IAM policy for the specified bucket. (buckets.getIamPolicy)
   *
   * @param string $bucket Name of a bucket.
   * @param array $optParams Optional parameters.
   *
   * @opt_param string userProject The project to be billed for this request.
   * Required for Requester Pays buckets.
   * @return Google_Service_Storage_Policy
   */
  public function getIamPolicy($bucket, $optParams = array())
  {
    $params = array('bucket' => $bucket);
    $params = array_merge($params, $optParams);
    return $this->call('getIamPolicy', array($params), "Google_Service_Storage_Policy");
  }
  /**
   * Creates a new bucket. (buckets.insert)
   *
   * @param string $project A valid API project identifier.
   * @param Google_Service_Storage_Bucket $postBody
   * @param array $optParams Optional parameters.
   *
   * @opt_param string predefinedAcl Apply a predefined set of access controls to
   * this bucket.
   * @opt_param string predefinedDefaultObjectAcl Apply a predefined set of
   * default object access controls to this bucket.
   * @opt_param string projection Set of properties to return. Defaults to noAcl,
   * unless the bucket resource specifies acl or defaultObjectAcl properties, when
   * it defaults to full.
   * @opt_param string userProject The project to be billed for this request.
   * @return Google_Service_Storage_Bucket
   */
  public function insert($project, Google_Service_Storage_Bucket $postBody, $optParams = array())
  {
    $params = array('project' => $project, 'postBody' => $postBody);
    $params = array_merge($params, $optParams);
    return $this->call('insert', array($params), "Google_Service_Storage_Bucket");
  }
  /**
   * Retrieves a list of buckets for a given project. (buckets.listBuckets)
   *
   * @param string $project A valid API project identifier.
   * @param array $optParams Optional parameters.
   *
   * @opt_param string maxResults Maximum number of buckets to return in a single
   * response. The service will use this parameter or 1,000 items, whichever is
   * smaller.
   * @opt_param string pageToken A previously-returned page token representing
   * part of the larger set of results to view.
   * @opt_param string prefix Filter results to buckets whose names begin with
   * this prefix.
   * @opt_param string projection Set of properties to return. Defaults to noAcl.
   * @opt_param string userProject The project to be billed for this request.
   * @return Google_Service_Storage_Buckets
   */
  public function listBuckets($project, $optParams = array())
  {
    $params = array('project' => $project);
    $params = array_merge($params, $optParams);
    return $this->call('list', array($params), "Google_Service_Storage_Buckets");
  }
  /**
   * Updates a bucket. Changes to the bucket will be readable immediately after
   * writing, but configuration changes may take time to propagate. This method
   * supports patch semantics. (buckets.patch)
   *
   * @param string $bucket Name of a bucket.
   * @param Google_Service_Storage_Bucket $postBody
   * @param array $optParams Optional parameters.
   *
   * @opt_param string ifMetagenerationMatch Makes the return of the bucket
   * metadata conditional on whether the bucket's current metageneration matches
   * the given value.
   * @opt_param string ifMetagenerationNotMatch Makes the return of the bucket
   * metadata conditional on whether the bucket's current metageneration does not
   * match the given value.
   * @opt_param string predefinedAcl Apply a predefined set of access controls to
   * this bucket.
   * @opt_param string predefinedDefaultObjectAcl Apply a predefined set of
   * default object access controls to this bucket.
   * @opt_param string projection Set of properties to return. Defaults to full.
   * @opt_param string userProject The project to be billed for this request.
   * Required for Requester Pays buckets.
   * @return Google_Service_Storage_Bucket
   */
  public function patch($bucket, Google_Service_Storage_Bucket $postBody, $optParams = array())
  {
    $params = array('bucket' => $bucket, 'postBody' => $postBody);
    $params = array_merge($params, $optParams);
    return $this->call('patch', array($params), "Google_Service_Storage_Bucket");
  }
  /**
   * Updates an IAM policy for the specified bucket. (buckets.setIamPolicy)
   *
   * @param string $bucket Name of a bucket.
   * @param Google_Service_Storage_Policy $postBody
   * @param array $optParams Optional parameters.
   *
   * @opt_param string userProject The project to be billed for this request.
   * Required for Requester Pays buckets.
   * @return Google_Service_Storage_Policy
   */
  public function setIamPolicy($bucket, Google_Service_Storage_Policy $postBody, $optParams = array())
  {
    $params = array('bucket' => $bucket, 'postBody' => $postBody);
    $params = array_merge($params, $optParams);
    return $this->call('setIamPolicy', array($params), "Google_Service_Storage_Policy");
  }
  /**
   * Tests a set of permissions on the given bucket to see which, if any, are held
   * by the caller. (buckets.testIamPermissions)
   *
   * @param string $bucket Name of a bucket.
   * @param string|array $permissions Permissions to test.
   * @param array $optParams Optional parameters.
   *
   * @opt_param string userProject The project to be billed for this request.
   * Required for Requester Pays buckets.
   * @return Google_Service_Storage_TestIamPermissionsResponse
   */
  public function testIamPermissions($bucket, $permissions, $optParams = array())
  {
    $params = array('bucket' => $bucket, 'permissions' => $permissions);
    $params = array_merge($params, $optParams);
    return $this->call('testIamPermissions', array($params), "Google_Service_Storage_TestIamPermissionsResponse");
  }
  /**
   * Updates a bucket. Changes to the bucket will be readable immediately after
   * writing, but configuration changes may take time to propagate.
   * (buckets.update)
   *
   * @param string $bucket Name of a bucket.
   * @param Google_Service_Storage_Bucket $postBody
   * @param array $optParams Optional parameters.
   *
   * @opt_param string ifMetagenerationMatch Makes the return of the bucket
   * metadata conditional on whether the bucket's current metageneration matches
   * the given value.
   * @opt_param string ifMetagenerationNotMatch Makes the return of the bucket
   * metadata conditional on whether the bucket's current metageneration does not
   * match the given value.
   * @opt_param string predefinedAcl Apply a predefined set of access controls to
   * this bucket.
   * @opt_param string predefinedDefaultObjectAcl Apply a predefined set of
   * default object access controls to this bucket.
   * @opt_param string projection Set of properties to return. Defaults to full.
   * @opt_param string userProject The project to be billed for this request.
   * Required for Requester Pays buckets.
   * @return Google_Service_Storage_Bucket
   */
  public function update($bucket, Google_Service_Storage_Bucket $postBody, $optParams = array())
  {
    $params = array('bucket' => $bucket, 'postBody' => $postBody);
    $params = array_merge($params, $optParams);
    return $this->call('update', array($params), "Google_Service_Storage_Bucket");
  }
}
