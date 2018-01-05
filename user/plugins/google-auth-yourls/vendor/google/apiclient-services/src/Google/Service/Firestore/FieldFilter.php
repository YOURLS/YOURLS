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

class Google_Service_Firestore_FieldFilter extends Google_Model
{
  protected $fieldType = 'Google_Service_Firestore_FieldReference';
  protected $fieldDataType = '';
  public $op;
  protected $valueType = 'Google_Service_Firestore_Value';
  protected $valueDataType = '';

  /**
   * @param Google_Service_Firestore_FieldReference
   */
  public function setField(Google_Service_Firestore_FieldReference $field)
  {
    $this->field = $field;
  }
  /**
   * @return Google_Service_Firestore_FieldReference
   */
  public function getField()
  {
    return $this->field;
  }
  public function setOp($op)
  {
    $this->op = $op;
  }
  public function getOp()
  {
    return $this->op;
  }
  /**
   * @param Google_Service_Firestore_Value
   */
  public function setValue(Google_Service_Firestore_Value $value)
  {
    $this->value = $value;
  }
  /**
   * @return Google_Service_Firestore_Value
   */
  public function getValue()
  {
    return $this->value;
  }
}
