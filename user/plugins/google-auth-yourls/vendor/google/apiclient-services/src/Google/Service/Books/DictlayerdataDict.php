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

class Google_Service_Books_DictlayerdataDict extends Google_Collection
{
  protected $collection_key = 'words';
  protected $sourceType = 'Google_Service_Books_DictlayerdataDictSource';
  protected $sourceDataType = '';
  protected $wordsType = 'Google_Service_Books_DictlayerdataDictWords';
  protected $wordsDataType = 'array';

  /**
   * @param Google_Service_Books_DictlayerdataDictSource
   */
  public function setSource(Google_Service_Books_DictlayerdataDictSource $source)
  {
    $this->source = $source;
  }
  /**
   * @return Google_Service_Books_DictlayerdataDictSource
   */
  public function getSource()
  {
    return $this->source;
  }
  /**
   * @param Google_Service_Books_DictlayerdataDictWords
   */
  public function setWords($words)
  {
    $this->words = $words;
  }
  /**
   * @return Google_Service_Books_DictlayerdataDictWords
   */
  public function getWords()
  {
    return $this->words;
  }
}
