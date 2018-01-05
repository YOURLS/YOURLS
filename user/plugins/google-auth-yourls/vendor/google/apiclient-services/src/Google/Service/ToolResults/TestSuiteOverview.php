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

class Google_Service_ToolResults_TestSuiteOverview extends Google_Model
{
  public $errorCount;
  public $failureCount;
  public $name;
  public $skippedCount;
  public $totalCount;
  protected $xmlSourceType = 'Google_Service_ToolResults_FileReference';
  protected $xmlSourceDataType = '';

  public function setErrorCount($errorCount)
  {
    $this->errorCount = $errorCount;
  }
  public function getErrorCount()
  {
    return $this->errorCount;
  }
  public function setFailureCount($failureCount)
  {
    $this->failureCount = $failureCount;
  }
  public function getFailureCount()
  {
    return $this->failureCount;
  }
  public function setName($name)
  {
    $this->name = $name;
  }
  public function getName()
  {
    return $this->name;
  }
  public function setSkippedCount($skippedCount)
  {
    $this->skippedCount = $skippedCount;
  }
  public function getSkippedCount()
  {
    return $this->skippedCount;
  }
  public function setTotalCount($totalCount)
  {
    $this->totalCount = $totalCount;
  }
  public function getTotalCount()
  {
    return $this->totalCount;
  }
  /**
   * @param Google_Service_ToolResults_FileReference
   */
  public function setXmlSource(Google_Service_ToolResults_FileReference $xmlSource)
  {
    $this->xmlSource = $xmlSource;
  }
  /**
   * @return Google_Service_ToolResults_FileReference
   */
  public function getXmlSource()
  {
    return $this->xmlSource;
  }
}
