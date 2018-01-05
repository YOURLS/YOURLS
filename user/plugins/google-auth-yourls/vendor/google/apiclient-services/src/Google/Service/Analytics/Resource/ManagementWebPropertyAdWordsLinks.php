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
 * The "webPropertyAdWordsLinks" collection of methods.
 * Typical usage is:
 *  <code>
 *   $analyticsService = new Google_Service_Analytics(...);
 *   $webPropertyAdWordsLinks = $analyticsService->webPropertyAdWordsLinks;
 *  </code>
 */
class Google_Service_Analytics_Resource_ManagementWebPropertyAdWordsLinks extends Google_Service_Resource
{
  /**
   * Deletes a web property-AdWords link. (webPropertyAdWordsLinks.delete)
   *
   * @param string $accountId ID of the account which the given web property
   * belongs to.
   * @param string $webPropertyId Web property ID to delete the AdWords link for.
   * @param string $webPropertyAdWordsLinkId Web property AdWords link ID.
   * @param array $optParams Optional parameters.
   */
  public function delete($accountId, $webPropertyId, $webPropertyAdWordsLinkId, $optParams = array())
  {
    $params = array('accountId' => $accountId, 'webPropertyId' => $webPropertyId, 'webPropertyAdWordsLinkId' => $webPropertyAdWordsLinkId);
    $params = array_merge($params, $optParams);
    return $this->call('delete', array($params));
  }
  /**
   * Returns a web property-AdWords link to which the user has access.
   * (webPropertyAdWordsLinks.get)
   *
   * @param string $accountId ID of the account which the given web property
   * belongs to.
   * @param string $webPropertyId Web property ID to retrieve the AdWords link
   * for.
   * @param string $webPropertyAdWordsLinkId Web property-AdWords link ID.
   * @param array $optParams Optional parameters.
   * @return Google_Service_Analytics_EntityAdWordsLink
   */
  public function get($accountId, $webPropertyId, $webPropertyAdWordsLinkId, $optParams = array())
  {
    $params = array('accountId' => $accountId, 'webPropertyId' => $webPropertyId, 'webPropertyAdWordsLinkId' => $webPropertyAdWordsLinkId);
    $params = array_merge($params, $optParams);
    return $this->call('get', array($params), "Google_Service_Analytics_EntityAdWordsLink");
  }
  /**
   * Creates a webProperty-AdWords link. (webPropertyAdWordsLinks.insert)
   *
   * @param string $accountId ID of the Google Analytics account to create the
   * link for.
   * @param string $webPropertyId Web property ID to create the link for.
   * @param Google_Service_Analytics_EntityAdWordsLink $postBody
   * @param array $optParams Optional parameters.
   * @return Google_Service_Analytics_EntityAdWordsLink
   */
  public function insert($accountId, $webPropertyId, Google_Service_Analytics_EntityAdWordsLink $postBody, $optParams = array())
  {
    $params = array('accountId' => $accountId, 'webPropertyId' => $webPropertyId, 'postBody' => $postBody);
    $params = array_merge($params, $optParams);
    return $this->call('insert', array($params), "Google_Service_Analytics_EntityAdWordsLink");
  }
  /**
   * Lists webProperty-AdWords links for a given web property.
   * (webPropertyAdWordsLinks.listManagementWebPropertyAdWordsLinks)
   *
   * @param string $accountId ID of the account which the given web property
   * belongs to.
   * @param string $webPropertyId Web property ID to retrieve the AdWords links
   * for.
   * @param array $optParams Optional parameters.
   *
   * @opt_param int max-results The maximum number of webProperty-AdWords links to
   * include in this response.
   * @opt_param int start-index An index of the first webProperty-AdWords link to
   * retrieve. Use this parameter as a pagination mechanism along with the max-
   * results parameter.
   * @return Google_Service_Analytics_EntityAdWordsLinks
   */
  public function listManagementWebPropertyAdWordsLinks($accountId, $webPropertyId, $optParams = array())
  {
    $params = array('accountId' => $accountId, 'webPropertyId' => $webPropertyId);
    $params = array_merge($params, $optParams);
    return $this->call('list', array($params), "Google_Service_Analytics_EntityAdWordsLinks");
  }
  /**
   * Updates an existing webProperty-AdWords link. This method supports patch
   * semantics. (webPropertyAdWordsLinks.patch)
   *
   * @param string $accountId ID of the account which the given web property
   * belongs to.
   * @param string $webPropertyId Web property ID to retrieve the AdWords link
   * for.
   * @param string $webPropertyAdWordsLinkId Web property-AdWords link ID.
   * @param Google_Service_Analytics_EntityAdWordsLink $postBody
   * @param array $optParams Optional parameters.
   * @return Google_Service_Analytics_EntityAdWordsLink
   */
  public function patch($accountId, $webPropertyId, $webPropertyAdWordsLinkId, Google_Service_Analytics_EntityAdWordsLink $postBody, $optParams = array())
  {
    $params = array('accountId' => $accountId, 'webPropertyId' => $webPropertyId, 'webPropertyAdWordsLinkId' => $webPropertyAdWordsLinkId, 'postBody' => $postBody);
    $params = array_merge($params, $optParams);
    return $this->call('patch', array($params), "Google_Service_Analytics_EntityAdWordsLink");
  }
  /**
   * Updates an existing webProperty-AdWords link.
   * (webPropertyAdWordsLinks.update)
   *
   * @param string $accountId ID of the account which the given web property
   * belongs to.
   * @param string $webPropertyId Web property ID to retrieve the AdWords link
   * for.
   * @param string $webPropertyAdWordsLinkId Web property-AdWords link ID.
   * @param Google_Service_Analytics_EntityAdWordsLink $postBody
   * @param array $optParams Optional parameters.
   * @return Google_Service_Analytics_EntityAdWordsLink
   */
  public function update($accountId, $webPropertyId, $webPropertyAdWordsLinkId, Google_Service_Analytics_EntityAdWordsLink $postBody, $optParams = array())
  {
    $params = array('accountId' => $accountId, 'webPropertyId' => $webPropertyId, 'webPropertyAdWordsLinkId' => $webPropertyAdWordsLinkId, 'postBody' => $postBody);
    $params = array_merge($params, $optParams);
    return $this->call('update', array($params), "Google_Service_Analytics_EntityAdWordsLink");
  }
}
