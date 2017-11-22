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

class Google_Service_Directory_TrustedAppId extends Google_Model
{
  public $androidPackageName;
  public $certificateHashSHA1;
  public $certificateHashSHA256;
  public $etag;
  public $kind;

  public function setAndroidPackageName($androidPackageName)
  {
    $this->androidPackageName = $androidPackageName;
  }
  public function getAndroidPackageName()
  {
    return $this->androidPackageName;
  }
  public function setCertificateHashSHA1($certificateHashSHA1)
  {
    $this->certificateHashSHA1 = $certificateHashSHA1;
  }
  public function getCertificateHashSHA1()
  {
    return $this->certificateHashSHA1;
  }
  public function setCertificateHashSHA256($certificateHashSHA256)
  {
    $this->certificateHashSHA256 = $certificateHashSHA256;
  }
  public function getCertificateHashSHA256()
  {
    return $this->certificateHashSHA256;
  }
  public function setEtag($etag)
  {
    $this->etag = $etag;
  }
  public function getEtag()
  {
    return $this->etag;
  }
  public function setKind($kind)
  {
    $this->kind = $kind;
  }
  public function getKind()
  {
    return $this->kind;
  }
}
