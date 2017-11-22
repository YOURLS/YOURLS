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

class Google_Service_Books_Dictlayerdata extends Google_Model
{
  protected $commonType = 'Google_Service_Books_DictlayerdataCommon';
  protected $commonDataType = '';
  protected $dictType = 'Google_Service_Books_DictlayerdataDict';
  protected $dictDataType = '';
  public $kind;

  /**
   * @param Google_Service_Books_DictlayerdataCommon
   */
  public function setCommon(Google_Service_Books_DictlayerdataCommon $common)
  {
    $this->common = $common;
  }
  /**
   * @return Google_Service_Books_DictlayerdataCommon
   */
  public function getCommon()
  {
    return $this->common;
  }
  /**
   * @param Google_Service_Books_DictlayerdataDict
   */
  public function setDict(Google_Service_Books_DictlayerdataDict $dict)
  {
    $this->dict = $dict;
  }
  /**
   * @return Google_Service_Books_DictlayerdataDict
   */
  public function getDict()
  {
    return $this->dict;
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
