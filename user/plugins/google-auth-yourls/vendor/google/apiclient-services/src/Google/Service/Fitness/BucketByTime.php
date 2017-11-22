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

class Google_Service_Fitness_BucketByTime extends Google_Model
{
  public $durationMillis;
  protected $periodType = 'Google_Service_Fitness_BucketByTimePeriod';
  protected $periodDataType = '';

  public function setDurationMillis($durationMillis)
  {
    $this->durationMillis = $durationMillis;
  }
  public function getDurationMillis()
  {
    return $this->durationMillis;
  }
  /**
   * @param Google_Service_Fitness_BucketByTimePeriod
   */
  public function setPeriod(Google_Service_Fitness_BucketByTimePeriod $period)
  {
    $this->period = $period;
  }
  /**
   * @return Google_Service_Fitness_BucketByTimePeriod
   */
  public function getPeriod()
  {
    return $this->period;
  }
}
