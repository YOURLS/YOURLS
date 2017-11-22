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
 * The "sites" collection of methods.
 * Typical usage is:
 *  <code>
 *   $adexperiencereportService = new Google_Service_AdExperienceReport(...);
 *   $sites = $adexperiencereportService->sites;
 *  </code>
 */
class Google_Service_AdExperienceReport_Resource_Sites extends Google_Service_Resource
{
  /**
   * Gets a summary of the ad experience rating of a site. (sites.get)
   *
   * @param string $name The required site name. It should be the site property
   * whose ad experiences may have been reviewed, and it should be URL-encoded.
   * For example, sites/https%3A%2F%2Fwww.google.com. The server will return an
   * error of BAD_REQUEST if this field is not filled in. Note that if the site
   * property is not yet verified in Search Console, the reportUrl field returned
   * by the API will lead to the verification page, prompting the user to go
   * through that process before they can gain access to the Ad Experience Report.
   * @param array $optParams Optional parameters.
   * @return Google_Service_AdExperienceReport_SiteSummaryResponse
   */
  public function get($name, $optParams = array())
  {
    $params = array('name' => $name);
    $params = array_merge($params, $optParams);
    return $this->call('get', array($params), "Google_Service_AdExperienceReport_SiteSummaryResponse");
  }
}
