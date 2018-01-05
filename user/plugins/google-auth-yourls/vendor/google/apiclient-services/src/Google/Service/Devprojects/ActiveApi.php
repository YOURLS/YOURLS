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

class Google_Service_Devprojects_ActiveApi extends Google_Model
{
  public $apiId;
  public $apiName;
  public $deactivable;
  public $kind;

  public function setApiId($apiId)
  {
    $this->apiId = $apiId;
  }
  public function getApiId()
  {
    return $this->apiId;
  }
  public function setApiName($apiName)
  {
    $this->apiName = $apiName;
  }
  public function getApiName()
  {
    return $this->apiName;
  }
  public function setDeactivable($deactivable)
  {
    $this->deactivable = $deactivable;
  }
  public function getDeactivable()
  {
    return $this->deactivable;
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
