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

class Google_Service_Games_ParticipantResult extends Google_Model
{
  public $kind;
  public $participantId;
  public $placing;
  public $result;

  public function setKind($kind)
  {
    $this->kind = $kind;
  }
  public function getKind()
  {
    return $this->kind;
  }
  public function setParticipantId($participantId)
  {
    $this->participantId = $participantId;
  }
  public function getParticipantId()
  {
    return $this->participantId;
  }
  public function setPlacing($placing)
  {
    $this->placing = $placing;
  }
  public function getPlacing()
  {
    return $this->placing;
  }
  public function setResult($result)
  {
    $this->result = $result;
  }
  public function getResult()
  {
    return $this->result;
  }
}
