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
 * The "annotations" collection of methods.
 * Typical usage is:
 *  <code>
 *   $genomicsService = new Google_Service_Genomics(...);
 *   $annotations = $genomicsService->annotations;
 *  </code>
 */
class Google_Service_Genomics_Resource_Annotations extends Google_Service_Resource
{
  /**
   * Creates one or more new annotations atomically. All annotations must belong
   * to the same annotation set. Caller must have WRITE permission for this
   * annotation set. For optimal performance, batch positionally adjacent
   * annotations together.
   *
   * If the request has a systemic issue, such as an attempt to write to an
   * inaccessible annotation set, the entire RPC will fail accordingly. For lesser
   * data issues, when possible an error will be isolated to the corresponding
   * batch entry in the response; the remaining well formed annotations will be
   * created normally.
   *
   * For details on the requirements for each individual annotation resource, see
   * CreateAnnotation. (annotations.batchCreate)
   *
   * @param Google_Service_Genomics_BatchCreateAnnotationsRequest $postBody
   * @param array $optParams Optional parameters.
   * @return Google_Service_Genomics_BatchCreateAnnotationsResponse
   */
  public function batchCreate(Google_Service_Genomics_BatchCreateAnnotationsRequest $postBody, $optParams = array())
  {
    $params = array('postBody' => $postBody);
    $params = array_merge($params, $optParams);
    return $this->call('batchCreate', array($params), "Google_Service_Genomics_BatchCreateAnnotationsResponse");
  }
  /**
   * Creates a new annotation. Caller must have WRITE permission for the
   * associated annotation set.
   *
   * The following fields are required:
   *
   * * annotationSetId * referenceName or   referenceId
   *
   * ### Transcripts
   *
   * For annotations of type TRANSCRIPT, the following fields of transcript must
   * be provided:
   *
   * * exons.start * exons.end
   *
   * All other fields may be optionally specified, unless documented as being
   * server-generated (for example, the `id` field). The annotated range must be
   * no longer than 100Mbp (mega base pairs). See the Annotation resource for
   * additional restrictions on each field. (annotations.create)
   *
   * @param Google_Service_Genomics_Annotation $postBody
   * @param array $optParams Optional parameters.
   * @return Google_Service_Genomics_Annotation
   */
  public function create(Google_Service_Genomics_Annotation $postBody, $optParams = array())
  {
    $params = array('postBody' => $postBody);
    $params = array_merge($params, $optParams);
    return $this->call('create', array($params), "Google_Service_Genomics_Annotation");
  }
  /**
   * Deletes an annotation. Caller must have WRITE permission for the associated
   * annotation set. (annotations.delete)
   *
   * @param string $annotationId The ID of the annotation to be deleted.
   * @param array $optParams Optional parameters.
   * @return Google_Service_Genomics_GenomicsEmpty
   */
  public function delete($annotationId, $optParams = array())
  {
    $params = array('annotationId' => $annotationId);
    $params = array_merge($params, $optParams);
    return $this->call('delete', array($params), "Google_Service_Genomics_GenomicsEmpty");
  }
  /**
   * Gets an annotation. Caller must have READ permission for the associated
   * annotation set. (annotations.get)
   *
   * @param string $annotationId The ID of the annotation to be retrieved.
   * @param array $optParams Optional parameters.
   * @return Google_Service_Genomics_Annotation
   */
  public function get($annotationId, $optParams = array())
  {
    $params = array('annotationId' => $annotationId);
    $params = array_merge($params, $optParams);
    return $this->call('get', array($params), "Google_Service_Genomics_Annotation");
  }
  /**
   * Searches for annotations that match the given criteria. Results are ordered
   * by genomic coordinate (by reference sequence, then position). Annotations
   * with equivalent genomic coordinates are returned in an unspecified order.
   * This order is consistent, such that two queries for the same content
   * (regardless of page size) yield annotations in the same order across their
   * respective streams of paginated responses. Caller must have READ permission
   * for the queried annotation sets. (annotations.search)
   *
   * @param Google_Service_Genomics_SearchAnnotationsRequest $postBody
   * @param array $optParams Optional parameters.
   * @return Google_Service_Genomics_SearchAnnotationsResponse
   */
  public function search(Google_Service_Genomics_SearchAnnotationsRequest $postBody, $optParams = array())
  {
    $params = array('postBody' => $postBody);
    $params = array_merge($params, $optParams);
    return $this->call('search', array($params), "Google_Service_Genomics_SearchAnnotationsResponse");
  }
  /**
   * Updates an annotation. Caller must have WRITE permission for the associated
   * dataset. (annotations.update)
   *
   * @param string $annotationId The ID of the annotation to be updated.
   * @param Google_Service_Genomics_Annotation $postBody
   * @param array $optParams Optional parameters.
   *
   * @opt_param string updateMask An optional mask specifying which fields to
   * update. Mutable fields are name, variant, transcript, and info. If
   * unspecified, all mutable fields will be updated.
   * @return Google_Service_Genomics_Annotation
   */
  public function update($annotationId, Google_Service_Genomics_Annotation $postBody, $optParams = array())
  {
    $params = array('annotationId' => $annotationId, 'postBody' => $postBody);
    $params = array_merge($params, $optParams);
    return $this->call('update', array($params), "Google_Service_Genomics_Annotation");
  }
}
