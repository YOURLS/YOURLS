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

class Google_Service_Slides_Outline extends Google_Model
{
  public $dashStyle;
  protected $outlineFillType = 'Google_Service_Slides_OutlineFill';
  protected $outlineFillDataType = '';
  public $propertyState;
  protected $weightType = 'Google_Service_Slides_Dimension';
  protected $weightDataType = '';

  public function setDashStyle($dashStyle)
  {
    $this->dashStyle = $dashStyle;
  }
  public function getDashStyle()
  {
    return $this->dashStyle;
  }
  /**
   * @param Google_Service_Slides_OutlineFill
   */
  public function setOutlineFill(Google_Service_Slides_OutlineFill $outlineFill)
  {
    $this->outlineFill = $outlineFill;
  }
  /**
   * @return Google_Service_Slides_OutlineFill
   */
  public function getOutlineFill()
  {
    return $this->outlineFill;
  }
  public function setPropertyState($propertyState)
  {
    $this->propertyState = $propertyState;
  }
  public function getPropertyState()
  {
    return $this->propertyState;
  }
  /**
   * @param Google_Service_Slides_Dimension
   */
  public function setWeight(Google_Service_Slides_Dimension $weight)
  {
    $this->weight = $weight;
  }
  /**
   * @return Google_Service_Slides_Dimension
   */
  public function getWeight()
  {
    return $this->weight;
  }
}
