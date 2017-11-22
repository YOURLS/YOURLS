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
 * The "values" collection of methods.
 * Typical usage is:
 *  <code>
 *   $sheetsService = new Google_Service_Sheets(...);
 *   $values = $sheetsService->values;
 *  </code>
 */
class Google_Service_Sheets_Resource_SpreadsheetsValues extends Google_Service_Resource
{
  /**
   * Appends values to a spreadsheet. The input range is used to search for
   * existing data and find a "table" within that range. Values will be appended
   * to the next row of the table, starting with the first column of the table.
   * See the [guide](/sheets/api/guides/values#appending_values) and [sample
   * code](/sheets/api/samples/writing#append_values) for specific details of how
   * tables are detected and data is appended.
   *
   * The caller must specify the spreadsheet ID, range, and a valueInputOption.
   * The `valueInputOption` only controls how the input data will be added to the
   * sheet (column-wise or row-wise), it does not influence what cell the data
   * starts being written to. (values.append)
   *
   * @param string $spreadsheetId The ID of the spreadsheet to update.
   * @param string $range The A1 notation of a range to search for a logical table
   * of data. Values will be appended after the last row of the table.
   * @param Google_Service_Sheets_ValueRange $postBody
   * @param array $optParams Optional parameters.
   *
   * @opt_param string responseValueRenderOption Determines how values in the
   * response should be rendered. The default render option is
   * ValueRenderOption.FORMATTED_VALUE.
   * @opt_param string insertDataOption How the input data should be inserted.
   * @opt_param string valueInputOption How the input data should be interpreted.
   * @opt_param string responseDateTimeRenderOption Determines how dates, times,
   * and durations in the response should be rendered. This is ignored if
   * response_value_render_option is FORMATTED_VALUE. The default dateTime render
   * option is [DateTimeRenderOption.SERIAL_NUMBER].
   * @opt_param bool includeValuesInResponse Determines if the update response
   * should include the values of the cells that were appended. By default,
   * responses do not include the updated values.
   * @return Google_Service_Sheets_AppendValuesResponse
   */
  public function append($spreadsheetId, $range, Google_Service_Sheets_ValueRange $postBody, $optParams = array())
  {
    $params = array('spreadsheetId' => $spreadsheetId, 'range' => $range, 'postBody' => $postBody);
    $params = array_merge($params, $optParams);
    return $this->call('append', array($params), "Google_Service_Sheets_AppendValuesResponse");
  }
  /**
   * Clears one or more ranges of values from a spreadsheet. The caller must
   * specify the spreadsheet ID and one or more ranges. Only values are cleared --
   * all other properties of the cell (such as formatting, data validation, etc..)
   * are kept. (values.batchClear)
   *
   * @param string $spreadsheetId The ID of the spreadsheet to update.
   * @param Google_Service_Sheets_BatchClearValuesRequest $postBody
   * @param array $optParams Optional parameters.
   * @return Google_Service_Sheets_BatchClearValuesResponse
   */
  public function batchClear($spreadsheetId, Google_Service_Sheets_BatchClearValuesRequest $postBody, $optParams = array())
  {
    $params = array('spreadsheetId' => $spreadsheetId, 'postBody' => $postBody);
    $params = array_merge($params, $optParams);
    return $this->call('batchClear', array($params), "Google_Service_Sheets_BatchClearValuesResponse");
  }
  /**
   * Clears one or more ranges of values from a spreadsheet. The caller must
   * specify the spreadsheet ID and one or more DataFilters. Ranges matching any
   * of the specified data filters will be cleared.  Only values are cleared --
   * all other properties of the cell (such as formatting, data validation, etc..)
   * are kept. (values.batchClearByDataFilter)
   *
   * @param string $spreadsheetId The ID of the spreadsheet to update.
   * @param Google_Service_Sheets_BatchClearValuesByDataFilterRequest $postBody
   * @param array $optParams Optional parameters.
   * @return Google_Service_Sheets_BatchClearValuesByDataFilterResponse
   */
  public function batchClearByDataFilter($spreadsheetId, Google_Service_Sheets_BatchClearValuesByDataFilterRequest $postBody, $optParams = array())
  {
    $params = array('spreadsheetId' => $spreadsheetId, 'postBody' => $postBody);
    $params = array_merge($params, $optParams);
    return $this->call('batchClearByDataFilter', array($params), "Google_Service_Sheets_BatchClearValuesByDataFilterResponse");
  }
  /**
   * Returns one or more ranges of values from a spreadsheet. The caller must
   * specify the spreadsheet ID and one or more ranges. (values.batchGet)
   *
   * @param string $spreadsheetId The ID of the spreadsheet to retrieve data from.
   * @param array $optParams Optional parameters.
   *
   * @opt_param string majorDimension The major dimension that results should use.
   *
   * For example, if the spreadsheet data is: `A1=1,B1=2,A2=3,B2=4`, then
   * requesting `range=A1:B2,majorDimension=ROWS` will return `[[1,2],[3,4]]`,
   * whereas requesting `range=A1:B2,majorDimension=COLUMNS` will return
   * `[[1,3],[2,4]]`.
   * @opt_param string ranges The A1 notation of the values to retrieve.
   * @opt_param string dateTimeRenderOption How dates, times, and durations should
   * be represented in the output. This is ignored if value_render_option is
   * FORMATTED_VALUE. The default dateTime render option is
   * [DateTimeRenderOption.SERIAL_NUMBER].
   * @opt_param string valueRenderOption How values should be represented in the
   * output. The default render option is ValueRenderOption.FORMATTED_VALUE.
   * @return Google_Service_Sheets_BatchGetValuesResponse
   */
  public function batchGet($spreadsheetId, $optParams = array())
  {
    $params = array('spreadsheetId' => $spreadsheetId);
    $params = array_merge($params, $optParams);
    return $this->call('batchGet', array($params), "Google_Service_Sheets_BatchGetValuesResponse");
  }
  /**
   * Returns one or more ranges of values that match the specified data filters.
   * The caller must specify the spreadsheet ID and one or more DataFilters.
   * Ranges that match any of the data filters in the request will be returned.
   * (values.batchGetByDataFilter)
   *
   * @param string $spreadsheetId The ID of the spreadsheet to retrieve data from.
   * @param Google_Service_Sheets_BatchGetValuesByDataFilterRequest $postBody
   * @param array $optParams Optional parameters.
   * @return Google_Service_Sheets_BatchGetValuesByDataFilterResponse
   */
  public function batchGetByDataFilter($spreadsheetId, Google_Service_Sheets_BatchGetValuesByDataFilterRequest $postBody, $optParams = array())
  {
    $params = array('spreadsheetId' => $spreadsheetId, 'postBody' => $postBody);
    $params = array_merge($params, $optParams);
    return $this->call('batchGetByDataFilter', array($params), "Google_Service_Sheets_BatchGetValuesByDataFilterResponse");
  }
  /**
   * Sets values in one or more ranges of a spreadsheet. The caller must specify
   * the spreadsheet ID, a valueInputOption, and one or more ValueRanges.
   * (values.batchUpdate)
   *
   * @param string $spreadsheetId The ID of the spreadsheet to update.
   * @param Google_Service_Sheets_BatchUpdateValuesRequest $postBody
   * @param array $optParams Optional parameters.
   * @return Google_Service_Sheets_BatchUpdateValuesResponse
   */
  public function batchUpdate($spreadsheetId, Google_Service_Sheets_BatchUpdateValuesRequest $postBody, $optParams = array())
  {
    $params = array('spreadsheetId' => $spreadsheetId, 'postBody' => $postBody);
    $params = array_merge($params, $optParams);
    return $this->call('batchUpdate', array($params), "Google_Service_Sheets_BatchUpdateValuesResponse");
  }
  /**
   * Sets values in one or more ranges of a spreadsheet. The caller must specify
   * the spreadsheet ID, a valueInputOption, and one or more
   * DataFilterValueRanges. (values.batchUpdateByDataFilter)
   *
   * @param string $spreadsheetId The ID of the spreadsheet to update.
   * @param Google_Service_Sheets_BatchUpdateValuesByDataFilterRequest $postBody
   * @param array $optParams Optional parameters.
   * @return Google_Service_Sheets_BatchUpdateValuesByDataFilterResponse
   */
  public function batchUpdateByDataFilter($spreadsheetId, Google_Service_Sheets_BatchUpdateValuesByDataFilterRequest $postBody, $optParams = array())
  {
    $params = array('spreadsheetId' => $spreadsheetId, 'postBody' => $postBody);
    $params = array_merge($params, $optParams);
    return $this->call('batchUpdateByDataFilter', array($params), "Google_Service_Sheets_BatchUpdateValuesByDataFilterResponse");
  }
  /**
   * Clears values from a spreadsheet. The caller must specify the spreadsheet ID
   * and range. Only values are cleared -- all other properties of the cell (such
   * as formatting, data validation, etc..) are kept. (values.clear)
   *
   * @param string $spreadsheetId The ID of the spreadsheet to update.
   * @param string $range The A1 notation of the values to clear.
   * @param Google_Service_Sheets_ClearValuesRequest $postBody
   * @param array $optParams Optional parameters.
   * @return Google_Service_Sheets_ClearValuesResponse
   */
  public function clear($spreadsheetId, $range, Google_Service_Sheets_ClearValuesRequest $postBody, $optParams = array())
  {
    $params = array('spreadsheetId' => $spreadsheetId, 'range' => $range, 'postBody' => $postBody);
    $params = array_merge($params, $optParams);
    return $this->call('clear', array($params), "Google_Service_Sheets_ClearValuesResponse");
  }
  /**
   * Returns a range of values from a spreadsheet. The caller must specify the
   * spreadsheet ID and a range. (values.get)
   *
   * @param string $spreadsheetId The ID of the spreadsheet to retrieve data from.
   * @param string $range The A1 notation of the values to retrieve.
   * @param array $optParams Optional parameters.
   *
   * @opt_param string dateTimeRenderOption How dates, times, and durations should
   * be represented in the output. This is ignored if value_render_option is
   * FORMATTED_VALUE. The default dateTime render option is
   * [DateTimeRenderOption.SERIAL_NUMBER].
   * @opt_param string valueRenderOption How values should be represented in the
   * output. The default render option is ValueRenderOption.FORMATTED_VALUE.
   * @opt_param string majorDimension The major dimension that results should use.
   *
   * For example, if the spreadsheet data is: `A1=1,B1=2,A2=3,B2=4`, then
   * requesting `range=A1:B2,majorDimension=ROWS` will return `[[1,2],[3,4]]`,
   * whereas requesting `range=A1:B2,majorDimension=COLUMNS` will return
   * `[[1,3],[2,4]]`.
   * @return Google_Service_Sheets_ValueRange
   */
  public function get($spreadsheetId, $range, $optParams = array())
  {
    $params = array('spreadsheetId' => $spreadsheetId, 'range' => $range);
    $params = array_merge($params, $optParams);
    return $this->call('get', array($params), "Google_Service_Sheets_ValueRange");
  }
  /**
   * Sets values in a range of a spreadsheet. The caller must specify the
   * spreadsheet ID, range, and a valueInputOption. (values.update)
   *
   * @param string $spreadsheetId The ID of the spreadsheet to update.
   * @param string $range The A1 notation of the values to update.
   * @param Google_Service_Sheets_ValueRange $postBody
   * @param array $optParams Optional parameters.
   *
   * @opt_param string responseValueRenderOption Determines how values in the
   * response should be rendered. The default render option is
   * ValueRenderOption.FORMATTED_VALUE.
   * @opt_param string valueInputOption How the input data should be interpreted.
   * @opt_param string responseDateTimeRenderOption Determines how dates, times,
   * and durations in the response should be rendered. This is ignored if
   * response_value_render_option is FORMATTED_VALUE. The default dateTime render
   * option is [DateTimeRenderOption.SERIAL_NUMBER].
   * @opt_param bool includeValuesInResponse Determines if the update response
   * should include the values of the cells that were updated. By default,
   * responses do not include the updated values. If the range to write was larger
   * than than the range actually written, the response will include all values in
   * the requested range (excluding trailing empty rows and columns).
   * @return Google_Service_Sheets_UpdateValuesResponse
   */
  public function update($spreadsheetId, $range, Google_Service_Sheets_ValueRange $postBody, $optParams = array())
  {
    $params = array('spreadsheetId' => $spreadsheetId, 'range' => $range, 'postBody' => $postBody);
    $params = array_merge($params, $optParams);
    return $this->call('update', array($params), "Google_Service_Sheets_UpdateValuesResponse");
  }
}
