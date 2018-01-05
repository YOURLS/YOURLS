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

class Google_Service_Safebrowsing_RiceDeltaEncoding extends Google_Model
{
  public $encodedData;
  public $firstValue;
  public $numEntries;
  public $riceParameter;

  public function setEncodedData($encodedData)
  {
    $this->encodedData = $encodedData;
  }
  public function getEncodedData()
  {
    return $this->encodedData;
  }
  public function setFirstValue($firstValue)
  {
    $this->firstValue = $firstValue;
  }
  public function getFirstValue()
  {
    return $this->firstValue;
  }
  public function setNumEntries($numEntries)
  {
    $this->numEntries = $numEntries;
  }
  public function getNumEntries()
  {
    return $this->numEntries;
  }
  public function setRiceParameter($riceParameter)
  {
    $this->riceParameter = $riceParameter;
  }
  public function getRiceParameter()
  {
    return $this->riceParameter;
  }
}
