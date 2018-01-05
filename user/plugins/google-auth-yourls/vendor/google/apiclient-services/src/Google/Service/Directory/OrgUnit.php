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

class Google_Service_Directory_OrgUnit extends Google_Model
{
  public $blockInheritance;
  public $description;
  public $etag;
  public $kind;
  public $name;
  public $orgUnitId;
  public $orgUnitPath;
  public $parentOrgUnitId;
  public $parentOrgUnitPath;

  public function setBlockInheritance($blockInheritance)
  {
    $this->blockInheritance = $blockInheritance;
  }
  public function getBlockInheritance()
  {
    return $this->blockInheritance;
  }
  public function setDescription($description)
  {
    $this->description = $description;
  }
  public function getDescription()
  {
    return $this->description;
  }
  public function setEtag($etag)
  {
    $this->etag = $etag;
  }
  public function getEtag()
  {
    return $this->etag;
  }
  public function setKind($kind)
  {
    $this->kind = $kind;
  }
  public function getKind()
  {
    return $this->kind;
  }
  public function setName($name)
  {
    $this->name = $name;
  }
  public function getName()
  {
    return $this->name;
  }
  public function setOrgUnitId($orgUnitId)
  {
    $this->orgUnitId = $orgUnitId;
  }
  public function getOrgUnitId()
  {
    return $this->orgUnitId;
  }
  public function setOrgUnitPath($orgUnitPath)
  {
    $this->orgUnitPath = $orgUnitPath;
  }
  public function getOrgUnitPath()
  {
    return $this->orgUnitPath;
  }
  public function setParentOrgUnitId($parentOrgUnitId)
  {
    $this->parentOrgUnitId = $parentOrgUnitId;
  }
  public function getParentOrgUnitId()
  {
    return $this->parentOrgUnitId;
  }
  public function setParentOrgUnitPath($parentOrgUnitPath)
  {
    $this->parentOrgUnitPath = $parentOrgUnitPath;
  }
  public function getParentOrgUnitPath()
  {
    return $this->parentOrgUnitPath;
  }
}
