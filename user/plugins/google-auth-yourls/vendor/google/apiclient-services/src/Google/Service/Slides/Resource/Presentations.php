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
 * The "presentations" collection of methods.
 * Typical usage is:
 *  <code>
 *   $slidesService = new Google_Service_Slides(...);
 *   $presentations = $slidesService->presentations;
 *  </code>
 */
class Google_Service_Slides_Resource_Presentations extends Google_Service_Resource
{
  /**
   * Applies one or more updates to the presentation.
   *
   * Each request is validated before being applied. If any request is not valid,
   * then the entire request will fail and nothing will be applied.
   *
   * Some requests have replies to give you some information about how they are
   * applied. Other requests do not need to return information; these each return
   * an empty reply. The order of replies matches that of the requests.
   *
   * For example, suppose you call batchUpdate with four updates, and only the
   * third one returns information. The response would have two empty replies: the
   * reply to the third request, and another empty reply, in that order.
   *
   * Because other users may be editing the presentation, the presentation might
   * not exactly reflect your changes: your changes may be altered with respect to
   * collaborator changes. If there are no collaborators, the presentation should
   * reflect your changes. In any case, the updates in your request are guaranteed
   * to be applied together atomically. (presentations.batchUpdate)
   *
   * @param string $presentationId The presentation to apply the updates to.
   * @param Google_Service_Slides_BatchUpdatePresentationRequest $postBody
   * @param array $optParams Optional parameters.
   * @return Google_Service_Slides_BatchUpdatePresentationResponse
   */
  public function batchUpdate($presentationId, Google_Service_Slides_BatchUpdatePresentationRequest $postBody, $optParams = array())
  {
    $params = array('presentationId' => $presentationId, 'postBody' => $postBody);
    $params = array_merge($params, $optParams);
    return $this->call('batchUpdate', array($params), "Google_Service_Slides_BatchUpdatePresentationResponse");
  }
  /**
   * Creates a new presentation using the title given in the request. Other fields
   * in the request are ignored. Returns the created presentation.
   * (presentations.create)
   *
   * @param Google_Service_Slides_Presentation $postBody
   * @param array $optParams Optional parameters.
   * @return Google_Service_Slides_Presentation
   */
  public function create(Google_Service_Slides_Presentation $postBody, $optParams = array())
  {
    $params = array('postBody' => $postBody);
    $params = array_merge($params, $optParams);
    return $this->call('create', array($params), "Google_Service_Slides_Presentation");
  }
  /**
   * Gets the latest version of the specified presentation. (presentations.get)
   *
   * @param string $presentationId The ID of the presentation to retrieve.
   * @param array $optParams Optional parameters.
   * @return Google_Service_Slides_Presentation
   */
  public function get($presentationId, $optParams = array())
  {
    $params = array('presentationId' => $presentationId);
    $params = array_merge($params, $optParams);
    return $this->call('get', array($params), "Google_Service_Slides_Presentation");
  }
}
