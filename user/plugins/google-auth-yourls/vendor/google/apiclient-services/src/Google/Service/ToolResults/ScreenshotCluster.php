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

class Google_Service_ToolResults_ScreenshotCluster extends Google_Collection
{
  protected $collection_key = 'screens';
  public $activity;
  public $clusterId;
  protected $keyScreenType = 'Google_Service_ToolResults_Screen';
  protected $keyScreenDataType = '';
  protected $screensType = 'Google_Service_ToolResults_Screen';
  protected $screensDataType = 'array';

  public function setActivity($activity)
  {
    $this->activity = $activity;
  }
  public function getActivity()
  {
    return $this->activity;
  }
  public function setClusterId($clusterId)
  {
    $this->clusterId = $clusterId;
  }
  public function getClusterId()
  {
    return $this->clusterId;
  }
  /**
   * @param Google_Service_ToolResults_Screen
   */
  public function setKeyScreen(Google_Service_ToolResults_Screen $keyScreen)
  {
    $this->keyScreen = $keyScreen;
  }
  /**
   * @return Google_Service_ToolResults_Screen
   */
  public function getKeyScreen()
  {
    return $this->keyScreen;
  }
  /**
   * @param Google_Service_ToolResults_Screen
   */
  public function setScreens($screens)
  {
    $this->screens = $screens;
  }
  /**
   * @return Google_Service_ToolResults_Screen
   */
  public function getScreens()
  {
    return $this->screens;
  }
}
