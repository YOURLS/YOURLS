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

class Google_Service_Slides_Link extends Google_Model
{
  public $pageObjectId;
  public $relativeLink;
  public $slideIndex;
  public $url;

  public function setPageObjectId($pageObjectId)
  {
    $this->pageObjectId = $pageObjectId;
  }
  public function getPageObjectId()
  {
    return $this->pageObjectId;
  }
  public function setRelativeLink($relativeLink)
  {
    $this->relativeLink = $relativeLink;
  }
  public function getRelativeLink()
  {
    return $this->relativeLink;
  }
  public function setSlideIndex($slideIndex)
  {
    $this->slideIndex = $slideIndex;
  }
  public function getSlideIndex()
  {
    return $this->slideIndex;
  }
  public function setUrl($url)
  {
    $this->url = $url;
  }
  public function getUrl()
  {
    return $this->url;
  }
}
