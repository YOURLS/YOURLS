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
class Google_Service_AdSense_Resource_AccountsSavedadstyles extends Google_Service_Resource
{
  /**
   * List a specific saved ad style for the specified account. (savedadstyles.get)
   *
   * @param string $accountId Account for which to get the saved ad style.
   * @param string $savedAdStyleId Saved ad style to retrieve.
   * @param array $optParams Optional parameters.
   * @return Google_Service_AdSense_SavedAdStyle
   */
  public function get($accountId, $savedAdStyleId, $optParams = array())
  {
    $params = array('accountId' => $accountId, 'savedAdStyleId' => $savedAdStyleId);
    $params = array_merge($params, $optParams);
    return $this->call('get', array($params), "Google_Service_AdSense_SavedAdStyle");
  }
  /**
   * List all saved ad styles in the specified account.
   * (savedadstyles.listAccountsSavedadstyles)
   *
   * @param string $accountId Account for which to list saved ad styles.
   * @param array $optParams Optional parameters.
   *
   * @opt_param int maxResults The maximum number of saved ad styles to include in
   * the response, used for paging.
   * @opt_param string pageToken A continuation token, used to page through saved
   * ad styles. To retrieve the next page, set this parameter to the value of
   * "nextPageToken" from the previous response.
   * @return Google_Service_AdSense_SavedAdStyles
   */
  public function listAccountsSavedadstyles($accountId, $optParams = array())
  {
    $params = array('accountId' => $accountId);
    $params = array_merge($params, $optParams);
    return $this->call('list', array($params), "Google_Service_AdSense_SavedAdStyles");
  }
}
