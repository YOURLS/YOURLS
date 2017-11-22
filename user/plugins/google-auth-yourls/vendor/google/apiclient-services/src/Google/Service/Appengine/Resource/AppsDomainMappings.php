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
 * The "domainMappings" collection of methods.
 * Typical usage is:
 *  <code>
 *   $appengineService = new Google_Service_Appengine(...);
 *   $domainMappings = $appengineService->domainMappings;
 *  </code>
 */
class Google_Service_Appengine_Resource_AppsDomainMappings extends Google_Service_Resource
{
  /**
   * Maps a domain to an application. A user must be authorized to administer a
   * domain in order to map it to an application. For a list of available
   * authorized domains, see AuthorizedDomains.ListAuthorizedDomains.
   * (domainMappings.create)
   *
   * @param string $appsId Part of `parent`. Name of the parent Application
   * resource. Example: apps/myapp.
   * @param Google_Service_Appengine_DomainMapping $postBody
   * @param array $optParams Optional parameters.
   *
   * @opt_param string overrideStrategy Whether the domain creation should
   * override any existing mappings for this domain. By default, overrides are
   * rejected.
   * @return Google_Service_Appengine_Operation
   */
  public function create($appsId, Google_Service_Appengine_DomainMapping $postBody, $optParams = array())
  {
    $params = array('appsId' => $appsId, 'postBody' => $postBody);
    $params = array_merge($params, $optParams);
    return $this->call('create', array($params), "Google_Service_Appengine_Operation");
  }
  /**
   * Deletes the specified domain mapping. A user must be authorized to administer
   * the associated domain in order to delete a DomainMapping resource.
   * (domainMappings.delete)
   *
   * @param string $appsId Part of `name`. Name of the resource to delete.
   * Example: apps/myapp/domainMappings/example.com.
   * @param string $domainMappingsId Part of `name`. See documentation of
   * `appsId`.
   * @param array $optParams Optional parameters.
   * @return Google_Service_Appengine_Operation
   */
  public function delete($appsId, $domainMappingsId, $optParams = array())
  {
    $params = array('appsId' => $appsId, 'domainMappingsId' => $domainMappingsId);
    $params = array_merge($params, $optParams);
    return $this->call('delete', array($params), "Google_Service_Appengine_Operation");
  }
  /**
   * Gets the specified domain mapping. (domainMappings.get)
   *
   * @param string $appsId Part of `name`. Name of the resource requested.
   * Example: apps/myapp/domainMappings/example.com.
   * @param string $domainMappingsId Part of `name`. See documentation of
   * `appsId`.
   * @param array $optParams Optional parameters.
   * @return Google_Service_Appengine_DomainMapping
   */
  public function get($appsId, $domainMappingsId, $optParams = array())
  {
    $params = array('appsId' => $appsId, 'domainMappingsId' => $domainMappingsId);
    $params = array_merge($params, $optParams);
    return $this->call('get', array($params), "Google_Service_Appengine_DomainMapping");
  }
  /**
   * Lists the domain mappings on an application.
   * (domainMappings.listAppsDomainMappings)
   *
   * @param string $appsId Part of `parent`. Name of the parent Application
   * resource. Example: apps/myapp.
   * @param array $optParams Optional parameters.
   *
   * @opt_param string pageToken Continuation token for fetching the next page of
   * results.
   * @opt_param int pageSize Maximum results to return per page.
   * @return Google_Service_Appengine_ListDomainMappingsResponse
   */
  public function listAppsDomainMappings($appsId, $optParams = array())
  {
    $params = array('appsId' => $appsId);
    $params = array_merge($params, $optParams);
    return $this->call('list', array($params), "Google_Service_Appengine_ListDomainMappingsResponse");
  }
  /**
   * Updates the specified domain mapping. To map an SSL certificate to a domain
   * mapping, update certificate_id to point to an AuthorizedCertificate resource.
   * A user must be authorized to administer the associated domain in order to
   * update a DomainMapping resource. (domainMappings.patch)
   *
   * @param string $appsId Part of `name`. Name of the resource to update.
   * Example: apps/myapp/domainMappings/example.com.
   * @param string $domainMappingsId Part of `name`. See documentation of
   * `appsId`.
   * @param Google_Service_Appengine_DomainMapping $postBody
   * @param array $optParams Optional parameters.
   *
   * @opt_param string updateMask Standard field mask for the set of fields to be
   * updated.
   * @return Google_Service_Appengine_Operation
   */
  public function patch($appsId, $domainMappingsId, Google_Service_Appengine_DomainMapping $postBody, $optParams = array())
  {
    $params = array('appsId' => $appsId, 'domainMappingsId' => $domainMappingsId, 'postBody' => $postBody);
    $params = array_merge($params, $optParams);
    return $this->call('patch', array($params), "Google_Service_Appengine_Operation");
  }
}
