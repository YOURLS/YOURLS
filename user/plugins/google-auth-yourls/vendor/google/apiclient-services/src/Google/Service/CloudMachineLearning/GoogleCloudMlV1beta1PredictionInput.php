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

class Google_Service_CloudMachineLearning_GoogleCloudMlV1beta1PredictionInput extends Google_Collection
{
  protected $collection_key = 'inputPaths';
  public $dataFormat;
  public $inputPaths;
  public $maxWorkerCount;
  public $modelName;
  public $outputPath;
  public $region;
  public $versionName;

  public function setDataFormat($dataFormat)
  {
    $this->dataFormat = $dataFormat;
  }
  public function getDataFormat()
  {
    return $this->dataFormat;
  }
  public function setInputPaths($inputPaths)
  {
    $this->inputPaths = $inputPaths;
  }
  public function getInputPaths()
  {
    return $this->inputPaths;
  }
  public function setMaxWorkerCount($maxWorkerCount)
  {
    $this->maxWorkerCount = $maxWorkerCount;
  }
  public function getMaxWorkerCount()
  {
    return $this->maxWorkerCount;
  }
  public function setModelName($modelName)
  {
    $this->modelName = $modelName;
  }
  public function getModelName()
  {
    return $this->modelName;
  }
  public function setOutputPath($outputPath)
  {
    $this->outputPath = $outputPath;
  }
  public function getOutputPath()
  {
    return $this->outputPath;
  }
  public function setRegion($region)
  {
    $this->region = $region;
  }
  public function getRegion()
  {
    return $this->region;
  }
  public function setVersionName($versionName)
  {
    $this->versionName = $versionName;
  }
  public function getVersionName()
  {
    return $this->versionName;
  }
}
