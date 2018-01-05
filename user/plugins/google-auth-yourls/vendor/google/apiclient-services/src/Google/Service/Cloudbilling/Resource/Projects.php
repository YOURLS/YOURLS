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
class Google_Service_Cloudbilling_Resource_Projects extends Google_Service_Resource
{
  /**
   * Gets the billing information for a project. The current authenticated user
   * must have [permission to view the project](https://cloud.google.com/docs
   * /permissions-overview#h.bgs0oxofvnoo ). (projects.getBillingInfo)
   *
   * @param string $name The resource name of the project for which billing
   * information is retrieved. For example, `projects/tokyo-rain-123`.
   * @param array $optParams Optional parameters.
   * @return Google_Service_Cloudbilling_ProjectBillingInfo
   */
  public function getBillingInfo($name, $optParams = array())
  {
    $params = array('name' => $name);
    $params = array_merge($params, $optParams);
    return $this->call('getBillingInfo', array($params), "Google_Service_Cloudbilling_ProjectBillingInfo");
  }
  /**
   * Sets or updates the billing account associated with a project. You specify
   * the new billing account by setting the `billing_account_name` in the
   * `ProjectBillingInfo` resource to the resource name of a billing account.
   * Associating a project with an open billing account enables billing on the
   * project and allows charges for resource usage. If the project already had a
   * billing account, this method changes the billing account used for resource
   * usage charges.
   *
   * *Note:* Incurred charges that have not yet been reported in the transaction
   * history of the Google Cloud Console may be billed to the new billing account,
   * even if the charge occurred before the new billing account was assigned to
   * the project.
   *
   * The current authenticated user must have ownership privileges for both the
   * [project](https://cloud.google.com/docs/permissions-overview#h.bgs0oxofvnoo )
   * and the [billing account](https://support.google.com/cloud/answer/4430947).
   *
   * You can disable billing on the project by setting the `billing_account_name`
   * field to empty. This action disassociates the current billing account from
   * the project. Any billable activity of your in-use services will stop, and
   * your application could stop functioning as expected. Any unbilled charges to
   * date will be billed to the previously associated account. The current
   * authenticated user must be either an owner of the project or an owner of the
   * billing account for the project.
   *
   * Note that associating a project with a *closed* billing account will have
   * much the same effect as disabling billing on the project: any paid resources
   * used by the project will be shut down. Thus, unless you wish to disable
   * billing, you should always call this method with the name of an *open*
   * billing account. (projects.updateBillingInfo)
   *
   * @param string $name The resource name of the project associated with the
   * billing information that you want to update. For example, `projects/tokyo-
   * rain-123`.
   * @param Google_Service_Cloudbilling_ProjectBillingInfo $postBody
   * @param array $optParams Optional parameters.
   * @return Google_Service_Cloudbilling_ProjectBillingInfo
   */
  public function updateBillingInfo($name, Google_Service_Cloudbilling_ProjectBillingInfo $postBody, $optParams = array())
  {
    $params = array('name' => $name, 'postBody' => $postBody);
    $params = array_merge($params, $optParams);
    return $this->call('updateBillingInfo', array($params), "Google_Service_Cloudbilling_ProjectBillingInfo");
  }
}
