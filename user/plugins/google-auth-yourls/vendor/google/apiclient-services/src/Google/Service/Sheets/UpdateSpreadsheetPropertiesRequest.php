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

class Google_Service_Sheets_UpdateSpreadsheetPropertiesRequest extends Google_Model
{
  public $fields;
  protected $propertiesType = 'Google_Service_Sheets_SpreadsheetProperties';
  protected $propertiesDataType = '';

  public function setFields($fields)
  {
    $this->fields = $fields;
  }
  public function getFields()
  {
    return $this->fields;
  }
  /**
   * @param Google_Service_Sheets_SpreadsheetProperties
   */
  public function setProperties(Google_Service_Sheets_SpreadsheetProperties $properties)
  {
    $this->properties = $properties;
  }
  /**
   * @return Google_Service_Sheets_SpreadsheetProperties
   */
  public function getProperties()
  {
    return $this->properties;
  }
}
