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

class Google_Service_Dialogflow_IntentMessageBasicCardButton extends Google_Model
{
  protected $openUriActionType = 'Google_Service_Dialogflow_IntentMessageBasicCardButtonOpenUriAction';
  protected $openUriActionDataType = '';
  public $title;

  /**
   * @param Google_Service_Dialogflow_IntentMessageBasicCardButtonOpenUriAction
   */
  public function setOpenUriAction(Google_Service_Dialogflow_IntentMessageBasicCardButtonOpenUriAction $openUriAction)
  {
    $this->openUriAction = $openUriAction;
  }
  /**
   * @return Google_Service_Dialogflow_IntentMessageBasicCardButtonOpenUriAction
   */
  public function getOpenUriAction()
  {
    return $this->openUriAction;
  }
  public function setTitle($title)
  {
    $this->title = $title;
  }
  public function getTitle()
  {
    return $this->title;
  }
}
