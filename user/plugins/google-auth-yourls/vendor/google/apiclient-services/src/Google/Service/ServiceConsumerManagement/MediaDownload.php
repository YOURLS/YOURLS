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

class Google_Service_ServiceConsumerManagement_MediaDownload extends Google_Model
{
  public $completeNotification;
  public $downloadService;
  public $dropzone;
  public $enabled;
  public $maxDirectDownloadSize;
  public $useDirectDownload;

  public function setCompleteNotification($completeNotification)
  {
    $this->completeNotification = $completeNotification;
  }
  public function getCompleteNotification()
  {
    return $this->completeNotification;
  }
  public function setDownloadService($downloadService)
  {
    $this->downloadService = $downloadService;
  }
  public function getDownloadService()
  {
    return $this->downloadService;
  }
  public function setDropzone($dropzone)
  {
    $this->dropzone = $dropzone;
  }
  public function getDropzone()
  {
    return $this->dropzone;
  }
  public function setEnabled($enabled)
  {
    $this->enabled = $enabled;
  }
  public function getEnabled()
  {
    return $this->enabled;
  }
  public function setMaxDirectDownloadSize($maxDirectDownloadSize)
  {
    $this->maxDirectDownloadSize = $maxDirectDownloadSize;
  }
  public function getMaxDirectDownloadSize()
  {
    return $this->maxDirectDownloadSize;
  }
  public function setUseDirectDownload($useDirectDownload)
  {
    $this->useDirectDownload = $useDirectDownload;
  }
  public function getUseDirectDownload()
  {
    return $this->useDirectDownload;
  }
}
