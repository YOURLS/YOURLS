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

class Google_Service_Vision_Page extends Google_Collection
{
  protected $collection_key = 'blocks';
  protected $blocksType = 'Google_Service_Vision_Block';
  protected $blocksDataType = 'array';
  public $height;
  protected $propertyType = 'Google_Service_Vision_TextProperty';
  protected $propertyDataType = '';
  public $width;

  /**
   * @param Google_Service_Vision_Block
   */
  public function setBlocks($blocks)
  {
    $this->blocks = $blocks;
  }
  /**
   * @return Google_Service_Vision_Block
   */
  public function getBlocks()
  {
    return $this->blocks;
  }
  public function setHeight($height)
  {
    $this->height = $height;
  }
  public function getHeight()
  {
    return $this->height;
  }
  /**
   * @param Google_Service_Vision_TextProperty
   */
  public function setProperty(Google_Service_Vision_TextProperty $property)
  {
    $this->property = $property;
  }
  /**
   * @return Google_Service_Vision_TextProperty
   */
  public function getProperty()
  {
    return $this->property;
  }
  public function setWidth($width)
  {
    $this->width = $width;
  }
  public function getWidth()
  {
    return $this->width;
  }
}
