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
 * The "representatives" collection of methods.
 * Typical usage is:
 *  <code>
 *   $civicinfoService = new Google_Service_CivicInfo(...);
 *   $representatives = $civicinfoService->representatives;
 *  </code>
 */
class Google_Service_CivicInfo_Resource_Representatives extends Google_Service_Resource
{
  /**
   * Looks up political geography and representative information for a single
   * address. (representatives.representativeInfoByAddress)
   *
   * @param array $optParams Optional parameters.
   *
   * @opt_param string address The address to look up. May only be specified if
   * the field ocdId is not given in the URL.
   * @opt_param bool includeOffices Whether to return information about offices
   * and officials. If false, only the top-level district information will be
   * returned.
   * @opt_param string levels A list of office levels to filter by. Only offices
   * that serve at least one of these levels will be returned. Divisions that
   * don't contain a matching office will not be returned.
   * @opt_param string roles A list of office roles to filter by. Only offices
   * fulfilling one of these roles will be returned. Divisions that don't contain
   * a matching office will not be returned.
   * @return Google_Service_CivicInfo_RepresentativeInfoResponse
   */
  public function representativeInfoByAddress($optParams = array())
  {
    $params = array();
    $params = array_merge($params, $optParams);
    return $this->call('representativeInfoByAddress', array($params), "Google_Service_CivicInfo_RepresentativeInfoResponse");
  }
  /**
   * Looks up representative information for a single geographic division.
   * (representatives.representativeInfoByDivision)
   *
   * @param string $ocdId The Open Civic Data division identifier of the division
   * to look up.
   * @param array $optParams Optional parameters.
   *
   * @opt_param string levels A list of office levels to filter by. Only offices
   * that serve at least one of these levels will be returned. Divisions that
   * don't contain a matching office will not be returned.
   * @opt_param bool recursive If true, information about all divisions contained
   * in the division requested will be included as well. For example, if querying
   * ocd-division/country:us/district:dc, this would also return all DC's wards
   * and ANCs.
   * @opt_param string roles A list of office roles to filter by. Only offices
   * fulfilling one of these roles will be returned. Divisions that don't contain
   * a matching office will not be returned.
   * @return Google_Service_CivicInfo_RepresentativeInfoData
   */
  public function representativeInfoByDivision($ocdId, $optParams = array())
  {
    $params = array('ocdId' => $ocdId);
    $params = array_merge($params, $optParams);
    return $this->call('representativeInfoByDivision', array($params), "Google_Service_CivicInfo_RepresentativeInfoData");
  }
}
