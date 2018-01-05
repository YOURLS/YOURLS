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
 * The "i18nLanguages" collection of methods.
 * Typical usage is:
 *  <code>
 *   $youtubeService = new Google_Service_YouTube(...);
 *   $i18nLanguages = $youtubeService->i18nLanguages;
 *  </code>
 */
class Google_Service_YouTube_Resource_I18nLanguages extends Google_Service_Resource
{
  /**
   * Returns a list of application languages that the YouTube website supports.
   * (i18nLanguages.listI18nLanguages)
   *
   * @param string $part The part parameter specifies the i18nLanguage resource
   * properties that the API response will include. Set the parameter value to
   * snippet.
   * @param array $optParams Optional parameters.
   *
   * @opt_param string hl The hl parameter specifies the language that should be
   * used for text values in the API response.
   * @return Google_Service_YouTube_I18nLanguageListResponse
   */
  public function listI18nLanguages($part, $optParams = array())
  {
    $params = array('part' => $part);
    $params = array_merge($params, $optParams);
    return $this->call('list', array($params), "Google_Service_YouTube_I18nLanguageListResponse");
  }
}
