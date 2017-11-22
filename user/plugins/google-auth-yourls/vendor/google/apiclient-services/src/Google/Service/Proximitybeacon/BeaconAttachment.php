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

class Google_Service_Proximitybeacon_BeaconAttachment extends Google_Model
{
  public $attachmentName;
  public $creationTimeMs;
  public $data;
  public $maxDistanceMeters;
  public $namespacedType;

  public function setAttachmentName($attachmentName)
  {
    $this->attachmentName = $attachmentName;
  }
  public function getAttachmentName()
  {
    return $this->attachmentName;
  }
  public function setCreationTimeMs($creationTimeMs)
  {
    $this->creationTimeMs = $creationTimeMs;
  }
  public function getCreationTimeMs()
  {
    return $this->creationTimeMs;
  }
  public function setData($data)
  {
    $this->data = $data;
  }
  public function getData()
  {
    return $this->data;
  }
  public function setMaxDistanceMeters($maxDistanceMeters)
  {
    $this->maxDistanceMeters = $maxDistanceMeters;
  }
  public function getMaxDistanceMeters()
  {
    return $this->maxDistanceMeters;
  }
  public function setNamespacedType($namespacedType)
  {
    $this->namespacedType = $namespacedType;
  }
  public function getNamespacedType()
  {
    return $this->namespacedType;
  }
}
