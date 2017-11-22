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

class Google_Service_Dialogflow_IntentParameter extends Google_Collection
{
  protected $collection_key = 'prompts';
  public $defaultValue;
  public $displayName;
  public $entityTypeDisplayName;
  public $isList;
  public $mandatory;
  public $name;
  public $prompts;
  public $value;

  public function setDefaultValue($defaultValue)
  {
    $this->defaultValue = $defaultValue;
  }
  public function getDefaultValue()
  {
    return $this->defaultValue;
  }
  public function setDisplayName($displayName)
  {
    $this->displayName = $displayName;
  }
  public function getDisplayName()
  {
    return $this->displayName;
  }
  public function setEntityTypeDisplayName($entityTypeDisplayName)
  {
    $this->entityTypeDisplayName = $entityTypeDisplayName;
  }
  public function getEntityTypeDisplayName()
  {
    return $this->entityTypeDisplayName;
  }
  public function setIsList($isList)
  {
    $this->isList = $isList;
  }
  public function getIsList()
  {
    return $this->isList;
  }
  public function setMandatory($mandatory)
  {
    $this->mandatory = $mandatory;
  }
  public function getMandatory()
  {
    return $this->mandatory;
  }
  public function setName($name)
  {
    $this->name = $name;
  }
  public function getName()
  {
    return $this->name;
  }
  public function setPrompts($prompts)
  {
    $this->prompts = $prompts;
  }
  public function getPrompts()
  {
    return $this->prompts;
  }
  public function setValue($value)
  {
    $this->value = $value;
  }
  public function getValue()
  {
    return $this->value;
  }
}
