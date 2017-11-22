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

class Google_Service_Slides_Table extends Google_Collection
{
  protected $collection_key = 'verticalBorderRows';
  public $columns;
  protected $horizontalBorderRowsType = 'Google_Service_Slides_TableBorderRow';
  protected $horizontalBorderRowsDataType = 'array';
  public $rows;
  protected $tableColumnsType = 'Google_Service_Slides_TableColumnProperties';
  protected $tableColumnsDataType = 'array';
  protected $tableRowsType = 'Google_Service_Slides_TableRow';
  protected $tableRowsDataType = 'array';
  protected $verticalBorderRowsType = 'Google_Service_Slides_TableBorderRow';
  protected $verticalBorderRowsDataType = 'array';

  public function setColumns($columns)
  {
    $this->columns = $columns;
  }
  public function getColumns()
  {
    return $this->columns;
  }
  /**
   * @param Google_Service_Slides_TableBorderRow
   */
  public function setHorizontalBorderRows($horizontalBorderRows)
  {
    $this->horizontalBorderRows = $horizontalBorderRows;
  }
  /**
   * @return Google_Service_Slides_TableBorderRow
   */
  public function getHorizontalBorderRows()
  {
    return $this->horizontalBorderRows;
  }
  public function setRows($rows)
  {
    $this->rows = $rows;
  }
  public function getRows()
  {
    return $this->rows;
  }
  /**
   * @param Google_Service_Slides_TableColumnProperties
   */
  public function setTableColumns($tableColumns)
  {
    $this->tableColumns = $tableColumns;
  }
  /**
   * @return Google_Service_Slides_TableColumnProperties
   */
  public function getTableColumns()
  {
    return $this->tableColumns;
  }
  /**
   * @param Google_Service_Slides_TableRow
   */
  public function setTableRows($tableRows)
  {
    $this->tableRows = $tableRows;
  }
  /**
   * @return Google_Service_Slides_TableRow
   */
  public function getTableRows()
  {
    return $this->tableRows;
  }
  /**
   * @param Google_Service_Slides_TableBorderRow
   */
  public function setVerticalBorderRows($verticalBorderRows)
  {
    $this->verticalBorderRows = $verticalBorderRows;
  }
  /**
   * @return Google_Service_Slides_TableBorderRow
   */
  public function getVerticalBorderRows()
  {
    return $this->verticalBorderRows;
  }
}
