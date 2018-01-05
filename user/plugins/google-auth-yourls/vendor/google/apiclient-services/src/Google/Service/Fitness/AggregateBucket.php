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

class Google_Service_Fitness_AggregateBucket extends Google_Collection
{
  protected $collection_key = 'dataset';
  public $activity;
  protected $datasetType = 'Google_Service_Fitness_Dataset';
  protected $datasetDataType = 'array';
  public $endTimeMillis;
  protected $sessionType = 'Google_Service_Fitness_Session';
  protected $sessionDataType = '';
  public $startTimeMillis;
  public $type;

  public function setActivity($activity)
  {
    $this->activity = $activity;
  }
  public function getActivity()
  {
    return $this->activity;
  }
  /**
   * @param Google_Service_Fitness_Dataset
   */
  public function setDataset($dataset)
  {
    $this->dataset = $dataset;
  }
  /**
   * @return Google_Service_Fitness_Dataset
   */
  public function getDataset()
  {
    return $this->dataset;
  }
  public function setEndTimeMillis($endTimeMillis)
  {
    $this->endTimeMillis = $endTimeMillis;
  }
  public function getEndTimeMillis()
  {
    return $this->endTimeMillis;
  }
  /**
   * @param Google_Service_Fitness_Session
   */
  public function setSession(Google_Service_Fitness_Session $session)
  {
    $this->session = $session;
  }
  /**
   * @return Google_Service_Fitness_Session
   */
  public function getSession()
  {
    return $this->session;
  }
  public function setStartTimeMillis($startTimeMillis)
  {
    $this->startTimeMillis = $startTimeMillis;
  }
  public function getStartTimeMillis()
  {
    return $this->startTimeMillis;
  }
  public function setType($type)
  {
    $this->type = $type;
  }
  public function getType()
  {
    return $this->type;
  }
}
