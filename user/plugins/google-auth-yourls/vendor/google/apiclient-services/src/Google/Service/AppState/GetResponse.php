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

class Google_Service_AppState_GetResponse extends Google_Model
{
  public $currentStateVersion;
  public $data;
  public $kind;
  public $stateKey;

  public function setCurrentStateVersion($currentStateVersion)
  {
    $this->currentStateVersion = $currentStateVersion;
  }
  public function getCurrentStateVersion()
  {
    return $this->currentStateVersion;
  }
  public function setData($data)
  {
    $this->data = $data;
  }
  public function getData()
  {
    return $this->data;
  }
  public function setKind($kind)
  {
    $this->kind = $kind;
  }
  public function getKind()
  {
    return $this->kind;
  }
  public function setStateKey($stateKey)
  {
    $this->stateKey = $stateKey;
  }
  public function getStateKey()
  {
    return $this->stateKey;
  }
}
