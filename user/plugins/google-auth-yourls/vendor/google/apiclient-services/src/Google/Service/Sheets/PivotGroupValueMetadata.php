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

class Google_Service_Sheets_PivotGroupValueMetadata extends Google_Model
{
  public $collapsed;
  protected $valueType = 'Google_Service_Sheets_ExtendedValue';
  protected $valueDataType = '';

  public function setCollapsed($collapsed)
  {
    $this->collapsed = $collapsed;
  }
  public function getCollapsed()
  {
    return $this->collapsed;
  }
  /**
   * @param Google_Service_Sheets_ExtendedValue
   */
  public function setValue(Google_Service_Sheets_ExtendedValue $value)
  {
    $this->value = $value;
  }
  /**
   * @return Google_Service_Sheets_ExtendedValue
   */
  public function getValue()
  {
    return $this->value;
  }
}
