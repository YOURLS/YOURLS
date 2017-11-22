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

class Google_Service_Dialogflow_BatchUpdateIntentsRequest extends Google_Model
{
  protected $intentBatchInlineType = 'Google_Service_Dialogflow_IntentBatch';
  protected $intentBatchInlineDataType = '';
  public $intentBatchUri;
  public $intentView;
  public $languageCode;
  public $updateMask;

  /**
   * @param Google_Service_Dialogflow_IntentBatch
   */
  public function setIntentBatchInline(Google_Service_Dialogflow_IntentBatch $intentBatchInline)
  {
    $this->intentBatchInline = $intentBatchInline;
  }
  /**
   * @return Google_Service_Dialogflow_IntentBatch
   */
  public function getIntentBatchInline()
  {
    return $this->intentBatchInline;
  }
  public function setIntentBatchUri($intentBatchUri)
  {
    $this->intentBatchUri = $intentBatchUri;
  }
  public function getIntentBatchUri()
  {
    return $this->intentBatchUri;
  }
  public function setIntentView($intentView)
  {
    $this->intentView = $intentView;
  }
  public function getIntentView()
  {
    return $this->intentView;
  }
  public function setLanguageCode($languageCode)
  {
    $this->languageCode = $languageCode;
  }
  public function getLanguageCode()
  {
    return $this->languageCode;
  }
  public function setUpdateMask($updateMask)
  {
    $this->updateMask = $updateMask;
  }
  public function getUpdateMask()
  {
    return $this->updateMask;
  }
}
