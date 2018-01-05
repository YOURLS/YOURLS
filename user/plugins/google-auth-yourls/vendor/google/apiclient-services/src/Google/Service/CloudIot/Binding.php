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

class Google_Service_CloudIot_Binding extends Google_Collection
{
  protected $collection_key = 'members';
  protected $conditionType = 'Google_Service_CloudIot_Expr';
  protected $conditionDataType = '';
  public $members;
  public $role;

  /**
   * @param Google_Service_CloudIot_Expr
   */
  public function setCondition(Google_Service_CloudIot_Expr $condition)
  {
    $this->condition = $condition;
  }
  /**
   * @return Google_Service_CloudIot_Expr
   */
  public function getCondition()
  {
    return $this->condition;
  }
  public function setMembers($members)
  {
    $this->members = $members;
  }
  public function getMembers()
  {
    return $this->members;
  }
  public function setRole($role)
  {
    $this->role = $role;
  }
  public function getRole()
  {
    return $this->role;
  }
}
