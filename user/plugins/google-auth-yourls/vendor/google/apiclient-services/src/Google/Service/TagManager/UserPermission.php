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

class Google_Service_TagManager_UserPermission extends Google_Collection
{
  protected $collection_key = 'containerAccess';
  protected $accountAccessType = 'Google_Service_TagManager_AccountAccess';
  protected $accountAccessDataType = '';
  public $accountId;
  protected $containerAccessType = 'Google_Service_TagManager_ContainerAccess';
  protected $containerAccessDataType = 'array';
  public $emailAddress;
  public $path;

  /**
   * @param Google_Service_TagManager_AccountAccess
   */
  public function setAccountAccess(Google_Service_TagManager_AccountAccess $accountAccess)
  {
    $this->accountAccess = $accountAccess;
  }
  /**
   * @return Google_Service_TagManager_AccountAccess
   */
  public function getAccountAccess()
  {
    return $this->accountAccess;
  }
  public function setAccountId($accountId)
  {
    $this->accountId = $accountId;
  }
  public function getAccountId()
  {
    return $this->accountId;
  }
  /**
   * @param Google_Service_TagManager_ContainerAccess
   */
  public function setContainerAccess($containerAccess)
  {
    $this->containerAccess = $containerAccess;
  }
  /**
   * @return Google_Service_TagManager_ContainerAccess
   */
  public function getContainerAccess()
  {
    return $this->containerAccess;
  }
  public function setEmailAddress($emailAddress)
  {
    $this->emailAddress = $emailAddress;
  }
  public function getEmailAddress()
  {
    return $this->emailAddress;
  }
  public function setPath($path)
  {
    $this->path = $path;
  }
  public function getPath()
  {
    return $this->path;
  }
}
