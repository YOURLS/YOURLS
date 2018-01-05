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

class Google_Service_DLP_GooglePrivacyDlpV2beta1PrimitiveTransformation extends Google_Model
{
  protected $bucketingConfigType = 'Google_Service_DLP_GooglePrivacyDlpV2beta1BucketingConfig';
  protected $bucketingConfigDataType = '';
  protected $characterMaskConfigType = 'Google_Service_DLP_GooglePrivacyDlpV2beta1CharacterMaskConfig';
  protected $characterMaskConfigDataType = '';
  protected $cryptoHashConfigType = 'Google_Service_DLP_GooglePrivacyDlpV2beta1CryptoHashConfig';
  protected $cryptoHashConfigDataType = '';
  protected $cryptoReplaceFfxFpeConfigType = 'Google_Service_DLP_GooglePrivacyDlpV2beta1CryptoReplaceFfxFpeConfig';
  protected $cryptoReplaceFfxFpeConfigDataType = '';
  protected $fixedSizeBucketingConfigType = 'Google_Service_DLP_GooglePrivacyDlpV2beta1FixedSizeBucketingConfig';
  protected $fixedSizeBucketingConfigDataType = '';
  protected $redactConfigType = 'Google_Service_DLP_GooglePrivacyDlpV2beta1RedactConfig';
  protected $redactConfigDataType = '';
  protected $replaceConfigType = 'Google_Service_DLP_GooglePrivacyDlpV2beta1ReplaceValueConfig';
  protected $replaceConfigDataType = '';
  protected $replaceWithInfoTypeConfigType = 'Google_Service_DLP_GooglePrivacyDlpV2beta1ReplaceWithInfoTypeConfig';
  protected $replaceWithInfoTypeConfigDataType = '';
  protected $timePartConfigType = 'Google_Service_DLP_GooglePrivacyDlpV2beta1TimePartConfig';
  protected $timePartConfigDataType = '';

  /**
   * @param Google_Service_DLP_GooglePrivacyDlpV2beta1BucketingConfig
   */
  public function setBucketingConfig(Google_Service_DLP_GooglePrivacyDlpV2beta1BucketingConfig $bucketingConfig)
  {
    $this->bucketingConfig = $bucketingConfig;
  }
  /**
   * @return Google_Service_DLP_GooglePrivacyDlpV2beta1BucketingConfig
   */
  public function getBucketingConfig()
  {
    return $this->bucketingConfig;
  }
  /**
   * @param Google_Service_DLP_GooglePrivacyDlpV2beta1CharacterMaskConfig
   */
  public function setCharacterMaskConfig(Google_Service_DLP_GooglePrivacyDlpV2beta1CharacterMaskConfig $characterMaskConfig)
  {
    $this->characterMaskConfig = $characterMaskConfig;
  }
  /**
   * @return Google_Service_DLP_GooglePrivacyDlpV2beta1CharacterMaskConfig
   */
  public function getCharacterMaskConfig()
  {
    return $this->characterMaskConfig;
  }
  /**
   * @param Google_Service_DLP_GooglePrivacyDlpV2beta1CryptoHashConfig
   */
  public function setCryptoHashConfig(Google_Service_DLP_GooglePrivacyDlpV2beta1CryptoHashConfig $cryptoHashConfig)
  {
    $this->cryptoHashConfig = $cryptoHashConfig;
  }
  /**
   * @return Google_Service_DLP_GooglePrivacyDlpV2beta1CryptoHashConfig
   */
  public function getCryptoHashConfig()
  {
    return $this->cryptoHashConfig;
  }
  /**
   * @param Google_Service_DLP_GooglePrivacyDlpV2beta1CryptoReplaceFfxFpeConfig
   */
  public function setCryptoReplaceFfxFpeConfig(Google_Service_DLP_GooglePrivacyDlpV2beta1CryptoReplaceFfxFpeConfig $cryptoReplaceFfxFpeConfig)
  {
    $this->cryptoReplaceFfxFpeConfig = $cryptoReplaceFfxFpeConfig;
  }
  /**
   * @return Google_Service_DLP_GooglePrivacyDlpV2beta1CryptoReplaceFfxFpeConfig
   */
  public function getCryptoReplaceFfxFpeConfig()
  {
    return $this->cryptoReplaceFfxFpeConfig;
  }
  /**
   * @param Google_Service_DLP_GooglePrivacyDlpV2beta1FixedSizeBucketingConfig
   */
  public function setFixedSizeBucketingConfig(Google_Service_DLP_GooglePrivacyDlpV2beta1FixedSizeBucketingConfig $fixedSizeBucketingConfig)
  {
    $this->fixedSizeBucketingConfig = $fixedSizeBucketingConfig;
  }
  /**
   * @return Google_Service_DLP_GooglePrivacyDlpV2beta1FixedSizeBucketingConfig
   */
  public function getFixedSizeBucketingConfig()
  {
    return $this->fixedSizeBucketingConfig;
  }
  /**
   * @param Google_Service_DLP_GooglePrivacyDlpV2beta1RedactConfig
   */
  public function setRedactConfig(Google_Service_DLP_GooglePrivacyDlpV2beta1RedactConfig $redactConfig)
  {
    $this->redactConfig = $redactConfig;
  }
  /**
   * @return Google_Service_DLP_GooglePrivacyDlpV2beta1RedactConfig
   */
  public function getRedactConfig()
  {
    return $this->redactConfig;
  }
  /**
   * @param Google_Service_DLP_GooglePrivacyDlpV2beta1ReplaceValueConfig
   */
  public function setReplaceConfig(Google_Service_DLP_GooglePrivacyDlpV2beta1ReplaceValueConfig $replaceConfig)
  {
    $this->replaceConfig = $replaceConfig;
  }
  /**
   * @return Google_Service_DLP_GooglePrivacyDlpV2beta1ReplaceValueConfig
   */
  public function getReplaceConfig()
  {
    return $this->replaceConfig;
  }
  /**
   * @param Google_Service_DLP_GooglePrivacyDlpV2beta1ReplaceWithInfoTypeConfig
   */
  public function setReplaceWithInfoTypeConfig(Google_Service_DLP_GooglePrivacyDlpV2beta1ReplaceWithInfoTypeConfig $replaceWithInfoTypeConfig)
  {
    $this->replaceWithInfoTypeConfig = $replaceWithInfoTypeConfig;
  }
  /**
   * @return Google_Service_DLP_GooglePrivacyDlpV2beta1ReplaceWithInfoTypeConfig
   */
  public function getReplaceWithInfoTypeConfig()
  {
    return $this->replaceWithInfoTypeConfig;
  }
  /**
   * @param Google_Service_DLP_GooglePrivacyDlpV2beta1TimePartConfig
   */
  public function setTimePartConfig(Google_Service_DLP_GooglePrivacyDlpV2beta1TimePartConfig $timePartConfig)
  {
    $this->timePartConfig = $timePartConfig;
  }
  /**
   * @return Google_Service_DLP_GooglePrivacyDlpV2beta1TimePartConfig
   */
  public function getTimePartConfig()
  {
    return $this->timePartConfig;
  }
}
