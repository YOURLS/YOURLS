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
 * The "findings" collection of methods.
 * Typical usage is:
 *  <code>
 *   $dlpService = new Google_Service_DLP(...);
 *   $findings = $dlpService->findings;
 *  </code>
 */
class Google_Service_DLP_Resource_InspectResultsFindings extends Google_Service_Resource
{
  /**
   * Returns list of results for given inspect operation result set id.
   * (findings.listInspectResultsFindings)
   *
   * @param string $name Identifier of the results set returned as metadata of the
   * longrunning operation created by a call to InspectDataSource. Should be in
   * the format of `inspect/results/{id}`.
   * @param array $optParams Optional parameters.
   *
   * @opt_param string filter Restricts findings to items that match. Supports
   * info_type and likelihood.
   *
   * Examples:
   *
   * - info_type=EMAIL_ADDRESS - info_type=PHONE_NUMBER,EMAIL_ADDRESS -
   * likelihood=VERY_LIKELY - likelihood=VERY_LIKELY,LIKELY -
   * info_type=EMAIL_ADDRESS,likelihood=VERY_LIKELY,LIKELY
   * @opt_param string pageToken The value returned by the last
   * `ListInspectFindingsResponse`; indicates that this is a continuation of a
   * prior `ListInspectFindings` call, and that the system should return the next
   * page of data.
   * @opt_param int pageSize Maximum number of results to return. If 0, the
   * implementation selects a reasonable value.
   * @return Google_Service_DLP_GooglePrivacyDlpV2beta1ListInspectFindingsResponse
   */
  public function listInspectResultsFindings($name, $optParams = array())
  {
    $params = array('name' => $name);
    $params = array_merge($params, $optParams);
    return $this->call('list', array($params), "Google_Service_DLP_GooglePrivacyDlpV2beta1ListInspectFindingsResponse");
  }
}
