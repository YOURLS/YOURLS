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

class Google_Service_Monitoring_Point extends Google_Model
{
  protected $intervalType = 'Google_Service_Monitoring_TimeInterval';
  protected $intervalDataType = '';
  protected $valueType = 'Google_Service_Monitoring_TypedValue';
  protected $valueDataType = '';

  /**
   * @param Google_Service_Monitoring_TimeInterval
   */
  public function setInterval(Google_Service_Monitoring_TimeInterval $interval)
  {
    $this->interval = $interval;
  }
  /**
   * @return Google_Service_Monitoring_TimeInterval
   */
  public function getInterval()
  {
    return $this->interval;
  }
  /**
   * @param Google_Service_Monitoring_TypedValue
   */
  public function setValue(Google_Service_Monitoring_TypedValue $value)
  {
    $this->value = $value;
  }
  /**
   * @return Google_Service_Monitoring_TypedValue
   */
  public function getValue()
  {
    return $this->value;
  }
}
