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

class Google_Service_YouTube_VideoStatus extends Google_Model
{
  public $embeddable;
  public $failureReason;
  public $license;
  public $privacyStatus;
  public $publicStatsViewable;
  public $publishAt;
  public $rejectionReason;
  public $uploadStatus;

  public function setEmbeddable($embeddable)
  {
    $this->embeddable = $embeddable;
  }
  public function getEmbeddable()
  {
    return $this->embeddable;
  }
  public function setFailureReason($failureReason)
  {
    $this->failureReason = $failureReason;
  }
  public function getFailureReason()
  {
    return $this->failureReason;
  }
  public function setLicense($license)
  {
    $this->license = $license;
  }
  public function getLicense()
  {
    return $this->license;
  }
  public function setPrivacyStatus($privacyStatus)
  {
    $this->privacyStatus = $privacyStatus;
  }
  public function getPrivacyStatus()
  {
    return $this->privacyStatus;
  }
  public function setPublicStatsViewable($publicStatsViewable)
  {
    $this->publicStatsViewable = $publicStatsViewable;
  }
  public function getPublicStatsViewable()
  {
    return $this->publicStatsViewable;
  }
  public function setPublishAt($publishAt)
  {
    $this->publishAt = $publishAt;
  }
  public function getPublishAt()
  {
    return $this->publishAt;
  }
  public function setRejectionReason($rejectionReason)
  {
    $this->rejectionReason = $rejectionReason;
  }
  public function getRejectionReason()
  {
    return $this->rejectionReason;
  }
  public function setUploadStatus($uploadStatus)
  {
    $this->uploadStatus = $uploadStatus;
  }
  public function getUploadStatus()
  {
    return $this->uploadStatus;
  }
}
