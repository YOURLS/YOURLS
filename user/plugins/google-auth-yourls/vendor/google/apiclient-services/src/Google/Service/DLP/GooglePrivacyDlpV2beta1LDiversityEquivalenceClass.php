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

class Google_Service_DLP_GooglePrivacyDlpV2beta1LDiversityEquivalenceClass extends Google_Collection
{
  protected $collection_key = 'topSensitiveValues';
  public $equivalenceClassSize;
  public $numDistinctSensitiveValues;
  protected $quasiIdsValuesType = 'Google_Service_DLP_GooglePrivacyDlpV2beta1Value';
  protected $quasiIdsValuesDataType = 'array';
  protected $topSensitiveValuesType = 'Google_Service_DLP_GooglePrivacyDlpV2beta1ValueFrequency';
  protected $topSensitiveValuesDataType = 'array';

  public function setEquivalenceClassSize($equivalenceClassSize)
  {
    $this->equivalenceClassSize = $equivalenceClassSize;
  }
  public function getEquivalenceClassSize()
  {
    return $this->equivalenceClassSize;
  }
  public function setNumDistinctSensitiveValues($numDistinctSensitiveValues)
  {
    $this->numDistinctSensitiveValues = $numDistinctSensitiveValues;
  }
  public function getNumDistinctSensitiveValues()
  {
    return $this->numDistinctSensitiveValues;
  }
  /**
   * @param Google_Service_DLP_GooglePrivacyDlpV2beta1Value
   */
  public function setQuasiIdsValues($quasiIdsValues)
  {
    $this->quasiIdsValues = $quasiIdsValues;
  }
  /**
   * @return Google_Service_DLP_GooglePrivacyDlpV2beta1Value
   */
  public function getQuasiIdsValues()
  {
    return $this->quasiIdsValues;
  }
  /**
   * @param Google_Service_DLP_GooglePrivacyDlpV2beta1ValueFrequency
   */
  public function setTopSensitiveValues($topSensitiveValues)
  {
    $this->topSensitiveValues = $topSensitiveValues;
  }
  /**
   * @return Google_Service_DLP_GooglePrivacyDlpV2beta1ValueFrequency
   */
  public function getTopSensitiveValues()
  {
    return $this->topSensitiveValues;
  }
}
