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
 * The "orders" collection of methods.
 * Typical usage is:
 *  <code>
 *   $playmoviespartnerService = new Google_Service_Playmoviespartner(...);
 *   $orders = $playmoviespartnerService->orders;
 *  </code>
 */
class Google_Service_Playmoviespartner_AccountsOrdersResource extends Google_Service_Resource
{
  /**
   * Get an Order given its id. See _Authentication and Authorization rules_ and
   * _Get methods rules_ for more information about this method. (orders.get)
   *
   * @param string $accountId REQUIRED. See _General rules_ for more information
   * about this field.
   * @param string $orderId REQUIRED. Order ID.
   * @param array $optParams Optional parameters.
   * @return Google_Service_Playmoviespartner_Order
   */
  public function get($accountId, $orderId, $optParams = array())
  {
    $params = array('accountId' => $accountId, 'orderId' => $orderId);
    $params = array_merge($params, $optParams);
    return $this->call('get', array($params), "Google_Service_Playmoviespartner_Order");
  }
  /**
   * List Orders owned or managed by the partner. See _Authentication and
   * Authorization rules_ and _List methods rules_ for more information about this
   * method. (orders.listAccountsOrders)
   *
   * @param string $accountId REQUIRED. See _General rules_ for more information
   * about this field.
   * @param array $optParams Optional parameters.
   *
   * @opt_param int pageSize See _List methods rules_ for info about this field.
   * @opt_param string pageToken See _List methods rules_ for info about this
   * field.
   * @opt_param string pphNames See _List methods rules_ for info about this
   * field.
   * @opt_param string studioNames See _List methods rules_ for info about this
   * field.
   * @opt_param string name Filter Orders that match a title name (case-
   * insensitive, sub-string match).
   * @opt_param string status Filter Orders that match one of the given status.
   * @opt_param string customId Filter Orders that match a case-insensitive,
   * partner-specific custom id.
   * @return Google_Service_Playmoviespartner_ListOrdersResponse
   */
  public function listAccountsOrders($accountId, $optParams = array())
  {
    $params = array('accountId' => $accountId);
    $params = array_merge($params, $optParams);
    return $this->call('list', array($params), "Google_Service_Playmoviespartner_ListOrdersResponse");
  }
}
