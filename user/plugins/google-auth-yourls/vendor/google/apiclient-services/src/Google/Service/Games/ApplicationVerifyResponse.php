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

class Google_Service_Games_ApplicationVerifyResponse extends Google_Model
{
  protected $internal_gapi_mappings = array(
        "alternatePlayerId" => "alternate_player_id",
        "playerId" => "player_id",
  );
  public $alternatePlayerId;
  public $kind;
  public $playerId;

  public function setAlternatePlayerId($alternatePlayerId)
  {
    $this->alternatePlayerId = $alternatePlayerId;
  }
  public function getAlternatePlayerId()
  {
    return $this->alternatePlayerId;
  }
  public function setKind($kind)
  {
    $this->kind = $kind;
  }
  public function getKind()
  {
    return $this->kind;
  }
  public function setPlayerId($playerId)
  {
    $this->playerId = $playerId;
  }
  public function getPlayerId()
  {
    return $this->playerId;
  }
}
