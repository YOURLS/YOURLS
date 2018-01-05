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

class Google_Service_CloudTasks_AppEngineQueueConfig extends Google_Model
{
  protected $appEngineRoutingOverrideType = 'Google_Service_CloudTasks_AppEngineRouting';
  protected $appEngineRoutingOverrideDataType = '';

  /**
   * @param Google_Service_CloudTasks_AppEngineRouting
   */
  public function setAppEngineRoutingOverride(Google_Service_CloudTasks_AppEngineRouting $appEngineRoutingOverride)
  {
    $this->appEngineRoutingOverride = $appEngineRoutingOverride;
  }
  /**
   * @return Google_Service_CloudTasks_AppEngineRouting
   */
  public function getAppEngineRoutingOverride()
  {
    return $this->appEngineRoutingOverride;
  }
}
