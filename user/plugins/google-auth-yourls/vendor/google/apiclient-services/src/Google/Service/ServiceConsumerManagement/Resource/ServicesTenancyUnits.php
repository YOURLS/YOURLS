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
 * The "tenancyUnits" collection of methods.
 * Typical usage is:
 *  <code>
 *   $serviceconsumermanagementService = new Google_Service_ServiceConsumerManagement(...);
 *   $tenancyUnits = $serviceconsumermanagementService->tenancyUnits;
 *  </code>
 */
class Google_Service_ServiceConsumerManagement_Resource_ServicesTenancyUnits extends Google_Service_Resource
{
  /**
   * Add a new tenant project to the tenancy unit. If there are previously failed
   * AddTenantProject calls, you might need to call RemoveTenantProject first to
   * clean them before you can make another AddTenantProject with the same tag.
   * Operation. (tenancyUnits.addProject)
   *
   * @param string $parent Name of the tenancy unit.
   * @param Google_Service_ServiceConsumerManagement_AddTenantProjectRequest $postBody
   * @param array $optParams Optional parameters.
   * @return Google_Service_ServiceConsumerManagement_Operation
   */
  public function addProject($parent, Google_Service_ServiceConsumerManagement_AddTenantProjectRequest $postBody, $optParams = array())
  {
    $params = array('parent' => $parent, 'postBody' => $postBody);
    $params = array_merge($params, $optParams);
    return $this->call('addProject', array($params), "Google_Service_ServiceConsumerManagement_Operation");
  }
  /**
   * Creates a tenancy unit with no tenant resources. (tenancyUnits.create)
   *
   * @param string $parent services/{service}/{collection id}/{resource id}
   * {collection id} is the cloud resource collection type representing the
   * service consumer, for example 'projects', or 'organizations'. {resource id}
   * is the consumer numeric id, such as project number: '123456'. {service} the
   * name of a service, for example 'service.googleapis.com'. Enabled service
   * binding using the new tenancy unit.
   * @param Google_Service_ServiceConsumerManagement_CreateTenancyUnitRequest $postBody
   * @param array $optParams Optional parameters.
   * @return Google_Service_ServiceConsumerManagement_TenancyUnit
   */
  public function create($parent, Google_Service_ServiceConsumerManagement_CreateTenancyUnitRequest $postBody, $optParams = array())
  {
    $params = array('parent' => $parent, 'postBody' => $postBody);
    $params = array_merge($params, $optParams);
    return $this->call('create', array($params), "Google_Service_ServiceConsumerManagement_TenancyUnit");
  }
  /**
   * Delete tenancy unit.  Before the tenancy unit is deleted, there should be no
   * tenant resource in it. Operation. (tenancyUnits.delete)
   *
   * @param string $name Name of the tenancy unit to be deleted.
   * @param array $optParams Optional parameters.
   * @return Google_Service_ServiceConsumerManagement_Operation
   */
  public function delete($name, $optParams = array())
  {
    $params = array('name' => $name);
    $params = array_merge($params, $optParams);
    return $this->call('delete', array($params), "Google_Service_ServiceConsumerManagement_Operation");
  }
  /**
   * Find tenancy unit for a service and consumer. This method should not be used
   * in producers' runtime path, e.g. finding the tenant project number when
   * creating VMs. Producers should persist the tenant project information after
   * the project is created. (tenancyUnits.listServicesTenancyUnits)
   *
   * @param string $parent Service and consumer. Required.
   * services/{service}/{collection id}/{resource id} {collection id} is the cloud
   * resource collection type representing the service consumer, for example
   * 'projects', or 'organizations'. {resource id} is the consumer numeric id,
   * such as project number: '123456'. {service} the name of a service, for
   * example 'service.googleapis.com'.
   * @param array $optParams Optional parameters.
   *
   * @opt_param int pageSize The maximum number of results returned by this
   * request.
   * @opt_param string filter Filter expression over tenancy resources field.
   * Optional.
   * @opt_param string pageToken The continuation token, which is used to page
   * through large result sets. To get the next page of results, set this
   * parameter to the value of `nextPageToken` from the previous response.
   * @return Google_Service_ServiceConsumerManagement_ListTenancyUnitsResponse
   */
  public function listServicesTenancyUnits($parent, $optParams = array())
  {
    $params = array('parent' => $parent);
    $params = array_merge($params, $optParams);
    return $this->call('list', array($params), "Google_Service_ServiceConsumerManagement_ListTenancyUnitsResponse");
  }
  /**
   * Removes specified project resource identified by tenant resource tag. It will
   * remove project lien with 'TenantManager' origin if that was added. It will
   * then attempt to delete the project. If that operation fails, this method
   * fails. Operation. (tenancyUnits.removeProject)
   *
   * @param string $name Name of the tenancy unit. Such as
   * 'services/service.googleapis.com/projects/12345/tenancyUnits/abcd'.
   * @param Google_Service_ServiceConsumerManagement_RemoveTenantProjectRequest $postBody
   * @param array $optParams Optional parameters.
   * @return Google_Service_ServiceConsumerManagement_Operation
   */
  public function removeProject($name, Google_Service_ServiceConsumerManagement_RemoveTenantProjectRequest $postBody, $optParams = array())
  {
    $params = array('name' => $name, 'postBody' => $postBody);
    $params = array_merge($params, $optParams);
    return $this->call('removeProject', array($params), "Google_Service_ServiceConsumerManagement_Operation");
  }
}
