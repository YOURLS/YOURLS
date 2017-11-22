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
 * The "rootCategories" collection of methods.
 * Typical usage is:
 *  <code>
 *   $dlpService = new Google_Service_DLP(...);
 *   $rootCategories = $dlpService->rootCategories;
 *  </code>
 */
class Google_Service_DLP_Resource_RootCategories extends Google_Service_Resource
{
  /**
   * Returns the list of root categories of sensitive information.
   * (rootCategories.listRootCategories)
   *
   * @param array $optParams Optional parameters.
   *
   * @opt_param string languageCode Optional language code for localized friendly
   * category names. If omitted or if localized strings are not available, en-US
   * strings will be returned.
   * @return Google_Service_DLP_GooglePrivacyDlpV2beta1ListRootCategoriesResponse
   */
  public function listRootCategories($optParams = array())
  {
    $params = array();
    $params = array_merge($params, $optParams);
    return $this->call('list', array($params), "Google_Service_DLP_GooglePrivacyDlpV2beta1ListRootCategoriesResponse");
  }
}
