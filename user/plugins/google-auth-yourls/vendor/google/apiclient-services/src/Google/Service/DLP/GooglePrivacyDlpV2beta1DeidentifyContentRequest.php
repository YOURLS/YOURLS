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

class Google_Service_DLP_GooglePrivacyDlpV2beta1DeidentifyContentRequest extends Google_Collection
{
  protected $collection_key = 'items';
  protected $deidentifyConfigType = 'Google_Service_DLP_GooglePrivacyDlpV2beta1DeidentifyConfig';
  protected $deidentifyConfigDataType = '';
  protected $inspectConfigType = 'Google_Service_DLP_GooglePrivacyDlpV2beta1InspectConfig';
  protected $inspectConfigDataType = '';
  protected $itemsType = 'Google_Service_DLP_GooglePrivacyDlpV2beta1ContentItem';
  protected $itemsDataType = 'array';

  /**
   * @param Google_Service_DLP_GooglePrivacyDlpV2beta1DeidentifyConfig
   */
  public function setDeidentifyConfig(Google_Service_DLP_GooglePrivacyDlpV2beta1DeidentifyConfig $deidentifyConfig)
  {
    $this->deidentifyConfig = $deidentifyConfig;
  }
  /**
   * @return Google_Service_DLP_GooglePrivacyDlpV2beta1DeidentifyConfig
   */
  public function getDeidentifyConfig()
  {
    return $this->deidentifyConfig;
  }
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
   * @param Google_Service_DLP_GooglePrivacyDlpV2beta1ContentItem
   */
  public function setItems($items)
  {
    $this->items = $items;
  }
  /**
   * @return Google_Service_DLP_GooglePrivacyDlpV2beta1ContentItem
   */
  public function getItems()
  {
    return $this->items;
  }
}
