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
 * The "annotationsets" collection of methods.
 * Typical usage is:
 *  <code>
 *   $genomicsService = new Google_Service_Genomics(...);
 *   $annotationsets = $genomicsService->annotationsets;
 *  </code>
 */
class Google_Service_Genomics_Resource_Annotationsets extends Google_Service_Resource
{
  /**
   * Creates a new annotation set. Caller must have WRITE permission for the
   * associated dataset.
   *
   * The following fields are required:
   *
   *   * datasetId   * referenceSetId
   *
   * All other fields may be optionally specified, unless documented as being
   * server-generated (for example, the `id` field). (annotationsets.create)
   *
   * @param Google_Service_Genomics_AnnotationSet $postBody
   * @param array $optParams Optional parameters.
   * @return Google_Service_Genomics_AnnotationSet
   */
  public function create(Google_Service_Genomics_AnnotationSet $postBody, $optParams = array())
  {
    $params = array('postBody' => $postBody);
    $params = array_merge($params, $optParams);
    return $this->call('create', array($params), "Google_Service_Genomics_AnnotationSet");
  }
  /**
   * Deletes an annotation set. Caller must have WRITE permission for the
   * associated annotation set. (annotationsets.delete)
   *
   * @param string $annotationSetId The ID of the annotation set to be deleted.
   * @param array $optParams Optional parameters.
   * @return Google_Service_Genomics_GenomicsEmpty
   */
  public function delete($annotationSetId, $optParams = array())
  {
    $params = array('annotationSetId' => $annotationSetId);
    $params = array_merge($params, $optParams);
    return $this->call('delete', array($params), "Google_Service_Genomics_GenomicsEmpty");
  }
  /**
   * Gets an annotation set. Caller must have READ permission for the associated
   * dataset. (annotationsets.get)
   *
   * @param string $annotationSetId The ID of the annotation set to be retrieved.
   * @param array $optParams Optional parameters.
   * @return Google_Service_Genomics_AnnotationSet
   */
  public function get($annotationSetId, $optParams = array())
  {
    $params = array('annotationSetId' => $annotationSetId);
    $params = array_merge($params, $optParams);
    return $this->call('get', array($params), "Google_Service_Genomics_AnnotationSet");
  }
  /**
   * Searches for annotation sets that match the given criteria. Annotation sets
   * are returned in an unspecified order. This order is consistent, such that two
   * queries for the same content (regardless of page size) yield annotation sets
   * in the same order across their respective streams of paginated responses.
   * Caller must have READ permission for the queried datasets.
   * (annotationsets.search)
   *
   * @param Google_Service_Genomics_SearchAnnotationSetsRequest $postBody
   * @param array $optParams Optional parameters.
   * @return Google_Service_Genomics_SearchAnnotationSetsResponse
   */
  public function search(Google_Service_Genomics_SearchAnnotationSetsRequest $postBody, $optParams = array())
  {
    $params = array('postBody' => $postBody);
    $params = array_merge($params, $optParams);
    return $this->call('search', array($params), "Google_Service_Genomics_SearchAnnotationSetsResponse");
  }
  /**
   * Updates an annotation set. The update must respect all mutability
   * restrictions and other invariants described on the annotation set resource.
   * Caller must have WRITE permission for the associated dataset.
   * (annotationsets.update)
   *
   * @param string $annotationSetId The ID of the annotation set to be updated.
   * @param Google_Service_Genomics_AnnotationSet $postBody
   * @param array $optParams Optional parameters.
   *
   * @opt_param string updateMask An optional mask specifying which fields to
   * update. Mutable fields are name, source_uri, and info. If unspecified, all
   * mutable fields will be updated.
   * @return Google_Service_Genomics_AnnotationSet
   */
  public function update($annotationSetId, Google_Service_Genomics_AnnotationSet $postBody, $optParams = array())
  {
    $params = array('annotationSetId' => $annotationSetId, 'postBody' => $postBody);
    $params = array_merge($params, $optParams);
    return $this->call('update', array($params), "Google_Service_Genomics_AnnotationSet");
  }
}
