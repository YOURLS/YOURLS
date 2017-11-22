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

class Google_Service_Books_GeolayerdataGeoViewport extends Google_Model
{
  protected $hiType = 'Google_Service_Books_GeolayerdataGeoViewportHi';
  protected $hiDataType = '';
  protected $loType = 'Google_Service_Books_GeolayerdataGeoViewportLo';
  protected $loDataType = '';

  /**
   * @param Google_Service_Books_GeolayerdataGeoViewportHi
   */
  public function setHi(Google_Service_Books_GeolayerdataGeoViewportHi $hi)
  {
    $this->hi = $hi;
  }
  /**
   * @return Google_Service_Books_GeolayerdataGeoViewportHi
   */
  public function getHi()
  {
    return $this->hi;
  }
  /**
   * @param Google_Service_Books_GeolayerdataGeoViewportLo
   */
  public function setLo(Google_Service_Books_GeolayerdataGeoViewportLo $lo)
  {
    $this->lo = $lo;
  }
  /**
   * @return Google_Service_Books_GeolayerdataGeoViewportLo
   */
  public function getLo()
  {
    return $this->lo;
  }
}
