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

class Google_Service_CivicInfo_Contest extends Google_Collection
{
  protected $collection_key = 'sources';
  public $ballotPlacement;
  protected $candidatesType = 'Google_Service_CivicInfo_Candidate';
  protected $candidatesDataType = 'array';
  protected $districtType = 'Google_Service_CivicInfo_ElectoralDistrict';
  protected $districtDataType = '';
  public $electorateSpecifications;
  public $id;
  public $level;
  public $numberElected;
  public $numberVotingFor;
  public $office;
  public $primaryParty;
  public $referendumBallotResponses;
  public $referendumBrief;
  public $referendumConStatement;
  public $referendumEffectOfAbstain;
  public $referendumPassageThreshold;
  public $referendumProStatement;
  public $referendumSubtitle;
  public $referendumText;
  public $referendumTitle;
  public $referendumUrl;
  public $roles;
  protected $sourcesType = 'Google_Service_CivicInfo_Source';
  protected $sourcesDataType = 'array';
  public $special;
  public $type;

  public function setBallotPlacement($ballotPlacement)
  {
    $this->ballotPlacement = $ballotPlacement;
  }
  public function getBallotPlacement()
  {
    return $this->ballotPlacement;
  }
  /**
   * @param Google_Service_CivicInfo_Candidate
   */
  public function setCandidates($candidates)
  {
    $this->candidates = $candidates;
  }
  /**
   * @return Google_Service_CivicInfo_Candidate
   */
  public function getCandidates()
  {
    return $this->candidates;
  }
  /**
   * @param Google_Service_CivicInfo_ElectoralDistrict
   */
  public function setDistrict(Google_Service_CivicInfo_ElectoralDistrict $district)
  {
    $this->district = $district;
  }
  /**
   * @return Google_Service_CivicInfo_ElectoralDistrict
   */
  public function getDistrict()
  {
    return $this->district;
  }
  public function setElectorateSpecifications($electorateSpecifications)
  {
    $this->electorateSpecifications = $electorateSpecifications;
  }
  public function getElectorateSpecifications()
  {
    return $this->electorateSpecifications;
  }
  public function setId($id)
  {
    $this->id = $id;
  }
  public function getId()
  {
    return $this->id;
  }
  public function setLevel($level)
  {
    $this->level = $level;
  }
  public function getLevel()
  {
    return $this->level;
  }
  public function setNumberElected($numberElected)
  {
    $this->numberElected = $numberElected;
  }
  public function getNumberElected()
  {
    return $this->numberElected;
  }
  public function setNumberVotingFor($numberVotingFor)
  {
    $this->numberVotingFor = $numberVotingFor;
  }
  public function getNumberVotingFor()
  {
    return $this->numberVotingFor;
  }
  public function setOffice($office)
  {
    $this->office = $office;
  }
  public function getOffice()
  {
    return $this->office;
  }
  public function setPrimaryParty($primaryParty)
  {
    $this->primaryParty = $primaryParty;
  }
  public function getPrimaryParty()
  {
    return $this->primaryParty;
  }
  public function setReferendumBallotResponses($referendumBallotResponses)
  {
    $this->referendumBallotResponses = $referendumBallotResponses;
  }
  public function getReferendumBallotResponses()
  {
    return $this->referendumBallotResponses;
  }
  public function setReferendumBrief($referendumBrief)
  {
    $this->referendumBrief = $referendumBrief;
  }
  public function getReferendumBrief()
  {
    return $this->referendumBrief;
  }
  public function setReferendumConStatement($referendumConStatement)
  {
    $this->referendumConStatement = $referendumConStatement;
  }
  public function getReferendumConStatement()
  {
    return $this->referendumConStatement;
  }
  public function setReferendumEffectOfAbstain($referendumEffectOfAbstain)
  {
    $this->referendumEffectOfAbstain = $referendumEffectOfAbstain;
  }
  public function getReferendumEffectOfAbstain()
  {
    return $this->referendumEffectOfAbstain;
  }
  public function setReferendumPassageThreshold($referendumPassageThreshold)
  {
    $this->referendumPassageThreshold = $referendumPassageThreshold;
  }
  public function getReferendumPassageThreshold()
  {
    return $this->referendumPassageThreshold;
  }
  public function setReferendumProStatement($referendumProStatement)
  {
    $this->referendumProStatement = $referendumProStatement;
  }
  public function getReferendumProStatement()
  {
    return $this->referendumProStatement;
  }
  public function setReferendumSubtitle($referendumSubtitle)
  {
    $this->referendumSubtitle = $referendumSubtitle;
  }
  public function getReferendumSubtitle()
  {
    return $this->referendumSubtitle;
  }
  public function setReferendumText($referendumText)
  {
    $this->referendumText = $referendumText;
  }
  public function getReferendumText()
  {
    return $this->referendumText;
  }
  public function setReferendumTitle($referendumTitle)
  {
    $this->referendumTitle = $referendumTitle;
  }
  public function getReferendumTitle()
  {
    return $this->referendumTitle;
  }
  public function setReferendumUrl($referendumUrl)
  {
    $this->referendumUrl = $referendumUrl;
  }
  public function getReferendumUrl()
  {
    return $this->referendumUrl;
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
  public function setSpecial($special)
  {
    $this->special = $special;
  }
  public function getSpecial()
  {
    return $this->special;
  }
  public function setType($type)
  {
    $this->type = $type;
  }
  public function getType()
  {
    return $this->type;
  }
}
