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
 *   $dfareportingService = new Google_Service_Dfareporting(...);
 *   $sites = $dfareportingService->sites;
 *  </code>
 */
class Google_Service_Dfareporting_Resource_Sites extends Google_Service_Resource
{
  /**
   * Gets one site by ID. (sites.get)
   *
   * @param string $profileId User profile ID associated with this request.
   * @param string $id Site ID.
   * @param array $optParams Optional parameters.
   * @return Google_Service_Dfareporting_Site
   */
  public function get($profileId, $id, $optParams = array())
  {
    $params = array('profileId' => $profileId, 'id' => $id);
    $params = array_merge($params, $optParams);
    return $this->call('get', array($params), "Google_Service_Dfareporting_Site");
  }
  /**
   * Inserts a new site. (sites.insert)
   *
   * @param string $profileId User profile ID associated with this request.
   * @param Google_Service_Dfareporting_Site $postBody
   * @param array $optParams Optional parameters.
   * @return Google_Service_Dfareporting_Site
   */
  public function insert($profileId, Google_Service_Dfareporting_Site $postBody, $optParams = array())
  {
    $params = array('profileId' => $profileId, 'postBody' => $postBody);
    $params = array_merge($params, $optParams);
    return $this->call('insert', array($params), "Google_Service_Dfareporting_Site");
  }
  /**
   * Retrieves a list of sites, possibly filtered. This method supports paging.
   * (sites.listSites)
   *
   * @param string $profileId User profile ID associated with this request.
   * @param array $optParams Optional parameters.
   *
   * @opt_param bool acceptsInStreamVideoPlacements This search filter is no
   * longer supported and will have no effect on the results returned.
   * @opt_param bool acceptsInterstitialPlacements This search filter is no longer
   * supported and will have no effect on the results returned.
   * @opt_param bool acceptsPublisherPaidPlacements Select only sites that accept
   * publisher paid placements.
   * @opt_param bool adWordsSite Select only AdWords sites.
   * @opt_param bool approved Select only approved sites.
   * @opt_param string campaignIds Select only sites with these campaign IDs.
   * @opt_param string directorySiteIds Select only sites with these directory
   * site IDs.
   * @opt_param string ids Select only sites with these IDs.
   * @opt_param int maxResults Maximum number of results to return.
   * @opt_param string pageToken Value of the nextPageToken from the previous
   * result page.
   * @opt_param string searchString Allows searching for objects by name, ID or
   * keyName. Wildcards (*) are allowed. For example, "site*2015" will return
   * objects with names like "site June 2015", "site April 2015", or simply "site
   * 2015". Most of the searches also add wildcards implicitly at the start and
   * the end of the search string. For example, a search string of "site" will
   * match objects with name "my site", "site 2015", or simply "site".
   * @opt_param string sortField Field by which to sort the list.
   * @opt_param string sortOrder Order of sorted results.
   * @opt_param string subaccountId Select only sites with this subaccount ID.
   * @opt_param bool unmappedSite Select only sites that have not been mapped to a
   * directory site.
   * @return Google_Service_Dfareporting_SitesListResponse
   */
  public function listSites($profileId, $optParams = array())
  {
    $params = array('profileId' => $profileId);
    $params = array_merge($params, $optParams);
    return $this->call('list', array($params), "Google_Service_Dfareporting_SitesListResponse");
  }
  /**
   * Updates an existing site. This method supports patch semantics. (sites.patch)
   *
   * @param string $profileId User profile ID associated with this request.
   * @param string $id Site ID.
   * @param Google_Service_Dfareporting_Site $postBody
   * @param array $optParams Optional parameters.
   * @return Google_Service_Dfareporting_Site
   */
  public function patch($profileId, $id, Google_Service_Dfareporting_Site $postBody, $optParams = array())
  {
    $params = array('profileId' => $profileId, 'id' => $id, 'postBody' => $postBody);
    $params = array_merge($params, $optParams);
    return $this->call('patch', array($params), "Google_Service_Dfareporting_Site");
  }
  /**
   * Updates an existing site. (sites.update)
   *
   * @param string $profileId User profile ID associated with this request.
   * @param Google_Service_Dfareporting_Site $postBody
   * @param array $optParams Optional parameters.
   * @return Google_Service_Dfareporting_Site
   */
  public function update($profileId, Google_Service_Dfareporting_Site $postBody, $optParams = array())
  {
    $params = array('profileId' => $profileId, 'postBody' => $postBody);
    $params = array_merge($params, $optParams);
    return $this->call('update', array($params), "Google_Service_Dfareporting_Site");
  }
}
