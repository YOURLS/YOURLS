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

class Google_Service_AndroidPublisher_ApkBinary extends Google_Model
{
  public $sha1;
  public $sha256;

  public function setSha1($sha1)
  {
    $this->sha1 = $sha1;
  }
  public function getSha1()
  {
    return $this->sha1;
  }
  public function setSha256($sha256)
  {
    $this->sha256 = $sha256;
  }
  public function getSha256()
  {
    return $this->sha256;
  }
}
