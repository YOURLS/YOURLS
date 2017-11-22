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

class Google_Service_Spanner_ResultSetStats extends Google_Model
{
  protected $queryPlanType = 'Google_Service_Spanner_QueryPlan';
  protected $queryPlanDataType = '';
  public $queryStats;

  /**
   * @param Google_Service_Spanner_QueryPlan
   */
  public function setQueryPlan(Google_Service_Spanner_QueryPlan $queryPlan)
  {
    $this->queryPlan = $queryPlan;
  }
  /**
   * @return Google_Service_Spanner_QueryPlan
   */
  public function getQueryPlan()
  {
    return $this->queryPlan;
  }
  public function setQueryStats($queryStats)
  {
    $this->queryStats = $queryStats;
  }
  public function getQueryStats()
  {
    return $this->queryStats;
  }
}
