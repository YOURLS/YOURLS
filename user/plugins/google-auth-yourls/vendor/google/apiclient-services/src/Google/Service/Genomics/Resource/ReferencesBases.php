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
 * The "bases" collection of methods.
 * Typical usage is:
 *  <code>
 *   $genomicsService = new Google_Service_Genomics(...);
 *   $bases = $genomicsService->bases;
 *  </code>
 */
class Google_Service_Genomics_Resource_ReferencesBases extends Google_Service_Resource
{
  /**
   * Lists the bases in a reference, optionally restricted to a range.
   *
   * For the definitions of references and other genomics resources, see
   * [Fundamentals of Google Genomics](https://cloud.google.com/genomics
   * /fundamentals-of-google-genomics)
   *
   * Implements [GlobalAllianceApi.getReferenceBases](https://github.com/ga4gh/sch
   * emas/blob/v0.5.1/src/main/resources/avro/referencemethods.avdl#L221).
   * (bases.listReferencesBases)
   *
   * @param string $referenceId The ID of the reference.
   * @param array $optParams Optional parameters.
   *
   * @opt_param int pageSize The maximum number of bases to return in a single
   * page. If unspecified, defaults to 200Kbp (kilo base pairs). The maximum value
   * is 10Mbp (mega base pairs).
   * @opt_param string start The start position (0-based) of this query. Defaults
   * to 0.
   * @opt_param string end The end position (0-based, exclusive) of this query.
   * Defaults to the length of this reference.
   * @opt_param string pageToken The continuation token, which is used to page
   * through large result sets. To get the next page of results, set this
   * parameter to the value of `nextPageToken` from the previous response.
   * @return Google_Service_Genomics_ListBasesResponse
   */
  public function listReferencesBases($referenceId, $optParams = array())
  {
    $params = array('referenceId' => $referenceId);
    $params = array_merge($params, $optParams);
    return $this->call('list', array($params), "Google_Service_Genomics_ListBasesResponse");
  }
}
