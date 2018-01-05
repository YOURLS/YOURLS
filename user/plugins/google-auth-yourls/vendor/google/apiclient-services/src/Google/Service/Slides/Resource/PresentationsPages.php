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
 * The "pages" collection of methods.
 * Typical usage is:
 *  <code>
 *   $slidesService = new Google_Service_Slides(...);
 *   $pages = $slidesService->pages;
 *  </code>
 */
class Google_Service_Slides_Resource_PresentationsPages extends Google_Service_Resource
{
  /**
   * Gets the latest version of the specified page in the presentation.
   * (pages.get)
   *
   * @param string $presentationId The ID of the presentation to retrieve.
   * @param string $pageObjectId The object ID of the page to retrieve.
   * @param array $optParams Optional parameters.
   * @return Google_Service_Slides_Page
   */
  public function get($presentationId, $pageObjectId, $optParams = array())
  {
    $params = array('presentationId' => $presentationId, 'pageObjectId' => $pageObjectId);
    $params = array_merge($params, $optParams);
    return $this->call('get', array($params), "Google_Service_Slides_Page");
  }
  /**
   * Generates a thumbnail of the latest version of the specified page in the
   * presentation and returns a URL to the thumbnail image. (pages.getThumbnail)
   *
   * @param string $presentationId The ID of the presentation to retrieve.
   * @param string $pageObjectId The object ID of the page whose thumbnail to
   * retrieve.
   * @param array $optParams Optional parameters.
   *
   * @opt_param string thumbnailProperties.mimeType The optional mime type of the
   * thumbnail image.
   *
   * If you don't specify the mime type, the default mime type will be PNG.
   * @opt_param string thumbnailProperties.thumbnailSize The optional thumbnail
   * image size.
   *
   * If you don't specify the size, the server chooses a default size of the
   * image.
   * @return Google_Service_Slides_Thumbnail
   */
  public function getThumbnail($presentationId, $pageObjectId, $optParams = array())
  {
    $params = array('presentationId' => $presentationId, 'pageObjectId' => $pageObjectId);
    $params = array_merge($params, $optParams);
    return $this->call('getThumbnail', array($params), "Google_Service_Slides_Thumbnail");
  }
}
