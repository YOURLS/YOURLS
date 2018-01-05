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

class Google_Service_Slides_TableRow extends Google_Collection
{
  protected $collection_key = 'tableCells';
  protected $rowHeightType = 'Google_Service_Slides_Dimension';
  protected $rowHeightDataType = '';
  protected $tableCellsType = 'Google_Service_Slides_TableCell';
  protected $tableCellsDataType = 'array';
  protected $tableRowPropertiesType = 'Google_Service_Slides_TableRowProperties';
  protected $tableRowPropertiesDataType = '';

  /**
   * @param Google_Service_Slides_Dimension
   */
  public function setRowHeight(Google_Service_Slides_Dimension $rowHeight)
  {
    $this->rowHeight = $rowHeight;
  }
  /**
   * @return Google_Service_Slides_Dimension
   */
  public function getRowHeight()
  {
    return $this->rowHeight;
  }
  /**
   * @param Google_Service_Slides_TableCell
   */
  public function setTableCells($tableCells)
  {
    $this->tableCells = $tableCells;
  }
  /**
   * @return Google_Service_Slides_TableCell
   */
  public function getTableCells()
  {
    return $this->tableCells;
  }
  /**
   * @param Google_Service_Slides_TableRowProperties
   */
  public function setTableRowProperties(Google_Service_Slides_TableRowProperties $tableRowProperties)
  {
    $this->tableRowProperties = $tableRowProperties;
  }
  /**
   * @return Google_Service_Slides_TableRowProperties
   */
  public function getTableRowProperties()
  {
    return $this->tableRowProperties;
  }
}
