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

class Google_Service_YouTube_LiveBroadcastSnippet extends Google_Model
{
  public $actualEndTime;
  public $actualStartTime;
  public $channelId;
  public $description;
  public $isDefaultBroadcast;
  public $liveChatId;
  public $publishedAt;
  public $scheduledEndTime;
  public $scheduledStartTime;
  protected $thumbnailsType = 'Google_Service_YouTube_ThumbnailDetails';
  protected $thumbnailsDataType = '';
  public $title;

  public function setActualEndTime($actualEndTime)
  {
    $this->actualEndTime = $actualEndTime;
  }
  public function getActualEndTime()
  {
    return $this->actualEndTime;
  }
  public function setActualStartTime($actualStartTime)
  {
    $this->actualStartTime = $actualStartTime;
  }
  public function getActualStartTime()
  {
    return $this->actualStartTime;
  }
  public function setChannelId($channelId)
  {
    $this->channelId = $channelId;
  }
  public function getChannelId()
  {
    return $this->channelId;
  }
  public function setDescription($description)
  {
    $this->description = $description;
  }
  public function getDescription()
  {
    return $this->description;
  }
  public function setIsDefaultBroadcast($isDefaultBroadcast)
  {
    $this->isDefaultBroadcast = $isDefaultBroadcast;
  }
  public function getIsDefaultBroadcast()
  {
    return $this->isDefaultBroadcast;
  }
  public function setLiveChatId($liveChatId)
  {
    $this->liveChatId = $liveChatId;
  }
  public function getLiveChatId()
  {
    return $this->liveChatId;
  }
  public function setPublishedAt($publishedAt)
  {
    $this->publishedAt = $publishedAt;
  }
  public function getPublishedAt()
  {
    return $this->publishedAt;
  }
  public function setScheduledEndTime($scheduledEndTime)
  {
    $this->scheduledEndTime = $scheduledEndTime;
  }
  public function getScheduledEndTime()
  {
    return $this->scheduledEndTime;
  }
  public function setScheduledStartTime($scheduledStartTime)
  {
    $this->scheduledStartTime = $scheduledStartTime;
  }
  public function getScheduledStartTime()
  {
    return $this->scheduledStartTime;
  }
  /**
   * @param Google_Service_YouTube_ThumbnailDetails
   */
  public function setThumbnails(Google_Service_YouTube_ThumbnailDetails $thumbnails)
  {
    $this->thumbnails = $thumbnails;
  }
  /**
   * @return Google_Service_YouTube_ThumbnailDetails
   */
  public function getThumbnails()
  {
    return $this->thumbnails;
  }
  public function setTitle($title)
  {
    $this->title = $title;
  }
  public function getTitle()
  {
    return $this->title;
  }
}
