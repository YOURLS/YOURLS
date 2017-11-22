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
 * The "webResource" collection of methods.
 * Typical usage is:
 *  <code>
 *   $siteVerificationService = new Google_Service_SiteVerification(...);
 *   $webResource = $siteVerificationService->webResource;
 *  </code>
 */
class Google_Service_SiteVerification_Resource_WebResource extends Google_Service_Resource
{
  /**
   * Relinquish ownership of a website or domain. (webResource.delete)
   *
   * @param string $id The id of a verified site or domain.
   * @param array $optParams Optional parameters.
   */
  public function delete($id, $optParams = array())
  {
    $params = array('id' => $id);
    $params = array_merge($params, $optParams);
    return $this->call('delete', array($params));
  }
  /**
   * Get the most current data for a website or domain. (webResource.get)
   *
   * @param string $id The id of a verified site or domain.
   * @param array $optParams Optional parameters.
   * @return Google_Service_SiteVerification_SiteVerificationWebResourceResource
   */
  public function get($id, $optParams = array())
  {
    $params = array('id' => $id);
    $params = array_merge($params, $optParams);
    return $this->call('get', array($params), "Google_Service_SiteVerification_SiteVerificationWebResourceResource");
  }
  /**
   * Get a verification token for placing on a website or domain.
   * (webResource.getToken)
   *
   * @param Google_Service_SiteVerification_SiteVerificationWebResourceGettokenRequest $postBody
   * @param array $optParams Optional parameters.
   * @return Google_Service_SiteVerification_SiteVerificationWebResourceGettokenResponse
   */
  public function getToken(Google_Service_SiteVerification_SiteVerificationWebResourceGettokenRequest $postBody, $optParams = array())
  {
    $params = array('postBody' => $postBody);
    $params = array_merge($params, $optParams);
    return $this->call('getToken', array($params), "Google_Service_SiteVerification_SiteVerificationWebResourceGettokenResponse");
  }
  /**
   * Attempt verification of a website or domain. (webResource.insert)
   *
   * @param string $verificationMethod The method to use for verifying a site or
   * domain.
   * @param Google_Service_SiteVerification_SiteVerificationWebResourceResource $postBody
   * @param array $optParams Optional parameters.
   * @return Google_Service_SiteVerification_SiteVerificationWebResourceResource
   */
  public function insert($verificationMethod, Google_Service_SiteVerification_SiteVerificationWebResourceResource $postBody, $optParams = array())
  {
    $params = array('verificationMethod' => $verificationMethod, 'postBody' => $postBody);
    $params = array_merge($params, $optParams);
    return $this->call('insert', array($params), "Google_Service_SiteVerification_SiteVerificationWebResourceResource");
  }
  /**
   * Get the list of your verified websites and domains.
   * (webResource.listWebResource)
   *
   * @param array $optParams Optional parameters.
   * @return Google_Service_SiteVerification_SiteVerificationWebResourceListResponse
   */
  public function listWebResource($optParams = array())
  {
    $params = array();
    $params = array_merge($params, $optParams);
    return $this->call('list', array($params), "Google_Service_SiteVerification_SiteVerificationWebResourceListResponse");
  }
  /**
   * Modify the list of owners for your website or domain. This method supports
   * patch semantics. (webResource.patch)
   *
   * @param string $id The id of a verified site or domain.
   * @param Google_Service_SiteVerification_SiteVerificationWebResourceResource $postBody
   * @param array $optParams Optional parameters.
   * @return Google_Service_SiteVerification_SiteVerificationWebResourceResource
   */
  public function patch($id, Google_Service_SiteVerification_SiteVerificationWebResourceResource $postBody, $optParams = array())
  {
    $params = array('id' => $id, 'postBody' => $postBody);
    $params = array_merge($params, $optParams);
    return $this->call('patch', array($params), "Google_Service_SiteVerification_SiteVerificationWebResourceResource");
  }
  /**
   * Modify the list of owners for your website or domain. (webResource.update)
   *
   * @param string $id The id of a verified site or domain.
   * @param Google_Service_SiteVerification_SiteVerificationWebResourceResource $postBody
   * @param array $optParams Optional parameters.
   * @return Google_Service_SiteVerification_SiteVerificationWebResourceResource
   */
  public function update($id, Google_Service_SiteVerification_SiteVerificationWebResourceResource $postBody, $optParams = array())
  {
    $params = array('id' => $id, 'postBody' => $postBody);
    $params = array_merge($params, $optParams);
    return $this->call('update', array($params), "Google_Service_SiteVerification_SiteVerificationWebResourceResource");
  }
}
