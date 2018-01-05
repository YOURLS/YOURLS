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

class Google_Service_Bigquery_QueryParameterType extends Google_Collection
{
  protected $collection_key = 'structTypes';
  protected $arrayTypeType = 'Google_Service_Bigquery_QueryParameterType';
  protected $arrayTypeDataType = '';
  protected $structTypesType = 'Google_Service_Bigquery_QueryParameterTypeStructTypes';
  protected $structTypesDataType = 'array';
  public $type;

  /**
   * @param Google_Service_Bigquery_QueryParameterType
   */
  public function setArrayType(Google_Service_Bigquery_QueryParameterType $arrayType)
  {
    $this->arrayType = $arrayType;
  }
  /**
   * @return Google_Service_Bigquery_QueryParameterType
   */
  public function getArrayType()
  {
    return $this->arrayType;
  }
  /**
   * @param Google_Service_Bigquery_QueryParameterTypeStructTypes
   */
  public function setStructTypes($structTypes)
  {
    $this->structTypes = $structTypes;
  }
  /**
   * @return Google_Service_Bigquery_QueryParameterTypeStructTypes
   */
  public function getStructTypes()
  {
    return $this->structTypes;
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
