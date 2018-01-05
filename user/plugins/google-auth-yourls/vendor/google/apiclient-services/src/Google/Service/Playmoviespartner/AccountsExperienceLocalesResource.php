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
 * The "experienceLocales" collection of methods.
 * Typical usage is:
 *  <code>
 *   $playmoviespartnerService = new Google_Service_Playmoviespartner(...);
 *   $experienceLocales = $playmoviespartnerService->experienceLocales;
 *  </code>
 */
class Google_Service_Playmoviespartner_AccountsExperienceLocalesResource extends Google_Service_Resource
{
  /**
   * Get an ExperienceLocale given its id. See _Authentication and Authorization
   * rules_ and _Get methods rules_ for more information about this method.
   * (experienceLocales.get)
   *
   * @param string $accountId REQUIRED. See _General rules_ for more information
   * about this field.
   * @param string $elId REQUIRED. ExperienceLocale ID, as defined by Google.
   * @param array $optParams Optional parameters.
   * @return Google_Service_Playmoviespartner_ExperienceLocale
   */
  public function get($accountId, $elId, $optParams = array())
  {
    $params = array('accountId' => $accountId, 'elId' => $elId);
    $params = array_merge($params, $optParams);
    return $this->call('get', array($params), "Google_Service_Playmoviespartner_ExperienceLocale");
  }
  /**
   * List ExperienceLocales owned or managed by the partner. See _Authentication
   * and Authorization rules_ and _List methods rules_ for more information about
   * this method. (experienceLocales.listAccountsExperienceLocales)
   *
   * @param string $accountId REQUIRED. See _General rules_ for more information
   * about this field.
   * @param array $optParams Optional parameters.
   *
   * @opt_param int pageSize See _List methods rules_ for info about this field.
   * @opt_param string pageToken See _List methods rules_ for info about this
   * field.
   * @opt_param string pphNames See _List methods rules_ for info about this
   * field.
   * @opt_param string studioNames See _List methods rules_ for info about this
   * field.
   * @opt_param string titleLevelEidr Filter ExperienceLocales that match a given
   * title-level EIDR.
   * @opt_param string editLevelEidr Filter ExperienceLocales that match a given
   * edit-level EIDR.
   * @opt_param string status Filter ExperienceLocales that match one of the given
   * status.
   * @opt_param string customId Filter ExperienceLocales that match a case-
   * insensitive, partner-specific custom id.
   * @opt_param string altCutId Filter ExperienceLocales that match a case-
   * insensitive, partner-specific Alternative Cut ID.
   * @return Google_Service_Playmoviespartner_ListExperienceLocalesResponse
   */
  public function listAccountsExperienceLocales($accountId, $optParams = array())
  {
    $params = array('accountId' => $accountId);
    $params = array_merge($params, $optParams);
    return $this->call('list', array($params), "Google_Service_Playmoviespartner_ListExperienceLocalesResponse");
  }
}
