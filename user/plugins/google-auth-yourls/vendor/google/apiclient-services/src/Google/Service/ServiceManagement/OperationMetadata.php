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

class Google_Service_ServiceManagement_OperationMetadata extends Google_Collection
{
  protected $collection_key = 'steps';
  public $progressPercentage;
  public $resourceNames;
  public $startTime;
  protected $stepsType = 'Google_Service_ServiceManagement_Step';
  protected $stepsDataType = 'array';

  public function setProgressPercentage($progressPercentage)
  {
    $this->progressPercentage = $progressPercentage;
  }
  public function getProgressPercentage()
  {
    return $this->progressPercentage;
  }
  public function setResourceNames($resourceNames)
  {
    $this->resourceNames = $resourceNames;
  }
  public function getResourceNames()
  {
    return $this->resourceNames;
  }
  public function setStartTime($startTime)
  {
    $this->startTime = $startTime;
  }
  public function getStartTime()
  {
    return $this->startTime;
  }
  /**
   * @param Google_Service_ServiceManagement_Step
   */
  public function setSteps($steps)
  {
    $this->steps = $steps;
  }
  /**
   * @return Google_Service_ServiceManagement_Step
   */
  public function getSteps()
  {
    return $this->steps;
  }
}
