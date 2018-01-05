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

class Google_Service_IdentityToolkit_VerifyPasswordResponse extends Google_Model
{
  public $displayName;
  public $email;
  public $expiresIn;
  public $idToken;
  public $kind;
  public $localId;
  public $oauthAccessToken;
  public $oauthAuthorizationCode;
  public $oauthExpireIn;
  public $photoUrl;
  public $refreshToken;
  public $registered;

  public function setDisplayName($displayName)
  {
    $this->displayName = $displayName;
  }
  public function getDisplayName()
  {
    return $this->displayName;
  }
  public function setEmail($email)
  {
    $this->email = $email;
  }
  public function getEmail()
  {
    return $this->email;
  }
  public function setExpiresIn($expiresIn)
  {
    $this->expiresIn = $expiresIn;
  }
  public function getExpiresIn()
  {
    return $this->expiresIn;
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
  public function setLocalId($localId)
  {
    $this->localId = $localId;
  }
  public function getLocalId()
  {
    return $this->localId;
  }
  public function setOauthAccessToken($oauthAccessToken)
  {
    $this->oauthAccessToken = $oauthAccessToken;
  }
  public function getOauthAccessToken()
  {
    return $this->oauthAccessToken;
  }
  public function setOauthAuthorizationCode($oauthAuthorizationCode)
  {
    $this->oauthAuthorizationCode = $oauthAuthorizationCode;
  }
  public function getOauthAuthorizationCode()
  {
    return $this->oauthAuthorizationCode;
  }
  public function setOauthExpireIn($oauthExpireIn)
  {
    $this->oauthExpireIn = $oauthExpireIn;
  }
  public function getOauthExpireIn()
  {
    return $this->oauthExpireIn;
  }
  public function setPhotoUrl($photoUrl)
  {
    $this->photoUrl = $photoUrl;
  }
  public function getPhotoUrl()
  {
    return $this->photoUrl;
  }
  public function setRefreshToken($refreshToken)
  {
    $this->refreshToken = $refreshToken;
  }
  public function getRefreshToken()
  {
    return $this->refreshToken;
  }
  public function setRegistered($registered)
  {
    $this->registered = $registered;
  }
  public function getRegistered()
  {
    return $this->registered;
  }
}
