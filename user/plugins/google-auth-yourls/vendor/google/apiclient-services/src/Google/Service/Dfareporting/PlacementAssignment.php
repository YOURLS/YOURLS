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

class Google_Service_Dfareporting_PlacementAssignment extends Google_Model
{
  public $active;
  public $placementId;
  protected $placementIdDimensionValueType = 'Google_Service_Dfareporting_DimensionValue';
  protected $placementIdDimensionValueDataType = '';
  public $sslRequired;

  public function setActive($active)
  {
    $this->active = $active;
  }
  public function getActive()
  {
    return $this->active;
  }
  public function setPlacementId($placementId)
  {
    $this->placementId = $placementId;
  }
  public function getPlacementId()
  {
    return $this->placementId;
  }
  /**
   * @param Google_Service_Dfareporting_DimensionValue
   */
  public function setPlacementIdDimensionValue(Google_Service_Dfareporting_DimensionValue $placementIdDimensionValue)
  {
    $this->placementIdDimensionValue = $placementIdDimensionValue;
  }
  /**
   * @return Google_Service_Dfareporting_DimensionValue
   */
  public function getPlacementIdDimensionValue()
  {
    return $this->placementIdDimensionValue;
  }
  public function setSslRequired($sslRequired)
  {
    $this->sslRequired = $sslRequired;
  }
  public function getSslRequired()
  {
    return $this->sslRequired;
  }
}
