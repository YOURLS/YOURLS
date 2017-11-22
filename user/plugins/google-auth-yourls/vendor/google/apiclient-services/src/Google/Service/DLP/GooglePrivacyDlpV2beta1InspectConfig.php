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

class Google_Service_DLP_GooglePrivacyDlpV2beta1InspectConfig extends Google_Collection
{
  protected $collection_key = 'infoTypes';
  protected $customInfoTypesType = 'Google_Service_DLP_GooglePrivacyDlpV2beta1CustomInfoType';
  protected $customInfoTypesDataType = 'array';
  public $excludeTypes;
  public $includeQuote;
  protected $infoTypeLimitsType = 'Google_Service_DLP_GooglePrivacyDlpV2beta1InfoTypeLimit';
  protected $infoTypeLimitsDataType = 'array';
  protected $infoTypesType = 'Google_Service_DLP_GooglePrivacyDlpV2beta1InfoType';
  protected $infoTypesDataType = 'array';
  public $maxFindings;
  public $minLikelihood;

  /**
   * @param Google_Service_DLP_GooglePrivacyDlpV2beta1CustomInfoType
   */
  public function setCustomInfoTypes($customInfoTypes)
  {
    $this->customInfoTypes = $customInfoTypes;
  }
  /**
   * @return Google_Service_DLP_GooglePrivacyDlpV2beta1CustomInfoType
   */
  public function getCustomInfoTypes()
  {
    return $this->customInfoTypes;
  }
  public function setExcludeTypes($excludeTypes)
  {
    $this->excludeTypes = $excludeTypes;
  }
  public function getExcludeTypes()
  {
    return $this->excludeTypes;
  }
  public function setIncludeQuote($includeQuote)
  {
    $this->includeQuote = $includeQuote;
  }
  public function getIncludeQuote()
  {
    return $this->includeQuote;
  }
  /**
   * @param Google_Service_DLP_GooglePrivacyDlpV2beta1InfoTypeLimit
   */
  public function setInfoTypeLimits($infoTypeLimits)
  {
    $this->infoTypeLimits = $infoTypeLimits;
  }
  /**
   * @return Google_Service_DLP_GooglePrivacyDlpV2beta1InfoTypeLimit
   */
  public function getInfoTypeLimits()
  {
    return $this->infoTypeLimits;
  }
  /**
   * @param Google_Service_DLP_GooglePrivacyDlpV2beta1InfoType
   */
  public function setInfoTypes($infoTypes)
  {
    $this->infoTypes = $infoTypes;
  }
  /**
   * @return Google_Service_DLP_GooglePrivacyDlpV2beta1InfoType
   */
  public function getInfoTypes()
  {
    return $this->infoTypes;
  }
  public function setMaxFindings($maxFindings)
  {
    $this->maxFindings = $maxFindings;
  }
  public function getMaxFindings()
  {
    return $this->maxFindings;
  }
  public function setMinLikelihood($minLikelihood)
  {
    $this->minLikelihood = $minLikelihood;
  }
  public function getMinLikelihood()
  {
    return $this->minLikelihood;
  }
}
