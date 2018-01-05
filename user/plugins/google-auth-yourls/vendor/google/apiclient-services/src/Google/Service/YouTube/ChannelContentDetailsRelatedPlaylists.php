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

class Google_Service_YouTube_ChannelContentDetailsRelatedPlaylists extends Google_Model
{
  public $favorites;
  public $likes;
  public $uploads;
  public $watchHistory;
  public $watchLater;

  public function setFavorites($favorites)
  {
    $this->favorites = $favorites;
  }
  public function getFavorites()
  {
    return $this->favorites;
  }
  public function setLikes($likes)
  {
    $this->likes = $likes;
  }
  public function getLikes()
  {
    return $this->likes;
  }
  public function setUploads($uploads)
  {
    $this->uploads = $uploads;
  }
  public function getUploads()
  {
    return $this->uploads;
  }
  public function setWatchHistory($watchHistory)
  {
    $this->watchHistory = $watchHistory;
  }
  public function getWatchHistory()
  {
    return $this->watchHistory;
  }
  public function setWatchLater($watchLater)
  {
    $this->watchLater = $watchLater;
  }
  public function getWatchLater()
  {
    return $this->watchLater;
  }
}
