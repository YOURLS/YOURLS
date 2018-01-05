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
 * The "callsets" collection of methods.
 * Typical usage is:
 *  <code>
 *   $genomicsService = new Google_Service_Genomics(...);
 *   $callsets = $genomicsService->callsets;
 *  </code>
 */
class Google_Service_Genomics_Resource_Callsets extends Google_Service_Resource
{
  /**
   * Creates a new call set.
   *
   * For the definitions of call sets and other genomics resources, see
   * [Fundamentals of Google Genomics](https://cloud.google.com/genomics
   * /fundamentals-of-google-genomics) (callsets.create)
   *
   * @param Google_Service_Genomics_CallSet $postBody
   * @param array $optParams Optional parameters.
   * @return Google_Service_Genomics_CallSet
   */
  public function create(Google_Service_Genomics_CallSet $postBody, $optParams = array())
  {
    $params = array('postBody' => $postBody);
    $params = array_merge($params, $optParams);
    return $this->call('create', array($params), "Google_Service_Genomics_CallSet");
  }
  /**
   * Deletes a call set.
   *
   * For the definitions of call sets and other genomics resources, see
   * [Fundamentals of Google Genomics](https://cloud.google.com/genomics
   * /fundamentals-of-google-genomics) (callsets.delete)
   *
   * @param string $callSetId The ID of the call set to be deleted.
   * @param array $optParams Optional parameters.
   * @return Google_Service_Genomics_GenomicsEmpty
   */
  public function delete($callSetId, $optParams = array())
  {
    $params = array('callSetId' => $callSetId);
    $params = array_merge($params, $optParams);
    return $this->call('delete', array($params), "Google_Service_Genomics_GenomicsEmpty");
  }
  /**
   * Gets a call set by ID.
   *
   * For the definitions of call sets and other genomics resources, see
   * [Fundamentals of Google Genomics](https://cloud.google.com/genomics
   * /fundamentals-of-google-genomics) (callsets.get)
   *
   * @param string $callSetId The ID of the call set.
   * @param array $optParams Optional parameters.
   * @return Google_Service_Genomics_CallSet
   */
  public function get($callSetId, $optParams = array())
  {
    $params = array('callSetId' => $callSetId);
    $params = array_merge($params, $optParams);
    return $this->call('get', array($params), "Google_Service_Genomics_CallSet");
  }
  /**
   * Updates a call set.
   *
   * For the definitions of call sets and other genomics resources, see
   * [Fundamentals of Google Genomics](https://cloud.google.com/genomics
   * /fundamentals-of-google-genomics)
   *
   * This method supports patch semantics. (callsets.patch)
   *
   * @param string $callSetId The ID of the call set to be updated.
   * @param Google_Service_Genomics_CallSet $postBody
   * @param array $optParams Optional parameters.
   *
   * @opt_param string updateMask An optional mask specifying which fields to
   * update. At this time, the only mutable field is name. The only acceptable
   * value is "name". If unspecified, all mutable fields will be updated.
   * @return Google_Service_Genomics_CallSet
   */
  public function patch($callSetId, Google_Service_Genomics_CallSet $postBody, $optParams = array())
  {
    $params = array('callSetId' => $callSetId, 'postBody' => $postBody);
    $params = array_merge($params, $optParams);
    return $this->call('patch', array($params), "Google_Service_Genomics_CallSet");
  }
  /**
   * Gets a list of call sets matching the criteria.
   *
   * For the definitions of call sets and other genomics resources, see
   * [Fundamentals of Google Genomics](https://cloud.google.com/genomics
   * /fundamentals-of-google-genomics)
   *
   * Implements [GlobalAllianceApi.searchCallSets](https://github.com/ga4gh/schema
   * s/blob/v0.5.1/src/main/resources/avro/variantmethods.avdl#L178).
   * (callsets.search)
   *
   * @param Google_Service_Genomics_SearchCallSetsRequest $postBody
   * @param array $optParams Optional parameters.
   * @return Google_Service_Genomics_SearchCallSetsResponse
   */
  public function search(Google_Service_Genomics_SearchCallSetsRequest $postBody, $optParams = array())
  {
    $params = array('postBody' => $postBody);
    $params = array_merge($params, $optParams);
    return $this->call('search', array($params), "Google_Service_Genomics_SearchCallSetsResponse");
  }
}
