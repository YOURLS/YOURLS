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

class Google_Service_Directory_Token extends Google_Collection
{
  protected $collection_key = 'scopes';
  public $anonymous;
  public $clientId;
  public $displayText;
  public $etag;
  public $kind;
  public $nativeApp;
  public $scopes;
  public $userKey;

  public function setAnonymous($anonymous)
  {
    $this->anonymous = $anonymous;
  }
  public function getAnonymous()
  {
    return $this->anonymous;
  }
  public function setClientId($clientId)
  {
    $this->clientId = $clientId;
  }
  public function getClientId()
  {
    return $this->clientId;
  }
  public function setDisplayText($displayText)
  {
    $this->displayText = $displayText;
  }
  public function getDisplayText()
  {
    return $this->displayText;
  }
  public function setEtag($etag)
  {
    $this->etag = $etag;
  }
  public function getEtag()
  {
    return $this->etag;
  }
  public function setKind($kind)
  {
    $this->kind = $kind;
  }
  public function getKind()
  {
    return $this->kind;
  }
  public function setNativeApp($nativeApp)
  {
    $this->nativeApp = $nativeApp;
  }
  public function getNativeApp()
  {
    return $this->nativeApp;
  }
  public function setScopes($scopes)
  {
    $this->scopes = $scopes;
  }
  public function getScopes()
  {
    return $this->scopes;
  }
  public function setUserKey($userKey)
  {
    $this->userKey = $userKey;
  }
  public function getUserKey()
  {
    return $this->userKey;
  }
}
