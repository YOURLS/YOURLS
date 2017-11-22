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
 * The "ingressRules" collection of methods.
 * Typical usage is:
 *  <code>
 *   $appengineService = new Google_Service_Appengine(...);
 *   $ingressRules = $appengineService->ingressRules;
 *  </code>
 */
class Google_Service_Appengine_Resource_AppsFirewallIngressRules extends Google_Service_Resource
{
  /**
   * Replaces the entire firewall ruleset in one bulk operation. This overrides
   * and replaces the rules of an existing firewall with the new rules.If the
   * final rule does not match traffic with the '*' wildcard IP range, then an
   * "allow all" rule is explicitly added to the end of the list.
   * (ingressRules.batchUpdate)
   *
   * @param string $appsId Part of `name`. Name of the Firewall collection to set.
   * Example: apps/myapp/firewall/ingressRules.
   * @param Google_Service_Appengine_BatchUpdateIngressRulesRequest $postBody
   * @param array $optParams Optional parameters.
   * @return Google_Service_Appengine_BatchUpdateIngressRulesResponse
   */
  public function batchUpdate($appsId, Google_Service_Appengine_BatchUpdateIngressRulesRequest $postBody, $optParams = array())
  {
    $params = array('appsId' => $appsId, 'postBody' => $postBody);
    $params = array_merge($params, $optParams);
    return $this->call('batchUpdate', array($params), "Google_Service_Appengine_BatchUpdateIngressRulesResponse");
  }
  /**
   * Creates a firewall rule for the application. (ingressRules.create)
   *
   * @param string $appsId Part of `parent`. Name of the parent Firewall
   * collection in which to create a new rule. Example:
   * apps/myapp/firewall/ingressRules.
   * @param Google_Service_Appengine_FirewallRule $postBody
   * @param array $optParams Optional parameters.
   * @return Google_Service_Appengine_FirewallRule
   */
  public function create($appsId, Google_Service_Appengine_FirewallRule $postBody, $optParams = array())
  {
    $params = array('appsId' => $appsId, 'postBody' => $postBody);
    $params = array_merge($params, $optParams);
    return $this->call('create', array($params), "Google_Service_Appengine_FirewallRule");
  }
  /**
   * Deletes the specified firewall rule. (ingressRules.delete)
   *
   * @param string $appsId Part of `name`. Name of the Firewall resource to
   * delete. Example: apps/myapp/firewall/ingressRules/100.
   * @param string $ingressRulesId Part of `name`. See documentation of `appsId`.
   * @param array $optParams Optional parameters.
   * @return Google_Service_Appengine_AppengineEmpty
   */
  public function delete($appsId, $ingressRulesId, $optParams = array())
  {
    $params = array('appsId' => $appsId, 'ingressRulesId' => $ingressRulesId);
    $params = array_merge($params, $optParams);
    return $this->call('delete', array($params), "Google_Service_Appengine_AppengineEmpty");
  }
  /**
   * Gets the specified firewall rule. (ingressRules.get)
   *
   * @param string $appsId Part of `name`. Name of the Firewall resource to
   * retrieve. Example: apps/myapp/firewall/ingressRules/100.
   * @param string $ingressRulesId Part of `name`. See documentation of `appsId`.
   * @param array $optParams Optional parameters.
   * @return Google_Service_Appengine_FirewallRule
   */
  public function get($appsId, $ingressRulesId, $optParams = array())
  {
    $params = array('appsId' => $appsId, 'ingressRulesId' => $ingressRulesId);
    $params = array_merge($params, $optParams);
    return $this->call('get', array($params), "Google_Service_Appengine_FirewallRule");
  }
  /**
   * Lists the firewall rules of an application.
   * (ingressRules.listAppsFirewallIngressRules)
   *
   * @param string $appsId Part of `parent`. Name of the Firewall collection to
   * retrieve. Example: apps/myapp/firewall/ingressRules.
   * @param array $optParams Optional parameters.
   *
   * @opt_param string pageToken Continuation token for fetching the next page of
   * results.
   * @opt_param int pageSize Maximum results to return per page.
   * @opt_param string matchingAddress A valid IP Address. If set, only rules
   * matching this address will be returned. The first returned rule will be the
   * rule that fires on requests from this IP.
   * @return Google_Service_Appengine_ListIngressRulesResponse
   */
  public function listAppsFirewallIngressRules($appsId, $optParams = array())
  {
    $params = array('appsId' => $appsId);
    $params = array_merge($params, $optParams);
    return $this->call('list', array($params), "Google_Service_Appengine_ListIngressRulesResponse");
  }
  /**
   * Updates the specified firewall rule. (ingressRules.patch)
   *
   * @param string $appsId Part of `name`. Name of the Firewall resource to
   * update. Example: apps/myapp/firewall/ingressRules/100.
   * @param string $ingressRulesId Part of `name`. See documentation of `appsId`.
   * @param Google_Service_Appengine_FirewallRule $postBody
   * @param array $optParams Optional parameters.
   *
   * @opt_param string updateMask Standard field mask for the set of fields to be
   * updated.
   * @return Google_Service_Appengine_FirewallRule
   */
  public function patch($appsId, $ingressRulesId, Google_Service_Appengine_FirewallRule $postBody, $optParams = array())
  {
    $params = array('appsId' => $appsId, 'ingressRulesId' => $ingressRulesId, 'postBody' => $postBody);
    $params = array_merge($params, $optParams);
    return $this->call('patch', array($params), "Google_Service_Appengine_FirewallRule");
  }
}
