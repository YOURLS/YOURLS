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

class Google_Service_BigQueryDataTransfer_DataSourceParameter extends Google_Collection
{
  protected $collection_key = 'fields';
  public $allowedValues;
  public $description;
  public $displayName;
  protected $fieldsType = 'Google_Service_BigQueryDataTransfer_DataSourceParameter';
  protected $fieldsDataType = 'array';
  public $immutable;
  public $maxValue;
  public $minValue;
  public $paramId;
  public $recurse;
  public $repeated;
  public $required;
  public $type;
  public $validationDescription;
  public $validationHelpUrl;
  public $validationRegex;

  public function setAllowedValues($allowedValues)
  {
    $this->allowedValues = $allowedValues;
  }
  public function getAllowedValues()
  {
    return $this->allowedValues;
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
  /**
   * @param Google_Service_BigQueryDataTransfer_DataSourceParameter
   */
  public function setFields($fields)
  {
    $this->fields = $fields;
  }
  /**
   * @return Google_Service_BigQueryDataTransfer_DataSourceParameter
   */
  public function getFields()
  {
    return $this->fields;
  }
  public function setImmutable($immutable)
  {
    $this->immutable = $immutable;
  }
  public function getImmutable()
  {
    return $this->immutable;
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
  public function setParamId($paramId)
  {
    $this->paramId = $paramId;
  }
  public function getParamId()
  {
    return $this->paramId;
  }
  public function setRecurse($recurse)
  {
    $this->recurse = $recurse;
  }
  public function getRecurse()
  {
    return $this->recurse;
  }
  public function setRepeated($repeated)
  {
    $this->repeated = $repeated;
  }
  public function getRepeated()
  {
    return $this->repeated;
  }
  public function setRequired($required)
  {
    $this->required = $required;
  }
  public function getRequired()
  {
    return $this->required;
  }
  public function setType($type)
  {
    $this->type = $type;
  }
  public function getType()
  {
    return $this->type;
  }
  public function setValidationDescription($validationDescription)
  {
    $this->validationDescription = $validationDescription;
  }
  public function getValidationDescription()
  {
    return $this->validationDescription;
  }
  public function setValidationHelpUrl($validationHelpUrl)
  {
    $this->validationHelpUrl = $validationHelpUrl;
  }
  public function getValidationHelpUrl()
  {
    return $this->validationHelpUrl;
  }
  public function setValidationRegex($validationRegex)
  {
    $this->validationRegex = $validationRegex;
  }
  public function getValidationRegex()
  {
    return $this->validationRegex;
  }
}
