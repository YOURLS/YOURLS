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

class Google_Service_Sheets_CutPasteRequest extends Google_Model
{
  protected $destinationType = 'Google_Service_Sheets_GridCoordinate';
  protected $destinationDataType = '';
  public $pasteType;
  protected $sourceType = 'Google_Service_Sheets_GridRange';
  protected $sourceDataType = '';

  /**
   * @param Google_Service_Sheets_GridCoordinate
   */
  public function setDestination(Google_Service_Sheets_GridCoordinate $destination)
  {
    $this->destination = $destination;
  }
  /**
   * @return Google_Service_Sheets_GridCoordinate
   */
  public function getDestination()
  {
    return $this->destination;
  }
  public function setPasteType($pasteType)
  {
    $this->pasteType = $pasteType;
  }
  public function getPasteType()
  {
    return $this->pasteType;
  }
  /**
   * @param Google_Service_Sheets_GridRange
   */
  public function setSource(Google_Service_Sheets_GridRange $source)
  {
    $this->source = $source;
  }
  /**
   * @return Google_Service_Sheets_GridRange
   */
  public function getSource()
  {
    return $this->source;
  }
}
