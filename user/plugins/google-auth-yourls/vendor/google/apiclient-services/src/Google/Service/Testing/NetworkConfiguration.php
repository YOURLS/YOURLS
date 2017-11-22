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

class Google_Service_Testing_NetworkConfiguration extends Google_Model
{
  protected $downRuleType = 'Google_Service_Testing_TrafficRule';
  protected $downRuleDataType = '';
  public $id;
  protected $upRuleType = 'Google_Service_Testing_TrafficRule';
  protected $upRuleDataType = '';

  /**
   * @param Google_Service_Testing_TrafficRule
   */
  public function setDownRule(Google_Service_Testing_TrafficRule $downRule)
  {
    $this->downRule = $downRule;
  }
  /**
   * @return Google_Service_Testing_TrafficRule
   */
  public function getDownRule()
  {
    return $this->downRule;
  }
  public function setId($id)
  {
    $this->id = $id;
  }
  public function getId()
  {
    return $this->id;
  }
  /**
   * @param Google_Service_Testing_TrafficRule
   */
  public function setUpRule(Google_Service_Testing_TrafficRule $upRule)
  {
    $this->upRule = $upRule;
  }
  /**
   * @return Google_Service_Testing_TrafficRule
   */
  public function getUpRule()
  {
    return $this->upRule;
  }
}
