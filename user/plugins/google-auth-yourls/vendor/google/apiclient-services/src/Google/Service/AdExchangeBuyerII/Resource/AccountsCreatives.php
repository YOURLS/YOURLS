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
class Google_Service_AdExchangeBuyerII_Resource_AccountsCreatives extends Google_Service_Resource
{
  /**
   * Creates a creative. (creatives.create)
   *
   * @param string $accountId The account that this creative belongs to. Can be
   * used to filter the response of the creatives.list method.
   * @param Google_Service_AdExchangeBuyerII_Creative $postBody
   * @param array $optParams Optional parameters.
   *
   * @opt_param string duplicateIdMode Indicates if multiple creatives can share
   * an ID or not. Default is NO_DUPLICATES (one ID per creative).
   * @return Google_Service_AdExchangeBuyerII_Creative
   */
  public function create($accountId, Google_Service_AdExchangeBuyerII_Creative $postBody, $optParams = array())
  {
    $params = array('accountId' => $accountId, 'postBody' => $postBody);
    $params = array_merge($params, $optParams);
    return $this->call('create', array($params), "Google_Service_AdExchangeBuyerII_Creative");
  }
  /**
   * Gets a creative. (creatives.get)
   *
   * @param string $accountId The account the creative belongs to.
   * @param string $creativeId The ID of the creative to retrieve.
   * @param array $optParams Optional parameters.
   * @return Google_Service_AdExchangeBuyerII_Creative
   */
  public function get($accountId, $creativeId, $optParams = array())
  {
    $params = array('accountId' => $accountId, 'creativeId' => $creativeId);
    $params = array_merge($params, $optParams);
    return $this->call('get', array($params), "Google_Service_AdExchangeBuyerII_Creative");
  }
  /**
   * Lists creatives. (creatives.listAccountsCreatives)
   *
   * @param string $accountId The account to list the creatives from. Specify "-"
   * to list all creatives the current user has access to.
   * @param array $optParams Optional parameters.
   *
   * @opt_param string pageToken A token identifying a page of results the server
   * should return. Typically, this is the value of
   * ListCreativesResponse.next_page_token returned from the previous call to
   * 'ListCreatives' method.
   * @opt_param int pageSize Requested page size. The server may return fewer
   * creatives than requested (due to timeout constraint) even if more are
   * available via another call. If unspecified, server will pick an appropriate
   * default. Acceptable values are 1 to 1000, inclusive.
   * @opt_param string query An optional query string to filter creatives. If no
   * filter is specified, all active creatives will be returned. Supported queries
   * are:
   *
   * accountId=account_id_string creativeId=creative_id_string dealsStatus:
   * {approved, conditionally_approved, disapproved,
   * not_checked} openAuctionStatus: {approved, conditionally_approved,
   * disapproved,                           not_checked} attribute: {a numeric
   * attribute from the list of attributes} disapprovalReason: {a reason from
   * DisapprovalReason
   *
   * Example: 'accountId=12345 AND (dealsStatus:disapproved AND
   * disapprovalReason:unacceptable_content) OR attribute:47'
   * @return Google_Service_AdExchangeBuyerII_ListCreativesResponse
   */
  public function listAccountsCreatives($accountId, $optParams = array())
  {
    $params = array('accountId' => $accountId);
    $params = array_merge($params, $optParams);
    return $this->call('list', array($params), "Google_Service_AdExchangeBuyerII_ListCreativesResponse");
  }
  /**
   * Stops watching a creative. Will stop push notifications being sent to the
   * topics when the creative changes status. (creatives.stopWatching)
   *
   * @param string $accountId The account of the creative to stop notifications
   * for.
   * @param string $creativeId The creative ID of the creative to stop
   * notifications for. Specify "-" to specify stopping account level
   * notifications.
   * @param Google_Service_AdExchangeBuyerII_StopWatchingCreativeRequest $postBody
   * @param array $optParams Optional parameters.
   * @return Google_Service_AdExchangeBuyerII_Adexchangebuyer2Empty
   */
  public function stopWatching($accountId, $creativeId, Google_Service_AdExchangeBuyerII_StopWatchingCreativeRequest $postBody, $optParams = array())
  {
    $params = array('accountId' => $accountId, 'creativeId' => $creativeId, 'postBody' => $postBody);
    $params = array_merge($params, $optParams);
    return $this->call('stopWatching', array($params), "Google_Service_AdExchangeBuyerII_Adexchangebuyer2Empty");
  }
  /**
   * Updates a creative. (creatives.update)
   *
   * @param string $accountId The account that this creative belongs to. Can be
   * used to filter the response of the creatives.list method.
   * @param string $creativeId The buyer-defined creative ID of this creative. Can
   * be used to filter the response of the creatives.list method.
   * @param Google_Service_AdExchangeBuyerII_Creative $postBody
   * @param array $optParams Optional parameters.
   * @return Google_Service_AdExchangeBuyerII_Creative
   */
  public function update($accountId, $creativeId, Google_Service_AdExchangeBuyerII_Creative $postBody, $optParams = array())
  {
    $params = array('accountId' => $accountId, 'creativeId' => $creativeId, 'postBody' => $postBody);
    $params = array_merge($params, $optParams);
    return $this->call('update', array($params), "Google_Service_AdExchangeBuyerII_Creative");
  }
  /**
   * Watches a creative. Will result in push notifications being sent to the topic
   * when the creative changes status. (creatives.watch)
   *
   * @param string $accountId The account of the creative to watch.
   * @param string $creativeId The creative ID to watch for status changes.
   * Specify "-" to watch all creatives under the above account. If both creative-
   * level and account-level notifications are sent, only a single notification
   * will be sent to the creative-level notification topic.
   * @param Google_Service_AdExchangeBuyerII_WatchCreativeRequest $postBody
   * @param array $optParams Optional parameters.
   * @return Google_Service_AdExchangeBuyerII_Adexchangebuyer2Empty
   */
  public function watch($accountId, $creativeId, Google_Service_AdExchangeBuyerII_WatchCreativeRequest $postBody, $optParams = array())
  {
    $params = array('accountId' => $accountId, 'creativeId' => $creativeId, 'postBody' => $postBody);
    $params = array_merge($params, $optParams);
    return $this->call('watch', array($params), "Google_Service_AdExchangeBuyerII_Adexchangebuyer2Empty");
  }
}
