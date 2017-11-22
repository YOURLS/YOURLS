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

class Google_Service_Books_VolumeAccessInfoEpub extends Google_Model
{
  public $acsTokenLink;
  public $downloadLink;
  public $isAvailable;

  public function setAcsTokenLink($acsTokenLink)
  {
    $this->acsTokenLink = $acsTokenLink;
  }
  public function getAcsTokenLink()
  {
    return $this->acsTokenLink;
  }
  public function setDownloadLink($downloadLink)
  {
    $this->downloadLink = $downloadLink;
  }
  public function getDownloadLink()
  {
    return $this->downloadLink;
  }
  public function setIsAvailable($isAvailable)
  {
    $this->isAvailable = $isAvailable;
  }
  public function getIsAvailable()
  {
    return $this->isAvailable;
  }
}
