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
 * The "domainAliases" collection of methods.
 * Typical usage is:
 *  <code>
 *   $adminService = new Google_Service_Directory(...);
 *   $domainAliases = $adminService->domainAliases;
 *  </code>
 */
class Google_Service_Directory_Resource_DomainAliases extends Google_Service_Resource
{
  /**
   * Deletes a Domain Alias of the customer. (domainAliases.delete)
   *
   * @param string $customer Immutable ID of the G Suite account.
   * @param string $domainAliasName Name of domain alias to be retrieved.
   * @param array $optParams Optional parameters.
   */
  public function delete($customer, $domainAliasName, $optParams = array())
  {
    $params = array('customer' => $customer, 'domainAliasName' => $domainAliasName);
    $params = array_merge($params, $optParams);
    return $this->call('delete', array($params));
  }
  /**
   * Retrieves a domain alias of the customer. (domainAliases.get)
   *
   * @param string $customer Immutable ID of the G Suite account.
   * @param string $domainAliasName Name of domain alias to be retrieved.
   * @param array $optParams Optional parameters.
   * @return Google_Service_Directory_DomainAlias
   */
  public function get($customer, $domainAliasName, $optParams = array())
  {
    $params = array('customer' => $customer, 'domainAliasName' => $domainAliasName);
    $params = array_merge($params, $optParams);
    return $this->call('get', array($params), "Google_Service_Directory_DomainAlias");
  }
  /**
   * Inserts a Domain alias of the customer. (domainAliases.insert)
   *
   * @param string $customer Immutable ID of the G Suite account.
   * @param Google_Service_Directory_DomainAlias $postBody
   * @param array $optParams Optional parameters.
   * @return Google_Service_Directory_DomainAlias
   */
  public function insert($customer, Google_Service_Directory_DomainAlias $postBody, $optParams = array())
  {
    $params = array('customer' => $customer, 'postBody' => $postBody);
    $params = array_merge($params, $optParams);
    return $this->call('insert', array($params), "Google_Service_Directory_DomainAlias");
  }
  /**
   * Lists the domain aliases of the customer. (domainAliases.listDomainAliases)
   *
   * @param string $customer Immutable ID of the G Suite account.
   * @param array $optParams Optional parameters.
   *
   * @opt_param string parentDomainName Name of the parent domain for which domain
   * aliases are to be fetched.
   * @return Google_Service_Directory_DomainAliases
   */
  public function listDomainAliases($customer, $optParams = array())
  {
    $params = array('customer' => $customer);
    $params = array_merge($params, $optParams);
    return $this->call('list', array($params), "Google_Service_Directory_DomainAliases");
  }
}
