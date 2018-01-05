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

class Google_Service_Cih_GammaData extends Google_Model
{
  public $campaignId;
  public $dispatchId;
  public $experimentId;
  public $gammaProductId;
  public $nodeId;
  protected $uaidType = 'Google_Service_Cih_Uaid';
  protected $uaidDataType = '';

  public function setCampaignId($campaignId)
  {
    $this->campaignId = $campaignId;
  }
  public function getCampaignId()
  {
    return $this->campaignId;
  }
  public function setDispatchId($dispatchId)
  {
    $this->dispatchId = $dispatchId;
  }
  public function getDispatchId()
  {
    return $this->dispatchId;
  }
  public function setExperimentId($experimentId)
  {
    $this->experimentId = $experimentId;
  }
  public function getExperimentId()
  {
    return $this->experimentId;
  }
  public function setGammaProductId($gammaProductId)
  {
    $this->gammaProductId = $gammaProductId;
  }
  public function getGammaProductId()
  {
    return $this->gammaProductId;
  }
  public function setNodeId($nodeId)
  {
    $this->nodeId = $nodeId;
  }
  public function getNodeId()
  {
    return $this->nodeId;
  }
  public function setUaid(Google_Service_Cih_Uaid $uaid)
  {
    $this->uaid = $uaid;
  }
  public function getUaid()
  {
    return $this->uaid;
  }
}
