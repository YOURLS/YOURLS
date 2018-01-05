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
 * The "cryptoKeys" collection of methods.
 * Typical usage is:
 *  <code>
 *   $cloudkmsService = new Google_Service_CloudKMS(...);
 *   $cryptoKeys = $cloudkmsService->cryptoKeys;
 *  </code>
 */
class Google_Service_CloudKMS_Resource_ProjectsLocationsKeyRingsCryptoKeys extends Google_Service_Resource
{
  /**
   * Create a new CryptoKey within a KeyRing.
   *
   * CryptoKey.purpose is required. (cryptoKeys.create)
   *
   * @param string $parent Required. The name of the KeyRing associated with the
   * CryptoKeys.
   * @param Google_Service_CloudKMS_CryptoKey $postBody
   * @param array $optParams Optional parameters.
   *
   * @opt_param string cryptoKeyId Required. It must be unique within a KeyRing
   * and match the regular expression `[a-zA-Z0-9_-]{1,63}`
   * @return Google_Service_CloudKMS_CryptoKey
   */
  public function create($parent, Google_Service_CloudKMS_CryptoKey $postBody, $optParams = array())
  {
    $params = array('parent' => $parent, 'postBody' => $postBody);
    $params = array_merge($params, $optParams);
    return $this->call('create', array($params), "Google_Service_CloudKMS_CryptoKey");
  }
  /**
   * Decrypts data that was protected by Encrypt. (cryptoKeys.decrypt)
   *
   * @param string $name Required. The resource name of the CryptoKey to use for
   * decryption. The server will choose the appropriate version.
   * @param Google_Service_CloudKMS_DecryptRequest $postBody
   * @param array $optParams Optional parameters.
   * @return Google_Service_CloudKMS_DecryptResponse
   */
  public function decrypt($name, Google_Service_CloudKMS_DecryptRequest $postBody, $optParams = array())
  {
    $params = array('name' => $name, 'postBody' => $postBody);
    $params = array_merge($params, $optParams);
    return $this->call('decrypt', array($params), "Google_Service_CloudKMS_DecryptResponse");
  }
  /**
   * Encrypts data, so that it can only be recovered by a call to Decrypt.
   * (cryptoKeys.encrypt)
   *
   * @param string $name Required. The resource name of the CryptoKey or
   * CryptoKeyVersion to use for encryption.
   *
   * If a CryptoKey is specified, the server will use its primary version.
   * @param Google_Service_CloudKMS_EncryptRequest $postBody
   * @param array $optParams Optional parameters.
   * @return Google_Service_CloudKMS_EncryptResponse
   */
  public function encrypt($name, Google_Service_CloudKMS_EncryptRequest $postBody, $optParams = array())
  {
    $params = array('name' => $name, 'postBody' => $postBody);
    $params = array_merge($params, $optParams);
    return $this->call('encrypt', array($params), "Google_Service_CloudKMS_EncryptResponse");
  }
  /**
   * Returns metadata for a given CryptoKey, as well as its primary
   * CryptoKeyVersion. (cryptoKeys.get)
   *
   * @param string $name The name of the CryptoKey to get.
   * @param array $optParams Optional parameters.
   * @return Google_Service_CloudKMS_CryptoKey
   */
  public function get($name, $optParams = array())
  {
    $params = array('name' => $name);
    $params = array_merge($params, $optParams);
    return $this->call('get', array($params), "Google_Service_CloudKMS_CryptoKey");
  }
  /**
   * Gets the access control policy for a resource. Returns an empty policy if the
   * resource exists and does not have a policy set. (cryptoKeys.getIamPolicy)
   *
   * @param string $resource REQUIRED: The resource for which the policy is being
   * requested. See the operation documentation for the appropriate value for this
   * field.
   * @param array $optParams Optional parameters.
   * @return Google_Service_CloudKMS_Policy
   */
  public function getIamPolicy($resource, $optParams = array())
  {
    $params = array('resource' => $resource);
    $params = array_merge($params, $optParams);
    return $this->call('getIamPolicy', array($params), "Google_Service_CloudKMS_Policy");
  }
  /**
   * Lists CryptoKeys. (cryptoKeys.listProjectsLocationsKeyRingsCryptoKeys)
   *
   * @param string $parent Required. The resource name of the KeyRing to list, in
   * the format `projects/locations/keyRings`.
   * @param array $optParams Optional parameters.
   *
   * @opt_param int pageSize Optional limit on the number of CryptoKeys to include
   * in the response.  Further CryptoKeys can subsequently be obtained by
   * including the ListCryptoKeysResponse.next_page_token in a subsequent request.
   * If unspecified, the server will pick an appropriate default.
   * @opt_param string pageToken Optional pagination token, returned earlier via
   * ListCryptoKeysResponse.next_page_token.
   * @return Google_Service_CloudKMS_ListCryptoKeysResponse
   */
  public function listProjectsLocationsKeyRingsCryptoKeys($parent, $optParams = array())
  {
    $params = array('parent' => $parent);
    $params = array_merge($params, $optParams);
    return $this->call('list', array($params), "Google_Service_CloudKMS_ListCryptoKeysResponse");
  }
  /**
   * Update a CryptoKey. (cryptoKeys.patch)
   *
   * @param string $name Output only. The resource name for this CryptoKey in the
   * format `projects/locations/keyRings/cryptoKeys`.
   * @param Google_Service_CloudKMS_CryptoKey $postBody
   * @param array $optParams Optional parameters.
   *
   * @opt_param string updateMask Required list of fields to be updated in this
   * request.
   * @return Google_Service_CloudKMS_CryptoKey
   */
  public function patch($name, Google_Service_CloudKMS_CryptoKey $postBody, $optParams = array())
  {
    $params = array('name' => $name, 'postBody' => $postBody);
    $params = array_merge($params, $optParams);
    return $this->call('patch', array($params), "Google_Service_CloudKMS_CryptoKey");
  }
  /**
   * Sets the access control policy on the specified resource. Replaces any
   * existing policy. (cryptoKeys.setIamPolicy)
   *
   * @param string $resource REQUIRED: The resource for which the policy is being
   * specified. See the operation documentation for the appropriate value for this
   * field.
   * @param Google_Service_CloudKMS_SetIamPolicyRequest $postBody
   * @param array $optParams Optional parameters.
   * @return Google_Service_CloudKMS_Policy
   */
  public function setIamPolicy($resource, Google_Service_CloudKMS_SetIamPolicyRequest $postBody, $optParams = array())
  {
    $params = array('resource' => $resource, 'postBody' => $postBody);
    $params = array_merge($params, $optParams);
    return $this->call('setIamPolicy', array($params), "Google_Service_CloudKMS_Policy");
  }
  /**
   * Returns permissions that a caller has on the specified resource. If the
   * resource does not exist, this will return an empty set of permissions, not a
   * NOT_FOUND error.
   *
   * Note: This operation is designed to be used for building permission-aware UIs
   * and command-line tools, not for authorization checking. This operation may
   * "fail open" without warning. (cryptoKeys.testIamPermissions)
   *
   * @param string $resource REQUIRED: The resource for which the policy detail is
   * being requested. See the operation documentation for the appropriate value
   * for this field.
   * @param Google_Service_CloudKMS_TestIamPermissionsRequest $postBody
   * @param array $optParams Optional parameters.
   * @return Google_Service_CloudKMS_TestIamPermissionsResponse
   */
  public function testIamPermissions($resource, Google_Service_CloudKMS_TestIamPermissionsRequest $postBody, $optParams = array())
  {
    $params = array('resource' => $resource, 'postBody' => $postBody);
    $params = array_merge($params, $optParams);
    return $this->call('testIamPermissions', array($params), "Google_Service_CloudKMS_TestIamPermissionsResponse");
  }
  /**
   * Update the version of a CryptoKey that will be used in Encrypt
   * (cryptoKeys.updatePrimaryVersion)
   *
   * @param string $name The resource name of the CryptoKey to update.
   * @param Google_Service_CloudKMS_UpdateCryptoKeyPrimaryVersionRequest $postBody
   * @param array $optParams Optional parameters.
   * @return Google_Service_CloudKMS_CryptoKey
   */
  public function updatePrimaryVersion($name, Google_Service_CloudKMS_UpdateCryptoKeyPrimaryVersionRequest $postBody, $optParams = array())
  {
    $params = array('name' => $name, 'postBody' => $postBody);
    $params = array_merge($params, $optParams);
    return $this->call('updatePrimaryVersion', array($params), "Google_Service_CloudKMS_CryptoKey");
  }
}
