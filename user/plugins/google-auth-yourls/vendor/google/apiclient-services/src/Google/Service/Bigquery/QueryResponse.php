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

class Google_Service_Bigquery_QueryResponse extends Google_Collection
{
  protected $collection_key = 'rows';
  public $cacheHit;
  protected $errorsType = 'Google_Service_Bigquery_ErrorProto';
  protected $errorsDataType = 'array';
  public $jobComplete;
  protected $jobReferenceType = 'Google_Service_Bigquery_JobReference';
  protected $jobReferenceDataType = '';
  public $kind;
  public $numDmlAffectedRows;
  public $pageToken;
  protected $rowsType = 'Google_Service_Bigquery_TableRow';
  protected $rowsDataType = 'array';
  protected $schemaType = 'Google_Service_Bigquery_TableSchema';
  protected $schemaDataType = '';
  public $totalBytesProcessed;
  public $totalRows;

  public function setCacheHit($cacheHit)
  {
    $this->cacheHit = $cacheHit;
  }
  public function getCacheHit()
  {
    return $this->cacheHit;
  }
  /**
   * @param Google_Service_Bigquery_ErrorProto
   */
  public function setErrors($errors)
  {
    $this->errors = $errors;
  }
  /**
   * @return Google_Service_Bigquery_ErrorProto
   */
  public function getErrors()
  {
    return $this->errors;
  }
  public function setJobComplete($jobComplete)
  {
    $this->jobComplete = $jobComplete;
  }
  public function getJobComplete()
  {
    return $this->jobComplete;
  }
  /**
   * @param Google_Service_Bigquery_JobReference
   */
  public function setJobReference(Google_Service_Bigquery_JobReference $jobReference)
  {
    $this->jobReference = $jobReference;
  }
  /**
   * @return Google_Service_Bigquery_JobReference
   */
  public function getJobReference()
  {
    return $this->jobReference;
  }
  public function setKind($kind)
  {
    $this->kind = $kind;
  }
  public function getKind()
  {
    return $this->kind;
  }
  public function setNumDmlAffectedRows($numDmlAffectedRows)
  {
    $this->numDmlAffectedRows = $numDmlAffectedRows;
  }
  public function getNumDmlAffectedRows()
  {
    return $this->numDmlAffectedRows;
  }
  public function setPageToken($pageToken)
  {
    $this->pageToken = $pageToken;
  }
  public function getPageToken()
  {
    return $this->pageToken;
  }
  /**
   * @param Google_Service_Bigquery_TableRow
   */
  public function setRows($rows)
  {
    $this->rows = $rows;
  }
  /**
   * @return Google_Service_Bigquery_TableRow
   */
  public function getRows()
  {
    return $this->rows;
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
  public function setTotalBytesProcessed($totalBytesProcessed)
  {
    $this->totalBytesProcessed = $totalBytesProcessed;
  }
  public function getTotalBytesProcessed()
  {
    return $this->totalBytesProcessed;
  }
  public function setTotalRows($totalRows)
  {
    $this->totalRows = $totalRows;
  }
  public function getTotalRows()
  {
    return $this->totalRows;
  }
}
