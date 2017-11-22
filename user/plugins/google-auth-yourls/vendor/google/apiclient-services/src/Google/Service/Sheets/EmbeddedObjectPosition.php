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

class Google_Service_Sheets_EmbeddedObjectPosition extends Google_Model
{
  public $newSheet;
  protected $overlayPositionType = 'Google_Service_Sheets_OverlayPosition';
  protected $overlayPositionDataType = '';
  public $sheetId;

  public function setNewSheet($newSheet)
  {
    $this->newSheet = $newSheet;
  }
  public function getNewSheet()
  {
    return $this->newSheet;
  }
  /**
   * @param Google_Service_Sheets_OverlayPosition
   */
  public function setOverlayPosition(Google_Service_Sheets_OverlayPosition $overlayPosition)
  {
    $this->overlayPosition = $overlayPosition;
  }
  /**
   * @return Google_Service_Sheets_OverlayPosition
   */
  public function getOverlayPosition()
  {
    return $this->overlayPosition;
  }
  public function setSheetId($sheetId)
  {
    $this->sheetId = $sheetId;
  }
  public function getSheetId()
  {
    return $this->sheetId;
  }
}
