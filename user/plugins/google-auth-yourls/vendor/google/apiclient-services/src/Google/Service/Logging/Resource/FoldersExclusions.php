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
 * The "exclusions" collection of methods.
 * Typical usage is:
 *  <code>
 *   $loggingService = new Google_Service_Logging(...);
 *   $exclusions = $loggingService->exclusions;
 *  </code>
 */
class Google_Service_Logging_Resource_FoldersExclusions extends Google_Service_Resource
{
  /**
   * Creates a new exclusion in a specified parent resource. Only log entries
   * belonging to that resource can be excluded. You can have up to 10 exclusions
   * in a resource. (exclusions.create)
   *
   * @param string $parent Required. The parent resource in which to create the
   * exclusion: "projects/[PROJECT_ID]" "organizations/[ORGANIZATION_ID]"
   * "billingAccounts/[BILLING_ACCOUNT_ID]" "folders/[FOLDER_ID]" Examples:
   * "projects/my-logging-project", "organizations/123456789".
   * @param Google_Service_Logging_LogExclusion $postBody
   * @param array $optParams Optional parameters.
   * @return Google_Service_Logging_LogExclusion
   */
  public function create($parent, Google_Service_Logging_LogExclusion $postBody, $optParams = array())
  {
    $params = array('parent' => $parent, 'postBody' => $postBody);
    $params = array_merge($params, $optParams);
    return $this->call('create', array($params), "Google_Service_Logging_LogExclusion");
  }
  /**
   * Deletes an exclusion. (exclusions.delete)
   *
   * @param string $name Required. The resource name of an existing exclusion to
   * delete: "projects/[PROJECT_ID]/exclusions/[EXCLUSION_ID]"
   * "organizations/[ORGANIZATION_ID]/exclusions/[EXCLUSION_ID]"
   * "billingAccounts/[BILLING_ACCOUNT_ID]/exclusions/[EXCLUSION_ID]"
   * "folders/[FOLDER_ID]/exclusions/[EXCLUSION_ID]" Example: "projects/my-
   * project-id/exclusions/my-exclusion-id".
   * @param array $optParams Optional parameters.
   * @return Google_Service_Logging_LoggingEmpty
   */
  public function delete($name, $optParams = array())
  {
    $params = array('name' => $name);
    $params = array_merge($params, $optParams);
    return $this->call('delete', array($params), "Google_Service_Logging_LoggingEmpty");
  }
  /**
   * Gets the description of an exclusion. (exclusions.get)
   *
   * @param string $name Required. The resource name of an existing exclusion:
   * "projects/[PROJECT_ID]/exclusions/[EXCLUSION_ID]"
   * "organizations/[ORGANIZATION_ID]/exclusions/[EXCLUSION_ID]"
   * "billingAccounts/[BILLING_ACCOUNT_ID]/exclusions/[EXCLUSION_ID]"
   * "folders/[FOLDER_ID]/exclusions/[EXCLUSION_ID]" Example: "projects/my-
   * project-id/exclusions/my-exclusion-id".
   * @param array $optParams Optional parameters.
   * @return Google_Service_Logging_LogExclusion
   */
  public function get($name, $optParams = array())
  {
    $params = array('name' => $name);
    $params = array_merge($params, $optParams);
    return $this->call('get', array($params), "Google_Service_Logging_LogExclusion");
  }
  /**
   * Lists all the exclusions in a parent resource.
   * (exclusions.listFoldersExclusions)
   *
   * @param string $parent Required. The parent resource whose exclusions are to
   * be listed. "projects/[PROJECT_ID]" "organizations/[ORGANIZATION_ID]"
   * "billingAccounts/[BILLING_ACCOUNT_ID]" "folders/[FOLDER_ID]"
   * @param array $optParams Optional parameters.
   *
   * @opt_param string pageToken Optional. If present, then retrieve the next
   * batch of results from the preceding call to this method. pageToken must be
   * the value of nextPageToken from the previous response. The values of other
   * method parameters should be identical to those in the previous call.
   * @opt_param int pageSize Optional. The maximum number of results to return
   * from this request. Non-positive values are ignored. The presence of
   * nextPageToken in the response indicates that more results might be available.
   * @return Google_Service_Logging_ListExclusionsResponse
   */
  public function listFoldersExclusions($parent, $optParams = array())
  {
    $params = array('parent' => $parent);
    $params = array_merge($params, $optParams);
    return $this->call('list', array($params), "Google_Service_Logging_ListExclusionsResponse");
  }
  /**
   * Changes one or more properties of an existing exclusion. (exclusions.patch)
   *
   * @param string $name Required. The resource name of the exclusion to update:
   * "projects/[PROJECT_ID]/exclusions/[EXCLUSION_ID]"
   * "organizations/[ORGANIZATION_ID]/exclusions/[EXCLUSION_ID]"
   * "billingAccounts/[BILLING_ACCOUNT_ID]/exclusions/[EXCLUSION_ID]"
   * "folders/[FOLDER_ID]/exclusions/[EXCLUSION_ID]" Example: "projects/my-
   * project-id/exclusions/my-exclusion-id".
   * @param Google_Service_Logging_LogExclusion $postBody
   * @param array $optParams Optional parameters.
   *
   * @opt_param string updateMask Required. A nonempty list of fields to change in
   * the existing exclusion. New values for the fields are taken from the
   * corresponding fields in the LogExclusion included in this request. Fields not
   * mentioned in update_mask are not changed and are ignored in the request.For
   * example, to change the filter and description of an exclusion, specify an
   * update_mask of "filter,description".
   * @return Google_Service_Logging_LogExclusion
   */
  public function patch($name, Google_Service_Logging_LogExclusion $postBody, $optParams = array())
  {
    $params = array('name' => $name, 'postBody' => $postBody);
    $params = array_merge($params, $optParams);
    return $this->call('patch', array($params), "Google_Service_Logging_LogExclusion");
  }
}
