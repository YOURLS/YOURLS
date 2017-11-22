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

class Google_Service_SQLAdmin_MySqlReplicaConfiguration extends Google_Model
{
  public $caCertificate;
  public $clientCertificate;
  public $clientKey;
  public $connectRetryInterval;
  public $dumpFilePath;
  public $kind;
  public $masterHeartbeatPeriod;
  public $password;
  public $sslCipher;
  public $username;
  public $verifyServerCertificate;

  public function setCaCertificate($caCertificate)
  {
    $this->caCertificate = $caCertificate;
  }
  public function getCaCertificate()
  {
    return $this->caCertificate;
  }
  public function setClientCertificate($clientCertificate)
  {
    $this->clientCertificate = $clientCertificate;
  }
  public function getClientCertificate()
  {
    return $this->clientCertificate;
  }
  public function setClientKey($clientKey)
  {
    $this->clientKey = $clientKey;
  }
  public function getClientKey()
  {
    return $this->clientKey;
  }
  public function setConnectRetryInterval($connectRetryInterval)
  {
    $this->connectRetryInterval = $connectRetryInterval;
  }
  public function getConnectRetryInterval()
  {
    return $this->connectRetryInterval;
  }
  public function setDumpFilePath($dumpFilePath)
  {
    $this->dumpFilePath = $dumpFilePath;
  }
  public function getDumpFilePath()
  {
    return $this->dumpFilePath;
  }
  public function setKind($kind)
  {
    $this->kind = $kind;
  }
  public function getKind()
  {
    return $this->kind;
  }
  public function setMasterHeartbeatPeriod($masterHeartbeatPeriod)
  {
    $this->masterHeartbeatPeriod = $masterHeartbeatPeriod;
  }
  public function getMasterHeartbeatPeriod()
  {
    return $this->masterHeartbeatPeriod;
  }
  public function setPassword($password)
  {
    $this->password = $password;
  }
  public function getPassword()
  {
    return $this->password;
  }
  public function setSslCipher($sslCipher)
  {
    $this->sslCipher = $sslCipher;
  }
  public function getSslCipher()
  {
    return $this->sslCipher;
  }
  public function setUsername($username)
  {
    $this->username = $username;
  }
  public function getUsername()
  {
    return $this->username;
  }
  public function setVerifyServerCertificate($verifyServerCertificate)
  {
    $this->verifyServerCertificate = $verifyServerCertificate;
  }
  public function getVerifyServerCertificate()
  {
    return $this->verifyServerCertificate;
  }
}
