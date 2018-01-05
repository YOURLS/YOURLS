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
 * The "settings" collection of methods.
 * Typical usage is:
 *  <code>
 *   $mirrorService = new Google_Service_Mirror(...);
 *   $settings = $mirrorService->settings;
 *  </code>
 */
class Google_Service_Mirror_Resource_Settings extends Google_Service_Resource
{
  /**
   * Gets a single setting by ID. (settings.get)
   *
   * @param string $id The ID of the setting. The following IDs are valid: -
   * locale - The key to the user’s language/locale (BCP 47 identifier) that
   * Glassware should use to render localized content.  - timezone - The key to
   * the user’s current time zone region as defined in the tz database. Example:
   * America/Los_Angeles.
   * @param array $optParams Optional parameters.
   * @return Google_Service_Mirror_Setting
   */
  public function get($id, $optParams = array())
  {
    $params = array('id' => $id);
    $params = array_merge($params, $optParams);
    return $this->call('get', array($params), "Google_Service_Mirror_Setting");
  }
}
