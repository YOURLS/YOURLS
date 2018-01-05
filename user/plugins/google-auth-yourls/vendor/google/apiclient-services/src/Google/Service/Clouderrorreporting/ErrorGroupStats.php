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

class Google_Service_Clouderrorreporting_ErrorGroupStats extends Google_Collection
{
  protected $collection_key = 'timedCounts';
  protected $affectedServicesType = 'Google_Service_Clouderrorreporting_ServiceContext';
  protected $affectedServicesDataType = 'array';
  public $affectedUsersCount;
  public $count;
  public $firstSeenTime;
  protected $groupType = 'Google_Service_Clouderrorreporting_ErrorGroup';
  protected $groupDataType = '';
  public $lastSeenTime;
  public $numAffectedServices;
  protected $representativeType = 'Google_Service_Clouderrorreporting_ErrorEvent';
  protected $representativeDataType = '';
  protected $timedCountsType = 'Google_Service_Clouderrorreporting_TimedCount';
  protected $timedCountsDataType = 'array';

  /**
   * @param Google_Service_Clouderrorreporting_ServiceContext
   */
  public function setAffectedServices($affectedServices)
  {
    $this->affectedServices = $affectedServices;
  }
  /**
   * @return Google_Service_Clouderrorreporting_ServiceContext
   */
  public function getAffectedServices()
  {
    return $this->affectedServices;
  }
  public function setAffectedUsersCount($affectedUsersCount)
  {
    $this->affectedUsersCount = $affectedUsersCount;
  }
  public function getAffectedUsersCount()
  {
    return $this->affectedUsersCount;
  }
  public function setCount($count)
  {
    $this->count = $count;
  }
  public function getCount()
  {
    return $this->count;
  }
  public function setFirstSeenTime($firstSeenTime)
  {
    $this->firstSeenTime = $firstSeenTime;
  }
  public function getFirstSeenTime()
  {
    return $this->firstSeenTime;
  }
  /**
   * @param Google_Service_Clouderrorreporting_ErrorGroup
   */
  public function setGroup(Google_Service_Clouderrorreporting_ErrorGroup $group)
  {
    $this->group = $group;
  }
  /**
   * @return Google_Service_Clouderrorreporting_ErrorGroup
   */
  public function getGroup()
  {
    return $this->group;
  }
  public function setLastSeenTime($lastSeenTime)
  {
    $this->lastSeenTime = $lastSeenTime;
  }
  public function getLastSeenTime()
  {
    return $this->lastSeenTime;
  }
  public function setNumAffectedServices($numAffectedServices)
  {
    $this->numAffectedServices = $numAffectedServices;
  }
  public function getNumAffectedServices()
  {
    return $this->numAffectedServices;
  }
  /**
   * @param Google_Service_Clouderrorreporting_ErrorEvent
   */
  public function setRepresentative(Google_Service_Clouderrorreporting_ErrorEvent $representative)
  {
    $this->representative = $representative;
  }
  /**
   * @return Google_Service_Clouderrorreporting_ErrorEvent
   */
  public function getRepresentative()
  {
    return $this->representative;
  }
  /**
   * @param Google_Service_Clouderrorreporting_TimedCount
   */
  public function setTimedCounts($timedCounts)
  {
    $this->timedCounts = $timedCounts;
  }
  /**
   * @return Google_Service_Clouderrorreporting_TimedCount
   */
  public function getTimedCounts()
  {
    return $this->timedCounts;
  }
}
