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
 * The "entries" collection of methods.
 * Typical usage is:
 *  <code>
 *   $loggingService = new Google_Service_Logging(...);
 *   $entries = $loggingService->entries;
 *  </code>
 */
class Google_Service_Logging_Resource_Entries extends Google_Service_Resource
{
  /**
   * Lists log entries. Use this method to retrieve log entries from Stackdriver
   * Logging. For ways to export log entries, see Exporting Logs.
   * (entries.listEntries)
   *
   * @param Google_Service_Logging_ListLogEntriesRequest $postBody
   * @param array $optParams Optional parameters.
   * @return Google_Service_Logging_ListLogEntriesResponse
   */
  public function listEntries(Google_Service_Logging_ListLogEntriesRequest $postBody, $optParams = array())
  {
    $params = array('postBody' => $postBody);
    $params = array_merge($params, $optParams);
    return $this->call('list', array($params), "Google_Service_Logging_ListLogEntriesResponse");
  }
  /**
   * Log entry resourcesWrites log entries to Stackdriver Logging. This API method
   * is the only way to send log entries to Stackdriver Logging. This method is
   * used, directly or indirectly, by the Stackdriver Logging agent (fluentd) and
   * all logging libraries configured to use Stackdriver Logging. (entries.write)
   *
   * @param Google_Service_Logging_WriteLogEntriesRequest $postBody
   * @param array $optParams Optional parameters.
   * @return Google_Service_Logging_WriteLogEntriesResponse
   */
  public function write(Google_Service_Logging_WriteLogEntriesRequest $postBody, $optParams = array())
  {
    $params = array('postBody' => $postBody);
    $params = array_merge($params, $optParams);
    return $this->call('write', array($params), "Google_Service_Logging_WriteLogEntriesResponse");
  }
}
