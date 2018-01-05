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

class Google_Service_Testing_AndroidInstrumentationTest extends Google_Collection
{
  protected $collection_key = 'testTargets';
  protected $appApkType = 'Google_Service_Testing_FileReference';
  protected $appApkDataType = '';
  public $appPackageId;
  public $orchestratorOption;
  protected $testApkType = 'Google_Service_Testing_FileReference';
  protected $testApkDataType = '';
  public $testPackageId;
  public $testRunnerClass;
  public $testTargets;

  /**
   * @param Google_Service_Testing_FileReference
   */
  public function setAppApk(Google_Service_Testing_FileReference $appApk)
  {
    $this->appApk = $appApk;
  }
  /**
   * @return Google_Service_Testing_FileReference
   */
  public function getAppApk()
  {
    return $this->appApk;
  }
  public function setAppPackageId($appPackageId)
  {
    $this->appPackageId = $appPackageId;
  }
  public function getAppPackageId()
  {
    return $this->appPackageId;
  }
  public function setOrchestratorOption($orchestratorOption)
  {
    $this->orchestratorOption = $orchestratorOption;
  }
  public function getOrchestratorOption()
  {
    return $this->orchestratorOption;
  }
  /**
   * @param Google_Service_Testing_FileReference
   */
  public function setTestApk(Google_Service_Testing_FileReference $testApk)
  {
    $this->testApk = $testApk;
  }
  /**
   * @return Google_Service_Testing_FileReference
   */
  public function getTestApk()
  {
    return $this->testApk;
  }
  public function setTestPackageId($testPackageId)
  {
    $this->testPackageId = $testPackageId;
  }
  public function getTestPackageId()
  {
    return $this->testPackageId;
  }
  public function setTestRunnerClass($testRunnerClass)
  {
    $this->testRunnerClass = $testRunnerClass;
  }
  public function getTestRunnerClass()
  {
    return $this->testRunnerClass;
  }
  public function setTestTargets($testTargets)
  {
    $this->testTargets = $testTargets;
  }
  public function getTestTargets()
  {
    return $this->testTargets;
  }
}
