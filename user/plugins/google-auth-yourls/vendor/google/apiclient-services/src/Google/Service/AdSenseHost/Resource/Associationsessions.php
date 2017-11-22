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
 * The "associationsessions" collection of methods.
 * Typical usage is:
 *  <code>
 *   $adsensehostService = new Google_Service_AdSenseHost(...);
 *   $associationsessions = $adsensehostService->associationsessions;
 *  </code>
 */
class Google_Service_AdSenseHost_Resource_Associationsessions extends Google_Service_Resource
{
  /**
   * Create an association session for initiating an association with an AdSense
   * user. (associationsessions.start)
   *
   * @param string|array $productCode Products to associate with the user.
   * @param string $websiteUrl The URL of the user's hosted website.
   * @param array $optParams Optional parameters.
   *
   * @opt_param string userLocale The preferred locale of the user.
   * @opt_param string websiteLocale The locale of the user's hosted website.
   * @return Google_Service_AdSenseHost_AssociationSession
   */
  public function start($productCode, $websiteUrl, $optParams = array())
  {
    $params = array('productCode' => $productCode, 'websiteUrl' => $websiteUrl);
    $params = array_merge($params, $optParams);
    return $this->call('start', array($params), "Google_Service_AdSenseHost_AssociationSession");
  }
  /**
   * Verify an association session after the association callback returns from
   * AdSense signup. (associationsessions.verify)
   *
   * @param string $token The token returned to the association callback URL.
   * @param array $optParams Optional parameters.
   * @return Google_Service_AdSenseHost_AssociationSession
   */
  public function verify($token, $optParams = array())
  {
    $params = array('token' => $token);
    $params = array_merge($params, $optParams);
    return $this->call('verify', array($params), "Google_Service_AdSenseHost_AssociationSession");
  }
}
