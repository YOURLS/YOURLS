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

class Google_Service_Genomics_LinearAlignment extends Google_Collection
{
  protected $collection_key = 'cigar';
  protected $cigarType = 'Google_Service_Genomics_CigarUnit';
  protected $cigarDataType = 'array';
  public $mappingQuality;
  protected $positionType = 'Google_Service_Genomics_Position';
  protected $positionDataType = '';

  /**
   * @param Google_Service_Genomics_CigarUnit
   */
  public function setCigar($cigar)
  {
    $this->cigar = $cigar;
  }
  /**
   * @return Google_Service_Genomics_CigarUnit
   */
  public function getCigar()
  {
    return $this->cigar;
  }
  public function setMappingQuality($mappingQuality)
  {
    $this->mappingQuality = $mappingQuality;
  }
  public function getMappingQuality()
  {
    return $this->mappingQuality;
  }
  /**
   * @param Google_Service_Genomics_Position
   */
  public function setPosition(Google_Service_Genomics_Position $position)
  {
    $this->position = $position;
  }
  /**
   * @return Google_Service_Genomics_Position
   */
  public function getPosition()
  {
    return $this->position;
  }
}
