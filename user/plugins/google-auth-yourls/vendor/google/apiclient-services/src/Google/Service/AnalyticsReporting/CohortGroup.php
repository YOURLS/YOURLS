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

class Google_Service_AnalyticsReporting_CohortGroup extends Google_Collection
{
  protected $collection_key = 'cohorts';
  protected $cohortsType = 'Google_Service_AnalyticsReporting_Cohort';
  protected $cohortsDataType = 'array';
  public $lifetimeValue;

  /**
   * @param Google_Service_AnalyticsReporting_Cohort
   */
  public function setCohorts($cohorts)
  {
    $this->cohorts = $cohorts;
  }
  /**
   * @return Google_Service_AnalyticsReporting_Cohort
   */
  public function getCohorts()
  {
    return $this->cohorts;
  }
  public function setLifetimeValue($lifetimeValue)
  {
    $this->lifetimeValue = $lifetimeValue;
  }
  public function getLifetimeValue()
  {
    return $this->lifetimeValue;
  }
}
