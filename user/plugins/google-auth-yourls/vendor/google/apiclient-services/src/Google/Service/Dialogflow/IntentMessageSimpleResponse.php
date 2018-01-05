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

class Google_Service_Dialogflow_IntentMessageSimpleResponse extends Google_Model
{
  public $displayText;
  public $ssml;
  public $textToSpeech;

  public function setDisplayText($displayText)
  {
    $this->displayText = $displayText;
  }
  public function getDisplayText()
  {
    return $this->displayText;
  }
  public function setSsml($ssml)
  {
    $this->ssml = $ssml;
  }
  public function getSsml()
  {
    return $this->ssml;
  }
  public function setTextToSpeech($textToSpeech)
  {
    $this->textToSpeech = $textToSpeech;
  }
  public function getTextToSpeech()
  {
    return $this->textToSpeech;
  }
}
