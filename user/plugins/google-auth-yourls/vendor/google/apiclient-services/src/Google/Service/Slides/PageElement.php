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

class Google_Service_Slides_PageElement extends Google_Model
{
  public $description;
  protected $elementGroupType = 'Google_Service_Slides_Group';
  protected $elementGroupDataType = '';
  protected $imageType = 'Google_Service_Slides_Image';
  protected $imageDataType = '';
  protected $lineType = 'Google_Service_Slides_Line';
  protected $lineDataType = '';
  public $objectId;
  protected $shapeType = 'Google_Service_Slides_Shape';
  protected $shapeDataType = '';
  protected $sheetsChartType = 'Google_Service_Slides_SheetsChart';
  protected $sheetsChartDataType = '';
  protected $sizeType = 'Google_Service_Slides_Size';
  protected $sizeDataType = '';
  protected $tableType = 'Google_Service_Slides_Table';
  protected $tableDataType = '';
  public $title;
  protected $transformType = 'Google_Service_Slides_AffineTransform';
  protected $transformDataType = '';
  protected $videoType = 'Google_Service_Slides_Video';
  protected $videoDataType = '';
  protected $wordArtType = 'Google_Service_Slides_WordArt';
  protected $wordArtDataType = '';

  public function setDescription($description)
  {
    $this->description = $description;
  }
  public function getDescription()
  {
    return $this->description;
  }
  /**
   * @param Google_Service_Slides_Group
   */
  public function setElementGroup(Google_Service_Slides_Group $elementGroup)
  {
    $this->elementGroup = $elementGroup;
  }
  /**
   * @return Google_Service_Slides_Group
   */
  public function getElementGroup()
  {
    return $this->elementGroup;
  }
  /**
   * @param Google_Service_Slides_Image
   */
  public function setImage(Google_Service_Slides_Image $image)
  {
    $this->image = $image;
  }
  /**
   * @return Google_Service_Slides_Image
   */
  public function getImage()
  {
    return $this->image;
  }
  /**
   * @param Google_Service_Slides_Line
   */
  public function setLine(Google_Service_Slides_Line $line)
  {
    $this->line = $line;
  }
  /**
   * @return Google_Service_Slides_Line
   */
  public function getLine()
  {
    return $this->line;
  }
  public function setObjectId($objectId)
  {
    $this->objectId = $objectId;
  }
  public function getObjectId()
  {
    return $this->objectId;
  }
  /**
   * @param Google_Service_Slides_Shape
   */
  public function setShape(Google_Service_Slides_Shape $shape)
  {
    $this->shape = $shape;
  }
  /**
   * @return Google_Service_Slides_Shape
   */
  public function getShape()
  {
    return $this->shape;
  }
  /**
   * @param Google_Service_Slides_SheetsChart
   */
  public function setSheetsChart(Google_Service_Slides_SheetsChart $sheetsChart)
  {
    $this->sheetsChart = $sheetsChart;
  }
  /**
   * @return Google_Service_Slides_SheetsChart
   */
  public function getSheetsChart()
  {
    return $this->sheetsChart;
  }
  /**
   * @param Google_Service_Slides_Size
   */
  public function setSize(Google_Service_Slides_Size $size)
  {
    $this->size = $size;
  }
  /**
   * @return Google_Service_Slides_Size
   */
  public function getSize()
  {
    return $this->size;
  }
  /**
   * @param Google_Service_Slides_Table
   */
  public function setTable(Google_Service_Slides_Table $table)
  {
    $this->table = $table;
  }
  /**
   * @return Google_Service_Slides_Table
   */
  public function getTable()
  {
    return $this->table;
  }
  public function setTitle($title)
  {
    $this->title = $title;
  }
  public function getTitle()
  {
    return $this->title;
  }
  /**
   * @param Google_Service_Slides_AffineTransform
   */
  public function setTransform(Google_Service_Slides_AffineTransform $transform)
  {
    $this->transform = $transform;
  }
  /**
   * @return Google_Service_Slides_AffineTransform
   */
  public function getTransform()
  {
    return $this->transform;
  }
  /**
   * @param Google_Service_Slides_Video
   */
  public function setVideo(Google_Service_Slides_Video $video)
  {
    $this->video = $video;
  }
  /**
   * @return Google_Service_Slides_Video
   */
  public function getVideo()
  {
    return $this->video;
  }
  /**
   * @param Google_Service_Slides_WordArt
   */
  public function setWordArt(Google_Service_Slides_WordArt $wordArt)
  {
    $this->wordArt = $wordArt;
  }
  /**
   * @return Google_Service_Slides_WordArt
   */
  public function getWordArt()
  {
    return $this->wordArt;
  }
}
