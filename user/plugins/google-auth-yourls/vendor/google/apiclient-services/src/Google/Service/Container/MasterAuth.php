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

class Google_Service_Container_MasterAuth extends Google_Model
{
  public $clientCertificate;
  protected $clientCertificateConfigType = 'Google_Service_Container_ClientCertificateConfig';
  protected $clientCertificateConfigDataType = '';
  public $clientKey;
  public $clusterCaCertificate;
  public $password;
  public $username;

  public function setClientCertificate($clientCertificate)
  {
    $this->clientCertificate = $clientCertificate;
  }
  public function getClientCertificate()
  {
    return $this->clientCertificate;
  }
  /**
   * @param Google_Service_Container_ClientCertificateConfig
   */
  public function setClientCertificateConfig(Google_Service_Container_ClientCertificateConfig $clientCertificateConfig)
  {
    $this->clientCertificateConfig = $clientCertificateConfig;
  }
  /**
   * @return Google_Service_Container_ClientCertificateConfig
   */
  public function getClientCertificateConfig()
  {
    return $this->clientCertificateConfig;
  }
  public function setClientKey($clientKey)
  {
    $this->clientKey = $clientKey;
  }
  public function getClientKey()
  {
    return $this->clientKey;
  }
  public function setClusterCaCertificate($clusterCaCertificate)
  {
    $this->clusterCaCertificate = $clusterCaCertificate;
  }
  public function getClusterCaCertificate()
  {
    return $this->clusterCaCertificate;
  }
  public function setPassword($password)
  {
    $this->password = $password;
  }
  public function getPassword()
  {
    return $this->password;
  }
  public function setUsername($username)
  {
    $this->username = $username;
  }
  public function getUsername()
  {
    return $this->username;
  }
}
