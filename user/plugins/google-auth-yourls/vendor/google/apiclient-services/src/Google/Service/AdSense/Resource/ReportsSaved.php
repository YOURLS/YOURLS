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
 * The "saved" collection of methods.
 * Typical usage is:
 *  <code>
 *   $adsenseService = new Google_Service_AdSense(...);
 *   $saved = $adsenseService->saved;
 *  </code>
 */
class Google_Service_AdSense_Resource_ReportsSaved extends Google_Service_Resource
{
  /**
   * Generate an AdSense report based on the saved report ID sent in the query
   * parameters. (saved.generate)
   *
   * @param string $savedReportId The saved report to retrieve.
   * @param array $optParams Optional parameters.
   *
   * @opt_param string locale Optional locale to use for translating report output
   * to a local language. Defaults to "en_US" if not specified.
   * @opt_param int maxResults The maximum number of rows of report data to
   * return.
   * @opt_param int startIndex Index of the first row of report data to return.
   * @return Google_Service_AdSense_AdsenseReportsGenerateResponse
   */
  public function generate($savedReportId, $optParams = array())
  {
    $params = array('savedReportId' => $savedReportId);
    $params = array_merge($params, $optParams);
    return $this->call('generate', array($params), "Google_Service_AdSense_AdsenseReportsGenerateResponse");
  }
  /**
   * List all saved reports in this AdSense account. (saved.listReportsSaved)
   *
   * @param array $optParams Optional parameters.
   *
   * @opt_param int maxResults The maximum number of saved reports to include in
   * the response, used for paging.
   * @opt_param string pageToken A continuation token, used to page through saved
   * reports. To retrieve the next page, set this parameter to the value of
   * "nextPageToken" from the previous response.
   * @return Google_Service_AdSense_SavedReports
   */
  public function listReportsSaved($optParams = array())
  {
    $params = array();
    $params = array_merge($params, $optParams);
    return $this->call('list', array($params), "Google_Service_AdSense_SavedReports");
  }
}
