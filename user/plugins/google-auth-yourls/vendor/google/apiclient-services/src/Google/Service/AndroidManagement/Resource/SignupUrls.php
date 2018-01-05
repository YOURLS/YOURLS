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
 * The "signupUrls" collection of methods.
 * Typical usage is:
 *  <code>
 *   $androidmanagementService = new Google_Service_AndroidManagement(...);
 *   $signupUrls = $androidmanagementService->signupUrls;
 *  </code>
 */
class Google_Service_AndroidManagement_Resource_SignupUrls extends Google_Service_Resource
{
  /**
   * Creates an enterprise signup URL. (signupUrls.create)
   *
   * @param array $optParams Optional parameters.
   *
   * @opt_param string callbackUrl The callback URL to which the admin will be
   * redirected after successfully creating an enterprise. Before redirecting
   * there the system will add a query parameter to this URL named enterpriseToken
   * which will contain an opaque token to be used for the create enterprise
   * request. The URL will be parsed then reformatted in order to add the
   * enterpriseToken parameter, so there may be some minor formatting changes.
   * @opt_param string projectId The id of the Google Cloud Platform project which
   * will own the enterprise.
   * @return Google_Service_AndroidManagement_SignupUrl
   */
  public function create($optParams = array())
  {
    $params = array();
    $params = array_merge($params, $optParams);
    return $this->call('create', array($params), "Google_Service_AndroidManagement_SignupUrl");
  }
}
