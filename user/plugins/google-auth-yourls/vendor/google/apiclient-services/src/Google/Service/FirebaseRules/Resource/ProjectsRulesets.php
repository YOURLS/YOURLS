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
 * The "rulesets" collection of methods.
 * Typical usage is:
 *  <code>
 *   $firebaserulesService = new Google_Service_FirebaseRules(...);
 *   $rulesets = $firebaserulesService->rulesets;
 *  </code>
 */
class Google_Service_FirebaseRules_Resource_ProjectsRulesets extends Google_Service_Resource
{
  /**
   * Create a `Ruleset` from `Source`.
   *
   * The `Ruleset` is given a unique generated name which is returned to the
   * caller. `Source` containing syntactic or semantics errors will result in an
   * error response indicating the first error encountered. For a detailed view of
   * `Source` issues, use TestRuleset. (rulesets.create)
   *
   * @param string $name Resource name for Project which owns this `Ruleset`.
   *
   * Format: `projects/{project_id}`
   * @param Google_Service_FirebaseRules_Ruleset $postBody
   * @param array $optParams Optional parameters.
   * @return Google_Service_FirebaseRules_Ruleset
   */
  public function create($name, Google_Service_FirebaseRules_Ruleset $postBody, $optParams = array())
  {
    $params = array('name' => $name, 'postBody' => $postBody);
    $params = array_merge($params, $optParams);
    return $this->call('create', array($params), "Google_Service_FirebaseRules_Ruleset");
  }
  /**
   * Delete a `Ruleset` by resource name.
   *
   * If the `Ruleset` is referenced by a `Release` the operation will fail.
   * (rulesets.delete)
   *
   * @param string $name Resource name for the ruleset to delete.
   *
   * Format: `projects/{project_id}/rulesets/{ruleset_id}`
   * @param array $optParams Optional parameters.
   * @return Google_Service_FirebaseRules_FirebaserulesEmpty
   */
  public function delete($name, $optParams = array())
  {
    $params = array('name' => $name);
    $params = array_merge($params, $optParams);
    return $this->call('delete', array($params), "Google_Service_FirebaseRules_FirebaserulesEmpty");
  }
  /**
   * Get a `Ruleset` by name including the full `Source` contents. (rulesets.get)
   *
   * @param string $name Resource name for the ruleset to get.
   *
   * Format: `projects/{project_id}/rulesets/{ruleset_id}`
   * @param array $optParams Optional parameters.
   * @return Google_Service_FirebaseRules_Ruleset
   */
  public function get($name, $optParams = array())
  {
    $params = array('name' => $name);
    $params = array_merge($params, $optParams);
    return $this->call('get', array($params), "Google_Service_FirebaseRules_Ruleset");
  }
  /**
   * List `Ruleset` metadata only and optionally filter the results by `Ruleset`
   * name.
   *
   * The full `Source` contents of a `Ruleset` may be retrieved with GetRuleset.
   * (rulesets.listProjectsRulesets)
   *
   * @param string $name Resource name for the project.
   *
   * Format: `projects/{project_id}`
   * @param array $optParams Optional parameters.
   *
   * @opt_param string pageToken Next page token for loading the next batch of
   * `Ruleset` instances.
   * @opt_param int pageSize Page size to load. Maximum of 100. Defaults to 10.
   * Note: `page_size` is just a hint and the service may choose to load less than
   * `page_size` due to the size of the output. To traverse all of the releases,
   * caller should iterate until the `page_token` is empty.
   * @opt_param string filter `Ruleset` filter. The list method supports filters
   * with restrictions on `Ruleset.name`.
   *
   * Filters on `Ruleset.create_time` should use the `date` function which parses
   * strings that conform to the RFC 3339 date/time specifications.
   *
   * Example: `create_time > date("2017-01-01") AND name=UUID-*`
   * @return Google_Service_FirebaseRules_ListRulesetsResponse
   */
  public function listProjectsRulesets($name, $optParams = array())
  {
    $params = array('name' => $name);
    $params = array_merge($params, $optParams);
    return $this->call('list', array($params), "Google_Service_FirebaseRules_ListRulesetsResponse");
  }
}
