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

class Google_Service_Clouderrorreporting_HttpRequestContext extends Google_Model
{
  public $method;
  public $referrer;
  public $remoteIp;
  public $responseStatusCode;
  public $url;
  public $userAgent;

  public function setMethod($method)
  {
    $this->method = $method;
  }
  public function getMethod()
  {
    return $this->method;
  }
  public function setReferrer($referrer)
  {
    $this->referrer = $referrer;
  }
  public function getReferrer()
  {
    return $this->referrer;
  }
  public function setRemoteIp($remoteIp)
  {
    $this->remoteIp = $remoteIp;
  }
  public function getRemoteIp()
  {
    return $this->remoteIp;
  }
  public function setResponseStatusCode($responseStatusCode)
  {
    $this->responseStatusCode = $responseStatusCode;
  }
  public function getResponseStatusCode()
  {
    return $this->responseStatusCode;
  }
  public function setUrl($url)
  {
    $this->url = $url;
  }
  public function getUrl()
  {
    return $this->url;
  }
  public function setUserAgent($userAgent)
  {
    $this->userAgent = $userAgent;
  }
  public function getUserAgent()
  {
    return $this->userAgent;
  }
}
