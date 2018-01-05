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

class Google_Service_Dfareporting_PopupWindowProperties extends Google_Model
{
  protected $dimensionType = 'Google_Service_Dfareporting_Size';
  protected $dimensionDataType = '';
  protected $offsetType = 'Google_Service_Dfareporting_OffsetPosition';
  protected $offsetDataType = '';
  public $positionType;
  public $showAddressBar;
  public $showMenuBar;
  public $showScrollBar;
  public $showStatusBar;
  public $showToolBar;
  public $title;

  /**
   * @param Google_Service_Dfareporting_Size
   */
  public function setDimension(Google_Service_Dfareporting_Size $dimension)
  {
    $this->dimension = $dimension;
  }
  /**
   * @return Google_Service_Dfareporting_Size
   */
  public function getDimension()
  {
    return $this->dimension;
  }
  /**
   * @param Google_Service_Dfareporting_OffsetPosition
   */
  public function setOffset(Google_Service_Dfareporting_OffsetPosition $offset)
  {
    $this->offset = $offset;
  }
  /**
   * @return Google_Service_Dfareporting_OffsetPosition
   */
  public function getOffset()
  {
    return $this->offset;
  }
  public function setPositionType($positionType)
  {
    $this->positionType = $positionType;
  }
  public function getPositionType()
  {
    return $this->positionType;
  }
  public function setShowAddressBar($showAddressBar)
  {
    $this->showAddressBar = $showAddressBar;
  }
  public function getShowAddressBar()
  {
    return $this->showAddressBar;
  }
  public function setShowMenuBar($showMenuBar)
  {
    $this->showMenuBar = $showMenuBar;
  }
  public function getShowMenuBar()
  {
    return $this->showMenuBar;
  }
  public function setShowScrollBar($showScrollBar)
  {
    $this->showScrollBar = $showScrollBar;
  }
  public function getShowScrollBar()
  {
    return $this->showScrollBar;
  }
  public function setShowStatusBar($showStatusBar)
  {
    $this->showStatusBar = $showStatusBar;
  }
  public function getShowStatusBar()
  {
    return $this->showStatusBar;
  }
  public function setShowToolBar($showToolBar)
  {
    $this->showToolBar = $showToolBar;
  }
  public function getShowToolBar()
  {
    return $this->showToolBar;
  }
  public function setTitle($title)
  {
    $this->title = $title;
  }
  public function getTitle()
  {
    return $this->title;
  }
}
