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
 * The "transfers" collection of methods.
 * Typical usage is:
 *  <code>
 *   $adminService = new Google_Service_DataTransfer(...);
 *   $transfers = $adminService->transfers;
 *  </code>
 */
class Google_Service_DataTransfer_Resource_Transfers extends Google_Service_Resource
{
  /**
   * Retrieves a data transfer request by its resource ID. (transfers.get)
   *
   * @param string $dataTransferId ID of the resource to be retrieved. This is
   * returned in the response from the insert method.
   * @param array $optParams Optional parameters.
   * @return Google_Service_DataTransfer_DataTransfer
   */
  public function get($dataTransferId, $optParams = array())
  {
    $params = array('dataTransferId' => $dataTransferId);
    $params = array_merge($params, $optParams);
    return $this->call('get', array($params), "Google_Service_DataTransfer_DataTransfer");
  }
  /**
   * Inserts a data transfer request. (transfers.insert)
   *
   * @param Google_Service_DataTransfer_DataTransfer $postBody
   * @param array $optParams Optional parameters.
   * @return Google_Service_DataTransfer_DataTransfer
   */
  public function insert(Google_Service_DataTransfer_DataTransfer $postBody, $optParams = array())
  {
    $params = array('postBody' => $postBody);
    $params = array_merge($params, $optParams);
    return $this->call('insert', array($params), "Google_Service_DataTransfer_DataTransfer");
  }
  /**
   * Lists the transfers for a customer by source user, destination user, or
   * status. (transfers.listTransfers)
   *
   * @param array $optParams Optional parameters.
   *
   * @opt_param string customerId Immutable ID of the Google Apps account.
   * @opt_param int maxResults Maximum number of results to return. Default is
   * 100.
   * @opt_param string newOwnerUserId Destination user's profile ID.
   * @opt_param string oldOwnerUserId Source user's profile ID.
   * @opt_param string pageToken Token to specify the next page in the list.
   * @opt_param string status Status of the transfer.
   * @return Google_Service_DataTransfer_DataTransfersListResponse
   */
  public function listTransfers($optParams = array())
  {
    $params = array();
    $params = array_merge($params, $optParams);
    return $this->call('list', array($params), "Google_Service_DataTransfer_DataTransfersListResponse");
  }
}
