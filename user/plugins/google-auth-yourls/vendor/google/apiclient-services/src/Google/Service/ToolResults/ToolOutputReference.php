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

class Google_Service_ToolResults_ToolOutputReference extends Google_Model
{
  protected $creationTimeType = 'Google_Service_ToolResults_Timestamp';
  protected $creationTimeDataType = '';
  protected $outputType = 'Google_Service_ToolResults_FileReference';
  protected $outputDataType = '';
  protected $testCaseType = 'Google_Service_ToolResults_TestCaseReference';
  protected $testCaseDataType = '';

  /**
   * @param Google_Service_ToolResults_Timestamp
   */
  public function setCreationTime(Google_Service_ToolResults_Timestamp $creationTime)
  {
    $this->creationTime = $creationTime;
  }
  /**
   * @return Google_Service_ToolResults_Timestamp
   */
  public function getCreationTime()
  {
    return $this->creationTime;
  }
  /**
   * @param Google_Service_ToolResults_FileReference
   */
  public function setOutput(Google_Service_ToolResults_FileReference $output)
  {
    $this->output = $output;
  }
  /**
   * @return Google_Service_ToolResults_FileReference
   */
  public function getOutput()
  {
    return $this->output;
  }
  /**
   * @param Google_Service_ToolResults_TestCaseReference
   */
  public function setTestCase(Google_Service_ToolResults_TestCaseReference $testCase)
  {
    $this->testCase = $testCase;
  }
  /**
   * @return Google_Service_ToolResults_TestCaseReference
   */
  public function getTestCase()
  {
    return $this->testCase;
  }
}
