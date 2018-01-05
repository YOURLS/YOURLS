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
 * The "referencesets" collection of methods.
 * Typical usage is:
 *  <code>
 *   $genomicsService = new Google_Service_Genomics(...);
 *   $referencesets = $genomicsService->referencesets;
 *  </code>
 */
class Google_Service_Genomics_Resource_Referencesets extends Google_Service_Resource
{
  /**
   * Gets a reference set.
   *
   * For the definitions of references and other genomics resources, see
   * [Fundamentals of Google Genomics](https://cloud.google.com/genomics
   * /fundamentals-of-google-genomics)
   *
   * Implements [GlobalAllianceApi.getReferenceSet](https://github.com/ga4gh/schem
   * as/blob/v0.5.1/src/main/resources/avro/referencemethods.avdl#L83).
   * (referencesets.get)
   *
   * @param string $referenceSetId The ID of the reference set.
   * @param array $optParams Optional parameters.
   * @return Google_Service_Genomics_ReferenceSet
   */
  public function get($referenceSetId, $optParams = array())
  {
    $params = array('referenceSetId' => $referenceSetId);
    $params = array_merge($params, $optParams);
    return $this->call('get', array($params), "Google_Service_Genomics_ReferenceSet");
  }
  /**
   * Searches for reference sets which match the given criteria.
   *
   * For the definitions of references and other genomics resources, see
   * [Fundamentals of Google Genomics](https://cloud.google.com/genomics
   * /fundamentals-of-google-genomics)
   *
   * Implements [GlobalAllianceApi.searchReferenceSets](https://github.com/ga4gh/s
   * chemas/blob/v0.5.1/src/main/resources/avro/referencemethods.avdl#L71)
   * (referencesets.search)
   *
   * @param Google_Service_Genomics_SearchReferenceSetsRequest $postBody
   * @param array $optParams Optional parameters.
   * @return Google_Service_Genomics_SearchReferenceSetsResponse
   */
  public function search(Google_Service_Genomics_SearchReferenceSetsRequest $postBody, $optParams = array())
  {
    $params = array('postBody' => $postBody);
    $params = array_merge($params, $optParams);
    return $this->call('search', array($params), "Google_Service_Genomics_SearchReferenceSetsResponse");
  }
}
