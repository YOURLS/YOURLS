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
 * The "skus" collection of methods.
 * Typical usage is:
 *  <code>
 *   $cloudbillingService = new Google_Service_Cloudbilling(...);
 *   $skus = $cloudbillingService->skus;
 *  </code>
 */
class Google_Service_Cloudbilling_Resource_ServicesSkus extends Google_Service_Resource
{
  /**
   * Lists all publicly available SKUs for a given cloud service.
   * (skus.listServicesSkus)
   *
   * @param string $parent The name of the service. Example:
   * "services/DA34-426B-A397"
   * @param array $optParams Optional parameters.
   *
   * @opt_param string currencyCode The ISO 4217 currency code for the pricing
   * info in the response proto. Will use the conversion rate as of start_time.
   * Optional. If not specified USD will be used.
   * @opt_param string endTime Optional exclusive end time of the time range for
   * which the pricing versions will be returned. Timestamps in the future are not
   * allowed. Maximum allowable time range is 1 month (31 days). Time range as a
   * whole is optional. If not specified, the latest pricing will be returned (up
   * to 12 hours old at most).
   * @opt_param int pageSize Requested page size. Defaults to 5000.
   * @opt_param string startTime Optional inclusive start time of the time range
   * for which the pricing versions will be returned. Timestamps in the future are
   * not allowed. Maximum allowable time range is 1 month (31 days). Time range as
   * a whole is optional. If not specified, the latest pricing will be returned
   * (up to 12 hours old at most).
   * @opt_param string pageToken A token identifying a page of results to return.
   * This should be a `next_page_token` value returned from a previous `ListSkus`
   * call. If unspecified, the first page of results is returned.
   * @return Google_Service_Cloudbilling_ListSkusResponse
   */
  public function listServicesSkus($parent, $optParams = array())
  {
    $params = array('parent' => $parent);
    $params = array_merge($params, $optParams);
    return $this->call('list', array($params), "Google_Service_Cloudbilling_ListSkusResponse");
  }
}
