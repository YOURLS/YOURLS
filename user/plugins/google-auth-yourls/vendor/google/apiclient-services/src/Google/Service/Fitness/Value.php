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

class Google_Service_Fitness_Value extends Google_Collection
{
  protected $collection_key = 'mapVal';
  public $fpVal;
  public $intVal;
  protected $mapValType = 'Google_Service_Fitness_ValueMapValEntry';
  protected $mapValDataType = 'array';
  public $stringVal;

  public function setFpVal($fpVal)
  {
    $this->fpVal = $fpVal;
  }
  public function getFpVal()
  {
    return $this->fpVal;
  }
  public function setIntVal($intVal)
  {
    $this->intVal = $intVal;
  }
  public function getIntVal()
  {
    return $this->intVal;
  }
  /**
   * @param Google_Service_Fitness_ValueMapValEntry
   */
  public function setMapVal($mapVal)
  {
    $this->mapVal = $mapVal;
  }
  /**
   * @return Google_Service_Fitness_ValueMapValEntry
   */
  public function getMapVal()
  {
    return $this->mapVal;
  }
  public function setStringVal($stringVal)
  {
    $this->stringVal = $stringVal;
  }
  public function getStringVal()
  {
    return $this->stringVal;
  }
}
