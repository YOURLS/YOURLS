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

class Google_Service_Slides_Shape extends Google_Model
{
  protected $placeholderType = 'Google_Service_Slides_Placeholder';
  protected $placeholderDataType = '';
  protected $shapePropertiesType = 'Google_Service_Slides_ShapeProperties';
  protected $shapePropertiesDataType = '';
  public $shapeType;
  protected $textType = 'Google_Service_Slides_TextContent';
  protected $textDataType = '';

  /**
   * @param Google_Service_Slides_Placeholder
   */
  public function setPlaceholder(Google_Service_Slides_Placeholder $placeholder)
  {
    $this->placeholder = $placeholder;
  }
  /**
   * @return Google_Service_Slides_Placeholder
   */
  public function getPlaceholder()
  {
    return $this->placeholder;
  }
  /**
   * @param Google_Service_Slides_ShapeProperties
   */
  public function setShapeProperties(Google_Service_Slides_ShapeProperties $shapeProperties)
  {
    $this->shapeProperties = $shapeProperties;
  }
  /**
   * @return Google_Service_Slides_ShapeProperties
   */
  public function getShapeProperties()
  {
    return $this->shapeProperties;
  }
  public function setShapeType($shapeType)
  {
    $this->shapeType = $shapeType;
  }
  public function getShapeType()
  {
    return $this->shapeType;
  }
  /**
   * @param Google_Service_Slides_TextContent
   */
  public function setText(Google_Service_Slides_TextContent $text)
  {
    $this->text = $text;
  }
  /**
   * @return Google_Service_Slides_TextContent
   */
  public function getText()
  {
    return $this->text;
  }
}
