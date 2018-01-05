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
 * The "projects" collection of methods.
 * Typical usage is:
 *  <code>
 *   $firebaserulesService = new Google_Service_FirebaseRulesAPI(...);
 *   $projects = $firebaserulesService->projects;
 *  </code>
 */
class Google_Service_FirebaseRulesAPI_Resource_Projects extends Google_Service_Resource
{
  /**
   * Test `Source` for syntactic and semantic correctness. Issues present in the
   * rules, if any, will be returned to the caller with a description, severity,
   * and source location.
   *
   * The test method will typically be executed with a developer provided
   * `Source`, but if regression testing is desired, this method may be executed
   * against a `Ruleset` resource name and the `Source` will be retrieved from the
   * persisted `Ruleset`.
   *
   * The following is an example of `Source` that permits users to upload images
   * to a bucket bearing their user id and matching the correct metadata:
   *
   * _*Example*_
   *
   *     // Users are allowed to subscribe and unsubscribe to the blog.
   * service firebase.storage {       match /users/{userId}/images/{imageName} {
   * allow write: if userId == request.userId               &&
   * (imageName.endsWith('.png') || imageName.endsWith('.jpg'))               &&
   * resource.mimeType.startsWith('image/')       }     } (projects.test)
   *
   * @param string $name Name of the project.
   *
   * Format: `projects/{project_id}`
   * @param Google_Service_FirebaseRulesAPI_TestRulesetRequest $postBody
   * @param array $optParams Optional parameters.
   * @return Google_Service_FirebaseRulesAPI_TestRulesetResponse
   */
  public function test($name, Google_Service_FirebaseRulesAPI_TestRulesetRequest $postBody, $optParams = array())
  {
    $params = array('name' => $name, 'postBody' => $postBody);
    $params = array_merge($params, $optParams);
    return $this->call('test', array($params), "Google_Service_FirebaseRulesAPI_TestRulesetResponse");
  }
}
