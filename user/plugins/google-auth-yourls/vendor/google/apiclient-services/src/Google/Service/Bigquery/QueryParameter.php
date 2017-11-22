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

class Google_Service_Bigquery_QueryParameter extends Google_Model
{
  public $name;
  protected $parameterTypeType = 'Google_Service_Bigquery_QueryParameterType';
  protected $parameterTypeDataType = '';
  protected $parameterValueType = 'Google_Service_Bigquery_QueryParameterValue';
  protected $parameterValueDataType = '';

  public function setName($name)
  {
    $this->name = $name;
  }
  public function getName()
  {
    return $this->name;
  }
  /**
   * @param Google_Service_Bigquery_QueryParameterType
   */
  public function setParameterType(Google_Service_Bigquery_QueryParameterType $parameterType)
  {
    $this->parameterType = $parameterType;
  }
  /**
   * @return Google_Service_Bigquery_QueryParameterType
   */
  public function getParameterType()
  {
    return $this->parameterType;
  }
  /**
   * @param Google_Service_Bigquery_QueryParameterValue
   */
  public function setParameterValue(Google_Service_Bigquery_QueryParameterValue $parameterValue)
  {
    $this->parameterValue = $parameterValue;
  }
  /**
   * @return Google_Service_Bigquery_QueryParameterValue
   */
  public function getParameterValue()
  {
    return $this->parameterValue;
  }
}
