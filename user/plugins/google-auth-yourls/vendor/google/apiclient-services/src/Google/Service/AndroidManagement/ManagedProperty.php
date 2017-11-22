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

class Google_Service_AndroidManagement_ManagedProperty extends Google_Collection
{
  protected $collection_key = 'nestedProperties';
  public $defaultValue;
  public $description;
  protected $entriesType = 'Google_Service_AndroidManagement_ManagedPropertyEntry';
  protected $entriesDataType = 'array';
  public $key;
  protected $nestedPropertiesType = 'Google_Service_AndroidManagement_ManagedProperty';
  protected $nestedPropertiesDataType = 'array';
  public $title;
  public $type;

  public function setDefaultValue($defaultValue)
  {
    $this->defaultValue = $defaultValue;
  }
  public function getDefaultValue()
  {
    return $this->defaultValue;
  }
  public function setDescription($description)
  {
    $this->description = $description;
  }
  public function getDescription()
  {
    return $this->description;
  }
  /**
   * @param Google_Service_AndroidManagement_ManagedPropertyEntry
   */
  public function setEntries($entries)
  {
    $this->entries = $entries;
  }
  /**
   * @return Google_Service_AndroidManagement_ManagedPropertyEntry
   */
  public function getEntries()
  {
    return $this->entries;
  }
  public function setKey($key)
  {
    $this->key = $key;
  }
  public function getKey()
  {
    return $this->key;
  }
  /**
   * @param Google_Service_AndroidManagement_ManagedProperty
   */
  public function setNestedProperties($nestedProperties)
  {
    $this->nestedProperties = $nestedProperties;
  }
  /**
   * @return Google_Service_AndroidManagement_ManagedProperty
   */
  public function getNestedProperties()
  {
    return $this->nestedProperties;
  }
  public function setTitle($title)
  {
    $this->title = $title;
  }
  public function getTitle()
  {
    return $this->title;
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
