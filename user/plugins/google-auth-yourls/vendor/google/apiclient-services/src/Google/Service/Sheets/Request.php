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

class Google_Service_Sheets_Request extends Google_Model
{
  protected $addBandingType = 'Google_Service_Sheets_AddBandingRequest';
  protected $addBandingDataType = '';
  protected $addChartType = 'Google_Service_Sheets_AddChartRequest';
  protected $addChartDataType = '';
  protected $addConditionalFormatRuleType = 'Google_Service_Sheets_AddConditionalFormatRuleRequest';
  protected $addConditionalFormatRuleDataType = '';
  protected $addFilterViewType = 'Google_Service_Sheets_AddFilterViewRequest';
  protected $addFilterViewDataType = '';
  protected $addNamedRangeType = 'Google_Service_Sheets_AddNamedRangeRequest';
  protected $addNamedRangeDataType = '';
  protected $addProtectedRangeType = 'Google_Service_Sheets_AddProtectedRangeRequest';
  protected $addProtectedRangeDataType = '';
  protected $addSheetType = 'Google_Service_Sheets_AddSheetRequest';
  protected $addSheetDataType = '';
  protected $appendCellsType = 'Google_Service_Sheets_AppendCellsRequest';
  protected $appendCellsDataType = '';
  protected $appendDimensionType = 'Google_Service_Sheets_AppendDimensionRequest';
  protected $appendDimensionDataType = '';
  protected $autoFillType = 'Google_Service_Sheets_AutoFillRequest';
  protected $autoFillDataType = '';
  protected $autoResizeDimensionsType = 'Google_Service_Sheets_AutoResizeDimensionsRequest';
  protected $autoResizeDimensionsDataType = '';
  protected $clearBasicFilterType = 'Google_Service_Sheets_ClearBasicFilterRequest';
  protected $clearBasicFilterDataType = '';
  protected $copyPasteType = 'Google_Service_Sheets_CopyPasteRequest';
  protected $copyPasteDataType = '';
  protected $createDeveloperMetadataType = 'Google_Service_Sheets_CreateDeveloperMetadataRequest';
  protected $createDeveloperMetadataDataType = '';
  protected $cutPasteType = 'Google_Service_Sheets_CutPasteRequest';
  protected $cutPasteDataType = '';
  protected $deleteBandingType = 'Google_Service_Sheets_DeleteBandingRequest';
  protected $deleteBandingDataType = '';
  protected $deleteConditionalFormatRuleType = 'Google_Service_Sheets_DeleteConditionalFormatRuleRequest';
  protected $deleteConditionalFormatRuleDataType = '';
  protected $deleteDeveloperMetadataType = 'Google_Service_Sheets_DeleteDeveloperMetadataRequest';
  protected $deleteDeveloperMetadataDataType = '';
  protected $deleteDimensionType = 'Google_Service_Sheets_DeleteDimensionRequest';
  protected $deleteDimensionDataType = '';
  protected $deleteEmbeddedObjectType = 'Google_Service_Sheets_DeleteEmbeddedObjectRequest';
  protected $deleteEmbeddedObjectDataType = '';
  protected $deleteFilterViewType = 'Google_Service_Sheets_DeleteFilterViewRequest';
  protected $deleteFilterViewDataType = '';
  protected $deleteNamedRangeType = 'Google_Service_Sheets_DeleteNamedRangeRequest';
  protected $deleteNamedRangeDataType = '';
  protected $deleteProtectedRangeType = 'Google_Service_Sheets_DeleteProtectedRangeRequest';
  protected $deleteProtectedRangeDataType = '';
  protected $deleteRangeType = 'Google_Service_Sheets_DeleteRangeRequest';
  protected $deleteRangeDataType = '';
  protected $deleteSheetType = 'Google_Service_Sheets_DeleteSheetRequest';
  protected $deleteSheetDataType = '';
  protected $duplicateFilterViewType = 'Google_Service_Sheets_DuplicateFilterViewRequest';
  protected $duplicateFilterViewDataType = '';
  protected $duplicateSheetType = 'Google_Service_Sheets_DuplicateSheetRequest';
  protected $duplicateSheetDataType = '';
  protected $findReplaceType = 'Google_Service_Sheets_FindReplaceRequest';
  protected $findReplaceDataType = '';
  protected $insertDimensionType = 'Google_Service_Sheets_InsertDimensionRequest';
  protected $insertDimensionDataType = '';
  protected $insertRangeType = 'Google_Service_Sheets_InsertRangeRequest';
  protected $insertRangeDataType = '';
  protected $mergeCellsType = 'Google_Service_Sheets_MergeCellsRequest';
  protected $mergeCellsDataType = '';
  protected $moveDimensionType = 'Google_Service_Sheets_MoveDimensionRequest';
  protected $moveDimensionDataType = '';
  protected $pasteDataType = 'Google_Service_Sheets_PasteDataRequest';
  protected $pasteDataDataType = '';
  protected $randomizeRangeType = 'Google_Service_Sheets_RandomizeRangeRequest';
  protected $randomizeRangeDataType = '';
  protected $repeatCellType = 'Google_Service_Sheets_RepeatCellRequest';
  protected $repeatCellDataType = '';
  protected $setBasicFilterType = 'Google_Service_Sheets_SetBasicFilterRequest';
  protected $setBasicFilterDataType = '';
  protected $setDataValidationType = 'Google_Service_Sheets_SetDataValidationRequest';
  protected $setDataValidationDataType = '';
  protected $sortRangeType = 'Google_Service_Sheets_SortRangeRequest';
  protected $sortRangeDataType = '';
  protected $textToColumnsType = 'Google_Service_Sheets_TextToColumnsRequest';
  protected $textToColumnsDataType = '';
  protected $unmergeCellsType = 'Google_Service_Sheets_UnmergeCellsRequest';
  protected $unmergeCellsDataType = '';
  protected $updateBandingType = 'Google_Service_Sheets_UpdateBandingRequest';
  protected $updateBandingDataType = '';
  protected $updateBordersType = 'Google_Service_Sheets_UpdateBordersRequest';
  protected $updateBordersDataType = '';
  protected $updateCellsType = 'Google_Service_Sheets_UpdateCellsRequest';
  protected $updateCellsDataType = '';
  protected $updateChartSpecType = 'Google_Service_Sheets_UpdateChartSpecRequest';
  protected $updateChartSpecDataType = '';
  protected $updateConditionalFormatRuleType = 'Google_Service_Sheets_UpdateConditionalFormatRuleRequest';
  protected $updateConditionalFormatRuleDataType = '';
  protected $updateDeveloperMetadataType = 'Google_Service_Sheets_UpdateDeveloperMetadataRequest';
  protected $updateDeveloperMetadataDataType = '';
  protected $updateDimensionPropertiesType = 'Google_Service_Sheets_UpdateDimensionPropertiesRequest';
  protected $updateDimensionPropertiesDataType = '';
  protected $updateEmbeddedObjectPositionType = 'Google_Service_Sheets_UpdateEmbeddedObjectPositionRequest';
  protected $updateEmbeddedObjectPositionDataType = '';
  protected $updateFilterViewType = 'Google_Service_Sheets_UpdateFilterViewRequest';
  protected $updateFilterViewDataType = '';
  protected $updateNamedRangeType = 'Google_Service_Sheets_UpdateNamedRangeRequest';
  protected $updateNamedRangeDataType = '';
  protected $updateProtectedRangeType = 'Google_Service_Sheets_UpdateProtectedRangeRequest';
  protected $updateProtectedRangeDataType = '';
  protected $updateSheetPropertiesType = 'Google_Service_Sheets_UpdateSheetPropertiesRequest';
  protected $updateSheetPropertiesDataType = '';
  protected $updateSpreadsheetPropertiesType = 'Google_Service_Sheets_UpdateSpreadsheetPropertiesRequest';
  protected $updateSpreadsheetPropertiesDataType = '';

  /**
   * @param Google_Service_Sheets_AddBandingRequest
   */
  public function setAddBanding(Google_Service_Sheets_AddBandingRequest $addBanding)
  {
    $this->addBanding = $addBanding;
  }
  /**
   * @return Google_Service_Sheets_AddBandingRequest
   */
  public function getAddBanding()
  {
    return $this->addBanding;
  }
  /**
   * @param Google_Service_Sheets_AddChartRequest
   */
  public function setAddChart(Google_Service_Sheets_AddChartRequest $addChart)
  {
    $this->addChart = $addChart;
  }
  /**
   * @return Google_Service_Sheets_AddChartRequest
   */
  public function getAddChart()
  {
    return $this->addChart;
  }
  /**
   * @param Google_Service_Sheets_AddConditionalFormatRuleRequest
   */
  public function setAddConditionalFormatRule(Google_Service_Sheets_AddConditionalFormatRuleRequest $addConditionalFormatRule)
  {
    $this->addConditionalFormatRule = $addConditionalFormatRule;
  }
  /**
   * @return Google_Service_Sheets_AddConditionalFormatRuleRequest
   */
  public function getAddConditionalFormatRule()
  {
    return $this->addConditionalFormatRule;
  }
  /**
   * @param Google_Service_Sheets_AddFilterViewRequest
   */
  public function setAddFilterView(Google_Service_Sheets_AddFilterViewRequest $addFilterView)
  {
    $this->addFilterView = $addFilterView;
  }
  /**
   * @return Google_Service_Sheets_AddFilterViewRequest
   */
  public function getAddFilterView()
  {
    return $this->addFilterView;
  }
  /**
   * @param Google_Service_Sheets_AddNamedRangeRequest
   */
  public function setAddNamedRange(Google_Service_Sheets_AddNamedRangeRequest $addNamedRange)
  {
    $this->addNamedRange = $addNamedRange;
  }
  /**
   * @return Google_Service_Sheets_AddNamedRangeRequest
   */
  public function getAddNamedRange()
  {
    return $this->addNamedRange;
  }
  /**
   * @param Google_Service_Sheets_AddProtectedRangeRequest
   */
  public function setAddProtectedRange(Google_Service_Sheets_AddProtectedRangeRequest $addProtectedRange)
  {
    $this->addProtectedRange = $addProtectedRange;
  }
  /**
   * @return Google_Service_Sheets_AddProtectedRangeRequest
   */
  public function getAddProtectedRange()
  {
    return $this->addProtectedRange;
  }
  /**
   * @param Google_Service_Sheets_AddSheetRequest
   */
  public function setAddSheet(Google_Service_Sheets_AddSheetRequest $addSheet)
  {
    $this->addSheet = $addSheet;
  }
  /**
   * @return Google_Service_Sheets_AddSheetRequest
   */
  public function getAddSheet()
  {
    return $this->addSheet;
  }
  /**
   * @param Google_Service_Sheets_AppendCellsRequest
   */
  public function setAppendCells(Google_Service_Sheets_AppendCellsRequest $appendCells)
  {
    $this->appendCells = $appendCells;
  }
  /**
   * @return Google_Service_Sheets_AppendCellsRequest
   */
  public function getAppendCells()
  {
    return $this->appendCells;
  }
  /**
   * @param Google_Service_Sheets_AppendDimensionRequest
   */
  public function setAppendDimension(Google_Service_Sheets_AppendDimensionRequest $appendDimension)
  {
    $this->appendDimension = $appendDimension;
  }
  /**
   * @return Google_Service_Sheets_AppendDimensionRequest
   */
  public function getAppendDimension()
  {
    return $this->appendDimension;
  }
  /**
   * @param Google_Service_Sheets_AutoFillRequest
   */
  public function setAutoFill(Google_Service_Sheets_AutoFillRequest $autoFill)
  {
    $this->autoFill = $autoFill;
  }
  /**
   * @return Google_Service_Sheets_AutoFillRequest
   */
  public function getAutoFill()
  {
    return $this->autoFill;
  }
  /**
   * @param Google_Service_Sheets_AutoResizeDimensionsRequest
   */
  public function setAutoResizeDimensions(Google_Service_Sheets_AutoResizeDimensionsRequest $autoResizeDimensions)
  {
    $this->autoResizeDimensions = $autoResizeDimensions;
  }
  /**
   * @return Google_Service_Sheets_AutoResizeDimensionsRequest
   */
  public function getAutoResizeDimensions()
  {
    return $this->autoResizeDimensions;
  }
  /**
   * @param Google_Service_Sheets_ClearBasicFilterRequest
   */
  public function setClearBasicFilter(Google_Service_Sheets_ClearBasicFilterRequest $clearBasicFilter)
  {
    $this->clearBasicFilter = $clearBasicFilter;
  }
  /**
   * @return Google_Service_Sheets_ClearBasicFilterRequest
   */
  public function getClearBasicFilter()
  {
    return $this->clearBasicFilter;
  }
  /**
   * @param Google_Service_Sheets_CopyPasteRequest
   */
  public function setCopyPaste(Google_Service_Sheets_CopyPasteRequest $copyPaste)
  {
    $this->copyPaste = $copyPaste;
  }
  /**
   * @return Google_Service_Sheets_CopyPasteRequest
   */
  public function getCopyPaste()
  {
    return $this->copyPaste;
  }
  /**
   * @param Google_Service_Sheets_CreateDeveloperMetadataRequest
   */
  public function setCreateDeveloperMetadata(Google_Service_Sheets_CreateDeveloperMetadataRequest $createDeveloperMetadata)
  {
    $this->createDeveloperMetadata = $createDeveloperMetadata;
  }
  /**
   * @return Google_Service_Sheets_CreateDeveloperMetadataRequest
   */
  public function getCreateDeveloperMetadata()
  {
    return $this->createDeveloperMetadata;
  }
  /**
   * @param Google_Service_Sheets_CutPasteRequest
   */
  public function setCutPaste(Google_Service_Sheets_CutPasteRequest $cutPaste)
  {
    $this->cutPaste = $cutPaste;
  }
  /**
   * @return Google_Service_Sheets_CutPasteRequest
   */
  public function getCutPaste()
  {
    return $this->cutPaste;
  }
  /**
   * @param Google_Service_Sheets_DeleteBandingRequest
   */
  public function setDeleteBanding(Google_Service_Sheets_DeleteBandingRequest $deleteBanding)
  {
    $this->deleteBanding = $deleteBanding;
  }
  /**
   * @return Google_Service_Sheets_DeleteBandingRequest
   */
  public function getDeleteBanding()
  {
    return $this->deleteBanding;
  }
  /**
   * @param Google_Service_Sheets_DeleteConditionalFormatRuleRequest
   */
  public function setDeleteConditionalFormatRule(Google_Service_Sheets_DeleteConditionalFormatRuleRequest $deleteConditionalFormatRule)
  {
    $this->deleteConditionalFormatRule = $deleteConditionalFormatRule;
  }
  /**
   * @return Google_Service_Sheets_DeleteConditionalFormatRuleRequest
   */
  public function getDeleteConditionalFormatRule()
  {
    return $this->deleteConditionalFormatRule;
  }
  /**
   * @param Google_Service_Sheets_DeleteDeveloperMetadataRequest
   */
  public function setDeleteDeveloperMetadata(Google_Service_Sheets_DeleteDeveloperMetadataRequest $deleteDeveloperMetadata)
  {
    $this->deleteDeveloperMetadata = $deleteDeveloperMetadata;
  }
  /**
   * @return Google_Service_Sheets_DeleteDeveloperMetadataRequest
   */
  public function getDeleteDeveloperMetadata()
  {
    return $this->deleteDeveloperMetadata;
  }
  /**
   * @param Google_Service_Sheets_DeleteDimensionRequest
   */
  public function setDeleteDimension(Google_Service_Sheets_DeleteDimensionRequest $deleteDimension)
  {
    $this->deleteDimension = $deleteDimension;
  }
  /**
   * @return Google_Service_Sheets_DeleteDimensionRequest
   */
  public function getDeleteDimension()
  {
    return $this->deleteDimension;
  }
  /**
   * @param Google_Service_Sheets_DeleteEmbeddedObjectRequest
   */
  public function setDeleteEmbeddedObject(Google_Service_Sheets_DeleteEmbeddedObjectRequest $deleteEmbeddedObject)
  {
    $this->deleteEmbeddedObject = $deleteEmbeddedObject;
  }
  /**
   * @return Google_Service_Sheets_DeleteEmbeddedObjectRequest
   */
  public function getDeleteEmbeddedObject()
  {
    return $this->deleteEmbeddedObject;
  }
  /**
   * @param Google_Service_Sheets_DeleteFilterViewRequest
   */
  public function setDeleteFilterView(Google_Service_Sheets_DeleteFilterViewRequest $deleteFilterView)
  {
    $this->deleteFilterView = $deleteFilterView;
  }
  /**
   * @return Google_Service_Sheets_DeleteFilterViewRequest
   */
  public function getDeleteFilterView()
  {
    return $this->deleteFilterView;
  }
  /**
   * @param Google_Service_Sheets_DeleteNamedRangeRequest
   */
  public function setDeleteNamedRange(Google_Service_Sheets_DeleteNamedRangeRequest $deleteNamedRange)
  {
    $this->deleteNamedRange = $deleteNamedRange;
  }
  /**
   * @return Google_Service_Sheets_DeleteNamedRangeRequest
   */
  public function getDeleteNamedRange()
  {
    return $this->deleteNamedRange;
  }
  /**
   * @param Google_Service_Sheets_DeleteProtectedRangeRequest
   */
  public function setDeleteProtectedRange(Google_Service_Sheets_DeleteProtectedRangeRequest $deleteProtectedRange)
  {
    $this->deleteProtectedRange = $deleteProtectedRange;
  }
  /**
   * @return Google_Service_Sheets_DeleteProtectedRangeRequest
   */
  public function getDeleteProtectedRange()
  {
    return $this->deleteProtectedRange;
  }
  /**
   * @param Google_Service_Sheets_DeleteRangeRequest
   */
  public function setDeleteRange(Google_Service_Sheets_DeleteRangeRequest $deleteRange)
  {
    $this->deleteRange = $deleteRange;
  }
  /**
   * @return Google_Service_Sheets_DeleteRangeRequest
   */
  public function getDeleteRange()
  {
    return $this->deleteRange;
  }
  /**
   * @param Google_Service_Sheets_DeleteSheetRequest
   */
  public function setDeleteSheet(Google_Service_Sheets_DeleteSheetRequest $deleteSheet)
  {
    $this->deleteSheet = $deleteSheet;
  }
  /**
   * @return Google_Service_Sheets_DeleteSheetRequest
   */
  public function getDeleteSheet()
  {
    return $this->deleteSheet;
  }
  /**
   * @param Google_Service_Sheets_DuplicateFilterViewRequest
   */
  public function setDuplicateFilterView(Google_Service_Sheets_DuplicateFilterViewRequest $duplicateFilterView)
  {
    $this->duplicateFilterView = $duplicateFilterView;
  }
  /**
   * @return Google_Service_Sheets_DuplicateFilterViewRequest
   */
  public function getDuplicateFilterView()
  {
    return $this->duplicateFilterView;
  }
  /**
   * @param Google_Service_Sheets_DuplicateSheetRequest
   */
  public function setDuplicateSheet(Google_Service_Sheets_DuplicateSheetRequest $duplicateSheet)
  {
    $this->duplicateSheet = $duplicateSheet;
  }
  /**
   * @return Google_Service_Sheets_DuplicateSheetRequest
   */
  public function getDuplicateSheet()
  {
    return $this->duplicateSheet;
  }
  /**
   * @param Google_Service_Sheets_FindReplaceRequest
   */
  public function setFindReplace(Google_Service_Sheets_FindReplaceRequest $findReplace)
  {
    $this->findReplace = $findReplace;
  }
  /**
   * @return Google_Service_Sheets_FindReplaceRequest
   */
  public function getFindReplace()
  {
    return $this->findReplace;
  }
  /**
   * @param Google_Service_Sheets_InsertDimensionRequest
   */
  public function setInsertDimension(Google_Service_Sheets_InsertDimensionRequest $insertDimension)
  {
    $this->insertDimension = $insertDimension;
  }
  /**
   * @return Google_Service_Sheets_InsertDimensionRequest
   */
  public function getInsertDimension()
  {
    return $this->insertDimension;
  }
  /**
   * @param Google_Service_Sheets_InsertRangeRequest
   */
  public function setInsertRange(Google_Service_Sheets_InsertRangeRequest $insertRange)
  {
    $this->insertRange = $insertRange;
  }
  /**
   * @return Google_Service_Sheets_InsertRangeRequest
   */
  public function getInsertRange()
  {
    return $this->insertRange;
  }
  /**
   * @param Google_Service_Sheets_MergeCellsRequest
   */
  public function setMergeCells(Google_Service_Sheets_MergeCellsRequest $mergeCells)
  {
    $this->mergeCells = $mergeCells;
  }
  /**
   * @return Google_Service_Sheets_MergeCellsRequest
   */
  public function getMergeCells()
  {
    return $this->mergeCells;
  }
  /**
   * @param Google_Service_Sheets_MoveDimensionRequest
   */
  public function setMoveDimension(Google_Service_Sheets_MoveDimensionRequest $moveDimension)
  {
    $this->moveDimension = $moveDimension;
  }
  /**
   * @return Google_Service_Sheets_MoveDimensionRequest
   */
  public function getMoveDimension()
  {
    return $this->moveDimension;
  }
  /**
   * @param Google_Service_Sheets_PasteDataRequest
   */
  public function setPasteData(Google_Service_Sheets_PasteDataRequest $pasteData)
  {
    $this->pasteData = $pasteData;
  }
  /**
   * @return Google_Service_Sheets_PasteDataRequest
   */
  public function getPasteData()
  {
    return $this->pasteData;
  }
  /**
   * @param Google_Service_Sheets_RandomizeRangeRequest
   */
  public function setRandomizeRange(Google_Service_Sheets_RandomizeRangeRequest $randomizeRange)
  {
    $this->randomizeRange = $randomizeRange;
  }
  /**
   * @return Google_Service_Sheets_RandomizeRangeRequest
   */
  public function getRandomizeRange()
  {
    return $this->randomizeRange;
  }
  /**
   * @param Google_Service_Sheets_RepeatCellRequest
   */
  public function setRepeatCell(Google_Service_Sheets_RepeatCellRequest $repeatCell)
  {
    $this->repeatCell = $repeatCell;
  }
  /**
   * @return Google_Service_Sheets_RepeatCellRequest
   */
  public function getRepeatCell()
  {
    return $this->repeatCell;
  }
  /**
   * @param Google_Service_Sheets_SetBasicFilterRequest
   */
  public function setSetBasicFilter(Google_Service_Sheets_SetBasicFilterRequest $setBasicFilter)
  {
    $this->setBasicFilter = $setBasicFilter;
  }
  /**
   * @return Google_Service_Sheets_SetBasicFilterRequest
   */
  public function getSetBasicFilter()
  {
    return $this->setBasicFilter;
  }
  /**
   * @param Google_Service_Sheets_SetDataValidationRequest
   */
  public function setSetDataValidation(Google_Service_Sheets_SetDataValidationRequest $setDataValidation)
  {
    $this->setDataValidation = $setDataValidation;
  }
  /**
   * @return Google_Service_Sheets_SetDataValidationRequest
   */
  public function getSetDataValidation()
  {
    return $this->setDataValidation;
  }
  /**
   * @param Google_Service_Sheets_SortRangeRequest
   */
  public function setSortRange(Google_Service_Sheets_SortRangeRequest $sortRange)
  {
    $this->sortRange = $sortRange;
  }
  /**
   * @return Google_Service_Sheets_SortRangeRequest
   */
  public function getSortRange()
  {
    return $this->sortRange;
  }
  /**
   * @param Google_Service_Sheets_TextToColumnsRequest
   */
  public function setTextToColumns(Google_Service_Sheets_TextToColumnsRequest $textToColumns)
  {
    $this->textToColumns = $textToColumns;
  }
  /**
   * @return Google_Service_Sheets_TextToColumnsRequest
   */
  public function getTextToColumns()
  {
    return $this->textToColumns;
  }
  /**
   * @param Google_Service_Sheets_UnmergeCellsRequest
   */
  public function setUnmergeCells(Google_Service_Sheets_UnmergeCellsRequest $unmergeCells)
  {
    $this->unmergeCells = $unmergeCells;
  }
  /**
   * @return Google_Service_Sheets_UnmergeCellsRequest
   */
  public function getUnmergeCells()
  {
    return $this->unmergeCells;
  }
  /**
   * @param Google_Service_Sheets_UpdateBandingRequest
   */
  public function setUpdateBanding(Google_Service_Sheets_UpdateBandingRequest $updateBanding)
  {
    $this->updateBanding = $updateBanding;
  }
  /**
   * @return Google_Service_Sheets_UpdateBandingRequest
   */
  public function getUpdateBanding()
  {
    return $this->updateBanding;
  }
  /**
   * @param Google_Service_Sheets_UpdateBordersRequest
   */
  public function setUpdateBorders(Google_Service_Sheets_UpdateBordersRequest $updateBorders)
  {
    $this->updateBorders = $updateBorders;
  }
  /**
   * @return Google_Service_Sheets_UpdateBordersRequest
   */
  public function getUpdateBorders()
  {
    return $this->updateBorders;
  }
  /**
   * @param Google_Service_Sheets_UpdateCellsRequest
   */
  public function setUpdateCells(Google_Service_Sheets_UpdateCellsRequest $updateCells)
  {
    $this->updateCells = $updateCells;
  }
  /**
   * @return Google_Service_Sheets_UpdateCellsRequest
   */
  public function getUpdateCells()
  {
    return $this->updateCells;
  }
  /**
   * @param Google_Service_Sheets_UpdateChartSpecRequest
   */
  public function setUpdateChartSpec(Google_Service_Sheets_UpdateChartSpecRequest $updateChartSpec)
  {
    $this->updateChartSpec = $updateChartSpec;
  }
  /**
   * @return Google_Service_Sheets_UpdateChartSpecRequest
   */
  public function getUpdateChartSpec()
  {
    return $this->updateChartSpec;
  }
  /**
   * @param Google_Service_Sheets_UpdateConditionalFormatRuleRequest
   */
  public function setUpdateConditionalFormatRule(Google_Service_Sheets_UpdateConditionalFormatRuleRequest $updateConditionalFormatRule)
  {
    $this->updateConditionalFormatRule = $updateConditionalFormatRule;
  }
  /**
   * @return Google_Service_Sheets_UpdateConditionalFormatRuleRequest
   */
  public function getUpdateConditionalFormatRule()
  {
    return $this->updateConditionalFormatRule;
  }
  /**
   * @param Google_Service_Sheets_UpdateDeveloperMetadataRequest
   */
  public function setUpdateDeveloperMetadata(Google_Service_Sheets_UpdateDeveloperMetadataRequest $updateDeveloperMetadata)
  {
    $this->updateDeveloperMetadata = $updateDeveloperMetadata;
  }
  /**
   * @return Google_Service_Sheets_UpdateDeveloperMetadataRequest
   */
  public function getUpdateDeveloperMetadata()
  {
    return $this->updateDeveloperMetadata;
  }
  /**
   * @param Google_Service_Sheets_UpdateDimensionPropertiesRequest
   */
  public function setUpdateDimensionProperties(Google_Service_Sheets_UpdateDimensionPropertiesRequest $updateDimensionProperties)
  {
    $this->updateDimensionProperties = $updateDimensionProperties;
  }
  /**
   * @return Google_Service_Sheets_UpdateDimensionPropertiesRequest
   */
  public function getUpdateDimensionProperties()
  {
    return $this->updateDimensionProperties;
  }
  /**
   * @param Google_Service_Sheets_UpdateEmbeddedObjectPositionRequest
   */
  public function setUpdateEmbeddedObjectPosition(Google_Service_Sheets_UpdateEmbeddedObjectPositionRequest $updateEmbeddedObjectPosition)
  {
    $this->updateEmbeddedObjectPosition = $updateEmbeddedObjectPosition;
  }
  /**
   * @return Google_Service_Sheets_UpdateEmbeddedObjectPositionRequest
   */
  public function getUpdateEmbeddedObjectPosition()
  {
    return $this->updateEmbeddedObjectPosition;
  }
  /**
   * @param Google_Service_Sheets_UpdateFilterViewRequest
   */
  public function setUpdateFilterView(Google_Service_Sheets_UpdateFilterViewRequest $updateFilterView)
  {
    $this->updateFilterView = $updateFilterView;
  }
  /**
   * @return Google_Service_Sheets_UpdateFilterViewRequest
   */
  public function getUpdateFilterView()
  {
    return $this->updateFilterView;
  }
  /**
   * @param Google_Service_Sheets_UpdateNamedRangeRequest
   */
  public function setUpdateNamedRange(Google_Service_Sheets_UpdateNamedRangeRequest $updateNamedRange)
  {
    $this->updateNamedRange = $updateNamedRange;
  }
  /**
   * @return Google_Service_Sheets_UpdateNamedRangeRequest
   */
  public function getUpdateNamedRange()
  {
    return $this->updateNamedRange;
  }
  /**
   * @param Google_Service_Sheets_UpdateProtectedRangeRequest
   */
  public function setUpdateProtectedRange(Google_Service_Sheets_UpdateProtectedRangeRequest $updateProtectedRange)
  {
    $this->updateProtectedRange = $updateProtectedRange;
  }
  /**
   * @return Google_Service_Sheets_UpdateProtectedRangeRequest
   */
  public function getUpdateProtectedRange()
  {
    return $this->updateProtectedRange;
  }
  /**
   * @param Google_Service_Sheets_UpdateSheetPropertiesRequest
   */
  public function setUpdateSheetProperties(Google_Service_Sheets_UpdateSheetPropertiesRequest $updateSheetProperties)
  {
    $this->updateSheetProperties = $updateSheetProperties;
  }
  /**
   * @return Google_Service_Sheets_UpdateSheetPropertiesRequest
   */
  public function getUpdateSheetProperties()
  {
    return $this->updateSheetProperties;
  }
  /**
   * @param Google_Service_Sheets_UpdateSpreadsheetPropertiesRequest
   */
  public function setUpdateSpreadsheetProperties(Google_Service_Sheets_UpdateSpreadsheetPropertiesRequest $updateSpreadsheetProperties)
  {
    $this->updateSpreadsheetProperties = $updateSpreadsheetProperties;
  }
  /**
   * @return Google_Service_Sheets_UpdateSpreadsheetPropertiesRequest
   */
  public function getUpdateSpreadsheetProperties()
  {
    return $this->updateSpreadsheetProperties;
  }
}
