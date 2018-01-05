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

class Google_Service_Dfareporting_ConversionsBatchInsertRequest extends Google_Collection
{
  protected $collection_key = 'conversions';
  protected $conversionsType = 'Google_Service_Dfareporting_Conversion';
  protected $conversionsDataType = 'array';
  protected $encryptionInfoType = 'Google_Service_Dfareporting_EncryptionInfo';
  protected $encryptionInfoDataType = '';
  public $kind;

  /**
   * @param Google_Service_Dfareporting_Conversion
   */
  public function setConversions($conversions)
  {
    $this->conversions = $conversions;
  }
  /**
   * @return Google_Service_Dfareporting_Conversion
   */
  public function getConversions()
  {
    return $this->conversions;
  }
  /**
   * @param Google_Service_Dfareporting_EncryptionInfo
   */
  public function setEncryptionInfo(Google_Service_Dfareporting_EncryptionInfo $encryptionInfo)
  {
    $this->encryptionInfo = $encryptionInfo;
  }
  /**
   * @return Google_Service_Dfareporting_EncryptionInfo
   */
  public function getEncryptionInfo()
  {
    return $this->encryptionInfo;
  }
  public function setKind($kind)
  {
    $this->kind = $kind;
  }
  public function getKind()
  {
    return $this->kind;
  }
}
