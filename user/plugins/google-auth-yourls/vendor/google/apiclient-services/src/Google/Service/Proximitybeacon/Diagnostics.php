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

class Google_Service_Proximitybeacon_Diagnostics extends Google_Collection
{
  protected $collection_key = 'alerts';
  public $alerts;
  public $beaconName;
  protected $estimatedLowBatteryDateType = 'Google_Service_Proximitybeacon_Date';
  protected $estimatedLowBatteryDateDataType = '';

  public function setAlerts($alerts)
  {
    $this->alerts = $alerts;
  }
  public function getAlerts()
  {
    return $this->alerts;
  }
  public function setBeaconName($beaconName)
  {
    $this->beaconName = $beaconName;
  }
  public function getBeaconName()
  {
    return $this->beaconName;
  }
  /**
   * @param Google_Service_Proximitybeacon_Date
   */
  public function setEstimatedLowBatteryDate(Google_Service_Proximitybeacon_Date $estimatedLowBatteryDate)
  {
    $this->estimatedLowBatteryDate = $estimatedLowBatteryDate;
  }
  /**
   * @return Google_Service_Proximitybeacon_Date
   */
  public function getEstimatedLowBatteryDate()
  {
    return $this->estimatedLowBatteryDate;
  }
}
