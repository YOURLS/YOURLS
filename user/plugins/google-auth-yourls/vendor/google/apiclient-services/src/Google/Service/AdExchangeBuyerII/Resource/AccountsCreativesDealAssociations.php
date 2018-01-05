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
 * The "dealAssociations" collection of methods.
 * Typical usage is:
 *  <code>
 *   $adexchangebuyer2Service = new Google_Service_AdExchangeBuyerII(...);
 *   $dealAssociations = $adexchangebuyer2Service->dealAssociations;
 *  </code>
 */
class Google_Service_AdExchangeBuyerII_Resource_AccountsCreativesDealAssociations extends Google_Service_Resource
{
  /**
   * Associate an existing deal with a creative. (dealAssociations.add)
   *
   * @param string $accountId The account the creative belongs to.
   * @param string $creativeId The ID of the creative associated with the deal.
   * @param Google_Service_AdExchangeBuyerII_AddDealAssociationRequest $postBody
   * @param array $optParams Optional parameters.
   * @return Google_Service_AdExchangeBuyerII_Adexchangebuyer2Empty
   */
  public function add($accountId, $creativeId, Google_Service_AdExchangeBuyerII_AddDealAssociationRequest $postBody, $optParams = array())
  {
    $params = array('accountId' => $accountId, 'creativeId' => $creativeId, 'postBody' => $postBody);
    $params = array_merge($params, $optParams);
    return $this->call('add', array($params), "Google_Service_AdExchangeBuyerII_Adexchangebuyer2Empty");
  }
  /**
   * List all creative-deal associations.
   * (dealAssociations.listAccountsCreativesDealAssociations)
   *
   * @param string $accountId The account to list the associations from. Specify
   * "-" to list all creatives the current user has access to.
   * @param string $creativeId The creative ID to list the associations from.
   * Specify "-" to list all creatives under the above account.
   * @param array $optParams Optional parameters.
   *
   * @opt_param string pageToken A token identifying a page of results the server
   * should return. Typically, this is the value of
   * ListDealAssociationsResponse.next_page_token returned from the previous call
   * to 'ListDealAssociations' method.
   * @opt_param int pageSize Requested page size. Server may return fewer
   * associations than requested. If unspecified, server will pick an appropriate
   * default.
   * @opt_param string query An optional query string to filter deal associations.
   * If no filter is specified, all associations will be returned. Supported
   * queries are:
   *
   * accountId=account_id_string creativeId=creative_id_string
   * dealsId=deals_id_string dealsStatus:{approved, conditionally_approved,
   * disapproved,                   not_checked} openAuctionStatus:{approved,
   * conditionally_approved, disapproved,                          not_checked}
   *
   * Example: 'dealsId=12345 AND dealsStatus:disapproved'
   * @return Google_Service_AdExchangeBuyerII_ListDealAssociationsResponse
   */
  public function listAccountsCreativesDealAssociations($accountId, $creativeId, $optParams = array())
  {
    $params = array('accountId' => $accountId, 'creativeId' => $creativeId);
    $params = array_merge($params, $optParams);
    return $this->call('list', array($params), "Google_Service_AdExchangeBuyerII_ListDealAssociationsResponse");
  }
  /**
   * Remove the association between a deal and a creative.
   * (dealAssociations.remove)
   *
   * @param string $accountId The account the creative belongs to.
   * @param string $creativeId The ID of the creative associated with the deal.
   * @param Google_Service_AdExchangeBuyerII_RemoveDealAssociationRequest $postBody
   * @param array $optParams Optional parameters.
   * @return Google_Service_AdExchangeBuyerII_Adexchangebuyer2Empty
   */
  public function remove($accountId, $creativeId, Google_Service_AdExchangeBuyerII_RemoveDealAssociationRequest $postBody, $optParams = array())
  {
    $params = array('accountId' => $accountId, 'creativeId' => $creativeId, 'postBody' => $postBody);
    $params = array_merge($params, $optParams);
    return $this->call('remove', array($params), "Google_Service_AdExchangeBuyerII_Adexchangebuyer2Empty");
  }
}
