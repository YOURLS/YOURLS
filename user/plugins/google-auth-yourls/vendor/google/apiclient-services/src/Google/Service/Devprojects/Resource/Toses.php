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
 * The "toses" collection of methods.
 * Typical usage is:
 *  <code>
 *   $devprojectsService = new Google_Service_Devprojects(...);
 *   $toses = $devprojectsService->toses;
 *  </code>
 */
class Google_Service_Devprojects_Resource_Toses extends Google_Service_Resource
{
  /**
   * A message to accept at least one terms of service within at least one
   * context. Any number of contexts and terms can be provided, and each provided
   * terms will be accepted in each provided context. (toses.accept)
   *
   * @param Google_Service_Devprojects_TosesAcceptRequest $postBody
   * @param array $optParams Optional parameters.
   *
   * @opt_param string whitelistId The whitelist project ID. See
   * Projects.Insert.whitelist_id documentation for details.
   * @return Google_Service_Devprojects_TosesAcceptResponse
   */
  public function accept(Google_Service_Devprojects_TosesAcceptRequest $postBody, $optParams = array())
  {
    $params = array('postBody' => $postBody);
    $params = array_merge($params, $optParams);
    return $this->call('accept', array($params), "Google_Service_Devprojects_TosesAcceptResponse");
  }
  /**
   * A message to check whether or not the provided terms have been accepted in
   * any of the provided contexts. In most cases, the context will usually be just
   * a user, just a project, or a user and a project. (toses.check)
   *
   * @param Google_Service_Devprojects_TosesCheckRequest $postBody
   * @param array $optParams Optional parameters.
   *
   * @opt_param string whitelistId The whitelist project ID. See
   * Projects.Insert.whitelist_id documentation for details.
   * @return Google_Service_Devprojects_TosesCheckResponse
   */
  public function check(Google_Service_Devprojects_TosesCheckRequest $postBody, $optParams = array())
  {
    $params = array('postBody' => $postBody);
    $params = array_merge($params, $optParams);
    return $this->call('check', array($params), "Google_Service_Devprojects_TosesCheckResponse");
  }
  /**
   * Get specific terms (toses.get)
   *
   * @param string $tosId The terms-of-service (TOS) ID.
   * @param array $optParams Optional parameters.
   *
   * @opt_param string userId user for whom to get a tos url
   * @opt_param string whitelistId The whitelist project ID. See
   * Projects.Insert.whitelist_id documentation for details.
   * @return Google_Service_Devprojects_TermsOfService
   */
  public function get($tosId, $optParams = array())
  {
    $params = array('tosId' => $tosId);
    $params = array_merge($params, $optParams);
    return $this->call('get', array($params), "Google_Service_Devprojects_TermsOfService");
  }
  /**
   * Obtain a list of ToSes meeting certain criteria (toses.listToses)
   *
   * @param array $optParams Optional parameters.
   *
   * @opt_param string apiKey If this list is nonempty, only return ToSes for APIs
   * in the list.
   * @opt_param string projectId Return only ToSes that apply to the given project
   * @opt_param string user Return only ToSes that the given user must accept
   * @opt_param string whitelistId The whitelist project ID. See
   * Projects.Insert.whitelist_id documentation for details.
   * @return Google_Service_Devprojects_TosesListResponse
   */
  public function listToses($optParams = array())
  {
    $params = array();
    $params = array_merge($params, $optParams);
    return $this->call('list', array($params), "Google_Service_Devprojects_TosesListResponse");
  }
}
