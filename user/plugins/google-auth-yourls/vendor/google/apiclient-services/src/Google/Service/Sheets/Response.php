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

class Google_Service_Sheets_Response extends Google_Model
{
  protected $addBandingType = 'Google_Service_Sheets_AddBandingResponse';
  protected $addBandingDataType = '';
  protected $addChartType = 'Google_Service_Sheets_AddChartResponse';
  protected $addChartDataType = '';
  protected $addFilterViewType = 'Google_Service_Sheets_AddFilterViewResponse';
  protected $addFilterViewDataType = '';
  protected $addNamedRangeType = 'Google_Service_Sheets_AddNamedRangeResponse';
  protected $addNamedRangeDataType = '';
  protected $addProtectedRangeType = 'Google_Service_Sheets_AddProtectedRangeResponse';
  protected $addProtectedRangeDataType = '';
  protected $addSheetType = 'Google_Service_Sheets_AddSheetResponse';
  protected $addSheetDataType = '';
  protected $createDeveloperMetadataType = 'Google_Service_Sheets_CreateDeveloperMetadataResponse';
  protected $createDeveloperMetadataDataType = '';
  protected $deleteConditionalFormatRuleType = 'Google_Service_Sheets_DeleteConditionalFormatRuleResponse';
  protected $deleteConditionalFormatRuleDataType = '';
  protected $deleteDeveloperMetadataType = 'Google_Service_Sheets_DeleteDeveloperMetadataResponse';
  protected $deleteDeveloperMetadataDataType = '';
  protected $duplicateFilterViewType = 'Google_Service_Sheets_DuplicateFilterViewResponse';
  protected $duplicateFilterViewDataType = '';
  protected $duplicateSheetType = 'Google_Service_Sheets_DuplicateSheetResponse';
  protected $duplicateSheetDataType = '';
  protected $findReplaceType = 'Google_Service_Sheets_FindReplaceResponse';
  protected $findReplaceDataType = '';
  protected $updateConditionalFormatRuleType = 'Google_Service_Sheets_UpdateConditionalFormatRuleResponse';
  protected $updateConditionalFormatRuleDataType = '';
  protected $updateDeveloperMetadataType = 'Google_Service_Sheets_UpdateDeveloperMetadataResponse';
  protected $updateDeveloperMetadataDataType = '';
  protected $updateEmbeddedObjectPositionType = 'Google_Service_Sheets_UpdateEmbeddedObjectPositionResponse';
  protected $updateEmbeddedObjectPositionDataType = '';

  /**
   * @param Google_Service_Sheets_AddBandingResponse
   */
  public function setAddBanding(Google_Service_Sheets_AddBandingResponse $addBanding)
  {
    $this->addBanding = $addBanding;
  }
  /**
   * @return Google_Service_Sheets_AddBandingResponse
   */
  public function getAddBanding()
  {
    return $this->addBanding;
  }
  /**
   * @param Google_Service_Sheets_AddChartResponse
   */
  public function setAddChart(Google_Service_Sheets_AddChartResponse $addChart)
  {
    $this->addChart = $addChart;
  }
  /**
   * @return Google_Service_Sheets_AddChartResponse
   */
  public function getAddChart()
  {
    return $this->addChart;
  }
  /**
   * @param Google_Service_Sheets_AddFilterViewResponse
   */
  public function setAddFilterView(Google_Service_Sheets_AddFilterViewResponse $addFilterView)
  {
    $this->addFilterView = $addFilterView;
  }
  /**
   * @return Google_Service_Sheets_AddFilterViewResponse
   */
  public function getAddFilterView()
  {
    return $this->addFilterView;
  }
  /**
   * @param Google_Service_Sheets_AddNamedRangeResponse
   */
  public function setAddNamedRange(Google_Service_Sheets_AddNamedRangeResponse $addNamedRange)
  {
    $this->addNamedRange = $addNamedRange;
  }
  /**
   * @return Google_Service_Sheets_AddNamedRangeResponse
   */
  public function getAddNamedRange()
  {
    return $this->addNamedRange;
  }
  /**
   * @param Google_Service_Sheets_AddProtectedRangeResponse
   */
  public function setAddProtectedRange(Google_Service_Sheets_AddProtectedRangeResponse $addProtectedRange)
  {
    $this->addProtectedRange = $addProtectedRange;
  }
  /**
   * @return Google_Service_Sheets_AddProtectedRangeResponse
   */
  public function getAddProtectedRange()
  {
    return $this->addProtectedRange;
  }
  /**
   * @param Google_Service_Sheets_AddSheetResponse
   */
  public function setAddSheet(Google_Service_Sheets_AddSheetResponse $addSheet)
  {
    $this->addSheet = $addSheet;
  }
  /**
   * @return Google_Service_Sheets_AddSheetResponse
   */
  public function getAddSheet()
  {
    return $this->addSheet;
  }
  /**
   * @param Google_Service_Sheets_CreateDeveloperMetadataResponse
   */
  public function setCreateDeveloperMetadata(Google_Service_Sheets_CreateDeveloperMetadataResponse $createDeveloperMetadata)
  {
    $this->createDeveloperMetadata = $createDeveloperMetadata;
  }
  /**
   * @return Google_Service_Sheets_CreateDeveloperMetadataResponse
   */
  public function getCreateDeveloperMetadata()
  {
    return $this->createDeveloperMetadata;
  }
  /**
   * @param Google_Service_Sheets_DeleteConditionalFormatRuleResponse
   */
  public function setDeleteConditionalFormatRule(Google_Service_Sheets_DeleteConditionalFormatRuleResponse $deleteConditionalFormatRule)
  {
    $this->deleteConditionalFormatRule = $deleteConditionalFormatRule;
  }
  /**
   * @return Google_Service_Sheets_DeleteConditionalFormatRuleResponse
   */
  public function getDeleteConditionalFormatRule()
  {
    return $this->deleteConditionalFormatRule;
  }
  /**
   * @param Google_Service_Sheets_DeleteDeveloperMetadataResponse
   */
  public function setDeleteDeveloperMetadata(Google_Service_Sheets_DeleteDeveloperMetadataResponse $deleteDeveloperMetadata)
  {
    $this->deleteDeveloperMetadata = $deleteDeveloperMetadata;
  }
  /**
   * @return Google_Service_Sheets_DeleteDeveloperMetadataResponse
   */
  public function getDeleteDeveloperMetadata()
  {
    return $this->deleteDeveloperMetadata;
  }
  /**
   * @param Google_Service_Sheets_DuplicateFilterViewResponse
   */
  public function setDuplicateFilterView(Google_Service_Sheets_DuplicateFilterViewResponse $duplicateFilterView)
  {
    $this->duplicateFilterView = $duplicateFilterView;
  }
  /**
   * @return Google_Service_Sheets_DuplicateFilterViewResponse
   */
  public function getDuplicateFilterView()
  {
    return $this->duplicateFilterView;
  }
  /**
   * @param Google_Service_Sheets_DuplicateSheetResponse
   */
  public function setDuplicateSheet(Google_Service_Sheets_DuplicateSheetResponse $duplicateSheet)
  {
    $this->duplicateSheet = $duplicateSheet;
  }
  /**
   * @return Google_Service_Sheets_DuplicateSheetResponse
   */
  public function getDuplicateSheet()
  {
    return $this->duplicateSheet;
  }
  /**
   * @param Google_Service_Sheets_FindReplaceResponse
   */
  public function setFindReplace(Google_Service_Sheets_FindReplaceResponse $findReplace)
  {
    $this->findReplace = $findReplace;
  }
  /**
   * @return Google_Service_Sheets_FindReplaceResponse
   */
  public function getFindReplace()
  {
    return $this->findReplace;
  }
  /**
   * @param Google_Service_Sheets_UpdateConditionalFormatRuleResponse
   */
  public function setUpdateConditionalFormatRule(Google_Service_Sheets_UpdateConditionalFormatRuleResponse $updateConditionalFormatRule)
  {
    $this->updateConditionalFormatRule = $updateConditionalFormatRule;
  }
  /**
   * @return Google_Service_Sheets_UpdateConditionalFormatRuleResponse
   */
  public function getUpdateConditionalFormatRule()
  {
    return $this->updateConditionalFormatRule;
  }
  /**
   * @param Google_Service_Sheets_UpdateDeveloperMetadataResponse
   */
  public function setUpdateDeveloperMetadata(Google_Service_Sheets_UpdateDeveloperMetadataResponse $updateDeveloperMetadata)
  {
    $this->updateDeveloperMetadata = $updateDeveloperMetadata;
  }
  /**
   * @return Google_Service_Sheets_UpdateDeveloperMetadataResponse
   */
  public function getUpdateDeveloperMetadata()
  {
    return $this->updateDeveloperMetadata;
  }
  /**
   * @param Google_Service_Sheets_UpdateEmbeddedObjectPositionResponse
   */
  public function setUpdateEmbeddedObjectPosition(Google_Service_Sheets_UpdateEmbeddedObjectPositionResponse $updateEmbeddedObjectPosition)
  {
    $this->updateEmbeddedObjectPosition = $updateEmbeddedObjectPosition;
  }
  /**
   * @return Google_Service_Sheets_UpdateEmbeddedObjectPositionResponse
   */
  public function getUpdateEmbeddedObjectPosition()
  {
    return $this->updateEmbeddedObjectPosition;
  }
}
