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

class Google_Service_IdentityToolkit_VerifyAssertionResponse extends Google_Collection
{
  protected $collection_key = 'verifiedProvider';
  public $action;
  public $appInstallationUrl;
  public $appScheme;
  public $context;
  public $dateOfBirth;
  public $displayName;
  public $email;
  public $emailRecycled;
  public $emailVerified;
  public $errorMessage;
  public $expiresIn;
  public $federatedId;
  public $firstName;
  public $fullName;
  public $idToken;
  public $inputEmail;
  public $isNewUser;
  public $kind;
  public $language;
  public $lastName;
  public $localId;
  public $needConfirmation;
  public $needEmail;
  public $nickName;
  public $oauthAccessToken;
  public $oauthAuthorizationCode;
  public $oauthExpireIn;
  public $oauthIdToken;
  public $oauthRequestToken;
  public $oauthScope;
  public $oauthTokenSecret;
  public $originalEmail;
  public $photoUrl;
  public $providerId;
  public $rawUserInfo;
  public $refreshToken;
  public $screenName;
  public $timeZone;
  public $verifiedProvider;

  public function setAction($action)
  {
    $this->action = $action;
  }
  public function getAction()
  {
    return $this->action;
  }
  public function setAppInstallationUrl($appInstallationUrl)
  {
    $this->appInstallationUrl = $appInstallationUrl;
  }
  public function getAppInstallationUrl()
  {
    return $this->appInstallationUrl;
  }
  public function setAppScheme($appScheme)
  {
    $this->appScheme = $appScheme;
  }
  public function getAppScheme()
  {
    return $this->appScheme;
  }
  public function setContext($context)
  {
    $this->context = $context;
  }
  public function getContext()
  {
    return $this->context;
  }
  public function setDateOfBirth($dateOfBirth)
  {
    $this->dateOfBirth = $dateOfBirth;
  }
  public function getDateOfBirth()
  {
    return $this->dateOfBirth;
  }
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
  public function setEmailRecycled($emailRecycled)
  {
    $this->emailRecycled = $emailRecycled;
  }
  public function getEmailRecycled()
  {
    return $this->emailRecycled;
  }
  public function setEmailVerified($emailVerified)
  {
    $this->emailVerified = $emailVerified;
  }
  public function getEmailVerified()
  {
    return $this->emailVerified;
  }
  public function setErrorMessage($errorMessage)
  {
    $this->errorMessage = $errorMessage;
  }
  public function getErrorMessage()
  {
    return $this->errorMessage;
  }
  public function setExpiresIn($expiresIn)
  {
    $this->expiresIn = $expiresIn;
  }
  public function getExpiresIn()
  {
    return $this->expiresIn;
  }
  public function setFederatedId($federatedId)
  {
    $this->federatedId = $federatedId;
  }
  public function getFederatedId()
  {
    return $this->federatedId;
  }
  public function setFirstName($firstName)
  {
    $this->firstName = $firstName;
  }
  public function getFirstName()
  {
    return $this->firstName;
  }
  public function setFullName($fullName)
  {
    $this->fullName = $fullName;
  }
  public function getFullName()
  {
    return $this->fullName;
  }
  public function setIdToken($idToken)
  {
    $this->idToken = $idToken;
  }
  public function getIdToken()
  {
    return $this->idToken;
  }
  public function setInputEmail($inputEmail)
  {
    $this->inputEmail = $inputEmail;
  }
  public function getInputEmail()
  {
    return $this->inputEmail;
  }
  public function setIsNewUser($isNewUser)
  {
    $this->isNewUser = $isNewUser;
  }
  public function getIsNewUser()
  {
    return $this->isNewUser;
  }
  public function setKind($kind)
  {
    $this->kind = $kind;
  }
  public function getKind()
  {
    return $this->kind;
  }
  public function setLanguage($language)
  {
    $this->language = $language;
  }
  public function getLanguage()
  {
    return $this->language;
  }
  public function setLastName($lastName)
  {
    $this->lastName = $lastName;
  }
  public function getLastName()
  {
    return $this->lastName;
  }
  public function setLocalId($localId)
  {
    $this->localId = $localId;
  }
  public function getLocalId()
  {
    return $this->localId;
  }
  public function setNeedConfirmation($needConfirmation)
  {
    $this->needConfirmation = $needConfirmation;
  }
  public function getNeedConfirmation()
  {
    return $this->needConfirmation;
  }
  public function setNeedEmail($needEmail)
  {
    $this->needEmail = $needEmail;
  }
  public function getNeedEmail()
  {
    return $this->needEmail;
  }
  public function setNickName($nickName)
  {
    $this->nickName = $nickName;
  }
  public function getNickName()
  {
    return $this->nickName;
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
  public function setOauthIdToken($oauthIdToken)
  {
    $this->oauthIdToken = $oauthIdToken;
  }
  public function getOauthIdToken()
  {
    return $this->oauthIdToken;
  }
  public function setOauthRequestToken($oauthRequestToken)
  {
    $this->oauthRequestToken = $oauthRequestToken;
  }
  public function getOauthRequestToken()
  {
    return $this->oauthRequestToken;
  }
  public function setOauthScope($oauthScope)
  {
    $this->oauthScope = $oauthScope;
  }
  public function getOauthScope()
  {
    return $this->oauthScope;
  }
  public function setOauthTokenSecret($oauthTokenSecret)
  {
    $this->oauthTokenSecret = $oauthTokenSecret;
  }
  public function getOauthTokenSecret()
  {
    return $this->oauthTokenSecret;
  }
  public function setOriginalEmail($originalEmail)
  {
    $this->originalEmail = $originalEmail;
  }
  public function getOriginalEmail()
  {
    return $this->originalEmail;
  }
  public function setPhotoUrl($photoUrl)
  {
    $this->photoUrl = $photoUrl;
  }
  public function getPhotoUrl()
  {
    return $this->photoUrl;
  }
  public function setProviderId($providerId)
  {
    $this->providerId = $providerId;
  }
  public function getProviderId()
  {
    return $this->providerId;
  }
  public function setRawUserInfo($rawUserInfo)
  {
    $this->rawUserInfo = $rawUserInfo;
  }
  public function getRawUserInfo()
  {
    return $this->rawUserInfo;
  }
  public function setRefreshToken($refreshToken)
  {
    $this->refreshToken = $refreshToken;
  }
  public function getRefreshToken()
  {
    return $this->refreshToken;
  }
  public function setScreenName($screenName)
  {
    $this->screenName = $screenName;
  }
  public function getScreenName()
  {
    return $this->screenName;
  }
  public function setTimeZone($timeZone)
  {
    $this->timeZone = $timeZone;
  }
  public function getTimeZone()
  {
    return $this->timeZone;
  }
  public function setVerifiedProvider($verifiedProvider)
  {
    $this->verifiedProvider = $verifiedProvider;
  }
  public function getVerifiedProvider()
  {
    return $this->verifiedProvider;
  }
}
