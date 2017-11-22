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

class Google_Service_CloudOSLogin_LoginProfile extends Google_Collection
{
  protected $collection_key = 'posixAccounts';
  public $name;
  protected $posixAccountsType = 'Google_Service_CloudOSLogin_PosixAccount';
  protected $posixAccountsDataType = 'array';
  protected $sshPublicKeysType = 'Google_Service_CloudOSLogin_SshPublicKey';
  protected $sshPublicKeysDataType = 'map';
  public $suspended;

  public function setName($name)
  {
    $this->name = $name;
  }
  public function getName()
  {
    return $this->name;
  }
  /**
   * @param Google_Service_CloudOSLogin_PosixAccount
   */
  public function setPosixAccounts($posixAccounts)
  {
    $this->posixAccounts = $posixAccounts;
  }
  /**
   * @return Google_Service_CloudOSLogin_PosixAccount
   */
  public function getPosixAccounts()
  {
    return $this->posixAccounts;
  }
  /**
   * @param Google_Service_CloudOSLogin_SshPublicKey
   */
  public function setSshPublicKeys($sshPublicKeys)
  {
    $this->sshPublicKeys = $sshPublicKeys;
  }
  /**
   * @return Google_Service_CloudOSLogin_SshPublicKey
   */
  public function getSshPublicKeys()
  {
    return $this->sshPublicKeys;
  }
  public function setSuspended($suspended)
  {
    $this->suspended = $suspended;
  }
  public function getSuspended()
  {
    return $this->suspended;
  }
}
