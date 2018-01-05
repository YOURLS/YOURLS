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
 * The "annotationData" collection of methods.
 * Typical usage is:
 *  <code>
 *   $booksService = new Google_Service_Books(...);
 *   $annotationData = $booksService->annotationData;
 *  </code>
 */
class Google_Service_Books_Resource_LayersAnnotationData extends Google_Service_Resource
{
  /**
   * Gets the annotation data. (annotationData.get)
   *
   * @param string $volumeId The volume to retrieve annotations for.
   * @param string $layerId The ID for the layer to get the annotations.
   * @param string $annotationDataId The ID of the annotation data to retrieve.
   * @param string $contentVersion The content version for the volume you are
   * trying to retrieve.
   * @param array $optParams Optional parameters.
   *
   * @opt_param bool allowWebDefinitions For the dictionary layer. Whether or not
   * to allow web definitions.
   * @opt_param int h The requested pixel height for any images. If height is
   * provided width must also be provided.
   * @opt_param string locale The locale information for the data. ISO-639-1
   * language and ISO-3166-1 country code. Ex: 'en_US'.
   * @opt_param int scale The requested scale for the image.
   * @opt_param string source String to identify the originator of this request.
   * @opt_param int w The requested pixel width for any images. If width is
   * provided height must also be provided.
   * @return Google_Service_Books_Annotationdata
   */
  public function get($volumeId, $layerId, $annotationDataId, $contentVersion, $optParams = array())
  {
    $params = array('volumeId' => $volumeId, 'layerId' => $layerId, 'annotationDataId' => $annotationDataId, 'contentVersion' => $contentVersion);
    $params = array_merge($params, $optParams);
    return $this->call('get', array($params), "Google_Service_Books_Annotationdata");
  }
  /**
   * Gets the annotation data for a volume and layer.
   * (annotationData.listLayersAnnotationData)
   *
   * @param string $volumeId The volume to retrieve annotation data for.
   * @param string $layerId The ID for the layer to get the annotation data.
   * @param string $contentVersion The content version for the requested volume.
   * @param array $optParams Optional parameters.
   *
   * @opt_param string annotationDataId The list of Annotation Data Ids to
   * retrieve. Pagination is ignored if this is set.
   * @opt_param int h The requested pixel height for any images. If height is
   * provided width must also be provided.
   * @opt_param string locale The locale information for the data. ISO-639-1
   * language and ISO-3166-1 country code. Ex: 'en_US'.
   * @opt_param string maxResults Maximum number of results to return
   * @opt_param string pageToken The value of the nextToken from the previous
   * page.
   * @opt_param int scale The requested scale for the image.
   * @opt_param string source String to identify the originator of this request.
   * @opt_param string updatedMax RFC 3339 timestamp to restrict to items updated
   * prior to this timestamp (exclusive).
   * @opt_param string updatedMin RFC 3339 timestamp to restrict to items updated
   * since this timestamp (inclusive).
   * @opt_param int w The requested pixel width for any images. If width is
   * provided height must also be provided.
   * @return Google_Service_Books_Annotationsdata
   */
  public function listLayersAnnotationData($volumeId, $layerId, $contentVersion, $optParams = array())
  {
    $params = array('volumeId' => $volumeId, 'layerId' => $layerId, 'contentVersion' => $contentVersion);
    $params = array_merge($params, $optParams);
    return $this->call('list', array($params), "Google_Service_Books_Annotationsdata");
  }
}
