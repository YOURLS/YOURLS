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

class Google_Service_ToolResults_AndroidTest extends Google_Model
{
  protected $androidAppInfoType = 'Google_Service_ToolResults_AndroidAppInfo';
  protected $androidAppInfoDataType = '';
  protected $androidInstrumentationTestType = 'Google_Service_ToolResults_AndroidInstrumentationTest';
  protected $androidInstrumentationTestDataType = '';
  protected $androidRoboTestType = 'Google_Service_ToolResults_AndroidRoboTest';
  protected $androidRoboTestDataType = '';
  protected $testTimeoutType = 'Google_Service_ToolResults_Duration';
  protected $testTimeoutDataType = '';

  /**
   * @param Google_Service_ToolResults_AndroidAppInfo
   */
  public function setAndroidAppInfo(Google_Service_ToolResults_AndroidAppInfo $androidAppInfo)
  {
    $this->androidAppInfo = $androidAppInfo;
  }
  /**
   * @return Google_Service_ToolResults_AndroidAppInfo
   */
  public function getAndroidAppInfo()
  {
    return $this->androidAppInfo;
  }
  /**
   * @param Google_Service_ToolResults_AndroidInstrumentationTest
   */
  public function setAndroidInstrumentationTest(Google_Service_ToolResults_AndroidInstrumentationTest $androidInstrumentationTest)
  {
    $this->androidInstrumentationTest = $androidInstrumentationTest;
  }
  /**
   * @return Google_Service_ToolResults_AndroidInstrumentationTest
   */
  public function getAndroidInstrumentationTest()
  {
    return $this->androidInstrumentationTest;
  }
  /**
   * @param Google_Service_ToolResults_AndroidRoboTest
   */
  public function setAndroidRoboTest(Google_Service_ToolResults_AndroidRoboTest $androidRoboTest)
  {
    $this->androidRoboTest = $androidRoboTest;
  }
  /**
   * @return Google_Service_ToolResults_AndroidRoboTest
   */
  public function getAndroidRoboTest()
  {
    return $this->androidRoboTest;
  }
  /**
   * @param Google_Service_ToolResults_Duration
   */
  public function setTestTimeout(Google_Service_ToolResults_Duration $testTimeout)
  {
    $this->testTimeout = $testTimeout;
  }
  /**
   * @return Google_Service_ToolResults_Duration
   */
  public function getTestTimeout()
  {
    return $this->testTimeout;
  }
}
