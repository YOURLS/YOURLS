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

class Google_Service_ManufacturerCenter_FeatureDescription extends Google_Model
{
  public $headline;
  protected $imageType = 'Google_Service_ManufacturerCenter_Image';
  protected $imageDataType = '';
  public $text;

  public function setHeadline($headline)
  {
    $this->headline = $headline;
  }
  public function getHeadline()
  {
    return $this->headline;
  }
  /**
   * @param Google_Service_ManufacturerCenter_Image
   */
  public function setImage(Google_Service_ManufacturerCenter_Image $image)
  {
    $this->image = $image;
  }
  /**
   * @return Google_Service_ManufacturerCenter_Image
   */
  public function getImage()
  {
    return $this->image;
  }
  public function setText($text)
  {
    $this->text = $text;
  }
  public function getText()
  {
    return $this->text;
  }
}
