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

class Google_Service_Bigquery_JobConfigurationLoad extends Google_Collection
{
  protected $collection_key = 'sourceUris';
  public $allowJaggedRows;
  public $allowQuotedNewlines;
  public $autodetect;
  public $createDisposition;
  protected $destinationEncryptionConfigurationType = 'Google_Service_Bigquery_EncryptionConfiguration';
  protected $destinationEncryptionConfigurationDataType = '';
  protected $destinationTableType = 'Google_Service_Bigquery_TableReference';
  protected $destinationTableDataType = '';
  public $encoding;
  public $fieldDelimiter;
  public $ignoreUnknownValues;
  public $maxBadRecords;
  public $nullMarker;
  public $projectionFields;
  public $quote;
  protected $schemaType = 'Google_Service_Bigquery_TableSchema';
  protected $schemaDataType = '';
  public $schemaInline;
  public $schemaInlineFormat;
  public $schemaUpdateOptions;
  public $skipLeadingRows;
  public $sourceFormat;
  public $sourceUris;
  protected $timePartitioningType = 'Google_Service_Bigquery_TimePartitioning';
  protected $timePartitioningDataType = '';
  public $writeDisposition;

  public function setAllowJaggedRows($allowJaggedRows)
  {
    $this->allowJaggedRows = $allowJaggedRows;
  }
  public function getAllowJaggedRows()
  {
    return $this->allowJaggedRows;
  }
  public function setAllowQuotedNewlines($allowQuotedNewlines)
  {
    $this->allowQuotedNewlines = $allowQuotedNewlines;
  }
  public function getAllowQuotedNewlines()
  {
    return $this->allowQuotedNewlines;
  }
  public function setAutodetect($autodetect)
  {
    $this->autodetect = $autodetect;
  }
  public function getAutodetect()
  {
    return $this->autodetect;
  }
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
  public function setEncoding($encoding)
  {
    $this->encoding = $encoding;
  }
  public function getEncoding()
  {
    return $this->encoding;
  }
  public function setFieldDelimiter($fieldDelimiter)
  {
    $this->fieldDelimiter = $fieldDelimiter;
  }
  public function getFieldDelimiter()
  {
    return $this->fieldDelimiter;
  }
  public function setIgnoreUnknownValues($ignoreUnknownValues)
  {
    $this->ignoreUnknownValues = $ignoreUnknownValues;
  }
  public function getIgnoreUnknownValues()
  {
    return $this->ignoreUnknownValues;
  }
  public function setMaxBadRecords($maxBadRecords)
  {
    $this->maxBadRecords = $maxBadRecords;
  }
  public function getMaxBadRecords()
  {
    return $this->maxBadRecords;
  }
  public function setNullMarker($nullMarker)
  {
    $this->nullMarker = $nullMarker;
  }
  public function getNullMarker()
  {
    return $this->nullMarker;
  }
  public function setProjectionFields($projectionFields)
  {
    $this->projectionFields = $projectionFields;
  }
  public function getProjectionFields()
  {
    return $this->projectionFields;
  }
  public function setQuote($quote)
  {
    $this->quote = $quote;
  }
  public function getQuote()
  {
    return $this->quote;
  }
  /**
   * @param Google_Service_Bigquery_TableSchema
   */
  public function setSchema(Google_Service_Bigquery_TableSchema $schema)
  {
    $this->schema = $schema;
  }
  /**
   * @return Google_Service_Bigquery_TableSchema
   */
  public function getSchema()
  {
    return $this->schema;
  }
  public function setSchemaInline($schemaInline)
  {
    $this->schemaInline = $schemaInline;
  }
  public function getSchemaInline()
  {
    return $this->schemaInline;
  }
  public function setSchemaInlineFormat($schemaInlineFormat)
  {
    $this->schemaInlineFormat = $schemaInlineFormat;
  }
  public function getSchemaInlineFormat()
  {
    return $this->schemaInlineFormat;
  }
  public function setSchemaUpdateOptions($schemaUpdateOptions)
  {
    $this->schemaUpdateOptions = $schemaUpdateOptions;
  }
  public function getSchemaUpdateOptions()
  {
    return $this->schemaUpdateOptions;
  }
  public function setSkipLeadingRows($skipLeadingRows)
  {
    $this->skipLeadingRows = $skipLeadingRows;
  }
  public function getSkipLeadingRows()
  {
    return $this->skipLeadingRows;
  }
  public function setSourceFormat($sourceFormat)
  {
    $this->sourceFormat = $sourceFormat;
  }
  public function getSourceFormat()
  {
    return $this->sourceFormat;
  }
  public function setSourceUris($sourceUris)
  {
    $this->sourceUris = $sourceUris;
  }
  public function getSourceUris()
  {
    return $this->sourceUris;
  }
  /**
   * @param Google_Service_Bigquery_TimePartitioning
   */
  public function setTimePartitioning(Google_Service_Bigquery_TimePartitioning $timePartitioning)
  {
    $this->timePartitioning = $timePartitioning;
  }
  /**
   * @return Google_Service_Bigquery_TimePartitioning
   */
  public function getTimePartitioning()
  {
    return $this->timePartitioning;
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
