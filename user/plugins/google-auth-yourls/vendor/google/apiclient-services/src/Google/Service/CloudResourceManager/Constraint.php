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

class Google_Service_CloudResourceManager_Constraint extends Google_Model
{
  protected $booleanConstraintType = 'Google_Service_CloudResourceManager_BooleanConstraint';
  protected $booleanConstraintDataType = '';
  public $constraintDefault;
  public $description;
  public $displayName;
  protected $listConstraintType = 'Google_Service_CloudResourceManager_ListConstraint';
  protected $listConstraintDataType = '';
  public $name;
  public $version;

  /**
   * @param Google_Service_CloudResourceManager_BooleanConstraint
   */
  public function setBooleanConstraint(Google_Service_CloudResourceManager_BooleanConstraint $booleanConstraint)
  {
    $this->booleanConstraint = $booleanConstraint;
  }
  /**
   * @return Google_Service_CloudResourceManager_BooleanConstraint
   */
  public function getBooleanConstraint()
  {
    return $this->booleanConstraint;
  }
  public function setConstraintDefault($constraintDefault)
  {
    $this->constraintDefault = $constraintDefault;
  }
  public function getConstraintDefault()
  {
    return $this->constraintDefault;
  }
  public function setDescription($description)
  {
    $this->description = $description;
  }
  public function getDescription()
  {
    return $this->description;
  }
  public function setDisplayName($displayName)
  {
    $this->displayName = $displayName;
  }
  public function getDisplayName()
  {
    return $this->displayName;
  }
  /**
   * @param Google_Service_CloudResourceManager_ListConstraint
   */
  public function setListConstraint(Google_Service_CloudResourceManager_ListConstraint $listConstraint)
  {
    $this->listConstraint = $listConstraint;
  }
  /**
   * @return Google_Service_CloudResourceManager_ListConstraint
   */
  public function getListConstraint()
  {
    return $this->listConstraint;
  }
  public function setName($name)
  {
    $this->name = $name;
  }
  public function getName()
  {
    return $this->name;
  }
  public function setVersion($version)
  {
    $this->version = $version;
  }
  public function getVersion()
  {
    return $this->version;
  }
}
