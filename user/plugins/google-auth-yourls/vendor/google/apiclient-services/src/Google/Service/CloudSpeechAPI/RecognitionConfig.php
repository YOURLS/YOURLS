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

class Google_Service_CloudSpeechAPI_RecognitionConfig extends Google_Model
{
  public $encoding;
  public $languageCode;
  public $maxAlternatives;
  public $profanityFilter;
  public $sampleRate;
  protected $speechContextType = 'Google_Service_CloudSpeechAPI_SpeechContext';
  protected $speechContextDataType = '';

  public function setEncoding($encoding)
  {
    $this->encoding = $encoding;
  }
  public function getEncoding()
  {
    return $this->encoding;
  }
  public function setLanguageCode($languageCode)
  {
    $this->languageCode = $languageCode;
  }
  public function getLanguageCode()
  {
    return $this->languageCode;
  }
  public function setMaxAlternatives($maxAlternatives)
  {
    $this->maxAlternatives = $maxAlternatives;
  }
  public function getMaxAlternatives()
  {
    return $this->maxAlternatives;
  }
  public function setProfanityFilter($profanityFilter)
  {
    $this->profanityFilter = $profanityFilter;
  }
  public function getProfanityFilter()
  {
    return $this->profanityFilter;
  }
  public function setSampleRate($sampleRate)
  {
    $this->sampleRate = $sampleRate;
  }
  public function getSampleRate()
  {
    return $this->sampleRate;
  }
  public function setSpeechContext(Google_Service_CloudSpeechAPI_SpeechContext $speechContext)
  {
    $this->speechContext = $speechContext;
  }
  public function getSpeechContext()
  {
    return $this->speechContext;
  }
}
