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

class Google_Service_Fusiontables_StyleSetting extends Google_Model
{
  public $kind;
  protected $markerOptionsType = 'Google_Service_Fusiontables_PointStyle';
  protected $markerOptionsDataType = '';
  public $name;
  protected $polygonOptionsType = 'Google_Service_Fusiontables_PolygonStyle';
  protected $polygonOptionsDataType = '';
  protected $polylineOptionsType = 'Google_Service_Fusiontables_LineStyle';
  protected $polylineOptionsDataType = '';
  public $styleId;
  public $tableId;

  public function setKind($kind)
  {
    $this->kind = $kind;
  }
  public function getKind()
  {
    return $this->kind;
  }
  /**
   * @param Google_Service_Fusiontables_PointStyle
   */
  public function setMarkerOptions(Google_Service_Fusiontables_PointStyle $markerOptions)
  {
    $this->markerOptions = $markerOptions;
  }
  /**
   * @return Google_Service_Fusiontables_PointStyle
   */
  public function getMarkerOptions()
  {
    return $this->markerOptions;
  }
  public function setName($name)
  {
    $this->name = $name;
  }
  public function getName()
  {
    return $this->name;
  }
  /**
   * @param Google_Service_Fusiontables_PolygonStyle
   */
  public function setPolygonOptions(Google_Service_Fusiontables_PolygonStyle $polygonOptions)
  {
    $this->polygonOptions = $polygonOptions;
  }
  /**
   * @return Google_Service_Fusiontables_PolygonStyle
   */
  public function getPolygonOptions()
  {
    return $this->polygonOptions;
  }
  /**
   * @param Google_Service_Fusiontables_LineStyle
   */
  public function setPolylineOptions(Google_Service_Fusiontables_LineStyle $polylineOptions)
  {
    $this->polylineOptions = $polylineOptions;
  }
  /**
   * @return Google_Service_Fusiontables_LineStyle
   */
  public function getPolylineOptions()
  {
    return $this->polylineOptions;
  }
  public function setStyleId($styleId)
  {
    $this->styleId = $styleId;
  }
  public function getStyleId()
  {
    return $this->styleId;
  }
  public function setTableId($tableId)
  {
    $this->tableId = $tableId;
  }
  public function getTableId()
  {
    return $this->tableId;
  }
}
