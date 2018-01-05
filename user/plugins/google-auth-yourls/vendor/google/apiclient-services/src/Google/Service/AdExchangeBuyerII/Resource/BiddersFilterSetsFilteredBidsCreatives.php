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
 * The "creatives" collection of methods.
 * Typical usage is:
 *  <code>
 *   $adexchangebuyer2Service = new Google_Service_AdExchangeBuyerII(...);
 *   $creatives = $adexchangebuyer2Service->creatives;
 *  </code>
 */
class Google_Service_AdExchangeBuyerII_Resource_BiddersFilterSetsFilteredBidsCreatives extends Google_Service_Resource
{
  /**
   * List all creatives associated with a specific reason for which bids were
   * filtered, with the number of bids filtered for each creative.
   * (creatives.listBiddersFilterSetsFilteredBidsCreatives)
   *
   * @param string $filterSetName Name of the filter set that should be applied to
   * the requested metrics. For example:
   *
   * - For a bidder-level filter set for bidder 123:
   * `bidders/123/filterSets/abc`
   *
   * - For an account-level filter set for the buyer account representing bidder
   * 123: `bidders/123/accounts/123/filterSets/abc`
   *
   * - For an account-level filter set for the child seat buyer account 456
   * whose bidder is 123: `bidders/123/accounts/456/filterSets/abc`
   * @param int $creativeStatusId The ID of the creative status for which to
   * retrieve a breakdown by creative. See [creative-status-
   * codes](https://developers.google.com/ad-exchange/rtb/downloads/creative-
   * status-codes).
   * @param array $optParams Optional parameters.
   *
   * @opt_param string pageToken A token identifying a page of results the server
   * should return. Typically, this is the value of
   * ListCreativeStatusBreakdownByCreativeResponse.nextPageToken returned from the
   * previous call to the filteredBids.creatives.list method.
   * @opt_param int pageSize Requested page size. The server may return fewer
   * results than requested. If unspecified, the server will pick an appropriate
   * default.
   * @return Google_Service_AdExchangeBuyerII_ListCreativeStatusBreakdownByCreativeResponse
   */
  public function listBiddersFilterSetsFilteredBidsCreatives($filterSetName, $creativeStatusId, $optParams = array())
  {
    $params = array('filterSetName' => $filterSetName, 'creativeStatusId' => $creativeStatusId);
    $params = array_merge($params, $optParams);
    return $this->call('list', array($params), "Google_Service_AdExchangeBuyerII_ListCreativeStatusBreakdownByCreativeResponse");
  }
}
