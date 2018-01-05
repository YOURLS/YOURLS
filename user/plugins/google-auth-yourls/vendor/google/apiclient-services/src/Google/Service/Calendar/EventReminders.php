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

class Google_Service_Calendar_EventReminders extends Google_Collection
{
  protected $collection_key = 'overrides';
  protected $overridesType = 'Google_Service_Calendar_EventReminder';
  protected $overridesDataType = 'array';
  public $useDefault;

  /**
   * @param Google_Service_Calendar_EventReminder
   */
  public function setOverrides($overrides)
  {
    $this->overrides = $overrides;
  }
  /**
   * @return Google_Service_Calendar_EventReminder
   */
  public function getOverrides()
  {
    return $this->overrides;
  }
  public function setUseDefault($useDefault)
  {
    $this->useDefault = $useDefault;
  }
  public function getUseDefault()
  {
    return $this->useDefault;
  }
}
