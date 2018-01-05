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

class Google_Service_CivicInfo_Office extends Google_Collection
{
  protected $collection_key = 'sources';
  public $divisionId;
  public $levels;
  public $name;
  public $officialIndices;
  public $roles;
  protected $sourcesType = 'Google_Service_CivicInfo_Source';
  protected $sourcesDataType = 'array';

  public function setDivisionId($divisionId)
  {
    $this->divisionId = $divisionId;
  }
  public function getDivisionId()
  {
    return $this->divisionId;
  }
  public function setLevels($levels)
  {
    $this->levels = $levels;
  }
  public function getLevels()
  {
    return $this->levels;
  }
  public function setName($name)
  {
    $this->name = $name;
  }
  public function getName()
  {
    return $this->name;
  }
  public function setOfficialIndices($officialIndices)
  {
    $this->officialIndices = $officialIndices;
  }
  public function getOfficialIndices()
  {
    return $this->officialIndices;
  }
  public function setRoles($roles)
  {
    $this->roles = $roles;
  }
  public function getRoles()
  {
    return $this->roles;
  }
  /**
   * @param Google_Service_CivicInfo_Source
   */
  public function setSources($sources)
  {
    $this->sources = $sources;
  }
  /**
   * @return Google_Service_CivicInfo_Source
   */
  public function getSources()
  {
    return $this->sources;
  }
}
