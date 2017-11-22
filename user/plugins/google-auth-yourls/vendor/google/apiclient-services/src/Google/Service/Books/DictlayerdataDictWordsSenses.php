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

class Google_Service_Books_DictlayerdataDictWordsSenses extends Google_Collection
{
  protected $collection_key = 'synonyms';
  protected $conjugationsType = 'Google_Service_Books_DictlayerdataDictWordsSensesConjugations';
  protected $conjugationsDataType = 'array';
  protected $definitionsType = 'Google_Service_Books_DictlayerdataDictWordsSensesDefinitions';
  protected $definitionsDataType = 'array';
  public $partOfSpeech;
  public $pronunciation;
  public $pronunciationUrl;
  protected $sourceType = 'Google_Service_Books_DictlayerdataDictWordsSensesSource';
  protected $sourceDataType = '';
  public $syllabification;
  protected $synonymsType = 'Google_Service_Books_DictlayerdataDictWordsSensesSynonyms';
  protected $synonymsDataType = 'array';

  /**
   * @param Google_Service_Books_DictlayerdataDictWordsSensesConjugations
   */
  public function setConjugations($conjugations)
  {
    $this->conjugations = $conjugations;
  }
  /**
   * @return Google_Service_Books_DictlayerdataDictWordsSensesConjugations
   */
  public function getConjugations()
  {
    return $this->conjugations;
  }
  /**
   * @param Google_Service_Books_DictlayerdataDictWordsSensesDefinitions
   */
  public function setDefinitions($definitions)
  {
    $this->definitions = $definitions;
  }
  /**
   * @return Google_Service_Books_DictlayerdataDictWordsSensesDefinitions
   */
  public function getDefinitions()
  {
    return $this->definitions;
  }
  public function setPartOfSpeech($partOfSpeech)
  {
    $this->partOfSpeech = $partOfSpeech;
  }
  public function getPartOfSpeech()
  {
    return $this->partOfSpeech;
  }
  public function setPronunciation($pronunciation)
  {
    $this->pronunciation = $pronunciation;
  }
  public function getPronunciation()
  {
    return $this->pronunciation;
  }
  public function setPronunciationUrl($pronunciationUrl)
  {
    $this->pronunciationUrl = $pronunciationUrl;
  }
  public function getPronunciationUrl()
  {
    return $this->pronunciationUrl;
  }
  /**
   * @param Google_Service_Books_DictlayerdataDictWordsSensesSource
   */
  public function setSource(Google_Service_Books_DictlayerdataDictWordsSensesSource $source)
  {
    $this->source = $source;
  }
  /**
   * @return Google_Service_Books_DictlayerdataDictWordsSensesSource
   */
  public function getSource()
  {
    return $this->source;
  }
  public function setSyllabification($syllabification)
  {
    $this->syllabification = $syllabification;
  }
  public function getSyllabification()
  {
    return $this->syllabification;
  }
  /**
   * @param Google_Service_Books_DictlayerdataDictWordsSensesSynonyms
   */
  public function setSynonyms($synonyms)
  {
    $this->synonyms = $synonyms;
  }
  /**
   * @return Google_Service_Books_DictlayerdataDictWordsSensesSynonyms
   */
  public function getSynonyms()
  {
    return $this->synonyms;
  }
}
