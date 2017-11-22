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

class Google_Service_Dfareporting_ListPopulationTerm extends Google_Model
{
  public $contains;
  public $negation;
  public $operator;
  public $remarketingListId;
  public $type;
  public $value;
  public $variableFriendlyName;
  public $variableName;

  public function setContains($contains)
  {
    $this->contains = $contains;
  }
  public function getContains()
  {
    return $this->contains;
  }
  public function setNegation($negation)
  {
    $this->negation = $negation;
  }
  public function getNegation()
  {
    return $this->negation;
  }
  public function setOperator($operator)
  {
    $this->operator = $operator;
  }
  public function getOperator()
  {
    return $this->operator;
  }
  public function setRemarketingListId($remarketingListId)
  {
    $this->remarketingListId = $remarketingListId;
  }
  public function getRemarketingListId()
  {
    return $this->remarketingListId;
  }
  public function setType($type)
  {
    $this->type = $type;
  }
  public function getType()
  {
    return $this->type;
  }
  public function setValue($value)
  {
    $this->value = $value;
  }
  public function getValue()
  {
    return $this->value;
  }
  public function setVariableFriendlyName($variableFriendlyName)
  {
    $this->variableFriendlyName = $variableFriendlyName;
  }
  public function getVariableFriendlyName()
  {
    return $this->variableFriendlyName;
  }
  public function setVariableName($variableName)
  {
    $this->variableName = $variableName;
  }
  public function getVariableName()
  {
    return $this->variableName;
  }
}
