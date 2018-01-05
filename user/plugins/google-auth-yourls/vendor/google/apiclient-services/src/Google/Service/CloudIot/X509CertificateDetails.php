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

class Google_Service_CloudIot_X509CertificateDetails extends Google_Model
{
  public $expiryTime;
  public $issuer;
  public $publicKeyType;
  public $signatureAlgorithm;
  public $startTime;
  public $subject;

  public function setExpiryTime($expiryTime)
  {
    $this->expiryTime = $expiryTime;
  }
  public function getExpiryTime()
  {
    return $this->expiryTime;
  }
  public function setIssuer($issuer)
  {
    $this->issuer = $issuer;
  }
  public function getIssuer()
  {
    return $this->issuer;
  }
  public function setPublicKeyType($publicKeyType)
  {
    $this->publicKeyType = $publicKeyType;
  }
  public function getPublicKeyType()
  {
    return $this->publicKeyType;
  }
  public function setSignatureAlgorithm($signatureAlgorithm)
  {
    $this->signatureAlgorithm = $signatureAlgorithm;
  }
  public function getSignatureAlgorithm()
  {
    return $this->signatureAlgorithm;
  }
  public function setStartTime($startTime)
  {
    $this->startTime = $startTime;
  }
  public function getStartTime()
  {
    return $this->startTime;
  }
  public function setSubject($subject)
  {
    $this->subject = $subject;
  }
  public function getSubject()
  {
    return $this->subject;
  }
}
