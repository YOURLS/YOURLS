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
 * The "advertiserLandingPages" collection of methods.
 * Typical usage is:
 *  <code>
 *   $dfareportingService = new Google_Service_Dfareporting(...);
 *   $advertiserLandingPages = $dfareportingService->advertiserLandingPages;
 *  </code>
 */
class Google_Service_Dfareporting_Resource_AdvertiserLandingPages extends Google_Service_Resource
{
  /**
   * Gets one landing page by ID. (advertiserLandingPages.get)
   *
   * @param string $profileId User profile ID associated with this request.
   * @param string $id Landing page ID.
   * @param array $optParams Optional parameters.
   * @return Google_Service_Dfareporting_LandingPage
   */
  public function get($profileId, $id, $optParams = array())
  {
    $params = array('profileId' => $profileId, 'id' => $id);
    $params = array_merge($params, $optParams);
    return $this->call('get', array($params), "Google_Service_Dfareporting_LandingPage");
  }
  /**
   * Inserts a new landing page. (advertiserLandingPages.insert)
   *
   * @param string $profileId User profile ID associated with this request.
   * @param Google_Service_Dfareporting_LandingPage $postBody
   * @param array $optParams Optional parameters.
   * @return Google_Service_Dfareporting_LandingPage
   */
  public function insert($profileId, Google_Service_Dfareporting_LandingPage $postBody, $optParams = array())
  {
    $params = array('profileId' => $profileId, 'postBody' => $postBody);
    $params = array_merge($params, $optParams);
    return $this->call('insert', array($params), "Google_Service_Dfareporting_LandingPage");
  }
  /**
   * Retrieves a list of landing pages.
   * (advertiserLandingPages.listAdvertiserLandingPages)
   *
   * @param string $profileId User profile ID associated with this request.
   * @param array $optParams Optional parameters.
   *
   * @opt_param string advertiserIds Select only landing pages that belong to
   * these advertisers.
   * @opt_param bool archived Select only archived landing pages. Don't set this
   * field to select both archived and non-archived landing pages.
   * @opt_param string ids Select only landing pages with these IDs.
   * @opt_param int maxResults Maximum number of results to return.
   * @opt_param string pageToken Value of the nextPageToken from the previous
   * result page.
   * @opt_param string searchString Allows searching for landing pages by name or
   * ID. Wildcards (*) are allowed. For example, "landingpage*2017" will return
   * landing pages with names like "landingpage July 2017", "landingpage March
   * 2017", or simply "landingpage 2017". Most of the searches also add wildcards
   * implicitly at the start and the end of the search string. For example, a
   * search string of "landingpage" will match campaigns with name "my
   * landingpage", "landingpage 2015", or simply "landingpage".
   * @opt_param string sortField Field by which to sort the list.
   * @opt_param string sortOrder Order of sorted results.
   * @opt_param string subaccountId Select only landing pages that belong to this
   * subaccount.
   * @return Google_Service_Dfareporting_AdvertiserLandingPagesListResponse
   */
  public function listAdvertiserLandingPages($profileId, $optParams = array())
  {
    $params = array('profileId' => $profileId);
    $params = array_merge($params, $optParams);
    return $this->call('list', array($params), "Google_Service_Dfareporting_AdvertiserLandingPagesListResponse");
  }
  /**
   * Updates an existing landing page. This method supports patch semantics.
   * (advertiserLandingPages.patch)
   *
   * @param string $profileId User profile ID associated with this request.
   * @param string $id Landing page ID.
   * @param Google_Service_Dfareporting_LandingPage $postBody
   * @param array $optParams Optional parameters.
   * @return Google_Service_Dfareporting_LandingPage
   */
  public function patch($profileId, $id, Google_Service_Dfareporting_LandingPage $postBody, $optParams = array())
  {
    $params = array('profileId' => $profileId, 'id' => $id, 'postBody' => $postBody);
    $params = array_merge($params, $optParams);
    return $this->call('patch', array($params), "Google_Service_Dfareporting_LandingPage");
  }
  /**
   * Updates an existing landing page. (advertiserLandingPages.update)
   *
   * @param string $profileId User profile ID associated with this request.
   * @param Google_Service_Dfareporting_LandingPage $postBody
   * @param array $optParams Optional parameters.
   * @return Google_Service_Dfareporting_LandingPage
   */
  public function update($profileId, Google_Service_Dfareporting_LandingPage $postBody, $optParams = array())
  {
    $params = array('profileId' => $profileId, 'postBody' => $postBody);
    $params = array_merge($params, $optParams);
    return $this->call('update', array($params), "Google_Service_Dfareporting_LandingPage");
  }
}
