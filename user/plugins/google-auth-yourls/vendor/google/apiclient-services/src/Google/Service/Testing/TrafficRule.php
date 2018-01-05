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

class Google_Service_Testing_TrafficRule extends Google_Model
{
  public $bandwidth;
  public $burst;
  public $delay;
  public $packetDuplicationRatio;
  public $packetLossRatio;

  public function setBandwidth($bandwidth)
  {
    $this->bandwidth = $bandwidth;
  }
  public function getBandwidth()
  {
    return $this->bandwidth;
  }
  public function setBurst($burst)
  {
    $this->burst = $burst;
  }
  public function getBurst()
  {
    return $this->burst;
  }
  public function setDelay($delay)
  {
    $this->delay = $delay;
  }
  public function getDelay()
  {
    return $this->delay;
  }
  public function setPacketDuplicationRatio($packetDuplicationRatio)
  {
    $this->packetDuplicationRatio = $packetDuplicationRatio;
  }
  public function getPacketDuplicationRatio()
  {
    return $this->packetDuplicationRatio;
  }
  public function setPacketLossRatio($packetLossRatio)
  {
    $this->packetLossRatio = $packetLossRatio;
  }
  public function getPacketLossRatio()
  {
    return $this->packetLossRatio;
  }
}
