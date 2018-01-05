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

class Google_Service_Dfareporting_OptimizationActivity extends Google_Model
{
  public $floodlightActivityId;
  protected $floodlightActivityIdDimensionValueType = 'Google_Service_Dfareporting_DimensionValue';
  protected $floodlightActivityIdDimensionValueDataType = '';
  public $weight;

  public function setFloodlightActivityId($floodlightActivityId)
  {
    $this->floodlightActivityId = $floodlightActivityId;
  }
  public function getFloodlightActivityId()
  {
    return $this->floodlightActivityId;
  }
  /**
   * @param Google_Service_Dfareporting_DimensionValue
   */
  public function setFloodlightActivityIdDimensionValue(Google_Service_Dfareporting_DimensionValue $floodlightActivityIdDimensionValue)
  {
    $this->floodlightActivityIdDimensionValue = $floodlightActivityIdDimensionValue;
  }
  /**
   * @return Google_Service_Dfareporting_DimensionValue
   */
  public function getFloodlightActivityIdDimensionValue()
  {
    return $this->floodlightActivityIdDimensionValue;
  }
  public function setWeight($weight)
  {
    $this->weight = $weight;
  }
  public function getWeight()
  {
    return $this->weight;
  }
}
