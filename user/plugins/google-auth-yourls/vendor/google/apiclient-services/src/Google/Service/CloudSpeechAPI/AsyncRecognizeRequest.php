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

class Google_Service_CloudSpeechAPI_AsyncRecognizeRequest extends Google_Model
{
  protected $audioType = 'Google_Service_CloudSpeechAPI_RecognitionAudio';
  protected $audioDataType = '';
  protected $configType = 'Google_Service_CloudSpeechAPI_RecognitionConfig';
  protected $configDataType = '';

  public function setAudio(Google_Service_CloudSpeechAPI_RecognitionAudio $audio)
  {
    $this->audio = $audio;
  }
  public function getAudio()
  {
    return $this->audio;
  }
  public function setConfig(Google_Service_CloudSpeechAPI_RecognitionConfig $config)
  {
    $this->config = $config;
  }
  public function getConfig()
  {
    return $this->config;
  }
}
