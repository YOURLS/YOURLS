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

class Google_Service_ToolResults_AndroidRoboTest extends Google_Model
{
  public $appInitialActivity;
  public $bootstrapPackageId;
  public $bootstrapRunnerClass;
  public $maxDepth;
  public $maxSteps;

  public function setAppInitialActivity($appInitialActivity)
  {
    $this->appInitialActivity = $appInitialActivity;
  }
  public function getAppInitialActivity()
  {
    return $this->appInitialActivity;
  }
  public function setBootstrapPackageId($bootstrapPackageId)
  {
    $this->bootstrapPackageId = $bootstrapPackageId;
  }
  public function getBootstrapPackageId()
  {
    return $this->bootstrapPackageId;
  }
  public function setBootstrapRunnerClass($bootstrapRunnerClass)
  {
    $this->bootstrapRunnerClass = $bootstrapRunnerClass;
  }
  public function getBootstrapRunnerClass()
  {
    return $this->bootstrapRunnerClass;
  }
  public function setMaxDepth($maxDepth)
  {
    $this->maxDepth = $maxDepth;
  }
  public function getMaxDepth()
  {
    return $this->maxDepth;
  }
  public function setMaxSteps($maxSteps)
  {
    $this->maxSteps = $maxSteps;
  }
  public function getMaxSteps()
  {
    return $this->maxSteps;
  }
}
