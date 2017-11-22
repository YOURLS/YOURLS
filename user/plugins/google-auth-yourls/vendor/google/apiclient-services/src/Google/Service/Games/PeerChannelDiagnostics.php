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

class Google_Service_Games_PeerChannelDiagnostics extends Google_Model
{
  protected $bytesReceivedType = 'Google_Service_Games_AggregateStats';
  protected $bytesReceivedDataType = '';
  protected $bytesSentType = 'Google_Service_Games_AggregateStats';
  protected $bytesSentDataType = '';
  public $kind;
  public $numMessagesLost;
  public $numMessagesReceived;
  public $numMessagesSent;
  public $numSendFailures;
  protected $roundtripLatencyMillisType = 'Google_Service_Games_AggregateStats';
  protected $roundtripLatencyMillisDataType = '';

  /**
   * @param Google_Service_Games_AggregateStats
   */
  public function setBytesReceived(Google_Service_Games_AggregateStats $bytesReceived)
  {
    $this->bytesReceived = $bytesReceived;
  }
  /**
   * @return Google_Service_Games_AggregateStats
   */
  public function getBytesReceived()
  {
    return $this->bytesReceived;
  }
  /**
   * @param Google_Service_Games_AggregateStats
   */
  public function setBytesSent(Google_Service_Games_AggregateStats $bytesSent)
  {
    $this->bytesSent = $bytesSent;
  }
  /**
   * @return Google_Service_Games_AggregateStats
   */
  public function getBytesSent()
  {
    return $this->bytesSent;
  }
  public function setKind($kind)
  {
    $this->kind = $kind;
  }
  public function getKind()
  {
    return $this->kind;
  }
  public function setNumMessagesLost($numMessagesLost)
  {
    $this->numMessagesLost = $numMessagesLost;
  }
  public function getNumMessagesLost()
  {
    return $this->numMessagesLost;
  }
  public function setNumMessagesReceived($numMessagesReceived)
  {
    $this->numMessagesReceived = $numMessagesReceived;
  }
  public function getNumMessagesReceived()
  {
    return $this->numMessagesReceived;
  }
  public function setNumMessagesSent($numMessagesSent)
  {
    $this->numMessagesSent = $numMessagesSent;
  }
  public function getNumMessagesSent()
  {
    return $this->numMessagesSent;
  }
  public function setNumSendFailures($numSendFailures)
  {
    $this->numSendFailures = $numSendFailures;
  }
  public function getNumSendFailures()
  {
    return $this->numSendFailures;
  }
  /**
   * @param Google_Service_Games_AggregateStats
   */
  public function setRoundtripLatencyMillis(Google_Service_Games_AggregateStats $roundtripLatencyMillis)
  {
    $this->roundtripLatencyMillis = $roundtripLatencyMillis;
  }
  /**
   * @return Google_Service_Games_AggregateStats
   */
  public function getRoundtripLatencyMillis()
  {
    return $this->roundtripLatencyMillis;
  }
}
