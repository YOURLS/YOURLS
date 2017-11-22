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

class Google_Service_Coordinate_Job extends Google_Collection
{
  protected $collection_key = 'jobChange';
  public $id;
  protected $jobChangeType = 'Google_Service_Coordinate_JobChange';
  protected $jobChangeDataType = 'array';
  public $kind;
  protected $stateType = 'Google_Service_Coordinate_JobState';
  protected $stateDataType = '';

  public function setId($id)
  {
    $this->id = $id;
  }
  public function getId()
  {
    return $this->id;
  }
  public function setJobChange($jobChange)
  {
    $this->jobChange = $jobChange;
  }
  public function getJobChange()
  {
    return $this->jobChange;
  }
  public function setKind($kind)
  {
    $this->kind = $kind;
  }
  public function getKind()
  {
    return $this->kind;
  }
  public function setState(Google_Service_Coordinate_JobState $state)
  {
    $this->state = $state;
  }
  public function getState()
  {
    return $this->state;
  }
}
