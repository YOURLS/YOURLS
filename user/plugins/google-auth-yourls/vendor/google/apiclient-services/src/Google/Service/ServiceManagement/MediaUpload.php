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

class Google_Service_ServiceManagement_MediaUpload extends Google_Collection
{
  protected $collection_key = 'mimeTypes';
  public $completeNotification;
  public $dropzone;
  public $enabled;
  public $maxSize;
  public $mimeTypes;
  public $progressNotification;
  public $startNotification;
  public $uploadService;

  public function setCompleteNotification($completeNotification)
  {
    $this->completeNotification = $completeNotification;
  }
  public function getCompleteNotification()
  {
    return $this->completeNotification;
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
  public function setMaxSize($maxSize)
  {
    $this->maxSize = $maxSize;
  }
  public function getMaxSize()
  {
    return $this->maxSize;
  }
  public function setMimeTypes($mimeTypes)
  {
    $this->mimeTypes = $mimeTypes;
  }
  public function getMimeTypes()
  {
    return $this->mimeTypes;
  }
  public function setProgressNotification($progressNotification)
  {
    $this->progressNotification = $progressNotification;
  }
  public function getProgressNotification()
  {
    return $this->progressNotification;
  }
  public function setStartNotification($startNotification)
  {
    $this->startNotification = $startNotification;
  }
  public function getStartNotification()
  {
    return $this->startNotification;
  }
  public function setUploadService($uploadService)
  {
    $this->uploadService = $uploadService;
  }
  public function getUploadService()
  {
    return $this->uploadService;
  }
}
