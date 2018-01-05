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
 * The "detections" collection of methods.
 * Typical usage is:
 *  <code>
 *   $translateService = new Google_Service_Translate(...);
 *   $detections = $translateService->detections;
 *  </code>
 */
class Google_Service_Translate_Resource_Detections extends Google_Service_Resource
{
  /**
   * Detects the language of text within a request. (detections.detect)
   *
   * @param Google_Service_Translate_DetectLanguageRequest $postBody
   * @param array $optParams Optional parameters.
   * @return Google_Service_Translate_DetectionsListResponse
   */
  public function detect(Google_Service_Translate_DetectLanguageRequest $postBody, $optParams = array())
  {
    $params = array('postBody' => $postBody);
    $params = array_merge($params, $optParams);
    return $this->call('detect', array($params), "Google_Service_Translate_DetectionsListResponse");
  }
  /**
   * Detects the language of text within a request. (detections.listDetections)
   *
   * @param string|array $q The input text upon which to perform language
   * detection. Repeat this parameter to perform language detection on multiple
   * text inputs.
   * @param array $optParams Optional parameters.
   * @return Google_Service_Translate_DetectionsListResponse
   */
  public function listDetections($q, $optParams = array())
  {
    $params = array('q' => $q);
    $params = array_merge($params, $optParams);
    return $this->call('list', array($params), "Google_Service_Translate_DetectionsListResponse");
  }
}
