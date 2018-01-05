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

class Google_Service_FirebaseDynamicLinksAPI_IosInfo extends Google_Model
{
  public $iosAppStoreId;
  public $iosBundleId;
  public $iosCustomScheme;
  public $iosFallbackLink;
  public $iosIpadBundleId;
  public $iosIpadFallbackLink;

  public function setIosAppStoreId($iosAppStoreId)
  {
    $this->iosAppStoreId = $iosAppStoreId;
  }
  public function getIosAppStoreId()
  {
    return $this->iosAppStoreId;
  }
  public function setIosBundleId($iosBundleId)
  {
    $this->iosBundleId = $iosBundleId;
  }
  public function getIosBundleId()
  {
    return $this->iosBundleId;
  }
  public function setIosCustomScheme($iosCustomScheme)
  {
    $this->iosCustomScheme = $iosCustomScheme;
  }
  public function getIosCustomScheme()
  {
    return $this->iosCustomScheme;
  }
  public function setIosFallbackLink($iosFallbackLink)
  {
    $this->iosFallbackLink = $iosFallbackLink;
  }
  public function getIosFallbackLink()
  {
    return $this->iosFallbackLink;
  }
  public function setIosIpadBundleId($iosIpadBundleId)
  {
    $this->iosIpadBundleId = $iosIpadBundleId;
  }
  public function getIosIpadBundleId()
  {
    return $this->iosIpadBundleId;
  }
  public function setIosIpadFallbackLink($iosIpadFallbackLink)
  {
    $this->iosIpadFallbackLink = $iosIpadFallbackLink;
  }
  public function getIosIpadFallbackLink()
  {
    return $this->iosIpadFallbackLink;
  }
}
