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

class Google_Service_PlayMovies_Order extends Google_Collection
{
  protected $collection_key = 'countries';
  public $approvedTime;
  public $channelId;
  public $channelName;
  public $countries;
  public $customId;
  public $earliestAvailStartTime;
  public $episodeName;
  public $legacyPriority;
  public $name;
  public $normalizedPriority;
  public $orderId;
  public $orderedTime;
  public $pphName;
  public $priority;
  public $receivedTime;
  public $rejectionNote;
  public $seasonName;
  public $showName;
  public $status;
  public $statusDetail;
  public $studioName;
  public $type;
  public $videoId;

  public function setApprovedTime($approvedTime)
  {
    $this->approvedTime = $approvedTime;
  }
  public function getApprovedTime()
  {
    return $this->approvedTime;
  }
  public function setChannelId($channelId)
  {
    $this->channelId = $channelId;
  }
  public function getChannelId()
  {
    return $this->channelId;
  }
  public function setChannelName($channelName)
  {
    $this->channelName = $channelName;
  }
  public function getChannelName()
  {
    return $this->channelName;
  }
  public function setCountries($countries)
  {
    $this->countries = $countries;
  }
  public function getCountries()
  {
    return $this->countries;
  }
  public function setCustomId($customId)
  {
    $this->customId = $customId;
  }
  public function getCustomId()
  {
    return $this->customId;
  }
  public function setEarliestAvailStartTime($earliestAvailStartTime)
  {
    $this->earliestAvailStartTime = $earliestAvailStartTime;
  }
  public function getEarliestAvailStartTime()
  {
    return $this->earliestAvailStartTime;
  }
  public function setEpisodeName($episodeName)
  {
    $this->episodeName = $episodeName;
  }
  public function getEpisodeName()
  {
    return $this->episodeName;
  }
  public function setLegacyPriority($legacyPriority)
  {
    $this->legacyPriority = $legacyPriority;
  }
  public function getLegacyPriority()
  {
    return $this->legacyPriority;
  }
  public function setName($name)
  {
    $this->name = $name;
  }
  public function getName()
  {
    return $this->name;
  }
  public function setNormalizedPriority($normalizedPriority)
  {
    $this->normalizedPriority = $normalizedPriority;
  }
  public function getNormalizedPriority()
  {
    return $this->normalizedPriority;
  }
  public function setOrderId($orderId)
  {
    $this->orderId = $orderId;
  }
  public function getOrderId()
  {
    return $this->orderId;
  }
  public function setOrderedTime($orderedTime)
  {
    $this->orderedTime = $orderedTime;
  }
  public function getOrderedTime()
  {
    return $this->orderedTime;
  }
  public function setPphName($pphName)
  {
    $this->pphName = $pphName;
  }
  public function getPphName()
  {
    return $this->pphName;
  }
  public function setPriority($priority)
  {
    $this->priority = $priority;
  }
  public function getPriority()
  {
    return $this->priority;
  }
  public function setReceivedTime($receivedTime)
  {
    $this->receivedTime = $receivedTime;
  }
  public function getReceivedTime()
  {
    return $this->receivedTime;
  }
  public function setRejectionNote($rejectionNote)
  {
    $this->rejectionNote = $rejectionNote;
  }
  public function getRejectionNote()
  {
    return $this->rejectionNote;
  }
  public function setSeasonName($seasonName)
  {
    $this->seasonName = $seasonName;
  }
  public function getSeasonName()
  {
    return $this->seasonName;
  }
  public function setShowName($showName)
  {
    $this->showName = $showName;
  }
  public function getShowName()
  {
    return $this->showName;
  }
  public function setStatus($status)
  {
    $this->status = $status;
  }
  public function getStatus()
  {
    return $this->status;
  }
  public function setStatusDetail($statusDetail)
  {
    $this->statusDetail = $statusDetail;
  }
  public function getStatusDetail()
  {
    return $this->statusDetail;
  }
  public function setStudioName($studioName)
  {
    $this->studioName = $studioName;
  }
  public function getStudioName()
  {
    return $this->studioName;
  }
  public function setType($type)
  {
    $this->type = $type;
  }
  public function getType()
  {
    return $this->type;
  }
  public function setVideoId($videoId)
  {
    $this->videoId = $videoId;
  }
  public function getVideoId()
  {
    return $this->videoId;
  }
}
