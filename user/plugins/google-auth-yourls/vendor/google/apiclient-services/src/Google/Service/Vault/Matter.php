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

class Google_Service_Vault_Matter extends Google_Collection
{
  protected $collection_key = 'matterPermissions';
  public $description;
  public $matterId;
  protected $matterPermissionsType = 'Google_Service_Vault_MatterPermission';
  protected $matterPermissionsDataType = 'array';
  public $name;
  public $state;

  public function setDescription($description)
  {
    $this->description = $description;
  }
  public function getDescription()
  {
    return $this->description;
  }
  public function setMatterId($matterId)
  {
    $this->matterId = $matterId;
  }
  public function getMatterId()
  {
    return $this->matterId;
  }
  /**
   * @param Google_Service_Vault_MatterPermission
   */
  public function setMatterPermissions($matterPermissions)
  {
    $this->matterPermissions = $matterPermissions;
  }
  /**
   * @return Google_Service_Vault_MatterPermission
   */
  public function getMatterPermissions()
  {
    return $this->matterPermissions;
  }
  public function setName($name)
  {
    $this->name = $name;
  }
  public function getName()
  {
    return $this->name;
  }
  public function setState($state)
  {
    $this->state = $state;
  }
  public function getState()
  {
    return $this->state;
  }
}
