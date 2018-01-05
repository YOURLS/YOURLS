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

class Google_Service_Slides_Request extends Google_Model
{
  protected $createImageType = 'Google_Service_Slides_CreateImageRequest';
  protected $createImageDataType = '';
  protected $createLineType = 'Google_Service_Slides_CreateLineRequest';
  protected $createLineDataType = '';
  protected $createParagraphBulletsType = 'Google_Service_Slides_CreateParagraphBulletsRequest';
  protected $createParagraphBulletsDataType = '';
  protected $createShapeType = 'Google_Service_Slides_CreateShapeRequest';
  protected $createShapeDataType = '';
  protected $createSheetsChartType = 'Google_Service_Slides_CreateSheetsChartRequest';
  protected $createSheetsChartDataType = '';
  protected $createSlideType = 'Google_Service_Slides_CreateSlideRequest';
  protected $createSlideDataType = '';
  protected $createTableType = 'Google_Service_Slides_CreateTableRequest';
  protected $createTableDataType = '';
  protected $createVideoType = 'Google_Service_Slides_CreateVideoRequest';
  protected $createVideoDataType = '';
  protected $deleteObjectType = 'Google_Service_Slides_DeleteObjectRequest';
  protected $deleteObjectDataType = '';
  protected $deleteParagraphBulletsType = 'Google_Service_Slides_DeleteParagraphBulletsRequest';
  protected $deleteParagraphBulletsDataType = '';
  protected $deleteTableColumnType = 'Google_Service_Slides_DeleteTableColumnRequest';
  protected $deleteTableColumnDataType = '';
  protected $deleteTableRowType = 'Google_Service_Slides_DeleteTableRowRequest';
  protected $deleteTableRowDataType = '';
  protected $deleteTextType = 'Google_Service_Slides_DeleteTextRequest';
  protected $deleteTextDataType = '';
  protected $duplicateObjectType = 'Google_Service_Slides_DuplicateObjectRequest';
  protected $duplicateObjectDataType = '';
  protected $groupObjectsType = 'Google_Service_Slides_GroupObjectsRequest';
  protected $groupObjectsDataType = '';
  protected $insertTableColumnsType = 'Google_Service_Slides_InsertTableColumnsRequest';
  protected $insertTableColumnsDataType = '';
  protected $insertTableRowsType = 'Google_Service_Slides_InsertTableRowsRequest';
  protected $insertTableRowsDataType = '';
  protected $insertTextType = 'Google_Service_Slides_InsertTextRequest';
  protected $insertTextDataType = '';
  protected $mergeTableCellsType = 'Google_Service_Slides_MergeTableCellsRequest';
  protected $mergeTableCellsDataType = '';
  protected $refreshSheetsChartType = 'Google_Service_Slides_RefreshSheetsChartRequest';
  protected $refreshSheetsChartDataType = '';
  protected $replaceAllShapesWithImageType = 'Google_Service_Slides_ReplaceAllShapesWithImageRequest';
  protected $replaceAllShapesWithImageDataType = '';
  protected $replaceAllShapesWithSheetsChartType = 'Google_Service_Slides_ReplaceAllShapesWithSheetsChartRequest';
  protected $replaceAllShapesWithSheetsChartDataType = '';
  protected $replaceAllTextType = 'Google_Service_Slides_ReplaceAllTextRequest';
  protected $replaceAllTextDataType = '';
  protected $ungroupObjectsType = 'Google_Service_Slides_UngroupObjectsRequest';
  protected $ungroupObjectsDataType = '';
  protected $unmergeTableCellsType = 'Google_Service_Slides_UnmergeTableCellsRequest';
  protected $unmergeTableCellsDataType = '';
  protected $updateImagePropertiesType = 'Google_Service_Slides_UpdateImagePropertiesRequest';
  protected $updateImagePropertiesDataType = '';
  protected $updateLinePropertiesType = 'Google_Service_Slides_UpdateLinePropertiesRequest';
  protected $updateLinePropertiesDataType = '';
  protected $updatePageElementTransformType = 'Google_Service_Slides_UpdatePageElementTransformRequest';
  protected $updatePageElementTransformDataType = '';
  protected $updatePagePropertiesType = 'Google_Service_Slides_UpdatePagePropertiesRequest';
  protected $updatePagePropertiesDataType = '';
  protected $updateParagraphStyleType = 'Google_Service_Slides_UpdateParagraphStyleRequest';
  protected $updateParagraphStyleDataType = '';
  protected $updateShapePropertiesType = 'Google_Service_Slides_UpdateShapePropertiesRequest';
  protected $updateShapePropertiesDataType = '';
  protected $updateSlidesPositionType = 'Google_Service_Slides_UpdateSlidesPositionRequest';
  protected $updateSlidesPositionDataType = '';
  protected $updateTableBorderPropertiesType = 'Google_Service_Slides_UpdateTableBorderPropertiesRequest';
  protected $updateTableBorderPropertiesDataType = '';
  protected $updateTableCellPropertiesType = 'Google_Service_Slides_UpdateTableCellPropertiesRequest';
  protected $updateTableCellPropertiesDataType = '';
  protected $updateTableColumnPropertiesType = 'Google_Service_Slides_UpdateTableColumnPropertiesRequest';
  protected $updateTableColumnPropertiesDataType = '';
  protected $updateTableRowPropertiesType = 'Google_Service_Slides_UpdateTableRowPropertiesRequest';
  protected $updateTableRowPropertiesDataType = '';
  protected $updateTextStyleType = 'Google_Service_Slides_UpdateTextStyleRequest';
  protected $updateTextStyleDataType = '';
  protected $updateVideoPropertiesType = 'Google_Service_Slides_UpdateVideoPropertiesRequest';
  protected $updateVideoPropertiesDataType = '';

  /**
   * @param Google_Service_Slides_CreateImageRequest
   */
  public function setCreateImage(Google_Service_Slides_CreateImageRequest $createImage)
  {
    $this->createImage = $createImage;
  }
  /**
   * @return Google_Service_Slides_CreateImageRequest
   */
  public function getCreateImage()
  {
    return $this->createImage;
  }
  /**
   * @param Google_Service_Slides_CreateLineRequest
   */
  public function setCreateLine(Google_Service_Slides_CreateLineRequest $createLine)
  {
    $this->createLine = $createLine;
  }
  /**
   * @return Google_Service_Slides_CreateLineRequest
   */
  public function getCreateLine()
  {
    return $this->createLine;
  }
  /**
   * @param Google_Service_Slides_CreateParagraphBulletsRequest
   */
  public function setCreateParagraphBullets(Google_Service_Slides_CreateParagraphBulletsRequest $createParagraphBullets)
  {
    $this->createParagraphBullets = $createParagraphBullets;
  }
  /**
   * @return Google_Service_Slides_CreateParagraphBulletsRequest
   */
  public function getCreateParagraphBullets()
  {
    return $this->createParagraphBullets;
  }
  /**
   * @param Google_Service_Slides_CreateShapeRequest
   */
  public function setCreateShape(Google_Service_Slides_CreateShapeRequest $createShape)
  {
    $this->createShape = $createShape;
  }
  /**
   * @return Google_Service_Slides_CreateShapeRequest
   */
  public function getCreateShape()
  {
    return $this->createShape;
  }
  /**
   * @param Google_Service_Slides_CreateSheetsChartRequest
   */
  public function setCreateSheetsChart(Google_Service_Slides_CreateSheetsChartRequest $createSheetsChart)
  {
    $this->createSheetsChart = $createSheetsChart;
  }
  /**
   * @return Google_Service_Slides_CreateSheetsChartRequest
   */
  public function getCreateSheetsChart()
  {
    return $this->createSheetsChart;
  }
  /**
   * @param Google_Service_Slides_CreateSlideRequest
   */
  public function setCreateSlide(Google_Service_Slides_CreateSlideRequest $createSlide)
  {
    $this->createSlide = $createSlide;
  }
  /**
   * @return Google_Service_Slides_CreateSlideRequest
   */
  public function getCreateSlide()
  {
    return $this->createSlide;
  }
  /**
   * @param Google_Service_Slides_CreateTableRequest
   */
  public function setCreateTable(Google_Service_Slides_CreateTableRequest $createTable)
  {
    $this->createTable = $createTable;
  }
  /**
   * @return Google_Service_Slides_CreateTableRequest
   */
  public function getCreateTable()
  {
    return $this->createTable;
  }
  /**
   * @param Google_Service_Slides_CreateVideoRequest
   */
  public function setCreateVideo(Google_Service_Slides_CreateVideoRequest $createVideo)
  {
    $this->createVideo = $createVideo;
  }
  /**
   * @return Google_Service_Slides_CreateVideoRequest
   */
  public function getCreateVideo()
  {
    return $this->createVideo;
  }
  /**
   * @param Google_Service_Slides_DeleteObjectRequest
   */
  public function setDeleteObject(Google_Service_Slides_DeleteObjectRequest $deleteObject)
  {
    $this->deleteObject = $deleteObject;
  }
  /**
   * @return Google_Service_Slides_DeleteObjectRequest
   */
  public function getDeleteObject()
  {
    return $this->deleteObject;
  }
  /**
   * @param Google_Service_Slides_DeleteParagraphBulletsRequest
   */
  public function setDeleteParagraphBullets(Google_Service_Slides_DeleteParagraphBulletsRequest $deleteParagraphBullets)
  {
    $this->deleteParagraphBullets = $deleteParagraphBullets;
  }
  /**
   * @return Google_Service_Slides_DeleteParagraphBulletsRequest
   */
  public function getDeleteParagraphBullets()
  {
    return $this->deleteParagraphBullets;
  }
  /**
   * @param Google_Service_Slides_DeleteTableColumnRequest
   */
  public function setDeleteTableColumn(Google_Service_Slides_DeleteTableColumnRequest $deleteTableColumn)
  {
    $this->deleteTableColumn = $deleteTableColumn;
  }
  /**
   * @return Google_Service_Slides_DeleteTableColumnRequest
   */
  public function getDeleteTableColumn()
  {
    return $this->deleteTableColumn;
  }
  /**
   * @param Google_Service_Slides_DeleteTableRowRequest
   */
  public function setDeleteTableRow(Google_Service_Slides_DeleteTableRowRequest $deleteTableRow)
  {
    $this->deleteTableRow = $deleteTableRow;
  }
  /**
   * @return Google_Service_Slides_DeleteTableRowRequest
   */
  public function getDeleteTableRow()
  {
    return $this->deleteTableRow;
  }
  /**
   * @param Google_Service_Slides_DeleteTextRequest
   */
  public function setDeleteText(Google_Service_Slides_DeleteTextRequest $deleteText)
  {
    $this->deleteText = $deleteText;
  }
  /**
   * @return Google_Service_Slides_DeleteTextRequest
   */
  public function getDeleteText()
  {
    return $this->deleteText;
  }
  /**
   * @param Google_Service_Slides_DuplicateObjectRequest
   */
  public function setDuplicateObject(Google_Service_Slides_DuplicateObjectRequest $duplicateObject)
  {
    $this->duplicateObject = $duplicateObject;
  }
  /**
   * @return Google_Service_Slides_DuplicateObjectRequest
   */
  public function getDuplicateObject()
  {
    return $this->duplicateObject;
  }
  /**
   * @param Google_Service_Slides_GroupObjectsRequest
   */
  public function setGroupObjects(Google_Service_Slides_GroupObjectsRequest $groupObjects)
  {
    $this->groupObjects = $groupObjects;
  }
  /**
   * @return Google_Service_Slides_GroupObjectsRequest
   */
  public function getGroupObjects()
  {
    return $this->groupObjects;
  }
  /**
   * @param Google_Service_Slides_InsertTableColumnsRequest
   */
  public function setInsertTableColumns(Google_Service_Slides_InsertTableColumnsRequest $insertTableColumns)
  {
    $this->insertTableColumns = $insertTableColumns;
  }
  /**
   * @return Google_Service_Slides_InsertTableColumnsRequest
   */
  public function getInsertTableColumns()
  {
    return $this->insertTableColumns;
  }
  /**
   * @param Google_Service_Slides_InsertTableRowsRequest
   */
  public function setInsertTableRows(Google_Service_Slides_InsertTableRowsRequest $insertTableRows)
  {
    $this->insertTableRows = $insertTableRows;
  }
  /**
   * @return Google_Service_Slides_InsertTableRowsRequest
   */
  public function getInsertTableRows()
  {
    return $this->insertTableRows;
  }
  /**
   * @param Google_Service_Slides_InsertTextRequest
   */
  public function setInsertText(Google_Service_Slides_InsertTextRequest $insertText)
  {
    $this->insertText = $insertText;
  }
  /**
   * @return Google_Service_Slides_InsertTextRequest
   */
  public function getInsertText()
  {
    return $this->insertText;
  }
  /**
   * @param Google_Service_Slides_MergeTableCellsRequest
   */
  public function setMergeTableCells(Google_Service_Slides_MergeTableCellsRequest $mergeTableCells)
  {
    $this->mergeTableCells = $mergeTableCells;
  }
  /**
   * @return Google_Service_Slides_MergeTableCellsRequest
   */
  public function getMergeTableCells()
  {
    return $this->mergeTableCells;
  }
  /**
   * @param Google_Service_Slides_RefreshSheetsChartRequest
   */
  public function setRefreshSheetsChart(Google_Service_Slides_RefreshSheetsChartRequest $refreshSheetsChart)
  {
    $this->refreshSheetsChart = $refreshSheetsChart;
  }
  /**
   * @return Google_Service_Slides_RefreshSheetsChartRequest
   */
  public function getRefreshSheetsChart()
  {
    return $this->refreshSheetsChart;
  }
  /**
   * @param Google_Service_Slides_ReplaceAllShapesWithImageRequest
   */
  public function setReplaceAllShapesWithImage(Google_Service_Slides_ReplaceAllShapesWithImageRequest $replaceAllShapesWithImage)
  {
    $this->replaceAllShapesWithImage = $replaceAllShapesWithImage;
  }
  /**
   * @return Google_Service_Slides_ReplaceAllShapesWithImageRequest
   */
  public function getReplaceAllShapesWithImage()
  {
    return $this->replaceAllShapesWithImage;
  }
  /**
   * @param Google_Service_Slides_ReplaceAllShapesWithSheetsChartRequest
   */
  public function setReplaceAllShapesWithSheetsChart(Google_Service_Slides_ReplaceAllShapesWithSheetsChartRequest $replaceAllShapesWithSheetsChart)
  {
    $this->replaceAllShapesWithSheetsChart = $replaceAllShapesWithSheetsChart;
  }
  /**
   * @return Google_Service_Slides_ReplaceAllShapesWithSheetsChartRequest
   */
  public function getReplaceAllShapesWithSheetsChart()
  {
    return $this->replaceAllShapesWithSheetsChart;
  }
  /**
   * @param Google_Service_Slides_ReplaceAllTextRequest
   */
  public function setReplaceAllText(Google_Service_Slides_ReplaceAllTextRequest $replaceAllText)
  {
    $this->replaceAllText = $replaceAllText;
  }
  /**
   * @return Google_Service_Slides_ReplaceAllTextRequest
   */
  public function getReplaceAllText()
  {
    return $this->replaceAllText;
  }
  /**
   * @param Google_Service_Slides_UngroupObjectsRequest
   */
  public function setUngroupObjects(Google_Service_Slides_UngroupObjectsRequest $ungroupObjects)
  {
    $this->ungroupObjects = $ungroupObjects;
  }
  /**
   * @return Google_Service_Slides_UngroupObjectsRequest
   */
  public function getUngroupObjects()
  {
    return $this->ungroupObjects;
  }
  /**
   * @param Google_Service_Slides_UnmergeTableCellsRequest
   */
  public function setUnmergeTableCells(Google_Service_Slides_UnmergeTableCellsRequest $unmergeTableCells)
  {
    $this->unmergeTableCells = $unmergeTableCells;
  }
  /**
   * @return Google_Service_Slides_UnmergeTableCellsRequest
   */
  public function getUnmergeTableCells()
  {
    return $this->unmergeTableCells;
  }
  /**
   * @param Google_Service_Slides_UpdateImagePropertiesRequest
   */
  public function setUpdateImageProperties(Google_Service_Slides_UpdateImagePropertiesRequest $updateImageProperties)
  {
    $this->updateImageProperties = $updateImageProperties;
  }
  /**
   * @return Google_Service_Slides_UpdateImagePropertiesRequest
   */
  public function getUpdateImageProperties()
  {
    return $this->updateImageProperties;
  }
  /**
   * @param Google_Service_Slides_UpdateLinePropertiesRequest
   */
  public function setUpdateLineProperties(Google_Service_Slides_UpdateLinePropertiesRequest $updateLineProperties)
  {
    $this->updateLineProperties = $updateLineProperties;
  }
  /**
   * @return Google_Service_Slides_UpdateLinePropertiesRequest
   */
  public function getUpdateLineProperties()
  {
    return $this->updateLineProperties;
  }
  /**
   * @param Google_Service_Slides_UpdatePageElementTransformRequest
   */
  public function setUpdatePageElementTransform(Google_Service_Slides_UpdatePageElementTransformRequest $updatePageElementTransform)
  {
    $this->updatePageElementTransform = $updatePageElementTransform;
  }
  /**
   * @return Google_Service_Slides_UpdatePageElementTransformRequest
   */
  public function getUpdatePageElementTransform()
  {
    return $this->updatePageElementTransform;
  }
  /**
   * @param Google_Service_Slides_UpdatePagePropertiesRequest
   */
  public function setUpdatePageProperties(Google_Service_Slides_UpdatePagePropertiesRequest $updatePageProperties)
  {
    $this->updatePageProperties = $updatePageProperties;
  }
  /**
   * @return Google_Service_Slides_UpdatePagePropertiesRequest
   */
  public function getUpdatePageProperties()
  {
    return $this->updatePageProperties;
  }
  /**
   * @param Google_Service_Slides_UpdateParagraphStyleRequest
   */
  public function setUpdateParagraphStyle(Google_Service_Slides_UpdateParagraphStyleRequest $updateParagraphStyle)
  {
    $this->updateParagraphStyle = $updateParagraphStyle;
  }
  /**
   * @return Google_Service_Slides_UpdateParagraphStyleRequest
   */
  public function getUpdateParagraphStyle()
  {
    return $this->updateParagraphStyle;
  }
  /**
   * @param Google_Service_Slides_UpdateShapePropertiesRequest
   */
  public function setUpdateShapeProperties(Google_Service_Slides_UpdateShapePropertiesRequest $updateShapeProperties)
  {
    $this->updateShapeProperties = $updateShapeProperties;
  }
  /**
   * @return Google_Service_Slides_UpdateShapePropertiesRequest
   */
  public function getUpdateShapeProperties()
  {
    return $this->updateShapeProperties;
  }
  /**
   * @param Google_Service_Slides_UpdateSlidesPositionRequest
   */
  public function setUpdateSlidesPosition(Google_Service_Slides_UpdateSlidesPositionRequest $updateSlidesPosition)
  {
    $this->updateSlidesPosition = $updateSlidesPosition;
  }
  /**
   * @return Google_Service_Slides_UpdateSlidesPositionRequest
   */
  public function getUpdateSlidesPosition()
  {
    return $this->updateSlidesPosition;
  }
  /**
   * @param Google_Service_Slides_UpdateTableBorderPropertiesRequest
   */
  public function setUpdateTableBorderProperties(Google_Service_Slides_UpdateTableBorderPropertiesRequest $updateTableBorderProperties)
  {
    $this->updateTableBorderProperties = $updateTableBorderProperties;
  }
  /**
   * @return Google_Service_Slides_UpdateTableBorderPropertiesRequest
   */
  public function getUpdateTableBorderProperties()
  {
    return $this->updateTableBorderProperties;
  }
  /**
   * @param Google_Service_Slides_UpdateTableCellPropertiesRequest
   */
  public function setUpdateTableCellProperties(Google_Service_Slides_UpdateTableCellPropertiesRequest $updateTableCellProperties)
  {
    $this->updateTableCellProperties = $updateTableCellProperties;
  }
  /**
   * @return Google_Service_Slides_UpdateTableCellPropertiesRequest
   */
  public function getUpdateTableCellProperties()
  {
    return $this->updateTableCellProperties;
  }
  /**
   * @param Google_Service_Slides_UpdateTableColumnPropertiesRequest
   */
  public function setUpdateTableColumnProperties(Google_Service_Slides_UpdateTableColumnPropertiesRequest $updateTableColumnProperties)
  {
    $this->updateTableColumnProperties = $updateTableColumnProperties;
  }
  /**
   * @return Google_Service_Slides_UpdateTableColumnPropertiesRequest
   */
  public function getUpdateTableColumnProperties()
  {
    return $this->updateTableColumnProperties;
  }
  /**
   * @param Google_Service_Slides_UpdateTableRowPropertiesRequest
   */
  public function setUpdateTableRowProperties(Google_Service_Slides_UpdateTableRowPropertiesRequest $updateTableRowProperties)
  {
    $this->updateTableRowProperties = $updateTableRowProperties;
  }
  /**
   * @return Google_Service_Slides_UpdateTableRowPropertiesRequest
   */
  public function getUpdateTableRowProperties()
  {
    return $this->updateTableRowProperties;
  }
  /**
   * @param Google_Service_Slides_UpdateTextStyleRequest
   */
  public function setUpdateTextStyle(Google_Service_Slides_UpdateTextStyleRequest $updateTextStyle)
  {
    $this->updateTextStyle = $updateTextStyle;
  }
  /**
   * @return Google_Service_Slides_UpdateTextStyleRequest
   */
  public function getUpdateTextStyle()
  {
    return $this->updateTextStyle;
  }
  /**
   * @param Google_Service_Slides_UpdateVideoPropertiesRequest
   */
  public function setUpdateVideoProperties(Google_Service_Slides_UpdateVideoPropertiesRequest $updateVideoProperties)
  {
    $this->updateVideoProperties = $updateVideoProperties;
  }
  /**
   * @return Google_Service_Slides_UpdateVideoPropertiesRequest
   */
  public function getUpdateVideoProperties()
  {
    return $this->updateVideoProperties;
  }
}
