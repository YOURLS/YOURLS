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

class Google_Service_SQLAdmin_CloneContext extends Google_Model
{
  protected $binLogCoordinatesType = 'Google_Service_SQLAdmin_BinLogCoordinates';
  protected $binLogCoordinatesDataType = '';
  public $destinationInstanceName;
  public $kind;

  /**
   * @param Google_Service_SQLAdmin_BinLogCoordinates
   */
  public function setBinLogCoordinates(Google_Service_SQLAdmin_BinLogCoordinates $binLogCoordinates)
  {
    $this->binLogCoordinates = $binLogCoordinates;
  }
  /**
   * @return Google_Service_SQLAdmin_BinLogCoordinates
   */
  public function getBinLogCoordinates()
  {
    return $this->binLogCoordinates;
  }
  public function setDestinationInstanceName($destinationInstanceName)
  {
    $this->destinationInstanceName = $destinationInstanceName;
  }
  public function getDestinationInstanceName()
  {
    return $this->destinationInstanceName;
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
