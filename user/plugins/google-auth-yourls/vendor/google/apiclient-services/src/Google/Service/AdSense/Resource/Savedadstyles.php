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
 * The "savedadstyles" collection of methods.
 * Typical usage is:
 *  <code>
 *   $adsenseService = new Google_Service_AdSense(...);
 *   $savedadstyles = $adsenseService->savedadstyles;
 *  </code>
 */
class Google_Service_AdSense_Resource_Savedadstyles extends Google_Service_Resource
{
  /**
   * Get a specific saved ad style from the user's account. (savedadstyles.get)
   *
   * @param string $savedAdStyleId Saved ad style to retrieve.
   * @param array $optParams Optional parameters.
   * @return Google_Service_AdSense_SavedAdStyle
   */
  public function get($savedAdStyleId, $optParams = array())
  {
    $params = array('savedAdStyleId' => $savedAdStyleId);
    $params = array_merge($params, $optParams);
    return $this->call('get', array($params), "Google_Service_AdSense_SavedAdStyle");
  }
  /**
   * List all saved ad styles in the user's account.
   * (savedadstyles.listSavedadstyles)
   *
   * @param array $optParams Optional parameters.
   *
   * @opt_param int maxResults The maximum number of saved ad styles to include in
   * the response, used for paging.
   * @opt_param string pageToken A continuation token, used to page through saved
   * ad styles. To retrieve the next page, set this parameter to the value of
   * "nextPageToken" from the previous response.
   * @return Google_Service_AdSense_SavedAdStyles
   */
  public function listSavedadstyles($optParams = array())
  {
    $params = array();
    $params = array_merge($params, $optParams);
    return $this->call('list', array($params), "Google_Service_AdSense_SavedAdStyles");
  }
}
