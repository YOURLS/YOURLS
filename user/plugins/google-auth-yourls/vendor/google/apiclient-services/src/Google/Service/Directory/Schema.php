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

class Google_Service_Directory_Schema extends Google_Collection
{
  protected $collection_key = 'fields';
  public $etag;
  protected $fieldsType = 'Google_Service_Directory_SchemaFieldSpec';
  protected $fieldsDataType = 'array';
  public $kind;
  public $schemaId;
  public $schemaName;

  public function setEtag($etag)
  {
    $this->etag = $etag;
  }
  public function getEtag()
  {
    return $this->etag;
  }
  /**
   * @param Google_Service_Directory_SchemaFieldSpec
   */
  public function setFields($fields)
  {
    $this->fields = $fields;
  }
  /**
   * @return Google_Service_Directory_SchemaFieldSpec
   */
  public function getFields()
  {
    return $this->fields;
  }
  public function setKind($kind)
  {
    $this->kind = $kind;
  }
  public function getKind()
  {
    return $this->kind;
  }
  public function setSchemaId($schemaId)
  {
    $this->schemaId = $schemaId;
  }
  public function getSchemaId()
  {
    return $this->schemaId;
  }
  public function setSchemaName($schemaName)
  {
    $this->schemaName = $schemaName;
  }
  public function getSchemaName()
  {
    return $this->schemaName;
  }
}
