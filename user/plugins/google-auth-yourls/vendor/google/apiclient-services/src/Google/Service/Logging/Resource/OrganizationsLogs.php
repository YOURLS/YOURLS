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
 * The "logs" collection of methods.
 * Typical usage is:
 *  <code>
 *   $loggingService = new Google_Service_Logging(...);
 *   $logs = $loggingService->logs;
 *  </code>
 */
class Google_Service_Logging_Resource_OrganizationsLogs extends Google_Service_Resource
{
  /**
   * Deletes all the log entries in a log. The log reappears if it receives new
   * entries. Log entries written shortly before the delete operation might not be
   * deleted. (logs.delete)
   *
   * @param string $logName Required. The resource name of the log to delete:
   * "projects/[PROJECT_ID]/logs/[LOG_ID]"
   * "organizations/[ORGANIZATION_ID]/logs/[LOG_ID]"
   * "billingAccounts/[BILLING_ACCOUNT_ID]/logs/[LOG_ID]"
   * "folders/[FOLDER_ID]/logs/[LOG_ID]" [LOG_ID] must be URL-encoded. For
   * example, "projects/my-project-id/logs/syslog", "organizations/1234567890/logs
   * /cloudresourcemanager.googleapis.com%2Factivity". For more information about
   * log names, see LogEntry.
   * @param array $optParams Optional parameters.
   * @return Google_Service_Logging_LoggingEmpty
   */
  public function delete($logName, $optParams = array())
  {
    $params = array('logName' => $logName);
    $params = array_merge($params, $optParams);
    return $this->call('delete', array($params), "Google_Service_Logging_LoggingEmpty");
  }
  /**
   * Lists the logs in projects, organizations, folders, or billing accounts. Only
   * logs that have entries are listed. (logs.listOrganizationsLogs)
   *
   * @param string $parent Required. The resource name that owns the logs:
   * "projects/[PROJECT_ID]" "organizations/[ORGANIZATION_ID]"
   * "billingAccounts/[BILLING_ACCOUNT_ID]" "folders/[FOLDER_ID]"
   * @param array $optParams Optional parameters.
   *
   * @opt_param int pageSize Optional. The maximum number of results to return
   * from this request. Non-positive values are ignored. The presence of
   * nextPageToken in the response indicates that more results might be available.
   * @opt_param string pageToken Optional. If present, then retrieve the next
   * batch of results from the preceding call to this method. pageToken must be
   * the value of nextPageToken from the previous response. The values of other
   * method parameters should be identical to those in the previous call.
   * @return Google_Service_Logging_ListLogsResponse
   */
  public function listOrganizationsLogs($parent, $optParams = array())
  {
    $params = array('parent' => $parent);
    $params = array_merge($params, $optParams);
    return $this->call('list', array($params), "Google_Service_Logging_ListLogsResponse");
  }
}
