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
 * The "namespaces" collection of methods.
 * Typical usage is:
 *  <code>
 *   $proximitybeaconService = new Google_Service_Proximitybeacon(...);
 *   $namespaces = $proximitybeaconService->namespaces;
 *  </code>
 */
class Google_Service_Proximitybeacon_Resource_Namespaces extends Google_Service_Resource
{
  /**
   * Lists all attachment namespaces owned by your Google Developers Console
   * project. Attachment data associated with a beacon must include a namespaced
   * type, and the namespace must be owned by your project.
   *
   * Authenticate using an [OAuth access
   * token](https://developers.google.com/identity/protocols/OAuth2) from a
   * signed-in user with **viewer**, **Is owner** or **Can edit** permissions in
   * the Google Developers Console project. (namespaces.listNamespaces)
   *
   * @param array $optParams Optional parameters.
   *
   * @opt_param string projectId The project id to list namespaces under.
   * Optional.
   * @return Google_Service_Proximitybeacon_ListNamespacesResponse
   */
  public function listNamespaces($optParams = array())
  {
    $params = array();
    $params = array_merge($params, $optParams);
    return $this->call('list', array($params), "Google_Service_Proximitybeacon_ListNamespacesResponse");
  }
  /**
   * Updates the information about the specified namespace. Only the namespace
   * visibility can be updated. (namespaces.update)
   *
   * @param string $namespaceName Resource name of this namespace. Namespaces
   * names have the format: namespaces/namespace.
   * @param Google_Service_Proximitybeacon_ProximitybeaconNamespace $postBody
   * @param array $optParams Optional parameters.
   *
   * @opt_param string projectId The project id of the namespace to update. If the
   * project id is not specified then the project making the request is used. The
   * project id must match the project that owns the beacon. Optional.
   * @return Google_Service_Proximitybeacon_ProximitybeaconNamespace
   */
  public function update($namespaceName, Google_Service_Proximitybeacon_ProximitybeaconNamespace $postBody, $optParams = array())
  {
    $params = array('namespaceName' => $namespaceName, 'postBody' => $postBody);
    $params = array_merge($params, $optParams);
    return $this->call('update', array($params), "Google_Service_Proximitybeacon_ProximitybeaconNamespace");
  }
}
