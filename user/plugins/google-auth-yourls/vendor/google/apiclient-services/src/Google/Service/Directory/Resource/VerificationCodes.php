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
 * The "verificationCodes" collection of methods.
 * Typical usage is:
 *  <code>
 *   $adminService = new Google_Service_Directory(...);
 *   $verificationCodes = $adminService->verificationCodes;
 *  </code>
 */
class Google_Service_Directory_Resource_VerificationCodes extends Google_Service_Resource
{
  /**
   * Generate new backup verification codes for the user.
   * (verificationCodes.generate)
   *
   * @param string $userKey Email or immutable ID of the user
   * @param array $optParams Optional parameters.
   */
  public function generate($userKey, $optParams = array())
  {
    $params = array('userKey' => $userKey);
    $params = array_merge($params, $optParams);
    return $this->call('generate', array($params));
  }
  /**
   * Invalidate the current backup verification codes for the user.
   * (verificationCodes.invalidate)
   *
   * @param string $userKey Email or immutable ID of the user
   * @param array $optParams Optional parameters.
   */
  public function invalidate($userKey, $optParams = array())
  {
    $params = array('userKey' => $userKey);
    $params = array_merge($params, $optParams);
    return $this->call('invalidate', array($params));
  }
  /**
   * Returns the current set of valid backup verification codes for the specified
   * user. (verificationCodes.listVerificationCodes)
   *
   * @param string $userKey Identifies the user in the API request. The value can
   * be the user's primary email address, alias email address, or unique user ID.
   * @param array $optParams Optional parameters.
   * @return Google_Service_Directory_VerificationCodes
   */
  public function listVerificationCodes($userKey, $optParams = array())
  {
    $params = array('userKey' => $userKey);
    $params = array_merge($params, $optParams);
    return $this->call('list', array($params), "Google_Service_Directory_VerificationCodes");
  }
}
