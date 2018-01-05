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

class Google_Service_Devprojects_InstalledAppInfo extends Google_Model
{
  public $androidPackage;
  public $appCert;
  public $appId;
  public $appStoreId;
  public $deepLinking;
  public $kind;
  public $type;

  public function setAndroidPackage($androidPackage)
  {
    $this->androidPackage = $androidPackage;
  }
  public function getAndroidPackage()
  {
    return $this->androidPackage;
  }
  public function setAppCert($appCert)
  {
    $this->appCert = $appCert;
  }
  public function getAppCert()
  {
    return $this->appCert;
  }
  public function setAppId($appId)
  {
    $this->appId = $appId;
  }
  public function getAppId()
  {
    return $this->appId;
  }
  public function setAppStoreId($appStoreId)
  {
    $this->appStoreId = $appStoreId;
  }
  public function getAppStoreId()
  {
    return $this->appStoreId;
  }
  public function setDeepLinking($deepLinking)
  {
    $this->deepLinking = $deepLinking;
  }
  public function getDeepLinking()
  {
    return $this->deepLinking;
  }
  public function setKind($kind)
  {
    $this->kind = $kind;
  }
  public function getKind()
  {
    return $this->kind;
  }
  public function setType($type)
  {
    $this->type = $type;
  }
  public function getType()
  {
    return $this->type;
  }
}
