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

class Google_Service_Games_LeaderboardScoreRank extends Google_Model
{
  public $formattedNumScores;
  public $formattedRank;
  public $kind;
  public $numScores;
  public $rank;

  public function setFormattedNumScores($formattedNumScores)
  {
    $this->formattedNumScores = $formattedNumScores;
  }
  public function getFormattedNumScores()
  {
    return $this->formattedNumScores;
  }
  public function setFormattedRank($formattedRank)
  {
    $this->formattedRank = $formattedRank;
  }
  public function getFormattedRank()
  {
    return $this->formattedRank;
  }
  public function setKind($kind)
  {
    $this->kind = $kind;
  }
  public function getKind()
  {
    return $this->kind;
  }
  public function setNumScores($numScores)
  {
    $this->numScores = $numScores;
  }
  public function getNumScores()
  {
    return $this->numScores;
  }
  public function setRank($rank)
  {
    $this->rank = $rank;
  }
  public function getRank()
  {
    return $this->rank;
  }
}
