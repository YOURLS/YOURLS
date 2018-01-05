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

class Google_Service_ServiceConsumerManagement_Quota extends Google_Collection
{
  protected $collection_key = 'metricRules';
  protected $limitsType = 'Google_Service_ServiceConsumerManagement_QuotaLimit';
  protected $limitsDataType = 'array';
  protected $metricRulesType = 'Google_Service_ServiceConsumerManagement_MetricRule';
  protected $metricRulesDataType = 'array';

  /**
   * @param Google_Service_ServiceConsumerManagement_QuotaLimit
   */
  public function setLimits($limits)
  {
    $this->limits = $limits;
  }
  /**
   * @return Google_Service_ServiceConsumerManagement_QuotaLimit
   */
  public function getLimits()
  {
    return $this->limits;
  }
  /**
   * @param Google_Service_ServiceConsumerManagement_MetricRule
   */
  public function setMetricRules($metricRules)
  {
    $this->metricRules = $metricRules;
  }
  /**
   * @return Google_Service_ServiceConsumerManagement_MetricRule
   */
  public function getMetricRules()
  {
    return $this->metricRules;
  }
}
