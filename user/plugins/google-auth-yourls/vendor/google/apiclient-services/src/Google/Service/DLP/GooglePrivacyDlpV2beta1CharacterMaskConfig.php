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

class Google_Service_DLP_GooglePrivacyDlpV2beta1CharacterMaskConfig extends Google_Collection
{
  protected $collection_key = 'charactersToIgnore';
  protected $charactersToIgnoreType = 'Google_Service_DLP_GooglePrivacyDlpV2beta1CharsToIgnore';
  protected $charactersToIgnoreDataType = 'array';
  public $maskingCharacter;
  public $numberToMask;
  public $reverseOrder;

  /**
   * @param Google_Service_DLP_GooglePrivacyDlpV2beta1CharsToIgnore
   */
  public function setCharactersToIgnore($charactersToIgnore)
  {
    $this->charactersToIgnore = $charactersToIgnore;
  }
  /**
   * @return Google_Service_DLP_GooglePrivacyDlpV2beta1CharsToIgnore
   */
  public function getCharactersToIgnore()
  {
    return $this->charactersToIgnore;
  }
  public function setMaskingCharacter($maskingCharacter)
  {
    $this->maskingCharacter = $maskingCharacter;
  }
  public function getMaskingCharacter()
  {
    return $this->maskingCharacter;
  }
  public function setNumberToMask($numberToMask)
  {
    $this->numberToMask = $numberToMask;
  }
  public function getNumberToMask()
  {
    return $this->numberToMask;
  }
  public function setReverseOrder($reverseOrder)
  {
    $this->reverseOrder = $reverseOrder;
  }
  public function getReverseOrder()
  {
    return $this->reverseOrder;
  }
}
