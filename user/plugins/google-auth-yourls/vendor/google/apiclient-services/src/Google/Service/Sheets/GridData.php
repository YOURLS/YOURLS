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

class Google_Service_Sheets_GridData extends Google_Collection
{
  protected $collection_key = 'rowMetadata';
  protected $columnMetadataType = 'Google_Service_Sheets_DimensionProperties';
  protected $columnMetadataDataType = 'array';
  protected $rowDataType = 'Google_Service_Sheets_RowData';
  protected $rowDataDataType = 'array';
  protected $rowMetadataType = 'Google_Service_Sheets_DimensionProperties';
  protected $rowMetadataDataType = 'array';
  public $startColumn;
  public $startRow;

  /**
   * @param Google_Service_Sheets_DimensionProperties
   */
  public function setColumnMetadata($columnMetadata)
  {
    $this->columnMetadata = $columnMetadata;
  }
  /**
   * @return Google_Service_Sheets_DimensionProperties
   */
  public function getColumnMetadata()
  {
    return $this->columnMetadata;
  }
  /**
   * @param Google_Service_Sheets_RowData
   */
  public function setRowData($rowData)
  {
    $this->rowData = $rowData;
  }
  /**
   * @return Google_Service_Sheets_RowData
   */
  public function getRowData()
  {
    return $this->rowData;
  }
  /**
   * @param Google_Service_Sheets_DimensionProperties
   */
  public function setRowMetadata($rowMetadata)
  {
    $this->rowMetadata = $rowMetadata;
  }
  /**
   * @return Google_Service_Sheets_DimensionProperties
   */
  public function getRowMetadata()
  {
    return $this->rowMetadata;
  }
  public function setStartColumn($startColumn)
  {
    $this->startColumn = $startColumn;
  }
  public function getStartColumn()
  {
    return $this->startColumn;
  }
  public function setStartRow($startRow)
  {
    $this->startRow = $startRow;
  }
  public function getStartRow()
  {
    return $this->startRow;
  }
}
