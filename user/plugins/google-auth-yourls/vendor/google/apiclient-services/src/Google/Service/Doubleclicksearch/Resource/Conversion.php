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
 * The "conversion" collection of methods.
 * Typical usage is:
 *  <code>
 *   $doubleclicksearchService = new Google_Service_Doubleclicksearch(...);
 *   $conversion = $doubleclicksearchService->conversion;
 *  </code>
 */
class Google_Service_Doubleclicksearch_Resource_Conversion extends Google_Service_Resource
{
  /**
   * Retrieves a list of conversions from a DoubleClick Search engine account.
   * (conversion.get)
   *
   * @param string $agencyId Numeric ID of the agency.
   * @param string $advertiserId Numeric ID of the advertiser.
   * @param string $engineAccountId Numeric ID of the engine account.
   * @param int $endDate Last date (inclusive) on which to retrieve conversions.
   * Format is yyyymmdd.
   * @param int $rowCount The number of conversions to return per call.
   * @param int $startDate First date (inclusive) on which to retrieve
   * conversions. Format is yyyymmdd.
   * @param string $startRow The 0-based starting index for retrieving conversions
   * results.
   * @param array $optParams Optional parameters.
   *
   * @opt_param string adGroupId Numeric ID of the ad group.
   * @opt_param string adId Numeric ID of the ad.
   * @opt_param string campaignId Numeric ID of the campaign.
   * @opt_param string criterionId Numeric ID of the criterion.
   * @return Google_Service_Doubleclicksearch_ConversionList
   */
  public function get($agencyId, $advertiserId, $engineAccountId, $endDate, $rowCount, $startDate, $startRow, $optParams = array())
  {
    $params = array('agencyId' => $agencyId, 'advertiserId' => $advertiserId, 'engineAccountId' => $engineAccountId, 'endDate' => $endDate, 'rowCount' => $rowCount, 'startDate' => $startDate, 'startRow' => $startRow);
    $params = array_merge($params, $optParams);
    return $this->call('get', array($params), "Google_Service_Doubleclicksearch_ConversionList");
  }
  /**
   * Inserts a batch of new conversions into DoubleClick Search.
   * (conversion.insert)
   *
   * @param Google_Service_Doubleclicksearch_ConversionList $postBody
   * @param array $optParams Optional parameters.
   * @return Google_Service_Doubleclicksearch_ConversionList
   */
  public function insert(Google_Service_Doubleclicksearch_ConversionList $postBody, $optParams = array())
  {
    $params = array('postBody' => $postBody);
    $params = array_merge($params, $optParams);
    return $this->call('insert', array($params), "Google_Service_Doubleclicksearch_ConversionList");
  }
  /**
   * Updates a batch of conversions in DoubleClick Search. This method supports
   * patch semantics. (conversion.patch)
   *
   * @param string $advertiserId Numeric ID of the advertiser.
   * @param string $agencyId Numeric ID of the agency.
   * @param int $endDate Last date (inclusive) on which to retrieve conversions.
   * Format is yyyymmdd.
   * @param string $engineAccountId Numeric ID of the engine account.
   * @param int $rowCount The number of conversions to return per call.
   * @param int $startDate First date (inclusive) on which to retrieve
   * conversions. Format is yyyymmdd.
   * @param string $startRow The 0-based starting index for retrieving conversions
   * results.
   * @param Google_Service_Doubleclicksearch_ConversionList $postBody
   * @param array $optParams Optional parameters.
   * @return Google_Service_Doubleclicksearch_ConversionList
   */
  public function patch($advertiserId, $agencyId, $endDate, $engineAccountId, $rowCount, $startDate, $startRow, Google_Service_Doubleclicksearch_ConversionList $postBody, $optParams = array())
  {
    $params = array('advertiserId' => $advertiserId, 'agencyId' => $agencyId, 'endDate' => $endDate, 'engineAccountId' => $engineAccountId, 'rowCount' => $rowCount, 'startDate' => $startDate, 'startRow' => $startRow, 'postBody' => $postBody);
    $params = array_merge($params, $optParams);
    return $this->call('patch', array($params), "Google_Service_Doubleclicksearch_ConversionList");
  }
  /**
   * Updates a batch of conversions in DoubleClick Search. (conversion.update)
   *
   * @param Google_Service_Doubleclicksearch_ConversionList $postBody
   * @param array $optParams Optional parameters.
   * @return Google_Service_Doubleclicksearch_ConversionList
   */
  public function update(Google_Service_Doubleclicksearch_ConversionList $postBody, $optParams = array())
  {
    $params = array('postBody' => $postBody);
    $params = array_merge($params, $optParams);
    return $this->call('update', array($params), "Google_Service_Doubleclicksearch_ConversionList");
  }
  /**
   * Updates the availabilities of a batch of floodlight activities in DoubleClick
   * Search. (conversion.updateAvailability)
   *
   * @param Google_Service_Doubleclicksearch_UpdateAvailabilityRequest $postBody
   * @param array $optParams Optional parameters.
   * @return Google_Service_Doubleclicksearch_UpdateAvailabilityResponse
   */
  public function updateAvailability(Google_Service_Doubleclicksearch_UpdateAvailabilityRequest $postBody, $optParams = array())
  {
    $params = array('postBody' => $postBody);
    $params = array_merge($params, $optParams);
    return $this->call('updateAvailability', array($params), "Google_Service_Doubleclicksearch_UpdateAvailabilityResponse");
  }
}
