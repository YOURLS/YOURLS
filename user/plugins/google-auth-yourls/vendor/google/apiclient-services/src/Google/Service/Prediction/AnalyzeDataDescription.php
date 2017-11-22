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

class Google_Service_Prediction_AnalyzeDataDescription extends Google_Collection
{
  protected $collection_key = 'features';
  protected $featuresType = 'Google_Service_Prediction_AnalyzeDataDescriptionFeatures';
  protected $featuresDataType = 'array';
  protected $outputFeatureType = 'Google_Service_Prediction_AnalyzeDataDescriptionOutputFeature';
  protected $outputFeatureDataType = '';

  /**
   * @param Google_Service_Prediction_AnalyzeDataDescriptionFeatures
   */
  public function setFeatures($features)
  {
    $this->features = $features;
  }
  /**
   * @return Google_Service_Prediction_AnalyzeDataDescriptionFeatures
   */
  public function getFeatures()
  {
    return $this->features;
  }
  /**
   * @param Google_Service_Prediction_AnalyzeDataDescriptionOutputFeature
   */
  public function setOutputFeature(Google_Service_Prediction_AnalyzeDataDescriptionOutputFeature $outputFeature)
  {
    $this->outputFeature = $outputFeature;
  }
  /**
   * @return Google_Service_Prediction_AnalyzeDataDescriptionOutputFeature
   */
  public function getOutputFeature()
  {
    return $this->outputFeature;
  }
}
