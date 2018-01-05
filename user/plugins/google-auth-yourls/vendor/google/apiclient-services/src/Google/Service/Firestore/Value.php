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

class Google_Service_Firestore_Value extends Google_Model
{
  protected $arrayValueType = 'Google_Service_Firestore_ArrayValue';
  protected $arrayValueDataType = '';
  public $booleanValue;
  public $bytesValue;
  public $doubleValue;
  protected $geoPointValueType = 'Google_Service_Firestore_LatLng';
  protected $geoPointValueDataType = '';
  public $integerValue;
  protected $mapValueType = 'Google_Service_Firestore_MapValue';
  protected $mapValueDataType = '';
  public $nullValue;
  public $referenceValue;
  public $stringValue;
  public $timestampValue;

  /**
   * @param Google_Service_Firestore_ArrayValue
   */
  public function setArrayValue(Google_Service_Firestore_ArrayValue $arrayValue)
  {
    $this->arrayValue = $arrayValue;
  }
  /**
   * @return Google_Service_Firestore_ArrayValue
   */
  public function getArrayValue()
  {
    return $this->arrayValue;
  }
  public function setBooleanValue($booleanValue)
  {
    $this->booleanValue = $booleanValue;
  }
  public function getBooleanValue()
  {
    return $this->booleanValue;
  }
  public function setBytesValue($bytesValue)
  {
    $this->bytesValue = $bytesValue;
  }
  public function getBytesValue()
  {
    return $this->bytesValue;
  }
  public function setDoubleValue($doubleValue)
  {
    $this->doubleValue = $doubleValue;
  }
  public function getDoubleValue()
  {
    return $this->doubleValue;
  }
  /**
   * @param Google_Service_Firestore_LatLng
   */
  public function setGeoPointValue(Google_Service_Firestore_LatLng $geoPointValue)
  {
    $this->geoPointValue = $geoPointValue;
  }
  /**
   * @return Google_Service_Firestore_LatLng
   */
  public function getGeoPointValue()
  {
    return $this->geoPointValue;
  }
  public function setIntegerValue($integerValue)
  {
    $this->integerValue = $integerValue;
  }
  public function getIntegerValue()
  {
    return $this->integerValue;
  }
  /**
   * @param Google_Service_Firestore_MapValue
   */
  public function setMapValue(Google_Service_Firestore_MapValue $mapValue)
  {
    $this->mapValue = $mapValue;
  }
  /**
   * @return Google_Service_Firestore_MapValue
   */
  public function getMapValue()
  {
    return $this->mapValue;
  }
  public function setNullValue($nullValue)
  {
    $this->nullValue = $nullValue;
  }
  public function getNullValue()
  {
    return $this->nullValue;
  }
  public function setReferenceValue($referenceValue)
  {
    $this->referenceValue = $referenceValue;
  }
  public function getReferenceValue()
  {
    return $this->referenceValue;
  }
  public function setStringValue($stringValue)
  {
    $this->stringValue = $stringValue;
  }
  public function getStringValue()
  {
    return $this->stringValue;
  }
  public function setTimestampValue($timestampValue)
  {
    $this->timestampValue = $timestampValue;
  }
  public function getTimestampValue()
  {
    return $this->timestampValue;
  }
}
