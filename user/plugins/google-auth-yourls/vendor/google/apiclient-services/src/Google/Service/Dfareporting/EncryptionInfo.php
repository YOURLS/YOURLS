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

class Google_Service_Dfareporting_EncryptionInfo extends Google_Model
{
  public $encryptionEntityId;
  public $encryptionEntityType;
  public $encryptionSource;
  public $kind;

  public function setEncryptionEntityId($encryptionEntityId)
  {
    $this->encryptionEntityId = $encryptionEntityId;
  }
  public function getEncryptionEntityId()
  {
    return $this->encryptionEntityId;
  }
  public function setEncryptionEntityType($encryptionEntityType)
  {
    $this->encryptionEntityType = $encryptionEntityType;
  }
  public function getEncryptionEntityType()
  {
    return $this->encryptionEntityType;
  }
  public function setEncryptionSource($encryptionSource)
  {
    $this->encryptionSource = $encryptionSource;
  }
  public function getEncryptionSource()
  {
    return $this->encryptionSource;
  }
  public function setKind($kind)
  {
    $this->kind = $kind;
  }
  public function getKind()
  {
    return $this->kind;
  }
}
