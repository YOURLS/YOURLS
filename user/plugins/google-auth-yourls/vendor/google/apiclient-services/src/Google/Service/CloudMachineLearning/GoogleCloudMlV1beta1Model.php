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

class Google_Service_CloudMachineLearning_GoogleCloudMlV1beta1Model extends Google_Model
{
  protected $defaultVersionType = 'Google_Service_CloudMachineLearning_GoogleCloudMlV1beta1Version';
  protected $defaultVersionDataType = '';
  public $description;
  public $name;

  public function setDefaultVersion(Google_Service_CloudMachineLearning_GoogleCloudMlV1beta1Version $defaultVersion)
  {
    $this->defaultVersion = $defaultVersion;
  }
  public function getDefaultVersion()
  {
    return $this->defaultVersion;
  }
  public function setDescription($description)
  {
    $this->description = $description;
  }
  public function getDescription()
  {
    return $this->description;
  }
  public function setName($name)
  {
    $this->name = $name;
  }
  public function getName()
  {
    return $this->name;
  }
}
