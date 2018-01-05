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

class Google_Service_Vision_SafeSearchAnnotation extends Google_Model
{
  public $adult;
  public $medical;
  public $spoof;
  public $violence;

  public function setAdult($adult)
  {
    $this->adult = $adult;
  }
  public function getAdult()
  {
    return $this->adult;
  }
  public function setMedical($medical)
  {
    $this->medical = $medical;
  }
  public function getMedical()
  {
    return $this->medical;
  }
  public function setSpoof($spoof)
  {
    $this->spoof = $spoof;
  }
  public function getSpoof()
  {
    return $this->spoof;
  }
  public function setViolence($violence)
  {
    $this->violence = $violence;
  }
  public function getViolence()
  {
    return $this->violence;
  }
}
