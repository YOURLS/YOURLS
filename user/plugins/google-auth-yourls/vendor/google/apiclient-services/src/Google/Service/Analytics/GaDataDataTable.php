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

class Google_Service_Analytics_GaDataDataTable extends Google_Collection
{
  protected $collection_key = 'rows';
  protected $colsType = 'Google_Service_Analytics_GaDataDataTableCols';
  protected $colsDataType = 'array';
  protected $rowsType = 'Google_Service_Analytics_GaDataDataTableRows';
  protected $rowsDataType = 'array';

  /**
   * @param Google_Service_Analytics_GaDataDataTableCols
   */
  public function setCols($cols)
  {
    $this->cols = $cols;
  }
  /**
   * @return Google_Service_Analytics_GaDataDataTableCols
   */
  public function getCols()
  {
    return $this->cols;
  }
  /**
   * @param Google_Service_Analytics_GaDataDataTableRows
   */
  public function setRows($rows)
  {
    $this->rows = $rows;
  }
  /**
   * @return Google_Service_Analytics_GaDataDataTableRows
   */
  public function getRows()
  {
    return $this->rows;
  }
}
