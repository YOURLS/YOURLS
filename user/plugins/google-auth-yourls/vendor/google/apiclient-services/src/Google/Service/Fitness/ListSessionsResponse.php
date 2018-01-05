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

class Google_Service_Fitness_ListSessionsResponse extends Google_Collection
{
  protected $collection_key = 'session';
  protected $deletedSessionType = 'Google_Service_Fitness_Session';
  protected $deletedSessionDataType = 'array';
  public $hasMoreData;
  public $nextPageToken;
  protected $sessionType = 'Google_Service_Fitness_Session';
  protected $sessionDataType = 'array';

  /**
   * @param Google_Service_Fitness_Session
   */
  public function setDeletedSession($deletedSession)
  {
    $this->deletedSession = $deletedSession;
  }
  /**
   * @return Google_Service_Fitness_Session
   */
  public function getDeletedSession()
  {
    return $this->deletedSession;
  }
  public function setHasMoreData($hasMoreData)
  {
    $this->hasMoreData = $hasMoreData;
  }
  public function getHasMoreData()
  {
    return $this->hasMoreData;
  }
  public function setNextPageToken($nextPageToken)
  {
    $this->nextPageToken = $nextPageToken;
  }
  public function getNextPageToken()
  {
    return $this->nextPageToken;
  }
  /**
   * @param Google_Service_Fitness_Session
   */
  public function setSession($session)
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
}
