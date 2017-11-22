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

class Google_Service_Slides_Bullet extends Google_Model
{
  protected $bulletStyleType = 'Google_Service_Slides_TextStyle';
  protected $bulletStyleDataType = '';
  public $glyph;
  public $listId;
  public $nestingLevel;

  /**
   * @param Google_Service_Slides_TextStyle
   */
  public function setBulletStyle(Google_Service_Slides_TextStyle $bulletStyle)
  {
    $this->bulletStyle = $bulletStyle;
  }
  /**
   * @return Google_Service_Slides_TextStyle
   */
  public function getBulletStyle()
  {
    return $this->bulletStyle;
  }
  public function setGlyph($glyph)
  {
    $this->glyph = $glyph;
  }
  public function getGlyph()
  {
    return $this->glyph;
  }
  public function setListId($listId)
  {
    $this->listId = $listId;
  }
  public function getListId()
  {
    return $this->listId;
  }
  public function setNestingLevel($nestingLevel)
  {
    $this->nestingLevel = $nestingLevel;
  }
  public function getNestingLevel()
  {
    return $this->nestingLevel;
  }
}
