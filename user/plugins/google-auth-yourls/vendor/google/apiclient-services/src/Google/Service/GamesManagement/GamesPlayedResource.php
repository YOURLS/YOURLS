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

class Google_Service_GamesManagement_GamesPlayedResource extends Google_Model
{
  public $autoMatched;
  public $timeMillis;

  public function setAutoMatched($autoMatched)
  {
    $this->autoMatched = $autoMatched;
  }
  public function getAutoMatched()
  {
    return $this->autoMatched;
  }
  public function setTimeMillis($timeMillis)
  {
    $this->timeMillis = $timeMillis;
  }
  public function getTimeMillis()
  {
    return $this->timeMillis;
  }
}
