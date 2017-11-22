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
 * The "apps" collection of methods.
 * Typical usage is:
 *  <code>
 *   $appengineService = new Google_Service_Appengine(...);
 *   $apps = $appengineService->apps;
 *  </code>
 */
class Google_Service_Appengine_Resource_Apps extends Google_Service_Resource
{
  /**
   * Creates an App Engine application for a Google Cloud Platform project.
   * Required fields: id - The ID of the target Cloud Platform project. location -
   * The region (https://cloud.google.com/appengine/docs/locations) where you want
   * the App Engine application located.For more information about App Engine
   * applications, see Managing Projects, Applications, and Billing
   * (https://cloud.google.com/appengine/docs/python/console/). (apps.create)
   *
   * @param Google_Service_Appengine_Application $postBody
   * @param array $optParams Optional parameters.
   * @return Google_Service_Appengine_Operation
   */
  public function create(Google_Service_Appengine_Application $postBody, $optParams = array())
  {
    $params = array('postBody' => $postBody);
    $params = array_merge($params, $optParams);
    return $this->call('create', array($params), "Google_Service_Appengine_Operation");
  }
  /**
   * Gets information about an application. (apps.get)
   *
   * @param string $appsId Part of `name`. Name of the Application resource to
   * get. Example: apps/myapp.
   * @param array $optParams Optional parameters.
   * @return Google_Service_Appengine_Application
   */
  public function get($appsId, $optParams = array())
  {
    $params = array('appsId' => $appsId);
    $params = array_merge($params, $optParams);
    return $this->call('get', array($params), "Google_Service_Appengine_Application");
  }
  /**
   * Updates the specified Application resource. You can update the following
   * fields: auth_domain - Google authentication domain for controlling user
   * access to the application. default_cookie_expiration - Cookie expiration
   * policy for the application. (apps.patch)
   *
   * @param string $appsId Part of `name`. Name of the Application resource to
   * update. Example: apps/myapp.
   * @param Google_Service_Appengine_Application $postBody
   * @param array $optParams Optional parameters.
   *
   * @opt_param string updateMask Standard field mask for the set of fields to be
   * updated.
   * @return Google_Service_Appengine_Operation
   */
  public function patch($appsId, Google_Service_Appengine_Application $postBody, $optParams = array())
  {
    $params = array('appsId' => $appsId, 'postBody' => $postBody);
    $params = array_merge($params, $optParams);
    return $this->call('patch', array($params), "Google_Service_Appengine_Operation");
  }
  /**
   * Recreates the required App Engine features for the specified App Engine
   * application, for example a Cloud Storage bucket or App Engine service
   * account. Use this method if you receive an error message about a missing
   * feature, for example, Error retrieving the App Engine service account.
   * (apps.repair)
   *
   * @param string $appsId Part of `name`. Name of the application to repair.
   * Example: apps/myapp
   * @param Google_Service_Appengine_RepairApplicationRequest $postBody
   * @param array $optParams Optional parameters.
   * @return Google_Service_Appengine_Operation
   */
  public function repair($appsId, Google_Service_Appengine_RepairApplicationRequest $postBody, $optParams = array())
  {
    $params = array('appsId' => $appsId, 'postBody' => $postBody);
    $params = array_merge($params, $optParams);
    return $this->call('repair', array($params), "Google_Service_Appengine_Operation");
  }
}
