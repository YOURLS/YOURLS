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

class Google_Service_CloudNaturalLanguageAPI_Token extends Google_Model
{
  protected $dependencyEdgeType = 'Google_Service_CloudNaturalLanguageAPI_DependencyEdge';
  protected $dependencyEdgeDataType = '';
  public $lemma;
  protected $partOfSpeechType = 'Google_Service_CloudNaturalLanguageAPI_PartOfSpeech';
  protected $partOfSpeechDataType = '';
  protected $textType = 'Google_Service_CloudNaturalLanguageAPI_TextSpan';
  protected $textDataType = '';

  public function setDependencyEdge(Google_Service_CloudNaturalLanguageAPI_DependencyEdge $dependencyEdge)
  {
    $this->dependencyEdge = $dependencyEdge;
  }
  public function getDependencyEdge()
  {
    return $this->dependencyEdge;
  }
  public function setLemma($lemma)
  {
    $this->lemma = $lemma;
  }
  public function getLemma()
  {
    return $this->lemma;
  }
  public function setPartOfSpeech(Google_Service_CloudNaturalLanguageAPI_PartOfSpeech $partOfSpeech)
  {
    $this->partOfSpeech = $partOfSpeech;
  }
  public function getPartOfSpeech()
  {
    return $this->partOfSpeech;
  }
  public function setText(Google_Service_CloudNaturalLanguageAPI_TextSpan $text)
  {
    $this->text = $text;
  }
  public function getText()
  {
    return $this->text;
  }
}
