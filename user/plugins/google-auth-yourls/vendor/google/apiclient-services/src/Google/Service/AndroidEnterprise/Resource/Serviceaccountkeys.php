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
 * The "serviceaccountkeys" collection of methods.
 * Typical usage is:
 *  <code>
 *   $androidenterpriseService = new Google_Service_AndroidEnterprise(...);
 *   $serviceaccountkeys = $androidenterpriseService->serviceaccountkeys;
 *  </code>
 */
class Google_Service_AndroidEnterprise_Resource_Serviceaccountkeys extends Google_Service_Resource
{
  /**
   * Removes and invalidates the specified credentials for the service account
   * associated with this enterprise. The calling service account must have been
   * retrieved by calling Enterprises.GetServiceAccount and must have been set as
   * the enterprise service account by calling Enterprises.SetAccount.
   * (serviceaccountkeys.delete)
   *
   * @param string $enterpriseId The ID of the enterprise.
   * @param string $keyId The ID of the key.
   * @param array $optParams Optional parameters.
   */
  public function delete($enterpriseId, $keyId, $optParams = array())
  {
    $params = array('enterpriseId' => $enterpriseId, 'keyId' => $keyId);
    $params = array_merge($params, $optParams);
    return $this->call('delete', array($params));
  }
  /**
   * Generates new credentials for the service account associated with this
   * enterprise. The calling service account must have been retrieved by calling
   * Enterprises.GetServiceAccount and must have been set as the enterprise
   * service account by calling Enterprises.SetAccount.
   *
   * Only the type of the key should be populated in the resource to be inserted.
   * (serviceaccountkeys.insert)
   *
   * @param string $enterpriseId The ID of the enterprise.
   * @param Google_Service_AndroidEnterprise_ServiceAccountKey $postBody
   * @param array $optParams Optional parameters.
   * @return Google_Service_AndroidEnterprise_ServiceAccountKey
   */
  public function insert($enterpriseId, Google_Service_AndroidEnterprise_ServiceAccountKey $postBody, $optParams = array())
  {
    $params = array('enterpriseId' => $enterpriseId, 'postBody' => $postBody);
    $params = array_merge($params, $optParams);
    return $this->call('insert', array($params), "Google_Service_AndroidEnterprise_ServiceAccountKey");
  }
  /**
   * Lists all active credentials for the service account associated with this
   * enterprise. Only the ID and key type are returned. The calling service
   * account must have been retrieved by calling Enterprises.GetServiceAccount and
   * must have been set as the enterprise service account by calling
   * Enterprises.SetAccount. (serviceaccountkeys.listServiceaccountkeys)
   *
   * @param string $enterpriseId The ID of the enterprise.
   * @param array $optParams Optional parameters.
   * @return Google_Service_AndroidEnterprise_ServiceAccountKeysListResponse
   */
  public function listServiceaccountkeys($enterpriseId, $optParams = array())
  {
    $params = array('enterpriseId' => $enterpriseId);
    $params = array_merge($params, $optParams);
    return $this->call('list', array($params), "Google_Service_AndroidEnterprise_ServiceAccountKeysListResponse");
  }
}
