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

class Google_Service_AndroidEnterprise_ProductSigningCertificate extends Google_Model
{
  public $certificateHashSha1;
  public $certificateHashSha256;

  public function setCertificateHashSha1($certificateHashSha1)
  {
    $this->certificateHashSha1 = $certificateHashSha1;
  }
  public function getCertificateHashSha1()
  {
    return $this->certificateHashSha1;
  }
  public function setCertificateHashSha256($certificateHashSha256)
  {
    $this->certificateHashSha256 = $certificateHashSha256;
  }
  public function getCertificateHashSha256()
  {
    return $this->certificateHashSha256;
  }
}
