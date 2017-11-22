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

class Google_Service_ToolResults_BasicPerfSampleSeries extends Google_Model
{
  public $perfMetricType;
  public $perfUnit;
  public $sampleSeriesLabel;

  public function setPerfMetricType($perfMetricType)
  {
    $this->perfMetricType = $perfMetricType;
  }
  public function getPerfMetricType()
  {
    return $this->perfMetricType;
  }
  public function setPerfUnit($perfUnit)
  {
    $this->perfUnit = $perfUnit;
  }
  public function getPerfUnit()
  {
    return $this->perfUnit;
  }
  public function setSampleSeriesLabel($sampleSeriesLabel)
  {
    $this->sampleSeriesLabel = $sampleSeriesLabel;
  }
  public function getSampleSeriesLabel()
  {
    return $this->sampleSeriesLabel;
  }
}
