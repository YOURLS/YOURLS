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
 * The "testEnvironmentCatalog" collection of methods.
 * Typical usage is:
 *  <code>
 *   $testingService = new Google_Service_Testing(...);
 *   $testEnvironmentCatalog = $testingService->testEnvironmentCatalog;
 *  </code>
 */
class Google_Service_Testing_Resource_TestEnvironmentCatalog extends Google_Service_Resource
{
  /**
   * Get the catalog of supported test environments.
   *
   * May return any of the following canonical error codes:
   *
   * - INVALID_ARGUMENT - if the request is malformed - NOT_FOUND - if the
   * environment type does not exist - INTERNAL - if an internal error occurred
   * (testEnvironmentCatalog.get)
   *
   * @param string $environmentType The type of environment that should be listed.
   * Required
   * @param array $optParams Optional parameters.
   *
   * @opt_param string projectId For authorization, the cloud project requesting
   * the TestEnvironmentCatalog. Optional
   * @return Google_Service_Testing_TestEnvironmentCatalog
   */
  public function get($environmentType, $optParams = array())
  {
    $params = array('environmentType' => $environmentType);
    $params = array_merge($params, $optParams);
    return $this->call('get', array($params), "Google_Service_Testing_TestEnvironmentCatalog");
  }
}
