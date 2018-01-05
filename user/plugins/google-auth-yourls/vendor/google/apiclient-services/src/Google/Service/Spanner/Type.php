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

class Google_Service_Spanner_Type extends Google_Model
{
  protected $arrayElementTypeType = 'Google_Service_Spanner_Type';
  protected $arrayElementTypeDataType = '';
  public $code;
  protected $structTypeType = 'Google_Service_Spanner_StructType';
  protected $structTypeDataType = '';

  /**
   * @param Google_Service_Spanner_Type
   */
  public function setArrayElementType(Google_Service_Spanner_Type $arrayElementType)
  {
    $this->arrayElementType = $arrayElementType;
  }
  /**
   * @return Google_Service_Spanner_Type
   */
  public function getArrayElementType()
  {
    return $this->arrayElementType;
  }
  public function setCode($code)
  {
    $this->code = $code;
  }
  public function getCode()
  {
    return $this->code;
  }
  /**
   * @param Google_Service_Spanner_StructType
   */
  public function setStructType(Google_Service_Spanner_StructType $structType)
  {
    $this->structType = $structType;
  }
  /**
   * @return Google_Service_Spanner_StructType
   */
  public function getStructType()
  {
    return $this->structType;
  }
}
