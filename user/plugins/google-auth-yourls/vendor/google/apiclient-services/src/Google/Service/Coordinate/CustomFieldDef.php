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

class Google_Service_Coordinate_CustomFieldDef extends Google_Collection
{
  protected $collection_key = 'enumitems';
  public $enabled;
  protected $enumitemsType = 'Google_Service_Coordinate_EnumItemDef';
  protected $enumitemsDataType = 'array';
  public $id;
  public $kind;
  public $name;
  public $requiredForCheckout;
  public $type;

  public function setEnabled($enabled)
  {
    $this->enabled = $enabled;
  }
  public function getEnabled()
  {
    return $this->enabled;
  }
  public function setEnumitems($enumitems)
  {
    $this->enumitems = $enumitems;
  }
  public function getEnumitems()
  {
    return $this->enumitems;
  }
  public function setId($id)
  {
    $this->id = $id;
  }
  public function getId()
  {
    return $this->id;
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
  public function setRequiredForCheckout($requiredForCheckout)
  {
    $this->requiredForCheckout = $requiredForCheckout;
  }
  public function getRequiredForCheckout()
  {
    return $this->requiredForCheckout;
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
