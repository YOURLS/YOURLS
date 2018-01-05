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

class Google_Service_CivicInfo_AdministrationRegion extends Google_Collection
{
  protected $collection_key = 'sources';
  protected $internal_gapi_mappings = array(
        "localJurisdiction" => "local_jurisdiction",
  );
  protected $electionAdministrationBodyType = 'Google_Service_CivicInfo_AdministrativeBody';
  protected $electionAdministrationBodyDataType = '';
  public $id;
  protected $localJurisdictionType = 'Google_Service_CivicInfo_AdministrationRegion';
  protected $localJurisdictionDataType = '';
  public $name;
  protected $sourcesType = 'Google_Service_CivicInfo_Source';
  protected $sourcesDataType = 'array';

  /**
   * @param Google_Service_CivicInfo_AdministrativeBody
   */
  public function setElectionAdministrationBody(Google_Service_CivicInfo_AdministrativeBody $electionAdministrationBody)
  {
    $this->electionAdministrationBody = $electionAdministrationBody;
  }
  /**
   * @return Google_Service_CivicInfo_AdministrativeBody
   */
  public function getElectionAdministrationBody()
  {
    return $this->electionAdministrationBody;
  }
  public function setId($id)
  {
    $this->id = $id;
  }
  public function getId()
  {
    return $this->id;
  }
  /**
   * @param Google_Service_CivicInfo_AdministrationRegion
   */
  public function setLocalJurisdiction(Google_Service_CivicInfo_AdministrationRegion $localJurisdiction)
  {
    $this->localJurisdiction = $localJurisdiction;
  }
  /**
   * @return Google_Service_CivicInfo_AdministrationRegion
   */
  public function getLocalJurisdiction()
  {
    return $this->localJurisdiction;
  }
  public function setName($name)
  {
    $this->name = $name;
  }
  public function getName()
  {
    return $this->name;
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
