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

class Google_Service_YouTube_InvideoBranding extends Google_Model
{
  public $imageBytes;
  public $imageUrl;
  protected $positionType = 'Google_Service_YouTube_InvideoPosition';
  protected $positionDataType = '';
  public $targetChannelId;
  protected $timingType = 'Google_Service_YouTube_InvideoTiming';
  protected $timingDataType = '';

  public function setImageBytes($imageBytes)
  {
    $this->imageBytes = $imageBytes;
  }
  public function getImageBytes()
  {
    return $this->imageBytes;
  }
  public function setImageUrl($imageUrl)
  {
    $this->imageUrl = $imageUrl;
  }
  public function getImageUrl()
  {
    return $this->imageUrl;
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
  public function setTargetChannelId($targetChannelId)
  {
    $this->targetChannelId = $targetChannelId;
  }
  public function getTargetChannelId()
  {
    return $this->targetChannelId;
  }
  /**
   * @param Google_Service_YouTube_InvideoTiming
   */
  public function setTiming(Google_Service_YouTube_InvideoTiming $timing)
  {
    $this->timing = $timing;
  }
  /**
   * @return Google_Service_YouTube_InvideoTiming
   */
  public function getTiming()
  {
    return $this->timing;
  }
}
