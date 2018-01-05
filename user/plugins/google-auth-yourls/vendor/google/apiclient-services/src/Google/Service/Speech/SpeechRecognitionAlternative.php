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

class Google_Service_Speech_SpeechRecognitionAlternative extends Google_Collection
{
  protected $collection_key = 'words';
  public $confidence;
  public $transcript;
  protected $wordsType = 'Google_Service_Speech_WordInfo';
  protected $wordsDataType = 'array';

  public function setConfidence($confidence)
  {
    $this->confidence = $confidence;
  }
  public function getConfidence()
  {
    return $this->confidence;
  }
  public function setTranscript($transcript)
  {
    $this->transcript = $transcript;
  }
  public function getTranscript()
  {
    return $this->transcript;
  }
  /**
   * @param Google_Service_Speech_WordInfo
   */
  public function setWords($words)
  {
    $this->words = $words;
  }
  /**
   * @return Google_Service_Speech_WordInfo
   */
  public function getWords()
  {
    return $this->words;
  }
}
