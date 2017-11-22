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

class Google_Service_Testing_AndroidRoboTest extends Google_Collection
{
  protected $collection_key = 'roboDirectives';
  protected $appApkType = 'Google_Service_Testing_FileReference';
  protected $appApkDataType = '';
  public $appInitialActivity;
  public $appPackageId;
  public $maxDepth;
  public $maxSteps;
  protected $roboDirectivesType = 'Google_Service_Testing_RoboDirective';
  protected $roboDirectivesDataType = 'array';

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
  public function setAppInitialActivity($appInitialActivity)
  {
    $this->appInitialActivity = $appInitialActivity;
  }
  public function getAppInitialActivity()
  {
    return $this->appInitialActivity;
  }
  public function setAppPackageId($appPackageId)
  {
    $this->appPackageId = $appPackageId;
  }
  public function getAppPackageId()
  {
    return $this->appPackageId;
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
  /**
   * @param Google_Service_Testing_RoboDirective
   */
  public function setRoboDirectives($roboDirectives)
  {
    $this->roboDirectives = $roboDirectives;
  }
  /**
   * @return Google_Service_Testing_RoboDirective
   */
  public function getRoboDirectives()
  {
    return $this->roboDirectives;
  }
}
