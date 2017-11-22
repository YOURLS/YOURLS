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

class Google_Service_Slides_TableBorderCell extends Google_Model
{
  protected $locationType = 'Google_Service_Slides_TableCellLocation';
  protected $locationDataType = '';
  protected $tableBorderPropertiesType = 'Google_Service_Slides_TableBorderProperties';
  protected $tableBorderPropertiesDataType = '';

  /**
   * @param Google_Service_Slides_TableCellLocation
   */
  public function setLocation(Google_Service_Slides_TableCellLocation $location)
  {
    $this->location = $location;
  }
  /**
   * @return Google_Service_Slides_TableCellLocation
   */
  public function getLocation()
  {
    return $this->location;
  }
  /**
   * @param Google_Service_Slides_TableBorderProperties
   */
  public function setTableBorderProperties(Google_Service_Slides_TableBorderProperties $tableBorderProperties)
  {
    $this->tableBorderProperties = $tableBorderProperties;
  }
  /**
   * @return Google_Service_Slides_TableBorderProperties
   */
  public function getTableBorderProperties()
  {
    return $this->tableBorderProperties;
  }
}
