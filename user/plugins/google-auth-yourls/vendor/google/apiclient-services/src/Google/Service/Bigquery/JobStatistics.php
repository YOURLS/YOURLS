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

class Google_Service_Bigquery_JobStatistics extends Google_Model
{
  public $creationTime;
  public $endTime;
  protected $extractType = 'Google_Service_Bigquery_JobStatistics4';
  protected $extractDataType = '';
  protected $loadType = 'Google_Service_Bigquery_JobStatistics3';
  protected $loadDataType = '';
  protected $queryType = 'Google_Service_Bigquery_JobStatistics2';
  protected $queryDataType = '';
  public $startTime;
  public $totalBytesProcessed;

  public function setCreationTime($creationTime)
  {
    $this->creationTime = $creationTime;
  }
  public function getCreationTime()
  {
    return $this->creationTime;
  }
  public function setEndTime($endTime)
  {
    $this->endTime = $endTime;
  }
  public function getEndTime()
  {
    return $this->endTime;
  }
  /**
   * @param Google_Service_Bigquery_JobStatistics4
   */
  public function setExtract(Google_Service_Bigquery_JobStatistics4 $extract)
  {
    $this->extract = $extract;
  }
  /**
   * @return Google_Service_Bigquery_JobStatistics4
   */
  public function getExtract()
  {
    return $this->extract;
  }
  /**
   * @param Google_Service_Bigquery_JobStatistics3
   */
  public function setLoad(Google_Service_Bigquery_JobStatistics3 $load)
  {
    $this->load = $load;
  }
  /**
   * @return Google_Service_Bigquery_JobStatistics3
   */
  public function getLoad()
  {
    return $this->load;
  }
  /**
   * @param Google_Service_Bigquery_JobStatistics2
   */
  public function setQuery(Google_Service_Bigquery_JobStatistics2 $query)
  {
    $this->query = $query;
  }
  /**
   * @return Google_Service_Bigquery_JobStatistics2
   */
  public function getQuery()
  {
    return $this->query;
  }
  public function setStartTime($startTime)
  {
    $this->startTime = $startTime;
  }
  public function getStartTime()
  {
    return $this->startTime;
  }
  public function setTotalBytesProcessed($totalBytesProcessed)
  {
    $this->totalBytesProcessed = $totalBytesProcessed;
  }
  public function getTotalBytesProcessed()
  {
    return $this->totalBytesProcessed;
  }
}
