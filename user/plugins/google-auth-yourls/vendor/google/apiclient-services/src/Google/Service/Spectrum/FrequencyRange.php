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

class Google_Service_Spectrum_FrequencyRange extends Google_Model
{
  public $channelId;
  public $maxPowerDBm;
  public $startHz;
  public $stopHz;

  public function setChannelId($channelId)
  {
    $this->channelId = $channelId;
  }
  public function getChannelId()
  {
    return $this->channelId;
  }
  public function setMaxPowerDBm($maxPowerDBm)
  {
    $this->maxPowerDBm = $maxPowerDBm;
  }
  public function getMaxPowerDBm()
  {
    return $this->maxPowerDBm;
  }
  public function setStartHz($startHz)
  {
    $this->startHz = $startHz;
  }
  public function getStartHz()
  {
    return $this->startHz;
  }
  public function setStopHz($stopHz)
  {
    $this->stopHz = $stopHz;
  }
  public function getStopHz()
  {
    return $this->stopHz;
  }
}
