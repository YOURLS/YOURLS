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

class Google_Service_Games_PeerSessionDiagnostics extends Google_Model
{
  public $connectedTimestampMillis;
  public $kind;
  public $participantId;
  protected $reliableChannelType = 'Google_Service_Games_PeerChannelDiagnostics';
  protected $reliableChannelDataType = '';
  protected $unreliableChannelType = 'Google_Service_Games_PeerChannelDiagnostics';
  protected $unreliableChannelDataType = '';

  public function setConnectedTimestampMillis($connectedTimestampMillis)
  {
    $this->connectedTimestampMillis = $connectedTimestampMillis;
  }
  public function getConnectedTimestampMillis()
  {
    return $this->connectedTimestampMillis;
  }
  public function setKind($kind)
  {
    $this->kind = $kind;
  }
  public function getKind()
  {
    return $this->kind;
  }
  public function setParticipantId($participantId)
  {
    $this->participantId = $participantId;
  }
  public function getParticipantId()
  {
    return $this->participantId;
  }
  /**
   * @param Google_Service_Games_PeerChannelDiagnostics
   */
  public function setReliableChannel(Google_Service_Games_PeerChannelDiagnostics $reliableChannel)
  {
    $this->reliableChannel = $reliableChannel;
  }
  /**
   * @return Google_Service_Games_PeerChannelDiagnostics
   */
  public function getReliableChannel()
  {
    return $this->reliableChannel;
  }
  /**
   * @param Google_Service_Games_PeerChannelDiagnostics
   */
  public function setUnreliableChannel(Google_Service_Games_PeerChannelDiagnostics $unreliableChannel)
  {
    $this->unreliableChannel = $unreliableChannel;
  }
  /**
   * @return Google_Service_Games_PeerChannelDiagnostics
   */
  public function getUnreliableChannel()
  {
    return $this->unreliableChannel;
  }
}
