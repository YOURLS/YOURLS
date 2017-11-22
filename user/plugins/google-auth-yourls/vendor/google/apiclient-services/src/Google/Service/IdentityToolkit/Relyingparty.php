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

class Google_Service_IdentityToolkit_Relyingparty extends Google_Model
{
  public $androidInstallApp;
  public $androidMinimumVersion;
  public $androidPackageName;
  public $canHandleCodeInApp;
  public $captchaResp;
  public $challenge;
  public $continueUrl;
  public $email;
  public $iOSAppStoreId;
  public $iOSBundleId;
  public $idToken;
  public $kind;
  public $newEmail;
  public $requestType;
  public $userIp;

  public function setAndroidInstallApp($androidInstallApp)
  {
    $this->androidInstallApp = $androidInstallApp;
  }
  public function getAndroidInstallApp()
  {
    return $this->androidInstallApp;
  }
  public function setAndroidMinimumVersion($androidMinimumVersion)
  {
    $this->androidMinimumVersion = $androidMinimumVersion;
  }
  public function getAndroidMinimumVersion()
  {
    return $this->androidMinimumVersion;
  }
  public function setAndroidPackageName($androidPackageName)
  {
    $this->androidPackageName = $androidPackageName;
  }
  public function getAndroidPackageName()
  {
    return $this->androidPackageName;
  }
  public function setCanHandleCodeInApp($canHandleCodeInApp)
  {
    $this->canHandleCodeInApp = $canHandleCodeInApp;
  }
  public function getCanHandleCodeInApp()
  {
    return $this->canHandleCodeInApp;
  }
  public function setCaptchaResp($captchaResp)
  {
    $this->captchaResp = $captchaResp;
  }
  public function getCaptchaResp()
  {
    return $this->captchaResp;
  }
  public function setChallenge($challenge)
  {
    $this->challenge = $challenge;
  }
  public function getChallenge()
  {
    return $this->challenge;
  }
  public function setContinueUrl($continueUrl)
  {
    $this->continueUrl = $continueUrl;
  }
  public function getContinueUrl()
  {
    return $this->continueUrl;
  }
  public function setEmail($email)
  {
    $this->email = $email;
  }
  public function getEmail()
  {
    return $this->email;
  }
  public function setIOSAppStoreId($iOSAppStoreId)
  {
    $this->iOSAppStoreId = $iOSAppStoreId;
  }
  public function getIOSAppStoreId()
  {
    return $this->iOSAppStoreId;
  }
  public function setIOSBundleId($iOSBundleId)
  {
    $this->iOSBundleId = $iOSBundleId;
  }
  public function getIOSBundleId()
  {
    return $this->iOSBundleId;
  }
  public function setIdToken($idToken)
  {
    $this->idToken = $idToken;
  }
  public function getIdToken()
  {
    return $this->idToken;
  }
  public function setKind($kind)
  {
    $this->kind = $kind;
  }
  public function getKind()
  {
    return $this->kind;
  }
  public function setNewEmail($newEmail)
  {
    $this->newEmail = $newEmail;
  }
  public function getNewEmail()
  {
    return $this->newEmail;
  }
  public function setRequestType($requestType)
  {
    $this->requestType = $requestType;
  }
  public function getRequestType()
  {
    return $this->requestType;
  }
  public function setUserIp($userIp)
  {
    $this->userIp = $userIp;
  }
  public function getUserIp()
  {
    return $this->userIp;
  }
}
