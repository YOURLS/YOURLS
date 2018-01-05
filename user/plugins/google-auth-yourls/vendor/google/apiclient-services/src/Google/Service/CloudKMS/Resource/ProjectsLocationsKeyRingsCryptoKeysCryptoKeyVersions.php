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
 * The "cryptoKeyVersions" collection of methods.
 * Typical usage is:
 *  <code>
 *   $cloudkmsService = new Google_Service_CloudKMS(...);
 *   $cryptoKeyVersions = $cloudkmsService->cryptoKeyVersions;
 *  </code>
 */
class Google_Service_CloudKMS_Resource_ProjectsLocationsKeyRingsCryptoKeysCryptoKeyVersions extends Google_Service_Resource
{
  /**
   * Create a new CryptoKeyVersion in a CryptoKey.
   *
   * The server will assign the next sequential id. If unset, state will be set to
   * ENABLED. (cryptoKeyVersions.create)
   *
   * @param string $parent Required. The name of the CryptoKey associated with the
   * CryptoKeyVersions.
   * @param Google_Service_CloudKMS_CryptoKeyVersion $postBody
   * @param array $optParams Optional parameters.
   * @return Google_Service_CloudKMS_CryptoKeyVersion
   */
  public function create($parent, Google_Service_CloudKMS_CryptoKeyVersion $postBody, $optParams = array())
  {
    $params = array('parent' => $parent, 'postBody' => $postBody);
    $params = array_merge($params, $optParams);
    return $this->call('create', array($params), "Google_Service_CloudKMS_CryptoKeyVersion");
  }
  /**
   * Schedule a CryptoKeyVersion for destruction.
   *
   * Upon calling this method, CryptoKeyVersion.state will be set to
   * DESTROY_SCHEDULED and destroy_time will be set to a time 24 hours in the
   * future, at which point the state will be changed to DESTROYED, and the key
   * material will be irrevocably destroyed.
   *
   * Before the destroy_time is reached, RestoreCryptoKeyVersion may be called to
   * reverse the process. (cryptoKeyVersions.destroy)
   *
   * @param string $name The resource name of the CryptoKeyVersion to destroy.
   * @param Google_Service_CloudKMS_DestroyCryptoKeyVersionRequest $postBody
   * @param array $optParams Optional parameters.
   * @return Google_Service_CloudKMS_CryptoKeyVersion
   */
  public function destroy($name, Google_Service_CloudKMS_DestroyCryptoKeyVersionRequest $postBody, $optParams = array())
  {
    $params = array('name' => $name, 'postBody' => $postBody);
    $params = array_merge($params, $optParams);
    return $this->call('destroy', array($params), "Google_Service_CloudKMS_CryptoKeyVersion");
  }
  /**
   * Returns metadata for a given CryptoKeyVersion. (cryptoKeyVersions.get)
   *
   * @param string $name The name of the CryptoKeyVersion to get.
   * @param array $optParams Optional parameters.
   * @return Google_Service_CloudKMS_CryptoKeyVersion
   */
  public function get($name, $optParams = array())
  {
    $params = array('name' => $name);
    $params = array_merge($params, $optParams);
    return $this->call('get', array($params), "Google_Service_CloudKMS_CryptoKeyVersion");
  }
  /**
   * Lists CryptoKeyVersions.
   * (cryptoKeyVersions.listProjectsLocationsKeyRingsCryptoKeysCryptoKeyVersions)
   *
   * @param string $parent Required. The resource name of the CryptoKey to list,
   * in the format `projects/locations/keyRings/cryptoKeys`.
   * @param array $optParams Optional parameters.
   *
   * @opt_param int pageSize Optional limit on the number of CryptoKeyVersions to
   * include in the response. Further CryptoKeyVersions can subsequently be
   * obtained by including the ListCryptoKeyVersionsResponse.next_page_token in a
   * subsequent request. If unspecified, the server will pick an appropriate
   * default.
   * @opt_param string pageToken Optional pagination token, returned earlier via
   * ListCryptoKeyVersionsResponse.next_page_token.
   * @return Google_Service_CloudKMS_ListCryptoKeyVersionsResponse
   */
  public function listProjectsLocationsKeyRingsCryptoKeysCryptoKeyVersions($parent, $optParams = array())
  {
    $params = array('parent' => $parent);
    $params = array_merge($params, $optParams);
    return $this->call('list', array($params), "Google_Service_CloudKMS_ListCryptoKeyVersionsResponse");
  }
  /**
   * Update a CryptoKeyVersion's metadata.
   *
   * state may be changed between ENABLED and DISABLED using this method. See
   * DestroyCryptoKeyVersion and RestoreCryptoKeyVersion to move between other
   * states. (cryptoKeyVersions.patch)
   *
   * @param string $name Output only. The resource name for this CryptoKeyVersion
   * in the format `projects/locations/keyRings/cryptoKeys/cryptoKeyVersions`.
   * @param Google_Service_CloudKMS_CryptoKeyVersion $postBody
   * @param array $optParams Optional parameters.
   *
   * @opt_param string updateMask Required list of fields to be updated in this
   * request.
   * @return Google_Service_CloudKMS_CryptoKeyVersion
   */
  public function patch($name, Google_Service_CloudKMS_CryptoKeyVersion $postBody, $optParams = array())
  {
    $params = array('name' => $name, 'postBody' => $postBody);
    $params = array_merge($params, $optParams);
    return $this->call('patch', array($params), "Google_Service_CloudKMS_CryptoKeyVersion");
  }
  /**
   * Restore a CryptoKeyVersion in the DESTROY_SCHEDULED, state.
   *
   * Upon restoration of the CryptoKeyVersion, state will be set to DISABLED, and
   * destroy_time will be cleared. (cryptoKeyVersions.restore)
   *
   * @param string $name The resource name of the CryptoKeyVersion to restore.
   * @param Google_Service_CloudKMS_RestoreCryptoKeyVersionRequest $postBody
   * @param array $optParams Optional parameters.
   * @return Google_Service_CloudKMS_CryptoKeyVersion
   */
  public function restore($name, Google_Service_CloudKMS_RestoreCryptoKeyVersionRequest $postBody, $optParams = array())
  {
    $params = array('name' => $name, 'postBody' => $postBody);
    $params = array_merge($params, $optParams);
    return $this->call('restore', array($params), "Google_Service_CloudKMS_CryptoKeyVersion");
  }
}
