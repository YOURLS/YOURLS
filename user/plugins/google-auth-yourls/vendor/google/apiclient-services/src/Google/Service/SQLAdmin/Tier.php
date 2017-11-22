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

class Google_Service_SQLAdmin_Tier extends Google_Collection
{
  protected $collection_key = 'region';
  protected $internal_gapi_mappings = array(
        "diskQuota" => "DiskQuota",
        "rAM" => "RAM",
  );
  public $diskQuota;
  public $rAM;
  public $kind;
  public $region;
  public $tier;

  public function setDiskQuota($diskQuota)
  {
    $this->diskQuota = $diskQuota;
  }
  public function getDiskQuota()
  {
    return $this->diskQuota;
  }
  public function setRAM($rAM)
  {
    $this->rAM = $rAM;
  }
  public function getRAM()
  {
    return $this->rAM;
  }
  public function setKind($kind)
  {
    $this->kind = $kind;
  }
  public function getKind()
  {
    return $this->kind;
  }
  public function setRegion($region)
  {
    $this->region = $region;
  }
  public function getRegion()
  {
    return $this->region;
  }
  public function setTier($tier)
  {
    $this->tier = $tier;
  }
  public function getTier()
  {
    return $this->tier;
  }
}
