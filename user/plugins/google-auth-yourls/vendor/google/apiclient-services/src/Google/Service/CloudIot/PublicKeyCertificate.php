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

class Google_Service_CloudIot_PublicKeyCertificate extends Google_Model
{
  public $certificate;
  public $format;
  protected $x509DetailsType = 'Google_Service_CloudIot_X509CertificateDetails';
  protected $x509DetailsDataType = '';

  public function setCertificate($certificate)
  {
    $this->certificate = $certificate;
  }
  public function getCertificate()
  {
    return $this->certificate;
  }
  public function setFormat($format)
  {
    $this->format = $format;
  }
  public function getFormat()
  {
    return $this->format;
  }
  /**
   * @param Google_Service_CloudIot_X509CertificateDetails
   */
  public function setX509Details(Google_Service_CloudIot_X509CertificateDetails $x509Details)
  {
    $this->x509Details = $x509Details;
  }
  /**
   * @return Google_Service_CloudIot_X509CertificateDetails
   */
  public function getX509Details()
  {
    return $this->x509Details;
  }
}
