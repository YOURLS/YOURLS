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
 *   $booksService = new Google_Service_Books(...);
 *   $annotations = $booksService->annotations;
 *  </code>
 */
class Google_Service_Books_Resource_MylibraryAnnotations extends Google_Service_Resource
{
  /**
   * Deletes an annotation. (annotations.delete)
   *
   * @param string $annotationId The ID for the annotation to delete.
   * @param array $optParams Optional parameters.
   *
   * @opt_param string source String to identify the originator of this request.
   */
  public function delete($annotationId, $optParams = array())
  {
    $params = array('annotationId' => $annotationId);
    $params = array_merge($params, $optParams);
    return $this->call('delete', array($params));
  }
  /**
   * Inserts a new annotation. (annotations.insert)
   *
   * @param Google_Service_Books_Annotation $postBody
   * @param array $optParams Optional parameters.
   *
   * @opt_param string annotationId The ID for the annotation to insert.
   * @opt_param string country ISO-3166-1 code to override the IP-based location.
   * @opt_param bool showOnlySummaryInResponse Requests that only the summary of
   * the specified layer be provided in the response.
   * @opt_param string source String to identify the originator of this request.
   * @return Google_Service_Books_Annotation
   */
  public function insert(Google_Service_Books_Annotation $postBody, $optParams = array())
  {
    $params = array('postBody' => $postBody);
    $params = array_merge($params, $optParams);
    return $this->call('insert', array($params), "Google_Service_Books_Annotation");
  }
  /**
   * Retrieves a list of annotations, possibly filtered.
   * (annotations.listMylibraryAnnotations)
   *
   * @param array $optParams Optional parameters.
   *
   * @opt_param string contentVersion The content version for the requested
   * volume.
   * @opt_param string layerId The layer ID to limit annotation by.
   * @opt_param string layerIds The layer ID(s) to limit annotation by.
   * @opt_param string maxResults Maximum number of results to return
   * @opt_param string pageToken The value of the nextToken from the previous
   * page.
   * @opt_param bool showDeleted Set to true to return deleted annotations.
   * updatedMin must be in the request to use this. Defaults to false.
   * @opt_param string source String to identify the originator of this request.
   * @opt_param string updatedMax RFC 3339 timestamp to restrict to items updated
   * prior to this timestamp (exclusive).
   * @opt_param string updatedMin RFC 3339 timestamp to restrict to items updated
   * since this timestamp (inclusive).
   * @opt_param string volumeId The volume to restrict annotations to.
   * @return Google_Service_Books_Annotations
   */
  public function listMylibraryAnnotations($optParams = array())
  {
    $params = array();
    $params = array_merge($params, $optParams);
    return $this->call('list', array($params), "Google_Service_Books_Annotations");
  }
  /**
   * Gets the summary of specified layers. (annotations.summary)
   *
   * @param string|array $layerIds Array of layer IDs to get the summary for.
   * @param string $volumeId Volume id to get the summary for.
   * @param array $optParams Optional parameters.
   * @return Google_Service_Books_AnnotationsSummary
   */
  public function summary($layerIds, $volumeId, $optParams = array())
  {
    $params = array('layerIds' => $layerIds, 'volumeId' => $volumeId);
    $params = array_merge($params, $optParams);
    return $this->call('summary', array($params), "Google_Service_Books_AnnotationsSummary");
  }
  /**
   * Updates an existing annotation. (annotations.update)
   *
   * @param string $annotationId The ID for the annotation to update.
   * @param Google_Service_Books_Annotation $postBody
   * @param array $optParams Optional parameters.
   *
   * @opt_param string source String to identify the originator of this request.
   * @return Google_Service_Books_Annotation
   */
  public function update($annotationId, Google_Service_Books_Annotation $postBody, $optParams = array())
  {
    $params = array('annotationId' => $annotationId, 'postBody' => $postBody);
    $params = array_merge($params, $optParams);
    return $this->call('update', array($params), "Google_Service_Books_Annotation");
  }
}
