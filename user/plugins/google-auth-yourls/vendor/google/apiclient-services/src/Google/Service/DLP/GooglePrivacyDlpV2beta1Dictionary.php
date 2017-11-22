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

class Google_Service_DLP_GooglePrivacyDlpV2beta1Dictionary extends Google_Model
{
  protected $wordListType = 'Google_Service_DLP_GooglePrivacyDlpV2beta1WordList';
  protected $wordListDataType = '';

  /**
   * @param Google_Service_DLP_GooglePrivacyDlpV2beta1WordList
   */
  public function setWordList(Google_Service_DLP_GooglePrivacyDlpV2beta1WordList $wordList)
  {
    $this->wordList = $wordList;
  }
  /**
   * @return Google_Service_DLP_GooglePrivacyDlpV2beta1WordList
   */
  public function getWordList()
  {
    return $this->wordList;
  }
}
