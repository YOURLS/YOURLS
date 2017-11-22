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

class Google_Service_Sheets_Spreadsheet extends Google_Collection
{
  protected $collection_key = 'sheets';
  protected $developerMetadataType = 'Google_Service_Sheets_DeveloperMetadata';
  protected $developerMetadataDataType = 'array';
  protected $namedRangesType = 'Google_Service_Sheets_NamedRange';
  protected $namedRangesDataType = 'array';
  protected $propertiesType = 'Google_Service_Sheets_SpreadsheetProperties';
  protected $propertiesDataType = '';
  protected $sheetsType = 'Google_Service_Sheets_Sheet';
  protected $sheetsDataType = 'array';
  public $spreadsheetId;
  public $spreadsheetUrl;

  /**
   * @param Google_Service_Sheets_DeveloperMetadata
   */
  public function setDeveloperMetadata($developerMetadata)
  {
    $this->developerMetadata = $developerMetadata;
  }
  /**
   * @return Google_Service_Sheets_DeveloperMetadata
   */
  public function getDeveloperMetadata()
  {
    return $this->developerMetadata;
  }
  /**
   * @param Google_Service_Sheets_NamedRange
   */
  public function setNamedRanges($namedRanges)
  {
    $this->namedRanges = $namedRanges;
  }
  /**
   * @return Google_Service_Sheets_NamedRange
   */
  public function getNamedRanges()
  {
    return $this->namedRanges;
  }
  /**
   * @param Google_Service_Sheets_SpreadsheetProperties
   */
  public function setProperties(Google_Service_Sheets_SpreadsheetProperties $properties)
  {
    $this->properties = $properties;
  }
  /**
   * @return Google_Service_Sheets_SpreadsheetProperties
   */
  public function getProperties()
  {
    return $this->properties;
  }
  /**
   * @param Google_Service_Sheets_Sheet
   */
  public function setSheets($sheets)
  {
    $this->sheets = $sheets;
  }
  /**
   * @return Google_Service_Sheets_Sheet
   */
  public function getSheets()
  {
    return $this->sheets;
  }
  public function setSpreadsheetId($spreadsheetId)
  {
    $this->spreadsheetId = $spreadsheetId;
  }
  public function getSpreadsheetId()
  {
    return $this->spreadsheetId;
  }
  public function setSpreadsheetUrl($spreadsheetUrl)
  {
    $this->spreadsheetUrl = $spreadsheetUrl;
  }
  public function getSpreadsheetUrl()
  {
    return $this->spreadsheetUrl;
  }
}
