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

class Google_Service_Container_NodeManagement extends Google_Model
{
  public $autoRepair;
  public $autoUpgrade;
  protected $upgradeOptionsType = 'Google_Service_Container_AutoUpgradeOptions';
  protected $upgradeOptionsDataType = '';

  public function setAutoRepair($autoRepair)
  {
    $this->autoRepair = $autoRepair;
  }
  public function getAutoRepair()
  {
    return $this->autoRepair;
  }
  public function setAutoUpgrade($autoUpgrade)
  {
    $this->autoUpgrade = $autoUpgrade;
  }
  public function getAutoUpgrade()
  {
    return $this->autoUpgrade;
  }
  /**
   * @param Google_Service_Container_AutoUpgradeOptions
   */
  public function setUpgradeOptions(Google_Service_Container_AutoUpgradeOptions $upgradeOptions)
  {
    $this->upgradeOptions = $upgradeOptions;
  }
  /**
   * @return Google_Service_Container_AutoUpgradeOptions
   */
  public function getUpgradeOptions()
  {
    return $this->upgradeOptions;
  }
}
