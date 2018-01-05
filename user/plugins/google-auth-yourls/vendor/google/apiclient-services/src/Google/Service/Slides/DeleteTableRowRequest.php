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

class Google_Service_Slides_DeleteTableRowRequest extends Google_Model
{
  protected $cellLocationType = 'Google_Service_Slides_TableCellLocation';
  protected $cellLocationDataType = '';
  public $tableObjectId;

  /**
   * @param Google_Service_Slides_TableCellLocation
   */
  public function setCellLocation(Google_Service_Slides_TableCellLocation $cellLocation)
  {
    $this->cellLocation = $cellLocation;
  }
  /**
   * @return Google_Service_Slides_TableCellLocation
   */
  public function getCellLocation()
  {
    return $this->cellLocation;
  }
  public function setTableObjectId($tableObjectId)
  {
    $this->tableObjectId = $tableObjectId;
  }
  public function getTableObjectId()
  {
    return $this->tableObjectId;
  }
}
