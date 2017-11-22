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
 *   $firebaseremoteconfigService = new Google_Service_FirebaseRemoteConfig(...);
 *   $projects = $firebaseremoteconfigService->projects;
 *  </code>
 */
class Google_Service_FirebaseRemoteConfig_Resource_Projects extends Google_Service_Resource
{
  /**
   * Get the latest version Remote Configuration for a project. Returns the
   * RemoteConfig as the payload, and also the eTag as a response header.
   * (projects.getRemoteConfig)
   *
   * @param string $project The GMP project identifier. Required. See note at the
   * beginning of this file regarding project ids.
   * @param array $optParams Optional parameters.
   * @return Google_Service_FirebaseRemoteConfig_RemoteConfig
   */
  public function getRemoteConfig($project, $optParams = array())
  {
    $params = array('project' => $project);
    $params = array_merge($params, $optParams);
    return $this->call('getRemoteConfig', array($params), "Google_Service_FirebaseRemoteConfig_RemoteConfig");
  }
  /**
   * Update a RemoteConfig. We treat this as an always-existing resource (when it
   * is not found in our data store, we treat it as version 0, a template with
   * zero conditions and zero parameters). Hence there are no Create or Delete
   * operations. Returns the updated template when successful (and the updated
   * eTag as a response header), or an error if things go wrong. Possible error
   * messages: * VALIDATION_ERROR (HTTP status 400) with additional details if the
   * template being passed in can not be validated. * AUTHENTICATION_ERROR (HTTP
   * status 401) if the request can not be authenticate (e.g. no access token, or
   * invalid access token). * AUTHORIZATION_ERROR (HTTP status 403) if the request
   * can not be authorized (e.g. the user has no access to the specified project
   * id). * VERSION_MISMATCH (HTTP status 412) when trying to update when the
   * expected eTag (passed in via the "If-match" header) is not specified, or is
   * specified but does does not match the current eTag. * Internal error (HTTP
   * status 500) for Database problems or other internal errors.
   * (projects.updateRemoteConfig)
   *
   * @param string $project The GMP project identifier. Required. See note at the
   * beginning of this file regarding project ids.
   * @param Google_Service_FirebaseRemoteConfig_RemoteConfig $postBody
   * @param array $optParams Optional parameters.
   *
   * @opt_param bool validateOnly Optional. Defaults to false (UpdateRemoteConfig
   * call should update the backend if there are no validation/interal errors).
   * May be set to true to indicate that, should no validation errors occur, the
   * call should return a "200 OK" instead of performing the update. Note that
   * other error messages (500 Internal Error, 412 Version Mismatch, etc) may
   * still result after flipping to false, even if getting a "200 OK" when calling
   * with true.
   * @return Google_Service_FirebaseRemoteConfig_RemoteConfig
   */
  public function updateRemoteConfig($project, Google_Service_FirebaseRemoteConfig_RemoteConfig $postBody, $optParams = array())
  {
    $params = array('project' => $project, 'postBody' => $postBody);
    $params = array_merge($params, $optParams);
    return $this->call('updateRemoteConfig', array($params), "Google_Service_FirebaseRemoteConfig_RemoteConfig");
  }
}
