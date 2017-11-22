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
 * The "videos" collection of methods.
 * Typical usage is:
 *  <code>
 *   $videointelligenceService = new Google_Service_CloudVideoIntelligence(...);
 *   $videos = $videointelligenceService->videos;
 *  </code>
 */
class Google_Service_CloudVideoIntelligence_Resource_Videos extends Google_Service_Resource
{
  /**
   * Performs asynchronous video annotation. Progress and results can be retrieved
   * through the `google.longrunning.Operations` interface. `Operation.metadata`
   * contains `AnnotateVideoProgress` (progress). `Operation.response` contains
   * `AnnotateVideoResponse` (results). (videos.annotate)
   *
   * @param Google_Service_CloudVideoIntelligence_GoogleCloudVideointelligenceV1beta1AnnotateVideoRequest $postBody
   * @param array $optParams Optional parameters.
   * @return Google_Service_CloudVideoIntelligence_GoogleLongrunningOperation
   */
  public function annotate(Google_Service_CloudVideoIntelligence_GoogleCloudVideointelligenceV1beta1AnnotateVideoRequest $postBody, $optParams = array())
  {
    $params = array('postBody' => $postBody);
    $params = array_merge($params, $optParams);
    return $this->call('annotate', array($params), "Google_Service_CloudVideoIntelligence_GoogleLongrunningOperation");
  }
}
