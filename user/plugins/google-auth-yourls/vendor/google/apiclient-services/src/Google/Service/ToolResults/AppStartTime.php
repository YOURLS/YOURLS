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

class Google_Service_ToolResults_AppStartTime extends Google_Model
{
  protected $fullyDrawnTimeType = 'Google_Service_ToolResults_Duration';
  protected $fullyDrawnTimeDataType = '';
  protected $initialDisplayTimeType = 'Google_Service_ToolResults_Duration';
  protected $initialDisplayTimeDataType = '';

  /**
   * @param Google_Service_ToolResults_Duration
   */
  public function setFullyDrawnTime(Google_Service_ToolResults_Duration $fullyDrawnTime)
  {
    $this->fullyDrawnTime = $fullyDrawnTime;
  }
  /**
   * @return Google_Service_ToolResults_Duration
   */
  public function getFullyDrawnTime()
  {
    return $this->fullyDrawnTime;
  }
  /**
   * @param Google_Service_ToolResults_Duration
   */
  public function setInitialDisplayTime(Google_Service_ToolResults_Duration $initialDisplayTime)
  {
    $this->initialDisplayTime = $initialDisplayTime;
  }
  /**
   * @return Google_Service_ToolResults_Duration
   */
  public function getInitialDisplayTime()
  {
    return $this->initialDisplayTime;
  }
}
