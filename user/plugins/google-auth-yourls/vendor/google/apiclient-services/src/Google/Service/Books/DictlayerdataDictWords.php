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

class Google_Service_Books_DictlayerdataDictWords extends Google_Collection
{
  protected $collection_key = 'senses';
  protected $derivativesType = 'Google_Service_Books_DictlayerdataDictWordsDerivatives';
  protected $derivativesDataType = 'array';
  protected $examplesType = 'Google_Service_Books_DictlayerdataDictWordsExamples';
  protected $examplesDataType = 'array';
  protected $sensesType = 'Google_Service_Books_DictlayerdataDictWordsSenses';
  protected $sensesDataType = 'array';
  protected $sourceType = 'Google_Service_Books_DictlayerdataDictWordsSource';
  protected $sourceDataType = '';

  /**
   * @param Google_Service_Books_DictlayerdataDictWordsDerivatives
   */
  public function setDerivatives($derivatives)
  {
    $this->derivatives = $derivatives;
  }
  /**
   * @return Google_Service_Books_DictlayerdataDictWordsDerivatives
   */
  public function getDerivatives()
  {
    return $this->derivatives;
  }
  /**
   * @param Google_Service_Books_DictlayerdataDictWordsExamples
   */
  public function setExamples($examples)
  {
    $this->examples = $examples;
  }
  /**
   * @return Google_Service_Books_DictlayerdataDictWordsExamples
   */
  public function getExamples()
  {
    return $this->examples;
  }
  /**
   * @param Google_Service_Books_DictlayerdataDictWordsSenses
   */
  public function setSenses($senses)
  {
    $this->senses = $senses;
  }
  /**
   * @return Google_Service_Books_DictlayerdataDictWordsSenses
   */
  public function getSenses()
  {
    return $this->senses;
  }
  /**
   * @param Google_Service_Books_DictlayerdataDictWordsSource
   */
  public function setSource(Google_Service_Books_DictlayerdataDictWordsSource $source)
  {
    $this->source = $source;
  }
  /**
   * @return Google_Service_Books_DictlayerdataDictWordsSource
   */
  public function getSource()
  {
    return $this->source;
  }
}
