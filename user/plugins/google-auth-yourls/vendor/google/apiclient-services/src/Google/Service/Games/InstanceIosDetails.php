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

class Google_Service_Games_InstanceIosDetails extends Google_Model
{
  public $bundleIdentifier;
  public $itunesAppId;
  public $kind;
  public $preferredForIpad;
  public $preferredForIphone;
  public $supportIpad;
  public $supportIphone;

  public function setBundleIdentifier($bundleIdentifier)
  {
    $this->bundleIdentifier = $bundleIdentifier;
  }
  public function getBundleIdentifier()
  {
    return $this->bundleIdentifier;
  }
  public function setItunesAppId($itunesAppId)
  {
    $this->itunesAppId = $itunesAppId;
  }
  public function getItunesAppId()
  {
    return $this->itunesAppId;
  }
  public function setKind($kind)
  {
    $this->kind = $kind;
  }
  public function getKind()
  {
    return $this->kind;
  }
  public function setPreferredForIpad($preferredForIpad)
  {
    $this->preferredForIpad = $preferredForIpad;
  }
  public function getPreferredForIpad()
  {
    return $this->preferredForIpad;
  }
  public function setPreferredForIphone($preferredForIphone)
  {
    $this->preferredForIphone = $preferredForIphone;
  }
  public function getPreferredForIphone()
  {
    return $this->preferredForIphone;
  }
  public function setSupportIpad($supportIpad)
  {
    $this->supportIpad = $supportIpad;
  }
  public function getSupportIpad()
  {
    return $this->supportIpad;
  }
  public function setSupportIphone($supportIphone)
  {
    $this->supportIphone = $supportIphone;
  }
  public function getSupportIphone()
  {
    return $this->supportIphone;
  }
}
