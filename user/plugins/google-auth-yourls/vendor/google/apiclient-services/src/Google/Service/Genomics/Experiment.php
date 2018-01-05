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

class Google_Service_Genomics_Experiment extends Google_Model
{
  public $instrumentModel;
  public $libraryId;
  public $platformUnit;
  public $sequencingCenter;

  public function setInstrumentModel($instrumentModel)
  {
    $this->instrumentModel = $instrumentModel;
  }
  public function getInstrumentModel()
  {
    return $this->instrumentModel;
  }
  public function setLibraryId($libraryId)
  {
    $this->libraryId = $libraryId;
  }
  public function getLibraryId()
  {
    return $this->libraryId;
  }
  public function setPlatformUnit($platformUnit)
  {
    $this->platformUnit = $platformUnit;
  }
  public function getPlatformUnit()
  {
    return $this->platformUnit;
  }
  public function setSequencingCenter($sequencingCenter)
  {
    $this->sequencingCenter = $sequencingCenter;
  }
  public function getSequencingCenter()
  {
    return $this->sequencingCenter;
  }
}
