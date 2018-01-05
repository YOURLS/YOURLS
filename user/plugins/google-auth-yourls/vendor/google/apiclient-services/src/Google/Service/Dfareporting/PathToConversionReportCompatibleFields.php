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

class Google_Service_Dfareporting_PathToConversionReportCompatibleFields extends Google_Collection
{
  protected $collection_key = 'perInteractionDimensions';
  protected $conversionDimensionsType = 'Google_Service_Dfareporting_Dimension';
  protected $conversionDimensionsDataType = 'array';
  protected $customFloodlightVariablesType = 'Google_Service_Dfareporting_Dimension';
  protected $customFloodlightVariablesDataType = 'array';
  public $kind;
  protected $metricsType = 'Google_Service_Dfareporting_Metric';
  protected $metricsDataType = 'array';
  protected $perInteractionDimensionsType = 'Google_Service_Dfareporting_Dimension';
  protected $perInteractionDimensionsDataType = 'array';

  /**
   * @param Google_Service_Dfareporting_Dimension
   */
  public function setConversionDimensions($conversionDimensions)
  {
    $this->conversionDimensions = $conversionDimensions;
  }
  /**
   * @return Google_Service_Dfareporting_Dimension
   */
  public function getConversionDimensions()
  {
    return $this->conversionDimensions;
  }
  /**
   * @param Google_Service_Dfareporting_Dimension
   */
  public function setCustomFloodlightVariables($customFloodlightVariables)
  {
    $this->customFloodlightVariables = $customFloodlightVariables;
  }
  /**
   * @return Google_Service_Dfareporting_Dimension
   */
  public function getCustomFloodlightVariables()
  {
    return $this->customFloodlightVariables;
  }
  public function setKind($kind)
  {
    $this->kind = $kind;
  }
  public function getKind()
  {
    return $this->kind;
  }
  /**
   * @param Google_Service_Dfareporting_Metric
   */
  public function setMetrics($metrics)
  {
    $this->metrics = $metrics;
  }
  /**
   * @return Google_Service_Dfareporting_Metric
   */
  public function getMetrics()
  {
    return $this->metrics;
  }
  /**
   * @param Google_Service_Dfareporting_Dimension
   */
  public function setPerInteractionDimensions($perInteractionDimensions)
  {
    $this->perInteractionDimensions = $perInteractionDimensions;
  }
  /**
   * @return Google_Service_Dfareporting_Dimension
   */
  public function getPerInteractionDimensions()
  {
    return $this->perInteractionDimensions;
  }
}
