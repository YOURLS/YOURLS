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

class Google_Service_CloudMachineLearningEngine_GoogleCloudMlV1ParameterSpec extends Google_Collection
{
  protected $collection_key = 'discreteValues';
  public $categoricalValues;
  public $discreteValues;
  public $maxValue;
  public $minValue;
  public $parameterName;
  public $scaleType;
  public $type;

  public function setCategoricalValues($categoricalValues)
  {
    $this->categoricalValues = $categoricalValues;
  }
  public function getCategoricalValues()
  {
    return $this->categoricalValues;
  }
  public function setDiscreteValues($discreteValues)
  {
    $this->discreteValues = $discreteValues;
  }
  public function getDiscreteValues()
  {
    return $this->discreteValues;
  }
  public function setMaxValue($maxValue)
  {
    $this->maxValue = $maxValue;
  }
  public function getMaxValue()
  {
    return $this->maxValue;
  }
  public function setMinValue($minValue)
  {
    $this->minValue = $minValue;
  }
  public function getMinValue()
  {
    return $this->minValue;
  }
  public function setParameterName($parameterName)
  {
    $this->parameterName = $parameterName;
  }
  public function getParameterName()
  {
    return $this->parameterName;
  }
  public function setScaleType($scaleType)
  {
    $this->scaleType = $scaleType;
  }
  public function getScaleType()
  {
    return $this->scaleType;
  }
  public function setType($type)
  {
    $this->type = $type;
  }
  public function getType()
  {
    return $this->type;
  }
}
