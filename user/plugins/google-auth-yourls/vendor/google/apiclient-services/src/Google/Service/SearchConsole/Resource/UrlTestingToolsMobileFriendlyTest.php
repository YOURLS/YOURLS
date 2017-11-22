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
 * The "mobileFriendlyTest" collection of methods.
 * Typical usage is:
 *  <code>
 *   $searchconsoleService = new Google_Service_SearchConsole(...);
 *   $mobileFriendlyTest = $searchconsoleService->mobileFriendlyTest;
 *  </code>
 */
class Google_Service_SearchConsole_Resource_UrlTestingToolsMobileFriendlyTest extends Google_Service_Resource
{
  /**
   * Runs Mobile-Friendly Test for a given URL. (mobileFriendlyTest.run)
   *
   * @param Google_Service_SearchConsole_RunMobileFriendlyTestRequest $postBody
   * @param array $optParams Optional parameters.
   * @return Google_Service_SearchConsole_RunMobileFriendlyTestResponse
   */
  public function run(Google_Service_SearchConsole_RunMobileFriendlyTestRequest $postBody, $optParams = array())
  {
    $params = array('postBody' => $postBody);
    $params = array_merge($params, $optParams);
    return $this->call('run', array($params), "Google_Service_SearchConsole_RunMobileFriendlyTestResponse");
  }
}
