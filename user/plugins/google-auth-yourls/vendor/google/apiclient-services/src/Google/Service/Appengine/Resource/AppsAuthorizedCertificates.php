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
 * The "authorizedCertificates" collection of methods.
 * Typical usage is:
 *  <code>
 *   $appengineService = new Google_Service_Appengine(...);
 *   $authorizedCertificates = $appengineService->authorizedCertificates;
 *  </code>
 */
class Google_Service_Appengine_Resource_AppsAuthorizedCertificates extends Google_Service_Resource
{
  /**
   * Uploads the specified SSL certificate. (authorizedCertificates.create)
   *
   * @param string $appsId Part of `parent`. Name of the parent Application
   * resource. Example: apps/myapp.
   * @param Google_Service_Appengine_AuthorizedCertificate $postBody
   * @param array $optParams Optional parameters.
   * @return Google_Service_Appengine_AuthorizedCertificate
   */
  public function create($appsId, Google_Service_Appengine_AuthorizedCertificate $postBody, $optParams = array())
  {
    $params = array('appsId' => $appsId, 'postBody' => $postBody);
    $params = array_merge($params, $optParams);
    return $this->call('create', array($params), "Google_Service_Appengine_AuthorizedCertificate");
  }
  /**
   * Deletes the specified SSL certificate. (authorizedCertificates.delete)
   *
   * @param string $appsId Part of `name`. Name of the resource to delete.
   * Example: apps/myapp/authorizedCertificates/12345.
   * @param string $authorizedCertificatesId Part of `name`. See documentation of
   * `appsId`.
   * @param array $optParams Optional parameters.
   * @return Google_Service_Appengine_AppengineEmpty
   */
  public function delete($appsId, $authorizedCertificatesId, $optParams = array())
  {
    $params = array('appsId' => $appsId, 'authorizedCertificatesId' => $authorizedCertificatesId);
    $params = array_merge($params, $optParams);
    return $this->call('delete', array($params), "Google_Service_Appengine_AppengineEmpty");
  }
  /**
   * Gets the specified SSL certificate. (authorizedCertificates.get)
   *
   * @param string $appsId Part of `name`. Name of the resource requested.
   * Example: apps/myapp/authorizedCertificates/12345.
   * @param string $authorizedCertificatesId Part of `name`. See documentation of
   * `appsId`.
   * @param array $optParams Optional parameters.
   *
   * @opt_param string view Controls the set of fields returned in the GET
   * response.
   * @return Google_Service_Appengine_AuthorizedCertificate
   */
  public function get($appsId, $authorizedCertificatesId, $optParams = array())
  {
    $params = array('appsId' => $appsId, 'authorizedCertificatesId' => $authorizedCertificatesId);
    $params = array_merge($params, $optParams);
    return $this->call('get', array($params), "Google_Service_Appengine_AuthorizedCertificate");
  }
  /**
   * Lists all SSL certificates the user is authorized to administer.
   * (authorizedCertificates.listAppsAuthorizedCertificates)
   *
   * @param string $appsId Part of `parent`. Name of the parent Application
   * resource. Example: apps/myapp.
   * @param array $optParams Optional parameters.
   *
   * @opt_param string pageToken Continuation token for fetching the next page of
   * results.
   * @opt_param int pageSize Maximum results to return per page.
   * @opt_param string view Controls the set of fields returned in the LIST
   * response.
   * @return Google_Service_Appengine_ListAuthorizedCertificatesResponse
   */
  public function listAppsAuthorizedCertificates($appsId, $optParams = array())
  {
    $params = array('appsId' => $appsId);
    $params = array_merge($params, $optParams);
    return $this->call('list', array($params), "Google_Service_Appengine_ListAuthorizedCertificatesResponse");
  }
  /**
   * Updates the specified SSL certificate. To renew a certificate and maintain
   * its existing domain mappings, update certificate_data with a new certificate.
   * The new certificate must be applicable to the same domains as the original
   * certificate. The certificate display_name may also be updated.
   * (authorizedCertificates.patch)
   *
   * @param string $appsId Part of `name`. Name of the resource to update.
   * Example: apps/myapp/authorizedCertificates/12345.
   * @param string $authorizedCertificatesId Part of `name`. See documentation of
   * `appsId`.
   * @param Google_Service_Appengine_AuthorizedCertificate $postBody
   * @param array $optParams Optional parameters.
   *
   * @opt_param string updateMask Standard field mask for the set of fields to be
   * updated. Updates are only supported on the certificate_raw_data and
   * display_name fields.
   * @return Google_Service_Appengine_AuthorizedCertificate
   */
  public function patch($appsId, $authorizedCertificatesId, Google_Service_Appengine_AuthorizedCertificate $postBody, $optParams = array())
  {
    $params = array('appsId' => $appsId, 'authorizedCertificatesId' => $authorizedCertificatesId, 'postBody' => $postBody);
    $params = array_merge($params, $optParams);
    return $this->call('patch', array($params), "Google_Service_Appengine_AuthorizedCertificate");
  }
}
