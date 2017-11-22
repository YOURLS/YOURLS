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
 * The "v2" collection of methods.
 * Typical usage is:
 *  <code>
 *   $partnersService = new Google_Service_Partners(...);
 *   $v2 = $partnersService->v2;
 *  </code>
 */
class Google_Service_Partners_Resource_V2 extends Google_Service_Resource
{
  /**
   * Gets Partners Status of the logged in user's agency. Should only be called if
   * the logged in user is the admin of the agency. (v2.getPartnersstatus)
   *
   * @param array $optParams Optional parameters.
   *
   * @opt_param string requestMetadata.userOverrides.ipAddress IP address to use
   * instead of the user's geo-located IP address.
   * @opt_param string requestMetadata.experimentIds Experiment IDs the current
   * request belongs to.
   * @opt_param string requestMetadata.trafficSource.trafficSubId Second level
   * identifier to indicate where the traffic comes from. An identifier has
   * multiple letters created by a team which redirected the traffic to us.
   * @opt_param string requestMetadata.userOverrides.userId Logged-in user ID to
   * impersonate instead of the user's ID.
   * @opt_param string requestMetadata.partnersSessionId Google Partners session
   * ID.
   * @opt_param string requestMetadata.trafficSource.trafficSourceId Identifier to
   * indicate where the traffic comes from. An identifier has multiple letters
   * created by a team which redirected the traffic to us.
   * @opt_param string requestMetadata.locale Locale to use for the current
   * request.
   * @return Google_Service_Partners_GetPartnersStatusResponse
   */
  public function getPartnersstatus($optParams = array())
  {
    $params = array();
    $params = array_merge($params, $optParams);
    return $this->call('getPartnersstatus', array($params), "Google_Service_Partners_GetPartnersStatusResponse");
  }
  /**
   * Update company. Should only be called within the context of an authorized
   * logged in user. (v2.updateCompanies)
   *
   * @param Google_Service_Partners_Company $postBody
   * @param array $optParams Optional parameters.
   *
   * @opt_param string requestMetadata.userOverrides.ipAddress IP address to use
   * instead of the user's geo-located IP address.
   * @opt_param string updateMask Standard field mask for the set of fields to be
   * updated. Required with at least 1 value in FieldMask's paths.
   * @opt_param string requestMetadata.experimentIds Experiment IDs the current
   * request belongs to.
   * @opt_param string requestMetadata.trafficSource.trafficSubId Second level
   * identifier to indicate where the traffic comes from. An identifier has
   * multiple letters created by a team which redirected the traffic to us.
   * @opt_param string requestMetadata.userOverrides.userId Logged-in user ID to
   * impersonate instead of the user's ID.
   * @opt_param string requestMetadata.partnersSessionId Google Partners session
   * ID.
   * @opt_param string requestMetadata.trafficSource.trafficSourceId Identifier to
   * indicate where the traffic comes from. An identifier has multiple letters
   * created by a team which redirected the traffic to us.
   * @opt_param string requestMetadata.locale Locale to use for the current
   * request.
   * @return Google_Service_Partners_Company
   */
  public function updateCompanies(Google_Service_Partners_Company $postBody, $optParams = array())
  {
    $params = array('postBody' => $postBody);
    $params = array_merge($params, $optParams);
    return $this->call('updateCompanies', array($params), "Google_Service_Partners_Company");
  }
  /**
   * Updates the specified lead. (v2.updateLeads)
   *
   * @param Google_Service_Partners_Lead $postBody
   * @param array $optParams Optional parameters.
   *
   * @opt_param string requestMetadata.trafficSource.trafficSourceId Identifier to
   * indicate where the traffic comes from. An identifier has multiple letters
   * created by a team which redirected the traffic to us.
   * @opt_param string requestMetadata.locale Locale to use for the current
   * request.
   * @opt_param string requestMetadata.userOverrides.ipAddress IP address to use
   * instead of the user's geo-located IP address.
   * @opt_param string updateMask Standard field mask for the set of fields to be
   * updated. Required with at least 1 value in FieldMask's paths. Only `state`
   * and `adwords_customer_id` are currently supported.
   * @opt_param string requestMetadata.experimentIds Experiment IDs the current
   * request belongs to.
   * @opt_param string requestMetadata.trafficSource.trafficSubId Second level
   * identifier to indicate where the traffic comes from. An identifier has
   * multiple letters created by a team which redirected the traffic to us.
   * @opt_param string requestMetadata.partnersSessionId Google Partners session
   * ID.
   * @opt_param string requestMetadata.userOverrides.userId Logged-in user ID to
   * impersonate instead of the user's ID.
   * @return Google_Service_Partners_Lead
   */
  public function updateLeads(Google_Service_Partners_Lead $postBody, $optParams = array())
  {
    $params = array('postBody' => $postBody);
    $params = array_merge($params, $optParams);
    return $this->call('updateLeads', array($params), "Google_Service_Partners_Lead");
  }
}
