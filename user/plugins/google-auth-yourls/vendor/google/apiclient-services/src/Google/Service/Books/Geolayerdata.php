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

class Google_Service_Books_Geolayerdata extends Google_Model
{
  protected $commonType = 'Google_Service_Books_GeolayerdataCommon';
  protected $commonDataType = '';
  protected $geoType = 'Google_Service_Books_GeolayerdataGeo';
  protected $geoDataType = '';
  public $kind;

  /**
   * @param Google_Service_Books_GeolayerdataCommon
   */
  public function setCommon(Google_Service_Books_GeolayerdataCommon $common)
  {
    $this->common = $common;
  }
  /**
   * @return Google_Service_Books_GeolayerdataCommon
   */
  public function getCommon()
  {
    return $this->common;
  }
  /**
   * @param Google_Service_Books_GeolayerdataGeo
   */
  public function setGeo(Google_Service_Books_GeolayerdataGeo $geo)
  {
    $this->geo = $geo;
  }
  /**
   * @return Google_Service_Books_GeolayerdataGeo
   */
  public function getGeo()
  {
    return $this->geo;
  }
  public function setKind($kind)
  {
    $this->kind = $kind;
  }
  public function getKind()
  {
    return $this->kind;
  }
}
