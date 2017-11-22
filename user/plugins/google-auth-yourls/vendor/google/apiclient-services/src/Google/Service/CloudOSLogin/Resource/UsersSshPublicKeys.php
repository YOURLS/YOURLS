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
 * The "sshPublicKeys" collection of methods.
 * Typical usage is:
 *  <code>
 *   $osloginService = new Google_Service_CloudOSLogin(...);
 *   $sshPublicKeys = $osloginService->sshPublicKeys;
 *  </code>
 */
class Google_Service_CloudOSLogin_Resource_UsersSshPublicKeys extends Google_Service_Resource
{
  /**
   * Deletes an SSH public key. (sshPublicKeys.delete)
   *
   * @param string $name The fingerprint of the public key to update. Public keys
   * are identified by their SHA-256 fingerprint. The fingerprint of the public
   * key is in format `users/{user}/sshPublicKeys/{fingerprint}`.
   * @param array $optParams Optional parameters.
   * @return Google_Service_CloudOSLogin_OsloginEmpty
   */
  public function delete($name, $optParams = array())
  {
    $params = array('name' => $name);
    $params = array_merge($params, $optParams);
    return $this->call('delete', array($params), "Google_Service_CloudOSLogin_OsloginEmpty");
  }
  /**
   * Retrieves an SSH public key. (sshPublicKeys.get)
   *
   * @param string $name The fingerprint of the public key to retrieve. Public
   * keys are identified by their SHA-256 fingerprint. The fingerprint of the
   * public key is in format `users/{user}/sshPublicKeys/{fingerprint}`.
   * @param array $optParams Optional parameters.
   * @return Google_Service_CloudOSLogin_SshPublicKey
   */
  public function get($name, $optParams = array())
  {
    $params = array('name' => $name);
    $params = array_merge($params, $optParams);
    return $this->call('get', array($params), "Google_Service_CloudOSLogin_SshPublicKey");
  }
  /**
   * Updates an SSH public key and returns the profile information. This method
   * supports patch semantics. (sshPublicKeys.patch)
   *
   * @param string $name The fingerprint of the public key to update. Public keys
   * are identified by their SHA-256 fingerprint. The fingerprint of the public
   * key is in format `users/{user}/sshPublicKeys/{fingerprint}`.
   * @param Google_Service_CloudOSLogin_SshPublicKey $postBody
   * @param array $optParams Optional parameters.
   *
   * @opt_param string updateMask Mask to control which fields get updated.
   * Updates all if not present.
   * @return Google_Service_CloudOSLogin_SshPublicKey
   */
  public function patch($name, Google_Service_CloudOSLogin_SshPublicKey $postBody, $optParams = array())
  {
    $params = array('name' => $name, 'postBody' => $postBody);
    $params = array_merge($params, $optParams);
    return $this->call('patch', array($params), "Google_Service_CloudOSLogin_SshPublicKey");
  }
}
