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
 * The "grouplicenses" collection of methods.
 * Typical usage is:
 *  <code>
 *   $androidenterpriseService = new Google_Service_AndroidEnterprise(...);
 *   $grouplicenses = $androidenterpriseService->grouplicenses;
 *  </code>
 */
class Google_Service_AndroidEnterprise_Resource_Grouplicenses extends Google_Service_Resource
{
  /**
   * Retrieves details of an enterprise's group license for a product.
   * (grouplicenses.get)
   *
   * @param string $enterpriseId The ID of the enterprise.
   * @param string $groupLicenseId The ID of the product the group license is for,
   * e.g. "app:com.google.android.gm".
   * @param array $optParams Optional parameters.
   * @return Google_Service_AndroidEnterprise_GroupLicense
   */
  public function get($enterpriseId, $groupLicenseId, $optParams = array())
  {
    $params = array('enterpriseId' => $enterpriseId, 'groupLicenseId' => $groupLicenseId);
    $params = array_merge($params, $optParams);
    return $this->call('get', array($params), "Google_Service_AndroidEnterprise_GroupLicense");
  }
  /**
   * Retrieves IDs of all products for which the enterprise has a group license.
   * (grouplicenses.listGrouplicenses)
   *
   * @param string $enterpriseId The ID of the enterprise.
   * @param array $optParams Optional parameters.
   * @return Google_Service_AndroidEnterprise_GroupLicensesListResponse
   */
  public function listGrouplicenses($enterpriseId, $optParams = array())
  {
    $params = array('enterpriseId' => $enterpriseId);
    $params = array_merge($params, $optParams);
    return $this->call('list', array($params), "Google_Service_AndroidEnterprise_GroupLicensesListResponse");
  }
}
