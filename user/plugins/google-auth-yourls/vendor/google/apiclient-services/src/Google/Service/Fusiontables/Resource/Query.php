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
 * The "query" collection of methods.
 * Typical usage is:
 *  <code>
 *   $fusiontablesService = new Google_Service_Fusiontables(...);
 *   $query = $fusiontablesService->query;
 *  </code>
 */
class Google_Service_Fusiontables_Resource_Query extends Google_Service_Resource
{
  /**
   * Executes a Fusion Tables SQL statement, which can be any of - SELECT - INSERT
   * - UPDATE - DELETE - SHOW - DESCRIBE - CREATE statement. (query.sql)
   *
   * @param string $sql A Fusion Tables SQL statement, which can be any of -
   * SELECT - INSERT - UPDATE - DELETE - SHOW - DESCRIBE - CREATE
   * @param array $optParams Optional parameters.
   *
   * @opt_param bool hdrs Whether column names are included in the first row.
   * Default is true.
   * @opt_param bool typed Whether typed values are returned in the (JSON)
   * response: numbers for numeric values and parsed geometries for KML values.
   * Default is true.
   * @return Google_Service_Fusiontables_Sqlresponse
   */
  public function sql($sql, $optParams = array())
  {
    $params = array('sql' => $sql);
    $params = array_merge($params, $optParams);
    return $this->call('sql', array($params), "Google_Service_Fusiontables_Sqlresponse");
  }
  /**
   * Executes a SQL statement which can be any of - SELECT - SHOW - DESCRIBE
   * (query.sqlGet)
   *
   * @param string $sql A SQL statement which can be any of - SELECT - SHOW -
   * DESCRIBE
   * @param array $optParams Optional parameters.
   *
   * @opt_param bool hdrs Whether column names are included (in the first row).
   * Default is true.
   * @opt_param bool typed Whether typed values are returned in the (JSON)
   * response: numbers for numeric values and parsed geometries for KML values.
   * Default is true.
   * @return Google_Service_Fusiontables_Sqlresponse
   */
  public function sqlGet($sql, $optParams = array())
  {
    $params = array('sql' => $sql);
    $params = array_merge($params, $optParams);
    return $this->call('sqlGet', array($params), "Google_Service_Fusiontables_Sqlresponse");
  }
}
