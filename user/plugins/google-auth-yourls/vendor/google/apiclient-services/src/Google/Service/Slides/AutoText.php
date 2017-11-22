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

class Google_Service_Slides_AutoText extends Google_Model
{
  public $content;
  protected $styleType = 'Google_Service_Slides_TextStyle';
  protected $styleDataType = '';
  public $type;

  public function setContent($content)
  {
    $this->content = $content;
  }
  public function getContent()
  {
    return $this->content;
  }
  /**
   * @param Google_Service_Slides_TextStyle
   */
  public function setStyle(Google_Service_Slides_TextStyle $style)
  {
    $this->style = $style;
  }
  /**
   * @return Google_Service_Slides_TextStyle
   */
  public function getStyle()
  {
    return $this->style;
  }
  public function setType($type)
  {
    $this->type = $type;
  }
  public function getType()
  {
    return $this->type;
  }
}
