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

class Google_Service_Devprojects_TosesAcceptResponse extends Google_Collection
{
  protected $collection_key = 'denied';
  protected $confirmedType = 'Google_Service_Devprojects_Acceptance';
  protected $confirmedDataType = 'array';
  protected $deniedType = 'Google_Service_Devprojects_AcceptanceDenied';
  protected $deniedDataType = 'array';
  public $kind;

  public function setConfirmed($confirmed)
  {
    $this->confirmed = $confirmed;
  }
  public function getConfirmed()
  {
    return $this->confirmed;
  }
  public function setDenied($denied)
  {
    $this->denied = $denied;
  }
  public function getDenied()
  {
    return $this->denied;
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
