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

class Google_Service_Dfareporting_AdBlockingConfiguration extends Google_Model
{
  public $clickThroughUrl;
  public $creativeBundleId;
  public $enabled;
  public $overrideClickThroughUrl;

  public function setClickThroughUrl($clickThroughUrl)
  {
    $this->clickThroughUrl = $clickThroughUrl;
  }
  public function getClickThroughUrl()
  {
    return $this->clickThroughUrl;
  }
  public function setCreativeBundleId($creativeBundleId)
  {
    $this->creativeBundleId = $creativeBundleId;
  }
  public function getCreativeBundleId()
  {
    return $this->creativeBundleId;
  }
  public function setEnabled($enabled)
  {
    $this->enabled = $enabled;
  }
  public function getEnabled()
  {
    return $this->enabled;
  }
  public function setOverrideClickThroughUrl($overrideClickThroughUrl)
  {
    $this->overrideClickThroughUrl = $overrideClickThroughUrl;
  }
  public function getOverrideClickThroughUrl()
  {
    return $this->overrideClickThroughUrl;
  }
}
