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

class Google_Service_AndroidPublisher_Listing extends Google_Model
{
  public $fullDescription;
  public $language;
  public $shortDescription;
  public $title;
  public $video;

  public function setFullDescription($fullDescription)
  {
    $this->fullDescription = $fullDescription;
  }
  public function getFullDescription()
  {
    return $this->fullDescription;
  }
  public function setLanguage($language)
  {
    $this->language = $language;
  }
  public function getLanguage()
  {
    return $this->language;
  }
  public function setShortDescription($shortDescription)
  {
    $this->shortDescription = $shortDescription;
  }
  public function getShortDescription()
  {
    return $this->shortDescription;
  }
  public function setTitle($title)
  {
    $this->title = $title;
  }
  public function getTitle()
  {
    return $this->title;
  }
  public function setVideo($video)
  {
    $this->video = $video;
  }
  public function getVideo()
  {
    return $this->video;
  }
}
