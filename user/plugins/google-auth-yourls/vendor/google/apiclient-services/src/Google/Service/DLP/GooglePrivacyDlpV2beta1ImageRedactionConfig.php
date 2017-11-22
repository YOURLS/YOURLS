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

class Google_Service_DLP_GooglePrivacyDlpV2beta1ImageRedactionConfig extends Google_Model
{
  protected $infoTypeType = 'Google_Service_DLP_GooglePrivacyDlpV2beta1InfoType';
  protected $infoTypeDataType = '';
  public $redactAllText;
  protected $redactionColorType = 'Google_Service_DLP_GooglePrivacyDlpV2beta1Color';
  protected $redactionColorDataType = '';

  /**
   * @param Google_Service_DLP_GooglePrivacyDlpV2beta1InfoType
   */
  public function setInfoType(Google_Service_DLP_GooglePrivacyDlpV2beta1InfoType $infoType)
  {
    $this->infoType = $infoType;
  }
  /**
   * @return Google_Service_DLP_GooglePrivacyDlpV2beta1InfoType
   */
  public function getInfoType()
  {
    return $this->infoType;
  }
  public function setRedactAllText($redactAllText)
  {
    $this->redactAllText = $redactAllText;
  }
  public function getRedactAllText()
  {
    return $this->redactAllText;
  }
  /**
   * @param Google_Service_DLP_GooglePrivacyDlpV2beta1Color
   */
  public function setRedactionColor(Google_Service_DLP_GooglePrivacyDlpV2beta1Color $redactionColor)
  {
    $this->redactionColor = $redactionColor;
  }
  /**
   * @return Google_Service_DLP_GooglePrivacyDlpV2beta1Color
   */
  public function getRedactionColor()
  {
    return $this->redactionColor;
  }
}
