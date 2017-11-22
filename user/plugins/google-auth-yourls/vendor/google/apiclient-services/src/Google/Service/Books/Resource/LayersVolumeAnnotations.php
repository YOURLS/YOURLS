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
 * The "volumeAnnotations" collection of methods.
 * Typical usage is:
 *  <code>
 *   $booksService = new Google_Service_Books(...);
 *   $volumeAnnotations = $booksService->volumeAnnotations;
 *  </code>
 */
class Google_Service_Books_Resource_LayersVolumeAnnotations extends Google_Service_Resource
{
  /**
   * Gets the volume annotation. (volumeAnnotations.get)
   *
   * @param string $volumeId The volume to retrieve annotations for.
   * @param string $layerId The ID for the layer to get the annotations.
   * @param string $annotationId The ID of the volume annotation to retrieve.
   * @param array $optParams Optional parameters.
   *
   * @opt_param string locale The locale information for the data. ISO-639-1
   * language and ISO-3166-1 country code. Ex: 'en_US'.
   * @opt_param string source String to identify the originator of this request.
   * @return Google_Service_Books_Volumeannotation
   */
  public function get($volumeId, $layerId, $annotationId, $optParams = array())
  {
    $params = array('volumeId' => $volumeId, 'layerId' => $layerId, 'annotationId' => $annotationId);
    $params = array_merge($params, $optParams);
    return $this->call('get', array($params), "Google_Service_Books_Volumeannotation");
  }
  /**
   * Gets the volume annotations for a volume and layer.
   * (volumeAnnotations.listLayersVolumeAnnotations)
   *
   * @param string $volumeId The volume to retrieve annotations for.
   * @param string $layerId The ID for the layer to get the annotations.
   * @param string $contentVersion The content version for the requested volume.
   * @param array $optParams Optional parameters.
   *
   * @opt_param string endOffset The end offset to end retrieving data from.
   * @opt_param string endPosition The end position to end retrieving data from.
   * @opt_param string locale The locale information for the data. ISO-639-1
   * language and ISO-3166-1 country code. Ex: 'en_US'.
   * @opt_param string maxResults Maximum number of results to return
   * @opt_param string pageToken The value of the nextToken from the previous
   * page.
   * @opt_param bool showDeleted Set to true to return deleted annotations.
   * updatedMin must be in the request to use this. Defaults to false.
   * @opt_param string source String to identify the originator of this request.
   * @opt_param string startOffset The start offset to start retrieving data from.
   * @opt_param string startPosition The start position to start retrieving data
   * from.
   * @opt_param string updatedMax RFC 3339 timestamp to restrict to items updated
   * prior to this timestamp (exclusive).
   * @opt_param string updatedMin RFC 3339 timestamp to restrict to items updated
   * since this timestamp (inclusive).
   * @opt_param string volumeAnnotationsVersion The version of the volume
   * annotations that you are requesting.
   * @return Google_Service_Books_Volumeannotations
   */
  public function listLayersVolumeAnnotations($volumeId, $layerId, $contentVersion, $optParams = array())
  {
    $params = array('volumeId' => $volumeId, 'layerId' => $layerId, 'contentVersion' => $contentVersion);
    $params = array_merge($params, $optParams);
    return $this->call('list', array($params), "Google_Service_Books_Volumeannotations");
  }
}
