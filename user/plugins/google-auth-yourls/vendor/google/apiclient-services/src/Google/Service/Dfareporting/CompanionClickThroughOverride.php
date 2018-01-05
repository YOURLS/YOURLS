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

class Google_Service_Dfareporting_CompanionClickThroughOverride extends Google_Model
{
  protected $clickThroughUrlType = 'Google_Service_Dfareporting_ClickThroughUrl';
  protected $clickThroughUrlDataType = '';
  public $creativeId;

  /**
   * @param Google_Service_Dfareporting_ClickThroughUrl
   */
  public function setClickThroughUrl(Google_Service_Dfareporting_ClickThroughUrl $clickThroughUrl)
  {
    $this->clickThroughUrl = $clickThroughUrl;
  }
  /**
   * @return Google_Service_Dfareporting_ClickThroughUrl
   */
  public function getClickThroughUrl()
  {
    return $this->clickThroughUrl;
  }
  public function setCreativeId($creativeId)
  {
    $this->creativeId = $creativeId;
  }
  public function getCreativeId()
  {
    return $this->creativeId;
  }
}
