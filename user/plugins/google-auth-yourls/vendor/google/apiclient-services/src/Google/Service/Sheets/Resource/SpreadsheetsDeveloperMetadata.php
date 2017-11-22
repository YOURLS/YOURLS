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

/**
 * The "developerMetadata" collection of methods.
 * Typical usage is:
 *  <code>
 *   $sheetsService = new Google_Service_Sheets(...);
 *   $developerMetadata = $sheetsService->developerMetadata;
 *  </code>
 */
class Google_Service_Sheets_Resource_SpreadsheetsDeveloperMetadata extends Google_Service_Resource
{
  /**
   * Returns the developer metadata with the specified ID. The caller must specify
   * the spreadsheet ID and the developer metadata's unique metadataId.
   * (developerMetadata.get)
   *
   * @param string $spreadsheetId The ID of the spreadsheet to retrieve metadata
   * from.
   * @param int $metadataId The ID of the developer metadata to retrieve.
   * @param array $optParams Optional parameters.
   * @return Google_Service_Sheets_DeveloperMetadata
   */
  public function get($spreadsheetId, $metadataId, $optParams = array())
  {
    $params = array('spreadsheetId' => $spreadsheetId, 'metadataId' => $metadataId);
    $params = array_merge($params, $optParams);
    return $this->call('get', array($params), "Google_Service_Sheets_DeveloperMetadata");
  }
  /**
   * Returns all developer metadata matching the specified DataFilter. If the
   * provided DataFilter represents a DeveloperMetadataLookup object, this will
   * return all DeveloperMetadata entries selected by it. If the DataFilter
   * represents a location in a spreadsheet, this will return all developer
   * metadata associated with locations intersecting that region.
   * (developerMetadata.search)
   *
   * @param string $spreadsheetId The ID of the spreadsheet to retrieve metadata
   * from.
   * @param Google_Service_Sheets_SearchDeveloperMetadataRequest $postBody
   * @param array $optParams Optional parameters.
   * @return Google_Service_Sheets_SearchDeveloperMetadataResponse
   */
  public function search($spreadsheetId, Google_Service_Sheets_SearchDeveloperMetadataRequest $postBody, $optParams = array())
  {
    $params = array('spreadsheetId' => $spreadsheetId, 'postBody' => $postBody);
    $params = array_merge($params, $optParams);
    return $this->call('search', array($params), "Google_Service_Sheets_SearchDeveloperMetadataResponse");
  }
}
