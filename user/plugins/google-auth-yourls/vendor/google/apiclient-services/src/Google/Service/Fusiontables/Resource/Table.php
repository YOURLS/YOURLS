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
 * The "table" collection of methods.
 * Typical usage is:
 *  <code>
 *   $fusiontablesService = new Google_Service_Fusiontables(...);
 *   $table = $fusiontablesService->table;
 *  </code>
 */
class Google_Service_Fusiontables_Resource_Table extends Google_Service_Resource
{
  /**
   * Copies a table. (table.copy)
   *
   * @param string $tableId ID of the table that is being copied.
   * @param array $optParams Optional parameters.
   *
   * @opt_param bool copyPresentation Whether to also copy tabs, styles, and
   * templates. Default is false.
   * @return Google_Service_Fusiontables_Table
   */
  public function copy($tableId, $optParams = array())
  {
    $params = array('tableId' => $tableId);
    $params = array_merge($params, $optParams);
    return $this->call('copy', array($params), "Google_Service_Fusiontables_Table");
  }
  /**
   * Deletes a table. (table.delete)
   *
   * @param string $tableId ID of the table to be deleted.
   * @param array $optParams Optional parameters.
   */
  public function delete($tableId, $optParams = array())
  {
    $params = array('tableId' => $tableId);
    $params = array_merge($params, $optParams);
    return $this->call('delete', array($params));
  }
  /**
   * Retrieves a specific table by its ID. (table.get)
   *
   * @param string $tableId Identifier for the table being requested.
   * @param array $optParams Optional parameters.
   * @return Google_Service_Fusiontables_Table
   */
  public function get($tableId, $optParams = array())
  {
    $params = array('tableId' => $tableId);
    $params = array_merge($params, $optParams);
    return $this->call('get', array($params), "Google_Service_Fusiontables_Table");
  }
  /**
   * Imports more rows into a table. (table.importRows)
   *
   * @param string $tableId The table into which new rows are being imported.
   * @param array $optParams Optional parameters.
   *
   * @opt_param string delimiter The delimiter used to separate cell values. This
   * can only consist of a single character. Default is ,.
   * @opt_param string encoding The encoding of the content. Default is UTF-8. Use
   * auto-detect if you are unsure of the encoding.
   * @opt_param int endLine The index of the line up to which data will be
   * imported. Default is to import the entire file. If endLine is negative, it is
   * an offset from the end of the file; the imported content will exclude the
   * last endLine lines.
   * @opt_param bool isStrict Whether the imported CSV must have the same number
   * of values for each row. If false, rows with fewer values will be padded with
   * empty values. Default is true.
   * @opt_param int startLine The index of the first line from which to start
   * importing, inclusive. Default is 0.
   * @return Google_Service_Fusiontables_Import
   */
  public function importRows($tableId, $optParams = array())
  {
    $params = array('tableId' => $tableId);
    $params = array_merge($params, $optParams);
    return $this->call('importRows', array($params), "Google_Service_Fusiontables_Import");
  }
  /**
   * Imports a new table. (table.importTable)
   *
   * @param string $name The name to be assigned to the new table.
   * @param array $optParams Optional parameters.
   *
   * @opt_param string delimiter The delimiter used to separate cell values. This
   * can only consist of a single character. Default is ,.
   * @opt_param string encoding The encoding of the content. Default is UTF-8. Use
   * auto-detect if you are unsure of the encoding.
   * @return Google_Service_Fusiontables_Table
   */
  public function importTable($name, $optParams = array())
  {
    $params = array('name' => $name);
    $params = array_merge($params, $optParams);
    return $this->call('importTable', array($params), "Google_Service_Fusiontables_Table");
  }
  /**
   * Creates a new table. (table.insert)
   *
   * @param Google_Service_Fusiontables_Table $postBody
   * @param array $optParams Optional parameters.
   * @return Google_Service_Fusiontables_Table
   */
  public function insert(Google_Service_Fusiontables_Table $postBody, $optParams = array())
  {
    $params = array('postBody' => $postBody);
    $params = array_merge($params, $optParams);
    return $this->call('insert', array($params), "Google_Service_Fusiontables_Table");
  }
  /**
   * Retrieves a list of tables a user owns. (table.listTable)
   *
   * @param array $optParams Optional parameters.
   *
   * @opt_param string maxResults Maximum number of tables to return. Default is
   * 5.
   * @opt_param string pageToken Continuation token specifying which result page
   * to return.
   * @return Google_Service_Fusiontables_TableList
   */
  public function listTable($optParams = array())
  {
    $params = array();
    $params = array_merge($params, $optParams);
    return $this->call('list', array($params), "Google_Service_Fusiontables_TableList");
  }
  /**
   * Updates an existing table. Unless explicitly requested, only the name,
   * description, and attribution will be updated. This method supports patch
   * semantics. (table.patch)
   *
   * @param string $tableId ID of the table that is being updated.
   * @param Google_Service_Fusiontables_Table $postBody
   * @param array $optParams Optional parameters.
   *
   * @opt_param bool replaceViewDefinition Whether the view definition is also
   * updated. The specified view definition replaces the existing one. Only a view
   * can be updated with a new definition.
   * @return Google_Service_Fusiontables_Table
   */
  public function patch($tableId, Google_Service_Fusiontables_Table $postBody, $optParams = array())
  {
    $params = array('tableId' => $tableId, 'postBody' => $postBody);
    $params = array_merge($params, $optParams);
    return $this->call('patch', array($params), "Google_Service_Fusiontables_Table");
  }
  /**
   * Replaces rows of an existing table. Current rows remain visible until all
   * replacement rows are ready. (table.replaceRows)
   *
   * @param string $tableId Table whose rows will be replaced.
   * @param array $optParams Optional parameters.
   *
   * @opt_param string delimiter The delimiter used to separate cell values. This
   * can only consist of a single character. Default is ,.
   * @opt_param string encoding The encoding of the content. Default is UTF-8. Use
   * 'auto-detect' if you are unsure of the encoding.
   * @opt_param int endLine The index of the line up to which data will be
   * imported. Default is to import the entire file. If endLine is negative, it is
   * an offset from the end of the file; the imported content will exclude the
   * last endLine lines.
   * @opt_param bool isStrict Whether the imported CSV must have the same number
   * of column values for each row. If true, throws an exception if the CSV does
   * not have the same number of columns. If false, rows with fewer column values
   * will be padded with empty values. Default is true.
   * @opt_param int startLine The index of the first line from which to start
   * importing, inclusive. Default is 0.
   * @return Google_Service_Fusiontables_Task
   */
  public function replaceRows($tableId, $optParams = array())
  {
    $params = array('tableId' => $tableId);
    $params = array_merge($params, $optParams);
    return $this->call('replaceRows', array($params), "Google_Service_Fusiontables_Task");
  }
  /**
   * Updates an existing table. Unless explicitly requested, only the name,
   * description, and attribution will be updated. (table.update)
   *
   * @param string $tableId ID of the table that is being updated.
   * @param Google_Service_Fusiontables_Table $postBody
   * @param array $optParams Optional parameters.
   *
   * @opt_param bool replaceViewDefinition Whether the view definition is also
   * updated. The specified view definition replaces the existing one. Only a view
   * can be updated with a new definition.
   * @return Google_Service_Fusiontables_Table
   */
  public function update($tableId, Google_Service_Fusiontables_Table $postBody, $optParams = array())
  {
    $params = array('tableId' => $tableId, 'postBody' => $postBody);
    $params = array_merge($params, $optParams);
    return $this->call('update', array($params), "Google_Service_Fusiontables_Table");
  }
}
