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

class Google_Service_Fusiontables_Table extends Google_Collection
{
  protected $collection_key = 'columns';
  public $attribution;
  public $attributionLink;
  public $baseTableIds;
  public $columnPropertiesJsonSchema;
  protected $columnsType = 'Google_Service_Fusiontables_Column';
  protected $columnsDataType = 'array';
  public $description;
  public $isExportable;
  public $kind;
  public $name;
  public $sql;
  public $tableId;
  public $tablePropertiesJson;
  public $tablePropertiesJsonSchema;

  public function setAttribution($attribution)
  {
    $this->attribution = $attribution;
  }
  public function getAttribution()
  {
    return $this->attribution;
  }
  public function setAttributionLink($attributionLink)
  {
    $this->attributionLink = $attributionLink;
  }
  public function getAttributionLink()
  {
    return $this->attributionLink;
  }
  public function setBaseTableIds($baseTableIds)
  {
    $this->baseTableIds = $baseTableIds;
  }
  public function getBaseTableIds()
  {
    return $this->baseTableIds;
  }
  public function setColumnPropertiesJsonSchema($columnPropertiesJsonSchema)
  {
    $this->columnPropertiesJsonSchema = $columnPropertiesJsonSchema;
  }
  public function getColumnPropertiesJsonSchema()
  {
    return $this->columnPropertiesJsonSchema;
  }
  /**
   * @param Google_Service_Fusiontables_Column
   */
  public function setColumns($columns)
  {
    $this->columns = $columns;
  }
  /**
   * @return Google_Service_Fusiontables_Column
   */
  public function getColumns()
  {
    return $this->columns;
  }
  public function setDescription($description)
  {
    $this->description = $description;
  }
  public function getDescription()
  {
    return $this->description;
  }
  public function setIsExportable($isExportable)
  {
    $this->isExportable = $isExportable;
  }
  public function getIsExportable()
  {
    return $this->isExportable;
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
  public function setSql($sql)
  {
    $this->sql = $sql;
  }
  public function getSql()
  {
    return $this->sql;
  }
  public function setTableId($tableId)
  {
    $this->tableId = $tableId;
  }
  public function getTableId()
  {
    return $this->tableId;
  }
  public function setTablePropertiesJson($tablePropertiesJson)
  {
    $this->tablePropertiesJson = $tablePropertiesJson;
  }
  public function getTablePropertiesJson()
  {
    return $this->tablePropertiesJson;
  }
  public function setTablePropertiesJsonSchema($tablePropertiesJsonSchema)
  {
    $this->tablePropertiesJsonSchema = $tablePropertiesJsonSchema;
  }
  public function getTablePropertiesJsonSchema()
  {
    return $this->tablePropertiesJsonSchema;
  }
}
