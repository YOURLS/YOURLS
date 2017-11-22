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

class Google_Service_Dfareporting_ListPopulationRule extends Google_Collection
{
  protected $collection_key = 'listPopulationClauses';
  public $floodlightActivityId;
  public $floodlightActivityName;
  protected $listPopulationClausesType = 'Google_Service_Dfareporting_ListPopulationClause';
  protected $listPopulationClausesDataType = 'array';

  public function setFloodlightActivityId($floodlightActivityId)
  {
    $this->floodlightActivityId = $floodlightActivityId;
  }
  public function getFloodlightActivityId()
  {
    return $this->floodlightActivityId;
  }
  public function setFloodlightActivityName($floodlightActivityName)
  {
    $this->floodlightActivityName = $floodlightActivityName;
  }
  public function getFloodlightActivityName()
  {
    return $this->floodlightActivityName;
  }
  /**
   * @param Google_Service_Dfareporting_ListPopulationClause
   */
  public function setListPopulationClauses($listPopulationClauses)
  {
    $this->listPopulationClauses = $listPopulationClauses;
  }
  /**
   * @return Google_Service_Dfareporting_ListPopulationClause
   */
  public function getListPopulationClauses()
  {
    return $this->listPopulationClauses;
  }
}
