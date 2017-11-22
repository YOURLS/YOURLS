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

class Google_Service_CivicInfo_VoterInfoResponse extends Google_Collection
{
  protected $collection_key = 'state';
  protected $contestsType = 'Google_Service_CivicInfo_Contest';
  protected $contestsDataType = 'array';
  protected $dropOffLocationsType = 'Google_Service_CivicInfo_PollingLocation';
  protected $dropOffLocationsDataType = 'array';
  protected $earlyVoteSitesType = 'Google_Service_CivicInfo_PollingLocation';
  protected $earlyVoteSitesDataType = 'array';
  protected $electionType = 'Google_Service_CivicInfo_Election';
  protected $electionDataType = '';
  public $kind;
  public $mailOnly;
  protected $normalizedInputType = 'Google_Service_CivicInfo_SimpleAddressType';
  protected $normalizedInputDataType = '';
  protected $otherElectionsType = 'Google_Service_CivicInfo_Election';
  protected $otherElectionsDataType = 'array';
  protected $pollingLocationsType = 'Google_Service_CivicInfo_PollingLocation';
  protected $pollingLocationsDataType = 'array';
  public $precinctId;
  protected $stateType = 'Google_Service_CivicInfo_AdministrationRegion';
  protected $stateDataType = 'array';

  /**
   * @param Google_Service_CivicInfo_Contest
   */
  public function setContests($contests)
  {
    $this->contests = $contests;
  }
  /**
   * @return Google_Service_CivicInfo_Contest
   */
  public function getContests()
  {
    return $this->contests;
  }
  /**
   * @param Google_Service_CivicInfo_PollingLocation
   */
  public function setDropOffLocations($dropOffLocations)
  {
    $this->dropOffLocations = $dropOffLocations;
  }
  /**
   * @return Google_Service_CivicInfo_PollingLocation
   */
  public function getDropOffLocations()
  {
    return $this->dropOffLocations;
  }
  /**
   * @param Google_Service_CivicInfo_PollingLocation
   */
  public function setEarlyVoteSites($earlyVoteSites)
  {
    $this->earlyVoteSites = $earlyVoteSites;
  }
  /**
   * @return Google_Service_CivicInfo_PollingLocation
   */
  public function getEarlyVoteSites()
  {
    return $this->earlyVoteSites;
  }
  /**
   * @param Google_Service_CivicInfo_Election
   */
  public function setElection(Google_Service_CivicInfo_Election $election)
  {
    $this->election = $election;
  }
  /**
   * @return Google_Service_CivicInfo_Election
   */
  public function getElection()
  {
    return $this->election;
  }
  public function setKind($kind)
  {
    $this->kind = $kind;
  }
  public function getKind()
  {
    return $this->kind;
  }
  public function setMailOnly($mailOnly)
  {
    $this->mailOnly = $mailOnly;
  }
  public function getMailOnly()
  {
    return $this->mailOnly;
  }
  /**
   * @param Google_Service_CivicInfo_SimpleAddressType
   */
  public function setNormalizedInput(Google_Service_CivicInfo_SimpleAddressType $normalizedInput)
  {
    $this->normalizedInput = $normalizedInput;
  }
  /**
   * @return Google_Service_CivicInfo_SimpleAddressType
   */
  public function getNormalizedInput()
  {
    return $this->normalizedInput;
  }
  /**
   * @param Google_Service_CivicInfo_Election
   */
  public function setOtherElections($otherElections)
  {
    $this->otherElections = $otherElections;
  }
  /**
   * @return Google_Service_CivicInfo_Election
   */
  public function getOtherElections()
  {
    return $this->otherElections;
  }
  /**
   * @param Google_Service_CivicInfo_PollingLocation
   */
  public function setPollingLocations($pollingLocations)
  {
    $this->pollingLocations = $pollingLocations;
  }
  /**
   * @return Google_Service_CivicInfo_PollingLocation
   */
  public function getPollingLocations()
  {
    return $this->pollingLocations;
  }
  public function setPrecinctId($precinctId)
  {
    $this->precinctId = $precinctId;
  }
  public function getPrecinctId()
  {
    return $this->precinctId;
  }
  /**
   * @param Google_Service_CivicInfo_AdministrationRegion
   */
  public function setState($state)
  {
    $this->state = $state;
  }
  /**
   * @return Google_Service_CivicInfo_AdministrationRegion
   */
  public function getState()
  {
    return $this->state;
  }
}
