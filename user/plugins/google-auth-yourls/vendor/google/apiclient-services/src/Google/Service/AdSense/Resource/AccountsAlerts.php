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
 * The "alerts" collection of methods.
 * Typical usage is:
 *  <code>
 *   $adsenseService = new Google_Service_AdSense(...);
 *   $alerts = $adsenseService->alerts;
 *  </code>
 */
class Google_Service_AdSense_Resource_AccountsAlerts extends Google_Service_Resource
{
  /**
   * Dismiss (delete) the specified alert from the specified publisher AdSense
   * account. (alerts.delete)
   *
   * @param string $accountId Account which contains the ad unit.
   * @param string $alertId Alert to delete.
   * @param array $optParams Optional parameters.
   */
  public function delete($accountId, $alertId, $optParams = array())
  {
    $params = array('accountId' => $accountId, 'alertId' => $alertId);
    $params = array_merge($params, $optParams);
    return $this->call('delete', array($params));
  }
  /**
   * List the alerts for the specified AdSense account.
   * (alerts.listAccountsAlerts)
   *
   * @param string $accountId Account for which to retrieve the alerts.
   * @param array $optParams Optional parameters.
   *
   * @opt_param string locale The locale to use for translating alert messages.
   * The account locale will be used if this is not supplied. The AdSense default
   * (English) will be used if the supplied locale is invalid or unsupported.
   * @return Google_Service_AdSense_Alerts
   */
  public function listAccountsAlerts($accountId, $optParams = array())
  {
    $params = array('accountId' => $accountId);
    $params = array_merge($params, $optParams);
    return $this->call('list', array($params), "Google_Service_AdSense_Alerts");
  }
}
