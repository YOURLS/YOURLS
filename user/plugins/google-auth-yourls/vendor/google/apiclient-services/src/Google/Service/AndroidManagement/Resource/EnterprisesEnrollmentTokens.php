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
 * The "enrollmentTokens" collection of methods.
 * Typical usage is:
 *  <code>
 *   $androidmanagementService = new Google_Service_AndroidManagement(...);
 *   $enrollmentTokens = $androidmanagementService->enrollmentTokens;
 *  </code>
 */
class Google_Service_AndroidManagement_Resource_EnterprisesEnrollmentTokens extends Google_Service_Resource
{
  /**
   * Creates an enrollment token for a given enterprise. (enrollmentTokens.create)
   *
   * @param string $parent The name of the enterprise in the form
   * enterprises/{enterpriseId}
   * @param Google_Service_AndroidManagement_EnrollmentToken $postBody
   * @param array $optParams Optional parameters.
   * @return Google_Service_AndroidManagement_EnrollmentToken
   */
  public function create($parent, Google_Service_AndroidManagement_EnrollmentToken $postBody, $optParams = array())
  {
    $params = array('parent' => $parent, 'postBody' => $postBody);
    $params = array_merge($params, $optParams);
    return $this->call('create', array($params), "Google_Service_AndroidManagement_EnrollmentToken");
  }
  /**
   * Deletes an enrollment token, which prevents future use of the token.
   * (enrollmentTokens.delete)
   *
   * @param string $name The name of the enrollment token in the form
   * enterprises/{enterpriseId}/enrollmentTokens/{enrollmentTokenId}
   * @param array $optParams Optional parameters.
   * @return Google_Service_AndroidManagement_AndroidmanagementEmpty
   */
  public function delete($name, $optParams = array())
  {
    $params = array('name' => $name);
    $params = array_merge($params, $optParams);
    return $this->call('delete', array($params), "Google_Service_AndroidManagement_AndroidmanagementEmpty");
  }
}
