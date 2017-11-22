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

class Google_Service_Cloudbilling_PricingInfo extends Google_Model
{
  protected $aggregationInfoType = 'Google_Service_Cloudbilling_AggregationInfo';
  protected $aggregationInfoDataType = '';
  public $currencyConversionRate;
  public $effectiveTime;
  protected $pricingExpressionType = 'Google_Service_Cloudbilling_PricingExpression';
  protected $pricingExpressionDataType = '';
  public $summary;

  /**
   * @param Google_Service_Cloudbilling_AggregationInfo
   */
  public function setAggregationInfo(Google_Service_Cloudbilling_AggregationInfo $aggregationInfo)
  {
    $this->aggregationInfo = $aggregationInfo;
  }
  /**
   * @return Google_Service_Cloudbilling_AggregationInfo
   */
  public function getAggregationInfo()
  {
    return $this->aggregationInfo;
  }
  public function setCurrencyConversionRate($currencyConversionRate)
  {
    $this->currencyConversionRate = $currencyConversionRate;
  }
  public function getCurrencyConversionRate()
  {
    return $this->currencyConversionRate;
  }
  public function setEffectiveTime($effectiveTime)
  {
    $this->effectiveTime = $effectiveTime;
  }
  public function getEffectiveTime()
  {
    return $this->effectiveTime;
  }
  /**
   * @param Google_Service_Cloudbilling_PricingExpression
   */
  public function setPricingExpression(Google_Service_Cloudbilling_PricingExpression $pricingExpression)
  {
    $this->pricingExpression = $pricingExpression;
  }
  /**
   * @return Google_Service_Cloudbilling_PricingExpression
   */
  public function getPricingExpression()
  {
    return $this->pricingExpression;
  }
  public function setSummary($summary)
  {
    $this->summary = $summary;
  }
  public function getSummary()
  {
    return $this->summary;
  }
}
