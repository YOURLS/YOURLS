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

class Google_Service_Storage_BucketCors extends Google_Collection
{
  protected $collection_key = 'responseHeader';
  public $maxAgeSeconds;
  public $method;
  public $origin;
  public $responseHeader;

  public function setMaxAgeSeconds($maxAgeSeconds)
  {
    $this->maxAgeSeconds = $maxAgeSeconds;
  }
  public function getMaxAgeSeconds()
  {
    return $this->maxAgeSeconds;
  }
  public function setMethod($method)
  {
    $this->method = $method;
  }
  public function getMethod()
  {
    return $this->method;
  }
  public function setOrigin($origin)
  {
    $this->origin = $origin;
  }
  public function getOrigin()
  {
    return $this->origin;
  }
  public function setResponseHeader($responseHeader)
  {
    $this->responseHeader = $responseHeader;
  }
  public function getResponseHeader()
  {
    return $this->responseHeader;
  }
}
