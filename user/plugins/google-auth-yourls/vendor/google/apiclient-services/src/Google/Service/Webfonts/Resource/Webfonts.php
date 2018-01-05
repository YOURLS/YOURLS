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
 * The "webfonts" collection of methods.
 * Typical usage is:
 *  <code>
 *   $webfontsService = new Google_Service_Webfonts(...);
 *   $webfonts = $webfontsService->webfonts;
 *  </code>
 */
class Google_Service_Webfonts_Resource_Webfonts extends Google_Service_Resource
{
  /**
   * Retrieves the list of fonts currently served by the Google Fonts Developer
   * API (webfonts.listWebfonts)
   *
   * @param array $optParams Optional parameters.
   *
   * @opt_param string sort Enables sorting of the list
   * @return Google_Service_Webfonts_WebfontList
   */
  public function listWebfonts($optParams = array())
  {
    $params = array();
    $params = array_merge($params, $optParams);
    return $this->call('list', array($params), "Google_Service_Webfonts_WebfontList");
  }
}
