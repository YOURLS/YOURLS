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

class Google_Service_Dfareporting_CreativeClickThroughUrl extends Google_Model
{
  public $computedClickThroughUrl;
  public $customClickThroughUrl;
  public $landingPageId;

  public function setComputedClickThroughUrl($computedClickThroughUrl)
  {
    $this->computedClickThroughUrl = $computedClickThroughUrl;
  }
  public function getComputedClickThroughUrl()
  {
    return $this->computedClickThroughUrl;
  }
  public function setCustomClickThroughUrl($customClickThroughUrl)
  {
    $this->customClickThroughUrl = $customClickThroughUrl;
  }
  public function getCustomClickThroughUrl()
  {
    return $this->customClickThroughUrl;
  }
  public function setLandingPageId($landingPageId)
  {
    $this->landingPageId = $landingPageId;
  }
  public function getLandingPageId()
  {
    return $this->landingPageId;
  }
}
