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

class Google_Service_Games_LeaderboardScores extends Google_Collection
{
  protected $collection_key = 'items';
  protected $itemsType = 'Google_Service_Games_LeaderboardEntry';
  protected $itemsDataType = 'array';
  public $kind;
  public $nextPageToken;
  public $numScores;
  protected $playerScoreType = 'Google_Service_Games_LeaderboardEntry';
  protected $playerScoreDataType = '';
  public $prevPageToken;

  /**
   * @param Google_Service_Games_LeaderboardEntry
   */
  public function setItems($items)
  {
    $this->items = $items;
  }
  /**
   * @return Google_Service_Games_LeaderboardEntry
   */
  public function getItems()
  {
    return $this->items;
  }
  public function setKind($kind)
  {
    $this->kind = $kind;
  }
  public function getKind()
  {
    return $this->kind;
  }
  public function setNextPageToken($nextPageToken)
  {
    $this->nextPageToken = $nextPageToken;
  }
  public function getNextPageToken()
  {
    return $this->nextPageToken;
  }
  public function setNumScores($numScores)
  {
    $this->numScores = $numScores;
  }
  public function getNumScores()
  {
    return $this->numScores;
  }
  /**
   * @param Google_Service_Games_LeaderboardEntry
   */
  public function setPlayerScore(Google_Service_Games_LeaderboardEntry $playerScore)
  {
    $this->playerScore = $playerScore;
  }
  /**
   * @return Google_Service_Games_LeaderboardEntry
   */
  public function getPlayerScore()
  {
    return $this->playerScore;
  }
  public function setPrevPageToken($prevPageToken)
  {
    $this->prevPageToken = $prevPageToken;
  }
  public function getPrevPageToken()
  {
    return $this->prevPageToken;
  }
}
