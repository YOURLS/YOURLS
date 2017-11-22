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

class Google_Service_Slides_CreateParagraphBulletsRequest extends Google_Model
{
  public $bulletPreset;
  protected $cellLocationType = 'Google_Service_Slides_TableCellLocation';
  protected $cellLocationDataType = '';
  public $objectId;
  protected $textRangeType = 'Google_Service_Slides_Range';
  protected $textRangeDataType = '';

  public function setBulletPreset($bulletPreset)
  {
    $this->bulletPreset = $bulletPreset;
  }
  public function getBulletPreset()
  {
    return $this->bulletPreset;
  }
  /**
   * @param Google_Service_Slides_TableCellLocation
   */
  public function setCellLocation(Google_Service_Slides_TableCellLocation $cellLocation)
  {
    $this->cellLocation = $cellLocation;
  }
  /**
   * @return Google_Service_Slides_TableCellLocation
   */
  public function getCellLocation()
  {
    return $this->cellLocation;
  }
  public function setObjectId($objectId)
  {
    $this->objectId = $objectId;
  }
  public function getObjectId()
  {
    return $this->objectId;
  }
  /**
   * @param Google_Service_Slides_Range
   */
  public function setTextRange(Google_Service_Slides_Range $textRange)
  {
    $this->textRange = $textRange;
  }
  /**
   * @return Google_Service_Slides_Range
   */
  public function getTextRange()
  {
    return $this->textRange;
  }
}
