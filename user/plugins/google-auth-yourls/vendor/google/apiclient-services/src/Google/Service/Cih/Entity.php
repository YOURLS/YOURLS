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

class Google_Service_Cih_Entity extends Google_Collection
{
  protected $collection_key = 'parentEntity';
  protected $childEntityType = 'Google_Service_Cih_Entity';
  protected $childEntityDataType = 'array';
  public $deprecated;
  public $entityId;
  public $entityType;
  public $kind;
  public $linkedByAdsdb;
  protected $parentEntityType = 'Google_Service_Cih_Entity';
  protected $parentEntityDataType = 'array';

  public function setChildEntity($childEntity)
  {
    $this->childEntity = $childEntity;
  }
  public function getChildEntity()
  {
    return $this->childEntity;
  }
  public function setDeprecated($deprecated)
  {
    $this->deprecated = $deprecated;
  }
  public function getDeprecated()
  {
    return $this->deprecated;
  }
  public function setEntityId($entityId)
  {
    $this->entityId = $entityId;
  }
  public function getEntityId()
  {
    return $this->entityId;
  }
  public function setEntityType($entityType)
  {
    $this->entityType = $entityType;
  }
  public function getEntityType()
  {
    return $this->entityType;
  }
  public function setKind($kind)
  {
    $this->kind = $kind;
  }
  public function getKind()
  {
    return $this->kind;
  }
  public function setLinkedByAdsdb($linkedByAdsdb)
  {
    $this->linkedByAdsdb = $linkedByAdsdb;
  }
  public function getLinkedByAdsdb()
  {
    return $this->linkedByAdsdb;
  }
  public function setParentEntity($parentEntity)
  {
    $this->parentEntity = $parentEntity;
  }
  public function getParentEntity()
  {
    return $this->parentEntity;
  }
}
