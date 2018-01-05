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

class Google_Service_Bigquery_JobConfigurationTableCopy extends Google_Collection
{
  protected $collection_key = 'sourceTables';
  public $createDisposition;
  protected $destinationEncryptionConfigurationType = 'Google_Service_Bigquery_EncryptionConfiguration';
  protected $destinationEncryptionConfigurationDataType = '';
  protected $destinationTableType = 'Google_Service_Bigquery_TableReference';
  protected $destinationTableDataType = '';
  protected $sourceTableType = 'Google_Service_Bigquery_TableReference';
  protected $sourceTableDataType = '';
  protected $sourceTablesType = 'Google_Service_Bigquery_TableReference';
  protected $sourceTablesDataType = 'array';
  public $writeDisposition;

  public function setCreateDisposition($createDisposition)
  {
    $this->createDisposition = $createDisposition;
  }
  public function getCreateDisposition()
  {
    return $this->createDisposition;
  }
  /**
   * @param Google_Service_Bigquery_EncryptionConfiguration
   */
  public function setDestinationEncryptionConfiguration(Google_Service_Bigquery_EncryptionConfiguration $destinationEncryptionConfiguration)
  {
    $this->destinationEncryptionConfiguration = $destinationEncryptionConfiguration;
  }
  /**
   * @return Google_Service_Bigquery_EncryptionConfiguration
   */
  public function getDestinationEncryptionConfiguration()
  {
    return $this->destinationEncryptionConfiguration;
  }
  /**
   * @param Google_Service_Bigquery_TableReference
   */
  public function setDestinationTable(Google_Service_Bigquery_TableReference $destinationTable)
  {
    $this->destinationTable = $destinationTable;
  }
  /**
   * @return Google_Service_Bigquery_TableReference
   */
  public function getDestinationTable()
  {
    return $this->destinationTable;
  }
  /**
   * @param Google_Service_Bigquery_TableReference
   */
  public function setSourceTable(Google_Service_Bigquery_TableReference $sourceTable)
  {
    $this->sourceTable = $sourceTable;
  }
  /**
   * @return Google_Service_Bigquery_TableReference
   */
  public function getSourceTable()
  {
    return $this->sourceTable;
  }
  /**
   * @param Google_Service_Bigquery_TableReference
   */
  public function setSourceTables($sourceTables)
  {
    $this->sourceTables = $sourceTables;
  }
  /**
   * @return Google_Service_Bigquery_TableReference
   */
  public function getSourceTables()
  {
    return $this->sourceTables;
  }
  public function setWriteDisposition($writeDisposition)
  {
    $this->writeDisposition = $writeDisposition;
  }
  public function getWriteDisposition()
  {
    return $this->writeDisposition;
  }
}
