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

class Google_Service_Slides_PageBackgroundFill extends Google_Model
{
  public $propertyState;
  protected $solidFillType = 'Google_Service_Slides_SolidFill';
  protected $solidFillDataType = '';
  protected $stretchedPictureFillType = 'Google_Service_Slides_StretchedPictureFill';
  protected $stretchedPictureFillDataType = '';

  public function setPropertyState($propertyState)
  {
    $this->propertyState = $propertyState;
  }
  public function getPropertyState()
  {
    return $this->propertyState;
  }
  /**
   * @param Google_Service_Slides_SolidFill
   */
  public function setSolidFill(Google_Service_Slides_SolidFill $solidFill)
  {
    $this->solidFill = $solidFill;
  }
  /**
   * @return Google_Service_Slides_SolidFill
   */
  public function getSolidFill()
  {
    return $this->solidFill;
  }
  /**
   * @param Google_Service_Slides_StretchedPictureFill
   */
  public function setStretchedPictureFill(Google_Service_Slides_StretchedPictureFill $stretchedPictureFill)
  {
    $this->stretchedPictureFill = $stretchedPictureFill;
  }
  /**
   * @return Google_Service_Slides_StretchedPictureFill
   */
  public function getStretchedPictureFill()
  {
    return $this->stretchedPictureFill;
  }
}
