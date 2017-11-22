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

class Google_Service_Safebrowsing_Constraints extends Google_Collection
{
  protected $collection_key = 'supportedCompressions';
  public $maxDatabaseEntries;
  public $maxUpdateEntries;
  public $region;
  public $supportedCompressions;

  public function setMaxDatabaseEntries($maxDatabaseEntries)
  {
    $this->maxDatabaseEntries = $maxDatabaseEntries;
  }
  public function getMaxDatabaseEntries()
  {
    return $this->maxDatabaseEntries;
  }
  public function setMaxUpdateEntries($maxUpdateEntries)
  {
    $this->maxUpdateEntries = $maxUpdateEntries;
  }
  public function getMaxUpdateEntries()
  {
    return $this->maxUpdateEntries;
  }
  public function setRegion($region)
  {
    $this->region = $region;
  }
  public function getRegion()
  {
    return $this->region;
  }
  public function setSupportedCompressions($supportedCompressions)
  {
    $this->supportedCompressions = $supportedCompressions;
  }
  public function getSupportedCompressions()
  {
    return $this->supportedCompressions;
  }
}
