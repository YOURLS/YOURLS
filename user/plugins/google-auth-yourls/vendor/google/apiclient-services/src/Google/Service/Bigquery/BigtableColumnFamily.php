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

class Google_Service_Bigquery_BigtableColumnFamily extends Google_Collection
{
  protected $collection_key = 'columns';
  protected $columnsType = 'Google_Service_Bigquery_BigtableColumn';
  protected $columnsDataType = 'array';
  public $encoding;
  public $familyId;
  public $onlyReadLatest;
  public $type;

  /**
   * @param Google_Service_Bigquery_BigtableColumn
   */
  public function setColumns($columns)
  {
    $this->columns = $columns;
  }
  /**
   * @return Google_Service_Bigquery_BigtableColumn
   */
  public function getColumns()
  {
    return $this->columns;
  }
  public function setEncoding($encoding)
  {
    $this->encoding = $encoding;
  }
  public function getEncoding()
  {
    return $this->encoding;
  }
  public function setFamilyId($familyId)
  {
    $this->familyId = $familyId;
  }
  public function getFamilyId()
  {
    return $this->familyId;
  }
  public function setOnlyReadLatest($onlyReadLatest)
  {
    $this->onlyReadLatest = $onlyReadLatest;
  }
  public function getOnlyReadLatest()
  {
    return $this->onlyReadLatest;
  }
  public function setType($type)
  {
    $this->type = $type;
  }
  public function getType()
  {
    return $this->type;
  }
}
