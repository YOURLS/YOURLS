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

class Google_Service_Devprojects_ClientInfo extends Google_Collection
{
  protected $collection_key = 'redirectUri';
  public $authType;
  public $container;
  protected $installedAppInfoType = 'Google_Service_Devprojects_InstalledAppInfo';
  protected $installedAppInfoDataType = '';
  public $kind;
  public $name;
  public $postMessageOrigin;
  public $publicCertUrl;
  public $publicKeyName;
  public $redirectUri;
  public $robotEmail;
  public $type;

  public function setAuthType($authType)
  {
    $this->authType = $authType;
  }
  public function getAuthType()
  {
    return $this->authType;
  }
  public function setContainer($container)
  {
    $this->container = $container;
  }
  public function getContainer()
  {
    return $this->container;
  }
  public function setInstalledAppInfo(Google_Service_Devprojects_InstalledAppInfo $installedAppInfo)
  {
    $this->installedAppInfo = $installedAppInfo;
  }
  public function getInstalledAppInfo()
  {
    return $this->installedAppInfo;
  }
  public function setKind($kind)
  {
    $this->kind = $kind;
  }
  public function getKind()
  {
    return $this->kind;
  }
  public function setName($name)
  {
    $this->name = $name;
  }
  public function getName()
  {
    return $this->name;
  }
  public function setPostMessageOrigin($postMessageOrigin)
  {
    $this->postMessageOrigin = $postMessageOrigin;
  }
  public function getPostMessageOrigin()
  {
    return $this->postMessageOrigin;
  }
  public function setPublicCertUrl($publicCertUrl)
  {
    $this->publicCertUrl = $publicCertUrl;
  }
  public function getPublicCertUrl()
  {
    return $this->publicCertUrl;
  }
  public function setPublicKeyName($publicKeyName)
  {
    $this->publicKeyName = $publicKeyName;
  }
  public function getPublicKeyName()
  {
    return $this->publicKeyName;
  }
  public function setRedirectUri($redirectUri)
  {
    $this->redirectUri = $redirectUri;
  }
  public function getRedirectUri()
  {
    return $this->redirectUri;
  }
  public function setRobotEmail($robotEmail)
  {
    $this->robotEmail = $robotEmail;
  }
  public function getRobotEmail()
  {
    return $this->robotEmail;
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
