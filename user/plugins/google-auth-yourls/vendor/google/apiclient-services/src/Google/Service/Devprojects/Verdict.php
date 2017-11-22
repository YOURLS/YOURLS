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

class Google_Service_Devprojects_Verdict extends Google_Collection
{
  protected $collection_key = 'userNotification';
  protected $clientType = 'Google_Service_Devprojects_AbuseiamClient';
  protected $clientDataType = '';
  public $comment;
  public $decision;
  public $durationMins;
  protected $evaluationType = 'Google_Service_Devprojects_Evaluation';
  protected $evaluationDataType = 'array';
  public $isLegalIssued;
  public $kind;
  protected $miscScoresType = 'Google_Service_Devprojects_NameValuePair';
  protected $miscScoresDataType = 'array';
  public $reasonCode;
  protected $regionType = 'Google_Service_Devprojects_Region';
  protected $regionDataType = 'array';
  protected $restrictionType = 'Google_Service_Devprojects_VerdictRestriction';
  protected $restrictionDataType = 'array';
  public $strikeCategory;
  protected $targetType = 'Google_Service_Devprojects_Target';
  protected $targetDataType = '';
  public $targetTimestampMicros;
  public $timestampMicros;
  protected $userNotificationType = 'Google_Service_Devprojects_UserNotification';
  protected $userNotificationDataType = 'array';
  public $version;

  public function setClient(Google_Service_Devprojects_AbuseiamClient $client)
  {
    $this->client = $client;
  }
  public function getClient()
  {
    return $this->client;
  }
  public function setComment($comment)
  {
    $this->comment = $comment;
  }
  public function getComment()
  {
    return $this->comment;
  }
  public function setDecision($decision)
  {
    $this->decision = $decision;
  }
  public function getDecision()
  {
    return $this->decision;
  }
  public function setDurationMins($durationMins)
  {
    $this->durationMins = $durationMins;
  }
  public function getDurationMins()
  {
    return $this->durationMins;
  }
  public function setEvaluation($evaluation)
  {
    $this->evaluation = $evaluation;
  }
  public function getEvaluation()
  {
    return $this->evaluation;
  }
  public function setIsLegalIssued($isLegalIssued)
  {
    $this->isLegalIssued = $isLegalIssued;
  }
  public function getIsLegalIssued()
  {
    return $this->isLegalIssued;
  }
  public function setKind($kind)
  {
    $this->kind = $kind;
  }
  public function getKind()
  {
    return $this->kind;
  }
  public function setMiscScores($miscScores)
  {
    $this->miscScores = $miscScores;
  }
  public function getMiscScores()
  {
    return $this->miscScores;
  }
  public function setReasonCode($reasonCode)
  {
    $this->reasonCode = $reasonCode;
  }
  public function getReasonCode()
  {
    return $this->reasonCode;
  }
  public function setRegion($region)
  {
    $this->region = $region;
  }
  public function getRegion()
  {
    return $this->region;
  }
  public function setRestriction($restriction)
  {
    $this->restriction = $restriction;
  }
  public function getRestriction()
  {
    return $this->restriction;
  }
  public function setStrikeCategory($strikeCategory)
  {
    $this->strikeCategory = $strikeCategory;
  }
  public function getStrikeCategory()
  {
    return $this->strikeCategory;
  }
  public function setTarget(Google_Service_Devprojects_Target $target)
  {
    $this->target = $target;
  }
  public function getTarget()
  {
    return $this->target;
  }
  public function setTargetTimestampMicros($targetTimestampMicros)
  {
    $this->targetTimestampMicros = $targetTimestampMicros;
  }
  public function getTargetTimestampMicros()
  {
    return $this->targetTimestampMicros;
  }
  public function setTimestampMicros($timestampMicros)
  {
    $this->timestampMicros = $timestampMicros;
  }
  public function getTimestampMicros()
  {
    return $this->timestampMicros;
  }
  public function setUserNotification($userNotification)
  {
    $this->userNotification = $userNotification;
  }
  public function getUserNotification()
  {
    return $this->userNotification;
  }
  public function setVersion($version)
  {
    $this->version = $version;
  }
  public function getVersion()
  {
    return $this->version;
  }
}
