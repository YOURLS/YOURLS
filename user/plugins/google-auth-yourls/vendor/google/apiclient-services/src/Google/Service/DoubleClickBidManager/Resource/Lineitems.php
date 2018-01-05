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
 * The "lineitems" collection of methods.
 * Typical usage is:
 *  <code>
 *   $doubleclickbidmanagerService = new Google_Service_DoubleClickBidManager(...);
 *   $lineitems = $doubleclickbidmanagerService->lineitems;
 *  </code>
 */
class Google_Service_DoubleClickBidManager_Resource_Lineitems extends Google_Service_Resource
{
  /**
   * Retrieves line items in CSV format. (lineitems.downloadlineitems)
   *
   * @param Google_Service_DoubleClickBidManager_DownloadLineItemsRequest $postBody
   * @param array $optParams Optional parameters.
   * @return Google_Service_DoubleClickBidManager_DownloadLineItemsResponse
   */
  public function downloadlineitems(Google_Service_DoubleClickBidManager_DownloadLineItemsRequest $postBody, $optParams = array())
  {
    $params = array('postBody' => $postBody);
    $params = array_merge($params, $optParams);
    return $this->call('downloadlineitems', array($params), "Google_Service_DoubleClickBidManager_DownloadLineItemsResponse");
  }
  /**
   * Uploads line items in CSV format. (lineitems.uploadlineitems)
   *
   * @param Google_Service_DoubleClickBidManager_UploadLineItemsRequest $postBody
   * @param array $optParams Optional parameters.
   * @return Google_Service_DoubleClickBidManager_UploadLineItemsResponse
   */
  public function uploadlineitems(Google_Service_DoubleClickBidManager_UploadLineItemsRequest $postBody, $optParams = array())
  {
    $params = array('postBody' => $postBody);
    $params = array_merge($params, $optParams);
    return $this->call('uploadlineitems', array($params), "Google_Service_DoubleClickBidManager_UploadLineItemsResponse");
  }
}
