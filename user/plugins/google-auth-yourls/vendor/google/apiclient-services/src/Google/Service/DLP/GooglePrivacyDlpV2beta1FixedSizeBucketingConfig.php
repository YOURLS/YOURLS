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

class Google_Service_DLP_GooglePrivacyDlpV2beta1FixedSizeBucketingConfig extends Google_Model
{
  public $bucketSize;
  protected $lowerBoundType = 'Google_Service_DLP_GooglePrivacyDlpV2beta1Value';
  protected $lowerBoundDataType = '';
  protected $upperBoundType = 'Google_Service_DLP_GooglePrivacyDlpV2beta1Value';
  protected $upperBoundDataType = '';

  public function setBucketSize($bucketSize)
  {
    $this->bucketSize = $bucketSize;
  }
  public function getBucketSize()
  {
    return $this->bucketSize;
  }
  /**
   * @param Google_Service_DLP_GooglePrivacyDlpV2beta1Value
   */
  public function setLowerBound(Google_Service_DLP_GooglePrivacyDlpV2beta1Value $lowerBound)
  {
    $this->lowerBound = $lowerBound;
  }
  /**
   * @return Google_Service_DLP_GooglePrivacyDlpV2beta1Value
   */
  public function getLowerBound()
  {
    return $this->lowerBound;
  }
  /**
   * @param Google_Service_DLP_GooglePrivacyDlpV2beta1Value
   */
  public function setUpperBound(Google_Service_DLP_GooglePrivacyDlpV2beta1Value $upperBound)
  {
    $this->upperBound = $upperBound;
  }
  /**
   * @return Google_Service_DLP_GooglePrivacyDlpV2beta1Value
   */
  public function getUpperBound()
  {
    return $this->upperBound;
  }
}
