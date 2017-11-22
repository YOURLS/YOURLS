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

class Google_Service_IdentityToolkit_UserInfo extends Google_Collection
{
  protected $collection_key = 'providerUserInfo';
  public $createdAt;
  public $customAttributes;
  public $customAuth;
  public $disabled;
  public $displayName;
  public $email;
  public $emailVerified;
  public $lastLoginAt;
  public $localId;
  public $passwordHash;
  public $passwordUpdatedAt;
  public $phoneNumber;
  public $photoUrl;
  protected $providerUserInfoType = 'Google_Service_IdentityToolkit_UserInfoProviderUserInfo';
  protected $providerUserInfoDataType = 'array';
  public $rawPassword;
  public $salt;
  public $screenName;
  public $validSince;
  public $version;

  public function setCreatedAt($createdAt)
  {
    $this->createdAt = $createdAt;
  }
  public function getCreatedAt()
  {
    return $this->createdAt;
  }
  public function setCustomAttributes($customAttributes)
  {
    $this->customAttributes = $customAttributes;
  }
  public function getCustomAttributes()
  {
    return $this->customAttributes;
  }
  public function setCustomAuth($customAuth)
  {
    $this->customAuth = $customAuth;
  }
  public function getCustomAuth()
  {
    return $this->customAuth;
  }
  public function setDisabled($disabled)
  {
    $this->disabled = $disabled;
  }
  public function getDisabled()
  {
    return $this->disabled;
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
  public function setEmailVerified($emailVerified)
  {
    $this->emailVerified = $emailVerified;
  }
  public function getEmailVerified()
  {
    return $this->emailVerified;
  }
  public function setLastLoginAt($lastLoginAt)
  {
    $this->lastLoginAt = $lastLoginAt;
  }
  public function getLastLoginAt()
  {
    return $this->lastLoginAt;
  }
  public function setLocalId($localId)
  {
    $this->localId = $localId;
  }
  public function getLocalId()
  {
    return $this->localId;
  }
  public function setPasswordHash($passwordHash)
  {
    $this->passwordHash = $passwordHash;
  }
  public function getPasswordHash()
  {
    return $this->passwordHash;
  }
  public function setPasswordUpdatedAt($passwordUpdatedAt)
  {
    $this->passwordUpdatedAt = $passwordUpdatedAt;
  }
  public function getPasswordUpdatedAt()
  {
    return $this->passwordUpdatedAt;
  }
  public function setPhoneNumber($phoneNumber)
  {
    $this->phoneNumber = $phoneNumber;
  }
  public function getPhoneNumber()
  {
    return $this->phoneNumber;
  }
  public function setPhotoUrl($photoUrl)
  {
    $this->photoUrl = $photoUrl;
  }
  public function getPhotoUrl()
  {
    return $this->photoUrl;
  }
  /**
   * @param Google_Service_IdentityToolkit_UserInfoProviderUserInfo
   */
  public function setProviderUserInfo($providerUserInfo)
  {
    $this->providerUserInfo = $providerUserInfo;
  }
  /**
   * @return Google_Service_IdentityToolkit_UserInfoProviderUserInfo
   */
  public function getProviderUserInfo()
  {
    return $this->providerUserInfo;
  }
  public function setRawPassword($rawPassword)
  {
    $this->rawPassword = $rawPassword;
  }
  public function getRawPassword()
  {
    return $this->rawPassword;
  }
  public function setSalt($salt)
  {
    $this->salt = $salt;
  }
  public function getSalt()
  {
    return $this->salt;
  }
  public function setScreenName($screenName)
  {
    $this->screenName = $screenName;
  }
  public function getScreenName()
  {
    return $this->screenName;
  }
  public function setValidSince($validSince)
  {
    $this->validSince = $validSince;
  }
  public function getValidSince()
  {
    return $this->validSince;
  }
  public function setVersion($version)
  {
    $this->version = $version;
  }
  public function getVersion()
  {
    return $this->version;
  }
}
