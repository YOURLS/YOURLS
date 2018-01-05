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

class Google_Service_Slides_Response extends Google_Model
{
  protected $createImageType = 'Google_Service_Slides_CreateImageResponse';
  protected $createImageDataType = '';
  protected $createLineType = 'Google_Service_Slides_CreateLineResponse';
  protected $createLineDataType = '';
  protected $createShapeType = 'Google_Service_Slides_CreateShapeResponse';
  protected $createShapeDataType = '';
  protected $createSheetsChartType = 'Google_Service_Slides_CreateSheetsChartResponse';
  protected $createSheetsChartDataType = '';
  protected $createSlideType = 'Google_Service_Slides_CreateSlideResponse';
  protected $createSlideDataType = '';
  protected $createTableType = 'Google_Service_Slides_CreateTableResponse';
  protected $createTableDataType = '';
  protected $createVideoType = 'Google_Service_Slides_CreateVideoResponse';
  protected $createVideoDataType = '';
  protected $duplicateObjectType = 'Google_Service_Slides_DuplicateObjectResponse';
  protected $duplicateObjectDataType = '';
  protected $groupObjectsType = 'Google_Service_Slides_GroupObjectsResponse';
  protected $groupObjectsDataType = '';
  protected $replaceAllShapesWithImageType = 'Google_Service_Slides_ReplaceAllShapesWithImageResponse';
  protected $replaceAllShapesWithImageDataType = '';
  protected $replaceAllShapesWithSheetsChartType = 'Google_Service_Slides_ReplaceAllShapesWithSheetsChartResponse';
  protected $replaceAllShapesWithSheetsChartDataType = '';
  protected $replaceAllTextType = 'Google_Service_Slides_ReplaceAllTextResponse';
  protected $replaceAllTextDataType = '';

  /**
   * @param Google_Service_Slides_CreateImageResponse
   */
  public function setCreateImage(Google_Service_Slides_CreateImageResponse $createImage)
  {
    $this->createImage = $createImage;
  }
  /**
   * @return Google_Service_Slides_CreateImageResponse
   */
  public function getCreateImage()
  {
    return $this->createImage;
  }
  /**
   * @param Google_Service_Slides_CreateLineResponse
   */
  public function setCreateLine(Google_Service_Slides_CreateLineResponse $createLine)
  {
    $this->createLine = $createLine;
  }
  /**
   * @return Google_Service_Slides_CreateLineResponse
   */
  public function getCreateLine()
  {
    return $this->createLine;
  }
  /**
   * @param Google_Service_Slides_CreateShapeResponse
   */
  public function setCreateShape(Google_Service_Slides_CreateShapeResponse $createShape)
  {
    $this->createShape = $createShape;
  }
  /**
   * @return Google_Service_Slides_CreateShapeResponse
   */
  public function getCreateShape()
  {
    return $this->createShape;
  }
  /**
   * @param Google_Service_Slides_CreateSheetsChartResponse
   */
  public function setCreateSheetsChart(Google_Service_Slides_CreateSheetsChartResponse $createSheetsChart)
  {
    $this->createSheetsChart = $createSheetsChart;
  }
  /**
   * @return Google_Service_Slides_CreateSheetsChartResponse
   */
  public function getCreateSheetsChart()
  {
    return $this->createSheetsChart;
  }
  /**
   * @param Google_Service_Slides_CreateSlideResponse
   */
  public function setCreateSlide(Google_Service_Slides_CreateSlideResponse $createSlide)
  {
    $this->createSlide = $createSlide;
  }
  /**
   * @return Google_Service_Slides_CreateSlideResponse
   */
  public function getCreateSlide()
  {
    return $this->createSlide;
  }
  /**
   * @param Google_Service_Slides_CreateTableResponse
   */
  public function setCreateTable(Google_Service_Slides_CreateTableResponse $createTable)
  {
    $this->createTable = $createTable;
  }
  /**
   * @return Google_Service_Slides_CreateTableResponse
   */
  public function getCreateTable()
  {
    return $this->createTable;
  }
  /**
   * @param Google_Service_Slides_CreateVideoResponse
   */
  public function setCreateVideo(Google_Service_Slides_CreateVideoResponse $createVideo)
  {
    $this->createVideo = $createVideo;
  }
  /**
   * @return Google_Service_Slides_CreateVideoResponse
   */
  public function getCreateVideo()
  {
    return $this->createVideo;
  }
  /**
   * @param Google_Service_Slides_DuplicateObjectResponse
   */
  public function setDuplicateObject(Google_Service_Slides_DuplicateObjectResponse $duplicateObject)
  {
    $this->duplicateObject = $duplicateObject;
  }
  /**
   * @return Google_Service_Slides_DuplicateObjectResponse
   */
  public function getDuplicateObject()
  {
    return $this->duplicateObject;
  }
  /**
   * @param Google_Service_Slides_GroupObjectsResponse
   */
  public function setGroupObjects(Google_Service_Slides_GroupObjectsResponse $groupObjects)
  {
    $this->groupObjects = $groupObjects;
  }
  /**
   * @return Google_Service_Slides_GroupObjectsResponse
   */
  public function getGroupObjects()
  {
    return $this->groupObjects;
  }
  /**
   * @param Google_Service_Slides_ReplaceAllShapesWithImageResponse
   */
  public function setReplaceAllShapesWithImage(Google_Service_Slides_ReplaceAllShapesWithImageResponse $replaceAllShapesWithImage)
  {
    $this->replaceAllShapesWithImage = $replaceAllShapesWithImage;
  }
  /**
   * @return Google_Service_Slides_ReplaceAllShapesWithImageResponse
   */
  public function getReplaceAllShapesWithImage()
  {
    return $this->replaceAllShapesWithImage;
  }
  /**
   * @param Google_Service_Slides_ReplaceAllShapesWithSheetsChartResponse
   */
  public function setReplaceAllShapesWithSheetsChart(Google_Service_Slides_ReplaceAllShapesWithSheetsChartResponse $replaceAllShapesWithSheetsChart)
  {
    $this->replaceAllShapesWithSheetsChart = $replaceAllShapesWithSheetsChart;
  }
  /**
   * @return Google_Service_Slides_ReplaceAllShapesWithSheetsChartResponse
   */
  public function getReplaceAllShapesWithSheetsChart()
  {
    return $this->replaceAllShapesWithSheetsChart;
  }
  /**
   * @param Google_Service_Slides_ReplaceAllTextResponse
   */
  public function setReplaceAllText(Google_Service_Slides_ReplaceAllTextResponse $replaceAllText)
  {
    $this->replaceAllText = $replaceAllText;
  }
  /**
   * @return Google_Service_Slides_ReplaceAllTextResponse
   */
  public function getReplaceAllText()
  {
    return $this->replaceAllText;
  }
}
