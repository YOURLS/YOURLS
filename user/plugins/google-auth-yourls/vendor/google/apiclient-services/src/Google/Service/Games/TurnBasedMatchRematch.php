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

class Google_Service_Games_TurnBasedMatchRematch extends Google_Model
{
  public $kind;
  protected $previousMatchType = 'Google_Service_Games_TurnBasedMatch';
  protected $previousMatchDataType = '';
  protected $rematchType = 'Google_Service_Games_TurnBasedMatch';
  protected $rematchDataType = '';

  public function setKind($kind)
  {
    $this->kind = $kind;
  }
  public function getKind()
  {
    return $this->kind;
  }
  /**
   * @param Google_Service_Games_TurnBasedMatch
   */
  public function setPreviousMatch(Google_Service_Games_TurnBasedMatch $previousMatch)
  {
    $this->previousMatch = $previousMatch;
  }
  /**
   * @return Google_Service_Games_TurnBasedMatch
   */
  public function getPreviousMatch()
  {
    return $this->previousMatch;
  }
  /**
   * @param Google_Service_Games_TurnBasedMatch
   */
  public function setRematch(Google_Service_Games_TurnBasedMatch $rematch)
  {
    $this->rematch = $rematch;
  }
  /**
   * @return Google_Service_Games_TurnBasedMatch
   */
  public function getRematch()
  {
    return $this->rematch;
  }
}
