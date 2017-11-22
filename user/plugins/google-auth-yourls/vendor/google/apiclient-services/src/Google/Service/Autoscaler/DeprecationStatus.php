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

class Google_Service_Autoscaler_DeprecationStatus extends Google_Model
{
  public $deleted;
  public $deprecated;
  public $obsolete;
  public $replacement;
  public $state;

  public function setDeleted($deleted)
  {
    $this->deleted = $deleted;
  }
  public function getDeleted()
  {
    return $this->deleted;
  }
  public function setDeprecated($deprecated)
  {
    $this->deprecated = $deprecated;
  }
  public function getDeprecated()
  {
    return $this->deprecated;
  }
  public function setObsolete($obsolete)
  {
    $this->obsolete = $obsolete;
  }
  public function getObsolete()
  {
    return $this->obsolete;
  }
  public function setReplacement($replacement)
  {
    $this->replacement = $replacement;
  }
  public function getReplacement()
  {
    return $this->replacement;
  }
  public function setState($state)
  {
    $this->state = $state;
  }
  public function getState()
  {
    return $this->state;
  }
}
