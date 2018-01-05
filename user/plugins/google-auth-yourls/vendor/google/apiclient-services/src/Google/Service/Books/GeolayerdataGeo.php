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

class Google_Service_Books_GeolayerdataGeo extends Google_Collection
{
  protected $collection_key = 'boundary';
  protected $boundaryType = 'Google_Service_Books_GeolayerdataGeoBoundary';
  protected $boundaryDataType = 'array';
  public $cachePolicy;
  public $countryCode;
  public $latitude;
  public $longitude;
  public $mapType;
  protected $viewportType = 'Google_Service_Books_GeolayerdataGeoViewport';
  protected $viewportDataType = '';
  public $zoom;

  /**
   * @param Google_Service_Books_GeolayerdataGeoBoundary
   */
  public function setBoundary($boundary)
  {
    $this->boundary = $boundary;
  }
  /**
   * @return Google_Service_Books_GeolayerdataGeoBoundary
   */
  public function getBoundary()
  {
    return $this->boundary;
  }
  public function setCachePolicy($cachePolicy)
  {
    $this->cachePolicy = $cachePolicy;
  }
  public function getCachePolicy()
  {
    return $this->cachePolicy;
  }
  public function setCountryCode($countryCode)
  {
    $this->countryCode = $countryCode;
  }
  public function getCountryCode()
  {
    return $this->countryCode;
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
  public function setMapType($mapType)
  {
    $this->mapType = $mapType;
  }
  public function getMapType()
  {
    return $this->mapType;
  }
  /**
   * @param Google_Service_Books_GeolayerdataGeoViewport
   */
  public function setViewport(Google_Service_Books_GeolayerdataGeoViewport $viewport)
  {
    $this->viewport = $viewport;
  }
  /**
   * @return Google_Service_Books_GeolayerdataGeoViewport
   */
  public function getViewport()
  {
    return $this->viewport;
  }
  public function setZoom($zoom)
  {
    $this->zoom = $zoom;
  }
  public function getZoom()
  {
    return $this->zoom;
  }
}
