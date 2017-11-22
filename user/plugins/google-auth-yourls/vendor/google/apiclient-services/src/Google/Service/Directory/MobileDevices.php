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

class Google_Service_Directory_MobileDevices extends Google_Collection
{
  protected $collection_key = 'mobiledevices';
  public $etag;
  public $kind;
  protected $mobiledevicesType = 'Google_Service_Directory_MobileDevice';
  protected $mobiledevicesDataType = 'array';
  public $nextPageToken;

  public function setEtag($etag)
  {
    $this->etag = $etag;
  }
  public function getEtag()
  {
    return $this->etag;
  }
  public function setKind($kind)
  {
    $this->kind = $kind;
  }
  public function getKind()
  {
    return $this->kind;
  }
  /**
   * @param Google_Service_Directory_MobileDevice
   */
  public function setMobiledevices($mobiledevices)
  {
    $this->mobiledevices = $mobiledevices;
  }
  /**
   * @return Google_Service_Directory_MobileDevice
   */
  public function getMobiledevices()
  {
    return $this->mobiledevices;
  }
  public function setNextPageToken($nextPageToken)
  {
    $this->nextPageToken = $nextPageToken;
  }
  public function getNextPageToken()
  {
    return $this->nextPageToken;
  }
}
