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

class Google_Service_YouTube_ChannelStatistics extends Google_Model
{
  public $commentCount;
  public $hiddenSubscriberCount;
  public $subscriberCount;
  public $videoCount;
  public $viewCount;

  public function setCommentCount($commentCount)
  {
    $this->commentCount = $commentCount;
  }
  public function getCommentCount()
  {
    return $this->commentCount;
  }
  public function setHiddenSubscriberCount($hiddenSubscriberCount)
  {
    $this->hiddenSubscriberCount = $hiddenSubscriberCount;
  }
  public function getHiddenSubscriberCount()
  {
    return $this->hiddenSubscriberCount;
  }
  public function setSubscriberCount($subscriberCount)
  {
    $this->subscriberCount = $subscriberCount;
  }
  public function getSubscriberCount()
  {
    return $this->subscriberCount;
  }
  public function setVideoCount($videoCount)
  {
    $this->videoCount = $videoCount;
  }
  public function getVideoCount()
  {
    return $this->videoCount;
  }
  public function setViewCount($viewCount)
  {
    $this->viewCount = $viewCount;
  }
  public function getViewCount()
  {
    return $this->viewCount;
  }
}
