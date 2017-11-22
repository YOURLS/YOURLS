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
 * The "coveragebuckets" collection of methods.
 * Typical usage is:
 *  <code>
 *   $genomicsService = new Google_Service_Genomics(...);
 *   $coveragebuckets = $genomicsService->coveragebuckets;
 *  </code>
 */
class Google_Service_Genomics_Resource_ReadgroupsetsCoveragebuckets extends Google_Service_Resource
{
  /**
   * Lists fixed width coverage buckets for a read group set, each of which
   * correspond to a range of a reference sequence. Each bucket summarizes
   * coverage information across its corresponding genomic range.
   *
   * For the definitions of read group sets and other genomics resources, see
   * [Fundamentals of Google Genomics](https://cloud.google.com/genomics
   * /fundamentals-of-google-genomics)
   *
   * Coverage is defined as the number of reads which are aligned to a given base
   * in the reference sequence. Coverage buckets are available at several
   * precomputed bucket widths, enabling retrieval of various coverage 'zoom
   * levels'. The caller must have READ permissions for the target read group set.
   * (coveragebuckets.listReadgroupsetsCoveragebuckets)
   *
   * @param string $readGroupSetId Required. The ID of the read group set over
   * which coverage is requested.
   * @param array $optParams Optional parameters.
   *
   * @opt_param string referenceName The name of the reference to query, within
   * the reference set associated with this query. Optional.
   * @opt_param string end The end position of the range on the reference, 0-based
   * exclusive. If specified, `referenceName` must also be specified. If unset or
   * 0, defaults to the length of the reference.
   * @opt_param string pageToken The continuation token, which is used to page
   * through large result sets. To get the next page of results, set this
   * parameter to the value of `nextPageToken` from the previous response.
   * @opt_param int pageSize The maximum number of results to return in a single
   * page. If unspecified, defaults to 1024. The maximum value is 2048.
   * @opt_param string start The start position of the range on the reference,
   * 0-based inclusive. If specified, `referenceName` must also be specified.
   * Defaults to 0.
   * @opt_param string targetBucketWidth The desired width of each reported
   * coverage bucket in base pairs. This will be rounded down to the nearest
   * precomputed bucket width; the value of which is returned as `bucketWidth` in
   * the response. Defaults to infinity (each bucket spans an entire reference
   * sequence) or the length of the target range, if specified. The smallest
   * precomputed `bucketWidth` is currently 2048 base pairs; this is subject to
   * change.
   * @return Google_Service_Genomics_ListCoverageBucketsResponse
   */
  public function listReadgroupsetsCoveragebuckets($readGroupSetId, $optParams = array())
  {
    $params = array('readGroupSetId' => $readGroupSetId);
    $params = array_merge($params, $optParams);
    return $this->call('list', array($params), "Google_Service_Genomics_ListCoverageBucketsResponse");
  }
}
