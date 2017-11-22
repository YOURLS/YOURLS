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

class Google_Service_YouTube_PlaylistItemContentDetails extends Google_Model
{
  public $endAt;
  public $note;
  public $startAt;
  public $videoId;
  public $videoPublishedAt;

  public function setEndAt($endAt)
  {
    $this->endAt = $endAt;
  }
  public function getEndAt()
  {
    return $this->endAt;
  }
  public function setNote($note)
  {
    $this->note = $note;
  }
  public function getNote()
  {
    return $this->note;
  }
  public function setStartAt($startAt)
  {
    $this->startAt = $startAt;
  }
  public function getStartAt()
  {
    return $this->startAt;
  }
  public function setVideoId($videoId)
  {
    $this->videoId = $videoId;
  }
  public function getVideoId()
  {
    return $this->videoId;
  }
  public function setVideoPublishedAt($videoPublishedAt)
  {
    $this->videoPublishedAt = $videoPublishedAt;
  }
  public function getVideoPublishedAt()
  {
    return $this->videoPublishedAt;
  }
}
