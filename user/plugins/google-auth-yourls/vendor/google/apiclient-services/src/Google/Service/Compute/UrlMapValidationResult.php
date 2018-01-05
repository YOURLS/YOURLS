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

class Google_Service_Compute_UrlMapValidationResult extends Google_Collection
{
  protected $collection_key = 'testFailures';
  public $loadErrors;
  public $loadSucceeded;
  protected $testFailuresType = 'Google_Service_Compute_TestFailure';
  protected $testFailuresDataType = 'array';
  public $testPassed;

  public function setLoadErrors($loadErrors)
  {
    $this->loadErrors = $loadErrors;
  }
  public function getLoadErrors()
  {
    return $this->loadErrors;
  }
  public function setLoadSucceeded($loadSucceeded)
  {
    $this->loadSucceeded = $loadSucceeded;
  }
  public function getLoadSucceeded()
  {
    return $this->loadSucceeded;
  }
  /**
   * @param Google_Service_Compute_TestFailure
   */
  public function setTestFailures($testFailures)
  {
    $this->testFailures = $testFailures;
  }
  /**
   * @return Google_Service_Compute_TestFailure
   */
  public function getTestFailures()
  {
    return $this->testFailures;
  }
  public function setTestPassed($testPassed)
  {
    $this->testPassed = $testPassed;
  }
  public function getTestPassed()
  {
    return $this->testPassed;
  }
}
