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

class Google_Service_Slides_TableBorderProperties extends Google_Model
{
  public $dashStyle;
  protected $tableBorderFillType = 'Google_Service_Slides_TableBorderFill';
  protected $tableBorderFillDataType = '';
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
   * @param Google_Service_Slides_TableBorderFill
   */
  public function setTableBorderFill(Google_Service_Slides_TableBorderFill $tableBorderFill)
  {
    $this->tableBorderFill = $tableBorderFill;
  }
  /**
   * @return Google_Service_Slides_TableBorderFill
   */
  public function getTableBorderFill()
  {
    return $this->tableBorderFill;
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
