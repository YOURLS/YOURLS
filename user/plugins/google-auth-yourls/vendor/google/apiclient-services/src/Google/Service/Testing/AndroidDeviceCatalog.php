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

class Google_Service_Testing_AndroidDeviceCatalog extends Google_Collection
{
  protected $collection_key = 'versions';
  protected $modelsType = 'Google_Service_Testing_AndroidModel';
  protected $modelsDataType = 'array';
  protected $runtimeConfigurationType = 'Google_Service_Testing_AndroidRuntimeConfiguration';
  protected $runtimeConfigurationDataType = '';
  protected $versionsType = 'Google_Service_Testing_AndroidVersion';
  protected $versionsDataType = 'array';

  /**
   * @param Google_Service_Testing_AndroidModel
   */
  public function setModels($models)
  {
    $this->models = $models;
  }
  /**
   * @return Google_Service_Testing_AndroidModel
   */
  public function getModels()
  {
    return $this->models;
  }
  /**
   * @param Google_Service_Testing_AndroidRuntimeConfiguration
   */
  public function setRuntimeConfiguration(Google_Service_Testing_AndroidRuntimeConfiguration $runtimeConfiguration)
  {
    $this->runtimeConfiguration = $runtimeConfiguration;
  }
  /**
   * @return Google_Service_Testing_AndroidRuntimeConfiguration
   */
  public function getRuntimeConfiguration()
  {
    return $this->runtimeConfiguration;
  }
  /**
   * @param Google_Service_Testing_AndroidVersion
   */
  public function setVersions($versions)
  {
    $this->versions = $versions;
  }
  /**
   * @return Google_Service_Testing_AndroidVersion
   */
  public function getVersions()
  {
    return $this->versions;
  }
}
