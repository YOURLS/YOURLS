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
 * The "spreadsheets" collection of methods.
 * Typical usage is:
 *  <code>
 *   $sheetsService = new Google_Service_Sheets(...);
 *   $spreadsheets = $sheetsService->spreadsheets;
 *  </code>
 */
class Google_Service_Sheets_Resource_Spreadsheets extends Google_Service_Resource
{
  /**
   * Applies one or more updates to the spreadsheet.
   *
   * Each request is validated before being applied. If any request is not valid
   * then the entire request will fail and nothing will be applied.
   *
   * Some requests have replies to give you some information about how they are
   * applied. The replies will mirror the requests.  For example, if you applied 4
   * updates and the 3rd one had a reply, then the response will have 2 empty
   * replies, the actual reply, and another empty reply, in that order.
   *
   * Due to the collaborative nature of spreadsheets, it is not guaranteed that
   * the spreadsheet will reflect exactly your changes after this completes,
   * however it is guaranteed that the updates in the request will be applied
   * together atomically. Your changes may be altered with respect to collaborator
   * changes. If there are no collaborators, the spreadsheet should reflect your
   * changes. (spreadsheets.batchUpdate)
   *
   * @param string $spreadsheetId The spreadsheet to apply the updates to.
   * @param Google_Service_Sheets_BatchUpdateSpreadsheetRequest $postBody
   * @param array $optParams Optional parameters.
   * @return Google_Service_Sheets_BatchUpdateSpreadsheetResponse
   */
  public function batchUpdate($spreadsheetId, Google_Service_Sheets_BatchUpdateSpreadsheetRequest $postBody, $optParams = array())
  {
    $params = array('spreadsheetId' => $spreadsheetId, 'postBody' => $postBody);
    $params = array_merge($params, $optParams);
    return $this->call('batchUpdate', array($params), "Google_Service_Sheets_BatchUpdateSpreadsheetResponse");
  }
  /**
   * Creates a spreadsheet, returning the newly created spreadsheet.
   * (spreadsheets.create)
   *
   * @param Google_Service_Sheets_Spreadsheet $postBody
   * @param array $optParams Optional parameters.
   * @return Google_Service_Sheets_Spreadsheet
   */
  public function create(Google_Service_Sheets_Spreadsheet $postBody, $optParams = array())
  {
    $params = array('postBody' => $postBody);
    $params = array_merge($params, $optParams);
    return $this->call('create', array($params), "Google_Service_Sheets_Spreadsheet");
  }
  /**
   * Returns the spreadsheet at the given ID. The caller must specify the
   * spreadsheet ID.
   *
   * By default, data within grids will not be returned. You can include grid data
   * one of two ways:
   *
   * * Specify a field mask listing your desired fields using the `fields` URL
   * parameter in HTTP
   *
   * * Set the includeGridData URL parameter to true.  If a field mask is set, the
   * `includeGridData` parameter is ignored
   *
   * For large spreadsheets, it is recommended to retrieve only the specific
   * fields of the spreadsheet that you want.
   *
   * To retrieve only subsets of the spreadsheet, use the ranges URL parameter.
   * Multiple ranges can be specified.  Limiting the range will return only the
   * portions of the spreadsheet that intersect the requested ranges. Ranges are
   * specified using A1 notation. (spreadsheets.get)
   *
   * @param string $spreadsheetId The spreadsheet to request.
   * @param array $optParams Optional parameters.
   *
   * @opt_param bool includeGridData True if grid data should be returned. This
   * parameter is ignored if a field mask was set in the request.
   * @opt_param string ranges The ranges to retrieve from the spreadsheet.
   * @return Google_Service_Sheets_Spreadsheet
   */
  public function get($spreadsheetId, $optParams = array())
  {
    $params = array('spreadsheetId' => $spreadsheetId);
    $params = array_merge($params, $optParams);
    return $this->call('get', array($params), "Google_Service_Sheets_Spreadsheet");
  }
  /**
   * Returns the spreadsheet at the given ID. The caller must specify the
   * spreadsheet ID.
   *
   * This method differs from GetSpreadsheet in that it allows selecting which
   * subsets of spreadsheet data to return by specifying a dataFilters parameter.
   * Multiple DataFilters can be specified.  Specifying one or more data filters
   * will return the portions of the spreadsheet that intersect ranges matched by
   * any of the filters.
   *
   * By default, data within grids will not be returned. You can include grid data
   * one of two ways:
   *
   * * Specify a field mask listing your desired fields using the `fields` URL
   * parameter in HTTP
   *
   * * Set the includeGridData parameter to true.  If a field mask is set, the
   * `includeGridData` parameter is ignored
   *
   * For large spreadsheets, it is recommended to retrieve only the specific
   * fields of the spreadsheet that you want. (spreadsheets.getByDataFilter)
   *
   * @param string $spreadsheetId The spreadsheet to request.
   * @param Google_Service_Sheets_GetSpreadsheetByDataFilterRequest $postBody
   * @param array $optParams Optional parameters.
   * @return Google_Service_Sheets_Spreadsheet
   */
  public function getByDataFilter($spreadsheetId, Google_Service_Sheets_GetSpreadsheetByDataFilterRequest $postBody, $optParams = array())
  {
    $params = array('spreadsheetId' => $spreadsheetId, 'postBody' => $postBody);
    $params = array_merge($params, $optParams);
    return $this->call('getByDataFilter', array($params), "Google_Service_Sheets_Spreadsheet");
  }
}
