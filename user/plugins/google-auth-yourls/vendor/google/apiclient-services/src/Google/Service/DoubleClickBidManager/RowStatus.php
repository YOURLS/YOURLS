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

class Google_Service_DoubleClickBidManager_RowStatus extends Google_Collection
{
  protected $collection_key = 'errors';
  public $changed;
  public $entityId;
  public $entityName;
  public $errors;
  public $persisted;
  public $rowNumber;

  public function setChanged($changed)
  {
    $this->changed = $changed;
  }
  public function getChanged()
  {
    return $this->changed;
  }
  public function setEntityId($entityId)
  {
    $this->entityId = $entityId;
  }
  public function getEntityId()
  {
    return $this->entityId;
  }
  public function setEntityName($entityName)
  {
    $this->entityName = $entityName;
  }
  public function getEntityName()
  {
    return $this->entityName;
  }
  public function setErrors($errors)
  {
    $this->errors = $errors;
  }
  public function getErrors()
  {
    return $this->errors;
  }
  public function setPersisted($persisted)
  {
    $this->persisted = $persisted;
  }
  public function getPersisted()
  {
    return $this->persisted;
  }
  public function setRowNumber($rowNumber)
  {
    $this->rowNumber = $rowNumber;
  }
  public function getRowNumber()
  {
    return $this->rowNumber;
  }
}
