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

class Google_Service_AndroidManagement_ComplianceRule extends Google_Model
{
  protected $apiLevelConditionType = 'Google_Service_AndroidManagement_ApiLevelCondition';
  protected $apiLevelConditionDataType = '';
  public $disableApps;
  protected $nonComplianceDetailConditionType = 'Google_Service_AndroidManagement_NonComplianceDetailCondition';
  protected $nonComplianceDetailConditionDataType = '';

  /**
   * @param Google_Service_AndroidManagement_ApiLevelCondition
   */
  public function setApiLevelCondition(Google_Service_AndroidManagement_ApiLevelCondition $apiLevelCondition)
  {
    $this->apiLevelCondition = $apiLevelCondition;
  }
  /**
   * @return Google_Service_AndroidManagement_ApiLevelCondition
   */
  public function getApiLevelCondition()
  {
    return $this->apiLevelCondition;
  }
  public function setDisableApps($disableApps)
  {
    $this->disableApps = $disableApps;
  }
  public function getDisableApps()
  {
    return $this->disableApps;
  }
  /**
   * @param Google_Service_AndroidManagement_NonComplianceDetailCondition
   */
  public function setNonComplianceDetailCondition(Google_Service_AndroidManagement_NonComplianceDetailCondition $nonComplianceDetailCondition)
  {
    $this->nonComplianceDetailCondition = $nonComplianceDetailCondition;
  }
  /**
   * @return Google_Service_AndroidManagement_NonComplianceDetailCondition
   */
  public function getNonComplianceDetailCondition()
  {
    return $this->nonComplianceDetailCondition;
  }
}
