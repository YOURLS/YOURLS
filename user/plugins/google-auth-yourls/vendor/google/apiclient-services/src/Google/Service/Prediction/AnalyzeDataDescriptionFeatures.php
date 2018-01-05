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

class Google_Service_Prediction_AnalyzeDataDescriptionFeatures extends Google_Model
{
  protected $categoricalType = 'Google_Service_Prediction_AnalyzeDataDescriptionFeaturesCategorical';
  protected $categoricalDataType = '';
  public $index;
  protected $numericType = 'Google_Service_Prediction_AnalyzeDataDescriptionFeaturesNumeric';
  protected $numericDataType = '';
  protected $textType = 'Google_Service_Prediction_AnalyzeDataDescriptionFeaturesText';
  protected $textDataType = '';

  /**
   * @param Google_Service_Prediction_AnalyzeDataDescriptionFeaturesCategorical
   */
  public function setCategorical(Google_Service_Prediction_AnalyzeDataDescriptionFeaturesCategorical $categorical)
  {
    $this->categorical = $categorical;
  }
  /**
   * @return Google_Service_Prediction_AnalyzeDataDescriptionFeaturesCategorical
   */
  public function getCategorical()
  {
    return $this->categorical;
  }
  public function setIndex($index)
  {
    $this->index = $index;
  }
  public function getIndex()
  {
    return $this->index;
  }
  /**
   * @param Google_Service_Prediction_AnalyzeDataDescriptionFeaturesNumeric
   */
  public function setNumeric(Google_Service_Prediction_AnalyzeDataDescriptionFeaturesNumeric $numeric)
  {
    $this->numeric = $numeric;
  }
  /**
   * @return Google_Service_Prediction_AnalyzeDataDescriptionFeaturesNumeric
   */
  public function getNumeric()
  {
    return $this->numeric;
  }
  /**
   * @param Google_Service_Prediction_AnalyzeDataDescriptionFeaturesText
   */
  public function setText(Google_Service_Prediction_AnalyzeDataDescriptionFeaturesText $text)
  {
    $this->text = $text;
  }
  /**
   * @return Google_Service_Prediction_AnalyzeDataDescriptionFeaturesText
   */
  public function getText()
  {
    return $this->text;
  }
}
