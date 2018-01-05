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
 * The "activationLinks" collection of methods.
 * Typical usage is:
 *  <code>
 *   $devprojectsService = new Google_Service_Devprojects(...);
 *   $activationLinks = $devprojectsService->activationLinks;
 *  </code>
 */
class Google_Service_Devprojects_Resource_ActivationLinks extends Google_Service_Resource
{
  /**
   * Generate activation links, a proper whitelist id is required.
   * (activationLinks.insert)
   *
   * @param Google_Service_Devprojects_ActivationLinksCollection $postBody
   * @param array $optParams Optional parameters.
   *
   * @opt_param string user Use for access control temporarily
   * @opt_param string whitelistId The whitelist project ID. See
   * Projects.Insert.whitelist_id documentation for details.
   * @return Google_Service_Devprojects_ActivationLinksCollection
   */
  public function insert(Google_Service_Devprojects_ActivationLinksCollection $postBody, $optParams = array())
  {
    $params = array('postBody' => $postBody);
    $params = array_merge($params, $optParams);
    return $this->call('insert', array($params), "Google_Service_Devprojects_ActivationLinksCollection");
  }
  /**
   * Validates an activation link. If successful, returns either the token OR type
   * for the API OR respectively component being activated and the key value pairs
   * contained in the signup token. For more details regarding sign-up tokens
   * please see: - for first-party (Google) APIs -
   * 'https://sites.google.com/a/google.com/developer-console/developer-console-
   * services/the-devrel-shard#TOC-Creating-signup-urls-a.k.a.-activation-tokens-'
   * - for third-party (Swarm/Endpoint) APIs - the producer-initiated activation
   * flow details here http://go/apiproduceconsume (activationLinks.validate)
   *
   * @param Google_Service_Devprojects_ActivationLinksValidateRequest $postBody
   * @param array $optParams Optional parameters.
   *
   * @opt_param string whitelistId The whitelist project ID. See
   * Projects.Insert.whitelist_id documentation for details.
   * @return Google_Service_Devprojects_ActivationLinksValidateResponse
   */
  public function validate(Google_Service_Devprojects_ActivationLinksValidateRequest $postBody, $optParams = array())
  {
    $params = array('postBody' => $postBody);
    $params = array_merge($params, $optParams);
    return $this->call('validate', array($params), "Google_Service_Devprojects_ActivationLinksValidateResponse");
  }
}
