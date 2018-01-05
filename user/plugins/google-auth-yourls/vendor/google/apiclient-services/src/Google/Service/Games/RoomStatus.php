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

class Google_Service_Games_RoomStatus extends Google_Collection
{
  protected $collection_key = 'participants';
  protected $autoMatchingStatusType = 'Google_Service_Games_RoomAutoMatchStatus';
  protected $autoMatchingStatusDataType = '';
  public $kind;
  protected $participantsType = 'Google_Service_Games_RoomParticipant';
  protected $participantsDataType = 'array';
  public $roomId;
  public $status;
  public $statusVersion;

  /**
   * @param Google_Service_Games_RoomAutoMatchStatus
   */
  public function setAutoMatchingStatus(Google_Service_Games_RoomAutoMatchStatus $autoMatchingStatus)
  {
    $this->autoMatchingStatus = $autoMatchingStatus;
  }
  /**
   * @return Google_Service_Games_RoomAutoMatchStatus
   */
  public function getAutoMatchingStatus()
  {
    return $this->autoMatchingStatus;
  }
  public function setKind($kind)
  {
    $this->kind = $kind;
  }
  public function getKind()
  {
    return $this->kind;
  }
  /**
   * @param Google_Service_Games_RoomParticipant
   */
  public function setParticipants($participants)
  {
    $this->participants = $participants;
  }
  /**
   * @return Google_Service_Games_RoomParticipant
   */
  public function getParticipants()
  {
    return $this->participants;
  }
  public function setRoomId($roomId)
  {
    $this->roomId = $roomId;
  }
  public function getRoomId()
  {
    return $this->roomId;
  }
  public function setStatus($status)
  {
    $this->status = $status;
  }
  public function getStatus()
  {
    return $this->status;
  }
  public function setStatusVersion($statusVersion)
  {
    $this->statusVersion = $statusVersion;
  }
  public function getStatusVersion()
  {
    return $this->statusVersion;
  }
}
