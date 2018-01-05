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

class Google_Service_Games_PushToken extends Google_Model
{
  public $clientRevision;
  protected $idType = 'Google_Service_Games_PushTokenId';
  protected $idDataType = '';
  public $kind;
  public $language;

  public function setClientRevision($clientRevision)
  {
    $this->clientRevision = $clientRevision;
  }
  public function getClientRevision()
  {
    return $this->clientRevision;
  }
  /**
   * @param Google_Service_Games_PushTokenId
   */
  public function setId(Google_Service_Games_PushTokenId $id)
  {
    $this->id = $id;
  }
  /**
   * @return Google_Service_Games_PushTokenId
   */
  public function getId()
  {
    return $this->id;
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
}
