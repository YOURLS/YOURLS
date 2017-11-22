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
 * The "dataSource" collection of methods.
 * Typical usage is:
 *  <code>
 *   $dlpService = new Google_Service_DLP(...);
 *   $dataSource = $dlpService->dataSource;
 *  </code>
 */
class Google_Service_DLP_Resource_DataSource extends Google_Service_Resource
{
  /**
   * Schedules a job to compute risk analysis metrics over content in a Google
   * Cloud Platform repository. (dataSource.analyze)
   *
   * @param Google_Service_DLP_GooglePrivacyDlpV2beta1AnalyzeDataSourceRiskRequest $postBody
   * @param array $optParams Optional parameters.
   * @return Google_Service_DLP_GoogleLongrunningOperation
   */
  public function analyze(Google_Service_DLP_GooglePrivacyDlpV2beta1AnalyzeDataSourceRiskRequest $postBody, $optParams = array())
  {
    $params = array('postBody' => $postBody);
    $params = array_merge($params, $optParams);
    return $this->call('analyze', array($params), "Google_Service_DLP_GoogleLongrunningOperation");
  }
}
