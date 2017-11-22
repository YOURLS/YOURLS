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

class Google_Service_Dialogflow_IntentMessageBasicCard extends Google_Collection
{
  protected $collection_key = 'buttons';
  protected $buttonsType = 'Google_Service_Dialogflow_IntentMessageBasicCardButton';
  protected $buttonsDataType = 'array';
  public $formattedText;
  protected $imageType = 'Google_Service_Dialogflow_IntentMessageImage';
  protected $imageDataType = '';
  public $subtitle;
  public $title;

  /**
   * @param Google_Service_Dialogflow_IntentMessageBasicCardButton
   */
  public function setButtons($buttons)
  {
    $this->buttons = $buttons;
  }
  /**
   * @return Google_Service_Dialogflow_IntentMessageBasicCardButton
   */
  public function getButtons()
  {
    return $this->buttons;
  }
  public function setFormattedText($formattedText)
  {
    $this->formattedText = $formattedText;
  }
  public function getFormattedText()
  {
    return $this->formattedText;
  }
  /**
   * @param Google_Service_Dialogflow_IntentMessageImage
   */
  public function setImage(Google_Service_Dialogflow_IntentMessageImage $image)
  {
    $this->image = $image;
  }
  /**
   * @return Google_Service_Dialogflow_IntentMessageImage
   */
  public function getImage()
  {
    return $this->image;
  }
  public function setSubtitle($subtitle)
  {
    $this->subtitle = $subtitle;
  }
  public function getSubtitle()
  {
    return $this->subtitle;
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
