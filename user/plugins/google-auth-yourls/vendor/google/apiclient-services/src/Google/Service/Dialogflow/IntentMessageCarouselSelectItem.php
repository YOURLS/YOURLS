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

class Google_Service_Dialogflow_IntentMessageCarouselSelectItem extends Google_Model
{
  public $description;
  protected $imageType = 'Google_Service_Dialogflow_IntentMessageImage';
  protected $imageDataType = '';
  protected $infoType = 'Google_Service_Dialogflow_IntentMessageSelectItemInfo';
  protected $infoDataType = '';
  public $title;

  public function setDescription($description)
  {
    $this->description = $description;
  }
  public function getDescription()
  {
    return $this->description;
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
  /**
   * @param Google_Service_Dialogflow_IntentMessageSelectItemInfo
   */
  public function setInfo(Google_Service_Dialogflow_IntentMessageSelectItemInfo $info)
  {
    $this->info = $info;
  }
  /**
   * @return Google_Service_Dialogflow_IntentMessageSelectItemInfo
   */
  public function getInfo()
  {
    return $this->info;
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
