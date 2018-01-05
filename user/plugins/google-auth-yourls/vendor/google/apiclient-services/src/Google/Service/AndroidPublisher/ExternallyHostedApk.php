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

class Google_Service_AndroidPublisher_ExternallyHostedApk extends Google_Collection
{
  protected $collection_key = 'usesPermissions';
  public $applicationLabel;
  public $certificateBase64s;
  public $externallyHostedUrl;
  public $fileSha1Base64;
  public $fileSha256Base64;
  public $fileSize;
  public $iconBase64;
  public $maximumSdk;
  public $minimumSdk;
  public $nativeCodes;
  public $packageName;
  public $usesFeatures;
  protected $usesPermissionsType = 'Google_Service_AndroidPublisher_ExternallyHostedApkUsesPermission';
  protected $usesPermissionsDataType = 'array';
  public $versionCode;
  public $versionName;

  public function setApplicationLabel($applicationLabel)
  {
    $this->applicationLabel = $applicationLabel;
  }
  public function getApplicationLabel()
  {
    return $this->applicationLabel;
  }
  public function setCertificateBase64s($certificateBase64s)
  {
    $this->certificateBase64s = $certificateBase64s;
  }
  public function getCertificateBase64s()
  {
    return $this->certificateBase64s;
  }
  public function setExternallyHostedUrl($externallyHostedUrl)
  {
    $this->externallyHostedUrl = $externallyHostedUrl;
  }
  public function getExternallyHostedUrl()
  {
    return $this->externallyHostedUrl;
  }
  public function setFileSha1Base64($fileSha1Base64)
  {
    $this->fileSha1Base64 = $fileSha1Base64;
  }
  public function getFileSha1Base64()
  {
    return $this->fileSha1Base64;
  }
  public function setFileSha256Base64($fileSha256Base64)
  {
    $this->fileSha256Base64 = $fileSha256Base64;
  }
  public function getFileSha256Base64()
  {
    return $this->fileSha256Base64;
  }
  public function setFileSize($fileSize)
  {
    $this->fileSize = $fileSize;
  }
  public function getFileSize()
  {
    return $this->fileSize;
  }
  public function setIconBase64($iconBase64)
  {
    $this->iconBase64 = $iconBase64;
  }
  public function getIconBase64()
  {
    return $this->iconBase64;
  }
  public function setMaximumSdk($maximumSdk)
  {
    $this->maximumSdk = $maximumSdk;
  }
  public function getMaximumSdk()
  {
    return $this->maximumSdk;
  }
  public function setMinimumSdk($minimumSdk)
  {
    $this->minimumSdk = $minimumSdk;
  }
  public function getMinimumSdk()
  {
    return $this->minimumSdk;
  }
  public function setNativeCodes($nativeCodes)
  {
    $this->nativeCodes = $nativeCodes;
  }
  public function getNativeCodes()
  {
    return $this->nativeCodes;
  }
  public function setPackageName($packageName)
  {
    $this->packageName = $packageName;
  }
  public function getPackageName()
  {
    return $this->packageName;
  }
  public function setUsesFeatures($usesFeatures)
  {
    $this->usesFeatures = $usesFeatures;
  }
  public function getUsesFeatures()
  {
    return $this->usesFeatures;
  }
  /**
   * @param Google_Service_AndroidPublisher_ExternallyHostedApkUsesPermission
   */
  public function setUsesPermissions($usesPermissions)
  {
    $this->usesPermissions = $usesPermissions;
  }
  /**
   * @return Google_Service_AndroidPublisher_ExternallyHostedApkUsesPermission
   */
  public function getUsesPermissions()
  {
    return $this->usesPermissions;
  }
  public function setVersionCode($versionCode)
  {
    $this->versionCode = $versionCode;
  }
  public function getVersionCode()
  {
    return $this->versionCode;
  }
  public function setVersionName($versionName)
  {
    $this->versionName = $versionName;
  }
  public function getVersionName()
  {
    return $this->versionName;
  }
}
