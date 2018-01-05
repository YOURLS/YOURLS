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

class Google_Service_Bigquery_DatasetAccess extends Google_Model
{
  public $domain;
  public $groupByEmail;
  public $role;
  public $specialGroup;
  public $userByEmail;
  protected $viewType = 'Google_Service_Bigquery_TableReference';
  protected $viewDataType = '';

  public function setDomain($domain)
  {
    $this->domain = $domain;
  }
  public function getDomain()
  {
    return $this->domain;
  }
  public function setGroupByEmail($groupByEmail)
  {
    $this->groupByEmail = $groupByEmail;
  }
  public function getGroupByEmail()
  {
    return $this->groupByEmail;
  }
  public function setRole($role)
  {
    $this->role = $role;
  }
  public function getRole()
  {
    return $this->role;
  }
  public function setSpecialGroup($specialGroup)
  {
    $this->specialGroup = $specialGroup;
  }
  public function getSpecialGroup()
  {
    return $this->specialGroup;
  }
  public function setUserByEmail($userByEmail)
  {
    $this->userByEmail = $userByEmail;
  }
  public function getUserByEmail()
  {
    return $this->userByEmail;
  }
  /**
   * @param Google_Service_Bigquery_TableReference
   */
  public function setView(Google_Service_Bigquery_TableReference $view)
  {
    $this->view = $view;
  }
  /**
   * @return Google_Service_Bigquery_TableReference
   */
  public function getView()
  {
    return $this->view;
  }
}
