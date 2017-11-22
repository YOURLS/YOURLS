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

class Google_Service_Sheets_OverlayPosition extends Google_Model
{
  protected $anchorCellType = 'Google_Service_Sheets_GridCoordinate';
  protected $anchorCellDataType = '';
  public $heightPixels;
  public $offsetXPixels;
  public $offsetYPixels;
  public $widthPixels;

  /**
   * @param Google_Service_Sheets_GridCoordinate
   */
  public function setAnchorCell(Google_Service_Sheets_GridCoordinate $anchorCell)
  {
    $this->anchorCell = $anchorCell;
  }
  /**
   * @return Google_Service_Sheets_GridCoordinate
   */
  public function getAnchorCell()
  {
    return $this->anchorCell;
  }
  public function setHeightPixels($heightPixels)
  {
    $this->heightPixels = $heightPixels;
  }
  public function getHeightPixels()
  {
    return $this->heightPixels;
  }
  public function setOffsetXPixels($offsetXPixels)
  {
    $this->offsetXPixels = $offsetXPixels;
  }
  public function getOffsetXPixels()
  {
    return $this->offsetXPixels;
  }
  public function setOffsetYPixels($offsetYPixels)
  {
    $this->offsetYPixels = $offsetYPixels;
  }
  public function getOffsetYPixels()
  {
    return $this->offsetYPixels;
  }
  public function setWidthPixels($widthPixels)
  {
    $this->widthPixels = $widthPixels;
  }
  public function getWidthPixels()
  {
    return $this->widthPixels;
  }
}
