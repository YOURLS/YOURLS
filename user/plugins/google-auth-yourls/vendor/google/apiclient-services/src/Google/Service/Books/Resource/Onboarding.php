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
 * The "onboarding" collection of methods.
 * Typical usage is:
 *  <code>
 *   $booksService = new Google_Service_Books(...);
 *   $onboarding = $booksService->onboarding;
 *  </code>
 */
class Google_Service_Books_Resource_Onboarding extends Google_Service_Resource
{
  /**
   * List categories for onboarding experience. (onboarding.listCategories)
   *
   * @param array $optParams Optional parameters.
   *
   * @opt_param string locale ISO-639-1 language and ISO-3166-1 country code.
   * Default is en-US if unset.
   * @return Google_Service_Books_Category
   */
  public function listCategories($optParams = array())
  {
    $params = array();
    $params = array_merge($params, $optParams);
    return $this->call('listCategories', array($params), "Google_Service_Books_Category");
  }
  /**
   * List available volumes under categories for onboarding experience.
   * (onboarding.listCategoryVolumes)
   *
   * @param array $optParams Optional parameters.
   *
   * @opt_param string categoryId List of category ids requested.
   * @opt_param string locale ISO-639-1 language and ISO-3166-1 country code.
   * Default is en-US if unset.
   * @opt_param string maxAllowedMaturityRating The maximum allowed maturity
   * rating of returned volumes. Books with a higher maturity rating are filtered
   * out.
   * @opt_param string pageSize Number of maximum results per page to be included
   * in the response.
   * @opt_param string pageToken The value of the nextToken from the previous
   * page.
   * @return Google_Service_Books_Volume2
   */
  public function listCategoryVolumes($optParams = array())
  {
    $params = array();
    $params = array_merge($params, $optParams);
    return $this->call('listCategoryVolumes', array($params), "Google_Service_Books_Volume2");
  }
}
