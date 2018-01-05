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
 * The "datafeedstatuses" collection of methods.
 * Typical usage is:
 *  <code>
 *   $contentService = new Google_Service_ShoppingContent(...);
 *   $datafeedstatuses = $contentService->datafeedstatuses;
 *  </code>
 */
class Google_Service_ShoppingContent_Resource_Datafeedstatuses extends Google_Service_Resource
{
  /**
   * (datafeedstatuses.custombatch)
   *
   * @param Google_Service_ShoppingContent_DatafeedstatusesCustomBatchRequest $postBody
   * @param array $optParams Optional parameters.
   * @return Google_Service_ShoppingContent_DatafeedstatusesCustomBatchResponse
   */
  public function custombatch(Google_Service_ShoppingContent_DatafeedstatusesCustomBatchRequest $postBody, $optParams = array())
  {
    $params = array('postBody' => $postBody);
    $params = array_merge($params, $optParams);
    return $this->call('custombatch', array($params), "Google_Service_ShoppingContent_DatafeedstatusesCustomBatchResponse");
  }
  /**
   * Retrieves the status of a datafeed from your Merchant Center account.
   * (datafeedstatuses.get)
   *
   * @param string $merchantId The ID of the account that manages the datafeed.
   * This account cannot be a multi-client account.
   * @param string $datafeedId The ID of the datafeed.
   * @param array $optParams Optional parameters.
   *
   * @opt_param string country The country for which to get the datafeed status.
   * If this parameter is provided then language must also be provided. Note that
   * this parameter is required for feeds targeting multiple countries and
   * languages, since a feed may have a different status for each target.
   * @opt_param string language The language for which to get the datafeed status.
   * If this parameter is provided then country must also be provided. Note that
   * this parameter is required for feeds targeting multiple countries and
   * languages, since a feed may have a different status for each target.
   * @return Google_Service_ShoppingContent_DatafeedStatus
   */
  public function get($merchantId, $datafeedId, $optParams = array())
  {
    $params = array('merchantId' => $merchantId, 'datafeedId' => $datafeedId);
    $params = array_merge($params, $optParams);
    return $this->call('get', array($params), "Google_Service_ShoppingContent_DatafeedStatus");
  }
  /**
   * Lists the statuses of the datafeeds in your Merchant Center account.
   * (datafeedstatuses.listDatafeedstatuses)
   *
   * @param string $merchantId The ID of the account that manages the datafeeds.
   * This account cannot be a multi-client account.
   * @param array $optParams Optional parameters.
   *
   * @opt_param string maxResults The maximum number of products to return in the
   * response, used for paging.
   * @opt_param string pageToken The token returned by the previous request.
   * @return Google_Service_ShoppingContent_DatafeedstatusesListResponse
   */
  public function listDatafeedstatuses($merchantId, $optParams = array())
  {
    $params = array('merchantId' => $merchantId);
    $params = array_merge($params, $optParams);
    return $this->call('list', array($params), "Google_Service_ShoppingContent_DatafeedstatusesListResponse");
  }
}
