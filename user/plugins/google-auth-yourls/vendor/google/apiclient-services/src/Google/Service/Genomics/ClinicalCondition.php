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

class Google_Service_Genomics_ClinicalCondition extends Google_Collection
{
  protected $collection_key = 'names';
  public $conceptId;
  protected $externalIdsType = 'Google_Service_Genomics_ExternalId';
  protected $externalIdsDataType = 'array';
  public $names;
  public $omimId;

  public function setConceptId($conceptId)
  {
    $this->conceptId = $conceptId;
  }
  public function getConceptId()
  {
    return $this->conceptId;
  }
  /**
   * @param Google_Service_Genomics_ExternalId
   */
  public function setExternalIds($externalIds)
  {
    $this->externalIds = $externalIds;
  }
  /**
   * @return Google_Service_Genomics_ExternalId
   */
  public function getExternalIds()
  {
    return $this->externalIds;
  }
  public function setNames($names)
  {
    $this->names = $names;
  }
  public function getNames()
  {
    return $this->names;
  }
  public function setOmimId($omimId)
  {
    $this->omimId = $omimId;
  }
  public function getOmimId()
  {
    return $this->omimId;
  }
}
