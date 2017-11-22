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
 * The "reads" collection of methods.
 * Typical usage is:
 *  <code>
 *   $genomicsService = new Google_Service_Genomics(...);
 *   $reads = $genomicsService->reads;
 *  </code>
 */
class Google_Service_Genomics_Resource_Reads extends Google_Service_Resource
{
  /**
   * Gets a list of reads for one or more read group sets.
   *
   * For the definitions of read group sets and other genomics resources, see
   * [Fundamentals of Google Genomics](https://cloud.google.com/genomics
   * /fundamentals-of-google-genomics)
   *
   * Reads search operates over a genomic coordinate space of reference sequence &
   * position defined over the reference sequences to which the requested read
   * group sets are aligned.
   *
   * If a target positional range is specified, search returns all reads whose
   * alignment to the reference genome overlap the range. A query which specifies
   * only read group set IDs yields all reads in those read group sets, including
   * unmapped reads.
   *
   * All reads returned (including reads on subsequent pages) are ordered by
   * genomic coordinate (by reference sequence, then position). Reads with
   * equivalent genomic coordinates are returned in an unspecified order. This
   * order is consistent, such that two queries for the same content (regardless
   * of page size) yield reads in the same order across their respective streams
   * of paginated responses.
   *
   * Implements [GlobalAllianceApi.searchReads](https://github.com/ga4gh/schemas/b
   * lob/v0.5.1/src/main/resources/avro/readmethods.avdl#L85). (reads.search)
   *
   * @param Google_Service_Genomics_SearchReadsRequest $postBody
   * @param array $optParams Optional parameters.
   * @return Google_Service_Genomics_SearchReadsResponse
   */
  public function search(Google_Service_Genomics_SearchReadsRequest $postBody, $optParams = array())
  {
    $params = array('postBody' => $postBody);
    $params = array_merge($params, $optParams);
    return $this->call('search', array($params), "Google_Service_Genomics_SearchReadsResponse");
  }
}
