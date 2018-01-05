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

class Google_Service_Testing_TestSpecification extends Google_Model
{
  protected $androidInstrumentationTestType = 'Google_Service_Testing_AndroidInstrumentationTest';
  protected $androidInstrumentationTestDataType = '';
  protected $androidRoboTestType = 'Google_Service_Testing_AndroidRoboTest';
  protected $androidRoboTestDataType = '';
  protected $androidTestLoopType = 'Google_Service_Testing_AndroidTestLoop';
  protected $androidTestLoopDataType = '';
  public $autoGoogleLogin;
  public $disablePerformanceMetrics;
  public $disableVideoRecording;
  protected $testSetupType = 'Google_Service_Testing_TestSetup';
  protected $testSetupDataType = '';
  public $testTimeout;

  /**
   * @param Google_Service_Testing_AndroidInstrumentationTest
   */
  public function setAndroidInstrumentationTest(Google_Service_Testing_AndroidInstrumentationTest $androidInstrumentationTest)
  {
    $this->androidInstrumentationTest = $androidInstrumentationTest;
  }
  /**
   * @return Google_Service_Testing_AndroidInstrumentationTest
   */
  public function getAndroidInstrumentationTest()
  {
    return $this->androidInstrumentationTest;
  }
  /**
   * @param Google_Service_Testing_AndroidRoboTest
   */
  public function setAndroidRoboTest(Google_Service_Testing_AndroidRoboTest $androidRoboTest)
  {
    $this->androidRoboTest = $androidRoboTest;
  }
  /**
   * @return Google_Service_Testing_AndroidRoboTest
   */
  public function getAndroidRoboTest()
  {
    return $this->androidRoboTest;
  }
  /**
   * @param Google_Service_Testing_AndroidTestLoop
   */
  public function setAndroidTestLoop(Google_Service_Testing_AndroidTestLoop $androidTestLoop)
  {
    $this->androidTestLoop = $androidTestLoop;
  }
  /**
   * @return Google_Service_Testing_AndroidTestLoop
   */
  public function getAndroidTestLoop()
  {
    return $this->androidTestLoop;
  }
  public function setAutoGoogleLogin($autoGoogleLogin)
  {
    $this->autoGoogleLogin = $autoGoogleLogin;
  }
  public function getAutoGoogleLogin()
  {
    return $this->autoGoogleLogin;
  }
  public function setDisablePerformanceMetrics($disablePerformanceMetrics)
  {
    $this->disablePerformanceMetrics = $disablePerformanceMetrics;
  }
  public function getDisablePerformanceMetrics()
  {
    return $this->disablePerformanceMetrics;
  }
  public function setDisableVideoRecording($disableVideoRecording)
  {
    $this->disableVideoRecording = $disableVideoRecording;
  }
  public function getDisableVideoRecording()
  {
    return $this->disableVideoRecording;
  }
  /**
   * @param Google_Service_Testing_TestSetup
   */
  public function setTestSetup(Google_Service_Testing_TestSetup $testSetup)
  {
    $this->testSetup = $testSetup;
  }
  /**
   * @return Google_Service_Testing_TestSetup
   */
  public function getTestSetup()
  {
    return $this->testSetup;
  }
  public function setTestTimeout($testTimeout)
  {
    $this->testTimeout = $testTimeout;
  }
  public function getTestTimeout()
  {
    return $this->testTimeout;
  }
}
