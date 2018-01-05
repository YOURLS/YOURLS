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

class Google_Service_DLP_GooglePrivacyDlpV2beta1CreateInspectOperationRequest extends Google_Model
{
  protected $inspectConfigType = 'Google_Service_DLP_GooglePrivacyDlpV2beta1InspectConfig';
  protected $inspectConfigDataType = '';
  protected $operationConfigType = 'Google_Service_DLP_GooglePrivacyDlpV2beta1OperationConfig';
  protected $operationConfigDataType = '';
  protected $outputConfigType = 'Google_Service_DLP_GooglePrivacyDlpV2beta1OutputStorageConfig';
  protected $outputConfigDataType = '';
  protected $storageConfigType = 'Google_Service_DLP_GooglePrivacyDlpV2beta1StorageConfig';
  protected $storageConfigDataType = '';

  /**
   * @param Google_Service_DLP_GooglePrivacyDlpV2beta1InspectConfig
   */
  public function setInspectConfig(Google_Service_DLP_GooglePrivacyDlpV2beta1InspectConfig $inspectConfig)
  {
    $this->inspectConfig = $inspectConfig;
  }
  /**
   * @return Google_Service_DLP_GooglePrivacyDlpV2beta1InspectConfig
   */
  public function getInspectConfig()
  {
    return $this->inspectConfig;
  }
  /**
   * @param Google_Service_DLP_GooglePrivacyDlpV2beta1OperationConfig
   */
  public function setOperationConfig(Google_Service_DLP_GooglePrivacyDlpV2beta1OperationConfig $operationConfig)
  {
    $this->operationConfig = $operationConfig;
  }
  /**
   * @return Google_Service_DLP_GooglePrivacyDlpV2beta1OperationConfig
   */
  public function getOperationConfig()
  {
    return $this->operationConfig;
  }
  /**
   * @param Google_Service_DLP_GooglePrivacyDlpV2beta1OutputStorageConfig
   */
  public function setOutputConfig(Google_Service_DLP_GooglePrivacyDlpV2beta1OutputStorageConfig $outputConfig)
  {
    $this->outputConfig = $outputConfig;
  }
  /**
   * @return Google_Service_DLP_GooglePrivacyDlpV2beta1OutputStorageConfig
   */
  public function getOutputConfig()
  {
    return $this->outputConfig;
  }
  /**
   * @param Google_Service_DLP_GooglePrivacyDlpV2beta1StorageConfig
   */
  public function setStorageConfig(Google_Service_DLP_GooglePrivacyDlpV2beta1StorageConfig $storageConfig)
  {
    $this->storageConfig = $storageConfig;
  }
  /**
   * @return Google_Service_DLP_GooglePrivacyDlpV2beta1StorageConfig
   */
  public function getStorageConfig()
  {
    return $this->storageConfig;
  }
}
