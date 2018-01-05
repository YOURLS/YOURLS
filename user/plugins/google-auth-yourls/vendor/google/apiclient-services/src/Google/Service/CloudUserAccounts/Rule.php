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

class Google_Service_CloudUserAccounts_Rule extends Google_Collection
{
  protected $collection_key = 'permissions';
  public $action;
  protected $conditionsType = 'Google_Service_CloudUserAccounts_Condition';
  protected $conditionsDataType = 'array';
  public $description;
  public $ins;
  protected $logConfigsType = 'Google_Service_CloudUserAccounts_LogConfig';
  protected $logConfigsDataType = 'array';
  public $notIns;
  public $permissions;

  public function setAction($action)
  {
    $this->action = $action;
  }
  public function getAction()
  {
    return $this->action;
  }
  /**
   * @param Google_Service_CloudUserAccounts_Condition
   */
  public function setConditions($conditions)
  {
    $this->conditions = $conditions;
  }
  /**
   * @return Google_Service_CloudUserAccounts_Condition
   */
  public function getConditions()
  {
    return $this->conditions;
  }
  public function setDescription($description)
  {
    $this->description = $description;
  }
  public function getDescription()
  {
    return $this->description;
  }
  public function setIns($ins)
  {
    $this->ins = $ins;
  }
  public function getIns()
  {
    return $this->ins;
  }
  /**
   * @param Google_Service_CloudUserAccounts_LogConfig
   */
  public function setLogConfigs($logConfigs)
  {
    $this->logConfigs = $logConfigs;
  }
  /**
   * @return Google_Service_CloudUserAccounts_LogConfig
   */
  public function getLogConfigs()
  {
    return $this->logConfigs;
  }
  public function setNotIns($notIns)
  {
    $this->notIns = $notIns;
  }
  public function getNotIns()
  {
    return $this->notIns;
  }
  public function setPermissions($permissions)
  {
    $this->permissions = $permissions;
  }
  public function getPermissions()
  {
    return $this->permissions;
  }
}
