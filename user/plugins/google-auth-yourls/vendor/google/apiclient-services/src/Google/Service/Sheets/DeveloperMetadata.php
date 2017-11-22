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

class Google_Service_Sheets_DeveloperMetadata extends Google_Model
{
  protected $locationType = 'Google_Service_Sheets_DeveloperMetadataLocation';
  protected $locationDataType = '';
  public $metadataId;
  public $metadataKey;
  public $metadataValue;
  public $visibility;

  /**
   * @param Google_Service_Sheets_DeveloperMetadataLocation
   */
  public function setLocation(Google_Service_Sheets_DeveloperMetadataLocation $location)
  {
    $this->location = $location;
  }
  /**
   * @return Google_Service_Sheets_DeveloperMetadataLocation
   */
  public function getLocation()
  {
    return $this->location;
  }
  public function setMetadataId($metadataId)
  {
    $this->metadataId = $metadataId;
  }
  public function getMetadataId()
  {
    return $this->metadataId;
  }
  public function setMetadataKey($metadataKey)
  {
    $this->metadataKey = $metadataKey;
  }
  public function getMetadataKey()
  {
    return $this->metadataKey;
  }
  public function setMetadataValue($metadataValue)
  {
    $this->metadataValue = $metadataValue;
  }
  public function getMetadataValue()
  {
    return $this->metadataValue;
  }
  public function setVisibility($visibility)
  {
    $this->visibility = $visibility;
  }
  public function getVisibility()
  {
    return $this->visibility;
  }
}
