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

class Google_Service_Games_TurnBasedMatch extends Google_Collection
{
  protected $collection_key = 'results';
  public $applicationId;
  protected $autoMatchingCriteriaType = 'Google_Service_Games_TurnBasedAutoMatchingCriteria';
  protected $autoMatchingCriteriaDataType = '';
  protected $creationDetailsType = 'Google_Service_Games_TurnBasedMatchModification';
  protected $creationDetailsDataType = '';
  protected $dataType = 'Google_Service_Games_TurnBasedMatchData';
  protected $dataDataType = '';
  public $description;
  public $inviterId;
  public $kind;
  protected $lastUpdateDetailsType = 'Google_Service_Games_TurnBasedMatchModification';
  protected $lastUpdateDetailsDataType = '';
  public $matchId;
  public $matchNumber;
  public $matchVersion;
  protected $participantsType = 'Google_Service_Games_TurnBasedMatchParticipant';
  protected $participantsDataType = 'array';
  public $pendingParticipantId;
  protected $previousMatchDataType = 'Google_Service_Games_TurnBasedMatchData';
  protected $previousMatchDataDataType = '';
  public $rematchId;
  protected $resultsType = 'Google_Service_Games_ParticipantResult';
  protected $resultsDataType = 'array';
  public $status;
  public $userMatchStatus;
  public $variant;
  public $withParticipantId;

  public function setApplicationId($applicationId)
  {
    $this->applicationId = $applicationId;
  }
  public function getApplicationId()
  {
    return $this->applicationId;
  }
  /**
   * @param Google_Service_Games_TurnBasedAutoMatchingCriteria
   */
  public function setAutoMatchingCriteria(Google_Service_Games_TurnBasedAutoMatchingCriteria $autoMatchingCriteria)
  {
    $this->autoMatchingCriteria = $autoMatchingCriteria;
  }
  /**
   * @return Google_Service_Games_TurnBasedAutoMatchingCriteria
   */
  public function getAutoMatchingCriteria()
  {
    return $this->autoMatchingCriteria;
  }
  /**
   * @param Google_Service_Games_TurnBasedMatchModification
   */
  public function setCreationDetails(Google_Service_Games_TurnBasedMatchModification $creationDetails)
  {
    $this->creationDetails = $creationDetails;
  }
  /**
   * @return Google_Service_Games_TurnBasedMatchModification
   */
  public function getCreationDetails()
  {
    return $this->creationDetails;
  }
  /**
   * @param Google_Service_Games_TurnBasedMatchData
   */
  public function setData(Google_Service_Games_TurnBasedMatchData $data)
  {
    $this->data = $data;
  }
  /**
   * @return Google_Service_Games_TurnBasedMatchData
   */
  public function getData()
  {
    return $this->data;
  }
  public function setDescription($description)
  {
    $this->description = $description;
  }
  public function getDescription()
  {
    return $this->description;
  }
  public function setInviterId($inviterId)
  {
    $this->inviterId = $inviterId;
  }
  public function getInviterId()
  {
    return $this->inviterId;
  }
  public function setKind($kind)
  {
    $this->kind = $kind;
  }
  public function getKind()
  {
    return $this->kind;
  }
  /**
   * @param Google_Service_Games_TurnBasedMatchModification
   */
  public function setLastUpdateDetails(Google_Service_Games_TurnBasedMatchModification $lastUpdateDetails)
  {
    $this->lastUpdateDetails = $lastUpdateDetails;
  }
  /**
   * @return Google_Service_Games_TurnBasedMatchModification
   */
  public function getLastUpdateDetails()
  {
    return $this->lastUpdateDetails;
  }
  public function setMatchId($matchId)
  {
    $this->matchId = $matchId;
  }
  public function getMatchId()
  {
    return $this->matchId;
  }
  public function setMatchNumber($matchNumber)
  {
    $this->matchNumber = $matchNumber;
  }
  public function getMatchNumber()
  {
    return $this->matchNumber;
  }
  public function setMatchVersion($matchVersion)
  {
    $this->matchVersion = $matchVersion;
  }
  public function getMatchVersion()
  {
    return $this->matchVersion;
  }
  /**
   * @param Google_Service_Games_TurnBasedMatchParticipant
   */
  public function setParticipants($participants)
  {
    $this->participants = $participants;
  }
  /**
   * @return Google_Service_Games_TurnBasedMatchParticipant
   */
  public function getParticipants()
  {
    return $this->participants;
  }
  public function setPendingParticipantId($pendingParticipantId)
  {
    $this->pendingParticipantId = $pendingParticipantId;
  }
  public function getPendingParticipantId()
  {
    return $this->pendingParticipantId;
  }
  /**
   * @param Google_Service_Games_TurnBasedMatchData
   */
  public function setPreviousMatchData(Google_Service_Games_TurnBasedMatchData $previousMatchData)
  {
    $this->previousMatchData = $previousMatchData;
  }
  /**
   * @return Google_Service_Games_TurnBasedMatchData
   */
  public function getPreviousMatchData()
  {
    return $this->previousMatchData;
  }
  public function setRematchId($rematchId)
  {
    $this->rematchId = $rematchId;
  }
  public function getRematchId()
  {
    return $this->rematchId;
  }
  /**
   * @param Google_Service_Games_ParticipantResult
   */
  public function setResults($results)
  {
    $this->results = $results;
  }
  /**
   * @return Google_Service_Games_ParticipantResult
   */
  public function getResults()
  {
    return $this->results;
  }
  public function setStatus($status)
  {
    $this->status = $status;
  }
  public function getStatus()
  {
    return $this->status;
  }
  public function setUserMatchStatus($userMatchStatus)
  {
    $this->userMatchStatus = $userMatchStatus;
  }
  public function getUserMatchStatus()
  {
    return $this->userMatchStatus;
  }
  public function setVariant($variant)
  {
    $this->variant = $variant;
  }
  public function getVariant()
  {
    return $this->variant;
  }
  public function setWithParticipantId($withParticipantId)
  {
    $this->withParticipantId = $withParticipantId;
  }
  public function getWithParticipantId()
  {
    return $this->withParticipantId;
  }
}
