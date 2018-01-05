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
 * The "divisions" collection of methods.
 * Typical usage is:
 *  <code>
 *   $civicinfoService = new Google_Service_CivicInfo(...);
 *   $divisions = $civicinfoService->divisions;
 *  </code>
 */
class Google_Service_CivicInfo_Resource_Divisions extends Google_Service_Resource
{
  /**
   * Searches for political divisions by their natural name or OCD ID.
   * (divisions.search)
   *
   * @param array $optParams Optional parameters.
   *
   * @opt_param string query The search query. Queries can cover any parts of a
   * OCD ID or a human readable division name. All words given in the query are
   * treated as required patterns. In addition to that, most query operators of
   * the Apache Lucene library are supported. See
   * http://lucene.apache.org/core/2_9_4/queryparsersyntax.html
   * @return Google_Service_CivicInfo_DivisionSearchResponse
   */
  public function search($optParams = array())
  {
    $params = array();
    $params = array_merge($params, $optParams);
    return $this->call('search', array($params), "Google_Service_CivicInfo_DivisionSearchResponse");
  }
}
