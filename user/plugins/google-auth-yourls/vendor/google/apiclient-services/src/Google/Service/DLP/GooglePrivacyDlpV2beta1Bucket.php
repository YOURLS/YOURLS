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

class Google_Service_DLP_GooglePrivacyDlpV2beta1Bucket extends Google_Model
{
  protected $maxType = 'Google_Service_DLP_GooglePrivacyDlpV2beta1Value';
  protected $maxDataType = '';
  protected $minType = 'Google_Service_DLP_GooglePrivacyDlpV2beta1Value';
  protected $minDataType = '';
  protected $replacementValueType = 'Google_Service_DLP_GooglePrivacyDlpV2beta1Value';
  protected $replacementValueDataType = '';

  /**
   * @param Google_Service_DLP_GooglePrivacyDlpV2beta1Value
   */
  public function setMax(Google_Service_DLP_GooglePrivacyDlpV2beta1Value $max)
  {
    $this->max = $max;
  }
  /**
   * @return Google_Service_DLP_GooglePrivacyDlpV2beta1Value
   */
  public function getMax()
  {
    return $this->max;
  }
  /**
   * @param Google_Service_DLP_GooglePrivacyDlpV2beta1Value
   */
  public function setMin(Google_Service_DLP_GooglePrivacyDlpV2beta1Value $min)
  {
    $this->min = $min;
  }
  /**
   * @return Google_Service_DLP_GooglePrivacyDlpV2beta1Value
   */
  public function getMin()
  {
    return $this->min;
  }
  /**
   * @param Google_Service_DLP_GooglePrivacyDlpV2beta1Value
   */
  public function setReplacementValue(Google_Service_DLP_GooglePrivacyDlpV2beta1Value $replacementValue)
  {
    $this->replacementValue = $replacementValue;
  }
  /**
   * @return Google_Service_DLP_GooglePrivacyDlpV2beta1Value
   */
  public function getReplacementValue()
  {
    return $this->replacementValue;
  }
}
