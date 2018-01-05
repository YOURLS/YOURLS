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

class Google_Service_Games_TurnBasedMatchResults extends Google_Collection
{
  protected $collection_key = 'results';
  protected $dataType = 'Google_Service_Games_TurnBasedMatchDataRequest';
  protected $dataDataType = '';
  public $kind;
  public $matchVersion;
  protected $resultsType = 'Google_Service_Games_ParticipantResult';
  protected $resultsDataType = 'array';

  /**
   * @param Google_Service_Games_TurnBasedMatchDataRequest
   */
  public function setData(Google_Service_Games_TurnBasedMatchDataRequest $data)
  {
    $this->data = $data;
  }
  /**
   * @return Google_Service_Games_TurnBasedMatchDataRequest
   */
  public function getData()
  {
    return $this->data;
  }
  public function setKind($kind)
  {
    $this->kind = $kind;
  }
  public function getKind()
  {
    return $this->kind;
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
}
