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

class Google_Service_Books_VolumeAccessInfo extends Google_Model
{
  public $accessViewStatus;
  public $country;
  protected $downloadAccessType = 'Google_Service_Books_DownloadAccessRestriction';
  protected $downloadAccessDataType = '';
  public $driveImportedContentLink;
  public $embeddable;
  protected $epubType = 'Google_Service_Books_VolumeAccessInfoEpub';
  protected $epubDataType = '';
  public $explicitOfflineLicenseManagement;
  protected $pdfType = 'Google_Service_Books_VolumeAccessInfoPdf';
  protected $pdfDataType = '';
  public $publicDomain;
  public $quoteSharingAllowed;
  public $textToSpeechPermission;
  public $viewOrderUrl;
  public $viewability;
  public $webReaderLink;

  public function setAccessViewStatus($accessViewStatus)
  {
    $this->accessViewStatus = $accessViewStatus;
  }
  public function getAccessViewStatus()
  {
    return $this->accessViewStatus;
  }
  public function setCountry($country)
  {
    $this->country = $country;
  }
  public function getCountry()
  {
    return $this->country;
  }
  /**
   * @param Google_Service_Books_DownloadAccessRestriction
   */
  public function setDownloadAccess(Google_Service_Books_DownloadAccessRestriction $downloadAccess)
  {
    $this->downloadAccess = $downloadAccess;
  }
  /**
   * @return Google_Service_Books_DownloadAccessRestriction
   */
  public function getDownloadAccess()
  {
    return $this->downloadAccess;
  }
  public function setDriveImportedContentLink($driveImportedContentLink)
  {
    $this->driveImportedContentLink = $driveImportedContentLink;
  }
  public function getDriveImportedContentLink()
  {
    return $this->driveImportedContentLink;
  }
  public function setEmbeddable($embeddable)
  {
    $this->embeddable = $embeddable;
  }
  public function getEmbeddable()
  {
    return $this->embeddable;
  }
  /**
   * @param Google_Service_Books_VolumeAccessInfoEpub
   */
  public function setEpub(Google_Service_Books_VolumeAccessInfoEpub $epub)
  {
    $this->epub = $epub;
  }
  /**
   * @return Google_Service_Books_VolumeAccessInfoEpub
   */
  public function getEpub()
  {
    return $this->epub;
  }
  public function setExplicitOfflineLicenseManagement($explicitOfflineLicenseManagement)
  {
    $this->explicitOfflineLicenseManagement = $explicitOfflineLicenseManagement;
  }
  public function getExplicitOfflineLicenseManagement()
  {
    return $this->explicitOfflineLicenseManagement;
  }
  /**
   * @param Google_Service_Books_VolumeAccessInfoPdf
   */
  public function setPdf(Google_Service_Books_VolumeAccessInfoPdf $pdf)
  {
    $this->pdf = $pdf;
  }
  /**
   * @return Google_Service_Books_VolumeAccessInfoPdf
   */
  public function getPdf()
  {
    return $this->pdf;
  }
  public function setPublicDomain($publicDomain)
  {
    $this->publicDomain = $publicDomain;
  }
  public function getPublicDomain()
  {
    return $this->publicDomain;
  }
  public function setQuoteSharingAllowed($quoteSharingAllowed)
  {
    $this->quoteSharingAllowed = $quoteSharingAllowed;
  }
  public function getQuoteSharingAllowed()
  {
    return $this->quoteSharingAllowed;
  }
  public function setTextToSpeechPermission($textToSpeechPermission)
  {
    $this->textToSpeechPermission = $textToSpeechPermission;
  }
  public function getTextToSpeechPermission()
  {
    return $this->textToSpeechPermission;
  }
  public function setViewOrderUrl($viewOrderUrl)
  {
    $this->viewOrderUrl = $viewOrderUrl;
  }
  public function getViewOrderUrl()
  {
    return $this->viewOrderUrl;
  }
  public function setViewability($viewability)
  {
    $this->viewability = $viewability;
  }
  public function getViewability()
  {
    return $this->viewability;
  }
  public function setWebReaderLink($webReaderLink)
  {
    $this->webReaderLink = $webReaderLink;
  }
  public function getWebReaderLink()
  {
    return $this->webReaderLink;
  }
}
