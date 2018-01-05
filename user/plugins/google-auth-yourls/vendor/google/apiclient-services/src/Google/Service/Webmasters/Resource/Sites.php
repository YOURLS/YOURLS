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
 *   $webmastersService = new Google_Service_Webmasters(...);
 *   $sites = $webmastersService->sites;
 *  </code>
 */
class Google_Service_Webmasters_Resource_Sites extends Google_Service_Resource
{
  /**
   * Adds a site to the set of the user's sites in Search Console. (sites.add)
   *
   * @param string $siteUrl The URL of the site to add.
   * @param array $optParams Optional parameters.
   */
  public function add($siteUrl, $optParams = array())
  {
    $params = array('siteUrl' => $siteUrl);
    $params = array_merge($params, $optParams);
    return $this->call('add', array($params));
  }
  /**
   * Removes a site from the set of the user's Search Console sites.
   * (sites.delete)
   *
   * @param string $siteUrl The URI of the property as defined in Search Console.
   * Examples: http://www.example.com/ or android-app://com.example/
   * @param array $optParams Optional parameters.
   */
  public function delete($siteUrl, $optParams = array())
  {
    $params = array('siteUrl' => $siteUrl);
    $params = array_merge($params, $optParams);
    return $this->call('delete', array($params));
  }
  /**
   * Retrieves information about specific site. (sites.get)
   *
   * @param string $siteUrl The URI of the property as defined in Search Console.
   * Examples: http://www.example.com/ or android-app://com.example/
   * @param array $optParams Optional parameters.
   * @return Google_Service_Webmasters_WmxSite
   */
  public function get($siteUrl, $optParams = array())
  {
    $params = array('siteUrl' => $siteUrl);
    $params = array_merge($params, $optParams);
    return $this->call('get', array($params), "Google_Service_Webmasters_WmxSite");
  }
  /**
   * Lists the user's Search Console sites. (sites.listSites)
   *
   * @param array $optParams Optional parameters.
   * @return Google_Service_Webmasters_SitesListResponse
   */
  public function listSites($optParams = array())
  {
    $params = array();
    $params = array_merge($params, $optParams);
    return $this->call('list', array($params), "Google_Service_Webmasters_SitesListResponse");
  }
}
