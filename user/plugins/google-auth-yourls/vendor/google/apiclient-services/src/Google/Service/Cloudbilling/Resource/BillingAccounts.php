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
 * The "billingAccounts" collection of methods.
 * Typical usage is:
 *  <code>
 *   $cloudbillingService = new Google_Service_Cloudbilling(...);
 *   $billingAccounts = $cloudbillingService->billingAccounts;
 *  </code>
 */
class Google_Service_Cloudbilling_Resource_BillingAccounts extends Google_Service_Resource
{
  /**
   * Gets information about a billing account. The current authenticated user must
   * be an [owner of the billing
   * account](https://support.google.com/cloud/answer/4430947).
   * (billingAccounts.get)
   *
   * @param string $name The resource name of the billing account to retrieve. For
   * example, `billingAccounts/012345-567890-ABCDEF`.
   * @param array $optParams Optional parameters.
   * @return Google_Service_Cloudbilling_BillingAccount
   */
  public function get($name, $optParams = array())
  {
    $params = array('name' => $name);
    $params = array_merge($params, $optParams);
    return $this->call('get', array($params), "Google_Service_Cloudbilling_BillingAccount");
  }
  /**
   * Lists the billing accounts that the current authenticated user
   * [owns](https://support.google.com/cloud/answer/4430947).
   * (billingAccounts.listBillingAccounts)
   *
   * @param array $optParams Optional parameters.
   *
   * @opt_param int pageSize Requested page size. The maximum page size is 100;
   * this is also the default.
   * @opt_param string pageToken A token identifying a page of results to return.
   * This should be a `next_page_token` value returned from a previous
   * `ListBillingAccounts` call. If unspecified, the first page of results is
   * returned.
   * @return Google_Service_Cloudbilling_ListBillingAccountsResponse
   */
  public function listBillingAccounts($optParams = array())
  {
    $params = array();
    $params = array_merge($params, $optParams);
    return $this->call('list', array($params), "Google_Service_Cloudbilling_ListBillingAccountsResponse");
  }
}
