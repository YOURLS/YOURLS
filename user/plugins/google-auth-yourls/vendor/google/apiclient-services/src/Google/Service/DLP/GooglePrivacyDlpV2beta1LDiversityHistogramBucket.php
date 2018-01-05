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

class Google_Service_DLP_GooglePrivacyDlpV2beta1LDiversityHistogramBucket extends Google_Collection
{
  protected $collection_key = 'bucketValues';
  public $bucketSize;
  protected $bucketValuesType = 'Google_Service_DLP_GooglePrivacyDlpV2beta1LDiversityEquivalenceClass';
  protected $bucketValuesDataType = 'array';
  public $sensitiveValueFrequencyLowerBound;
  public $sensitiveValueFrequencyUpperBound;

  public function setBucketSize($bucketSize)
  {
    $this->bucketSize = $bucketSize;
  }
  public function getBucketSize()
  {
    return $this->bucketSize;
  }
  /**
   * @param Google_Service_DLP_GooglePrivacyDlpV2beta1LDiversityEquivalenceClass
   */
  public function setBucketValues($bucketValues)
  {
    $this->bucketValues = $bucketValues;
  }
  /**
   * @return Google_Service_DLP_GooglePrivacyDlpV2beta1LDiversityEquivalenceClass
   */
  public function getBucketValues()
  {
    return $this->bucketValues;
  }
  public function setSensitiveValueFrequencyLowerBound($sensitiveValueFrequencyLowerBound)
  {
    $this->sensitiveValueFrequencyLowerBound = $sensitiveValueFrequencyLowerBound;
  }
  public function getSensitiveValueFrequencyLowerBound()
  {
    return $this->sensitiveValueFrequencyLowerBound;
  }
  public function setSensitiveValueFrequencyUpperBound($sensitiveValueFrequencyUpperBound)
  {
    $this->sensitiveValueFrequencyUpperBound = $sensitiveValueFrequencyUpperBound;
  }
  public function getSensitiveValueFrequencyUpperBound()
  {
    return $this->sensitiveValueFrequencyUpperBound;
  }
}
