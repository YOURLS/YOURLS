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

class Google_Service_Games_PlayerLeaderboardScore extends Google_Model
{
  protected $internal_gapi_mappings = array(
        "leaderboardId" => "leaderboard_id",
  );
  public $kind;
  public $leaderboardId;
  protected $publicRankType = 'Google_Service_Games_LeaderboardScoreRank';
  protected $publicRankDataType = '';
  public $scoreString;
  public $scoreTag;
  public $scoreValue;
  protected $socialRankType = 'Google_Service_Games_LeaderboardScoreRank';
  protected $socialRankDataType = '';
  public $timeSpan;
  public $writeTimestamp;

  public function setKind($kind)
  {
    $this->kind = $kind;
  }
  public function getKind()
  {
    return $this->kind;
  }
  public function setLeaderboardId($leaderboardId)
  {
    $this->leaderboardId = $leaderboardId;
  }
  public function getLeaderboardId()
  {
    return $this->leaderboardId;
  }
  /**
   * @param Google_Service_Games_LeaderboardScoreRank
   */
  public function setPublicRank(Google_Service_Games_LeaderboardScoreRank $publicRank)
  {
    $this->publicRank = $publicRank;
  }
  /**
   * @return Google_Service_Games_LeaderboardScoreRank
   */
  public function getPublicRank()
  {
    return $this->publicRank;
  }
  public function setScoreString($scoreString)
  {
    $this->scoreString = $scoreString;
  }
  public function getScoreString()
  {
    return $this->scoreString;
  }
  public function setScoreTag($scoreTag)
  {
    $this->scoreTag = $scoreTag;
  }
  public function getScoreTag()
  {
    return $this->scoreTag;
  }
  public function setScoreValue($scoreValue)
  {
    $this->scoreValue = $scoreValue;
  }
  public function getScoreValue()
  {
    return $this->scoreValue;
  }
  /**
   * @param Google_Service_Games_LeaderboardScoreRank
   */
  public function setSocialRank(Google_Service_Games_LeaderboardScoreRank $socialRank)
  {
    $this->socialRank = $socialRank;
  }
  /**
   * @return Google_Service_Games_LeaderboardScoreRank
   */
  public function getSocialRank()
  {
    return $this->socialRank;
  }
  public function setTimeSpan($timeSpan)
  {
    $this->timeSpan = $timeSpan;
  }
  public function getTimeSpan()
  {
    return $this->timeSpan;
  }
  public function setWriteTimestamp($writeTimestamp)
  {
    $this->writeTimestamp = $writeTimestamp;
  }
  public function getWriteTimestamp()
  {
    return $this->writeTimestamp;
  }
}
