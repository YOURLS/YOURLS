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

class Google_Service_Spanner_ReadOnly extends Google_Model
{
  public $exactStaleness;
  public $maxStaleness;
  public $minReadTimestamp;
  public $readTimestamp;
  public $returnReadTimestamp;
  public $strong;

  public function setExactStaleness($exactStaleness)
  {
    $this->exactStaleness = $exactStaleness;
  }
  public function getExactStaleness()
  {
    return $this->exactStaleness;
  }
  public function setMaxStaleness($maxStaleness)
  {
    $this->maxStaleness = $maxStaleness;
  }
  public function getMaxStaleness()
  {
    return $this->maxStaleness;
  }
  public function setMinReadTimestamp($minReadTimestamp)
  {
    $this->minReadTimestamp = $minReadTimestamp;
  }
  public function getMinReadTimestamp()
  {
    return $this->minReadTimestamp;
  }
  public function setReadTimestamp($readTimestamp)
  {
    $this->readTimestamp = $readTimestamp;
  }
  public function getReadTimestamp()
  {
    return $this->readTimestamp;
  }
  public function setReturnReadTimestamp($returnReadTimestamp)
  {
    $this->returnReadTimestamp = $returnReadTimestamp;
  }
  public function getReturnReadTimestamp()
  {
    return $this->returnReadTimestamp;
  }
  public function setStrong($strong)
  {
    $this->strong = $strong;
  }
  public function getStrong()
  {
    return $this->strong;
  }
}
