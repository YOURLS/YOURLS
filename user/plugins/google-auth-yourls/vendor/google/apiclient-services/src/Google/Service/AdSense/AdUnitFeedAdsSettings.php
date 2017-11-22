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

class Google_Service_AdSense_AdUnitFeedAdsSettings extends Google_Model
{
  public $adPosition;
  public $frequency;
  public $minimumWordCount;
  public $type;

  public function setAdPosition($adPosition)
  {
    $this->adPosition = $adPosition;
  }
  public function getAdPosition()
  {
    return $this->adPosition;
  }
  public function setFrequency($frequency)
  {
    $this->frequency = $frequency;
  }
  public function getFrequency()
  {
    return $this->frequency;
  }
  public function setMinimumWordCount($minimumWordCount)
  {
    $this->minimumWordCount = $minimumWordCount;
  }
  public function getMinimumWordCount()
  {
    return $this->minimumWordCount;
  }
  public function setType($type)
  {
    $this->type = $type;
  }
  public function getType()
  {
    return $this->type;
  }
}
