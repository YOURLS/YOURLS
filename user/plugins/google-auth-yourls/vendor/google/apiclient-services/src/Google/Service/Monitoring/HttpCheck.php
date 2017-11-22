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

class Google_Service_Monitoring_HttpCheck extends Google_Model
{
  protected $authInfoType = 'Google_Service_Monitoring_BasicAuthentication';
  protected $authInfoDataType = '';
  public $headers;
  public $maskHeaders;
  public $path;
  public $port;
  public $useSsl;

  /**
   * @param Google_Service_Monitoring_BasicAuthentication
   */
  public function setAuthInfo(Google_Service_Monitoring_BasicAuthentication $authInfo)
  {
    $this->authInfo = $authInfo;
  }
  /**
   * @return Google_Service_Monitoring_BasicAuthentication
   */
  public function getAuthInfo()
  {
    return $this->authInfo;
  }
  public function setHeaders($headers)
  {
    $this->headers = $headers;
  }
  public function getHeaders()
  {
    return $this->headers;
  }
  public function setMaskHeaders($maskHeaders)
  {
    $this->maskHeaders = $maskHeaders;
  }
  public function getMaskHeaders()
  {
    return $this->maskHeaders;
  }
  public function setPath($path)
  {
    $this->path = $path;
  }
  public function getPath()
  {
    return $this->path;
  }
  public function setPort($port)
  {
    $this->port = $port;
  }
  public function getPort()
  {
    return $this->port;
  }
  public function setUseSsl($useSsl)
  {
    $this->useSsl = $useSsl;
  }
  public function getUseSsl()
  {
    return $this->useSsl;
  }
}
