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
 * The "urlcrawlerrorssamples" collection of methods.
 * Typical usage is:
 *  <code>
 *   $webmastersService = new Google_Service_Webmasters(...);
 *   $urlcrawlerrorssamples = $webmastersService->urlcrawlerrorssamples;
 *  </code>
 */
class Google_Service_Webmasters_Resource_Urlcrawlerrorssamples extends Google_Service_Resource
{
  /**
   * Retrieves details about crawl errors for a site's sample URL.
   * (urlcrawlerrorssamples.get)
   *
   * @param string $siteUrl The site's URL, including protocol. For example:
   * http://www.example.com/
   * @param string $url The relative path (without the site) of the sample URL. It
   * must be one of the URLs returned by list(). For example, for the URL
   * https://www.example.com/pagename on the site https://www.example.com/, the
   * url value is pagename
   * @param string $category The crawl error category. For example:
   * authPermissions
   * @param string $platform The user agent type (platform) that made the request.
   * For example: web
   * @param array $optParams Optional parameters.
   * @return Google_Service_Webmasters_UrlCrawlErrorsSample
   */
  public function get($siteUrl, $url, $category, $platform, $optParams = array())
  {
    $params = array('siteUrl' => $siteUrl, 'url' => $url, 'category' => $category, 'platform' => $platform);
    $params = array_merge($params, $optParams);
    return $this->call('get', array($params), "Google_Service_Webmasters_UrlCrawlErrorsSample");
  }
  /**
   * Lists a site's sample URLs for the specified crawl error category and
   * platform. (urlcrawlerrorssamples.listUrlcrawlerrorssamples)
   *
   * @param string $siteUrl The site's URL, including protocol. For example:
   * http://www.example.com/
   * @param string $category The crawl error category. For example:
   * authPermissions
   * @param string $platform The user agent type (platform) that made the request.
   * For example: web
   * @param array $optParams Optional parameters.
   * @return Google_Service_Webmasters_UrlCrawlErrorsSamplesListResponse
   */
  public function listUrlcrawlerrorssamples($siteUrl, $category, $platform, $optParams = array())
  {
    $params = array('siteUrl' => $siteUrl, 'category' => $category, 'platform' => $platform);
    $params = array_merge($params, $optParams);
    return $this->call('list', array($params), "Google_Service_Webmasters_UrlCrawlErrorsSamplesListResponse");
  }
  /**
   * Marks the provided site's sample URL as fixed, and removes it from the
   * samples list. (urlcrawlerrorssamples.markAsFixed)
   *
   * @param string $siteUrl The site's URL, including protocol. For example:
   * http://www.example.com/
   * @param string $url The relative path (without the site) of the sample URL. It
   * must be one of the URLs returned by list(). For example, for the URL
   * https://www.example.com/pagename on the site https://www.example.com/, the
   * url value is pagename
   * @param string $category The crawl error category. For example:
   * authPermissions
   * @param string $platform The user agent type (platform) that made the request.
   * For example: web
   * @param array $optParams Optional parameters.
   */
  public function markAsFixed($siteUrl, $url, $category, $platform, $optParams = array())
  {
    $params = array('siteUrl' => $siteUrl, 'url' => $url, 'category' => $category, 'platform' => $platform);
    $params = array_merge($params, $optParams);
    return $this->call('markAsFixed', array($params));
  }
}
