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

class Google_Service_Games_RoomLeaveDiagnostics extends Google_Collection
{
  protected $collection_key = 'peerSession';
  public $androidNetworkSubtype;
  public $androidNetworkType;
  public $iosNetworkType;
  public $kind;
  public $networkOperatorCode;
  public $networkOperatorName;
  protected $peerSessionType = 'Google_Service_Games_PeerSessionDiagnostics';
  protected $peerSessionDataType = 'array';
  public $socketsUsed;

  public function setAndroidNetworkSubtype($androidNetworkSubtype)
  {
    $this->androidNetworkSubtype = $androidNetworkSubtype;
  }
  public function getAndroidNetworkSubtype()
  {
    return $this->androidNetworkSubtype;
  }
  public function setAndroidNetworkType($androidNetworkType)
  {
    $this->androidNetworkType = $androidNetworkType;
  }
  public function getAndroidNetworkType()
  {
    return $this->androidNetworkType;
  }
  public function setIosNetworkType($iosNetworkType)
  {
    $this->iosNetworkType = $iosNetworkType;
  }
  public function getIosNetworkType()
  {
    return $this->iosNetworkType;
  }
  public function setKind($kind)
  {
    $this->kind = $kind;
  }
  public function getKind()
  {
    return $this->kind;
  }
  public function setNetworkOperatorCode($networkOperatorCode)
  {
    $this->networkOperatorCode = $networkOperatorCode;
  }
  public function getNetworkOperatorCode()
  {
    return $this->networkOperatorCode;
  }
  public function setNetworkOperatorName($networkOperatorName)
  {
    $this->networkOperatorName = $networkOperatorName;
  }
  public function getNetworkOperatorName()
  {
    return $this->networkOperatorName;
  }
  /**
   * @param Google_Service_Games_PeerSessionDiagnostics
   */
  public function setPeerSession($peerSession)
  {
    $this->peerSession = $peerSession;
  }
  /**
   * @return Google_Service_Games_PeerSessionDiagnostics
   */
  public function getPeerSession()
  {
    return $this->peerSession;
  }
  public function setSocketsUsed($socketsUsed)
  {
    $this->socketsUsed = $socketsUsed;
  }
  public function getSocketsUsed()
  {
    return $this->socketsUsed;
  }
}
