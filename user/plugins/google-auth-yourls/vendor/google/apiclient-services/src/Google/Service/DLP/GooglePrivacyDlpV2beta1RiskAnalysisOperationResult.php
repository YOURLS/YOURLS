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

class Google_Service_DLP_GooglePrivacyDlpV2beta1RiskAnalysisOperationResult extends Google_Model
{
  protected $categoricalStatsResultType = 'Google_Service_DLP_GooglePrivacyDlpV2beta1CategoricalStatsResult';
  protected $categoricalStatsResultDataType = '';
  protected $kAnonymityResultType = 'Google_Service_DLP_GooglePrivacyDlpV2beta1KAnonymityResult';
  protected $kAnonymityResultDataType = '';
  protected $lDiversityResultType = 'Google_Service_DLP_GooglePrivacyDlpV2beta1LDiversityResult';
  protected $lDiversityResultDataType = '';
  protected $numericalStatsResultType = 'Google_Service_DLP_GooglePrivacyDlpV2beta1NumericalStatsResult';
  protected $numericalStatsResultDataType = '';

  /**
   * @param Google_Service_DLP_GooglePrivacyDlpV2beta1CategoricalStatsResult
   */
  public function setCategoricalStatsResult(Google_Service_DLP_GooglePrivacyDlpV2beta1CategoricalStatsResult $categoricalStatsResult)
  {
    $this->categoricalStatsResult = $categoricalStatsResult;
  }
  /**
   * @return Google_Service_DLP_GooglePrivacyDlpV2beta1CategoricalStatsResult
   */
  public function getCategoricalStatsResult()
  {
    return $this->categoricalStatsResult;
  }
  /**
   * @param Google_Service_DLP_GooglePrivacyDlpV2beta1KAnonymityResult
   */
  public function setKAnonymityResult(Google_Service_DLP_GooglePrivacyDlpV2beta1KAnonymityResult $kAnonymityResult)
  {
    $this->kAnonymityResult = $kAnonymityResult;
  }
  /**
   * @return Google_Service_DLP_GooglePrivacyDlpV2beta1KAnonymityResult
   */
  public function getKAnonymityResult()
  {
    return $this->kAnonymityResult;
  }
  /**
   * @param Google_Service_DLP_GooglePrivacyDlpV2beta1LDiversityResult
   */
  public function setLDiversityResult(Google_Service_DLP_GooglePrivacyDlpV2beta1LDiversityResult $lDiversityResult)
  {
    $this->lDiversityResult = $lDiversityResult;
  }
  /**
   * @return Google_Service_DLP_GooglePrivacyDlpV2beta1LDiversityResult
   */
  public function getLDiversityResult()
  {
    return $this->lDiversityResult;
  }
  /**
   * @param Google_Service_DLP_GooglePrivacyDlpV2beta1NumericalStatsResult
   */
  public function setNumericalStatsResult(Google_Service_DLP_GooglePrivacyDlpV2beta1NumericalStatsResult $numericalStatsResult)
  {
    $this->numericalStatsResult = $numericalStatsResult;
  }
  /**
   * @return Google_Service_DLP_GooglePrivacyDlpV2beta1NumericalStatsResult
   */
  public function getNumericalStatsResult()
  {
    return $this->numericalStatsResult;
  }
}
