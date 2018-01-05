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
 * The "images" collection of methods.
 * Typical usage is:
 *  <code>
 *   $visionService = new Google_Service_Vision(...);
 *   $images = $visionService->images;
 *  </code>
 */
class Google_Service_Vision_Resource_Images extends Google_Service_Resource
{
  /**
   * Run image detection and annotation for a batch of images. (images.annotate)
   *
   * @param Google_Service_Vision_BatchAnnotateImagesRequest $postBody
   * @param array $optParams Optional parameters.
   * @return Google_Service_Vision_BatchAnnotateImagesResponse
   */
  public function annotate(Google_Service_Vision_BatchAnnotateImagesRequest $postBody, $optParams = array())
  {
    $params = array('postBody' => $postBody);
    $params = array_merge($params, $optParams);
    return $this->call('annotate', array($params), "Google_Service_Vision_BatchAnnotateImagesResponse");
  }
}
