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

class Google_Service_ToolResults_TestExecutionStep extends Google_Collection
{
  protected $collection_key = 'testSuiteOverviews';
  protected $testIssuesType = 'Google_Service_ToolResults_TestIssue';
  protected $testIssuesDataType = 'array';
  protected $testSuiteOverviewsType = 'Google_Service_ToolResults_TestSuiteOverview';
  protected $testSuiteOverviewsDataType = 'array';
  protected $testTimingType = 'Google_Service_ToolResults_TestTiming';
  protected $testTimingDataType = '';
  protected $toolExecutionType = 'Google_Service_ToolResults_ToolExecution';
  protected $toolExecutionDataType = '';

  /**
   * @param Google_Service_ToolResults_TestIssue
   */
  public function setTestIssues($testIssues)
  {
    $this->testIssues = $testIssues;
  }
  /**
   * @return Google_Service_ToolResults_TestIssue
   */
  public function getTestIssues()
  {
    return $this->testIssues;
  }
  /**
   * @param Google_Service_ToolResults_TestSuiteOverview
   */
  public function setTestSuiteOverviews($testSuiteOverviews)
  {
    $this->testSuiteOverviews = $testSuiteOverviews;
  }
  /**
   * @return Google_Service_ToolResults_TestSuiteOverview
   */
  public function getTestSuiteOverviews()
  {
    return $this->testSuiteOverviews;
  }
  /**
   * @param Google_Service_ToolResults_TestTiming
   */
  public function setTestTiming(Google_Service_ToolResults_TestTiming $testTiming)
  {
    $this->testTiming = $testTiming;
  }
  /**
   * @return Google_Service_ToolResults_TestTiming
   */
  public function getTestTiming()
  {
    return $this->testTiming;
  }
  /**
   * @param Google_Service_ToolResults_ToolExecution
   */
  public function setToolExecution(Google_Service_ToolResults_ToolExecution $toolExecution)
  {
    $this->toolExecution = $toolExecution;
  }
  /**
   * @return Google_Service_ToolResults_ToolExecution
   */
  public function getToolExecution()
  {
    return $this->toolExecution;
  }
}
