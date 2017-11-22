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

class Google_Service_Acceleratedmobilepageurl_AmpUrl extends Google_Model
{
  public $ampUrl;
  public $cdnAmpUrl;
  public $originalUrl;

  public function setAmpUrl($ampUrl)
  {
    $this->ampUrl = $ampUrl;
  }
  public function getAmpUrl()
  {
    return $this->ampUrl;
  }
  public function setCdnAmpUrl($cdnAmpUrl)
  {
    $this->cdnAmpUrl = $cdnAmpUrl;
  }
  public function getCdnAmpUrl()
  {
    return $this->cdnAmpUrl;
  }
  public function setOriginalUrl($originalUrl)
  {
    $this->originalUrl = $originalUrl;
  }
  public function getOriginalUrl()
  {
    return $this->originalUrl;
  }
}
