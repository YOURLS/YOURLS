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

class Google_Service_Analytics_RemarketingAudienceStateBasedAudienceDefinition extends Google_Model
{
  protected $excludeConditionsType = 'Google_Service_Analytics_RemarketingAudienceStateBasedAudienceDefinitionExcludeConditions';
  protected $excludeConditionsDataType = '';
  protected $includeConditionsType = 'Google_Service_Analytics_IncludeConditions';
  protected $includeConditionsDataType = '';

  /**
   * @param Google_Service_Analytics_RemarketingAudienceStateBasedAudienceDefinitionExcludeConditions
   */
  public function setExcludeConditions(Google_Service_Analytics_RemarketingAudienceStateBasedAudienceDefinitionExcludeConditions $excludeConditions)
  {
    $this->excludeConditions = $excludeConditions;
  }
  /**
   * @return Google_Service_Analytics_RemarketingAudienceStateBasedAudienceDefinitionExcludeConditions
   */
  public function getExcludeConditions()
  {
    return $this->excludeConditions;
  }
  /**
   * @param Google_Service_Analytics_IncludeConditions
   */
  public function setIncludeConditions(Google_Service_Analytics_IncludeConditions $includeConditions)
  {
    $this->includeConditions = $includeConditions;
  }
  /**
   * @return Google_Service_Analytics_IncludeConditions
   */
  public function getIncludeConditions()
  {
    return $this->includeConditions;
  }
}
