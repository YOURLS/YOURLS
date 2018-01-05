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

class Google_Service_Games_LeaderboardEntry extends Google_Model
{
  public $formattedScore;
  public $formattedScoreRank;
  public $kind;
  protected $playerType = 'Google_Service_Games_Player';
  protected $playerDataType = '';
  public $scoreRank;
  public $scoreTag;
  public $scoreValue;
  public $timeSpan;
  public $writeTimestampMillis;

  public function setFormattedScore($formattedScore)
  {
    $this->formattedScore = $formattedScore;
  }
  public function getFormattedScore()
  {
    return $this->formattedScore;
  }
  public function setFormattedScoreRank($formattedScoreRank)
  {
    $this->formattedScoreRank = $formattedScoreRank;
  }
  public function getFormattedScoreRank()
  {
    return $this->formattedScoreRank;
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
   * @param Google_Service_Games_Player
   */
  public function setPlayer(Google_Service_Games_Player $player)
  {
    $this->player = $player;
  }
  /**
   * @return Google_Service_Games_Player
   */
  public function getPlayer()
  {
    return $this->player;
  }
  public function setScoreRank($scoreRank)
  {
    $this->scoreRank = $scoreRank;
  }
  public function getScoreRank()
  {
    return $this->scoreRank;
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
  public function setTimeSpan($timeSpan)
  {
    $this->timeSpan = $timeSpan;
  }
  public function getTimeSpan()
  {
    return $this->timeSpan;
  }
  public function setWriteTimestampMillis($writeTimestampMillis)
  {
    $this->writeTimestampMillis = $writeTimestampMillis;
  }
  public function getWriteTimestampMillis()
  {
    return $this->writeTimestampMillis;
  }
}
