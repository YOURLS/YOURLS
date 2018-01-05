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
 * The "variants" collection of methods.
 * Typical usage is:
 *  <code>
 *   $genomicsService = new Google_Service_Genomics(...);
 *   $variants = $genomicsService->variants;
 *  </code>
 */
class Google_Service_Genomics_Resource_Variants extends Google_Service_Resource
{
  /**
   * Creates a new variant.
   *
   * For the definitions of variants and other genomics resources, see
   * [Fundamentals of Google Genomics](https://cloud.google.com/genomics
   * /fundamentals-of-google-genomics) (variants.create)
   *
   * @param Google_Service_Genomics_Variant $postBody
   * @param array $optParams Optional parameters.
   * @return Google_Service_Genomics_Variant
   */
  public function create(Google_Service_Genomics_Variant $postBody, $optParams = array())
  {
    $params = array('postBody' => $postBody);
    $params = array_merge($params, $optParams);
    return $this->call('create', array($params), "Google_Service_Genomics_Variant");
  }
  /**
   * Deletes a variant.
   *
   * For the definitions of variants and other genomics resources, see
   * [Fundamentals of Google Genomics](https://cloud.google.com/genomics
   * /fundamentals-of-google-genomics) (variants.delete)
   *
   * @param string $variantId The ID of the variant to be deleted.
   * @param array $optParams Optional parameters.
   * @return Google_Service_Genomics_GenomicsEmpty
   */
  public function delete($variantId, $optParams = array())
  {
    $params = array('variantId' => $variantId);
    $params = array_merge($params, $optParams);
    return $this->call('delete', array($params), "Google_Service_Genomics_GenomicsEmpty");
  }
  /**
   * Gets a variant by ID.
   *
   * For the definitions of variants and other genomics resources, see
   * [Fundamentals of Google Genomics](https://cloud.google.com/genomics
   * /fundamentals-of-google-genomics) (variants.get)
   *
   * @param string $variantId The ID of the variant.
   * @param array $optParams Optional parameters.
   * @return Google_Service_Genomics_Variant
   */
  public function get($variantId, $optParams = array())
  {
    $params = array('variantId' => $variantId);
    $params = array_merge($params, $optParams);
    return $this->call('get', array($params), "Google_Service_Genomics_Variant");
  }
  /**
   * Creates variant data by asynchronously importing the provided information.
   *
   * For the definitions of variant sets and other genomics resources, see
   * [Fundamentals of Google Genomics](https://cloud.google.com/genomics
   * /fundamentals-of-google-genomics)
   *
   * The variants for import will be merged with any existing variant that matches
   * its reference sequence, start, end, reference bases, and alternative bases.
   * If no such variant exists, a new one will be created.
   *
   * When variants are merged, the call information from the new variant is added
   * to the existing variant, and Variant info fields are merged as specified in
   * infoMergeConfig. As a special case, for single-sample VCF files, QUAL and
   * FILTER fields will be moved to the call level; these are sometimes
   * interpreted in a call-specific context. Imported VCF headers are appended to
   * the metadata already in a variant set. (variants.import)
   *
   * @param Google_Service_Genomics_ImportVariantsRequest $postBody
   * @param array $optParams Optional parameters.
   * @return Google_Service_Genomics_Operation
   */
  public function import(Google_Service_Genomics_ImportVariantsRequest $postBody, $optParams = array())
  {
    $params = array('postBody' => $postBody);
    $params = array_merge($params, $optParams);
    return $this->call('import', array($params), "Google_Service_Genomics_Operation");
  }
  /**
   * Merges the given variants with existing variants.
   *
   * For the definitions of variants and other genomics resources, see
   * [Fundamentals of Google Genomics](https://cloud.google.com/genomics
   * /fundamentals-of-google-genomics)
   *
   * Each variant will be merged with an existing variant that matches its
   * reference sequence, start, end, reference bases, and alternative bases. If no
   * such variant exists, a new one will be created.
   *
   * When variants are merged, the call information from the new variant is added
   * to the existing variant. Variant info fields are merged as specified in the
   * infoMergeConfig field of the MergeVariantsRequest.
   *
   * Please exercise caution when using this method!  It is easy to introduce
   * mistakes in existing variants and difficult to back out of them.  For
   * example, suppose you were trying to merge a new variant with an existing one
   * and both variants contain calls that belong to callsets with the same callset
   * ID.
   *
   *     // Existing variant - irrelevant fields trimmed for clarity     {
   * "variantSetId": "10473108253681171589",         "referenceName": "1",
   * "start": "10582",         "referenceBases": "G",         "alternateBases": [
   * "A"         ],         "calls": [             {                 "callSetId":
   * "10473108253681171589-0",                 "callSetName": "CALLSET0",
   * "genotype": [                     0,                     1                 ],
   * }         ]     }
   *
   *     // New variant with conflicting call information     {
   * "variantSetId": "10473108253681171589",         "referenceName": "1",
   * "start": "10582",         "referenceBases": "G",         "alternateBases": [
   * "A"         ],         "calls": [             {                 "callSetId":
   * "10473108253681171589-0",                 "callSetName": "CALLSET0",
   * "genotype": [                     1,                     1                 ],
   * }         ]     }
   *
   * The resulting merged variant would overwrite the existing calls with those
   * from the new variant:
   *
   *     {         "variantSetId": "10473108253681171589",
   * "referenceName": "1",         "start": "10582",         "referenceBases":
   * "G",         "alternateBases": [             "A"         ],         "calls":
   * [             {                 "callSetId": "10473108253681171589-0",
   * "callSetName": "CALLSET0",                 "genotype": [
   * 1,                     1                 ],             }         ]     }
   *
   * This may be the desired outcome, but it is up to the user to determine if if
   * that is indeed the case. (variants.merge)
   *
   * @param Google_Service_Genomics_MergeVariantsRequest $postBody
   * @param array $optParams Optional parameters.
   * @return Google_Service_Genomics_GenomicsEmpty
   */
  public function merge(Google_Service_Genomics_MergeVariantsRequest $postBody, $optParams = array())
  {
    $params = array('postBody' => $postBody);
    $params = array_merge($params, $optParams);
    return $this->call('merge', array($params), "Google_Service_Genomics_GenomicsEmpty");
  }
  /**
   * Updates a variant.
   *
   * For the definitions of variants and other genomics resources, see
   * [Fundamentals of Google Genomics](https://cloud.google.com/genomics
   * /fundamentals-of-google-genomics)
   *
   * This method supports patch semantics. Returns the modified variant without
   * its calls. (variants.patch)
   *
   * @param string $variantId The ID of the variant to be updated.
   * @param Google_Service_Genomics_Variant $postBody
   * @param array $optParams Optional parameters.
   *
   * @opt_param string updateMask An optional mask specifying which fields to
   * update. At this time, mutable fields are names and info. Acceptable values
   * are "names" and "info". If unspecified, all mutable fields will be updated.
   * @return Google_Service_Genomics_Variant
   */
  public function patch($variantId, Google_Service_Genomics_Variant $postBody, $optParams = array())
  {
    $params = array('variantId' => $variantId, 'postBody' => $postBody);
    $params = array_merge($params, $optParams);
    return $this->call('patch', array($params), "Google_Service_Genomics_Variant");
  }
  /**
   * Gets a list of variants matching the criteria.
   *
   * For the definitions of variants and other genomics resources, see
   * [Fundamentals of Google Genomics](https://cloud.google.com/genomics
   * /fundamentals-of-google-genomics)
   *
   * Implements [GlobalAllianceApi.searchVariants](https://github.com/ga4gh/schema
   * s/blob/v0.5.1/src/main/resources/avro/variantmethods.avdl#L126).
   * (variants.search)
   *
   * @param Google_Service_Genomics_SearchVariantsRequest $postBody
   * @param array $optParams Optional parameters.
   * @return Google_Service_Genomics_SearchVariantsResponse
   */
  public function search(Google_Service_Genomics_SearchVariantsRequest $postBody, $optParams = array())
  {
    $params = array('postBody' => $postBody);
    $params = array_merge($params, $optParams);
    return $this->call('search', array($params), "Google_Service_Genomics_SearchVariantsResponse");
  }
}
