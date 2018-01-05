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
 * The "releases" collection of methods.
 * Typical usage is:
 *  <code>
 *   $firebaserulesService = new Google_Service_FirebaseRulesAPI(...);
 *   $releases = $firebaserulesService->releases;
 *  </code>
 */
class Google_Service_FirebaseRulesAPI_Resource_ProjectsReleases extends Google_Service_Resource
{
  /**
   * Create a `Release`.
   *
   * Release names should reflect the developer's deployment practices. For
   * example, the release name may include the environment name, application name,
   * application version, or any other name meaningful to the developer. Once a
   * `Release` refers to a `Ruleset`, the rules can be enforced by Firebase Rules-
   * enabled services.
   *
   * More than one `Release` may be 'live' concurrently. Consider the following
   * three `Release` names for `projects/foo` and the `Ruleset` to which they
   * refer.
   *
   * Release Name                    | Ruleset Name
   * --------------------------------|------------- projects/foo/releases/prod
   * | projects/foo/rulesets/uuid123 projects/foo/releases/prod/beta |
   * projects/foo/rulesets/uuid123 projects/foo/releases/prod/v23  |
   * projects/foo/rulesets/uuid456
   *
   * The table reflects the `Ruleset` rollout in progress. The `prod` and
   * `prod/beta` releases refer to the same `Ruleset`. However, `prod/v23` refers
   * to a new `Ruleset`. The `Ruleset` reference for a `Release` may be updated
   * using the UpdateRelease method, and the custom `Release` name may be
   * referenced by specifying the `X-Firebase-Rules-Release-Name` header.
   * (releases.create)
   *
   * @param string $name Resource name for the project which owns this `Release`.
   *
   * Format: `projects/{project_id}`
   * @param Google_Service_FirebaseRulesAPI_Release $postBody
   * @param array $optParams Optional parameters.
   * @return Google_Service_FirebaseRulesAPI_Release
   */
  public function create($name, Google_Service_FirebaseRulesAPI_Release $postBody, $optParams = array())
  {
    $params = array('name' => $name, 'postBody' => $postBody);
    $params = array_merge($params, $optParams);
    return $this->call('create', array($params), "Google_Service_FirebaseRulesAPI_Release");
  }
  /**
   * Delete a `Release` by resource name. (releases.delete)
   *
   * @param string $name Resource name for the `Release` to delete.
   *
   * Format: `projects/{project_id}/releases/{release_id}`
   * @param array $optParams Optional parameters.
   * @return Google_Service_FirebaseRulesAPI_FirebaserulesEmpty
   */
  public function delete($name, $optParams = array())
  {
    $params = array('name' => $name);
    $params = array_merge($params, $optParams);
    return $this->call('delete', array($params), "Google_Service_FirebaseRulesAPI_FirebaserulesEmpty");
  }
  /**
   * Get a `Release` by name. (releases.get)
   *
   * @param string $name Resource name of the `Release`.
   *
   * Format: `projects/{project_id}/releases/{release_id}`
   * @param array $optParams Optional parameters.
   * @return Google_Service_FirebaseRulesAPI_Release
   */
  public function get($name, $optParams = array())
  {
    $params = array('name' => $name);
    $params = array_merge($params, $optParams);
    return $this->call('get', array($params), "Google_Service_FirebaseRulesAPI_Release");
  }
  /**
   * List the `Release` values for a project. This list may optionally be filtered
   * by `Release` name or `Ruleset` id or both. (releases.listProjectsReleases)
   *
   * @param string $name Resource name for the project.
   *
   * Format: `projects/{project_id}`
   * @param array $optParams Optional parameters.
   *
   * @opt_param string filter `Release` filter. The list method supports filters
   * with restrictions on the `Release` `name` and also on the `Ruleset`
   * `ruleset_name`.
   *
   * Example 1) A filter of 'name=prod*' might return `Release`s with names within
   * 'projects/foo' prefixed with 'prod':
   *
   * Name                          | Ruleset Name
   * ------------------------------|------------- projects/foo/releases/prod    |
   * projects/foo/rulesets/uuid1234 projects/foo/releases/prod/v1 |
   * projects/foo/rulesets/uuid1234 projects/foo/releases/prod/v2 |
   * projects/foo/rulesets/uuid8888
   *
   * Example 2) A filter of `name=prod* ruleset_name=uuid1234` would return only
   * `Release` instances for 'projects/foo' with names prefixed with 'prod'
   * referring to the same `Ruleset` name of 'uuid1234':
   *
   * Name                          | Ruleset Name
   * ------------------------------|------------- projects/foo/releases/prod    |
   * projects/foo/rulesets/1234 projects/foo/releases/prod/v1 |
   * projects/foo/rulesets/1234
   *
   * In the examples, the filter parameters refer to the search filters for
   * release and ruleset names are relative to the project releases and rulesets
   * collections. Fully qualified prefixed may also be used. e.g.
   * `name=projects/foo/releases/prod* ruleset_name=projects/foo/rulesets/uuid1`
   * @opt_param string pageToken Next page token for the next batch of `Release`
   * instances.
   * @opt_param int pageSize Page size to load. Maximum of 100. Defaults to 10.
   * Note: `page_size` is just a hint and the service may choose to load less than
   * `page_size` due to the size of the output. To traverse all of the releases,
   * caller should iterate until the `page_token` is empty.
   * @return Google_Service_FirebaseRulesAPI_ListReleasesResponse
   */
  public function listProjectsReleases($name, $optParams = array())
  {
    $params = array('name' => $name);
    $params = array_merge($params, $optParams);
    return $this->call('list', array($params), "Google_Service_FirebaseRulesAPI_ListReleasesResponse");
  }
  /**
   * Update a `Release`.
   *
   * Only updates to the `ruleset_name` field will be honored. `Release` rename is
   * not supported. To create a `Release` use the CreateRelease method instead.
   * (releases.update)
   *
   * @param string $name Resource name for the `Release`.
   *
   * `Release` names may be structured `app1/prod/v2` or flat `app1_prod_v2` which
   * affords developers a great deal of flexibility in mapping the name to the
   * style that best fits their existing development practices. For example, a
   * name could refer to an environment, an app, a version, or some combination of
   * three.
   *
   * In the table below, for the project name `projects/foo`, the following
   * relative release paths show how flat and structured names might be chosen to
   * match a desired development / deployment strategy.
   *
   * Use Case     | Flat Name           | Structured Name
   * -------------|---------------------|---------------- Environments |
   * releases/qa         | releases/qa Apps         | releases/app1_qa    |
   * releases/app1/qa Versions     | releases/app1_v2_qa | releases/app1/v2/qa
   *
   * The delimiter between the release name path elements can be almost anything
   * and it should work equally well with the release name list filter, but in
   * many ways the structured paths provide a clearer picture of the relationship
   * between `Release` instances.
   *
   * Format: `projects/{project_id}/releases/{release_id}`
   * @param Google_Service_FirebaseRulesAPI_Release $postBody
   * @param array $optParams Optional parameters.
   * @return Google_Service_FirebaseRulesAPI_Release
   */
  public function update($name, Google_Service_FirebaseRulesAPI_Release $postBody, $optParams = array())
  {
    $params = array('name' => $name, 'postBody' => $postBody);
    $params = array_merge($params, $optParams);
    return $this->call('update', array($params), "Google_Service_FirebaseRulesAPI_Release");
  }
}
