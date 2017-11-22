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
 * The "directorySites" collection of methods.
 * Typical usage is:
 *  <code>
 *   $dfareportingService = new Google_Service_Dfareporting(...);
 *   $directorySites = $dfareportingService->directorySites;
 *  </code>
 */
class Google_Service_Dfareporting_Resource_DirectorySites extends Google_Service_Resource
{
  /**
   * Gets one directory site by ID. (directorySites.get)
   *
   * @param string $profileId User profile ID associated with this request.
   * @param string $id Directory site ID.
   * @param array $optParams Optional parameters.
   * @return Google_Service_Dfareporting_DirectorySite
   */
  public function get($profileId, $id, $optParams = array())
  {
    $params = array('profileId' => $profileId, 'id' => $id);
    $params = array_merge($params, $optParams);
    return $this->call('get', array($params), "Google_Service_Dfareporting_DirectorySite");
  }
  /**
   * Inserts a new directory site. (directorySites.insert)
   *
   * @param string $profileId User profile ID associated with this request.
   * @param Google_Service_Dfareporting_DirectorySite $postBody
   * @param array $optParams Optional parameters.
   * @return Google_Service_Dfareporting_DirectorySite
   */
  public function insert($profileId, Google_Service_Dfareporting_DirectorySite $postBody, $optParams = array())
  {
    $params = array('profileId' => $profileId, 'postBody' => $postBody);
    $params = array_merge($params, $optParams);
    return $this->call('insert', array($params), "Google_Service_Dfareporting_DirectorySite");
  }
  /**
   * Retrieves a list of directory sites, possibly filtered. This method supports
   * paging. (directorySites.listDirectorySites)
   *
   * @param string $profileId User profile ID associated with this request.
   * @param array $optParams Optional parameters.
   *
   * @opt_param bool acceptsInStreamVideoPlacements This search filter is no
   * longer supported and will have no effect on the results returned.
   * @opt_param bool acceptsInterstitialPlacements This search filter is no longer
   * supported and will have no effect on the results returned.
   * @opt_param bool acceptsPublisherPaidPlacements Select only directory sites
   * that accept publisher paid placements. This field can be left blank.
   * @opt_param bool active Select only active directory sites. Leave blank to
   * retrieve both active and inactive directory sites.
   * @opt_param string countryId Select only directory sites with this country ID.
   * @opt_param string dfpNetworkCode Select only directory sites with this DFP
   * network code.
   * @opt_param string ids Select only directory sites with these IDs.
   * @opt_param int maxResults Maximum number of results to return.
   * @opt_param string pageToken Value of the nextPageToken from the previous
   * result page.
   * @opt_param string parentId Select only directory sites with this parent ID.
   * @opt_param string searchString Allows searching for objects by name, ID or
   * URL. Wildcards (*) are allowed. For example, "directory site*2015" will
   * return objects with names like "directory site June 2015", "directory site
   * April 2015", or simply "directory site 2015". Most of the searches also add
   * wildcards implicitly at the start and the end of the search string. For
   * example, a search string of "directory site" will match objects with name "my
   * directory site", "directory site 2015" or simply, "directory site".
   * @opt_param string sortField Field by which to sort the list.
   * @opt_param string sortOrder Order of sorted results.
   * @return Google_Service_Dfareporting_DirectorySitesListResponse
   */
  public function listDirectorySites($profileId, $optParams = array())
  {
    $params = array('profileId' => $profileId);
    $params = array_merge($params, $optParams);
    return $this->call('list', array($params), "Google_Service_Dfareporting_DirectorySitesListResponse");
  }
}
