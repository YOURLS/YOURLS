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

class Google_Service_Cloudlatencytest_Stats extends Google_Collection
{
  protected $collection_key = 'stringValues';
  protected $doubleValuesType = 'Google_Service_Cloudlatencytest_DoubleValue';
  protected $doubleValuesDataType = 'array';
  protected $intValuesType = 'Google_Service_Cloudlatencytest_IntValue';
  protected $intValuesDataType = 'array';
  protected $stringValuesType = 'Google_Service_Cloudlatencytest_StringValue';
  protected $stringValuesDataType = 'array';
  public $time;

  public function setDoubleValues($doubleValues)
  {
    $this->doubleValues = $doubleValues;
  }
  public function getDoubleValues()
  {
    return $this->doubleValues;
  }
  public function setIntValues($intValues)
  {
    $this->intValues = $intValues;
  }
  public function getIntValues()
  {
    return $this->intValues;
  }
  public function setStringValues($stringValues)
  {
    $this->stringValues = $stringValues;
  }
  public function getStringValues()
  {
    return $this->stringValues;
  }
  public function setTime($time)
  {
    $this->time = $time;
  }
  public function getTime()
  {
    return $this->time;
  }
}
