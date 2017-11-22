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

class Google_Service_YouTube_InvideoPromotion extends Google_Collection
{
  protected $collection_key = 'items';
  protected $defaultTimingType = 'Google_Service_YouTube_InvideoTiming';
  protected $defaultTimingDataType = '';
  protected $itemsType = 'Google_Service_YouTube_PromotedItem';
  protected $itemsDataType = 'array';
  protected $positionType = 'Google_Service_YouTube_InvideoPosition';
  protected $positionDataType = '';
  public $useSmartTiming;

  /**
   * @param Google_Service_YouTube_InvideoTiming
   */
  public function setDefaultTiming(Google_Service_YouTube_InvideoTiming $defaultTiming)
  {
    $this->defaultTiming = $defaultTiming;
  }
  /**
   * @return Google_Service_YouTube_InvideoTiming
   */
  public function getDefaultTiming()
  {
    return $this->defaultTiming;
  }
  /**
   * @param Google_Service_YouTube_PromotedItem
   */
  public function setItems($items)
  {
    $this->items = $items;
  }
  /**
   * @return Google_Service_YouTube_PromotedItem
   */
  public function getItems()
  {
    return $this->items;
  }
  /**
   * @param Google_Service_YouTube_InvideoPosition
   */
  public function setPosition(Google_Service_YouTube_InvideoPosition $position)
  {
    $this->position = $position;
  }
  /**
   * @return Google_Service_YouTube_InvideoPosition
   */
  public function getPosition()
  {
    return $this->position;
  }
  public function setUseSmartTiming($useSmartTiming)
  {
    $this->useSmartTiming = $useSmartTiming;
  }
  public function getUseSmartTiming()
  {
    return $this->useSmartTiming;
  }
}
