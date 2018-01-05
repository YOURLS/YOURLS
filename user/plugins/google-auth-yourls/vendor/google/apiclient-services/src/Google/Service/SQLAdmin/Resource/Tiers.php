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
 * The "tiers" collection of methods.
 * Typical usage is:
 *  <code>
 *   $sqladminService = new Google_Service_SQLAdmin(...);
 *   $tiers = $sqladminService->tiers;
 *  </code>
 */
class Google_Service_SQLAdmin_Resource_Tiers extends Google_Service_Resource
{
  /**
   * Lists all available service tiers for Google Cloud SQL, for example D1, D2.
   * For related information, see Pricing. (tiers.listTiers)
   *
   * @param string $project Project ID of the project for which to list tiers.
   * @param array $optParams Optional parameters.
   * @return Google_Service_SQLAdmin_TiersListResponse
   */
  public function listTiers($project, $optParams = array())
  {
    $params = array('project' => $project);
    $params = array_merge($params, $optParams);
    return $this->call('list', array($params), "Google_Service_SQLAdmin_TiersListResponse");
  }
}
