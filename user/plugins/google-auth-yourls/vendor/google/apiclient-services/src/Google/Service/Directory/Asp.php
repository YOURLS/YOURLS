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

class Google_Service_Directory_Asp extends Google_Model
{
  public $codeId;
  public $creationTime;
  public $etag;
  public $kind;
  public $lastTimeUsed;
  public $name;
  public $userKey;

  public function setCodeId($codeId)
  {
    $this->codeId = $codeId;
  }
  public function getCodeId()
  {
    return $this->codeId;
  }
  public function setCreationTime($creationTime)
  {
    $this->creationTime = $creationTime;
  }
  public function getCreationTime()
  {
    return $this->creationTime;
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
  public function setLastTimeUsed($lastTimeUsed)
  {
    $this->lastTimeUsed = $lastTimeUsed;
  }
  public function getLastTimeUsed()
  {
    return $this->lastTimeUsed;
  }
  public function setName($name)
  {
    $this->name = $name;
  }
  public function getName()
  {
    return $this->name;
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
