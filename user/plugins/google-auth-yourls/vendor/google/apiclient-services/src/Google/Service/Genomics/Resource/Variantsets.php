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
 * The "variantsets" collection of methods.
 * Typical usage is:
 *  <code>
 *   $genomicsService = new Google_Service_Genomics(...);
 *   $variantsets = $genomicsService->variantsets;
 *  </code>
 */
class Google_Service_Genomics_Resource_Variantsets extends Google_Service_Resource
{
  /**
   * Creates a new variant set.
   *
   * For the definitions of variant sets and other genomics resources, see
   * [Fundamentals of Google Genomics](https://cloud.google.com/genomics
   * /fundamentals-of-google-genomics)
   *
   * The provided variant set must have a valid `datasetId` set - all other fields
   * are optional. Note that the `id` field will be ignored, as this is assigned
   * by the server. (variantsets.create)
   *
   * @param Google_Service_Genomics_VariantSet $postBody
   * @param array $optParams Optional parameters.
   * @return Google_Service_Genomics_VariantSet
   */
  public function create(Google_Service_Genomics_VariantSet $postBody, $optParams = array())
  {
    $params = array('postBody' => $postBody);
    $params = array_merge($params, $optParams);
    return $this->call('create', array($params), "Google_Service_Genomics_VariantSet");
  }
  /**
   * Deletes a variant set including all variants, call sets, and calls within.
   * This is not reversible.
   *
   * For the definitions of variant sets and other genomics resources, see
   * [Fundamentals of Google Genomics](https://cloud.google.com/genomics
   * /fundamentals-of-google-genomics) (variantsets.delete)
   *
   * @param string $variantSetId The ID of the variant set to be deleted.
   * @param array $optParams Optional parameters.
   * @return Google_Service_Genomics_GenomicsEmpty
   */
  public function delete($variantSetId, $optParams = array())
  {
    $params = array('variantSetId' => $variantSetId);
    $params = array_merge($params, $optParams);
    return $this->call('delete', array($params), "Google_Service_Genomics_GenomicsEmpty");
  }
  /**
   * Exports variant set data to an external destination.
   *
   * For the definitions of variant sets and other genomics resources, see
   * [Fundamentals of Google Genomics](https://cloud.google.com/genomics
   * /fundamentals-of-google-genomics) (variantsets.export)
   *
   * @param string $variantSetId Required. The ID of the variant set that contains
   * variant data which should be exported. The caller must have READ access to
   * this variant set.
   * @param Google_Service_Genomics_ExportVariantSetRequest $postBody
   * @param array $optParams Optional parameters.
   * @return Google_Service_Genomics_Operation
   */
  public function export($variantSetId, Google_Service_Genomics_ExportVariantSetRequest $postBody, $optParams = array())
  {
    $params = array('variantSetId' => $variantSetId, 'postBody' => $postBody);
    $params = array_merge($params, $optParams);
    return $this->call('export', array($params), "Google_Service_Genomics_Operation");
  }
  /**
   * Gets a variant set by ID.
   *
   * For the definitions of variant sets and other genomics resources, see
   * [Fundamentals of Google Genomics](https://cloud.google.com/genomics
   * /fundamentals-of-google-genomics) (variantsets.get)
   *
   * @param string $variantSetId Required. The ID of the variant set.
   * @param array $optParams Optional parameters.
   * @return Google_Service_Genomics_VariantSet
   */
  public function get($variantSetId, $optParams = array())
  {
    $params = array('variantSetId' => $variantSetId);
    $params = array_merge($params, $optParams);
    return $this->call('get', array($params), "Google_Service_Genomics_VariantSet");
  }
  /**
   * Updates a variant set using patch semantics.
   *
   * For the definitions of variant sets and other genomics resources, see
   * [Fundamentals of Google Genomics](https://cloud.google.com/genomics
   * /fundamentals-of-google-genomics) (variantsets.patch)
   *
   * @param string $variantSetId The ID of the variant to be updated (must already
   * exist).
   * @param Google_Service_Genomics_VariantSet $postBody
   * @param array $optParams Optional parameters.
   *
   * @opt_param string updateMask An optional mask specifying which fields to
   * update. Supported fields:
   *
   * * metadata. * name. * description.
   *
   * Leaving `updateMask` unset is equivalent to specifying all mutable fields.
   * @return Google_Service_Genomics_VariantSet
   */
  public function patch($variantSetId, Google_Service_Genomics_VariantSet $postBody, $optParams = array())
  {
    $params = array('variantSetId' => $variantSetId, 'postBody' => $postBody);
    $params = array_merge($params, $optParams);
    return $this->call('patch', array($params), "Google_Service_Genomics_VariantSet");
  }
  /**
   * Returns a list of all variant sets matching search criteria.
   *
   * For the definitions of variant sets and other genomics resources, see
   * [Fundamentals of Google Genomics](https://cloud.google.com/genomics
   * /fundamentals-of-google-genomics)
   *
   * Implements [GlobalAllianceApi.searchVariantSets](https://github.com/ga4gh/sch
   * emas/blob/v0.5.1/src/main/resources/avro/variantmethods.avdl#L49).
   * (variantsets.search)
   *
   * @param Google_Service_Genomics_SearchVariantSetsRequest $postBody
   * @param array $optParams Optional parameters.
   * @return Google_Service_Genomics_SearchVariantSetsResponse
   */
  public function search(Google_Service_Genomics_SearchVariantSetsRequest $postBody, $optParams = array())
  {
    $params = array('postBody' => $postBody);
    $params = array_merge($params, $optParams);
    return $this->call('search', array($params), "Google_Service_Genomics_SearchVariantSetsResponse");
  }
}
