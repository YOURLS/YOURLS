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

class Google_Service_FirebaseRules_Result extends Google_Model
{
  protected $undefinedType = 'Google_Service_FirebaseRules_FirebaserulesEmpty';
  protected $undefinedDataType = '';
  public $value;

  /**
   * @param Google_Service_FirebaseRules_FirebaserulesEmpty
   */
  public function setUndefined(Google_Service_FirebaseRules_FirebaserulesEmpty $undefined)
  {
    $this->undefined = $undefined;
  }
  /**
   * @return Google_Service_FirebaseRules_FirebaserulesEmpty
   */
  public function getUndefined()
  {
    return $this->undefined;
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
