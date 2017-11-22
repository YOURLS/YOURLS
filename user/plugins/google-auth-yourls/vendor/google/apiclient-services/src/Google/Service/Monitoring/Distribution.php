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

class Google_Service_Monitoring_Distribution extends Google_Collection
{
  protected $collection_key = 'bucketCounts';
  public $bucketCounts;
  protected $bucketOptionsType = 'Google_Service_Monitoring_BucketOptions';
  protected $bucketOptionsDataType = '';
  public $count;
  public $mean;
  protected $rangeType = 'Google_Service_Monitoring_Range';
  protected $rangeDataType = '';
  public $sumOfSquaredDeviation;

  public function setBucketCounts($bucketCounts)
  {
    $this->bucketCounts = $bucketCounts;
  }
  public function getBucketCounts()
  {
    return $this->bucketCounts;
  }
  /**
   * @param Google_Service_Monitoring_BucketOptions
   */
  public function setBucketOptions(Google_Service_Monitoring_BucketOptions $bucketOptions)
  {
    $this->bucketOptions = $bucketOptions;
  }
  /**
   * @return Google_Service_Monitoring_BucketOptions
   */
  public function getBucketOptions()
  {
    return $this->bucketOptions;
  }
  public function setCount($count)
  {
    $this->count = $count;
  }
  public function getCount()
  {
    return $this->count;
  }
  public function setMean($mean)
  {
    $this->mean = $mean;
  }
  public function getMean()
  {
    return $this->mean;
  }
  /**
   * @param Google_Service_Monitoring_Range
   */
  public function setRange(Google_Service_Monitoring_Range $range)
  {
    $this->range = $range;
  }
  /**
   * @return Google_Service_Monitoring_Range
   */
  public function getRange()
  {
    return $this->range;
  }
  public function setSumOfSquaredDeviation($sumOfSquaredDeviation)
  {
    $this->sumOfSquaredDeviation = $sumOfSquaredDeviation;
  }
  public function getSumOfSquaredDeviation()
  {
    return $this->sumOfSquaredDeviation;
  }
}
