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
 * The "mobileapppanels" collection of methods.
 * Typical usage is:
 *  <code>
 *   $surveysService = new Google_Service_Surveys(...);
 *   $mobileapppanels = $surveysService->mobileapppanels;
 *  </code>
 */
class Google_Service_Surveys_Resource_Mobileapppanels extends Google_Service_Resource
{
  /**
   * Retrieves a MobileAppPanel that is available to the authenticated user.
   * (mobileapppanels.get)
   *
   * @param string $panelId External URL ID for the panel.
   * @param array $optParams Optional parameters.
   * @return Google_Service_Surveys_MobileAppPanel
   */
  public function get($panelId, $optParams = array())
  {
    $params = array('panelId' => $panelId);
    $params = array_merge($params, $optParams);
    return $this->call('get', array($params), "Google_Service_Surveys_MobileAppPanel");
  }
  /**
   * Lists the MobileAppPanels available to the authenticated user.
   * (mobileapppanels.listMobileapppanels)
   *
   * @param array $optParams Optional parameters.
   *
   * @opt_param string maxResults
   * @opt_param string startIndex
   * @opt_param string token
   * @return Google_Service_Surveys_MobileAppPanelsListResponse
   */
  public function listMobileapppanels($optParams = array())
  {
    $params = array();
    $params = array_merge($params, $optParams);
    return $this->call('list', array($params), "Google_Service_Surveys_MobileAppPanelsListResponse");
  }
  /**
   * Updates a MobileAppPanel. Currently the only property that can be updated is
   * the owners property. (mobileapppanels.update)
   *
   * @param string $panelId External URL ID for the panel.
   * @param Google_Service_Surveys_MobileAppPanel $postBody
   * @param array $optParams Optional parameters.
   * @return Google_Service_Surveys_MobileAppPanel
   */
  public function update($panelId, Google_Service_Surveys_MobileAppPanel $postBody, $optParams = array())
  {
    $params = array('panelId' => $panelId, 'postBody' => $postBody);
    $params = array_merge($params, $optParams);
    return $this->call('update', array($params), "Google_Service_Surveys_MobileAppPanel");
  }
}
