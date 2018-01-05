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

class Google_Service_Coordinate_LocationRecord extends Google_Model
{
  public $collectionTime;
  public $confidenceRadius;
  public $kind;
  public $latitude;
  public $longitude;

  public function setCollectionTime($collectionTime)
  {
    $this->collectionTime = $collectionTime;
  }
  public function getCollectionTime()
  {
    return $this->collectionTime;
  }
  public function setConfidenceRadius($confidenceRadius)
  {
    $this->confidenceRadius = $confidenceRadius;
  }
  public function getConfidenceRadius()
  {
    return $this->confidenceRadius;
  }
  public function setKind($kind)
  {
    $this->kind = $kind;
  }
  public function getKind()
  {
    return $this->kind;
  }
  public function setLatitude($latitude)
  {
    $this->latitude = $latitude;
  }
  public function getLatitude()
  {
    return $this->latitude;
  }
  public function setLongitude($longitude)
  {
    $this->longitude = $longitude;
  }
  public function getLongitude()
  {
    return $this->longitude;
  }
}
