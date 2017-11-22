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

class Google_Service_Devprojects_TosesCheckResponse extends Google_Collection
{
  protected $collection_key = 'pending';
  protected $acceptedType = 'Google_Service_Devprojects_Acceptance';
  protected $acceptedDataType = 'array';
  public $kind;
  protected $pendingType = 'Google_Service_Devprojects_AcceptanceRequired';
  protected $pendingDataType = 'array';

  public function setAccepted($accepted)
  {
    $this->accepted = $accepted;
  }
  public function getAccepted()
  {
    return $this->accepted;
  }
  public function setKind($kind)
  {
    $this->kind = $kind;
  }
  public function getKind()
  {
    return $this->kind;
  }
  public function setPending($pending)
  {
    $this->pending = $pending;
  }
  public function getPending()
  {
    return $this->pending;
  }
}
