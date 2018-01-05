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

class Google_Service_SQLAdmin_Flag extends Google_Collection
{
  protected $collection_key = 'appliesTo';
  public $allowedStringValues;
  public $appliesTo;
  public $kind;
  public $maxValue;
  public $minValue;
  public $name;
  public $requiresRestart;
  public $type;

  public function setAllowedStringValues($allowedStringValues)
  {
    $this->allowedStringValues = $allowedStringValues;
  }
  public function getAllowedStringValues()
  {
    return $this->allowedStringValues;
  }
  public function setAppliesTo($appliesTo)
  {
    $this->appliesTo = $appliesTo;
  }
  public function getAppliesTo()
  {
    return $this->appliesTo;
  }
  public function setKind($kind)
  {
    $this->kind = $kind;
  }
  public function getKind()
  {
    return $this->kind;
  }
  public function setMaxValue($maxValue)
  {
    $this->maxValue = $maxValue;
  }
  public function getMaxValue()
  {
    return $this->maxValue;
  }
  public function setMinValue($minValue)
  {
    $this->minValue = $minValue;
  }
  public function getMinValue()
  {
    return $this->minValue;
  }
  public function setName($name)
  {
    $this->name = $name;
  }
  public function getName()
  {
    return $this->name;
  }
  public function setRequiresRestart($requiresRestart)
  {
    $this->requiresRestart = $requiresRestart;
  }
  public function getRequiresRestart()
  {
    return $this->requiresRestart;
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
