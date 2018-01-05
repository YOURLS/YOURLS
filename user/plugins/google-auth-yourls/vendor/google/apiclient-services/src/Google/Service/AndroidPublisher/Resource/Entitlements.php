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
 * The "entitlements" collection of methods.
 * Typical usage is:
 *  <code>
 *   $androidpublisherService = new Google_Service_AndroidPublisher(...);
 *   $entitlements = $androidpublisherService->entitlements;
 *  </code>
 */
class Google_Service_AndroidPublisher_Resource_Entitlements extends Google_Service_Resource
{
  /**
   * Lists the user's current inapp item or subscription entitlements
   * (entitlements.listEntitlements)
   *
   * @param string $packageName The package name of the application the inapp
   * product was sold in (for example, 'com.some.thing').
   * @param array $optParams Optional parameters.
   *
   * @opt_param string maxResults
   * @opt_param string productId The product id of the inapp product (for example,
   * 'sku1'). This can be used to restrict the result set.
   * @opt_param string startIndex
   * @opt_param string token
   * @return Google_Service_AndroidPublisher_EntitlementsListResponse
   */
  public function listEntitlements($packageName, $optParams = array())
  {
    $params = array('packageName' => $packageName);
    $params = array_merge($params, $optParams);
    return $this->call('list', array($params), "Google_Service_AndroidPublisher_EntitlementsListResponse");
  }
}
