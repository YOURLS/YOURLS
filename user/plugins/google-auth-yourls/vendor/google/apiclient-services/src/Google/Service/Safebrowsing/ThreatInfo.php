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

class Google_Service_Safebrowsing_ThreatInfo extends Google_Collection
{
  protected $collection_key = 'threatTypes';
  public $platformTypes;
  protected $threatEntriesType = 'Google_Service_Safebrowsing_ThreatEntry';
  protected $threatEntriesDataType = 'array';
  public $threatEntryTypes;
  public $threatTypes;

  public function setPlatformTypes($platformTypes)
  {
    $this->platformTypes = $platformTypes;
  }
  public function getPlatformTypes()
  {
    return $this->platformTypes;
  }
  /**
   * @param Google_Service_Safebrowsing_ThreatEntry
   */
  public function setThreatEntries($threatEntries)
  {
    $this->threatEntries = $threatEntries;
  }
  /**
   * @return Google_Service_Safebrowsing_ThreatEntry
   */
  public function getThreatEntries()
  {
    return $this->threatEntries;
  }
  public function setThreatEntryTypes($threatEntryTypes)
  {
    $this->threatEntryTypes = $threatEntryTypes;
  }
  public function getThreatEntryTypes()
  {
    return $this->threatEntryTypes;
  }
  public function setThreatTypes($threatTypes)
  {
    $this->threatTypes = $threatTypes;
  }
  public function getThreatTypes()
  {
    return $this->threatTypes;
  }
}
