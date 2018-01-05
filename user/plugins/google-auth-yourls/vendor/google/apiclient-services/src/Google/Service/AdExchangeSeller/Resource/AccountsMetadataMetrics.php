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
 * The "metrics" collection of methods.
 * Typical usage is:
 *  <code>
 *   $adexchangesellerService = new Google_Service_AdExchangeSeller(...);
 *   $metrics = $adexchangesellerService->metrics;
 *  </code>
 */
class Google_Service_AdExchangeSeller_Resource_AccountsMetadataMetrics extends Google_Service_Resource
{
  /**
   * List the metadata for the metrics available to this AdExchange account.
   * (metrics.listAccountsMetadataMetrics)
   *
   * @param string $accountId Account with visibility to the metrics.
   * @param array $optParams Optional parameters.
   * @return Google_Service_AdExchangeSeller_Metadata
   */
  public function listAccountsMetadataMetrics($accountId, $optParams = array())
  {
    $params = array('accountId' => $accountId);
    $params = array_merge($params, $optParams);
    return $this->call('list', array($params), "Google_Service_AdExchangeSeller_Metadata");
  }
}
