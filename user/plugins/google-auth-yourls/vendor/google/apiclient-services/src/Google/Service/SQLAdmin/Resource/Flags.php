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
 * The "flags" collection of methods.
 * Typical usage is:
 *  <code>
 *   $sqladminService = new Google_Service_SQLAdmin(...);
 *   $flags = $sqladminService->flags;
 *  </code>
 */
class Google_Service_SQLAdmin_Resource_Flags extends Google_Service_Resource
{
  /**
   * List all available database flags for Google Cloud SQL instances.
   * (flags.listFlags)
   *
   * @param array $optParams Optional parameters.
   *
   * @opt_param string databaseVersion Database version for flag retrieval. Flags
   * are specific to the database version.
   * @return Google_Service_SQLAdmin_FlagsListResponse
   */
  public function listFlags($optParams = array())
  {
    $params = array();
    $params = array_merge($params, $optParams);
    return $this->call('list', array($params), "Google_Service_SQLAdmin_FlagsListResponse");
  }
}
