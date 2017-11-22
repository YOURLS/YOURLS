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
 * The "projects" collection of methods.
 * Typical usage is:
 *  <code>
 *   $cloudbillingService = new Google_Service_Cloudbilling(...);
 *   $projects = $cloudbillingService->projects;
 *  </code>
 */
class Google_Service_Cloudbilling_Resource_BillingAccountsProjects extends Google_Service_Resource
{
  /**
   * Lists the projects associated with a billing account. The current
   * authenticated user must be an [owner of the billing
   * account](https://support.google.com/cloud/answer/4430947).
   * (projects.listBillingAccountsProjects)
   *
   * @param string $name The resource name of the billing account associated with
   * the projects that you want to list. For example,
   * `billingAccounts/012345-567890-ABCDEF`.
   * @param array $optParams Optional parameters.
   *
   * @opt_param int pageSize Requested page size. The maximum page size is 100;
   * this is also the default.
   * @opt_param string pageToken A token identifying a page of results to be
   * returned. This should be a `next_page_token` value returned from a previous
   * `ListProjectBillingInfo` call. If unspecified, the first page of results is
   * returned.
   * @return Google_Service_Cloudbilling_ListProjectBillingInfoResponse
   */
  public function listBillingAccountsProjects($name, $optParams = array())
  {
    $params = array('name' => $name);
    $params = array_merge($params, $optParams);
    return $this->call('list', array($params), "Google_Service_Cloudbilling_ListProjectBillingInfoResponse");
  }
}
