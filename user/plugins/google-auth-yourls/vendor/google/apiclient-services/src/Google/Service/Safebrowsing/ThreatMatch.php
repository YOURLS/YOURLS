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

class Google_Service_Safebrowsing_ThreatMatch extends Google_Model
{
  public $cacheDuration;
  public $platformType;
  protected $threatDataType = '';
  protected $threatEntryMetadataType = 'Google_Service_Safebrowsing_ThreatEntryMetadata';
  protected $threatEntryMetadataDataType = '';
  public $threatEntryType;
  public $threatType;

  public function setCacheDuration($cacheDuration)
  {
    $this->cacheDuration = $cacheDuration;
  }
  public function getCacheDuration()
  {
    return $this->cacheDuration;
  }
  public function setPlatformType($platformType)
  {
    $this->platformType = $platformType;
  }
  public function getPlatformType()
  {
    return $this->platformType;
  }
  /**
   * @param Google_Service_Safebrowsing_ThreatEntry
   */
  public function setThreat(Google_Service_Safebrowsing_ThreatEntry $threat)
  {
    $this->threat = $threat;
  }
  /**
   * @return Google_Service_Safebrowsing_ThreatEntry
   */
  public function getThreat()
  {
    return $this->threat;
  }
  /**
   * @param Google_Service_Safebrowsing_ThreatEntryMetadata
   */
  public function setThreatEntryMetadata(Google_Service_Safebrowsing_ThreatEntryMetadata $threatEntryMetadata)
  {
    $this->threatEntryMetadata = $threatEntryMetadata;
  }
  /**
   * @return Google_Service_Safebrowsing_ThreatEntryMetadata
   */
  public function getThreatEntryMetadata()
  {
    return $this->threatEntryMetadata;
  }
  public function setThreatEntryType($threatEntryType)
  {
    $this->threatEntryType = $threatEntryType;
  }
  public function getThreatEntryType()
  {
    return $this->threatEntryType;
  }
  public function setThreatType($threatType)
  {
    $this->threatType = $threatType;
  }
  public function getThreatType()
  {
    return $this->threatType;
  }
}
