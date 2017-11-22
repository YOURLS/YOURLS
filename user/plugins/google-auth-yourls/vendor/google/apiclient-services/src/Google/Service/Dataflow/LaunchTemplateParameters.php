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

class Google_Service_Dataflow_LaunchTemplateParameters extends Google_Model
{
  protected $environmentType = 'Google_Service_Dataflow_RuntimeEnvironment';
  protected $environmentDataType = '';
  public $jobName;
  public $parameters;

  /**
   * @param Google_Service_Dataflow_RuntimeEnvironment
   */
  public function setEnvironment(Google_Service_Dataflow_RuntimeEnvironment $environment)
  {
    $this->environment = $environment;
  }
  /**
   * @return Google_Service_Dataflow_RuntimeEnvironment
   */
  public function getEnvironment()
  {
    return $this->environment;
  }
  public function setJobName($jobName)
  {
    $this->jobName = $jobName;
  }
  public function getJobName()
  {
    return $this->jobName;
  }
  public function setParameters($parameters)
  {
    $this->parameters = $parameters;
  }
  public function getParameters()
  {
    return $this->parameters;
  }
}
