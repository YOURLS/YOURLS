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
 * The "liens" collection of methods.
 * Typical usage is:
 *  <code>
 *   $cloudresourcemanagerService = new Google_Service_CloudResourceManager(...);
 *   $liens = $cloudresourcemanagerService->liens;
 *  </code>
 */
class Google_Service_CloudResourceManager_Resource_Liens extends Google_Service_Resource
{
  /**
   * Create a Lien which applies to the resource denoted by the `parent` field.
   *
   * Callers of this method will require permission on the `parent` resource. For
   * example, applying to `projects/1234` requires permission
   * `resourcemanager.projects.updateLiens`.
   *
   * NOTE: Some resources may limit the number of Liens which may be applied.
   * (liens.create)
   *
   * @param Google_Service_CloudResourceManager_Lien $postBody
   * @param array $optParams Optional parameters.
   * @return Google_Service_CloudResourceManager_Lien
   */
  public function create(Google_Service_CloudResourceManager_Lien $postBody, $optParams = array())
  {
    $params = array('postBody' => $postBody);
    $params = array_merge($params, $optParams);
    return $this->call('create', array($params), "Google_Service_CloudResourceManager_Lien");
  }
  /**
   * Delete a Lien by `name`.
   *
   * Callers of this method will require permission on the `parent` resource. For
   * example, a Lien with a `parent` of `projects/1234` requires permission
   * `resourcemanager.projects.updateLiens`. (liens.delete)
   *
   * @param string $name The name/identifier of the Lien to delete.
   * @param array $optParams Optional parameters.
   * @return Google_Service_CloudResourceManager_CloudresourcemanagerEmpty
   */
  public function delete($name, $optParams = array())
  {
    $params = array('name' => $name);
    $params = array_merge($params, $optParams);
    return $this->call('delete', array($params), "Google_Service_CloudResourceManager_CloudresourcemanagerEmpty");
  }
  /**
   * List all Liens applied to the `parent` resource.
   *
   * Callers of this method will require permission on the `parent` resource. For
   * example, a Lien with a `parent` of `projects/1234` requires permission
   * `resourcemanager.projects.get`. (liens.listLiens)
   *
   * @param array $optParams Optional parameters.
   *
   * @opt_param int pageSize The maximum number of items to return. This is a
   * suggestion for the server.
   * @opt_param string parent The name of the resource to list all attached Liens.
   * For example, `projects/1234`.
   * @opt_param string pageToken The `next_page_token` value returned from a
   * previous List request, if any.
   * @return Google_Service_CloudResourceManager_ListLiensResponse
   */
  public function listLiens($optParams = array())
  {
    $params = array();
    $params = array_merge($params, $optParams);
    return $this->call('list', array($params), "Google_Service_CloudResourceManager_ListLiensResponse");
  }
}
