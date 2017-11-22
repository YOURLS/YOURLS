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
 * The "services" collection of methods.
 * Typical usage is:
 *  <code>
 *   $serviceconsumermanagementService = new Google_Service_ServiceConsumerManagement(...);
 *   $services = $serviceconsumermanagementService->services;
 *  </code>
 */
class Google_Service_ServiceConsumerManagement_Resource_Services extends Google_Service_Resource
{
  /**
   * Search tenancy units for a service. (services.search)
   *
   * @param string $parent Service for which search is performed.
   * services/{service} {service} the name of a service, for example
   * 'service.googleapis.com'.
   * @param array $optParams Optional parameters.
   *
   * @opt_param string pageToken The continuation token, which is used to page
   * through large result sets. To get the next page of results, set this
   * parameter to the value of `nextPageToken` from the previous response.
   *
   * Optional.
   * @opt_param int pageSize The maximum number of results returned by this
   * request. Currently, the default maximum is set to 1000. If page_size is not
   * provided or provided a number larger than 1000, it will be automatically set
   * to 1000.
   *
   * Optional.
   * @opt_param string query Set a query `{expression}` for querying tenancy
   * units. Your `{expression}` must be in the format:
   * `field_name=literal_string`. The `field_name` is the name of the field you
   * want to compare. Supported fields are `tenant_resources.tag`
   * and`tenant_resources.resource`.
   *
   * For example, to search tenancy units that contain at least one tenant
   * resource with given tag 'xyz', use query `tenant_resources.tag=xyz`. To
   * search tenancy units that contain at least one tenant resource with given
   * resource name 'projects/123456', use query
   * `tenant_resources.resource=projects/123456`.
   *
   * Multiple expressions can be joined with `AND`s. Tenancy units must match all
   * expressions to be included in the result set. For example,
   * `tenant_resources.tag=xyz AND tenant_resources.resource=projects/123456`
   *
   * Optional.
   * @return Google_Service_ServiceConsumerManagement_SearchTenancyUnitsResponse
   */
  public function search($parent, $optParams = array())
  {
    $params = array('parent' => $parent);
    $params = array_merge($params, $optParams);
    return $this->call('search', array($params), "Google_Service_ServiceConsumerManagement_SearchTenancyUnitsResponse");
  }
}
