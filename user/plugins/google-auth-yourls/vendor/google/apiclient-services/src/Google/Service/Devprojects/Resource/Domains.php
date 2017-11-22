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
 * The "domains" collection of methods.
 * Typical usage is:
 *  <code>
 *   $devprojectsService = new Google_Service_Devprojects(...);
 *   $domains = $devprojectsService->domains;
 *  </code>
 */
class Google_Service_Devprojects_Resource_Domains extends Google_Service_Resource
{
  /**
   * Retrieves the configuration data for a domain. (domains.get)
   *
   * @param string $domainsId The resource ID.
   * @param array $optParams Optional parameters.
   *
   * @opt_param string whitelistId The whitelist project ID. See
   * Projects.Insert.whitelist_id documentation for details.
   * @return Google_Service_Devprojects_DomainAccountData
   */
  public function get($domainsId, $optParams = array())
  {
    $params = array('domainsId' => $domainsId);
    $params = array_merge($params, $optParams);
    return $this->call('get', array($params), "Google_Service_Devprojects_DomainAccountData");
  }
  /**
   * Creates a domain account. (domains.insert)
   *
   * @param Google_Service_Devprojects_DomainAccountData $postBody
   * @param array $optParams Optional parameters.
   *
   * @opt_param string whitelistId The whitelist project ID. See
   * Projects.Insert.whitelist_id documentation for details.
   * @return Google_Service_Devprojects_DomainAccountData
   */
  public function insert(Google_Service_Devprojects_DomainAccountData $postBody, $optParams = array())
  {
    $params = array('postBody' => $postBody);
    $params = array_merge($params, $optParams);
    return $this->call('insert', array($params), "Google_Service_Devprojects_DomainAccountData");
  }
  /**
   * Updates a domain account. The resource will replace the current domain. This
   * method supports patch semantics. (domains.patch)
   *
   * @param string $domainsId The resource ID.
   * @param Google_Service_Devprojects_DomainAccountData $postBody
   * @param array $optParams Optional parameters.
   *
   * @opt_param string whitelistId The whitelist project ID. See
   * Projects.Insert.whitelist_id documentation for details.
   * @return Google_Service_Devprojects_DomainAccountData
   */
  public function patch($domainsId, Google_Service_Devprojects_DomainAccountData $postBody, $optParams = array())
  {
    $params = array('domainsId' => $domainsId, 'postBody' => $postBody);
    $params = array_merge($params, $optParams);
    return $this->call('patch', array($params), "Google_Service_Devprojects_DomainAccountData");
  }
  /**
   * Updates a domain account. The resource will replace the current domain.
   * (domains.update)
   *
   * @param string $domainsId The resource ID.
   * @param Google_Service_Devprojects_DomainAccountData $postBody
   * @param array $optParams Optional parameters.
   *
   * @opt_param string whitelistId The whitelist project ID. See
   * Projects.Insert.whitelist_id documentation for details.
   * @return Google_Service_Devprojects_DomainAccountData
   */
  public function update($domainsId, Google_Service_Devprojects_DomainAccountData $postBody, $optParams = array())
  {
    $params = array('domainsId' => $domainsId, 'postBody' => $postBody);
    $params = array_merge($params, $optParams);
    return $this->call('update', array($params), "Google_Service_Devprojects_DomainAccountData");
  }
}
