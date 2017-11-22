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

class Google_Service_AndroidManagement_ApplicationPolicy extends Google_Collection
{
  protected $collection_key = 'permissionGrants';
  public $defaultPermissionPolicy;
  public $installType;
  public $lockTaskAllowed;
  public $managedConfiguration;
  public $packageName;
  protected $permissionGrantsType = 'Google_Service_AndroidManagement_PermissionGrant';
  protected $permissionGrantsDataType = 'array';

  public function setDefaultPermissionPolicy($defaultPermissionPolicy)
  {
    $this->defaultPermissionPolicy = $defaultPermissionPolicy;
  }
  public function getDefaultPermissionPolicy()
  {
    return $this->defaultPermissionPolicy;
  }
  public function setInstallType($installType)
  {
    $this->installType = $installType;
  }
  public function getInstallType()
  {
    return $this->installType;
  }
  public function setLockTaskAllowed($lockTaskAllowed)
  {
    $this->lockTaskAllowed = $lockTaskAllowed;
  }
  public function getLockTaskAllowed()
  {
    return $this->lockTaskAllowed;
  }
  public function setManagedConfiguration($managedConfiguration)
  {
    $this->managedConfiguration = $managedConfiguration;
  }
  public function getManagedConfiguration()
  {
    return $this->managedConfiguration;
  }
  public function setPackageName($packageName)
  {
    $this->packageName = $packageName;
  }
  public function getPackageName()
  {
    return $this->packageName;
  }
  /**
   * @param Google_Service_AndroidManagement_PermissionGrant
   */
  public function setPermissionGrants($permissionGrants)
  {
    $this->permissionGrants = $permissionGrants;
  }
  /**
   * @return Google_Service_AndroidManagement_PermissionGrant
   */
  public function getPermissionGrants()
  {
    return $this->permissionGrants;
  }
}
