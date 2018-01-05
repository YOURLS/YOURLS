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

class Google_Service_ServiceManagement_QuotaLimit extends Google_Model
{
  public $defaultLimit;
  public $description;
  public $displayName;
  public $duration;
  public $freeTier;
  public $maxLimit;
  public $metric;
  public $name;
  public $unit;
  public $values;

  public function setDefaultLimit($defaultLimit)
  {
    $this->defaultLimit = $defaultLimit;
  }
  public function getDefaultLimit()
  {
    return $this->defaultLimit;
  }
  public function setDescription($description)
  {
    $this->description = $description;
  }
  public function getDescription()
  {
    return $this->description;
  }
  public function setDisplayName($displayName)
  {
    $this->displayName = $displayName;
  }
  public function getDisplayName()
  {
    return $this->displayName;
  }
  public function setDuration($duration)
  {
    $this->duration = $duration;
  }
  public function getDuration()
  {
    return $this->duration;
  }
  public function setFreeTier($freeTier)
  {
    $this->freeTier = $freeTier;
  }
  public function getFreeTier()
  {
    return $this->freeTier;
  }
  public function setMaxLimit($maxLimit)
  {
    $this->maxLimit = $maxLimit;
  }
  public function getMaxLimit()
  {
    return $this->maxLimit;
  }
  public function setMetric($metric)
  {
    $this->metric = $metric;
  }
  public function getMetric()
  {
    return $this->metric;
  }
  public function setName($name)
  {
    $this->name = $name;
  }
  public function getName()
  {
    return $this->name;
  }
  public function setUnit($unit)
  {
    $this->unit = $unit;
  }
  public function getUnit()
  {
    return $this->unit;
  }
  public function setValues($values)
  {
    $this->values = $values;
  }
  public function getValues()
  {
    return $this->values;
  }
}
