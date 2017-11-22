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
 * The "versions" collection of methods.
 * Typical usage is:
 *  <code>
 *   $appengineService = new Google_Service_Appengine(...);
 *   $versions = $appengineService->versions;
 *  </code>
 */
class Google_Service_Appengine_Resource_AppsServicesVersions extends Google_Service_Resource
{
  /**
   * Deploys code and resource files to a new version. (versions.create)
   *
   * @param string $appsId Part of `parent`. Name of the parent resource to create
   * this version under. Example: apps/myapp/services/default.
   * @param string $servicesId Part of `parent`. See documentation of `appsId`.
   * @param Google_Service_Appengine_Version $postBody
   * @param array $optParams Optional parameters.
   * @return Google_Service_Appengine_Operation
   */
  public function create($appsId, $servicesId, Google_Service_Appengine_Version $postBody, $optParams = array())
  {
    $params = array('appsId' => $appsId, 'servicesId' => $servicesId, 'postBody' => $postBody);
    $params = array_merge($params, $optParams);
    return $this->call('create', array($params), "Google_Service_Appengine_Operation");
  }
  /**
   * Deletes an existing Version resource. (versions.delete)
   *
   * @param string $appsId Part of `name`. Name of the resource requested.
   * Example: apps/myapp/services/default/versions/v1.
   * @param string $servicesId Part of `name`. See documentation of `appsId`.
   * @param string $versionsId Part of `name`. See documentation of `appsId`.
   * @param array $optParams Optional parameters.
   * @return Google_Service_Appengine_Operation
   */
  public function delete($appsId, $servicesId, $versionsId, $optParams = array())
  {
    $params = array('appsId' => $appsId, 'servicesId' => $servicesId, 'versionsId' => $versionsId);
    $params = array_merge($params, $optParams);
    return $this->call('delete', array($params), "Google_Service_Appengine_Operation");
  }
  /**
   * Gets the specified Version resource. By default, only a BASIC_VIEW will be
   * returned. Specify the FULL_VIEW parameter to get the full resource.
   * (versions.get)
   *
   * @param string $appsId Part of `name`. Name of the resource requested.
   * Example: apps/myapp/services/default/versions/v1.
   * @param string $servicesId Part of `name`. See documentation of `appsId`.
   * @param string $versionsId Part of `name`. See documentation of `appsId`.
   * @param array $optParams Optional parameters.
   *
   * @opt_param string view Controls the set of fields returned in the Get
   * response.
   * @return Google_Service_Appengine_Version
   */
  public function get($appsId, $servicesId, $versionsId, $optParams = array())
  {
    $params = array('appsId' => $appsId, 'servicesId' => $servicesId, 'versionsId' => $versionsId);
    $params = array_merge($params, $optParams);
    return $this->call('get', array($params), "Google_Service_Appengine_Version");
  }
  /**
   * Lists the versions of a service. (versions.listAppsServicesVersions)
   *
   * @param string $appsId Part of `parent`. Name of the parent Service resource.
   * Example: apps/myapp/services/default.
   * @param string $servicesId Part of `parent`. See documentation of `appsId`.
   * @param array $optParams Optional parameters.
   *
   * @opt_param string pageToken Continuation token for fetching the next page of
   * results.
   * @opt_param int pageSize Maximum results to return per page.
   * @opt_param string view Controls the set of fields returned in the List
   * response.
   * @return Google_Service_Appengine_ListVersionsResponse
   */
  public function listAppsServicesVersions($appsId, $servicesId, $optParams = array())
  {
    $params = array('appsId' => $appsId, 'servicesId' => $servicesId);
    $params = array_merge($params, $optParams);
    return $this->call('list', array($params), "Google_Service_Appengine_ListVersionsResponse");
  }
  /**
   * Updates the specified Version resource. You can specify the following fields
   * depending on the App Engine environment and type of scaling that the version
   * resource uses: serving_status (https://cloud.google.com/appengine/docs/admin-
   * api/reference/rest/v1/apps.services.versions#Version.FIELDS.serving_status):
   * For Version resources that use basic scaling, manual scaling, or run in  the
   * App Engine flexible environment. instance_class
   * (https://cloud.google.com/appengine/docs/admin-
   * api/reference/rest/v1/apps.services.versions#Version.FIELDS.instance_class):
   * For Version resources that run in the App Engine standard environment.
   * automatic_scaling.min_idle_instances (https://cloud.google.com/appengine/docs
   * /admin-api/reference/rest/v1/apps.services.versions#Version.FIELDS.automatic_
   * scaling):  For Version resources that use automatic scaling and run in the
   * App  Engine standard environment. automatic_scaling.max_idle_instances
   * (https://cloud.google.com/appengine/docs/admin-api/reference/rest/v1/apps.ser
   * vices.versions#Version.FIELDS.automatic_scaling):  For Version resources that
   * use automatic scaling and run in the App  Engine standard environment.
   * automatic_scaling.min_total_instances
   * (https://cloud.google.com/appengine/docs/admin-api/reference/rest/v1/apps.ser
   * vices.versions#Version.FIELDS.automatic_scaling):  For Version resources that
   * use automatic scaling and run in the App  Engine Flexible environment.
   * automatic_scaling.max_total_instances
   * (https://cloud.google.com/appengine/docs/admin-api/reference/rest/v1/apps.ser
   * vices.versions#Version.FIELDS.automatic_scaling):  For Version resources that
   * use automatic scaling and run in the App  Engine Flexible environment.
   * automatic_scaling.cool_down_period_sec
   * (https://cloud.google.com/appengine/docs/admin-api/reference/rest/v1/apps.ser
   * vices.versions#Version.FIELDS.automatic_scaling):  For Version resources that
   * use automatic scaling and run in the App  Engine Flexible environment.
   * automatic_scaling.cpu_utilization.target_utilization
   * (https://cloud.google.com/appengine/docs/admin-api/reference/rest/v1/apps.ser
   * vices.versions#Version.FIELDS.automatic_scaling):  For Version resources that
   * use automatic scaling and run in the App  Engine Flexible environment.
   * (versions.patch)
   *
   * @param string $appsId Part of `name`. Name of the resource to update.
   * Example: apps/myapp/services/default/versions/1.
   * @param string $servicesId Part of `name`. See documentation of `appsId`.
   * @param string $versionsId Part of `name`. See documentation of `appsId`.
   * @param Google_Service_Appengine_Version $postBody
   * @param array $optParams Optional parameters.
   *
   * @opt_param string updateMask Standard field mask for the set of fields to be
   * updated.
   * @return Google_Service_Appengine_Operation
   */
  public function patch($appsId, $servicesId, $versionsId, Google_Service_Appengine_Version $postBody, $optParams = array())
  {
    $params = array('appsId' => $appsId, 'servicesId' => $servicesId, 'versionsId' => $versionsId, 'postBody' => $postBody);
    $params = array_merge($params, $optParams);
    return $this->call('patch', array($params), "Google_Service_Appengine_Operation");
  }
}
